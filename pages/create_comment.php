<?php
error_reporting(-1);
ini_set('display_errors', 1);

require '../config/connect.php';
$id = $_POST['id'];
$body = $_POST['body'];

$sql = ("INSERT INTO comments ( client_id, body) VALUES (?,?)");
$query = $pdo->prepare($sql);
$query->execute([$id, $body]);

header('Location: view.php?id=' . $id);