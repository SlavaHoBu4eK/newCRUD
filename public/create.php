<?php

require_once "../common.php";

include '../templates/header.php';

if (isset($_POST['submit'])) {

    $isSaved = false;

    try {
        $isSaved = $connection
            ->prepare("INSERT INTO client ( last_name, name, middle_name, date_of_birth, phone_number) VALUES (?,?,?,?,?)")
            ->execute([
                    $_POST['lastname'] ?? "",
                    $_POST['name'] ?? "",
                    $_POST['middlename'] ?? "",
                    $_POST['birthday'] ?? "",
                    $_POST['phone'] ?? ""
            ]);
    } catch (PDOException $error) {
        echo $error->getMessage();
    }

    if ($isSaved) { ?>
        <blockquote> Запись для аккаунта успешно создана. Для того, чтоб вернуться
            на главную страницу, нажмите <a href="index.php">вперед</a>.
        </blockquote>
    <?php } else {
        echo "Something went wrong! Please try later.";
    }
} else {
    echo "Request data is required!";
}

include '../templates/footer.php';
