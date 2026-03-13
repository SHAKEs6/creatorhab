# Use PHP 8.2 with Apache
FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    postgresql-client \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions including PostgreSQL
RUN docker-php-ext-configure pgsql --with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Alternative: Manual installation if docker-php-ext-install fails
RUN if ! php -m | grep -q pdo_pgsql; then \
        apt-get update && apt-get install -y php8.2-pgsql php8.2-pdo-pgsql && \
        apt-get clean && rm -rf /var/lib/apt/lists/*; \
    fi

# Enable extensions
RUN docker-php-ext-enable pdo_pgsql pgsql

# Create PHP config to ensure extensions are loaded
RUN echo "extension=pdo.so" > /usr/local/etc/php/conf.d/10-pdo.ini && \
    echo "extension=pdo_pgsql.so" > /usr/local/etc/php/conf.d/20-pdo_pgsql.ini && \
    echo "extension=pgsql.so" > /usr/local/etc/php/conf.d/21-pgsql.ini

# Verify extensions are loaded
RUN php -r "if (!extension_loaded('pdo_pgsql')) { echo 'FATAL: PDO PostgreSQL extension not loaded\n'; exit(1); } echo 'SUCCESS: PDO PostgreSQL extension loaded\n';"

# Test PDO connection capability
RUN php -c /usr/local/etc/php/php.ini-production -r "try { \$pdo = new PDO('pgsql:host=127.0.0.1;dbname=postgres', 'postgres', ''); echo 'PDO test successful\n'; } catch(Exception \$e) { echo 'PDO test note: ' . \$e->getMessage() . '\n'; }"

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