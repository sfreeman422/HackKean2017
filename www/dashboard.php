<!-- // written by:Yuwei Jiang -->

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


<!--put your stuff here-->
<div class="container-fluid">
    <div class="row">
        <!--sidebar begins-->
        <?php require('./classes/dashboard_sidebar.php') ?>
        <!--sidebar ends-->

        <!--main column begins-->
        <div class="col-sm-8 col-md-9 main">
            <p>If you havn't done so, please update your body measurement <a href="body_measurement.php"> here </a>. </p>
            <p>Upload your receipt</p>
            <!--<form method="post" enctype="multipart/form-data" action="localhost:2000/upload">
                <div class="col-sm-2 col-md-3"><input type="file" name="userPhoto"></div>
                <div class="col-sm-2 col-md-3"><input type="submit" class="btn btn-primary btn-primary" value="Upload Image" name="submit"></div>-->
            <a href = "http://hackkean2017u-jiangyuweicn603876.codeanyapp.com:2000"> Upload your Receipt to scan here. </a>
        </div>
        <!--main column ends-->

    </div>
</div>





</body>
</html>
