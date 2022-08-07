<?php
require_once "../common.php";

$id = $_POST['id'] ?? "";
$body = $_POST['body'] ?? "";

if (empty($id) || empty($body)) {
    die("Request data is required!");
}

try {
    $connection
        ->prepare("INSERT INTO comments ( client_id, body) VALUES (?,?)")
        ->execute([$id, $body]);
} catch (PDOException $error) {
    die("Oops... something went wrong! Please try later. Details: {$error->getMessage()}");
}

header('Location: view.php?id=' . $id);