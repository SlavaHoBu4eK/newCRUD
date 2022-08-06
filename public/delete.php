<?php
require "../config.php";
require "../common.php";

if (isset($_GET["id"])) {
       try {
        $connection = new PDO($dsn, $username, $password, $options);

        $id = $_GET['id'];
//$sql = ("DELETE FROM client WHERE id = :id");
        $sql = "UPDATE  client SET deleted_at = :deleted_at WHERE  id = :id ";

        $statement = $connection->prepare($sql);
        $statement->bindValue('id', $id);
        $statement->bindValue('deleted_at', time());
        $statement->execute();
//$statement->execute(['id' => $id, 'deleted_at' => time()]);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
if (isset($statement)) {
    ?>

    <?php require 'templates/header.php'; ?>
    Запись была успешно удалена. Для того, чтоб вернуться на главную страницу, нажмите <a
            href="index.php">вперед</a>
    <?php require_once 'templates/footer.php';
}
?>