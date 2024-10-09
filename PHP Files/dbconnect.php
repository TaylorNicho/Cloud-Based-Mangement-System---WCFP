<?php

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

$DbServer = "localhost";
$DbUser = "unifirm";
$DbPass = "@Un1f1rm@";
$DbName = "CET233-Project";

try
{
    $conn = new PDO("mysql:host=$DbServer;dbname=$DbName", $DbUser, $DbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

?>