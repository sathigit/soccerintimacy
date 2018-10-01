<?php
include 'includes/connection.php';

if($_SESSION['adminid'] == '')
 {
   echo "<script>window.location='index.php';</script>";
 }


 if(isset($_REQUEST['updates']))
 {
   	$name      = trim(mysqli_real_escape_string($link,$_REQUEST['username']));
	$password  = trim($_REQUEST['password']);
	$email     = trim(mysqli_real_escape_string($link,$_REQUEST['email']));
	
	if($name!='' && $password!='' && $email!=''){ 
	
	function clean_email($maimel = "")
	{
	$maimel = trim($maimel);
	$maimel = str_replace(" ", "", $maimel);
	
	// Check for more than one @
	if (substr_count($maimel, '@') > 1)
	{
	return false;
	}
	
	$maimel = preg_replace("#[\;\#\n\r\*\'\"<>&\%\!\(\)\{\}\[\]\?\\/\s]#", "", $maimel);
	
	if (preg_match("/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,4}|[0-9]{1,4})(\]?)$/", $maimel))
	{
	return $maimel;
	}
	else
	{
	return false;
	}
	}
   
   $maimel         = clean_email($email);
	
   if($maimel!=''){
   $updte = $Q($link,"UPDATE `ex_admin` SET `username` = '$name', `password` = '$password', `email` = '$maimel' WHERE `id` = '$_SESSION[adminid]'");

   echo "<script>window.location='logout.php?upd=1';</script>";
   }
   else{$invalid=1;}
   
    }
   else{$erre2=1;}
   
 }

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

<?php require_once 'common/header2.php';?>
    

<div class="container">
    
      <div class="row">
      <div class="span12 dall">
      
      <?php require_once 'common/menu.php';?>
     
 
     <form class="form-signin2"  name="form1" method="post">
        <div align="center" class="errorer"><?php if($invalid!=''){ echo "<strong>Invalid Email Address !</strong>" ;}
		  if($erre2 =="1"){echo "<strong>All fields are required (*)</strong>"."<br>";}
		  ?></div>
        <h4 class="form-signin-heading">edit LOGIN details</h4>
        Username:
        <input type="text" class="input-block-level" placeholder="Username..." maxlength="50" name="username" value="<?php echo $getname['username']; ?>">
        Password:
        <input type="password" class="input-block-level" placeholder="Password..." maxlength="10" name="password" value="<?php echo $getname['password']; ?>">
        Email:
        <input type="text" class="input-block-level" placeholder="Email..." maxlength="70" name="email" value="<?php echo $getname['email']; ?>">
        <input type="submit" class="btn btn-inverse"  name="updates" value="SAVE">
      </form>
      
      </div>
      
      </div>
      
</div>










    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/scripts.js"></script>
	
  </body>
</html>
