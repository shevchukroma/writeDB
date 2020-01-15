<?php
    require 'vendor\autoload.php';
    $config = require 'config.php';
    $connection = Libs\Db::getConnection($config);

    $newItem = '(\'' . $_POST["sortname"] . '\', \'' . $_POST["name"] . '\', \'' . $_POST["phone_code"] . '\')';

    $connection->prepare("INSERT INTO countries (sortname, name, phone_code) VALUES $newItem;")->execute();
    header('Location: http://localhost/writeDB/index.php');
