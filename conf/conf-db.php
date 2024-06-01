<?php

$servername = 'localhost'; 
$dbname = 'portfolio';
$username = 'root';
$password = '@NtLYa130580';

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    throw new PDOException("Database connection error: " . $e->getMessage());
}


// 127.0.0.1
// localhost