<!-- // written by:Yuwei Jiang -->
<?php
session_start();

//log out
if($_GET['action'] == "logout"){
	unset($_SESSION['userid']);
	unset($_SESSION['username']);
	echo 'Log out successful. Redirecting back...';
    echo '<script language="javascript">history.go(-1);</script>';
}

//Log in
if(!isset($_POST['submit'])){
	exit('Log in illegal!');
}
$username = htmlspecialchars($_POST['username']);
$password = MD5($_POST['password']);

include('./classes/dbConnector.php');
//check username and password
// echo $username;
// echo $password;
$qry = "select id from users where username='$username' and password='$password' limit 1";
$check_query = mysqli_query($connect,$qry);
// var_dump($check_query);
if($result = mysqli_fetch_array($check_query)){
	//log in successful
	$_SESSION['username'] = $username;
	$_SESSION['userid'] = $result['id'];
    echo 'Login successful. Redirecting to index...';
    echo '<script language="javascript">window.location.href="index.php";</script>';
} else {
	exit('Log in failed <a href="javascript:history.back(-1);">Retry</a>');
}
?>
