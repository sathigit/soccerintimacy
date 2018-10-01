<?php
include 'includes/connection.php';

$id    = $_REQUEST['id'];
$edit  = $_REQUEST['edit'];
$erre  = $_REQUEST['erre'];
$catds = $_REQUEST['catds'];

if($_SESSION['adminid'] == '')
 {
   echo "<script>window.location='index.php';</script>";
 }

$page_count  = $_REQUEST['page_count'];
$page        = $_REQUEST['page'];
$sea_key     = $_REQUEST['sea_key'];
$edit        = trim(mysql_real_escape_string($_REQUEST['edit']));
	

if(isset($_REQUEST['add']))

{   
	$title       = trim(mysql_real_escape_string($_REQUEST['category']));
	
	if($title!=''){
		
	$str_img =   $F($Q("SELECT * FROM `ex_category` WHERE `id` = '$edit' "));
	
	if($str_img['title']==$title)
	{
	$asi_ty  = $Q("UPDATE `ex_category` SET  `title` = '$title' WHERE `id` = '$edit'"); 
								  
    echo "<script>window.location='view_category.php?update=1&page=$page&page_count=$page_count&catds=$catds';</script>";
	}
	
	if($str_img['title']!=$title)
	{
	$checktitle     = $Q("SELECT * FROM `ex_category` WHERE  `title` = '$title' AND `id`!='$edit' ");
  
    $check_count    = $C($checktitle);
  
      if($check_count==0)
	  {	
	  $asi_ty  = $Q("UPDATE `ex_category` SET `title` = '$title' WHERE `id` = '$edit'"); 
									
	  echo "<script>window.location='view_category.php?update=1&page=$page&page_count=$page_count&catds=$catds';</script>";
	  }
	  else{echo "<script>window.location='edit_category.php?erre=1&page=$page&page_count=$page_count&catds=$catds&edit=$edit';</script>";}
	}
	
	}
   else{$erre2=1;}
   
   
}

if($edit!='') {$der = $F($Q("SELECT * FROM `ex_category` WHERE `id` = '$edit'")); }

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

<?php require_once 'common/header2.php';?>
    

<div class="container">
    
      <div class="row">
      <div class="span12 dall">
      
      <?php require_once 'common/menu.php';?>
     
 
     <form class="form-signin2"  id="add-cat" novalidate="novalidate" name="form3" method="post">
		<div align="center" style=" position:relative;color:#5a5a5a; font-size:10px; padding-top:5px;">
           <strong><?php
		  if($erre =="1"){echo " Title Already Exist...Please Choose Different Title"."<br>";}
		  if($erre2 =="1"){echo "Title field is required(*)"."<br>";}
	  
	      ?> </strong>
         </div>
        <h4 class="form-signin-heading">Edit Category</h4>

        Edit Category Title:
        <input type="text" class="input-block-level" placeholder="Category..." maxlength="100" name="category" value="<?php echo $der['title'];?>" >
        <br>
        
        <input type="submit" class="btn btn-inverse"  name="add" value="SAVE">
        <a href="view_category.php?page=<?php echo $page;?>&page_count=<?php echo $page_count;?>&catds=<?php echo $catds?>" class="btn btn-inverse">cancel</a>
      </form>
      
      </div>
      
      </div>
      
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
