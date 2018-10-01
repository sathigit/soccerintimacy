<?php
include 'includes/connection.php';
$getname    = $F($Q($link,"SELECT * FROM `ex_admin` WHERE `id`='$_SESSION[adminid]' "));
?>
  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#"><?php echo $sitename?> Admin Panel</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
            <li><a href="#">Welcome</a></li>
              <li><a href="#"><?php echo $getname['username']; ?></a></li>
              <!--<li><a href="#">Backup Database</a></li>-->
              <li><a href="logout.php">Logout</a></li>
            </ul>
            
  

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    