<?php

$number = $_GET['number'];
$itemid = $_GET['itemid'];

// session_start();
// if(isset($_SESSION['userid'])){
//     require_once('./classes/dbConnector.php');
//     $userid = $_SESSION['userid'];
//     $username = $_SESSION['username'];
// }
// else{
//     header("Location:index.php"); exit();
// }

// echo $number;
// echo $itemid;

$itemlist = array();
for($i = 0; $i < $number; $i++) {
    array_push($itemlist, substr($itemid,12 * i,12));
}
var_dump($itemlist);
?>