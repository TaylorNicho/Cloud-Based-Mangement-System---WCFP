<?php


//insert.php

$connect = new PDO('mysql:host=localhost;dbname=CET233-ProjectV2', 'unifirm', '@Un1f1rm@');

if (isset($_POST["title"])) {
    $query = "
 INSERT INTO Appointment
 (A_Note, A_Start, A_End) 
 VALUES (:A_Note, :A_Start, :A_End)
 ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':A_Note' => $_POST['title'],
            ':A_Start' => $_POST['start'],
            ':A_End' => $_POST['end']
        )
    );
}


