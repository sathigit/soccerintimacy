<?php

include 'includes/connection.php';



if($_SESSION['adminid']=="")

{

  echo "<script>window.location='index.php';</script>";

}


$page_count  = $_REQUEST['page_count'];
$page        = $_REQUEST['page'];
$sea_key     = $_REQUEST['sea_key'];
$id          = $_REQUEST['id'];
$catds       = $_REQUEST['catds'];


if($user=='')   { $user    = $_REQUEST['user'];}


$userdata =   $F($Q($link,"SELECT * FROM `register` WHERE `id` = '$user' "));












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



                  <span class="span10"> <a href="view_registrations.php?page=<?php echo $page; ?>&amp;page_count=<?php echo $page_count; ?>&amp;sea_key=<?php echo $sea_key; ?>" class="btn btn-inverse" >Back</a></span>



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
                   <!-- <p><strong>Payment status: </strong>
					
					<?php if($eventdb['payment']){echo "<strong style=color:#F00;>Paid</strong>";}
					else{echo "<strong style=color:#F00;>Pending</strong>";}?>
                    
                    </p>-->
                    <p align="center"><img src="../photo/<?php echo $userdata['filefl'];?>"  class="img-thumbnail" width="200"></p>
                     

                     </span>

                     <p>&nbsp;</p>

<!--                     <p>
<?php if($eventdb['payment']=='paid'){?>
                     <a href="javascript:void(0);" class="btn btn-inverse">Payment Done</a>
<?php }else{ ?>
<a href="details.php?user=<?php echo $user ?>&event=<?php echo $event ?>&updatepay=paid" class="btn btn-inverse">Make Payment</a>
<?php }?>

                     </p>-->

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

