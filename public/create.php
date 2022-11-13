<?php
/**
 * @var $clientRepository СlientRepository
 */

require_once "../common.php";
echo template('header');
require_once '../src/entity/client.php';

if (isset($_POST['submit'])) {

    $entity = new Client(
        $_POST['last_name'] ?? "",
        $_POST['name'] ?? "",
        $_POST['middle_name'] ?? "",
        $_POST['birthday'] ?? "",
        $_POST['phone'] ?? ""
    );

    $isSaved = $clientRepository->create($entity);


#$templater->render("templates/create.php", [
#        'isSaved' => $isSaved
#])

    if ($isSaved) { ?>
        <blockquote> Запись для аккаунта успешно создана. Для того, чтоб вернуться
            на главную страницу, нажмите <a href="/">вперед</a>.
        </blockquote>
    <?php }
     else {
        echo "Something went wrong! Please try again later.";

    }
} else {
    echo "Request data is required!";
}

echo template('footer');

