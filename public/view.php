<?php

require_once "../common.php";
include '../templates/header.php';
include '../src/entity/comment.php';
include '../src/entity/client.php';

$id = $_GET['id'] ?? '';

if (!empty($id)) {

    try {
        $sql = $connection->prepare("SELECT * FROM client WHERE id = :client_id AND deleted_at IS NULL");
        $sql->execute(['client_id' => $id]);
        $client = $sql->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $error) {
        die("Oops... something went wrong! Please try later. Details: {$error->getMessage()}");
    }
    $client = new Client($id, $client->last_name, $client->name, $client->middle_name, $client->date_of_birth, $client->phone_number);
}


if (!empty($client)){

try {
    $sql = $connection->prepare("SELECT * FROM comments WHERE client_id = :client_id  AND deleted_at IS NULL");
    $sql->execute(['client_id' => $id]);
    $comments = $sql->fetchall(PDO::FETCH_OBJ);
} catch (PDOException $error) {
    echo $error->getMessage();
}
?>

<body>
<h3>Фамилия: <?= $client->getLastName(); ?></h3>
<h3>Имя: <?= $client->getName() ?></h3>
<h3>Отчество: <?= $client->getMiddleName() ?></h3>
<h3>Дата рождения: <?= $client->getBirthday() ?></h3>
<h3>Номер телефона: <?= $client->getPhone() ?></h3>
<hr>
<form action="create_comment.php" method="post">
    <input type="hidden" name="id" value=" <?php echo $client->getId() ?>">
    <label>
        <textarea name="body"></textarea>
    </label><br><br>
    <button type="submit">Добавить комментарий</button>
</form>
<hr>
<h3>Комментарий:</h3>
<ul>
    <?php
    if (count($comments) > 0) {
        foreach ($comments as $comment) {
            $comment = new Comment($comment->id, $comment->body);
            ?>
            <li><?= $comment->getBody() ?></li>
            <?php
        }
    } else {
        echo 'Пока еще нет ни одного комментария.';
    }
    }
    else {
        ?>
        Пользователя с данным id не существует. Для того, чтоб вернуться на главную страницу, нажмите
        <a href="index.php">вперед</a>
        <?php
    }
    ?>
</ul>
</body>

<?php require_once '../templates/footer.php'; ?>
