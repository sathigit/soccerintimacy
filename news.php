<!doctype html>
<html class="no-js" lang="zxx">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Soccer Intimacy  | News</title>
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
		
        
        <!-- Breadcrumbs Section Start -->
		<div class="rs-breadcrumbs sec-color">
            <img src="images/breadcrumbs/blog.jpg" alt="Breadcrubs" />
            <div class="breadcrumbs-inner">
    			<div class="container">
    				<div class="row">
    					<!-- <div class="col-md-12 text-center">
    						<h1 class="page-title">News</h1>
    						<ul>
    							<li>
    								<a class="active" href="index.php">Home</a>
    							</li>
    							<li>News</li>
    						</ul>
    					</div> -->
    				</div>
    			</div>
            </div>
		</div>
		<!-- Breadcrumbs Section End -->
        
        <!-- Home Blog Start Here -->
        <div id="rs-blog" class="rs-blog sec-spacer">
            <div class="container">
                <div class="row">  
					 <?php
                                $geteventdata	=	$Q($link,"SELECT * FROM `higli` WHERE `status` = '1' ORDER BY `order` DESC");
								$ncount = $C($geteventdata);
								if($ncount==0){ echo "No records found...";}
								$i=0;
                                while($getdataeve	=	$F($geteventdata))
                                {
									//$getname    = $F($Q($link,"SELECT * FROM `register` WHERE `id`='$_SESSION[adminid]' "));
									//$eveimage       = $F($Q($link,"SELECT * FROM `files` WHERE `subcatid` = '$getdataeve[id]' AND status = '1'"));
									?>
                    <div class="col-md-3 col-sm-6 col-xs-6">
						<div class="single-blog-slide">
							<div class="images">
								<a href="nsingle.php?hid=<?php echo $getdataeve['id'];?>">
                                <?php if($getdataeve['filefl']!=''){?>
                                <img src="news/<?php echo $getdataeve['filefl']?>" alt="News">
                                	<?php } else{?>
                                    <img src="images/blog/1.jpg" alt="News">
                                    <?php } ?>
                                </a>
							</div>
                            <div class="blog-details">
                                <span class="date"><i class="fa fa-calendar-check-o"></i> <?php echo $getdataeve['bdate'];?></span>
                                <h3><a href="nsingle.php?hid=<?php echo $getdataeve['id'];?>"><?php echo $getdataeve['title'];?> </a></h3>
                                <p><?php custom_echo($getdataeve['content'], 100); ?></p>
                                <div class="read-more">
                                    <a href="nsingle.php?hid=<?php echo $getdataeve['id'];?>">Read More</a>
                                </div>
                            </div>
						</div> 
					</div>
                    <?php $i++;} ?>
                      
					
						</div> 
					</div> 
                </div>
               
            </div>
        </div>
        <!-- Home Blog End Here -->
        
		<!-- Client Logo Section Start Here-->
		<div class="clicent-logo-section sec-spacer">
			<div class="container">
            <h3 class="title-bg">Our Partners</h3>
                <div id="upcoming" class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="20" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="4" data-md-device-nav="false" data-md-device-dots="false"><?php require_once('partners.php');?>
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
        <script src="js/newsletter.js"></script>
	</body>
</html>