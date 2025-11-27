<?php
$host = '127.0.0.1';
$port = '3307';
$dbname = 'attendance_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db_error = null;
} catch (PDOException $e) {
    $pdo = null;
    $db_error = "Connection failed: " . $e->getMessage();
}
?>
