<!doctype html>
<html lang="en">
<?php
error_reporting(-1);
ini_set('display_errors', 1);
require_once '../config/connect.php';
require_once '../blocks/header.php';

$lastname = $_POST['lastname'];
$name = $_POST['name'];
$middlename = $_POST['middlename'];
$birthday = $_POST['birthday'];
$phone = $_POST['phone'];


mysqli_query($connect, "INSERT INTO `client` (`id`, `last_name`,`name`,`middle_name`,`date_of_birth`,`phone_number`) VALUES (NULL,'$lastname','$name', '$middlename','$birthday','$phone')"); ?>
Запись для аккаунта <?= $lastname . ' ' . $name . ' ' . $middlename ?> успешно создана. Для того, чтоб вернуться на
главную страницу, нажмите <a href="/index.php">вперед</a>
<?php require_once '../blocks/footer.php'; ?>
