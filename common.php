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


function template($file, $args){
    if ( file_exists('/var/www/html/templates/'.$file.'.tpl.php')) {   //проверка существует ли файл
        ob_start(); // откываем буфер обмена
        extract($args);
        require 'templates/'.$file.'.tpl.php';
        return ob_get_clean(); //очищаем буфер обмена
    }
}

//function template( $file, $args ){
//    if ( !file_exists( $file ) ) {
//        return '';
//    }
//    if ( is_array( $args ) ){
//        extract( $args );
//    }
//    ob_start();
//    include $file;
//    return ob_get_clean();
//}


//function template($names, $clients)
//{
//    if (!is_array($names)) {
//        $names = array($names);
//    }
//    $template_found = false;
//    foreach ( $names as $name ) {
//        $file ='/var/www/html/templates/'.$name.'.tpl.php';
//        if ( file_exists( $file ) ) {
//            $template_found = $file;
//            // stop after the first template is found
//            break;
//        }
//    }
//    // fail if no template file is found
//    if ( ! $template_found ) {
//        return '';
//    }
//    // Make values in the associative array easier to access by extracting them
//    if ( is_array( $clients ) ){
//        extract( $clients );
//    }
//    // buffer the output (including the file is "output")
//    ob_start();
//    include $template_found;
//    return ob_get_clean();
//}
