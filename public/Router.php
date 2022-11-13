<?php

class Router
{
    private array $pages = [];

    function addRoute($url, $path)  //добавление страниц
    {
        $this->pages[$url] = $path;
    }

    function route($url)   //роутинг
    {
        // TODO: брать URL , a не url с параметрами /view?id=2  -> /view

        $path = $this->pages[$url] ?? '';

        //получение пути файла по  url , проверка isset или не isset
        if ($path == "") {   //проверка существования адреса в массиве
            require '404.php';
            die();
        }

        $file_dir = "" . $path;  // полный путь к файлу со страницей

        if (file_exists($file_dir)) {  // если файл найден, то подключаем его
            require_once $file_dir;
        } else {
            require '404.php';
            die();
        }
    }
}


