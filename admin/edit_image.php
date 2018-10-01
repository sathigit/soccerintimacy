<?php
include 'includes/connection.php';
include 'includes/snapshot.php';

$id    = $_REQUEST['id'];
$edit  = $_REQUEST['edit'];
$erre  = $_REQUEST['erre'];
$catds = $_REQUEST['catds'];

$catid = $_REQUEST['catid'];

if($_SESSION['adminid'] == '')
 {
   echo "<script>window.location='index.php';</script>";
 }

$page_count  = $_REQUEST['page_count'];
$page        = $_REQUEST['page'];
$sea_key     = $_REQUEST['sea_key'];
$edit        = trim(mysql_real_escape_string($_REQUEST['edit']));

 if($catds=='')
 {
   echo "<script>window.location='view_images.php';</script>";
 }

if($edit!='') {$der = $F($Q("SELECT * FROM `files` WHERE `id` = '$edit'")); }

if(isset($_REQUEST['save']))
{		

		$catid        = $_POST['catid'];	
		$subcatid     = $_POST['subcatid'];	
		$title        = $_POST['title'];
		$desc         = $_POST['desc'];		
		
		$filefl       = str_replace(" ","-",$_FILES['filefl']['name']);	
		$filetypes    = array('png', 'jpg', 'gif','JPG','jpeg','JPEG');
		$theFileSize  = $_FILES['filefl']['size'];
		//exit;
		$ext          = substr($filefl, strpos($filefl,'.'), strlen($filefl)-1);
					
			if(!in_array($ext,$filetypes) && $filefl!='') 
			{  
				$er_ext = 1; 
			} 
			 if($theFileSize>25214400 && $filefl!='')
			{  
				$er_size = 1; 
			}
			 if($filefl!=''){
				$str2       = $F($Q("SELECT * FROM `files` WHERE `id` = '$edit'"));
				$image2  ="../uploads/".$str2['upl'];
				@unlink($image2);				
				$pic_del2     = "../uploads/"."resize_".$str2['upl']; 
				@unlink($pic_del2);								

				$file_names  = $filefl;
				$pname_thumb = $file_names;
				$uploadfiles = $fl_path.$file_names;
				move_uploaded_file($_FILES['filefl']['tmp_name'], $uploadfiles);
				
				$myimage			    =	new ImageSnapShot;	
				$myimage->ImageFile	    =	$fl_path.$pname_thumb;
				$myimage->Width		    =	167;
				$myimage->Height	    =	113;
				$myimage->Resize	    =	true;
				$myimage->ResizeScale   =	100;
				$myimage->Compression   =   80;
				$fthump_save2			=   $fl_path."resize_".$pname_thumb;
				$myimage->SaveImageAs($fthump_save2);
				
				$ups	=	$Q("UPDATE `files` SET `title` = '$title', `desc` = '$desc', `catid` = '$catid', `subcatid` = '$subcatid',
							   `upl` = '$file_names' WHERE `id` = '$edit'");
				
		 	   echo "<script>window.location='view_images.php?updated=1&sort=$sort&page=$page&page_count=$page_count&catds=$catds';</script>";					 				
			 }
			 else 
			  {	
				  $er_title = 1;
			  }
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
     
		<div align="center" style=" position:relative;color:#5a5a5a; font-size:10px; padding-top:5px;">
           <strong><?php
		  	if($er_title=='1') { echo "Select a Image to upload ..."; }
			if($er_size=='1') { echo "File Size is Larger... Max File Size 25MB"; }
			if($er_ext=='1') { echo "Invalid File Format..."; }
	  
	      ?> </strong>
         </div>
        <?php if($catds!=''){?>
					 <?php $gname	=	$F($Q("SELECT * FROM `ex_subcat` WHERE `id` = '$catds'")); ?>
        <h4 class="form-signin-heading">Edit this  Images For <?php echo $gname['title'];?> Album </h4>
        <?php } ?>
 <form class="form-signin2"  id="uploads" novalidate="novalidate" name="form3" method="post" enctype="multipart/form-data">
				<p><center><img src="../uploads/<?php echo $der['upl'];?>"  width="100"  border="0"></center></p>                        
            	
                <p>
                Image Title<br>
                <input type="text" name="title"  value="<?php echo $der['title'];?>" />
                </p>	
          		<p>
                Album Category
                <select name="catid" class="input-block-level" onChange="this.form.submit();">
		       <option value="" >Select Album</option>
               <?php
			   		$getdatarr	=	$Q("SELECT * FROM `ex_category` WHERE `id` !=''");
					while($getvalrr	=	$F($getdatarr))
					{
			   ?>
	<?php if($catid==''){?><option value="<?php echo $getvalrr['id'];?>"<?php if($der['catid']==$getvalrr['id']) { echo "selected"; } ?>><?php } ?>
    <?php if($catid!=''){?><option value="<?php echo $getvalrr['id'];?>"<?php if($_REQUEST['catid']==$getvalrr['id']) { echo "selected"; } ?>><?php } ?>
			   <?php echo $getvalrr['title'];?></option>
			   <?php }?>			   
				</select>        
                </p>
                
                <p>
                Album SubCategory
                <select name="subcatid" class="input-block-level">
		       <option value="">Select Album Subcategory</option>
               <?php
			   		if($catid==''){$getdatarrs	=	$Q("SELECT * FROM `ex_subcat` WHERE `cat_id` ='$der[catid]'");}
					if($catid!=''){$getdatarrs	=	$Q("SELECT * FROM `ex_subcat` WHERE `cat_id` ='$catid'");}
					
					while($getvalrrs	=	$F($getdatarrs))
					{
			   ?>
		       <option value="<?php echo $getvalrrs['id'];?>"<?php if($der['subcatid']==$getvalrrs['id']) { echo "selected"; } ?>>
			   <?php echo $getvalrrs['title'];?></option>
			   <?php }?>			   
				</select>        
                </p>
                
				<p>Edit this Image<br>
				<input type="file" name="filefl"  /></p>
                
                <p>
                Image Description<br>
                <textarea name="desc" placeholder="Image Description..." id="desc"><?php echo $der['desc'];?></textarea></p>
			
			<p>&nbsp;</p>
	
        <input type="submit" class="btn"  name="save" value="SAVE">&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="view_images.php?page=<?php echo $page;?>&page_count=<?php echo $page_count;?>&catds=<?php echo $catds?>" class="btn">Back</a>
      </form>
      
      </div>
      
      </div>
      
</div>



		<!-- JavaScript Includes -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/jquery.validate.min.js" type="text/javascript"></script>
		<script src="js/validation.js" type="text/javascript"></script>



	
  </body>
</html>
