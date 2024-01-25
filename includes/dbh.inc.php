<?php 

$host = 'localhost';
$dbname = 'tryphpdb';
$dbusername = 'root';
$dbpassword = '';
$dbport = 3307;

try {
    $pdo = new PDO("mysql:host=$host;port=$dbport; dbname=$dbname", $dbusername, $dbpassword);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}