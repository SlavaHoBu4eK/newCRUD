<?php
/**
 * @var $clientRepository СlientRepository
 */
include '../src/entity/client.php';
require_once "../common.php";

echo template('header');
echo template('index',['clients'=> $clientRepository->findAll()]);
echo template('footer');

