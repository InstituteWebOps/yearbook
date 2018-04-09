<?php @session_start();
include('include/_db.php');
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Yearbook Portal</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="details.php">Fill in details for Yearbook<span class="sr-only">(current)</span></a></li>
        <!-- <li><a href="#">Link</a></li> -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <?php
            if(isset($_SESSION['rollno']))
            {
                echo '
                <li><a href="#">Welcome, '.$_SESSION['rollno'].'</a></li>                
                <li><a href="logout.php">Log Out</a></li>';
            } else
            {
                echo '
                <li><a href="login.php">Log In</a></li>';
            }
          ?>
      </ul>
    </div>
  </div>
</nav>