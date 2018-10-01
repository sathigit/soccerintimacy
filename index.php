<!doctype html>
<html class="no-js" lang="zxx">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>soccerintimacy | Home</title>
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
		<link rel="stylesheet" href="css/time-circles.css">
		<!-- Slick css -->
		<link rel="stylesheet" href="css/slick.css">
		<!-- style css -->
		<link rel="stylesheet" href="style.css">
		<!-- responsive css -->
		<link rel="stylesheet" href="css/responsive.css">
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

		<!-- Slider Section Start Here -->
		<div class="slider-section4 slider-main">
			<div id="slider-five" class="owl-carousel">
				<div class="item active">
					<img src="images/full-slider/banner1.jpg" alt="Soccer Intimacy">
                    <div class="dsc">
					   <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="slider-text text-center">
                                        <h1 data-animation-in="slideInDown" data-animation-out="animate-out slideOutUp" >
                                        Hosting Namma Bengaluru&#39;s Most Awesome Football Events, Every Week!</h1>
                                        
                                        <div class="btn-slider" > 
                                    
                                           <p  class="btn1" data-animation-in="slideInUp" data-animation-out="animate-out slideOutDown" style=" margin-top:-4px;">
                                           Register NOW to experience &amp; play the best football tournaments around the city.</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>                
						</div>
					</div>
				</div>
				<!--<div class="item">
					<img src="images/full-slider/b2.jpg" alt="Soccer Intimacy">
                    <div class="dsc">
					   <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="slider-text text-center"> 
                                        <h1 data-animation-in="slideInDown" data-animation-out="animate-out slideOutUp"> WE HOST BENGALURU'S MOST AWESOME FOOTBALL EVENTS!</h1>
                                        
                                        <div class="btn-slider"> 
                                            <p  class="btn1" data-animation-in="slideInUp" data-animation-out="animate-out slideOutDown" style=" margin-top:-4px;">
                                           Join us in experiencing the best football tournaments and action in town.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>                
						</div>
					</div>
				</div>-->
                
				
			</div>
		</div>
		<!-- Slider Section end Here -->
	<!-- Upcoming Match Section Start Here-->
		<div class="upcoming-section">
			<div class="container">
                <h1 class="title-bg match" style="color:#fff;">Be part of all the action packed <br>  football tourneys happening around you!</h1>
                 <p align="center"  class="pclass">Soccer Intimacy gives YOU a chance to join the best football action across the city! If you thought your days of playing 
                     football were done, dust off those boots & give us a shot. From Elite Leagues being conducted during 
                     the weekends to Corporate Events & Knockout Tournaments that will surely awaken the 
                     fire inside you, embrace a footballing experience that's thrilling in every sense!
                      Bye bye monotony. Hello Soccer!</p>
			</div>
		</div>
		<!-- Upcoming Match Section end Here-->	

       
		
		
		<!-- All news area Start Here-->
		<div class="all-news-area sec-spacer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
                      
                        <div class="row">
			        		<div class="col-sm-8">
                              <h3 class="title-bg">Upcoming Events</h3>
					        	<div class="latest-news-slider">
					        		  <?php
                                $geteventdata	=	$Q($link,"SELECT * FROM `ex_mmenu` WHERE `status` = '1' ORDER BY `order` DESC LIMIT 0,5");
								$ncountd = $C($geteventdata);
								if($ncountd==0){ echo "<span style=color:#f00>No records found...</span>";}
								$i=0;
                                while($getdataeve	=	$F($geteventdata))
                                {
									//$getname    = $F($Q($link,"SELECT * FROM `register` WHERE `id`='$_SESSION[adminid]' "));
									$eveimage       = $F($Q($link,"SELECT * FROM `files` WHERE `catid` = '$getdataeve[id]' AND status = '1' ORDER BY `id` DESC LIMIT 1"));
									?>
                                    
                                    <div>
										<div class="news-normal-block">
						                    <div class="news-img">
						                        	
                                                     <?php if($eveimage['name']!=''){?>
                                <img src="admin/fileupload/server/php/files/<?php echo $eveimage['name'];?>">
                                <?php } else{?>
                                <img src="images/eve2.jpg" class="img-responsive">
                                
                                <?php } ?>
                                
						                    </div>
                                            <div align="center">
					                    	<h4 class="news-title"><a href="#"><?php echo $getdataeve['title'];?></a></h4>
					                    	<div class="news-desc">
                                                <p class="owl-caption">Auction Date: <?php echo $getdataeve['edate'];?></p>
                                                <p class="owl-caption">Event Type: <?php echo $getdataeve['edate'];?></p>
            <p class="owl-caption">Price:  <?php echo $getdataeve['eprice'];?> - INR</p>
					                    	</div>
					                    	<div class="news-btn">
					                    		 <p><a href="events.php?eventid=<?php echo $getdataeve['id'];?>" class="primary-btn" rel="tooltip" title="Download now">Resister Now</a></p>
					                    	</div>
                                            </div>
						                </div>			        			
					        		</div>
					        		<?php $i++;} ?>
					        		
					        	</div>			        			
			        		</div>
                          
			        		
                            <div class="col-md-4">
						<div class="sidebar-area right-side-area">
							<h3 class="title-bg">Recent Highlights</h3>
							<div class="today-match-teams text-center">
								
								<!-- <div class="title-head">
									<h4>Recent Highlights</h4>
								</div> -->
								
                                <div class="today-results-table">
                                <table>
                        	
                              <?php
                                $getdatah   =   $Q($link,"SELECT * FROM `blogs` WHERE `status` = '1' ORDER BY `order` DESC LIMIT 4");
								$ncounth = $C($getdatah);
								if($ncounth==0){ echo "<span style=color:#f00>No records found...</span>";}
                                while($getvalh  =   $F($getdatah))
                                {
                           ?>
                           

                            <tr class="htable">
                            	<td width="110">
                                <?php if($getvalh['filefl']!=''){?>
                                <img src="news/<?php echo $getvalh['filefl'];?>" class="img-responsive" width="100">
                                <?php } else{?>
                                <img src="images/h1.png" class="img-responsive" width="100">
                                
                                <?php } ?>
                                </td>
                                <td align="left"><?php echo $getvalh['title'];?>
                                <div class="view-score">
                                <a href="hsingle.php?hid=<?php echo $getvalh['id'];?>">Read more </i></a>
                            </div>
                                </td>
                            </tr>
<?php }?>
                            
                          </table>
                                   <?php if($ncounth>0){?> <div class="btn primary-btn b-r-n" ><a href="highlights.php">View All </a></div>
                                   <?php } ?>
                                </div>
							</div>
						</div>
					</div>
                    
			        	</div>
                        
                    </div>
					
				</div>
                <div class="separator-100"></div>
               
			</div>
		</div>
		<!-- All news area end Here-->
		
		<!-- Latest Video Start Here-->
		<div class="latest-video-section sec-spacer">
			
			<div class="container">
                <div class="l-v">
                <h3 class="title-bg l-v" >Latest video</h3>
                </div>
				<div class="row">
					<div class="col-md-8 col-sm-12 col-sm-12">
						<div class="video-area mb-40">
							<img src="images/latest-video/video.jpg" alt="Video"/>
							<div class="videos-icon">
                                <a class="popup-youtube" href="https://www.youtube.com/watch?v=t17O6JoU2Ew">
                                <i class="fa fa-play" aria-hidden="true"></i>
                                </a>
                            </div>
						</div>
                    </div>
                    
					<div class="col-md-4 col-xs-12 col-sm-12 latest-news">
						<div class="col-md-12 col-xs-6 col-sm-6 inner-news small-news" style="margin-top:30px;">
							<div class="news-img">
								<a class="popup-youtube" href="https://www.youtube.com/watch?v=t17O6JoU2Ew"><img src="images/latest-video/1.jpg" alt="News" /></a>
							</div>
							<div class="news-text">
								<h5><a class="popup-youtube" href="https://www.youtube.com/watch?v=t17O6JoU2Ew">fifi vs dlf 1-1</a></h5>
								<span class="date">May 30, 2017</span>
								<ul class="rating">
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
								</ul>
							</div>
                        </div>
                   

						<div class="col-md-12 col-xs-6 col-sm-6 inner-news small-news">
							<div class="news-img">
								<a class="popup-youtube" href="https://www.youtube.com/watch?v=t17O6JoU2Ew"><img src="images/latest-video/2.jpg" alt="News" /></a>
							</div>
							<div class="news-text">
								<h5><a class="popup-youtube" href="https://www.youtube.com/watch?v=t17O6JoU2Ew">fifi vs dlf  1-1</a></h5>
								<span class="date">May 30, 2017</span>
								<ul class="rating">
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
								</ul>
							</div>
                        </div>
                           
						<div class="col-md-12 col-xs-6 col-sm-6 inner-news small-news">
							<div class="news-img">
								<a class="popup-youtube" href="https://www.youtube.com/watch?v=t17O6JoU2Ew"><img src="images/latest-video/3.jpg" alt="News" /></a>
							</div>
							<div class="news-text">
								<h5><a class="popup-youtube" href="https://www.youtube.com/watch?v=t17O6JoU2Ew">fifi vs dlf 1-1</a></h5>
								<span class="date">May 30, 2017</span>
								<ul class="rating">
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
								</ul>
							</div>
                        </div>
                        
					</div>
				</div>
			</div>
		</div>
		<!-- Latest Video end Here-->
		
		<!-- Our Team Start Here-->
		<div class="our-team-section pt-100 pb-100">
            <div class="container">
                <div class="row">
                <h3 class="title-bg" >Players of the month</h3>
                    <div class="col-md-12 col-sm-12">
                        
                      <div id="potm" class="owl-carousel">
                            <div class="item  our-team">
                                <img src="images/cards/Cards-01.jpg" alt="Team">
                                <div class="person-details">
                                    <div class="overly-bg raa"></div>
                                    <a href="#"><h5 class="person-name">Name!</h5></a>
                                    <table class="person-info">
                                        <tbody>
                                            <tr>
                                                 <td>Born</td>
                                                 <td>sep 31, 1988</td>
                                            </tr>
                                            <tr>
                                                 <td>Position</td>
                                                 <td>Forward</td>
                                            </tr>
                                            <tr>
                                                 <td>Squad number</td>
                                                 <td>11</td>
                                            </tr>
                                            <tr>
                                                 <td>Team</td>
                                                 <td>Badda</td>
                                            </tr>
                                            <tr>
                                                <td>Fallow us on</td>
                                                <td>
                                                    <ul class="person-social-icons">
                                                        <li><a href="#" class="active"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="item  our-team">
                                <img src="images/cards/Cards-02.jpg" alt="Team" />
                                <div class="person-details">
                                    <div class="overly-bg raa"></div>
                                    <a href="#"><h5 class="person-name">Name2</h5></a>
                                    <table class="person-info">
                                        <tbody>
                                            <tr>
                                                 <td>Born</td>
                                                 <td>sep 31, 1988</td>
                                            </tr>
                                            <tr>
                                                 <td>Position</td>
                                                 <td>Goalkeeper</td>
                                            </tr>
                                            <tr>
                                                 <td>Squad number</td>
                                                 <td>11</td>
                                            </tr>
                                            <tr>
                                                 <td>Team</td>
                                                 <td>Badda</td>
                                            </tr>
                                            <tr>
                                                <td>Fallow us on</td>
                                                <td>
                                                    <ul class="person-social-icons">
                                                        <li><a href="#" class="active"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="item our-team">
                               <img src="images/cards/Cards-03.jpg" alt="Team" />
                                <div class="person-details">
                                    <div class="overly-bg raa"></div>
                                    <a href="#"><h5 class="person-name">Name!3</h5></a>
                                    <table class="person-info">
                                        <tbody>
                                            <tr>
                                                 <td>Born</td>
                                                 <td>July 21, 1994</td>
                                            </tr>
                                            <tr>
                                                 <td>Position</td>
                                                 <td>striker</td>
                                            </tr>
                                            <tr>
                                                 <td>Squad number</td>
                                                 <td>10</td>
                                            </tr>
                                            <tr>
                                                 <td>Team</td>
                                                 <td>Badda</td>
                                            </tr>
                                            <tr>
                                                <td>Fallow us on</td>
                                                <td>
                                                    <ul class="person-social-icons">
                                                        <li><a href="#" class="active"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="item our-team">
                                <img src="images/cards/Cards-04.jpg" alt="Team" />
                                <div class="person-details">
                                    <div class="overly-bg raa"></div>
                                    <a href="#"><h5 class="person-name">Name4</h5></a>
                                    <table class="person-info">
                                        <tbody>
                                            <tr>
                                                 <td>Born</td>
                                                 <td>sep 31, 1985</td>
                                            </tr>
                                            <tr>
                                                 <td>Position</td>
                                                 <td>Defender</td>
                                            </tr>
                                            <tr>
                                                 <td>Squad number</td>
                                                 <td>11</td>
                                            </tr>
                                            <tr>
                                                 <td>Team</td>
                                                 <td>Badda</td>
                                            </tr>
                                            <tr>
                                                <td>Fallow us on</td>
                                                <td>
                                                    <ul class="person-social-icons">
                                                        <li><a href="#" class="active"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
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
		<!-- Our Team end Here-->
        
        <!-- Testimonials Sections Start Here-->
		<div class="testimonial-section pb-100" style="margin-top:40px;">
            <div class="container">
                <h3 class="title-bg t-e">Testimonials</h3>
                <div class="row">
                    <div class="col-md-12">
                            <div id="testimonial-slider" class="rs-carousel owl-carousel" data-loop="true" data-items="1" data-margin="0" data-autoplay="true" data-autoplay-timeout="6000" data-smart-speed="2000" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="1" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="1" data-md-device-nav="false" data-md-device-dots="false">
                            <div class="testimonial">
                                <div class="testimonial-profile">
                                    <a href="#"><img src="images/testimonial/testi.jpg" alt="tom"></a>
                                </div>
                                <div class="testimonial-content">
                                    <h3 class="testimonial-title">Sanjay Paul</h3>
                                    <span class="testimonial-post">Football Coach KSFA</span>
                                    <div class="client-rating">
                                        <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> 
                                    </div>
                                    <p class="testimonial-description">
                                        Found out about Soccer Intimacy through the boys I train.Very interesting and unique way to connect people who have a common interest in football. Also a great platform for young talents to be recognised for the future of Indian football.
                                    </p>
                                </div>
                            </div>
                            <div class="testimonial">
                                <div class="testimonial-profile">
                                    <a href="#"><img src="images/testimonial/testi.jpg" alt=""></a>
                                </div>
                                <div class="testimonial-content">
                                    <h3 class="testimonial-title">David Satya</h3>
                                    <span class="testimonial-post">MD Sport Alfa Academy </span>
                                    <div class="client-rating">
                                        <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> 
                                    </div>
                                    <p class="testimonial-description">
                                        Soccer Intimacy is a very important tool for the empowerment of soccer in India especially in the current scenario. Great initiative by Anil & Surej in making this happen. All the very best!
                                    </p>
                                </div>
                            </div> 
                            <div class="testimonial">
                                <div class="testimonial-profile">
                                    <a href="#"><img src="images/testimonial/testi.jpg" alt="Ian"></a>
                                </div>
                                <div class="testimonial-content">
                                    <h3 class="testimonial-title">Kumar P J </h3>
                                    <span class="testimonial-post">Sports Director, East International College</span>
                                    <div class="client-rating">
                                        <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> 
                                    </div>
                                    <p class="testimonial-description">
                                       
Superb idea in Bangalore. I’m very positive that this will bring a revolution of football in Bangalore. I hope this will grow and provide the best opportunities for young guys interested in the game. 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonials Sections End Here-->
        
        
                <!-- scroll Sections Start Here-->
		<div class="testimonial-section pb-100" style="margin-top:40px;">
            	<div class="container">
    	
    </div>
        </div>
        <!-- scroll Sections End Here-->
        
        <!-- Our UE Start Here-->
		<div class="our-team-section pt-100 pb-100 ue">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <h3 class="title-bg u-e" style="color:#fff;">Upcoming Events</h3>
                        <div  id="ue" class="owl-carousel">
                            <?php require_once("upcoming.php"); ?>
                           
                           </div></div> 
                         
                   
                </div>
            </div>
        </div>
        
        	<div class="our-team-section pt-100 pb-100 ue3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                       
                           <div class="row" id="counter">
        	<div class="col-sm-3 counter-Txt"> <p><img src="images/c4.png"> </p><span class="counter-value" data-count="5000">0</span> Players</div>
            <div class="col-sm-3 counter-Txt"> <p><img src="images/c2.png"> </p> <span class="counter-value" data-count="25">0</span> Tournaments</div>
            <div class="col-sm-3 counter-Txt"> <p><img src="images/c3.png"> </p> <span class="counter-value" data-count="40">0</span> Arenas</div>
            <div class="col-sm-3 counter-Txt"> <p><img src="images/c1.png"> </p> <span class="counter-value" data-count="100000">0</span> Cash Prices</div>
        </div>
                   
                </div>
            </div>
        </div></div>
<!-- Our UE end Here-->
        <!-- Gallery Section Start Here-->
        <div class="gallery-section-area pb-70" style="margin-top:40px;">
            <!-- <div class="container" id="grid">
                <h3 class="title-bg">photo booth</h3>
                
            </div> -->
            <div class="container">
            <h3 class="title-bg p-b">Photo Booth</h3>
                <div id="upcoming" class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="20" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="4" data-md-device-nav="false" data-md-device-dots="false">
                  <?php require_once('galleryc.php');?>
                </div>
            </div>
        </div>
		 <!-- Gallery Section End Here-->
        
		<!-- Champion Awards Start Here-->
		<!--<div class="champion-awards-section sec-spacer">
			<div class="overly-bg"></div>
			<div class="container">
				<h3 class="title-bg">champion awards</h3>
                <div class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="8000" data-smart-speed="1500" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="4" data-md-device-nav="false" data-md-device-dots="false">
                    <div class="champion-list">
                        <img src="images/awards/1.png" alt="" />
                        <div class="awards-content">
                            <h4 class="awards-title">Club 2017 champion</h4>
                        </div>
                    </div>
                    <div class="champion-list">
                        <img src="images/awards/2.png" alt="" />
                        <div class="awards-content">
                            <h4 class="awards-title">Club 2017 champion</h4>
                        </div>
                    </div>
                    <div class="champion-list">
                        <img src="images/awards/3.png" alt="" />
                        <div class="awards-content">
                            <h4 class="awards-title">Club 2017 champion</h4>
                        </div>
                    </div>
                    <div class="champion-list">
                        <img src="images/awards/4.png" alt="" />
                        <div class="awards-content">
                            <h4 class="awards-title">Club 2017 champion</h4>
                        </div>
                    </div>
                    <div class="champion-list">
                        <img src="images/awards/3.png" alt="" />
                        <div class="awards-content">
                            <h4 class="awards-title">Club 2017 champion</h4>
                        </div>
                    </div>
                    <div class="champion-list">
                        <img src="images/awards/4.png" alt="" />
                        <div class="awards-content">
                            <h4 class="awards-title">Club 2017 champion</h4>
                        </div>
                    </div>
                </div>
			</div>
		</div>-->
		<!-- Champion Awards end Here-->
		
		

        

		<!-- Client Logo Section Start Here-->
		<div class="clicent-logo-section sec-spacer">
            
            <div class="container">
            <h3 class="title-bg">Our Partners</h3>
                <div id="upcoming" class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="80" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="4" data-md-device-nav="false" data-md-device-dots="false">
                  <?php require_once('partners.php');?>
                </div>
            </div>
        </div>
        <!-- Client Logo Section End Here-->
		
		<?php require_once('footer.php');?>
        <!-- Footer End -->
        
        <!-- Search Modal Start -->
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
		<script src="js/time-circle.js"></script>
		<!-- magnific-popup js -->
		<script src="js/jquery.magnific-popup.js"></script>
		<!-- main js -->
		<script src="js/main.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/validations.js"></script>
        <script src="js/login.js"></script>
        <script>
		var a = 0;
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-value').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 10000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }

});
		</script>
	</body>
</html>

