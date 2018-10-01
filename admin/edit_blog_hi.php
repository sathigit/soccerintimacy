<?php
include 'includes/connection.php';

$id   = $_REQUEST['id'];
$edit = $_REQUEST['edit'];
$erre = $_REQUEST['erre'];

if($_SESSION['adminid'] == '')
 {
   echo "<script>window.location='index.php';</script>";
 }

$page_count  = $_REQUEST['page_count'];
$page        = $_REQUEST['page'];
$sea_key     = $_REQUEST['sea_key'];
$edit        = trim(mysqli_real_escape_string($link,$_REQUEST['edit']));
	

if(isset($_REQUEST['add']))

{   
	$title     = $_POST['title'];
	$content     = $_POST['content'];
	$mtitle     = $_POST['mtitle'];
	$mkeyword    = $_POST['mkeyword'];
	$mdescription = $_POST['mdescription'];
	$filefl       = $_FILES['filefl']['name'];	
	
	if($title!=''){
		
	$str_img =   $F($Q($link,"SELECT * FROM `higli` WHERE `id` = '$edit' "));
	
	if($str_img['title']==$title)
	{
	$asi_ty  = $Q($link,"UPDATE `higli` SET 
     `title` = '$title',
	`content` = '$content', 
	`mtitle` = '$mtitle',
	`mkeyword` = '$mkeyword',
	`mdescription` = '$mdescription'
	 WHERE `id` = '$edit'"); 
								  
    echo "<script>window.location='view_blog_hi.php?update=1&page=$page&page_count=$page_count';</script>";
	}
	
	if($str_img['title']!=$title)
	{
	$checktitle     = $Q($link,"SELECT * FROM `higli` WHERE  `title` = '$title' ");
  
    $check_count    = $C($checktitle);
  
      if($check_count==0)
	  {	
	  $asi_ty  = $Q($link,"UPDATE `higli` SET 
	   `content` = '$content', 
	`title` = '$title',
	`mtitle` = '$mtitle',
	`mkeyword` = '$mkeyword',
	`mdescription` = '$mdescription'
	   WHERE `id` = '$edit'"); 
									
	  echo "<script>window.location='view_blog_hi.php?update=1&page=$page&page_count=$page_count';</script>";
	  }
	  else{echo "<script>window.location='edit_blog.php?erre=1&page=$page&page_count=$page_count&edit=$edit';</script>";}
	}
	
	}
   else{$erre2=1;}
   
    if($filefl!='')
	{
			
		$filetypes    = array('png', 'jpg', 'gif','JPG','jpeg','JPEG');
		$theFileSize  = $_FILES['filefl']['size'];
		$ext          = substr($filefl, strpos($filefl,'.'), strlen($filefl)-1);
					
			if(!in_array($ext,$filetypes) && $filefl!='') 
			{  
				$er_ext = 1; 
			} 
			 if($theFileSize>1000000 && $filefl!='')
			{  
				$er_size = 1; 
			}
		$pic_del     = "../news/".$str_img['filefl']; 
		@unlink($pic_del);
		
		$uniql       = uniqid($uniql);
		$file_names  = $uniql.$filefl;
			
		$uploadfiles = $fl_path3.$file_names;
		
		move_uploaded_file($_FILES['filefl']['tmp_name'], $uploadfiles);
		
        $img_dte  = $Q($link,"UPDATE `higli` SET `filefl` = '$file_names' WHERE `id` = '$edit' ");
									  
									  
    }
}

if($edit!='') {$der = $F($Q($link,"SELECT * FROM `higli` WHERE `id` = '$edit'")); }

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
<script type="text/javascript" src="../tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/editor.js"></script>
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
     
 
     <form class="form-signin2"  id="blogedit" novalidate name="form3" method="post" enctype="multipart/form-data">
		<div align="center" style=" position:relative;color:#5a5a5a; font-size:10px; padding-top:5px;">
           <strong><?php
		  if($erre =="1"){echo " Title Already Exist...Please Choose Different Title"."<br>";}
		  if($erre2 =="1"){echo " Title field is required(*)"."<br>";}
		  if($er_title=='1') { echo "Select a Image to upload ..."; }
			if($er_size=='1') { echo "File Size is Larger... Max File Size 1MB"; }
			if($er_ext=='1') { echo "Invalid File Format..."; }
	  
	      ?> </strong>
         </div>
        <h4 class="form-signin-heading">Edit news</h4>

  
       
           <table width="1024" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="500"> Edit Title:
        <input type="text" class="input-block-level" placeholder="Enter Title..."  maxlength="100"  name="title" value="<?php echo $der['title'];?>" ></td>
    <td width="524" align="right"><input type="submit" class="btn btn-inverse"  name="add" value="SAVE">
        <a href="view_blog_hi.php" class="btn btn-inverse">cancel</a></td>
  </tr>
</table>
   <p> 
            Image:<br>
            <input type="file" name="filefl" id="file"/>
             Image Size:1MB.</p>
             
               <p><strong>Uploaded Image:</strong>
		     <img src="../news/<?php echo $der['filefl'];?>" width="100" height="100" border="0"  />
          </p>
        Content:<br>
        <textarea class="editor1" name="content"><?php echo $der['content'];?></textarea><br>
        
        <p>
        Enter Meta Title:
        <input type="text" class="input-block-level" placeholder="Meta Title..." maxlength="100" name="mtitle"  
        value="<?php echo $der['mtitle'];?>">
        </p>
        
        <p>
        Enter Meta Keyword:
        <input type="text" class="input-block-level" placeholder="Meta Keyword..." maxlength="100" name="mkeyword" 
         value="<?php echo $der['mkeyword'];?>">
        </p>
        
         <p>
        Enter Meta Description:
        <input type="text" class="input-block-level" placeholder="Meta Description..." maxlength="100" name="mdescription"
         value="<?php echo $der['mdescription'];?>">
        </p>
        
        <input type="submit" class="btn btn-inverse"  name="add" value="SAVE">
        <a href="view_blog_hi.php?page=<?php echo $page; ?>&page_count=<?php echo $page_count; ?>&sea_key=<?php echo $sea_key; ?>" class="btn btn-inverse">cancel</a>
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
