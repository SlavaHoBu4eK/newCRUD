<?php

require_once 'config/main.php';
require_once 'src/repository/ClientRepository.php';
require_once 'src/repository/CommentRepository.php';
$connection = new PDO($dsn, $username, $password, $options);

$clientRepository = new ClientRepository($connection);
$commentRepository = new CommentRepository($connection);

function escape($html)
{
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}


function template(string $file, array $clients = []): string
{
    if (!file_exists(dirname(getcwd()) . '/templates/' . $file . '.tpl.php')) {//проверка существует ли файл
        return '';
    }
    if (is_array($clients)) {
        extract($clients);
    }
    ob_start(); // открываем буфер обмена
    require 'templates/' . $file . '.tpl.php';
    return ob_get_clean(); //очищаем буфер обмена

}

