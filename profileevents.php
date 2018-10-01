<!doctype html>
<html class="no-js" lang="zxx">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Soccer Intimacy | About</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" href="apple-touch-icon.png">
		<!-- Place favicon.ico in the root directory -->
		<link rel="shortcut icon" type="image/x-icon" href="images/fav.png">    
		<!-- bootstrap v3.3.6 css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- font-awesome css -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- animate css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- Main Menu css -->
		<link rel="stylesheet" href="css/rsmenu-main.css">
		<!-- rsmenu transitions css -->
		<link rel="stylesheet" href="css/rsmenu-transitions.css">
		<!-- hover-min css -->
		<link rel="stylesheet" href="css/hover-min.css">
		  <!-- magnific-popup css -->
		<link rel="stylesheet" href="css/magnific-popup.css">
		<!-- owl.carousel css -->
		<link rel="stylesheet" href="css/owl.carousel.css">
		<!-- Slick css -->
		<link rel="stylesheet" href="css/slick.css">
		<!-- Slick Theme css -->
		<link rel="stylesheet" href="css/slick-theme.css">
		<!-- style css -->
		<link rel="stylesheet" href="style.css">
		<!-- responsive css -->
		<link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css" />
		<!-- modernizr js -->
		<script src="js/modernizr-2.8.3.min.js"></script>
	</head>
	<body class="home-two">
		<!--Preloader start here-->
		<div id="preloader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
		<!--Preloader area end here-->
        
		
		<?php require_once('menu.php');?>
        
        <!-- Breadcrumbs Section Start -->
		<div class="rs-breadcrumbs sec-color">
            <img src="images/breadcrumbs/about.jpg" alt="Breadcrubs" />
            <div class="breadcrumbs-inner">
    			<div class="container">
    				<div class="row">
    					<!-- <div class="col-md-12 text-center">
    						<h1 class="page-title" style="text-transform:capitalize;">Registered Events for <?php custom_echo($getname['firstname'], 200); ?></h1>
    						<ul>
    							<li>
    								<a class="active" href="index.php">Home</a>
    							</li>
    							<li>Registered Events</li>
    						</ul>
    					</div> -->
    				</div>
    			</div>
            </div>
		</div>
		<!-- Breadcrumbs Section End -->

		<!-- Club Section Start -->
		<div class="rs-club sec-spacer">
			<div class="container">
                <h3 class="title-bg">Registered Events Info!</h3>
				<div class="row">
					<div class="col-md-12 col-ms-12">
						<div class="rs-club-text">
						<div class="rs-point-table">
<div class="rs-point-table">
<div class="container">
<div class="tab-content" style="margin-bottom:100px;">
<table>
<tbody>
<tr>
<td class="team-name">Event</td>
<td>Event Date</td>
<td>Played Team</td>
<td>Registration Type</td>
<td>Registration Fee</td>
<td>Registered Date</td>
<td>Payment status</td>
</tr>
  <?php
  $getdataw	=	$Q($link,"SELECT * FROM `eventdb` WHERE `userid` = '$euserid' ORDER BY `orderi` DESC");
  $getcountformenuw = $C($getdataw);
  if($getcountformenuw==0)  {echo "No records found..."; };
  while($getvalw	=	$F($getdataw))
  {
	  $ewdata = $F($Q($link,"SELECT * FROM `ex_mmenu` WHERE `id`='$getvalw[eventid]' "));
	  $twdata = $F($Q($link,"SELECT * FROM `teams` WHERE `id`='$getvalw[team]' "));
?>
<?php if($getcountformenuw==0){?>
 <tr>
<td colspan="6" align="center" style="color:#f00;">No Records found</td>
</tr>      <?php } ?>                   
<tr>
<td><?php echo $ewdata['title'];?></td>
<td><?php echo $ewdata['edate'];?></td>
<td><?php if($twdata['tname']){echo $twdata['tname'];} else { echo "Not Assigned"; }?></td>
<td><?php echo $getvalw['rtype'];?></td>
<td><?php echo $getvalw['amountpaid'];?></td>
<td><?php echo $getvalw['regdate']; ?> - <?php echo $getvalw['regtime']; ?></td>
<td><?php if($getvalw['payment']){ echo $getvalw['payment']; }else{ echo "Pending";}?></td>
</tr>
 <?php }?>
</tbody>
</table>
</div>
</div>
</div>


						</div>
					</div>
									</div>
			</div>
		</div>
		<!-- Club Section End -->
        
       
        
        
        
        
        
		<!-- Client Logo Section Start Here-->
		<div class="clicent-logo-section sec-spacer">
			<div class="overly-bg"></div>
			<div class="container">
                <div id="upcoming" class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="20" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="4" data-md-device-nav="false" data-md-device-dots="false">
                    <div class="item">
                        <div class="single-logo">
                            <a href="#"><img src="images/e01.png" alt=""></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-logo">
                            <a href="#"><img src="images/e02.png" alt=""></a>
                        </div>
                    </div>

                    <div class="item">
                        <div class="single-logo">
                            <a href="#"><img src="images/e03.png" alt=""></a>
                        </div>
                    </div> 
                    <div class="item">
                        <div class="single-logo">
                            <a href="#"><img src="images/e04.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
		</div>
        <!-- Client Logo Section End Here-->
		
		<?php require_once('footer.php');?>
        
        <!-- Search Modal Start Here -->
        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true" class="fa fa-close"></span>
	        </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form>
                            <div class="form-group">
                                <input class="form-control" placeholder="eg: Soccer News" type="text">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End Here -->
        
		<!-- Start scrollUp  -->
		<div id="return-to-top">
			<span>Top</span>
		</div>
		<!-- End scrollUp  -->

		<!-- all js here -->
		<!-- jquery latest version -->
		<script src="js/jquery.min.js"></script>
		<!-- Menu js -->
		<script src="js/rsmenu-main.js"></script> 
		 <!-- jquery-ui js -->
		<script src="js/jquery-ui.min.js"></script>
		<!-- bootstrap js -->
		<script src="js/bootstrap.min.js"></script>
		<!-- meanmenu js -->
		<script src="js/jquery.meanmenu.js"></script>
		<!-- wow js -->
		<script src="js/wow.min.js"></script>
		<!-- Slick js -->
		<script src="js/slick.min.js"></script>
		<!-- masonry js -->
		<script src="js/masonry.js"></script>
		<!-- magnific-popup js -->
		<!-- owl.carousel js -->
		<script src="js/owl.carousel.min.js"></script>
		<!-- magnific-popup js -->
		<script src="js/jquery.magnific-popup.js"></script>
		<!-- jquery.counterup js -->
		<script src="js/jquery.counterup.min.js"></script>
		<script src="js/waypoints.min.js"></script>
		<!-- main js -->
		<script src="js/main.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/validations.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/login.js"></script>
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 
	</body>
</html>