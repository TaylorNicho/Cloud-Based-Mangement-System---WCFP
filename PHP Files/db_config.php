<?php

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

class DatabaseConfig
{
    private static $singleton;
    public function __construct()
    {
        if(empty(self::$singleton))
            self::$singleton = $this;
        return self::$singleton;
    }
    public function connect($host = "localhost", $username = "unifirm", $password = "@Un1f1rm@", $database = "CET233-ProjectV2")
    {
        // Create connection
        try {
            $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            return $conn;
        } catch (mysqli_sql_exception $e) {
            throw $e;
            die();
        }
    }
}
