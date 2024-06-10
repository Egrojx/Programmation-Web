<?php
session_start();

$servername = "db";
$username = "user";
$password = "password";
$dbname = "Recettes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function liste_types_plats($conn) {
    $sql = "SELECT * FROM TypePlat";
    $result = $conn->query($sql);
    $types_plats = [];
    while($row = $result->fetch_assoc()) {
        $types_plats[] = $row;
    }
    return $types_plats;
}

function liste_types_cuisines($conn) {
    $sql = "SELECT * FROM TypeCuisine";
    $result = $conn->query($sql);
    $types_cuisines = [];
    while($row = $result->fetch_assoc()) {
        $types_cuisines[] = $row;
    }
    return $types_cuisines;
}
?>
