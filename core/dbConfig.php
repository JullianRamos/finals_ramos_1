<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "final_ramos1";
$dsn = "mysql:host={$host};dbname={$dbname}";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->exec("SET time_zone = '+08:00';");
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
