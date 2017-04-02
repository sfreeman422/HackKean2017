<?php

$number = $_POST['number'];
$itemid = $_POST['itemid'];

// session_start();
// if(isset($_SESSION['userid'])){
//     require_once('./classes/dbConnector.php');
//     $userid = $_SESSION['userid'];
//     $username = $_SESSION['username'];
// }
// else{
//     header("Location:index.php"); exit();
// }

echo $number;
echo $itemid;
?>