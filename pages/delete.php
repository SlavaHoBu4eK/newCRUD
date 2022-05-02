<?php

require_once '../config/connect.php';
require_once '../blocks/header.php';
$id = $_GET['id'];
mysqli_query($connect, "DELETE FROM `client` WHERE `id` = '$id'");
//header('Location: /');?>
    Запись была успешно удалена. Для того, чтоб вернуться на главную страницу, нажмите <a
        href="/index.php">вперед</a>
<?php require_once '../blocks/footer.php'; ?>