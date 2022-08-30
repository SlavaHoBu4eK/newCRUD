<?php
/**
 * @var $commentRepository СommentRepository
 */
require_once "../common.php";
require_once '../src/entity/comment.php';


if (!empty($_POST)) {
    $entity = new Comment(
        $_POST['body'] ?? "",
        $_POST['client_id'] ?? ""
    );

    $createComment = $commentRepository->create($entity);

    if ($createComment) {
        header('Location: view.php?id=' . $entity->getClientId());

    } else {
        echo 'not success';
    }
} else {
    echo "Request data is required!";
}




