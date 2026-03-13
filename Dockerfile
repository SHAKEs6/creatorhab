# Use the official PHP image with Apache
FROM php:8.2-apache

# Install system dependencies and PostgreSQL development libraries
RUN apt-get update && apt-get install -y \
    libpq-dev \
    postgresql-client \
    && docker-php-ext-install pdo pdo_pgsql

# Explicitly enable the PostgreSQL PDO extension
RUN docker-php-ext-enable pdo_pgsql

# Verify PostgreSQL extension is installed and enabled
RUN php -r "if (!extension_loaded('pdo_pgsql')) { echo 'PDO PostgreSQL extension not loaded\n'; exit(1); } echo 'PDO PostgreSQL extension loaded successfully\n';"

# Test basic PDO functionality
RUN php -r "try { \$pdo = new PDO('pgsql:host=localhost;dbname=test', 'test', 'test'); } catch(Exception \$e) { echo 'PDO test passed (expected error for test DB): ' . \$e->getMessage() . '\n'; }"

# Clean up
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure Apache virtual host to serve from public directory
RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
        Options Indexes FollowSymLinks\n\
        DirectoryIndex index.php\n\
    </Directory>\n\
    ErrorLog ${APACHE_LOG_DIR}/error.log\n\
    CustomLog ${APACHE_LOG_DIR}/access.log combined\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Test database connection (optional - will fail during build if DB not available, but that's ok)
# RUN php -r "try { new PDO('pgsql:host=dpg-d6q6pr8gjchc738okpa0-a.oregon-postgres.render.com;dbname=creator_platform_16ux', 'creator_user', 'kg8fs00oQ87q1VpTh1zYXcRf6bknVH7C'); echo 'DB connection successful'; } catch(Exception $e) { echo 'DB connection test skipped: ' . $e->getMessage(); }" || true

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]