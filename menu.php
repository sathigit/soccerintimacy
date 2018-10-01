<?php
require_once 'admin/includes/connection.php';
require_once("admin/includes/functions.php");
date_default_timezone_set('Etc/UTC');
@require 'PHPMailer-master/PHPMailerAutoload.php';
if($_SESSION['adminid']){
$getname    = $F($Q($link,"SELECT * FROM `register` WHERE `id`='$_SESSION[adminid]' "));
 }
if(!$update)  { $update   = $_REQUEST['updated'];}
if(!$eventid)  {$eventid   = $_REQUEST['eventid'];} 
if(!$register)  {$register   = $_REQUEST['register'];} 
if(!$er_ext)  {$er_ext   = $_REQUEST['er_ext'];} 
if(!$er_size)  {$er_size   = $_REQUEST['er_size'];} 
if(!$euserid)  {$euserid   = $_REQUEST['euserid'];} 
if(!$teamid)  {$teamid   = $_REQUEST['teamid'];} 
	
/*if(!$hid)  {$hid   = $_REQUEST['hid'];} 
if(!$uid)  {$uid   = $_REQUEST['uid'];} 

if($hid){
	$getdatahid   =   $F($Q($link,"SELECT * FROM `higli` WHERE `id` = '$hid' ORDER BY `order` DESC"));}
	
	if($uid){
	$getdatahiu   =   $F($Q($link,"SELECT * FROM `blogs` WHERE `id` = '$uid' ORDER BY `order` DESC"));}*/
	$checkPayment    = $F($Q($link,"SELECT * FROM `eventdb` WHERE `eventid`='$eventid' AND`userid` = '$_SESSION[adminid]'"));
if($eventid){
	$eventdatarows    = $F($Q($link,"SELECT * FROM `ex_mmenu` WHERE `id`='$eventid' "));
	$eveimagerows   = $F($Q($link,"SELECT * FROM `files` WHERE `subcatid` = '$eventdatarows[id]' AND `status` = '1' ORDER BY `id` DESC LIMIT 1"));
	
	$checksq    = $Q($link,"SELECT * FROM `eventdb` WHERE `eventid`='$eventid' AND `userid` = '$_SESSION[adminid]'");
$countsq    = $C($checksq);
  if($countsq>0){
		$registeralr = 'failedtop';
}
}
	
if(isset($_REQUEST['registerevent'])){
		$eventid = $_POST["eventid"];
		$userid = $_POST["userid"];
		$rtype = $_POST["rtype"];
		if($rtype=='Player'){
			$amountpaid = 1500;
			}else{
				$amountpaid = 4000;
				}
	
$checks    = "SELECT eventid,userid FROM `eventdb` WHERE `eventid`='$eventid' AND`userid` = '$userid'";



$results   = $Q($link,$checks);
$counts    = $C($results);
  if($counts==0)
  {
  		$or_val          = $F($Q($link,"SELECT * FROM `eventdb` ORDER BY `orderi` DESC LIMIT 0,1"));
	    $up_val          = $or_val['orderi']+1;
		
$sql = "INSERT INTO eventdb (eventid, userid,regdate,regtime,orderi, status,rtype,amountpaid,payment)
VALUES ('$eventid','$userid',CURRENT_DATE(), CURRENT_TIME(),'$up_val', '1','$rtype','$amountpaid','Pending')";
		$Q($link, $sql);
		@$message1 ='
		<p><strong>Hi '.ucfirst($getname['firstname']).', Thank you for registering!</strong></p>
		<p>Find below the event details</p>      
				  
				  <p>Event name:      '.$eventdatarows['title'].' </p>      
				  
				  <p>Event date:     '.$eventdatarows['edate'].' </p>
				   <p>Event auction date:     '.$eventdatarows['adate'].' </p>
				    <p>Event price:     '.$eventdatarows['eprice'].' </p>
					<p>Soccerintimacy will contact you shortly for further communication!... </p>
		 
Regards,<br />
Soccerintimacy.com...!';

		@$message2 ='
		<p><strong>Hi Admin , '.ucfirst($getname['firstname']).', has registered for'.$eventdatarows['title'].' !</strong></p>
		<p>Find below the event details, Login to your website admin panel to view the full details.</p>      
				  
				  <p>Event name:      '.$eventdatarows['title'].' </p>      
				  
				  <p>Event date:     '.$eventdatarows['edate'].' </p>
				  <p>Mobile number:     '.$getname['mobile'].' </p>
		 
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
$mail->SetFrom($site_email, 'Soccerintimacy event registration details');
//Set who the message is to be sent to
$mail->addAddress($getname['email']);
//Set the subject line
$mail->Subject = "Soccerintimacy event registration details";
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message1);
//Replace the plain text body with one created manually
$mail->send();

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = "mail.soccerintimacy.com";
$mail->Port = 25;
$mail->SMTPAuth = true;
$mail->Username = "info@soccerintimacy.com";
$mail->Password = "zLi3~dy83";
$mail->SetFrom('info@soccerintimacy.com', 'Soccerintimacy registration email');
$mail->addAddress($site_email);
$mail->Subject = "Soccerintimacy event registration email";
$mail->msgHTML($message2);
$mail->send();
		
 echo "<script>window.location='events.php?eventid=$eventid&register=success';</script>";
}else{
	 echo "<script>window.location='events.php?eventid=$eventid&register=failed';</script>";
	}
}
?>
		<header>
			<div class="header-top-area">
				<div class="container">
                <?php if($update==1)  {?>
                            <p  align="center" style="color:#fff; font-size:16px; font-weight:700; margin:0 auto;">Profile updated Successfully...</p>
							<?php } ?>
                             <?php if($update==2)  {?>
                            <p  align="center" style="color:#fff; font-size:16px;f font-weight:700; margin:0px auto;">
                            Your login credentials has been sent to your registered email address...</p>
							<?php } ?>
                             <?php if($update==3)  {?>
                            <p  align="center" style="color:#fff; font-size:16px; font-weight:700; margin:0 auto;">
                            This email address is not registered with us......</p>
							<?php } ?>
                            <?php if($register=='success')  {?>
                            <p  align="center" style="color:#fff; font-size:16px;font-weight:700; margin:0 auto;">
                            You have successfully registered for the event, Soccer intimacy will contact you asap...</p>
							<?php } ?>
                            <?php if($registeralr=='failedtop' && !$register)  {?>
                            <p  align="center" style="color:#fff; font-size:16px; font-weight:700; margin:0 auto;">
                            You have registered for this event...</p>
							<?php } ?> 
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="header-top-left">                            
								<ul>
									<!--<li><a href="mailto:info@soccerintimacy.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@soccerintimacy.com</a></li>-->
								
								</ul>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="social-media-area kale">
								<nav>
									<ul>
                                    <li><a href="mailto:info@soccerintimacy.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@soccerintimacy.com</a></li>
										<!--<<li><a href="#" class="active"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
										li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>-->
										<?php if(!$_SESSION['adminid']){?><!--<li class="log">
                                        <?php if(!$eventid){?>
                                        <a data-target=".login-modal" data-toggle="modal" href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                                        <?php } ?> 
                                        <?php if($eventid){?>
                                        <a data-target=".login-modal-event" data-toggle="modal" href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                                        <?php } ?> 
										<li class="sign"><a data-target=".register-modal" data-toggle="modal" href="#"><span>/</span> Sign Up</a></li>--><?php }?>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-middle-area menu-sticky">
                <div class="container">
                
                    <div class="row">
                      
                        <div class="col-md-3 col-sm-12 col-xs-12 logo">
                            <a href="index.php"><img src="images/logo.svg" alt="logo"></a>
                        </div>
                        <div class="col-md-9 col-sm-12 col-xs-12 mobile-menu">
                            <div class="main-menu mobmenu">
                                <a class="rs-menu-toggle"><i class="fa fa-bars"></i>Menu</a>
                                <nav class="rs-menu">
                                    <ul class="nav-menu">
                                        <!-- Home -->
                                     
                                        
                                        <li class="menu-item-has-children">
                                                <a href="javascript:void(0);">Events</a>
                                                <?php
                                $getdata2	=	$Q($link,"SELECT title,id FROM `ex_mmenu` WHERE `status` = '1' ORDER BY `order` DESC");
								$getcountformenu = $C($getdata2);
								if($getcountformenu>8){								?>
                                                <ul class="sub-menu mCustomScrollbar" style="height:300px;" data-mcs-theme="dark"><?php } else{?>
                                                
                                                <ul class="sub-menu">
                                                 <?php
                                }if($getcountformenu==0){	?>
								<li style="color:#f00;">No Events Found</li><?php } 
                                while($getval2	=	$F($getdata2))
                                {
                           ?>
                           <li><a href="events.php?eventid=<?php echo $getval2['id'];?>"><?php echo $getval2['title'];?></a></li>
                           <?php }?>
														
                                                        
													</ul>
                                                </li>
                                                
                                         <li><a href="aboutus.php">About</a></li>
                                                    <li><a href="news.php">News</a></li>
                                                    <li><a href="gallery.php">Gallery</a></li>
												<li><a href="contactus.php">CONTACT</a></li>
                                                
                                                 <?php if($_SESSION['adminid']){?>
                                                <li class="menu-item-has-children player"><a href="javascipt:void(0);">Hi, <?php custom_echo($getname['firstname'], 200); ?></a>
                                                <ul class="sub-menu">
                                                <li>
                                                   <a data-target=".view-profile" data-toggle="modal" href="#">View Profile</a></li>
														<li>
                                                   <a href="profile.php" class="">Edit Profile</a></li>
                                                   <li>
                                                   <a href="profileevents.php?euserid=<?php echo $_SESSION['adminid']?>">Registered events Info</a></li>
                                                   <li><a href="logout.php">Logout</a></li>
													</ul>
                                                   </li><?php }?>
                                                   
                                                  
										
                                         <?php if(!$_SESSION['adminid']){?>
                                         <li class="menu-item-has-children player"><a href="javascipt:void(0);">
                                         <i class="fa fa-user" aria-hidden="true" style="border:1px solid #fff;border-radius:50%;padding: 5px;"></i> Player Account</a>
                                                <ul class="sub-menu">
													
                                        <?php if(!$eventid){?>
                                        <li class="log"><a data-target=".login-modal" data-toggle="modal" href="#"><i class="fa fa-power-off" aria-hidden="true"></i> Login</a></li>
                                        <?php } ?> 
                                        <?php if($eventid){?>
                                        <li class="log"><a data-target=".login-modal-event" data-toggle="modal" href="#"><i class="fa fa-power-off" aria-hidden="true"></i> Login</a></li>
                                        <?php } ?> 
                                        <li class="sign"><a data-target=".register-modal" data-toggle="modal" href="#">
                                        <i class="fa fa-sign-in" aria-hidden="true"></i> Sign Up</a></li>
													</ul>
                                                   </li><?php }?>
                                                   
                                    </ul>
                                   
                               
                               </nav>
                               

                              <!--Header Search Start  here-->
                                <!--<div class="search">
                                    <a class="rs-search" data-target=".search-modal" data-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                </div>-->
                               <!--Header Search End  here--> 
                           </div>
                       </div>
                    </div>
                </div>
            </div>
		</header>
		<!--Header area end here-->
     
     <!-- login Modal Start -->

<div aria-hidden="true" class="modal fade search-modal login-modal-event"  data-keyboard="false"  role="dialog" tabindex="-1">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true" class="fa fa-close"></span> </button>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div align="center">
        <h4 class="headpop">Welcome back!<br>
          login to enjoy the best<br>
          football action<br>
          in town</h4>
        <div id="mail-status-login-event" style="color:#f00;"></div>
        <div id="loader-icon-login-event" style="display:none; color:#f00;">
          <p>Loading... </p>
          Please wait while we are signin you securely.</div>
      </div>
      <div class="search-block clearfix">
        <form action="#" method="post" id="frmContact-login-event">
          <div class="form-group">
            <input class="form-control" name="usernameevents" placeholder="enter your email address*" type="text">
          </div>
          <div class="form-group">
            <input class="form-control" type="password" name="passevents" placeholder="password*">
            <input type="hidden" name="eventishid" value="<?php echo $eventid;?>">
          </div>
          <div class="form-group">
            <button type="submit" value="Login" class="btn primary-btn " style="color:#fff; background:#e7292b;margin-left: 200px;" >Login</button>
          </div>
         <div class="form-group">
            <!-- <p class="fpaas2" align="center"> <a href="#" data-toggle="modal" data-target=".forgot-modal"  data-dismiss="modal" style="font-size:15px; font-weight:100;color:#979797">Forgot Password?</a></p>-->
            <div style="border-top:0.5px solid #ccc;">&nbsp;</div>
            <p style="color:#fff; font-size:20px; font-weight:100;" align="center">New Member? <a class="fpaas" href="#" style="color:#F00;text-transform:uppercase; font-weight:400;" data-toggle="modal" data-target=".register-modal" data-dismiss="modal"> &nbsp;Sign up</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
   
            <!-- login Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal login-modal"  data-keyboard="false"  role="dialog" tabindex="-1">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true" class="fa fa-close"></span>
	        </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div align="center">
            <h4 class="headpop">Welcome back!<br> login to enjoy the best<br>football action<br> in town</h4>
            
            <div id="mail-status-login" style="color:#f00;"></div>
          <div id="loader-icon-login" style="display:none; color:#f00;"><p>Loading... </p>Please wait while we are signin you securely.</div>
          
          </div>
                 
                    <div class="search-block clearfix">
                        <form action="#" method="post" id="frmContact-login">
                            <div class="form-group">
                                <input class="form-control" name="username" placeholder="enter your email address*" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="pass" placeholder="password*" type="text">
                            </div>
                            <div class="form-group" style="margin-left: 230px;font-weight:400;font-size:14px;border:none;width:20px; ">
           <input type="submit" value="Login" class="btn primary-btn" style="color:#fff; background:#e7292b;margin-left: 200px;" />
          </div>
          <div class="form-group">
          <p class="fpaas2" align="center">
          <a href="#" data-toggle="modal" data-target=".forgot-modal"  data-dismiss="modal" style="font-size:15px; font-weight:100;color:#979797">Forgot Password?</a></p>
        <div style="border-top:0.5px solid #ccc;">&nbsp;</div>
        <p style="color:#fff; font-size:20px; font-weight:100;" align="center">New Member? <a class="fpaas" href="#" style="color:#F00;text-transform:uppercase; font-weight:400;" data-toggle="modal" data-target=".register-modal" data-dismiss="modal"> &nbsp;Sign up</a></p>
          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Forgot Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal forgot-modal"  data-keyboard="false"  role="dialog" tabindex="-1">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true" class="fa fa-close"></span>
	        </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div align="center">
            <h4 class="headpop">Forgotten Password?<br>
enter your registered email <br>and recieve your <br>
login details
</h4> <div id="mail-status-forgot" style="color:#f00;"></div>
          <div id="loader-icon-forgot" style="display:none; color:#f00;"><p>Loading... </p>Please wait while we are sending your login credentials to you securely.</div>
          </div>
                
                    <div class="search-block clearfix">
                        <form action="#" method="post" id="frmContact-forgot" enctype="multipart/form-data">
                            <div class="form-group">
                             
                                <input type="text" name="forgot" placeholder="email address*" class="form-control">
                            </div>

                            <div class="form-group">
           <input type="submit" value="Send Password" class="btn primary-btn" style="color:#fff; background:#e7292b; "name="sendemail" />
        
          </div>
          <div class="form-group">
         <p style="color:#fff; font-size:20px; font-weight:100;" align="center">Continue to sign in? 
         <a class="fpaas" href="#" style="color:#F00;text-transform:uppercase; font-weight:400;" data-toggle="modal" data-target=".login-modal" data-dismiss="modal"> &nbsp;Sign in</a></p>
          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
              <!-- Profile Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal view-profile"  data-keyboard="false"  role="dialog" tabindex="-1">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true" class="fa fa-close"></span>
	        </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="col-md-6 col-sm-6 col-xs-12" style="color:#fff;">
                    <h1 style="color:#fff;">View Profile</h1>
                        <p>Firstname - <?php echo $getname['firstname'];?></p>
                        <p>Lastname - <?php echo $getname['lastname'];?></p>
                        <p>Mobile - <?php echo $getname['mobile'];?></p>
                        <p>Email - <?php echo $getname['email'];?></p>
                        <p>DOB - <?php echo $getname['dob'];?></p>
                        <p>Height - <?php echo $getname['height'];?></p>
                        <p>Weight - <?php echo $getname['weight'];?></p>
                        
                        <p>Country - <?php echo $getname['country'];?></p>
                        <p>Main poistion - <?php echo $getname['position1'];?></p>
                        <p>Alternative position - <?php echo $getname['position2'];?></p>
                        <p>Jersy Size - <?php echo $getname['jersysize'];?></p>
                        <p>Expereince - <?php echo $getname['expereince'];?></p>
                       
                        
                    </div>                                    
                    <div class="col-md-6 col-sm-6 col-xs-12" style="color:#fff;">
                        <h1 class="pptrerext" style="color:#fff;">#<?php 
						  echo $getname['uid'];?></h1>
            <?php if($getname['filefl']){?>
            <p><img src="photo/<?php echo $getname['filefl'];?>"  class="img-thumbnail" width="200"></p><?php } ?>
            <?php if(!$getname['filefl']){?>
           <p><img src="images/usericon.jpg"  class="img-thumbnail" width="200"></p><?php } ?>
            <p>Stronger Foot - <?php echo $getname['sfoot'];?></p>
                        <p>Stud size - <?php echo $getname['studsize'];?></p>
                        <p>Prefererd Jersey Number - <?php echo $getname['jersyno'];?></p>
                        <p>Prefererd Jersey Name - <?php echo $getname['pjname'];?></p>
                        <p>Favorite Football Club - <?php echo $getname['ffclub'];?></p>
                    </div>
         
            </div>
        </div>
        </div>
        
        
                    <!-- register Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal register-modal"  data-keyboard="false"  role="dialog" tabindex="-1">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true" class="fa fa-close"></span>
	        </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                 
                <div align="center">
                <h4 class="headpop">Sign up to enjoy the best<br> football action<br> in town</h4>
                <div id="mail-status" style="color:#f00;"></div>
          <div id="loader-icon" style="display:none; color:#f00;"><p>Loading... </p>Please wait while we are signin you securely.</div>
          </div>
                    <div class="search-block clearfix">
                        <form action="#" method="post" id="frmContact">
                        
                         <div class="form-group">
              <input type="text" name="firstname" placeholder="first Name*" class="form-control" maxlength="255">
            </div>
            <div class="form-group">
              <input type="text" name="lastname" placeholder="last name*" class="form-control" maxlength="255">
            </div>
            <div class="form-group">
              <input type="text" name="email" placeholder="email*" class="form-control" maxlength="255">
            </div>
            <div class="form-group">
              
              <input type="text" name="mobile" placeholder="mobile number*" class=" form-control" maxlength="10" id="mobile1" ></div>
            
            <div class="form-group">
              <input type="password" name="password" placeholder="password*" class="form-control" maxlength="20" id="password">
            </div>
            <div class="form-group">
              <input type="password" name="confirmpassword" placeholder="confirm Password*" class="form-control" maxlength="20">
            </div>
            
            <div class="form-group">
              <input type="text" name="age" placeholder="age*" class="form-control" maxlength="2">
            </div>

          <div class="form-group" align="center">
          <label>
                <input type="radio" name="gender" checked="checked" value="male" class="form-control" style="height:30px">
                <span class="male">male</span></label>
            &nbsp; &nbsp; &nbsp; &nbsp;
                <label><input type="radio" name="gender" value="female" class="form-control" style="height:30px">
                <span class="male">female</span></label>
          
          </div>
                            
                            
                            <div class="form-group" align="center">
           <input type="submit" value="Sign up" class="btn primary-btn" style="color:#fff; background:#e7292b;" />
          </div>
          <div class="form-group">
           <p class="fpaas2" align="left">
        <input type="checkbox" style="width:20px; height:20px; "> &nbsp;&nbsp;<span class="stmn" >Subscribe to our monthly newsletter</span></p>
        <div style="border-top:0.5px solid #ccc; margin-top:-15px;">&nbsp;</div>
        <p style="color:#fff; font-size:20px; font-weight:100;" align="center">Already a Member? 
        <a class="fpaas" href="#" style="color:#F00;text-transform:uppercase; font-weight:400;" data-target=".login-modal" data-toggle="modal" href="#"data-dismiss="modal"> &nbsp;Login</a></p>
          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><?php require_once('update.php');?>	