<?php 
    $pagename = basename($_SERVER['PHP_SELF']);
    echo '<ul class="nav navbar-nav">';

    //if index.php
    if($pagename == 'index.php'){
        echo '<li class="active"><a href="#">Index <span class="sr-only">(current)</span></a></li>';
    }
    else{
        echo '<li><a href = "index.php">Index </a></li>';
    }

    //if dashboard.php 
    if($pagename == 'dashboard.php' ){
        echo '<li class="active"><a href="#">Dashboard <span class="sr-only">(current)</span></a></li>';
    }
    else{
        echo '<li><a href="dashboard.php">Dashboard</a></li>';
    }
    
    echo '</ul>';


    ?>