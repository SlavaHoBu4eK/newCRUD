<?php
require_once '../config/connect.php';

$id=$_POST['id'];

$name=$_POST['name'];
$lastname=$_POST['lastname'];
$middlename=$_POST['middlename'];
$birthday=$_POST['birthday'];
$phone=$_POST['phone'];

mysqli_query($connect, "UPDATE `client` SET `name` = '$name', `last_name` ='$lastname', `middle_name` = '$middlename', `date_of_birth` ='$birthday', `phone_number` = '$phone' WHERE `id` = '$id'");
header('Location: /');