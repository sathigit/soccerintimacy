<?php

include 'includes/connection.php';
date_default_timezone_set('Etc/UTC');
require '../PHPMailer-master/PHPMailerAutoload.php';


if($_SESSION['adminid']=="")

{

  echo "<script>window.location='index.php';</script>";

}


$page_count  = $_REQUEST['page_count'];
$page        = $_REQUEST['page'];
$sea_key     = $_REQUEST['sea_key'];
$id          = $_REQUEST['id'];
$catds       = $_REQUEST['catds'];

if($update=='')  { $update   = $_REQUEST['update'];}
if($user=='')   { $user    = $_REQUEST['user'];}
if($event=='')   { $event    = $_REQUEST['event'];}

if($updatepaid=='')   { $updatepaid    = $_REQUEST['updatepaid'];}

$eventdb =   $F($Q($link,"SELECT * FROM `eventdb` WHERE `userid` = '$user' AND `eventid` = '$event' "));
$userdata =   $F($Q($link,"SELECT * FROM `register` WHERE `id` = '$user' "));
$eventdata =   $F($Q($link,"SELECT * FROM `ex_mmenu` WHERE `id` = '$event' "));

if(isset($_REQUEST['updatepay'])){
	$img_dte  = $Q($link,"UPDATE `eventdb` SET `payment` = '$updatepaid'  WHERE `userid`='$user' AND `eventid`='$event'");
@$message1 ='
		<p><strong>Hi '.ucfirst($userdata['firstname']).', your Soccerintimacy  payment for '.$eventdata['title'].' has been succesfully recieved.</strong></p>
		<p>Signin to the website to see your details for the event</p>      
		
		 
Regards,<br />
Soccerintimacy.com...!';

//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "mail.soccerintimacy.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "info@soccerintimacy.com";
//Password to use for SMTP authentication
$mail->Password = "Li3~dy83";
$mail->SetFrom('info@soccerintimacy.com', 'Soccerintimacy payment confirmation');
//Set who the message is to be sent to
$mail->addAddress($userdata['email']);
//Set the subject line
$mail->Subject = "Soccerintimacy payment confirmation";
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message1);
//Replace the plain text body with one created manually
$mail->send();
if($mail){
	echo "<script>window.location='details.php?catds=$catds&user=$user&event=$event&update=1&amp;page=$page&amp;page_count=$page_count;&amp;sea_key=$sea_key';</script>";
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



<script src="js/jquery.js" type="text/javascript"></script>



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

     	

		 	<h4 class="form-signin-heading">View user Details</h4>





<div align="center" style=" position:relative;color:#5a5a5a; font-size:12px;"><strong><?php

		  if($delete =="1"){echo "Information Deleted Successfully..."."<br>";}

		  if($update =="1"){echo "Information Updated Successfully..."."<br>";}

		  if($added =="1"){echo "Information Added Successfully..."."<br>";}

		  if($approved =="1"){echo "Deactivated Successfully..."."<br>";}

		  if($rejected =="1"){echo "Activated Successfully..."."<br>";}

		  if($count =="0"){echo "No Information Found ..."."<br>";}

	  

	      ?></strong>

</div>



		<div class="midcon">

              <div class="container">

                  <div class="row" align="right">



                  <span class="span10"> <a href="manage_registrations.php?catds=<?php echo $catds;?>&amp;page=<?php echo $page; ?>&amp;page_count=<?php echo $page_count; ?>&amp;sea_key=<?php echo $sea_key; ?>" class="btn btn-inverse" >Back</a></span>



               </div>

         </div>

         





		<div class="midcon">

              <div class="container">

                  <div class="row">

                     <span class="span4">

					 <p><strong>First Name:</strong> <?php echo $userdata['firstname'];?></p>

                     <p><strong>Last Name: </strong><?php echo $userdata['lastname'];?></p>

                     <p><strong>Email: </strong><?php echo $userdata['email'];?></p>

                     <p><strong>Phone: </strong><?php echo $userdata['mobile'];?></p>



                     <p><strong>Age: </strong><?php echo $userdata['age'];?></p>

                     <p><strong>Gender: </strong><?php echo $userdata['gender'];?></p>

                     <p><strong>Height: </strong><?php echo $userdata['height'];?> </p> 

                     <p><strong>Weight: </strong><?php echo $userdata['weight'];?></p>
                      <p><strong>Country: </strong><?php echo $userdata['country'];?></p>
					
                    <p><strong>Position1: </strong><?php echo $userdata['position1'];?></p>
                    <p><strong>Position2: </strong><?php echo $userdata['position2'];?></p>
                    <p><strong>Jersysize: </strong><?php echo $userdata['jersysize'];?></p>
                    <p><strong>Expereince: </strong><?php echo $userdata['expereince'];?></p>
                    <p><strong>Registered Date: </strong><?php echo $eventdb['regdate'];?> - <?php echo $eventdb['regtime'];?></p>
                    <p><strong>Payment status: </strong>
					
					<?php if($eventdb['payment']){echo "<strong style=color:#F00;>Paid</strong>";}
					else{echo "<strong style=color:#F00;>Pending</strong>";}?>
                    
                    </p>
                    <p align="center"><img src="../photo/<?php echo $userdata['filefl'];?>"  class="img-thumbnail" width="200"></p>
                     

                     </span>

                     <p>&nbsp;</p>

                     <p>
<?php if($eventdb['payment']=='paid'){?>
                     <a href="javascript:void(0);" class="btn btn-inverse">Payment Done</a>
<?php }else{ ?>

<form>
<input type="hidden" value="<?php echo $catds?>" name="catds">
<input type="hidden" value="<?php echo $user?>" name="user">
<input type="hidden" value="<?php echo $event?>" name="event">
<input type="hidden" value="paid" name="updatepaid">
<input type="submit"  name="updatepay" class="btn btn-inverse" value="Make Payment"/>
</form>
<?php }?>

                     </p>

                     </div>

                  </div>

               </div>

         </div>

            

         

            

            </div>

          </div>

      </div>

      

</div>





















    <!-- Le javascript

    ================================================== -->

    <!-- Placed at the end of the document so the pages load faster -->

    <script src="js/scripts.js"></script>

	

  </body>

</html>

