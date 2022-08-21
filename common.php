<?php

require_once 'config/main.php';
require_once 'src/repository/ClientRepository.php';
require_once 'src/repository/CommentRepository.php';
$connection = new PDO($dsn, $username, $password, $options);

$clientRepository = new ClientRepository($connection);
$commentRepository = new CommentRepository($connection);

function escape($html) {
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE,"UTF-8");
}
