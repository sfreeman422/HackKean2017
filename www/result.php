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
// var_dump($check_query);
$foodname = array();
$foodcal = array();
$foodprice = array();

$row = array();
while($row = mysqli_fetch_array($check_query)){
    // var_dump($row);
    array_push($foodname, $row['foodname']);
    array_push($foodcal, $row['foodcal']);
    array_push($foodprice, $row['price']);
    // echo $foodname; 
    // echo $foodcal;
    // echo $foodprice;
}
?>

<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript">

    var foodname = <?php echo json_encode($foodname) ?>;
    var foodcal = <?php echo json_encode($foodcal) ?>;
    var foodprice = <?php echo json_encode($foodprice) ?>;
    console.log(JSON.stringify(foodname));
    console.log(JSON.stringify(foodcal));
    console.log(JSON.stringify(foodprice));
    var calsum = 0
    for(var i=0, len=foodcal.length; i<len; i++){
    foodcal[i] = parseInt(foodcal[i], 10);
}
	for (var i = 0, calsum = 0; i < foodcal.length; calsum += foodcal[i++])
    	;    
	console.log(calsum); // 6
    </script>

</head>
<body>

</body>
</html>