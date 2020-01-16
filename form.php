<?php
require 'vendor\autoload.php';
$config = require 'config.php';
$connection = Libs\Db::getConnection($config);

$stat = $connection->prepare("SELECT * FROM countries");
$stat->execute();
$fulldb = $stat->fetchAll();

$countryId = isset($_GET['id']) ? $_GET['id'] : null;
$sortname = '';
$name = '';
$phone_code = '';

if (!empty($countryId)) {
    if ((int)$countryId > count($fulldb)) {
        header('Location: http://localhost/writeDB/index.php');
    };

    $statement = $connection->prepare("SELECT * FROM countries WHERE id=$countryId");
    $statement->execute();
    $data = $statement->fetchAll();

    $sortname = $data['0']['sortname'];
    $name = $data['0']['name'];
    $phone_code = $data['0']['phone_code'];
}
?>

<form action="<?= (!empty($countryId)) ? 'update.php' : 'create.php' ?>" method="post">
    Sortname: <input type="text" name="sortname" required value="<?= $sortname; ?>"><br>
    Name: <input type="text" name="name" required value="<?= $name; ?>"><br>
    Phone code <input type="text" name="phone_code" required value="<?= $phone_code; ?>"><br>
    <input type="hidden" value="<?= (!empty($countryId)) ? $countryId : '' ?>" name="country_id">
    <button type="submit">SEND DATA</button>
    <a href="index.php">CANCEL</a>
</form>