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
	$title       = trim(mysqli_real_escape_string($link,$_REQUEST['title']));
	$redate     = $_POST['redate'];
	$rsdate    = $_POST['rsdate'];
	$edate     = $_POST['edate'];
	$adate    = $_POST['adate'];
	$eprice = $_POST['eprice'];
	$rules = mysqli_real_escape_string($link,$_POST['rules']);
	$teams = mysqli_real_escape_string($link,$_POST['teams']);
	$fixtures = mysqli_real_escape_string($link,$_POST['fixtures']);
	$results = mysqli_real_escape_string($link,$_POST['results']);
	$tables = mysqli_real_escape_string($link,$_POST['tables']);
	$news = mysqli_real_escape_string($link,$_POST['news']);
	$einfo = mysqli_real_escape_string($link,$_POST['einfo']);
	$staff = mysqli_real_escape_string($link,$_POST['staff']);
	$etype = $_POST['etype'];
	
	$filefl       = $_FILES['filefl']['name'];	
	
	
	if($title!=''){
		
	$str_img =   $F($Q($link,"SELECT * FROM `ex_mmenu` WHERE `id` = '$edit' "));
	
	if($str_img['title']==$title)
	{
	$asi_ty  = $Q($link,"UPDATE `ex_mmenu` SET  
	`title`='$title',
	`edate` = '$edate',
	`etype` = '$etype',
	`adate` = '$adate',
	`eprice`= '$eprice',
	`title`='$title', 
	`rules` = '$rules',
	`teams` = '$teams',
	`fixtures` = '$fixtures',
	`results` = '$results',
	`tables` = '$tables',
	`news` = '$news',
	`einfo` = '$einfo',
	`rsdate` = '$rsdate',
	`redate` = '$redate',
	`staff` = '$staff'
	WHERE `id` = '$edit'"); 
								  
    echo "<script>window.location='view_cms.php?update=1&page=$page&page_count=$page_count';</script>";
	}
	
	if($str_img['title']!=$title)
	{
	$checktitle     = $Q($link,"SELECT * FROM `ex_mmenu` WHERE  `title` = '$title' ");
  
    $check_count    = $C($checktitle);
  
      if($check_count==0)
	  {	
	  $asi_ty  = $Q($link,"UPDATE `ex_mmenu` SET
	  `title`='$title', `etype` = '$etype',
	  	`edate` = '$edate',
	`adate` = '$adate',
	`eprice` = '$eprice',
	`rules` = '$rules',
	`teams` = '$teams',
	`fixtures` = '$fixtures',
	`results` = '$results',
	`tables` = '$tables',
	`news` = '$news',
	`einfo` = '$einfo',
	`rsdate` = '$rsdate',
	`redate` = '$redate',
	`staff` = '$staff'
	   WHERE `id` = '$edit'"); 
									
	  echo "<script>window.location='view_cms.php?update=1&page=$page&page_count=$page_count';</script>";
	  }
	  else{echo "<script>window.location='edit_category.php?erre=1&page=$page&page_count=$page_count&edit=$edit';</script>";}
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
		
        $img_dte  = $Q($link,"UPDATE `ex_mmenu` SET `filefl` = '$file_names' WHERE `id` = '$edit' ");
									  
									  
    }
}

if($edit!='') {$der = $F($Q($link,"SELECT * FROM `ex_mmenu` WHERE `id` = '$edit'")); }

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
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script src="js/validation.js" type="text/javascript"></script>
<script type="text/javascript" src="../tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/editor.js"></script>
<script src="js/jquery-ui.js"></script>
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!--[if lt IE 9]>
  <div style=' clear: both; text-align:center; position: relative;'>
      <a href="//windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a>
  </div>
<![endif]-->
<script>
  $( function() {
    $( "#inputField" ).datepicker({
		dateFormat: "dd-mm-yy",
		 changeYear: true,
		 minDate: 0
		
		});
		   $( "#inputField2" ).datepicker({
		dateFormat: "dd-mm-yy",
		 changeYear: true,
		 minDate: 0
		
		});
		$( "#inputField3" ).datepicker({
		dateFormat: "dd-mm-yy",
		 changeYear: true,
		 minDate: 0
		
		});
		   $( "#inputField4" ).datepicker({
		dateFormat: "dd-mm-yy",
		 changeYear: true,
		 minDate: 0
		
		});
  } );
  


  </script>
</head>

<body>

<?php require_once 'common/header2.php';?>
    

<div class="container">
    
      <div class="row">
      <div class="span12 dall">
      
      <?php require_once 'common/menu.php';?>
     
 
     <form class="form-signin2"  id="add-cms" novalidate name="form3" name="form3" method="post" enctype="multipart/form-data">
		<div align="center" style=" position:relative;color:#f00; font-size:10px; padding-top:5px;">
           <strong><?php
		  if($erre =="1"){echo " Title Already Exist...Please Choose Different Title"."<br>";}
		  if($erre2 =="1"){echo "Title field is required(*)"."<br>";}
		   if($er_title=='1') { echo "Select a Image to upload ..."; }
			if($er_size=='1') { echo "File Size is Larger... Max File Size 1MB"; }
			if($er_ext=='1') { echo "Invalid File Format..."; }
	  
	      ?> </strong>
         </div>
        <h4 class="form-signin-heading">Edit Event</h4>
    <table width="1024" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="500"> Event Title:
        <input type="text" class="input-block-level" placeholder="Title..." maxlength="100"  name="title" value="<?php echo $der['title'];?>" ></td>
    <td width="524" align="right"><input type="submit" class="btn btn-inverse"  name="add" value="SAVE">
        <a href="view_cms.php" class="btn btn-inverse">cancel</a></td>
  </tr>
</table>

        
        
        Event date:
        <input type="text" class="input-block-level" placeholder="Event date..." maxlength="100" name="edate"  
        value="<?php echo $der['edate'];?>" id="inputField">
        </p>
        
        
        
        <p>
        Auction date :
        <input type="text" class="input-block-level" placeholder="Auction date..." maxlength="100" name="adate" id="inputField2"
         value="<?php echo $der['adate'];?>">
        </p>
        
        Reg Start date:
        <input type="text" class="input-block-level" placeholder="reg start date..." maxlength="100" name="rsdate"  
        value="<?php echo $der['rsdate'];?>" id="inputField3">
        </p>
        
        <p>
        Reg End date :
        <input type="text" class="input-block-level" placeholder="Reg end date..." maxlength="100" name="redate" id="inputField4"
         value="<?php echo $der['redate'];?>">
        </p>
        
         Event Type:
        <input type="text" class="input-block-level" placeholder="Event type..." maxlength="100" name="etype" 
        value="<?php echo $der['etype'];?>">
        </p>
        
        <p>
        Event price:
        <input type="text" class="input-block-level" placeholder="Event Price..." maxlength="100" name="eprice" 
        value="<?php echo $der['eprice'];?>">
        </p>
        
          <p> 
            Event Logo:<br>
            <input type="file" name="filefl" id="file"/>
             Image Size:1MB.</p>
             
               <p><strong>Uploaded Image:</strong>
		     <img src="../news/<?php echo $der['filefl'];?>" width="100" height="100" border="0"  />
          </p>
        Event Info:<br>
        <textarea class="editor1" name="einfo"><?php echo $der['einfo'];?></textarea><br>
        
        Rules:<br>
        <textarea class="editor1" name="rules"><?php echo $der['rules'];?></textarea><br>
        <!--Teams:<br>
        <textarea class="editor1" name="teams"><?php echo $der['teams'];?></textarea><br>-->

         Fixtures:<br>
        <textarea class="editor1" name="fixtures"><?php echo $der['fixtures'];?></textarea><br>
        Results:<br>
        <textarea class="editor1" name="results"><?php echo $der['results'];?></textarea><br>
        Tables:<br>
        <textarea class="editor1" name="tables"><?php echo $der['tables'];?></textarea><br>
         News:<br>
        <textarea class="editor1" name="news"><?php echo $der['news'];?></textarea><br>
        Staff:<br>
        <textarea class="editor1" name="staff"><?php echo $der['staff'];?></textarea><br>
         <p>
        
        
        
        <input type="submit" class="btn btn-inverse"  name="add" value="SAVE">
        <a href="view_cms.php" class="btn btn-inverse">cancel</a>
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
