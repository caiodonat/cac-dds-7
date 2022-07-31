<?php

use PDO;

class Connect
{
    /**
     * @var PDO
     */
    private static $connect;
    public static function connect()
    {
        if (!static::$connect) {
            static::$connect = new \PDO('mysql:host=194.163.44.92;dbname=cac', 'Bep', '2002', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        }
        return static::$connect;
    }
}
