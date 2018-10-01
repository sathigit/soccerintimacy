<?php
include 'includes/connection.php';

if($_SESSION['adminid'] == '')
 {
   echo "<script>window.location='index.php';</script>";
 }

$page_count  = $_REQUEST['page_count'];
$page        = $_REQUEST['page'];
$sea_key     = $_REQUEST['sea_key'];
$error		 = $_REQUEST['error'];	
$edit		 = $_REQUEST['edit'];
$catds       = $_REQUEST['catds'];
$desc        = $_REQUEST['desc'];

if(isset($_REQUEST['add']))
{
	$cat_id 	= $_REQUEST['cat_id'];
	$title	 	= $_REQUEST['title'];
	
	$getval		=	$Q("SELECT * FROM `ex_subcat` WHERE `title`='$title' AND `id`!='$edit'");
	$getc		=	$C($getval);
	
	if($getc=='0')
	{
	
		$ups = $Q("UPDATE  `ex_subcat` SET  `cat_id` = '$cat_id', `title` = '$title' ,`desc` = '$desc' WHERE `id`='$edit'"); 
   		
		echo "<script> window.location='view_subcategory.php?updated=1&page=$page&page_count=$page_count&catds=$catds';</script>";
    }
	else
	{
		$error='1';
	}
}


if($edit!='')
{
	$edit_val	=	$F($Q("SELECT * FROM `ex_subcat` WHERE `id`='$edit'"));
	
	if($_REQUEST['cat_id']=='') { $category	=	$edit_val['cat_id']; } else { $category	=	$_REQUEST['cat_id']; } 
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
     
 
     <form class="form-signin2"  id="add-subcat" novalidate="novalidate" name="form3" method="post">
		<div align="center" style=" position:relative;color:#5a5a5a; font-size:10px; padding-top:5px;">
           <strong><?php
		  if($error =="1"){echo "Album Subcategory Title Already Exist...Please Choose Different Title"."<br>";}
	  
	      ?> </strong>
         </div>
        <h4 class="form-signin-heading">Edit Album</h4>
        Select Category:
        <select name="cat_id" class="input-block-level" id="mid">
		       <option value="">Select Album</option>
               <?php
			   		$getdata2	=	$Q("SELECT * FROM `ex_category` WHERE `status` = '1'");
					while($getval2	=	$F($getdata2))
					{
			   ?>
		       <option value="<?php echo $getval2['id'];?>"<?php if($edit_val['cat_id']==$getval2['id']) { echo "selected"; } ?>>
			   <?php echo $getval2['title'];?></option>
			   <?php }?>			   
		</select>
         
        Enter Album Title:
        <input type="text" class="input-block-level" placeholder="Album Title..." maxlength="100" name="title" value="<?php echo $edit_val['title'];?>" >
		<br>
        
        Enter Album Description:
        <textarea name="desc" rows="5" class="input-block-level" placeholder="Album Description..."><?php echo $edit_val['desc'];?></textarea><br>
        
        <input type="submit" class="btn btn-inverse"  name="add" value="SAVE">
        <a href="view_subcategory.php?page=<?php echo $page;?>&page_count=<?php echo $page_count;?>&catds=<?php echo $catds?>" class="btn btn-inverse">cancel</a>
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
