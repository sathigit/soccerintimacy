<!doctype html>
<html class="no-js" lang="zxx">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Soccer Intimacy | Team</title>
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
	<?php
     $teamdata   =   $F($Q($link,"SELECT * FROM `teams` WHERE `id` = '$teamid'"));
	?>	
        
        <!-- Breadcrumbs Section Start -->
		<div class="rs-breadcrumbs sec-color">
            <img src="images/breadcrumbs/team.jpg" alt="Breadcrubs" />
            <div class="breadcrumbs-inner">
    			<div class="container">
    				<div class="row">
    					<div class="col-md-12 text-center">
    						<h1 class="page-title" style="text-transform:uppercase;"><?php echo $teamdata['tname']; ?>-Team Details for the event <?php echo $eventdatarows['title'];?>
                            </h1>
    						<ul>
    							<li>
    								<a class="active" href="index.php">Home</a>
    							</li>
    							<li><?php echo $teamdata['tname']; ?></li>
    						</ul>
    					</div>
    				</div>
    			</div>
            </div>
		</div>
		<!-- Breadcrumbs Section End -->
        
        <!-- Our Team Start Here-->
		<div class="our-team-section team-inner-page sec-spacer">
			<div class="container">
				<div class="row">
					 <?php
                                $getplayerdata	=	$Q($link,"SELECT *  FROM `eventdb` WHERE  `eventid` = '$eventid' AND `team` = '$teamid' ORDER BY `orderi` DESC");
								$getcountpl  = $C($getplayerdata);
                                  if($getcountpl==0){ echo "No records found...";}             
                                while($getplayerrows	=	$F($getplayerdata))
                                {$getplayer =   $F($Q($link,"SELECT * FROM `register` WHERE `id` = '$getplayerrows[userid]'  ORDER BY `orders` DESC"));
								//$getteam =   $F($Q($link,"SELECT * FROM `teams` WHERE `id` = '$getplayerrows[team]' ORDER BY `orderi` DESC"));
                          if($getcountpl>0){ ?>
                           
                    <div class="col-md-3 col-sm-6 col-xs-6">
						<div class="our-team">
							<?php if($getplayer['filefl']!=''){?>
                              <img src="photo/<?php echo $getplayer['filefl'];?>">
            <?php } else{?>
            	 <img src="images/team/5.jpg" alt="">
            <?php } ?>
							<div class="person-details">
								<div class="overly-bg"></div>
								<a href="javascript:void()"><h5 class="person-name"><?php echo $getplayer['firstname']; ?></h5></a>
								<table class="person-info">
									<tbody>
										<tr>
											 <td>Born</td>
											 <td><?php echo $getplayer['dob']; ?></td>
									    </tr>
										<tr>
											 <td>Position</td>
											 <td><?php echo $getplayer['position1']; ?></td>
									    </tr>
										<tr>
											 <td>Squad number</td>
											 <td><?php echo $getplayer['uid']; ?></td>
									    </tr>
										
										<!--<tr>
											<td>Fallow us on</td>
											<td>
												<ul class="person-social-icons">
													<li><a href="#" class="active"><i class="fa fa-facebook"></i></a></li>
													<li><a href="#"><i class="fa fa-twitter"></i></a></li>
													<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
												</ul>
											</td>
									    </tr>-->
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php } }?>
				</div>
			</div>
		</div>
		<!-- Our Team end Here-->
        	<div class="clicent-logo-section sec-spacer" style="margin:40px 0 50px 0">

			<div class="container">
             <h3 class="title-bg">Our Partners</h3>
                <div id="upcoming" class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="20" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="4" data-md-device-nav="false" data-md-device-dots="false">
                    <?php require_once('partners.php');?>
                </div>
            </div>
		</div>
		
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
        <script src="js/main.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/validations.js"></script>
        <script src="js/newsletter.js"></script>

	</body>
</html>