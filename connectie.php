<?php

$host = "localhost:3306";
$user = "root";
$db   ="Winkel2";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;" , $user, $pass);
    
} catch (PDOxception $e) {
    echo "Error:" . $e->getMessage();
}
?>