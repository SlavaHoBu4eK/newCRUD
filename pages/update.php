<?php
error_reporting(-1);
ini_set('display_errors', 1);

?>

<?php
require '../config/connect.php';
require '../blocks/header.php';
$client_id = ($_GET['id']);
$client = mysqli_query($connect, "SELECT * FROM `client` WHERE `id` = '$client_id'");
$client = mysqli_fetch_assoc($client);
if (!empty($client)){
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    <link rel="icon" href="/img/favicon_gym.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
<?php

if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $lastname = $_POST['lastname'];
    $name = $_POST['name'];
    $middlename = $_POST['middlename'];
    $birthday = $_POST['birthday'];
    $phone = $_POST['phone'];
    mysqli_query($connect, "UPDATE `client` SET `last_name` ='$lastname',`name` = '$name',  `middle_name` = '$middlename', `date_of_birth` ='$birthday', `phone_number` = '$phone' WHERE `id` = '$id'"); ?>
    Изменения для аккаунта <?= $lastname . ' ' . $name . ' ' . $middlename ?> успешно сохранены. Для того, чтоб вернуться на главную страницу, нажмите
    <a href="/index.php">вперед</a>

    <?php
    //   header('Location: /');
} else {
    ?>
    <h3>Изменение данных клиента</h3>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $client['id'] ?>">
        <p>Фамилия:</p>
        <input type="text" name="lastname" value="<?= $client['last_name'] ?>">
        <p>Имя:</p>
        <input type="text" name="name" value="<?= $client['name'] ?>">
        <p>Отчество:</p>
        <input type="text" name="middlename" value="<?= $client['middle_name'] ?>">
        <p>Дата рождения:</p>
        <input type="date" name="birthday" value="<?= $client['date_of_birth'] ?>">
        <p>Номер телефона:</p>
        <input type="text" name="phone" value="<?= $client['phone_number'] ?>">
        <button type="submit">Изменить</button>
        <br><br>
    </form>
<?php } ?>
</body>
<?php }
else { ?>
    Пользователя с данным id не существует. Для того, чтоб вернуться на главную страницу, нажмите
    <a href="/index.php">вперед</a>

    <?php
}
?>
<?php require_once '../blocks/footer.php'; ?>
</html>
