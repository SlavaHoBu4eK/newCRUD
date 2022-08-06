<?php
$host = 'localhost';
$username = 'slava';
$password = '$Sl22061990';
$dbname = 'gym';
$dsn = "mysql:host=$host;dbname=$dbname"; // will use later
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);


//try {
//    $pdo = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
//} catch (PDOException $e) {
//    echo 'Ошибка соединения с БД ' . $e->getMessage();
//}
