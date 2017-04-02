<?php

// $itemid = '007874235205';
// $itemid = $_GET['itemid'];
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

$itemlist = array();
for($i = 0; $i < $number; $i++) {
    array_push($itemlist, substr($itemid,12 * i,12));
}

?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript">
        // console.log(parseInt(<?php echo json_encode($itemid) ?>));
        // var itemid = pad(<?php echo json_encode($itemid) ?>, 12);
        // var itemname;
        var itemcal = 160;
        var itemlist = <?php echo json_encode($itemlist) ?>;
        for(i = 0; i < itemlist.length; i++) {
            getwalmart(itemlist[i]);
        }
        function getwalmart(itemid) {
            // getupc(pad(078742352053, 10));
            $.ajax({
                type:"GET", 
                url: "http://api.walmartlabs.com/v1/search?query="+itemid+"&format=json&apiKey=bt2hkmve2uxc8tmfzwn42kfy", 
                success: function(data) {
                        // $("body").append(JSON.stringify(data["items"][0]["upc"]));
                        console.log(JSON.stringify(data));
                        $("body").append(JSON.stringify(data["items"][0]["name"]));
                        itemname = JSON.stringify(data["items"][0]["name"]);
                        getupc(pad(data["items"][0]["upc"],10));
                        // $("body").append(JSON.stringify(data));
                    }, 
                error: function(jqXHR, textStatus, errorThrown) {
                        alert(jqXHR.status);
                    },
            dataType: "jsonp"
            });
        }
        function pad(number,n) {
            var str = '' + number;
            while (str.length < n) {
                str = '0' + str;
            }
            return str;
        }
        function getupc(upcnumber) {
            console.log(upcnumber);
            // $.ajax({
            //     type:"GET", 
            //     url: "https://api.nutritionix.com/v1_1/item?upc="+upcnumber+"&appId=27b8a449&appKey=2480417aee6635ea422d5bd2c05376b8", 
            //     success: function(data) {
            //             // console.log(JSON.stringify(data));
            //             $("body").append(JSON.stringify(data));
            //         }, 
            //     error: function(jqXHR, textStatus, errorThrown) {
            //             alert(jqXHR.status);
            //         },
            // dataType: "jsonp"
            // });


            // $.ajax({
            //     url: "https://api.nutritionix.com/v1_1/item?upc="+upcnumber+"&appId=27b8a449&appKey=2480417aee6635ea422d5bd2c05376b8", 
            //     method: "get"
            // }).done(function(data){
            //     //do stuff                
            //     // $("body").append(JSON.stringify(data));
            //     $("body").append(JSON.stringify(data["nf_calories"]));
            //     itemcal = JSON.stringify(data["nf_calories"]);
            //     savetomysql();
            // });
            savetomysql();
        }
        function savetomysql() {
            console.log('itemname'+itemname);
            console.log('itemcal'+itemcal);
            $.ajax({
                url: "./savetomysql.php?itemname="+itemname+"&itemcal="+itemcal, 
                method: "get"
            });
        }


    </script>

</head>

<body>



</body>
</html>

