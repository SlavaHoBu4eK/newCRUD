<?php
require "../config.php";
require "../common.php";

if (isset($_POST['submit'])) {
$sql="";
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $lastname = $_POST['lastname'];
        $name = $_POST['name'];
        $middlename = $_POST['middlename'];
        $birthday = $_POST['birthday'];
        $phone = $_POST['phone'];


        $sql = "INSERT INTO client ( last_name, name, middle_name, date_of_birth, phone_number) VALUES (?,?,?,?,?)";
        $statement = $connection->prepare($sql);
        $statement->execute([$lastname, $name, $middlename, $birthday, $phone]);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
include 'templates/header.php'; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
    <blockquote> Запись для аккаунта <?= $lastname . ' ' . $name . ' ' . $middlename ?> успешно создана. Для того, чтоб
        вернуться на
        главную страницу, нажмите <a href="index.php">вперед</a>.
    </blockquote>
<?php endif; ?>



<?php include 'templates/footer.php'; ?>
