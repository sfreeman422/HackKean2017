<?php

$itemid = "007874235205";
// $itemid = $_GET['itemid'];

?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajax({
                type:"GET", 
                url: "http://api.walmartlabs.com/v1/search?query="+itemid+"&format=json&apiKey=bt2hkmve2uxc8tmfzwn42kfy", 
                success: function(data) {
                        $("body").append(JSON.stringify(data));
                    }, 
                error: function(jqXHR, textStatus, errorThrown) {
                        alert(jqXHR.status);
                    },
            dataType: "jsonp"
            });
        });
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

