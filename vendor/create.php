<?php
require_once '../config/connect.php';

print_r($_POST);

$name=$_POST['name'];
$lastname=$_POST['lastname'];
$middlename=$_POST['middlename'];
$birthday=$_POST['birthday'];
$phone=$_POST['phone'];

mysqli_query($connect,"INSERT INTO `client` (`id`,`name`, `last_name`,`middle_name`,`date_of_birth`,`phone_number`) VALUES (NULL,'$name', '$lastname','$middlename','$birthday','$phone')");

    header('Location: /');