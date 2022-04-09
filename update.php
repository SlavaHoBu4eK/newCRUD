<?php
require_once 'config/connect.php';
$client_id=($_GET['id']);
$client=mysqli_query($connect,"SELECT * FROM `client` WHERE `id` = '$client_id'");
$client=mysqli_fetch_assoc($client);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"

<body>
<h3>Изменение данных клиента</h3>
<form action="vendor/update.php" method="post">
    <input type="hidden" name="id" value="<?=$client['id']?>">
    <p>Фамилия:</p>
    <input type="text" name="name" value="<?=$client['last_name']?>">
    <p>Имя:</p>
    <input type="text" name="lastname" value="<?=$client['name']?>">
    <p>Отчество:</p>
    <input type="text" name="middlename" value="<?=$client['middle_name']?>">
    <p>Дата рождения:</p>
    <input type="date" name="birthday" value="<?=$client['date_of_birth']?>">
    <p>Номер телефона:</p>
    <input type="text" name="phone" value="<?=$client['phone_number']?>">
    <button type="submit">Изменить</button><br><br>
</form>
</body>
</html>
