
<?php
include 'includes/connection.php';

if($_SESSION['adminid'] == '')
 {
   echo "<script>window.location='index.php';</script>";
 }

$page_count  = $_REQUEST['page_count'];
$page        = $_REQUEST['page'];
$sea_key     = $_REQUEST['sea_key'];


if(isset($_REQUEST['add']))
{
	$title       = trim(mysqli_real_escape_string($link,$_REQUEST['title']));
	$rsdate     = $_POST['rsdate'];
	$redate     = $_POST['redate'];
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
	if($title!=''){
	 
	$checktitle     = $Q($link,"SELECT * FROM `ex_mmenu` WHERE `title` = '$title' ");
  
    $check_count    = $C($checktitle);
  
   if($check_count==0)
   {
		$or_val          = $F($Q($link,"SELECT * FROM `ex_mmenu` ORDER BY `order` DESC LIMIT 0,1"));
	    $up_val          = $or_val['order']+1;
	
        $ins_img = $Q($link,"INSERT INTO `ex_mmenu` (`title`,`edate`, `adate`,`etype`,`eprice`, `rules`,`teams`,`fixtures`,`results`,`tables`,`news`,`order`, `status`, `einfo`,`rsdate`,
		`redate`,`staff`)
                                      VALUES('$title', '$edate', '$adate','$etype','$eprice','$rules','$teams','$fixtures','$results','$tables','$news', '$up_val', '1' ,'$einfo','$rsdate'
									  ,'$redate','$staff')");
									  								  
       echo "<script>window.location='view_cms.php?added=1&page=$page&page_count=$page_count';</script>";
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
     
 
     <form class="form-signin2"  id="add-cms" novalidate name="form3" method="post">
		<div align="center" style=" position:relative;color:#f00; font-size:10px; padding-top:5px;">
           <strong><?php
		  if($erre =="1"){echo "Title Already Exist...Please Choose Different Title"."<br>";}
		  if($erre2 =="1"){echo "Title field is required(*)"."<br>";}
	  
	      ?> </strong>
         </div>
        <h4 class="form-signin-heading">Add Event</h4>
    <table width="1024" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="500">Enter Event Title:
        <input type="text" class="input-block-level" placeholder="Event Title..." maxlength="100" name="title" ></td>
    <td width="524" align="right"><input type="submit" class="btn btn-inverse"  name="add" value="SAVE">
        <a href="view_cms.php" class="btn btn-inverse">cancel</a></td>
  </tr>
</table>

     <p>
        Event Date:
        <input type="text" class="input-block-level"  name="edate" placeholder="Event date..." id="inputField">
        </p>
        <p>
        Auction Date:
        <input type="text" class="input-block-level"  name="adate" placeholder="Auction date..." id="inputField2">
        </p>
        
        <p>
        Reg Start Date:
        <input type="text" class="input-block-level"  name="rsdate" placeholder="Reg start date..." id="inputField3">
        </p>
        
        <p>
        Reg End Date:
        <input type="text" class="input-block-level"  name="redate" placeholder="Reg end date..." id="inputField4">
        </p>
        
        
        Event Type:
        <input type="text" class="input-block-level" placeholder="Event type..." maxlength="100" name="etype" >
        </p>
        
        <p>
        Event price:
        <input type="text" class="input-block-level" placeholder="Event Price..." maxlength="100" name="eprice" >
        </p>
        
         Event Info:<br>
        <textarea class="editor1" name="einfo"></textarea><br>
        
        Rules:<br>
        <tex
        tarea class="editor1" name="rules"></textarea><br>
       <!-- Teams:<br>
        <textarea class="editor1" name="teams"></textarea><br-->

         Fixtures:<br>
        <textarea class="editor1" name="fixtures"></textarea><br>
        Results:<br>
        <textarea class="editor1" name="results"></textarea><br>
        Tables:<br>
        <textarea class="editor1" name="tables"></textarea><br>
         News:<br>
        <textarea class="editor1" name="news"></textarea><br>
        Staff:<br>
        <textarea class="editor1" name="staff"></textarea><br>
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
