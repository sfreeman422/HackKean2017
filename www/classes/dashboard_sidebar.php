<?php
    $pagename = basename($_SERVER['PHP_SELF']);
?>


<div class="col-sm-3 col-md-2 sidebar" style="padding-right:20px; border-right: 1px solid #ccc;">
<!--<div class="col-sm-3 col-md-2 sidebar">-->
    <ul class="nav nav-sidebar">
        <?php if($pagename == 'dashboard.php') echo '<li class="active">'; else echo '<li>'; ?>
            <a href="dashboard.php">Overview</a></li>
        <?php if($pagename == 'step.php') echo '<li class="active">'; else echo '<li>'; ?>
            <a href="step.php">Step</a></li>
        <?php if($pagename == 'sleep.php') echo '<li class="active">'; else echo '<li>'; ?>
            <a href="sleep.php">Sleep Time</a></li>
        <?php if($pagename == 'exercise.php') echo '<li class="active">'; else echo '<li>'; ?>
            <a href="exercise.php">Exercise Time</a></li>
        <?php if($pagename == 'cal.php') echo '<li class="active">'; else echo '<li>'; ?>
            <a href="cal.php">Calories Burned</a></li>
        <?php if($pagename == 'trackfood.php') echo '<li class="active">'; else echo '<li>'; ?>
            <a href="trackfood.php">Track Food</a></li>
        <?php if($pagename == 'friend.php') echo '<li class="active">'; else echo '<li>'; ?>
            <a href="friend.php">Friend</a></li>
    </ul>
</div>