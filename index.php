<table>
    <?php
    require 'vendor\autoload.php';

    echo '<a href="form.php">CREATE</a>';

    $config = require 'config.php';

    $connection = Libs\Db::getConnection($config);

    echo '<tr><td>id</td><td>sort-name</td><td>name</td><td>phone code</td><td>Action</td></tr>';

    $getData = $connection->prepare("SELECT * FROM countries");
    $getData->execute();
    $data = $getData->fetchAll();
    foreach ($data as $country) {
        echo '<tr>' . '<td>' . $country['id'] . '</td>' . '<td>' . $country['sortname'] . '</td>' . '<td>' . $country['name'] . '</td>' . '<td>' . $country['phone_code'] . '</td>' . '<td><a href="form.php?id=' . $country['id'] . '">update</a> ' . '<a href="delete.php?id=' . $country['id'] .
            '">delete</a></td>';
    }
    ?>
</table>