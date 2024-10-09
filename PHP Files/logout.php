<?php
session_start();

//Destroy session and clear variables
session_destroy();

//Reload index page
header("location:index.php");
?>