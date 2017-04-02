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

$qry = "select * from foodtrack where username='$username' ";
$check_query = mysqli_query($connect,$qry);
var_dump($check_query);
$foodname = array();
$foodcal = array();
$foodprice = array();

$row = array();
while($row = mysql_fetch_array($check_query)){
    var_dump($row);
    array_push($foodname, $row['foodname']);
    array_push($foodcal, $row['foodcal']);
    array_push($foodprice, $row['price']);
    echo $foodname; 
    echo $foodcal;
    echo $foodprice;
}
?>

<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript">


    </script>

</head>
<body>

</body>
</html>