<!--container fluid-->
<nav class="navbar navbar-default navbar-fixed-top"  role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">HackKean2017</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!--left navigation begins-->
      <?php require("leftmenu.php"); ?>
      <!--left navigation ends-->

      <!--right navigation begins-->
      <ul class="nav navbar-nav navbar-right">
          <!--navigation search begins-->

        <!--navigation search ends-->

        <!--my menu begins-->
        <?php require("mymenu.php"); ?>
        <!--my menu ends-->

      </ul>
      <!--right navigation ends-->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--container fluid ends-->