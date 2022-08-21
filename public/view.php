<?php

/**
 * @var $clientRepository СlientRepository
 * @var $commentRepository СommentRepository
 */
require_once "../common.php";
include '../templates/header.php';
include '../src/entity/comment.php';
include '../src/entity/client.php';

$id = $_GET['id'] ?? '';

if (!empty($id)) {
    $client = $clientRepository->findOne($id);
}

if (!empty($client)) {
$comments = $commentRepository->findAll($id);
?>

<body>
<h3>Фамилия: <?= $client->getLastName(); ?></h3>
<h3>Имя: <?= $client->getName() ?></h3>
<h3>Отчество: <?= $client->getMiddleName() ?></h3>
<h3>Дата рождения: <?= $client->getBirthday() ?></h3>
<h3>Номер телефона: <?= $client->getPhone() ?></h3>
<hr>
<form action="create_comment.php" method="post">
    <input type="hidden" name="client_id" value=" <?php echo $client->getId() ?>">
    <label>
        <textarea name="body"></textarea>
    </label><br><br>
    <button type="submit" name="submit">Добавить комментарий</button>
</form>
<hr>
<h3>Комментарий:</h3>
<ul>
    <?php
    if (count($comments) > 0) {
        foreach ($comments as $comment) {
            //$comment = new Comment($comment->body);
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
