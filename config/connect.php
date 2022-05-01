<?php

//connect
//error_reporting(-1);
//ini_set('display_errors',1);
$connect = mysqli_connect('localhost', 'slava', '$Sl22061990', 'gym');
if (!$connect) {
    die ('нет подключения к БД');
}
