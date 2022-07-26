<?php
error_reporting(-1);
ini_set('display_errors', 1);

?>

<?php
require '../config/connect.php';
require '../blocks/header.php';
$client_id = ($_GET['id']);

$sql = $pdo->prepare("SELECT * FROM client WHERE id = :client_id AND deleted_at IS NULL");
$sql->execute(['client_id' => $client_id]);
$client = $sql->fetch(PDO::FETCH_OBJ);


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
    <title></title>
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

    $sql = $pdo->prepare("UPDATE client SET
                    last_name ='$lastname',
                    name = '$name',
                    middle_name = '$middlename',
                    date_of_birth ='$birthday',
                    phone_number = '$phone'
                WHERE id = '$id'");
    $sql->execute();
    $client = $sql->fetch(PDO::FETCH_ASSOC);


    ?>

    Изменения для аккаунта <?= $lastname . ' ' . $name . ' ' . $middlename ?> успешно сохранены. Для того, чтоб вернуться на главную страницу, нажмите
    <a href="/index.php">вперед</a>

    <?php
} else {
    ?>
    <h3>Изменение данных клиента</h3>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $client->id ?>">
        <p>Фамилия:</p>
        <label>
            <input type="text" name="lastname" value="<?= $client->last_name ?>">
        </label>
        <p>Имя:</p>
        <label>
            <input type="text" name="name" value="<?= $client->name ?>">
        </label>
        <p>Отчество:</p>
        <label>
            <input type="text" name="middlename" value="<?= $client->middle_name ?>">
        </label>
        <p>Дата рождения:</p>
        <label>
            <input type="date" name="birthday" value="<?= $client->date_of_birth ?>">
        </label>
        <p>Номер телефона:</p>
        <label>
            <input type="text" name="phone" value="<?= $client->phone_number ?>">
        </label>
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
