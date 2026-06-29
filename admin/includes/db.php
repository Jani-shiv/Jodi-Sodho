<?php
// Jodi Sodho Database Connection Config
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', 'your_db_password');
define('DB_NAME', 'jodi_sodho');

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
    $db_connected = true;
} catch (PDOException $e) {
    $db_connected = false;
    $db_error = $e->getMessage();
}
