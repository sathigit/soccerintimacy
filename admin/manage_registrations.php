<?php
include 'includes/connection.php';
date_default_timezone_set('Etc/UTC');
require '../PHPMailer-master/PHPMailerAutoload.php';
if($_SESSION['adminid']=="")
{
  echo "<script>window.location='index.php';</script>";
}

if($added=='')   { $added    = $_REQUEST['added'];}
if($del=='')     { $del      = $_REQUEST['del'];}
if($delete=='')  { $delete   = $_REQUEST['delete'];}
if($update=='')  { $update   = $_REQUEST['update'];}
if($approve=='') { $approve  = $_REQUEST['approve'];}
if($reject=='')  { $reject   = $_REQUEST['reject'];}
if($approved==''){ $approved = $_REQUEST['approved'];}
if($rejected==''){ $rejected = $_REQUEST['rejected'];}
if($ups=='')     { $ups      = $_REQUEST['ups'];}
if($down=='')    { $down     = $_REQUEST['down'];}
if($success=='')    { $success     = $_REQUEST['success'];}

if($updateteam=='')    { $updateteam     = $_REQUEST['updateteam'];}
if($ruserid=='')    { $ruserid     = $_REQUEST['ruserid'];}
if($reventid=='')    { $reventid     = $_REQUEST['reventid'];}
if($ruid=='')    { $ruid     = $_REQUEST['ruid'];}

$page_count  = $_REQUEST['page_count'];
$page        = $_REQUEST['page'];
$sea_key     = $_REQUEST['sea_key'];
$id          = $_REQUEST['id'];
$catds       = $_REQUEST['catds'];

if($ruserid){
$userD = $F($Q($link,"SELECT * FROM `register` WHERE `id` = '$ruserid'"));
$eventD = $F($Q($link,"SELECT * FROM `ex_mmenu` WHERE `id` = '$reventid'"));
$teamD = $F($Q($link,"SELECT * FROM `teams` WHERE `id` = '$updateteam'"));
}
if($updateteam){
$asi_ty  = $Q($link,"UPDATE `eventdb` SET 
     `team` = '$updateteam'
	 WHERE `id` = '$ruid'"); 
								  


@$message1 =' 
<p><strong>Hi '.ucfirst($userD['firstname']).', Following are your team details for the event ' .$eventD['title']. '!</strong></p>
<p> Team Details </p>      
				  
				  <p>team Name:      '.$teamD['tname'].' </p>      
				  
				  <p>Team-No:     '.$teamD['tno'].' </p>
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
$mail->SetFrom('info@soccerintimacy.com', 'Soccerintimacy Registration');
//Set who the message is to be sent to
$mail->addAddress($userD['email']);
//Set the subject line
$mail->Subject = "Soccerintimacy team assigning notification email";
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message1);
//Replace the plain text body with one created manually
$mail->send();

    echo "<script>window.location='manage_registrations.php?catds=$catds&success=1&page=$page&page_count=$page_count&catds=$catds';</script>";

	}
$eventdatarows    = $F($Q($link,"SELECT title FROM `ex_mmenu` WHERE `id`='$catds' "));
if($page_count=='')
{
	$page_count="300";
}

if($approve!='')
{



}




	 include "common/pagelist.php";

	 $string  = "SELECT * FROM `eventdb` ";


	 $string .= " WHERE `eventid` = '$catds'";
	
	
	 $string  .= " ORDER BY `orderi` DESC";
	
	 $query   = $Q($link,$string);

	 $count   = $C($query);
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
     	
		 	<h4 class="form-signin-heading">Manage Registration for <?php echo $eventdatarows['title'];?></h4>


<div align="center" style=" position:relative;color:#f00; font-size:12px;"><strong><?php
		  if($delete =="1"){echo "Information Deleted Successfully..."."<br>";}
		  if($update =="1"){echo "Information Updated Successfully..."."<br>";}
		  if($added =="1"){echo "Information Added Successfully..."."<br>";}
		  if($approved =="1"){echo "Deactivated Successfully..."."<br>";}
		  if($rejected =="1"){echo "Activated Successfully..."."<br>";}
		  if($count =="0"){echo "No Information Found ..."."<br>";}
		  if($success =="1"){echo "Player was assigned to the team and notified by email..."."<br>";}
	  
	      ?></strong>
          <div id="show" lign="center" style=" position:relative;color:#5a5a5a; font-size:12px;">
  <!-- ITEMS TO BE DISPLAYED HERE -->
</div>
</div>

		<div class="midcon">
              <div class="container">
                  <div class="row" align="right">

   
                     <!--<div class="span2">
                     	<a href="export.php"><i class="icon-download"></i> Download to excel</a>
                     </div>-->
                    
                     
                     <span class="span10"> <a href="view_cms.php?page=<?php echo $page; ?>&amp;page_count=<?php echo $page_count; ?>&amp;sea_key=<?php echo $sea_key; ?>" class="btn btn-inverse" >Back</a></span>

               </div>
         </div>
         

 <input type="text" id="search" placeholder="Search by name..."></input>
		<table class="table">
        <tr>
             
                  
                     <th><strong>SNO:</strong></th>
                     <th><strong>Name:</strong> <i class="icon-th-list"></i></th>
                     <th><strong>Mobile:</strong> <i class="icon-th"></i></th>
                     <th><strong>Assign Team</strong> <i class="icon-th"></i></th>
                     <th><strong>View full details</strong></th>
                     <th><strong>Payment</strong></th>
              </tr>
             <?php
				  if($count!=0) {
						if($count>0)
					   {
						$total_records = $count;
				
						$records_per_page = $page_count;
				
						$current_page_no =1;
				
						if ($_REQUEST['page'])
						{
						$current_page_no = @$_REQUEST['page'];
						}
				
						$pageL = new pageList($total_records, $records_per_page, $current_page_no);
						$pageL->generate();
				
						$start = $pageL->startRecord;
						
						$string .= " LIMIT $start,$pageL->numOfRows";
					   }
				
						$start_rec = $pageL->startRecord +1;
						$total_rec = $total_records;
				
						if(($pageL->startRecord+$records_per_page) > $total_records)
						{
							$end_rec = $total_records;
						}
						else
						{
							$end_rec = $pageL->startRecord+$records_per_page;
						}
				
						$query = $Q($link,$string);
				    ?>
					<?php
				
					   $j = $start+1;
					   $serial=0;
						 while($row_list=$F($query))
						{
						  $serial++;
						 $user = $F($Q($link,"SELECT * FROM `register` WHERE `id` = '$row_list[userid]'"));
						 $event = $F($Q($link,"SELECT * FROM `ex_mmenu` WHERE `id` = '$row_list[eventid]'"));
					?>
                    
   	      <tr>
             
                     <td><?php print $j;?></td>
                     <td><?php echo $user['firstname'];?></td>
                       <td><i class="icon-th"></i> <?php echo $user['mobile'];?></td>
                     <!--<div class="span2"> <i class="icon-th"></i> <?php echo $row_list['regdate'];?> - <?php echo $row_list['regtime'];?></div>-->
                     
                     <td>
                     <form  action="#" method="post"  id="updateteam<?php echo $row_list['id'];?>" name="updateteamform<?php echo $row_list['id'];?>">
                     <select style="width:100%;" name="updateteam" onchange='updateteamform<?php echo $row_list['id'];?>.submit()'>
  <option value="" selected>Assign team</option>
<?php 
			 $as = $Q($link,"SELECT * FROM `teams` WHERE `status` = '1' ");
			 while($rowcat = $F($as))
			 {
			 ?>
			 <option value="<?php echo $rowcat['id']; ?>" <?php if($row_list['team']==$rowcat['id']){echo "selected";}?>><?php echo $rowcat['tname']; } ?></option>
             
</select>
 <input type="hidden" name="ruserid" value="<?php echo $row_list['userid'];?>">
  <input type="hidden" name="reventid" value="<?php echo $row_list['eventid'];?>">
  <input type="hidden" name="ruid" value="<?php echo $row_list['id'];?>">
</form>
                     </td>
                     
                     <td><a href="details.php?user=<?php echo $row_list['userid'];?>&event=<?php echo $row_list['eventid'];?>&catds=<?php echo $catds;?>&amp;page=<?php echo $page; ?>&amp;page_count=<?php echo $page_count; ?>&amp;sea_key=<?php echo $sea_key; ?>">View Details</a></td>
                     <td style="color:#FF0000;">
                     <strong><?php echo $row_list['payment']; ?></strong>
                     	</td>
                     </tr>
                     
                  
              
         <?php  $j++; } } ?>
         </table>
         <div class="text_white">
			<?php
                      if(@$total_records > @$records_per_page)
                      {
                          $pageL->totalRecords;
                          $pageL->currentPage;
                          $pageL->totalPages;
                          echo "<span class='text_white'><strong>Pages:</strong>&nbsp;</span>";
                          $pageL->displayLink("manage_registrations.php?page=$page&page_count=$page_count&catds=$catds", true, true, 10);
                  
                      }?>
          
            </div>
            
            </div>
          </div>
      </div>
      
</div>










    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap.min.js"></script>
<script>
$("#search").on("keyup", function() {
    var value = $(this).val();

    $(".table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(2)").text();

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});
</script>
	
  </body>
</html>
