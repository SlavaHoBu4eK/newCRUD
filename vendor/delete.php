<?php

require_once '../config/connect.php';

$id=$_GET['id'];
mysqli_query($connect, "DELETE FROM `client` WHERE `id` = '$id'");
header('Location: /');