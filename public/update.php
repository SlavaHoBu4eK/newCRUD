<?php

require_once "../common.php";
include '../templates/header.php';

$id = $_GET['id'] ?? '';

try {
    if (!empty($id)) {
        $sql = $connection->prepare("SELECT * FROM client WHERE id = :client_id AND deleted_at IS NULL");
        $sql->execute(['client_id' => $id]);
        $client = $sql->fetchObject();
    }
} catch (PDOException $error) {
    echo "Oops... something went wrong! Please try later. Details: {$error->getMessage()}";
}

if(!empty($_GET) && empty($client)){
    ?> Пользователя с данным id не существует. Для того, чтоб вернуться на главную страницу, нажмите <a
            href="index.php">вперед</a> <?php
}

if (!empty($_POST)) { ?>

    <?php
    try {
        $statement = $connection->prepare("UPDATE client SET 
                  last_name = ?, 
                  name = ?, 
                  middle_name = ?, 
                  date_of_birth = ?, 
                  phone_number = ? 
              WHERE id = ?");

        $statement->execute([
            $_POST['lastname'] ?? '',
            $_POST['name'] ?? '',
            $_POST['middlename'] ?? '',
            $_POST['birthday'] ?? '',
            $_POST['phone'] ?? '',
             $_POST['id'] ?? ''
        ]);

        $client = $statement->fetch(PDO::FETCH_ASSOC);
        ?>
        Изменения  успешно сохранены. Для того, чтоб вернуться на главную страницу, нажмите <a
                href="index.php">вперед</a>
        <?php
    } catch (PDOException $error) {
        echo "Oops... something went wrong! Please try later. Details: {$error->getMessage()}";
    }
} elseif ($client !== false) {
    ?>
    <h3>Изменение данных клиента</h3>
    <form action="" method="post">
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

    <?php
}
require_once '../templates/footer.php';

