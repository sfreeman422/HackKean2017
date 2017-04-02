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

$new_entry = "INSERT INTO foodtrack (username, foodname, foodcal) VALUES ('$username','$itemname',$itemcal)";
$check_query = mysqli_query($connect,$new_entry);

// echo $update_entry;
echo $update_entry_query->error;

?>