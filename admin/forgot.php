<?php
include 'includes/connection.php';

if($_SESSION['adminid']!="")
{
  echo "<script>window.location='adminstrator.php';</script>";
}

if(isset($_REQUEST['submit']))
{
  $email = $_REQUEST['email'];
  
  if($email!=''){
	  
  $checkemail     = $Q($link,"SELECT * FROM `ex_admin` WHERE `email` = '$email' ");
  
  $check_count    = $C($checkemail);
  
  if($check_count >0)
  {
  		$row      = $F($checkemail);
		
		$to      = "$site_email";
		
		$from    = "$site_email"; 
		
		$subject = "soccerintimacy.com Admin, Login Details Retrieval";
		
		$message =' 
				
				  soccerintimacy.com ADMIN  LOGIN DETAILS RETREIVAL
				  
				  soccerintimacy.com ADMIN LOGIN DETAILS            
				  
				  USERNAME:      '.$row['username'].'       
				  
				  PASSWORD:     '.$row['password'].'         
				  
				';
				
		@mail($to,$subject,$message,"From: $from\nContent-Type: text/html; charset=iso-8859-1");
		
		$sent =1;
  }
  else{
         $error =1;
  	  }

}
	else
    {
      $req=1;
    }
	
}

if(isset($_REQUEST['back']))
{
echo "<script>window.location='index.php';</script>"; 
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
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script src="js/forgot_validation.js" type="text/javascript"></script>

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
      	<div align="center" style="color:#FB3A3A;font-weight:bold; font-size:12px;">
		<?php if($sent==1) {echo "Login Details Has Been Sent To Your Mail,Please Ckeck It Out";}?>
        <?php if($error==1) {echo "Email Not Found In Database";}?>
        <?php if($req==1) {echo "Email Field is required (*)";}?>
			</div>
        <h4 class="form-signin-heading">FORGOT PASSWORD</h4>
        <input type="text" class="input-block-level" placeholder="Email..." name="email">
        <input type="submit" class="btn btn-inverse"  name="submit" value="Submit">
        <a  href="index.php" class="btn btn-inverse">Back</a>
      </form>

</div>











    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
	
  </body>
</html>
