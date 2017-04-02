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

$new_entry = "INSERT INTO foodtrack (username, userheight, userheigh2, userweight, age, gender, cal) VALUES ($username,'$username',$userheight,$userheight2,$userweight, $age, $gender, $cal)";
$check_query = mysqli_query($connect,$new_entry);
if(!mysqli_fetch_array($check_query)){
	$new_entry = "INSERT INTO user_measurement (id, username, userheight, userheigh2, userweight, age, gender, cal) VALUES ($userid,'$username',$userheight,$userheight2,$userweight, $age, $gender, $cal)";
    $new_entry_query = mysqli_query($connect, $new_entry);
    // echo "insert new entity. <br>";
    // echo "$new_entry <br>";
    // var_dump( $new_entry_query);
}

$update_entry = "UPDATE user_measurement SET id=$userid, username = '$username', userheight=$userheight, userheigh2=$userheight2, userweight=$userweight, age=$age, gender=$gender, cal=$cal WHERE username = '$username' ";
$update_entry_query = mysqli_query($connect, $update_entry);
// echo $update_entry;
echo $update_entry_query->error;

?>