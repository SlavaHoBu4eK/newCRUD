<?php
try {
    require "../config.php";
    require "../common.php";
    if (isset($_GET['id'])) {

        $client_id = ($_GET['id']);
        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * FROM client WHERE id = :client_id AND deleted_at IS NULL";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':client_id', $client_id);
        $statement->execute();
        $client = $statement->fetchObject();
    }
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

if (!empty($client)){
?>
<?php require_once 'templates/header.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    <link rel="icon" href="/img/favicon_gym.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/main.css">
    <title></title>
</head>
<body>
<?php

if (isset($_POST['id']) && $statement) {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $id = $_POST['id'];
        $lastname = $_POST['lastname'];
        $name = $_POST['name'];
        $middlename = $_POST['middlename'];
        $birthday = $_POST['birthday'];
        $phone = $_POST['phone'];

        $sql = "UPDATE client SET
                    last_name ='$lastname',
                    name = '$name',
                    middle_name = '$middlename',
                    date_of_birth ='$birthday',
                    phone_number = '$phone'
                WHERE id = '$id'";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $client = $statement->fetch(PDO::FETCH_ASSOC);


    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
    ?>


    Изменения для аккаунта <?= $lastname . ' ' . $name . ' ' . $middlename ?> успешно сохранены. Для того, чтоб вернуться на главную страницу, нажмите
    <a href="index.php">вперед</a>

    <?php
} else {
    ?>
    <h3>Изменение данных клиента</h3>
    <form action="" method="post">
        <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
        <input type="hidden" name="id" value="<?= escape($client->id) ?>">
        <p>Фамилия:</p>
        <label>
            <input type="text" name="lastname" value="<?= escape($client->last_name) ?>">
        </label>
        <p>Имя:</p>
        <label>
            <input type="text" name="name" value="<?= escape($client->name) ?>">
        </label>
        <p>Отчество:</p>
        <label>
            <input type="text" name="middlename" value="<?= escape($client->middle_name) ?>">
        </label>
        <p>Дата рождения:</p>
        <label>
            <input type="date" name="birthday" value="<?= escape($client->date_of_birth) ?>">
        </label>
        <p>Номер телефона:</p>
        <label>
            <input type="text" name="phone" value="<?= escape($client->phone_number) ?>">
        </label>
        <button type="submit">Изменить</button>
        <br><br>
    </form>
<?php } ?>
</body>
<?php }
else { ?>
    Пользователя с данным id не существует. Для того, чтоб вернуться на главную страницу, нажмите
    <a href="index.php">вперед</a>

    <?php
}
?>
<?php require_once 'templates/footer.php'; ?>

