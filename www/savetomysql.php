<?php

session_start();
if(isset($_SESSION['userid'])){
    require_once('./classes/dbConnector.php');
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];
}
else{
    header("Location:index.php"); exit();
}

$itemname = $_GET['itemname'];
$itemcal = $_GET['itemcal'];

echo $itemname;
echo $itemcal;


?>