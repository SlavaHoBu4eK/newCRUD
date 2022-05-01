<?php
error_reporting(-1);
ini_set('display_errors', 1);
require '../config/connect.php';
require '../blocks/header.php';
$client_id = ($_GET['id']);
$client = mysqli_query($connect, "SELECT * FROM `client` WHERE `id` = '$client_id'");
$client = mysqli_fetch_assoc($client);
if (!empty($client)){
$comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `client_id` = '$client_id'");
$comments = mysqli_fetch_all($comments);
?>
<body>
<h3>Фамилия: <?= $client['last_name'] ?></h3>
<h3>Имя: <?= $client['name'] ?></h3>
<h3>Отчество: <?= $client['middle_name'] ?></h3>
<h3>Дата рождения: <?= $client['date_of_birth'] ?></h3>
<h3>Номер телефона: <?= $client['phone_number'] ?></h3>
<hr>
<form action="create_comment.php" method="post">
    <input type="hidden" name="id" value=" <?= $client['id'] ?>">
    <textarea name="body"></textarea><br><br>
    <button type="submit">Добавить комментарий</button>
</form>
<hr>
<h3>Комментарий:</h3>
<ul>
    <?php
    foreach ($comments as $comment) {
        ?>
        <li><?= $comment[2] ?></li>
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
