<?php

require_once '../config/connect.php';
require_once '../blocks/header.php';
$id = $_GET['id'];
//$sql = ("DELETE FROM client WHERE id = :id");
$sql = ("UPDATE  client SET deleted_at = :deleted_at WHERE  id = :id ");

$query = $pdo->prepare($sql);
$query->execute(['id' => $id, 'deleted_at' => time()]); ?>

    Запись была успешно удалена. Для того, чтоб вернуться на главную страницу, нажмите <a
        href="/index.php">вперед</a>
<?php require_once '../blocks/footer.php'; ?>