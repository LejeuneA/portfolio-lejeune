<?php

$localConfigFile = __DIR__ . '/conf-db.local.php';

if (is_file($localConfigFile)) {
    $dbConfig = require $localConfigFile;
} else {
    $dbConfig = [
        'host' => getenv('DB_HOST'),
        'name' => getenv('DB_NAME'),
        'user' => getenv('DB_USER'),
        'password' => getenv('DB_PASSWORD'),
    ];
}

foreach (['host', 'name', 'user', 'password'] as $requiredKey) {
    if (!isset($dbConfig[$requiredKey]) || $dbConfig[$requiredKey] === '') {
        throw new RuntimeException('Database configuration is missing.');
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
