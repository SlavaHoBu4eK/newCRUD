<?php
/**
 * @var $clientRepository СlientRepository
 */
require_once "../common.php";
include '../templates/header.php';
include '../src/entity/client.php';

$id = $_GET['id'] ?? '';
$client = $clientRepository->findOne($id);

if (!empty($_GET) && empty($client)) {
    ?> Пользователя с данным id не существует. Для того, чтоб вернуться на главную страницу, нажмите <a
            href="index.php">вперед</a> <?php
}

if (!empty($_POST)) {

    $client->setLastName($_POST['last_name']);
    $client->setName($_POST['name']);
    $client->setMiddleName($_POST['middle_name']);
    $client->setBirthday($_POST['birthday']);
    $client->setPhone($_POST['phone']);

    $updClient = $clientRepository->update($client);
    if ($updClient) {
        echo 'Изменения данных успешно сохранены';
    } else {
        echo 'Что-то пошло не так, изменения не сохранены';
    }

} elseif ($client !== false) {

    ?>
    <h3>Изменение данных клиента</h3>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= escape($client->getId()) ?>">
        <p>Фамилия:</p>
        <label>
            <input type="text" name="last_name" value="<?= escape($client->getLastName()) ?>">
        </label>
        <p>Имя:</p>
        <label>
            <input type="text" name="name" value="<?= escape($client->getName()) ?>">
        </label>
        <p>Отчество:</p>
        <label>
            <input type="text" name="middle_name" value="<?= escape($client->getMiddleName()) ?>">
        </label>
        <p>Дата рождения:</p>
        <label>
            <input type="date" name="birthday" value="<?= escape($client->getBirthday()) ?>">
        </label>
        <p>Номер телефона:</p>
        <label>
            <input type="text" name="phone" value="<?= escape($client->getPhone()) ?>">
        </label>
        <button type="submit">Изменить</button>
        <br><br>
    </form>

    <?php
}
require_once '../templates/footer.php';

