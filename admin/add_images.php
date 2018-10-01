<?php
include 'includes/connection.php';

if($_SESSION['adminid'] == '')
 {
   echo "<script>window.location='index.php';</script>";
 }
 

$page_count  = $_REQUEST['page_count'];
$page        = $_REQUEST['page'];
$sea_key     = $_REQUEST['sea_key'];
$catds       = $_REQUEST['catds'];

 if($catds=='')
 {
   echo "<script>window.location='view_images.php';</script>";
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
<!-- Google web fonts -->
<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />

		<!-- The main CSS file -->
<link href="assets/css/style.css" rel="stylesheet" />

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
     
		<div align="center"  id="success"><strong>Upload Successfull . . .</strong></div>
        
        <div align="center"  id="error"><strong>Upload Failed Please Try again . . . Check Your internet connection</strong></div>
        
        
        <?php if($catds!=''){?>
					 <?php $gname	=	$F($Q("SELECT * FROM `ex_subcat` WHERE `id` = '$catds'")); ?>
                     <?php $gname2	=	$F($Q("SELECT * FROM `ex_category` WHERE `id` = '$gname[cat_id]'")); ?>
        <h4 class="form-signin-heading">Add Images For <?php echo $gname['title'];?></h4>
        <?php } ?>
        
<form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
			 
             <div align="right"><a href="view_images.php?page=<?php echo $page;?>&page_count=<?php echo $page_count;?>&catds=<?php echo $catds?>" class="btn">Back</a></div>
                   <br>    
            <input type="text" name="catid"  value="<?php echo $gname2['id'];?>" style="display:none;"/>
             <input type="text" name="subcatid"  value="<?php echo $gname['id'];?>" style="display:none;"/>
             
             <p><input type="text" name="title"  maxlength="100" placeholder="Image Title..." id="title"/></p>
             <p><textarea name="desc" placeholder="Image Description..." id="desc"></textarea></p>
             
            <div id="drop">
				Drop Here

				<a>Browse</a>
				<input type="file" name="upl" multiple />
			</div>
			
            	
			<ul>
				<!-- The file uploads will be shown here -->
			</ul>

       <div align="right"><a href="view_images.php?page=<?php echo $page;?>&page_count=<?php echo $page_count;?>&catds=<?php echo $catds?>" class="btn">Back</a></div>
      </form>
      
      </div>
      
      </div>
      
</div>



		<!-- JavaScript Includes -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="assets/js/jquery.knob.js"></script>

		<!-- jQuery File Upload Dependencies -->
		<script src="assets/js/jquery.ui.widget.js"></script>
		<script src="assets/js/jquery.iframe-transport.js"></script>
		<script src="assets/js/jquery.fileupload.js"></script>
		
		<!-- Our main JS file -->
		<script src="assets/js/script.js?<?php echo $p_time;?>"></script>

	
  </body>
</html>
