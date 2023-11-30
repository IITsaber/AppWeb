
<?php
// Database credentials
define('DB_SERVER', 'localhost');// hostname contains database 
define('DB_USERNAME', 'root');// the user of database
define('DB_PASSWORD', '');// password of user
define('DB_NAME', 'gestion_commande');// name of database

// Create PDO connection
try {
    $dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME;
    $pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>