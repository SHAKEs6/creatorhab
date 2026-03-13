<?php
// Built-in server router for development
if (preg_match('/\.(?:png|jpg|jpeg|gif|js|css|svg|ico)$/', $_SERVER["REQUEST_URI"])) {
    return false; // Serve the requested resource as-is.
} else {
    // Rewrite all non-existent files/dirs to index.php
    $_GET['url'] = ltrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    require __DIR__ . '/index.php';
}
