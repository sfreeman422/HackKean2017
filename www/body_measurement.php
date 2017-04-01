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
  <title>HackKean2017</title>
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
   <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Abel|Open+Sans:400,600" rel="stylesheet" />
   <link href="./css/default.css" rel="stylesheet" type="text/css" />

   <script type="text/javascript">
    function save_measurement() {
        var userheight = document.getElementById('userheight').value;
        var userheight2 = document.getElementById('userheight2').value;
        var userweight = document.getElementById('userweight').value;
        var jsonData = $.ajax({
                url: "saveinfo.php?uh1="+userheight+"&uh2="+userheight2+"&uw="+userweight,
                dataType:"json",
                async: false
            }).responseText;
        }
   </script>

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
            <p>Let us know you more: </p>
            <form method="post" enctype="multipart/form-data" action="">
                <div class="col-sm-1 col-md-2"><input type="text" name="userheight" id="userheight" ></div>
                <div class="col-sm-1 col-md-2"><input type="text" name="userheight2" id="userheight2" ></div>
                <div class="col-sm-2 col-md-3"><input type="text" name="userweight" id="userweight" ></div>
                <div class="col-sm-2 col-md-3"><input type="button" onclick = "save_measurement()" class="btn btn-info" value="Save" name="submit"></div>

        </div>
        <!--main column ends-->

    </div>
</div>





</body>
</html>
