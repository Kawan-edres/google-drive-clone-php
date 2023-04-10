<?php
// Connect to the database
$dbhost = 'localhost';
$dbname = 'my_database';
$dbuser = 'root';
$dbpass = '';   

try {
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}

?>

