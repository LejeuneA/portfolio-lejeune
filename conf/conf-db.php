<?php

$localConfigFile = __DIR__ . '/conf-db.local.php';
$productionConfigFile = '/home/acelyalejeune/private/portfolio-db.php';

if (is_file($localConfigFile)) {
    $dbConfig = require $localConfigFile;
} elseif (is_file($productionConfigFile)) {
    $dbConfig = require $productionConfigFile;
} else {
    throw new RuntimeException('Database configuration file could not be found.');
}

foreach (['host', 'name', 'user', 'password'] as $requiredKey) {
    if (
        !array_key_exists($requiredKey, $dbConfig) ||
        $dbConfig[$requiredKey] === ''
    ) {
        throw new RuntimeException('Database configuration is incomplete.');
    }
}

$dsn = sprintf(
    'mysql:host=%s;dbname=%s;charset=utf8mb4',
    $dbConfig['host'],
    $dbConfig['name'],
);

try {
    $pdo = new PDO(
        $dsn,
        $dbConfig['user'],
        $dbConfig['password'],
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ],
    );
} catch (PDOException $exception) {
    error_log($exception->getMessage());

    throw new RuntimeException('Database connection error.');
}
