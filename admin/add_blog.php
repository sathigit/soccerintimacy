
<?php
include 'includes/connection.php';

if($_SESSION['adminid'] == '')
 {
   echo "<script>window.location='index.php';</script>";
 }

$page_count  = $_REQUEST['page_count'];
$page        = $_REQUEST['page'];
$sea_key     = $_REQUEST['sea_key'];

$catds=  $_REQUEST['catds'];
$eventdatarows    = $F($Q($link,"SELECT title FROM `ex_mmenu` WHERE `id`='$catds' "));


if(isset($_REQUEST['add']))
{
	$title     = $_POST['title'];
	$content     = $_POST['content'];
	$mtitle     = $_POST['mtitle'];
	$mkeyword    = $_POST['mkeyword'];
	$mdescription = $_POST['mdescription'];
	
	$filefl       = str_replace(" ","-",$_FILES['filefl']['name']);	
		$filetypes    = array('png', 'jpg', 'gif','JPG','jpeg','JPEG');
		$theFileSize  = $_FILES['filefl']['size'];
		//exit;
		$ext          = substr($filefl, strpos($filefl,'.'), strlen($filefl)-1);
					
			if(!in_array($ext,$filetypes) && $filefl!='') 
			{  
				$er_ext = 1; 
			} 
			 if($theFileSize>1000000 && $filefl!='')
			{  
				$er_size = 1; 
			}
			
	if($title!=''){
	 
	$checktitle     = $Q($link,"SELECT * FROM `blogs` WHERE `title` = '$title' ");
  
    $check_count    = $C($checktitle);
  
   if($check_count==0)
   {
		$uniql       = uniqid($uniql);
		$file_names  = $uniql.$filefl;
		$pname_thumb = $file_names;
		$uploadfiles = $fl_path3.$file_names;
		move_uploaded_file($_FILES['filefl']['tmp_name'],$uploadfiles);
		
		$or_val          = $F($Q($link,"SELECT * FROM `blogs` ORDER BY `order` DESC LIMIT 0,1"));
	    $up_val          = $or_val['order']+1;
	
        $ins_img = $Q($link,"INSERT INTO `blogs` (`title`,`content`,`mtitle`,`mkeyword`,`mdescription`,`bdate`,`btime`,`order`, `status`,`eid`,`filefl`)
        VALUES('$title', '$content', '$mtitle','$mkeyword','$mdescription','$p_date2','$p_time','$up_val', '1','$catds','$file_names')");
									  								  
       echo "<script>window.location='view_blog.php?added=1&page=$page&page_count=$page_count&catds=$catds';</script>";
   }
   else{$erre=1;}
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
     
 
  <form class="form-signin2"  id="blog" novalidate name="form3" method="post" enctype="multipart/form-data">
		<div align="center" style=" position:relative;color:#5a5a5a; font-size:10px; padding-top:5px;">
           <strong><?php
		  if($erre =="1"){echo "Title Already Exist...Please Choose Different Title"."<br>";}
		  if($erre2 =="1"){echo "Title field is required(*)"."<br>";}
		   	if($er_title=='1') { echo "Select a Image to upload ..."; }
			if($er_size=='1') { echo "File Size is Larger... Max File Size 1MB"; }
			if($er_ext=='1') { echo "Invalid File Format..."; }
	  
	      ?> </strong>
         </div>
        <h4 class="form-signin-heading">Add highlights for <?php echo $eventdatarows['title'];?></h4>
        
     
            <table width="1024" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="500">Enter Title:
        <input type="text" class="input-block-level" placeholder="Enter Title..." maxlength="100" name="title" ></td>
    <td width="524" align="right"><input type="submit" class="btn btn-inverse"  name="add" value="SAVE">
        <a href="view_blog.php?catds=<?php echo $catds;?>" class="btn btn-inverse">cancel</a></td>
  </tr>
</table>
 <p> 
            Image:<br>
            <input type="file" name="filefl" id="file"/>
             Image Size:1MB.</p>
        Content:<br>
        <textarea class="editor1" name="content"></textarea><br>
        
        <p>
        Enter Meta Title:
        <input type="text" class="input-block-level" placeholder="Meta Title..." maxlength="100" name="mtitle" >
        </p>
        
        <p>
        Enter Meta Keyword:
        <input type="text" class="input-block-level" placeholder="Meta Keyword..." maxlength="100" name="mkeyword" >
        </p>
        
         <p>
        Enter Meta Description:
        <input type="text" class="input-block-level" placeholder="Meta Description..." maxlength="100" name="mdescription" >
        </p>
        
        <input type="submit" class="btn btn-inverse"  name="add" value="SAVE">
        <a href="view_blog.php?catds=<?php echo $catds;?>" class="btn btn-inverse">cancel</a>
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
