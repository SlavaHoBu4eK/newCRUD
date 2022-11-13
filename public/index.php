<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'Router.php';


$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$r = new Router();
$r->addRoute('/', "list.php");
$r->addRoute('/update', "update.php");
$r->addRoute('/create', "create.php");
$r->addRoute('/create_comment', "create_comment.php");
$r->addRoute('/delete', "delete.php");
$r->addRoute('/view', "view.php");

$r->route($url);

