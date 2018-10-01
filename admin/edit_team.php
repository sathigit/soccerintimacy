<?php
include 'includes/connection.php';

$id   = $_REQUEST['id'];
$edit = $_REQUEST['edit'];
$erre = $_REQUEST['erre'];

if($_SESSION['adminid'] == '')
 {
   echo "<script>window.location='index.php';</script>";
 }


$page        = $_POST['page'];
$page_count  = $_POST['page_count'];




if(isset($_REQUEST['add']))
{
	
	$tname        = $_POST['tname'];
$tno       = $_POST['tno'];
$tcontent = $_POST['content'];	
	$str_img =   $F($Q($link,"SELECT * FROM `teams` WHERE `id` = '$edit' "));
	$filefl       = str_replace(" ","-",$_FILES['filefl']['name']);	
if($tname!=''){
		
	if($str_img['tname']==$tname)
	{
	$asi_ty  = $Q($link,"UPDATE `teams` SET `tname` = '$tname',`tno` = '$tno', `tcontent` = '$tcontent' WHERE `id` = '$edit'"); 
								  
    echo "<script>window.location='view_team.php?update=1&page=$page&page_count=$page_count';</script>";
	}
	
	
	if($str_img['tname']!=$tname)
	{
	$checktitle     = $Q($link,"SELECT * FROM `teams` WHERE  `tname` = '$tname' ");
  
    $check_count    = $C($checktitle);
  
      if($check_count==0)
	  {	
	  $asi_ty  = $Q($link,"UPDATE `teams` SET `tname` = '$tname',`tno` = '$tno', `tcontent` = '$tcontent' WHERE `id` = '$edit'"); 
									
	  echo "<script>window.location='view_team.php?update=1&page=$page&page_count=$page_count';</script>";
	  }
	  else{echo "<script>window.location='edit_team.php?erre=1&page=$page&page_count=$page_count&edit=$edit';</script>";}
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
		$pic_del     = "../team/".$str_img['filefl']; 
		@unlink($pic_del);
		
		$uniql       = uniqid($uniql);
		$file_names  = $uniql.$filefl;
			
		$uploadfiles = $fl_path2.$file_names;
		
		move_uploaded_file($_FILES['filefl']['tmp_name'], $uploadfiles);
		
        $img_dte  = $Q($link,"UPDATE `teams` SET `filefl` = '$file_names' WHERE `id` = '$edit' ");
									  
									  
    }
     echo "<script>window.location='view_team.php?update=1&amp;page=$page&amp;page_count=$page_count';</script>"; 
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
      
      <?php require_once 'common/menu.php';
	  if($edit!='') {$der = $F($Q($link,"SELECT * FROM `teams` WHERE `id` = '$edit'")); }
	  ?>
     
 
     <form class="form-signin2"  id="team-edit" novalidate name="form3" method="post" enctype="multipart/form-data">
		<div align="center" style=" position:relative;color:#5a5a5a; font-size:10px; padding-top:5px;">
           <strong><?php
		  if($erre =="1"){echo " Title Already Exist...Please Choose Different Title"."<br>";}
		  if($erre2 =="1"){echo " Title field is required(*)"."<br>";}
	  if($er_title=='1') { echo "Select a Image to upload ..."; }
			if($er_size=='1') { echo "File Size is Larger... Max File Size 1MB"; }
			if($er_ext=='1') { echo "Invalid File Format..."; }
	      ?> </strong>
         </div>
        <h4 class="form-signin-heading">Edit Team</h4>

  
       
           <table width="1024" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="500"> Edit Title:
        <input type="text" class="input-block-level" placeholder="Enter Title..."  maxlength="100"  name="tname" value="<?php echo $der['tname'];?>" ></td>
    <td width="524" align="right"><input type="submit" class="btn btn-inverse"  name="add" value="SAVE">
        <a href="view_team.php?catds=<?php echo $catds;?>" class="btn btn-inverse">cancel</a></td>
  </tr>
</table>
 <p>
        Enter team no:
        <input type="text" class="input-block-level" placeholder="Team No..." maxlength="5" name="tno"  value="<?php echo $der['tno'];?>" >
        </p>

		    <p> 
            Logo:<br>
            <input type="file" name="filefl" id="file"/>
             Image Size:1MB.</p>
             
               <p><strong>Uploaded Image:</strong>
		     <img src="../team/<?php echo $der['filefl'];?>" width="100" height="100" border="0"  />
          </p>
          
        Content:<br>
        <textarea class="editor1" name="content"><?php echo $der['tcontent'];?></textarea><br>
        
        <p>
        
        <input type="submit" class="btn btn-inverse"  name="add" value="SAVE">
        <a href="view_team.php?page=<?php echo $page; ?>&page_count=<?php echo $page_count; ?>&sea_key=<?php echo $sea_key; ?>&catds=<?php echo $catds;?>" class="btn btn-inverse">cancel</a>
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
