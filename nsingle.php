<!doctype html>
<html class="no-js" lang="zxx">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Soccer Intimacy | Highlights</title>
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
		$hid = $_REQUEST['hid'];
		$hsinglerows       = $F($Q($link,"SELECT * FROM `higli` WHERE `id` = '$hid' AND status = '1'"));
		
		?>
        <!-- Breadcrumbs Section Start -->
		<div class="rs-breadcrumbs sec-color">
            <img src="images/breadcrumbs/blog-left.jpg" alt="Breadcrubs-image" />
            <div class="breadcrumbs-inner">
    			<div class="container">
    				<div class="row">
    					<div class="col-md-12 text-center">
    						<h1 class="page-title">News/<?php echo $hsinglerows['title'];?></h1>
    						<ul>
    							<li>
    								<a class="active" href="index.php">Home</a>
    							</li>
    							<li>News</li>
    						</ul>
    					</div>
    				</div>
    			</div>
            </div>
		</div>
		<!-- Breadcrumbs Section End -->
        
        <!-- Blog Single Start Here -->
		<div class="single-blog-details sec-spacer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
						<div class="single-image">
							<?php if ($hsinglerows['filefl']){?>
                            <img src="news/<?php echo $hsinglerows['filefl']?>" alt="News">
                            <?php }else{ ?>
                            <img src="images/blog-details/1.jpg" alt="News">
                            <?php } ?>
						</div>
						<h3><?php echo $hsinglerows['title'];?></h3>
						<?php echo $hsinglerows['content'];?>
						<!--<blockquote>
							<i class="fa fa-quote-left" aria-hidden="true"></i>
							Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC
						</blockquote>-->
						
						<div class="share-section">
							<div class="row">
								<div class="col-sm-6 col-xs-12 life-style">
									<span class="author"> 
										<a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> Admin </a>
									</span> 
									<span class="comment"> 
										<a href="#"> 
											<i class="fa fa-commenting-o" aria-hidden="true"></i>
                                            <?php echo $hsinglerows['bdate'];?>
										</a>
									</span>
									
								</div>
								<!--<div class="col-sm-6 col-xs-12">
									<ul class="share-link1">
										<li><a href="#"> Tags:</a></li>
										<li><a href="#"> Football</a></li>
										<li><a href="#"> Club</a></li>
										<li><a href="#"> Sports</a></li>
									</ul>
								</div>-->
							</div>
						</div>

						<div class="share-section2">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<span> You Can Share It : </span>
								</div>
								<div class="col-sm-6 col-xs-12">
									<ul class="share-link">
										<li><a href="javascript:void();"> <i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
										<li><a href="javascript:void();"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
										<li><a href="javascript:void();"><i class="fa fa-google" aria-hidden="true"></i> Google</a></li>
									</ul>
								</div>
							</div>
						</div>

						<!--<div class="row">
							<div class="col-sm-12 col-xs-12">
								<ul class="next-pre-section">
									<li class="left-arrow"><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous Post</a></li>
									<li class="right-arrow"><a href="#">Next Post <i class="fa fa-angle-right" aria-hidden="true"></i> </a></li>
								</ul>
							</div>
						</div>-->    
						<div class="like-section">
							<h3 class="title-bg">YOU MIGHT ALSO LIKE</h3>
							<div class="row">
								 <?php
                                $geteventdata	=	$Q($link,"SELECT * FROM `higli` WHERE `id` != '$hid' AND `status` = '1' ORDER BY `order` DESC LIMIT 3");
                                while($getdataeve	=	$F($geteventdata))
                                {
									?>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
									<div class="popular-post-img">
										<a href="nsingle.php?hid=<?php echo $getdataeve['id'];?>">
                                        <?php if ($getdataeve['filefl']){?>
                                        <img src="news/<?php echo $getdataeve['filefl'];?>" alt="News">
                                        <?php }else{?>
                                        <img src="images/blog-details/mid1.jpg" alt="News">
                                        <?php } ?>
                                        
                                        </a>                                   
									</div>                                
									<h3>
										<a href="nsingle.php?hid=<?php echo $getdataeve['id'];?>"><?php echo $getdataeve['title'];?></a>
									</h3>
									<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $getdataeve['bdate'];?></span>
								</div>
								<?php } ?>
							</div>
						</div>  
						                                 
					</div>
                    <div class="col-md-3 col-sm-12">
                        <!-- Blog Single Sidebar Start Here -->
						<div class="sidebar-area">
							<div class="search-box">
								<!--<div class="box-search">
									<input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
									<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
								</div>  -->  
							</div>
                            <div class="cate-box">
                                <span class="title">Categories</span>
                                <ul>
                                 <?php
                                $geteventdata2	=	$Q($link,"SELECT * FROM `higli` WHERE `id` != '$hid' AND `status` = '1' ORDER BY `order` DESC LIMIT 15");
                                while($getdataeve2	=	$F($geteventdata2))
                                {
									?>
                                    <li>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> 
                                        <a href="nsingle.php?hid=<?php echo $getdataeve2['id'];?>"><?php echo $getdataeve2['title'];?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            
                           
                          
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Single End Here -->
		
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
	</body>
</html>