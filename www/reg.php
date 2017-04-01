<!-- // written by:Yuwei Jiang -->
<?php
if(!isset($_POST['submit'])){
	exit('Illegal request!');
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
//register check
if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
	exit('Illegal username <a href="javascript:history.back(-1);">Retry</a>');
}
if(strlen($password) < 6){
	exit('Password too short <a href="javascript:history.back(-1);">Retry</a>');
}
if(preg_match('/^([a-zA-Z0-9] [_|-|.]?)*[a-zA-Z0-9] @([a-zA-Z0-9] [_|-|.]?)*[a-zA-Z0-9] .[a-zA-Z]{2,3}$/', $email)){
	exit('Illegal email <a href="javascript:history.back(-1);">Retry</a>');
}
//mysql connect
include('./classes/dbConnector.php');
//duplicate user check
$qry = "select id from user where username='$username' limit 1";
$check_query = mysqli_query($connect,$qry);

if(mysqli_fetch_array($check_query)){
	echo 'Username: ',$username,' exists <a href="javascript:history.back(-1);">Retry</a>';
	exit;
}
//write to mysql
$password = MD5($password);
$regdate = time();
$sql = "INSERT INTO user(username,pass,email,regdate)VALUES('$username','$password','$email',$regdate)";
if(mysqli_query($connect,$sql)){
	exit('Register successful <a href="login.html">Log in</a>');
} else {
	echo 'Mysql error: ',mysql_error(),'<br />';
	echo 'Click to <a href="javascript:history.back(-1);">Retry</a>';
}

?>
