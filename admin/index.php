<?php 
require_once 'includes/connection.php';
if($_SESSION['adminid']!="")
{
  echo "<script>window.location='adminstrator.php';</script>";
}


if($err == ''){$err = $_REQUEST['err'];}
if($upd == ''){$upd = $_REQUEST['upd'];}



if(isset($_REQUEST['login']))
{
	$name     = $_REQUEST['username'];
	$password = $_REQUEST['password'];

if($name!='' && $password!=''){
$check    = "SELECT * FROM `ex_admin` WHERE `username`='$name' AND `password` = '$password' ";
$result   = $Q($link,$check);
$count    = $C($result);

if($count>=1)
	{
      $row_admin           = $F($result);
	  $_SESSION['adminid'] = $row_admin['id'];

	  echo "<script>window.location='adminstrator.php';</script>";
    }

	else
    {
      header("location:?err=1");
    }
}
	else
    {
      header("location:?err=1");
    }
}

if($up == ''){$up = $_REQUEST['up'];}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>::<?php echo $sitename?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">


<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script src="js/validation.js" type="text/javascript"></script>
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!--[if lt IE 9]>
  <div style=' clear: both; text-align:center; position: relative;'>
      <a href="//windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a>
  </div>
<![endif]-->
</head>

<body>

<?php require_once 'common/header.php';?>
    

<div class="container">

      <form class="form-signin"  id="register-form" novalidate name="form1" method="post">
         <div align="center" style="font-size:11px;">
	<?php 
	 if($err == '1') 
	  { 
	   echo "<strong><font color=#FB3A3A>
	   Username or Password Dosen't Match! Please Login Again</font></strong>";
	  } 
	 ?>
	 <?php 
	 if($upd == '1') 
	  { 
	   echo "<strong><font color=#FB3A3A>
	   Update Sucessfull Please Login Again</font></strong>";
	  } 
	 ?>
	  <?php 
	 if($upd == '2') 
	  { 
	   echo "<strong><font color=#FB3A3A>
	   Successfully Logged out</font></strong>";
	  } 
	 ?>
	</div>
        <h4 class="form-signin-heading">ADMINISTRATOR LOGIN</h4>
        <input type="text" class="input-block-level" placeholder="Username..." maxlength="50" name="username">
        <input type="password" class="input-block-level" placeholder="Password..." maxlength="10" name="password">
        <input type="submit" class="btn btn-inverse"  name="login" value="SIGN IN">
      </form>

</div>











    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/scripts.js"></script>

	
  </body>
</html>
