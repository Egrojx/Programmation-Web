<?php
session_start();

$host = 'db';
$db = 'mydatabase';
$user = 'user';
$pass = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

function liste_types_plats($pdo) {
    $stmt = $pdo->query('SELECT * FROM types_plats');
    return $stmt->fetchAll();
}

function liste_types_cuisines($pdo) {
    $stmt = $pdo->query('SELECT * FROM types_cuisines');
    return $stmt->fetchAll();
}
?>
