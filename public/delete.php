<?php
/**
 * @var $clientRepository СlientRepository
 */
require_once "../common.php";
include '../templates/header.php';

$id = $_GET['id'];

if (!empty($id)) {

    if ($clientRepository->delete($id)) {
        echo 'Данные успешно удалены';
    } else {
        echo "Что-то пошло не так, и данные не были удалены";
    }

} else {
    echo "Request data is required!";
}

include '../templates/footer.php';
