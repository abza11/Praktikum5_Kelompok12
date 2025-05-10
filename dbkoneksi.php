<?php
$host = 'localhost';
$dbname = 'dbpuskesmas3';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$dbname";

try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
