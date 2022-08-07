<?php

require_once 'config/main.php';

$connection = new PDO($dsn, $username, $password, $options);

function escape($html) {
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE,"UTF-8");
}
