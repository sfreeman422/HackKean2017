<?php

$number = $_GET['number'];
$itemid = $_GET['itemid'];

// session_start();
// if(isset($_SESSION['userid'])){
//     require_once('./classes/dbConnector.php');
//     $userid = $_SESSION['userid'];
//     $username = $_SESSION['username'];
// }
// else{
//     header("Location:index.php"); exit();
// }

// echo $number;
// echo $itemid;

$itemlist = array();
for($i = 0; $i < $number; $i++) {
    array_push($itemlist, substr($itemid,12 * i,12));
}
// var_dump($itemlist);
?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript">
        var itemlist = <?php echo json_encode($itemlist) ?>;
        for(i = 0; i < itemlist.length; i++) {
            // console.log(itemlist[i]);
            $.ajax({
                url: "./walmartAPI.php?itemname="+itemlist[i], 
                method: "get"
            }).done(function(data){ 
                $("body").append(JSON.stringify(data));
            });
            console.log(itemlist[i]);
        }
    </script>

</head>

<body>

</body>
</html>
