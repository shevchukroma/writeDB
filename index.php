<table>
    <?php
    require 'vendor\autoload.php';

    $config = require 'config.php';

    $connection = Libs\Db::getConnection($config);

    echo '<tr><td>id</td><td>sort-name</td><td>name</td><td>phone code</td></tr>';

    $getData = $connection->prepare("SELECT * FROM countries");
    $getData->execute();
    $data = $getData->fetchAll();
    foreach ($data as $country) {
        echo '<tr>' . '<td>' . $country['id'] . '</td>' . '<td>' . $country['sortname'] . '</td>' . '<td>' . $country['name'] . '</td>' . '<td>' . $country['phone_code'] . '</td>';
    }
    ?>
</table>