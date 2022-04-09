<?php

//connect
$connect = mysqli_connect('localhost', 'slava', '$Sl22061990', 'gym');
if (!$connect) {
    die ('нет подключения к БД');
}
