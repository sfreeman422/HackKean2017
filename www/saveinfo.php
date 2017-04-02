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

$userheight=$_POST['userheight'];
$userheight2=$_POST['userheight2'];
$userweight=$_POST['userweight'];
$age=$_POST['age'];
$gender=$_POST['gender'];

// echo $userid;
// echo $username;
// echo $userheight;
// echo $userheight2;
// echo $userweight;

//calculate the calories
$cal = 4.53592 * $userweight + 15.875 * ( 12 * $userheight + $userheight2 ) - 5 * $age;
if($gender == 1) {
    $cal = $cal + 5;
} else if($gender == 2) {
    $cal = $cal - 161;
} else {
    $cal = 0;
}
echo $cal;

$qry = "select id from user_measurement where username='$username' limit 1";
$check_query = mysqli_query($connect,$qry);
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

echo "<p> Update Successful! </p>";
echo '<script language="javascript">window.location.href="index.php";</script>' ;

?>