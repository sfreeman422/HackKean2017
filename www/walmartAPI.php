<?php

$itemid = "007874235205";

?>

<html>
<head>

    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'line']});
        google.charts.setOnLoadCallback(drawBasic);
        function drawBasic() {
            var itemid = "<?php echo $_GET['itemid'] ?>";
            var jsonData = $.ajax({
                url: "http://api.walmartlabs.com/v1/search?query="+itemid+"&format=json&apiKey=bt2hkmve2uxc8tmfzwn42kfy",
                dataType:"json",
                async: false
            }).responseText;
            
        }

    </script>

</head>

<body>



</body>
</html>

