<?php
error_reporting(-1);
ini_set('display_errors', 1);
require '../config/connect.php';
require '../blocks/header.php';

$client_id = ($_GET['id']);
$sql = $pdo->prepare("SELECT * FROM client WHERE id = :client_id AND deleted_at IS NULL");
$sql->execute(['client_id' => $client_id]);
$client = $sql->fetch(PDO::FETCH_OBJ);


if (!empty($client)){

$sql = $pdo->prepare("SELECT * FROM comments WHERE client_id = :client_id  AND deleted_at IS NULL");
$sql->execute(['client_id' => $client_id]);
$comments = $sql->fetchall(PDO::FETCH_OBJ);

?>
<body>
<h3>Фамилия: <?php echo $client->last_name; ?></h3>
<h3>Имя: <?php echo $client->name ?></h3>
<h3>Отчество: <?php echo $client->middle_name ?></h3>
<h3>Дата рождения: <?php echo $client->date_of_birth ?></h3>
<h3>Номер телефона: <?php echo $client->phone_number ?></h3>
<hr>
<form action="create_comment.php" method="post">
    <input type="hidden" name="id" value=" <?php echo $client->id ?>">
    <textarea name="body"></textarea><br><br>
    <button type="submit">Добавить комментарий</button>
</form>
<hr>
<h3>Комментарий:</h3>
<ul>
    <?php
    foreach ($comments as $comment) {
        ?>
        <li><?php echo $comment->body ?></li>
        <?php
    }
    }
    else {
        ?>
        Пользователя с данным id не существует. Для того, чтоб вернуться на главную страницу, нажмите
        <a href="/index.php">вперед</a>
        <?php
    }
    ?>
</ul>
</body>
<?php require_once '../blocks/footer.php'; ?>
</html>