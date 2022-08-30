<h3>Добавление нового клиента</h3>
<form action="create.php" method="post">
    <label>Фамилия:</label>
    <label>
        <input type="text" name="last_name" placeholder="Введите фамилию">
    </label>
    <label>Имя:</label>
    <label>
        <input type="text" name="name" placeholder="Введите имя">
    </label>
    <label>Отчество:</label>
    <label>
        <input type="text" name="middle_name" placeholder="Введите отчество">
    </label>
    <label>Дата рождения:</label>
    <label>
        <input type="date" name="birthday" placeholder="Введите дату рождения">
    </label>
    <label>Номер телефона:</label>
    <label>
        <input type="text" name="phone" placeholder="Введите номер телефона">
    </label>
    <button type="submit" name="submit">Добавить нового клиента</button>
</form>

<br><br>
<table>
    <tr>
        <th>ID</th>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Дата рождения</th>
        <th>Номер телефона</th>
        <th>Редактирование</th>
        <th>Удаление</th>
        <th>Просмотр</th>
    </tr>

    <?php
    $sn = 1;

    foreach ($clients as $client) : ?>
        <tr>
            <td><?= $sn++ ?>.</td>
            <td><?= $client->getLastName() ?></td>
            <td><?= $client->getName() ?></td>
            <td><?= $client->getMiddleName() ?></td>
            <td><?= $client->getBirthday() ?></td>
            <td><?= $client->getPhone() ?></td>
            <td><a href="update.php?id=<?= $client->getId() ?>">Редактировать</a></td>
            <td><a href="delete.php?id=<?= $client->getId() ?>">Удалить</a></td>
            <td><a href="view.php?id=<?= $client->getId() ?>">Просмотреть</a></td>
        </tr>
    <?php endforeach; ?>
</table>