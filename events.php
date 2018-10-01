<!doctype html>
<html class="no-js" lang="zxx">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Soccer Intimacy | Events</title>
		<meta name="description" content="">
        <meta name="viewport" content="width=device-width ,initial-scale=1">
		<link rel="apple-touch-icon" href="apple-touch-icon.png">
		<!-- Place favicon.ico in tde root directory -->
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
		<div class="container-fluid" style="padding:0;">
            <!--<img src="images/breadcrumbs/chelsea.jpg" alt="Breadcrubs" />-->
            <?php if($eveimagerows['name']!=''){?>
            <img src="admin/fileupload/server/php/files/<?php echo $eveimagerows['name'];?>" class="img-responsive" width="100%">
            <?php } else{?>
            		<img src="images/breadcrumbs/chelsea.jpg" alt="Breadcrubs" />
            <?php } ?>
            <div class="breadcrumbs-inner">
    			<div class="container">
    				<div class="row">
    					<div class="col-md-12 text-center">
    						<!--<h1 class="page-title"><?php echo $eventdatarows['title'];?></h1>
    						<ul>
    							<li>
    								<a class="active" href="index.php">Home</a>
    							</li>
    						
    						</ul>-->
    					</div>
    				</div>
    			</div>
            </div>
		</div>
		<!-- Breadcrumbs Section End -->

        <!-- Point Table Section Start -->
        <div class="champion-section-area sec-spacer">
	        <div class="container">
                <div class="row pb-50">
                    <div class="col-md-2 col-sm-3">
                        <div class="club-sidebar-top">
                            <div class="club-logo">
                            <?php if($eventdatarows['filefl']!=''){?>
                              <img src="news/<?php echo $eventdatarows['filefl'];?>">
            <?php } else{?>
            	<img src="images/upcoming/1.png" alt="logo">
            <?php } ?>
            
                                
                                <div class="club-name">
                                    <h3 class="title-bg e-t"><?php echo $eventdatarows['title'];?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-9 tabbee" style="">
                        <div class="club-sidebar">
                            <!--<div class="club-details">
                                <ul class="spsoccer-team-info-list spsoccer-ul-list">
                                    <li>
                                        <strong>Former President</strong>
                                        <span>Arturo Vidal</span>
                                    </li>
                                    <li>
                                        <strong>Manager Name</strong>
                                        <span>Mahabub Alam</span>
                                    </li>
                                    <li>
                                        <strong>Past Coach </strong>
                                       <span>Abdur Roshid</span>
                                    </li>
                                    <li>
                                        <strong>Current Coach </strong>
                                        <span>Masud Rana</span>
                                    </li>
                                    <li>
                                        <strong>Location</strong>
                                        <span>spain</span>
                                    </li>
                                </ul>
                            </div>-->
                        </div>
                        <div class="row">
                           <div class="rs-count">
                               <?php 
$qw = date( 'M j, Y', strtotime ( $eventdatarows['edate'] ) );
$qw2 = date( 'M j, Y', strtotime ( $eventdatarows['adate'] ) );
$qw3 = date( 'M j, Y');
?>
                                <!-- COUNTER-LIST START -->
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="rs-counter-list">
                                        <h2 class="rs-counter percent"><?php echo $qw;?></h2>   
                                        <h3>Kick-Off</h3>
                                    </div>
                                </div>
                                <!-- COUNTER-LIST END -->
                               
                                <!-- COUNTER-LIST START -->
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="rs-counter-list">
                                        <h2 class="rs-counter percent"><?php echo $qw2;?></h2>   
                                        <h3>Auction</h3>
                                    </div>
                                </div>
                                <!-- COUNTER-LIST END -->
                               
                                <!-- COUNTER-LIST START -->
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="rs-counter-list">
                                        <h2 class="rs-counter"><?php echo $eventdatarows['etype'];?></h2>                      
                                        <h3>Event Type</h3>
                                    </div>
                                </div>
                                <!-- COUNTER-LIST END -->
                               
                                <!-- COUNTER-LIST START -->
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="rs-counter-list">
                                        <h2 class="rs-counter"><?php echo $eventdatarows['eprice'];?>-INR</h2>                     
                                        <h3>Price</h3>
                                    </div>
                                </div>
                                <!-- COUNTER-LIST END -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-12">
              <div class="col-sm-3 e-i">
              <h3 class="title-bg">EVENT Information</h3>
              </div>
                          <?php 
$datem = new DateTime($eventdatarows['edate']);
$nowm = new DateTime();
if(($datem > $nowm)){?>
						 
						 <?php 
                            $dater = new DateTime($eventdatarows['redate']);
$nowr = new DateTime();
if(($dater > $nowr && $countsq==0)){?>
                        <div class="col-sm-4">
                        <div class="form-group">
                        <form  action="" method="POST" id="eventregister">
                              <input type="hidden" name="eventid" value="<?php echo $eventdatarows['id']?>">
                              <input type="hidden" name="userid" value="<?php echo $_SESSION['adminid'];?>">
                              
												<label>Select Registration Type*</label>
												<select class="ch" name="rtype" id="regm">
													<option value="">Select an option</option>
                                                    <option value="Player">Player - 1500 INR</option>
                                                    <option value="Captain">Captain - 4000 INR</option>
												</select>
											</div>
                                            
                        </div>
                        <div class="col-sm-4">
                        <?php if($_SESSION['adminid']){?>
                        <button id="rzp-button1" class="btn primary-btn" style="color:#fff; background:#e7292b; margin-top:30px;">Pay by Razorpay</button>
                        <button id="rzp-button3" class="btn primary-btn" style="color:#fff; background:#e7292b; margin-top:30px; pointer-events:none;">
                        Please wait while we are registering you sercurely...</button>
                        <input type="submit" value="Register" id="rzp-button2" name="registerevent" class="btn primary-btn" style="color:#fff; background:#e7292b; margin-top:30px;">
                        <?php } else {?>                      
                         <p><a data-target=".login-modal-event" data-toggle="modal" href="javascript:void();" 
                         class="btn primary-btn" style="margin-top:30px;">Login to register</a></p>
                        <?php }?>
                        </div></form>
                        <?php } 
						
						if(($dater < $nowr && $countsq==0)){?>
                        <div class="col-sm-4 tabee" style="color:#f00; ">
                           <span class="tabee2">STATUS:</span> <strong>Registration is closed for this event...</strong>
                        </div>
                        
                        <?php } ?>
                        
                          <?php if($countsq>0)  {?>
<div class="col-sm-4 tabee" style="color:#f00;">
                           <span class="tabee2">STATUS:</span>  <strong>You have registered for this event...</strong></div>
                            <?php } ?>
                            
<?php }else {?>
  <div class="col-sm-4 tabee" style="color:#f00;">
  <span class="tabee2">STATUS:</span> <strong>This event is over...</strong></a></div>

    <?php } ?> 
    
                   </div>
             </div>
                <div class="row">
                    <div class="col-sm-12">
                       
                   
                        
                         <?php 
                            //$date = new DateTime($eventdatarows['adate']);
//$now = new DateTime();
if($checkPayment['payment']=="Paid"){?>
                        <ul class="point-menu">
                        <li class="active"><a data-toggle="tab" href="#einfo">Event Info</a></li>
                            <li><a data-toggle="tab" href="#rules">Rules</a></li>
                            <li><a data-toggle="tab" href="#squad-list">Players</a></li>
                            <li><a data-toggle="tab" href="#team">Team</a></li>
                            <li><a data-toggle="tab" href="#fixtures">Fixtures</a></li>
                            <li><a data-toggle="tab" href="#tables">Tables</a></li>
                            <li><a data-toggle="tab" href="#results">Results</a></li>
                            <li><a data-toggle="tab" href="#news">News</a></li>
                            <li><a data-toggle="tab" href="#staff">Staff</a></li>
                            
                            
                        </ul>
                         <?php } else{?>
                         <ul class="point-menu">
                            <li class="active"><a data-toggle="tab" href="#einfo">Event Info</a></li>
                            <li><a data-toggle="tab" href="#rules">Rules</a></li>
                            <li><a  class="disabledbtn" data-toggle="tab" href="#squad-list">Players</a></li>
                            <li><a  class="disabledbtn" data-toggle="tab" href="#team">Team</a></li>
                            <li><a class="disabledbtn"  data-toggle="tab" href="#fixtures">Fixtures</a></li>
                            <li><a class="disabledbtn"  data-toggle="tab" href="#tables">Tables</a></li>
                            <li><a class="disabledbtn"  data-toggle="tab" href="#results">Results</a></li>
                            <li><a data-toggle="tab" href="#news">News</a></li>
                            <li><a data-toggle="tab" href="#staff">Staff</a></li>
                        </ul>
                         
                         <?php } ?>
                        <div class="tab-content">
                        <div id="einfo" class="tab-pane fade in active tabbee">
                            <?php echo $eventdatarows['einfo'];?>
                            </div>
                            <div id="staff" class="tab-pane fade tabbee">
                            <?php echo $eventdatarows['staff'];?>
                            </div>
                            <div id="squad-list" class="tab-pane fade tabbee">
                                <!--Squad Style Start -->
                            <div class="row">
                                       <?php
                                $getplayerdata	=	$Q($link,"SELECT *  FROM `eventdb` WHERE `status` = '1' AND `eventid` = '$eventdatarows[id]' ORDER BY `orderi` DESC");
								$getcountpl  = $C($getplayerdata);
                                    if($getcountpl==0)  {echo "No records found..."; };            
                                while($getplayerrows	=	$F($getplayerdata))
                                {$getplayer =   $F($Q($link,"SELECT * FROM `register` WHERE `id` = '$getplayerrows[userid]'  ORDER BY `orders` DESC"));
								$getteam =   $F($Q($link,"SELECT * FROM `teams` WHERE `id` = '$getplayerrows[team]' ORDER BY `orderi` DESC"));
                           ?>
                                   
                                    <div class="col-sm-2" align="center">
                                         <?php if($getplayer['filefl']!=''){?>
                              <img src="photo/<?php echo $getplayer['filefl'];?>">
            <?php } else{?>
            	 <img src="images/team/5.jpg" alt="">
            <?php } ?>
                                                <h4  class="h4team"> <a href="javascript:void();" style="text-transform:capitalize; color:#000;">
												<?php echo $getplayer['firstname'];?></a></h4>
                                               <p  style=" color:#000;">Team<?php echo $getteam['tname'];?></p>
                                     </div>
                                 
                                   <?php } ?>
                                   
                                 </div> 
                                
                                <!--Squad Style End -->
           </div>
                            
                            <div id="team" class="tab-pane fade tabbee">
<!--Squad Style Start -->
<div class="squad-list">
  <div class="list-item">
    <div class="image">
      <h2>Logo</h2>
    </div>
    <div class="list-text">
      <div class="name">
        <h2>Team Name</h2>
      </div>
      <div class="designation">
        <h2>View Members</h2>
      </div>
    </div>
  </div>
  <?php
                                $getplayerdatateam	=	$Q($link,"SELECT *  FROM `teams` WHERE `status` = '1'  ORDER BY `orderi` DESC");
								$getcountplteam  = $C($getplayerdatateam);
                         if($getcountplteam==0)  {echo "No records found..."; };         
                                while($getplayerrowsteam	=	$F($getplayerdatateam))
                                {
									
                         if($getcountplteam>0)  {?>
                        
  <div class="list-item">
    <div class="image">
      <?php if($getplayerrowsteam['filefl']!=''){?>
      <img src="team/<?php echo $getplayerrowsteam['filefl'];?>">
      <?php } else{?>
      <img src="images/team/5.jpg" alt="">
      <?php } ?>
    </div>
    <div class="list-text">
      <div class="name">
        <h4> <a href="javascript:void();" style="text-transform:capitalize;"> <?php echo $getplayerrowsteam['tname'];?></a> 
        <span style="color:#000;">- Team No <?php echo $getplayerrowsteam['tno'];?></span></h4>
      </div>
      <div class="designation"> <a href="team.php?teamid=<?php echo $getplayerrowsteam['id'];?>&eventid=<?php echo $eventid;?>" target="_blank" style="color:#f00;">
      View Members <i class="fa fa-external-link-square"></i></a></div>
    </div>
  </div>
  <?php } }?>
</div>
</div>
                            <div id="rules" class="tab-pane fade tabbee">
                                <div class="row">
                                    <!--<div class="champion-inner">
                                        <div class="col-sm-2 col-xs-3">
                                            <div class="champion-logo">
                                                <img src="images/logo/rm-best.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-xs-9">
                                            <div class="champion-details">
                                                <div class="champion-year">
                                                    1
                                                </div>
                                                <div class="year-details">
                                                    <h3>THE BEST CLUB OF THE 20TH CENTURY FIFA TROPHY</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                    <?php echo $eventdatarows['rules']; ?>
                                </div>
                            </div>
                            <div id="fixtures" class="tab-pane fade tabbee">
                                <?php echo $eventdatarows['fixtures']; ?>
                            </div>
                            <div id="tables" class="tab-pane fade">
                                <div class="row">
                                    <?php echo $eventdatarows['tables']; ?>
                                    <!--<div class="champion-inner">
                                        <div class="col-sm-2 col-xs-3">
                                            <div class="champion-logo">
                                                <img src="images/logo/rm-hkit.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-xs-9">
                                            <div class="champion-details">
                                                <div class="year-details">
                                                    <h3>Home Kit(2017-18)</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                
                                
                                </div>
                            </div>
                            
                            <div id="results" class="tab-pane fade tabbee">
                                <div class="row">

                                    <div class="champion-inner">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="champion-details">
                                                <div class="year-details" style="margin-top:20px;">
                                                   <?php echo $eventdatarows['results']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            <div id="news" class="tab-pane fade tabbee">
                                <div class="row">
                                    
                                     <div class="champion-inner">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="champion-details">
                                                <div class="year-details" style="margin-top:20px;">
                                                   <?php echo $eventdatarows['news']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                   

                                </div>
                            </div>
                            
                            
                        </div>    
                    </div>
                </div>
			</div>
        </div>
        <!-- Point Table Section End -->
		
        <!-- Gallery Section Start Here-->
        <div class="gallery-section-area pb-70 gasection" style="margin-top:40px;background: url(images/awards-bg.jpg);
    background-size: cover;"><div class="overly-bg"></div>
            <div class="container" id="grid" >
            <p>&nbsp;</p>
                <h3 class="title-bg" style="color:#fff;">Event photo booth</h3>
                <?php require_once("galleryevents.php"); ?>
            </div>
        </div>
		 <!-- Gallery Section End Here-->
         
         <!-- Client Logo Section Start Here-->
		<div class="clicent-logo-section sec-spacer" style="margin: 0px 0 0px 0;">
            
            <div class="container">
            <h3 class="title-bg">Event Partners</h3>
                <div id="upcoming" class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="20" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="4" data-md-device-nav="false" data-md-device-dots="false">
                   <?php require_once("partners.php"); ?>
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
        <script src="js/login-event.js"></script>
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 
<script>

var amt =1500;
		$(document).ready(function() {
 
    $("#regm").on("change", function() {
       var regm = $("#regm").val();
	   if(regm){
		   $('#rzp-button2').hide();
		   $('#rzp-button1').show();
		   
		   }
		   else{
			   $('#rzp-button2').show();
		   $('#rzp-button1').hide();
			   }
       
    });
});



document.getElementById('rzp-button1').onclick = function(e){
	
	$("#regm").on("change", function() {
       var regm2 = $("#regm").val();
	   if(regm2 == 'Player'){
       amt = 1500;}
	  else{
		 amt = 4000;}
       
    });
	
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myDIV *").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

		</script>
	</body>
</html>