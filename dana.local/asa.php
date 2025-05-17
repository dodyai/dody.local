<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);


$host = 'localhost';
$port = '3307'; 
$dbname = 'myform';
$username = 'root';
$password = ''; 

try {
   
    $pdo = new PDO("mysql:host=$host;port=$port;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

   
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS entries (
            id INT AUTO_INCREMENT PRIMARY KEY,
            last_name VARCHAR(255),
            name VARCHAR(255),
            age INT,
            group_name VARCHAR(255),
            birthday DATE,
            about TEXT,
            photo VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");
} catch (PDOException $e) {
    die("Ошибка подключения к БД: " . $e->getMessage());
}