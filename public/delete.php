<?php
require_once "../common.php";
include '../templates/header.php';

$id = $_GET['id'];

if (!empty($id)) {

    try {
        $connection
            ->prepare("UPDATE  client SET deleted_at = :deleted_at WHERE  id = :id ")
            ->execute([
                'id' => $id,
                'deleted_at' => time()
            ]);
        ?>
        <blockquote> Запись была успешно удалена. Для того, чтоб вернуться
            на главную страницу, нажмите <a href="index.php">вперед</a>.
        </blockquote>
    <?php
    } catch (PDOException $error) {
        echo "Oops... something went wrong! Please try later. Details: {$error->getMessage()}";
    }
} else {
    echo "Request data is required!";
}

include '../templates/footer.php';
