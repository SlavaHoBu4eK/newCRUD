<?php
require_once 'config/connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <title>CRUD на процедурке</title>
    <meta charset="UTF-8">

</head>
<style>
    
    th, td {
        padding: 10px;
    }

    th {
        background: blue;
        color: white;
    }

    td {
        background: yellow;
    }

    form {
        display: flex;
        flex-direction: column;
        width: 300px;
    }
</style>
<body>
<h3>Добавление нового клиента</h3>
<form action="vendor/create.php" method="post">
    <p>Фамилия:</p>
    <input type="text" name="name">
    <p>Имя:</p>
    <input type="text" name="lastname">
    <p>Отчество:</p>
    <input type="text" name="middlename">
    <p>Дата рождения:</p>
    <input type="date" name="birthday">
    <p>Номер телефона:</p>
    <input type="text" name="phone">
    <button type="submit">Добавить нового клиента</button>
    <br><br>
</form>
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
    </tr>

    <?php
    $clients = mysqli_query($connect, "SELECT*FROM `client`");
    $clients = mysqli_fetch_all($clients);
    foreach ($clients as $client) {
        ?>


        <tr>
            <td><?= $client[0] ?></td>
            <td><?= $client[2] ?></td>
            <td><?= $client[1] ?></td>
            <td><?= $client[3] ?></td>
            <td><?= $client[4] ?></td>
            <td><?= $client[6] ?></td>
            <td><a href="update.php?id=<?= $client[0] ?>">Редактировать</a></td>
            <td><a href="vendor/delete.php?id=<?= $client[0] ?>">Удалить</a></td>
        </tr>

        <?php
    }
    ?>
</table>
</body>
</html>