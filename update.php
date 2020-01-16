<?php
require 'vendor\autoload.php';
$config = require 'config.php';
$connection = Libs\Db::getConnection($config);

$updateItem = 'sortname=\'' . $_POST["sortname"] . '\', name=\'' . $_POST["name"] . '\', phone_code=\'' . $_POST["phone_code"] . '\'';
$countryId = $_POST['country_id'];

$dt = $connection->prepare("UPDATE countries SET $updateItem WHERE id = $countryId");
$dt = $dt->execute();
header('Location: http://localhost/writeDB/index.php');
