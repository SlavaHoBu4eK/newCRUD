<?php
/**
 * @var $clientRepository СlientRepository
 */
include '../src/entity/client.php';
require_once "../common.php";
include '../templates/header.php';

?>

<?php $args = $clientRepository->findAll();?>

<?= template('index', $args) ?>

<?php include '../templates/footer.php'; ?>


