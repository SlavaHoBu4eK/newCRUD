<?php //require '../system/Routing.php';
//$url = key($_GET);
//$r = new Router();
//$r->addRoute("/view","view.php");
//$r->addRoute("/create","create.php");
//$r->addRoute("/delete","delete.php");
//$r->addRoute("/update","update.php");
//$r->addRoute("/update_comment","update_comment.php");
//
//$r->route("/".$url);
//?>


<?php include 'templates/header.php'; ?>
    <h3>Добавление нового клиента</h3>
    <form action="create.php" method="post">
        <label>Фамилия:</label>
        <label>
            <input type="text" name="lastname" placeholder="Введите фамилию">
        </label>
        <label>Имя:</label>
        <label>
            <input type="text" name="name" placeholder="Введите имя">
        </label>
        <label>Отчество:</label>
        <label>
            <input type="text" name="middlename" placeholder="Введите отчество">
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
<?php $sn = 1; ?>
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
        require "../config.php";
        require "../common.php";
        $clients=[];
        try {
            $connection = new PDO($dsn, $username, $password, $options);
            $sql = $connection->prepare("SELECT * FROM client WHERE deleted_at IS NULL");
            $sql->execute();
            $clients = $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $error) {
            echo  "<br>" . $error->getMessage();
        }

        foreach ($clients as $client) {
            ?>


            <tr>
                <td><?= $sn++ ?>.</td>
                <td><?php echo $client->last_name; ?></td>
                <td><?php echo $client->name ?></td>
                <td><?php echo $client->middle_name ?></td>
                <td><?php echo $client->date_of_birth ?></td>
                <td><?php echo $client->phone_number ?></td>
                <td><a href="update.php?id=<?php echo $client->id ?>">Редактировать</a></td>
                <td><a href="delete.php?id=<?php echo $client->id ?>">Удалить</a></td>
                <td><a href="view.php?id=<?php echo $client->id ?>">Просмотреть</a></td>
            </tr>

            <?php
        }
        ?>
    </table>


<?php include 'templates/footer.php'; ?>