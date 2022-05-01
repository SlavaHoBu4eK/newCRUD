<body>
<h3>Добавление нового клиента</h3>
<form action="pages/create.php" method="post">
    <label>Фамилия:</label>
    <input type="text" name="lastname" placeholder="Введите фамилию">
    <label>Имя:</label>
    <input type="text" name="name" placeholder="Введите имя">
    <label>Отчество:</label>
    <input type="text" name="middlename" placeholder="Введите отчество">
    <label>Дата рождения:</label>
    <input type="date" name="birthday" placeholder="Введите дату рождения">
    <label>Номер телефона:</label>
    <input type="text" name="phone" placeholder="Введите номер телефона">
    <button type="submit">Добавить нового клиента</button>
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
    $clients = mysqli_query($connect, "SELECT*FROM `client`");
    $clients = mysqli_fetch_all($clients);
    foreach ($clients as $client) {
        ?>


        <tr>
            <td><?= $client[0] ?></td>
            <td><?= $client[1] ?></td>
            <td><?= $client[2] ?></td>
            <td><?= $client[3] ?></td>
            <td><?= $client[4] ?></td>
            <td><?= $client[6] ?></td>
            <td><a href="pages/update.php?id=<?= $client[0] ?>">Редактировать</a></td>
            <td><a href="pages/delete.php?id=<?= $client[0] ?>">Удалить</a></td>
            <td><a href="pages/view.php?id=<?= $client[0] ?>">Просмотреть</a></td>
        </tr>

        <?php
    }
    ?>
</table>
</body>
<?php require_once 'blocks/footer.php'; ?>

</html>