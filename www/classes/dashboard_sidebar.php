<?php
    $pagename = basename($_SERVER['PHP_SELF']);
?>


<div class="col-sm-3 col-md-2 sidebar" style="padding-right:20px; border-right: 1px solid #ccc;">
<!--<div class="col-sm-3 col-md-2 sidebar">-->
    <ul class="nav nav-sidebar">
        <?php if($pagename == 'dashboard.php') echo '<li class="active">'; else echo '<li>'; ?>
            <a href="dashboard.php">Upload a receipt</a></li>
        <?php if($pagename == 'body_measurement.php') echo '<li class="active">'; else echo '<li>'; ?>
            <a href="body_measurement.php">Update Body Measurement</a></li>
        <?php if($pagename == 'result.php') echo '<li class="active">'; else echo '<li>'; ?>
            <a href="result.php">Result</a></li>
        <?php if($pagename == 'test.html') echo '<li class="active">'; else echo '<li>'; ?>
            <a href="test.html">Wolfram</a></li>
    </ul>
</div>