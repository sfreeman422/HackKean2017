<?php

$itemid = '007874235205';
// $itemid = $_GET['itemid'];

?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript">
        var itemid = pad(<?php echo $itemid ?>, 12);
        $(document).ready(function () {
            $.ajax({
                type:"GET", 
                url: "http://api.walmartlabs.com/v1/search?query="+itemid+"&format=json&apiKey=bt2hkmve2uxc8tmfzwn42kfy", 
                success: function(data) {
                        $("body").append(JSON.stringify(data["items"][0]["upc"]));
                        getupc(pad(data["items"][0]["upc"],10));
                        // $("body").append(JSON.stringify(data));
                    }, 
                error: function(jqXHR, textStatus, errorThrown) {
                        alert(jqXHR.status);
                    },
            dataType: "jsonp"
            });
        });
        function pad(number,n) {
            var str = '' + number;
            while (str.length < n) {
                str = '0' + str;
            }
            return str;
        }
        function getupc(upcnumber) {
            console.log(upcnumber);
            $.ajax({
                type:"GET", 
                url: "https://api.nutritionix.com/v1_1/item?upc="+upcnumber+"&appId=27b8a449&appKey=2480417aee6635ea422d5bd2c05376b8", 
                success: function(data) {
                        $("body").append(JSON.stringify(data));
                    }, 
                error: function(jqXHR, textStatus, errorThrown) {
                        alert(jqXHR.status);
                    },
            dataType: "jsonp"
            });
        }
        // function getjson() {
        //     var itemid = "<?php echo $itemid ?>";
        //     var jsonData = $.ajax({
        //         url: "http://api.walmartlabs.com/v1/search?query="+itemid+"&format=json&apiKey=bt2hkmve2uxc8tmfzwn42kfy",
        //         dataType:"json",
        //         async: false
        //     }).responseText;
            
        // }

    </script>

</head>

<body>



</body>
</html>

