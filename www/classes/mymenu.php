<!-- // written by:Yuwei Jiang -->
<?php
    if(isset($_SESSION['userid'])){
        echo '<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="my_profile.php">Profile</a></li>
            <li role="separator" class="divider"></li>';
        if($userid<10){
            echo '<li><a href="admin/index.php">Admin</a></li>
            <li role="separator" class="divider"></li>';
        }
        echo '<li><a href="login.php?action=logout">Log out</a></li>
            </ul>
            </li>';
    }
    else{
        echo '<ul class="nav navbar-nav"><li><a href="login.html">Log In </a></li></ul>';
    }
?>
