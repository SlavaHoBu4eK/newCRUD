<?php
// PDO connect
$host = 'localhost';
$db = 'gym';
$user = 'slava';
$pass = '$Sl22061990';

try {
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
} catch (PDOException $e) {
    echo 'Ошибка соединения с БД ' . $e->getMessage();
}