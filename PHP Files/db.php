<?php

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

class Db
{
    private static $singleton;
    public static function mysqli()
    {
        if(empty(self::$singleton)) {
            $con = new DatabaseConfig();
            self::$singleton = $con->connect();
        }

        return self::$singleton;
    }
}