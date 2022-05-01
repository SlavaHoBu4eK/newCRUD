<?php
error_reporting(-1);
ini_set('display_errors', 1);

require '../config/connect.php';
$id = $_POST['id'];
$body = $_POST['body'];
mysqli_query($connect, "INSERT INTO `comments` (`id`, `client_id`, `body`) VALUES (NULL, '$id' ,'$body')");
header('Location: view.php?id=' . $id);