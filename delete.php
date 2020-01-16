<?php
require 'vendor\autoload.php';
$config = require 'config.php';
$connection = Libs\Db::getConnection($config);
$countryId = $_GET['id'];
$connection->prepare("DELETE FROM countries WHERE id = $countryId;")->execute();
header('Location: http://localhost/writeDB/index.php');