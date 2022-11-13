<?php
/**
 * @var $clientRepository СlientRepository
 */

require_once "../common.php";
require_once  '../src/entity/client.php';


echo template('header');

echo template('index', ['clients' => $clientRepository->findAll()]);
echo template('footer');