<!-- // written by:Yuwei Jiang -->

<?php
session_start();

if(!isset($_SESSION['userid'])){
	header("Location:login.html");
	exit();
}

include('./classes/dbConnector.php');
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
//require user info
$user_info_qry = "select * from user where userid=$userid limit 1";
$user_info_query = mysqli_query($connect,$user_info_qry);
$row = mysqli_fetch_array($user_info_query);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>NutraSnap</title>
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
   <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Abel|Open+Sans:400,600" rel="stylesheet" />
   <link href="./css/default.css" rel="stylesheet" type="text/css" />
</head>
<body>

<!--topbar begins-->
<?php include './classes/topbar.php' ?>
<!--topbar ends-->

<!--main container begins-->
<div class="container-fluid">
  <div class="row">

    <!--main colume begins-->
    <div class="col-md-10 col-md-offset-1 panel panel-default">
        <h1>User Info:</h1>
        <p>
        <?php
            echo 'User ID: ',$userid,'<br />';
            echo 'User Name: ',$username,'<br />';
            echo 'Email: ',$row['email'],'<br />';
            echo 'Regdate: ', date("Y-m-d", $row['regdate']),'<br />';
            echo '----Base Health Info----';
            echo 'Height:';
            echo 'Weight:';
            echo 'Recomended Calorie Intake:';
            echo '----Returned Info on Health';

        
        ?>
        </p>
    </div>
    <!--main colume ends-->

  </div><!-- //row -->
</div>
<!--main container ends-->
</body>
</html>
