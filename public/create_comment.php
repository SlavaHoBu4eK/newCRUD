<?php
require "../config.php";
require "../common.php";
if (isset($_POST['id'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $id = $_POST['id'];
        $body = $_POST['body'];

        $sql = "INSERT INTO comments ( client_id, body) VALUES (?,?)";

        $statement = $connection->prepare($sql);
        $statement->execute([$id, $body]);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
header('Location: view.php?id=' . $id);