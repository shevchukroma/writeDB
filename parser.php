<?php
require 'vendor\autoload.php';

$config = require 'config.php';

$connection = Libs\Db::getConnection($config);

$names = file_get_contents('countries.json');
$countries = json_decode($names, true);

$values = '';
foreach ($countries as $country) {
    $values .= '(\'' . $country['sortname'] . '\', \'' . $country['name'] . '\', \'' . $country['phone_code'] . '\'), ';
}

echo ($countries['1']['id']);

$values = rtrim($values, ', ');


$connection->prepare('TRUNCATE TABLE countries')->execute();
try {
    $connection->prepare("INSERT INTO countries (sortname, name, phone_code) VALUES $values;")->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}
