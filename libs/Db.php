<?php

namespace Libs;

use Exception;

class Db
{
    private static $connection = null;

    private static function connect($config)
    {
        try {
            if (!$config) {
                throw new Exception('Помилка зчитування налаштувань для підключення!');
            } else {
                $dsn = $config['driver'] . ":dbname=" . $config['dbname'] . ";host=" . $config['host']. ";port=" . $config['port'] . ";charset=utf8";
                $user = $config['dbuser'];
                $password = $config['dbpassword'];
                if (!$connection = new \PDO($dsn, $user, $password,
                    [
                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                        \PDO::ATTR_EMULATE_PREPARES => false
                    ]
                )
                ) {
                    throw new Exception('Помилка підключення до бази даних.');
                }
                return $connection;
            }
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getConnection($config)
    {
        if (self::$connection == null) {
            self::$connection = self::connect($config);
        }
        return self::$connection;
    }
}