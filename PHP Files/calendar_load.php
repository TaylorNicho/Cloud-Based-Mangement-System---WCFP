<?php

session_start();
include_once("db_functions.php");
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);
//load.php
if(isset($_SESSION['bid']))
    $bid = $_SESSION["bid"];
else
    $bid = 0;

$connect = new PDO('mysql:host=localhost;dbname=CET233-ProjectV2', 'unifirm', '@Un1f1rm@');

$data = array();

$Sql = "SELECT * FROM Appointment, Branch WHERE A_BranchID=BranchID";
if($bid!=0)
    $Sql = $Sql . " AND A_BranchID=:A_BranchID";
$Sql = $Sql . " ORDER BY AppointmentID";

$statement = $connect->prepare($Sql);
if($bid!=0)
    $statement->bindParam(':A_BranchID', $bid, PDO::PARAM_INT);
$statement->execute();
$result = $statement->fetchAll();

foreach ($result as $row) {
    $data[] = array(
        'id' => $row["AppointmentID"],
        'title' => $row["A_Note"],
        'start' => $row["A_Start"],
        'end' => $row["A_End"],
        'color' => $row["B_Colour"]
    );
}

echo json_encode($data);
