<!-- // written by:Yuwei Jiang -->

<?php
session_start();
if(isset($_SESSION['userid'])){
    require_once('./classes/dbConnector.php');
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>HackKean2017</title>
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
    <?php 
        if(!isset($_SESSION['userid'])) require('index_content.php'); 
        else{ header("Location:dashboard.php"); exit(); }
        ?>
    <!--main colume ends-->

  </div><!-- //row -->
</div>
<!--main container ends-->
</body>
</html>
