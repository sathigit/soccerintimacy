<!doctype html>
<html class="no-js" lang="zxx">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Soccer Intimacy | Profile Viewt</title>
		<meta name="description" content="">
		<meta name="viewport" content="widtd=device-widtd, initial-scale=1">
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
        <link rel="stylesheet" href="admin/css/jquery-ui.css">
		<!-- modernizr js -->
		<script src="js/modernizr-2.8.3.min.js"></script>
		<style>
		.scrollable-menu {
   		 height: auto;
    	max-height: 200px;
   		 overflow-x: hidden;
}
</style>
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
            <img src="images/breadcrumbs/cheak-out.jpg" alt="Breadcrubs" />
            <div class="breadcrumbs-inner">
    			<div class="container">
    				<div class="row">
    					<!-- <div class="col-md-12 text-center">
    						<h1 class="page-title">Edit Profile</h1>
    						<ul>
    							<li>
    								<a class="active" href="index.php">Home</a>
    							</li>
    							<li>Edit Profile</li>
    						</ul>
    					</div> -->
    				</div>
    			</div>
            </div>
		</div>
		<!-- Breadcrumbs Section End -->


		<!-- News Section Start Here-->
		<div class="rs-check-out sec-spacer">
			<div class="container">
				<div class="row">
                <div class="col-md-4">
						<h2 class="title-bg">Edit  Profile</h2>
                        
                        <div align="left" style="color:#f00; font-size:15px;">
           <strong><?php

		   if($er_title=='1') { echo "Select a Image to upload ..."; }
			if($er_size=='1') { echo "File Size is Larger... Max File Size 1MB"; }
			if($er_ext=='1') { echo "Invalid File Format..."; }
	  
	      ?> </strong>
         </div>
						  <h1 class="pptrerext">#<?php 
						  echo $getname['uid'];?></h1>
            <?php if($getname['filefl']){?>
            <p><img src="photo/<?php echo $getname['filefl'];?>"  class="img-thumbnail" width="200"></p><?php } ?>
            <?php if(!$getname['filefl']){?>
           <p><img src="images/usericon.jpg"  class="img-thumbnail" width="200"></p><?php } ?>
									
					</div>
					<div class="col-md-8">
						
						<div class="check-out-box">
							<form action="#" method="post" id="frmContact_update" action=""  enctype="multipart/form-data">
								<fieldset>
									<div class="row">                                      
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>First Name*</label>
                                                <input type="text" name="firstname1"  class="form-control" value="<?php echo $getname['firstname'];?>" maxlength="255">
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Last Name*</label>
                                                <input type="text" name="lastname1"  class="form-control" value="<?php echo $getname['lastname'];?>" maxlength="255">
											</div>
										</div>
									</div>
                                    
                                    <div class="row">                                      
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Mobile*</label>
                                                  <input type="text" name="mobile1"  class="form-control" value="<?php echo $getname['mobile'];?>" maxlength="15" id="mobile">
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Email* </label>
                                                <input type="text" name="email1"  class="form-control" value="<?php echo $getname['email'];?>" readonly >
											</div>
										</div>
									</div>
                                    
                                    <div class="row">                                      
										<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label>Date Of Birth</label>
													<input type="text" name="dob" class="form-control" value="<?php echo $getname['dob'];?>" maxlength="50" id="inputField" readonly>
												</div>
										</div>
										
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Height-(in cms)</label>
                                                 <input type="text" name="height"  class="form-control" value="<?php echo $getname['height'];?>" maxlength="4">
											</div>
										</div>
									</div>
                                    
                                    <div class="row">                                      
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Weight</label>
                                                   <input type="text" name="weight"  class="form-control" value="<?php echo $getname['weight'];?>" maxlength="2">
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Country</label>
                                                <input type="text" name="country"  class="form-control" value="<?php echo $getname['country'];?>" maxlength="150">
											</div>
										</div>
									</div>
                                    
                                    <div class="row">                                      
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<div class="dropdow">
												<label>Main Position</label>
												   <input  readonly type="text"  class="form-control dropdown-toggle"  value="<?php echo $getname['position1'];?>" maxlength="20">
												<div style="height:10px">&nbsp;</div>
                                                <select name="position1">
                                                	<option value="">Select main position</option>
                                                   <optgroup label="Forward">
                                                   <option value="ST">ST</option>
                                                   <option value="LF">LF</option>
                                                   <option value="RF">RF</option>
                                                   </optgroup>
                                                   <optgroup label="Midfield">
                                                   <option value="LW">LW</option>
                                                    <option value="LM">LM</option>
                                                    <option value="RM">RM</option>
                                                    <option value="RW">RW</option>
                                                    <option value="CAM">CAM</option>
                                                    <option value="CM">CM</option>
                                                    <option value="CDM">CDM</option>
                                                    </optgroup>
                                                    <optgroup label="Defence">
                                                   <option value="LWB">LWB</option>
                                                    <option value="LB">LB</option>
                                                    <option value="CB">CB</option>
                                                    <option value="RB">RB</option>
                                                    <option value="RWB">RWB</option>
                                                    </optgroup>
                                                    <option value="Goal Keeper">Goal Keeper</option>
                                                </select>
													
													</div>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<div class="dropdown">
												<label value="">Alternate Position</label>
												<input type="text" readonly  class="form-control dropdown-toggle"   value="<?php echo $getname['position2'];?>" maxlength="20"><div style="height:10px">&nbsp;</div>
                                                <select name="position2">
                                                	<option value="">Select alternate position</option>
                                                   <optgroup label="Forward">
                                                   <option value="ST">ST</option>
                                                   <option value="LF">LF</option>
                                                   <option value="RF">RF</option>
                                                   </optgroup>
                                                   <optgroup label="Midfield">
                                                   <option value="LW">LW</option>
                                                    <option value="LM">LM</option>
                                                    <option value="RM">RM</option>
                                                    <option value="RW">RW</option>
                                                    <option value="CAM">CAM</option>
                                                    <option value="CM">CM</option>
                                                    <option value="CDM">CDM</option>
                                                    </optgroup>
                                                    <optgroup label="Defence">
                                                   <option value="LWB">LWB</option>
                                                    <option value="LB">LB</option>
                                                    <option value="CB">CB</option>
                                                    <option value="RB">RB</option>
                                                    <option value="RWB">RWB</option>
                                                    </optgroup>
                                                    <option value="Goal Keeper">Goal Keeper</option>
                                                </select>
												
													</div>
												
											</div>
										</div>
									</div>
                                    
                                    <div class="row">                                      
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<div class="dropdown">
												<label>Jersy Size</label>
												   <input type="text"  readonly  class="form-control dropdown-toggle"  value="<?php echo $getname['jersysize'];?>" maxlength="3">
                                                   <div style="height:10px">&nbsp;</div>
                                                   <select name="jersysize">
                                                	<option value="">Select jersy size</option>
                                                   <option value="XS">XS</option>
                                                   <option value="S">S</option>
                                                   <option value="M">M</option>
                                                   <option value="L">L</option>
                                                   <option value="XL">XL</option>
                                                   <option value="XXL">XXL</option>
                                                </select>
												
													
  												</div>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<div class="dropdown">
													<label value="">Football Expereince</label>
													<input type="text" readonly class="form-control dropdown-toggle"  value="<?php echo $getname['expereince'];?>" maxlength="255">
                                                    <div style="height:10px">&nbsp;</div>
                                                <select name="experience">
                                                	<option value="">Select football expereince</option>
                                                   <option value="Less than a year">Less than a year</option>
                                                   <option value="1 to 3 Years">1 to 3 Years</option>
                                                   <option value="4 to 6 years">4 to 6 years</option>
                                                   <option value="7 to 9 years">7 to 9 years</option>
                                                   <option value="10 and more years">10 and more years</option>
                                                </select>
													
												</div>
											</div>
										</div>
									</div>

									<div class="row">                                      
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Stronger Foot</label>
												   <input type="text"  readonly  class="form-control dropdown-toggle" value="<?php echo $getname['sfoot'];?>">
                                                   <div style="height:10px">&nbsp;</div>
                                                <select name="sfoot">
                                                	<option value="">Select stronger foot</option>
                                                   <option value="Left">Left</option>
                                                   <option value="Right">Right</option>
                                                   <option value="Both">Both</option>
                                                </select>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Studs Size</label>
												<input type="text"  readonly class="form-control dropdown-toggle"  value="<?php echo $getname['studsize'];?>">
                                                <div style="height:10px">&nbsp;</div>
                                                <select name="studsize">
                                                	<option value="">Select studs size</option>
                                                   <option value="6">6</option>
                                                   <option value="7">7</option>
                                                   <option value="8">8</option>
                                                   <option value="8">9</option>
                                                   <option value="8">10</option>
                                                </select>
												
											
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Prefererd Jersey Number</label>
												<input type="text"   readonly  class="form-control dropdown-toggle"  value="<?php echo $getname['jersyno'];?>">
                                                <div style="height:10px">&nbsp;</div>
											<select name="jersyno">  
                                            <option value="">Select jersy no</option>                                     
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>
                                              <option value="6">6</option>
                                              <option value="7">7</option>
                                              <option value="8">8</option>
                                              <option value="9">9</option>
                                              <option value="10">10</option>
                                              <option value="11">11</option>
                                              <option value="12">12</option>
                                              <option value="13">13</option>
                                              <option value="14">14</option>
                                              <option value="15">15</option>
                                              <option value="16">16</option>
                                              <option value="17">17</option>
                                              <option value="18">18</option>
                                              <option value="19">19</option>
                                              <option value="20">20</option>
                                              <option value="21">21<</option>
                                              <option value="22">22</option>
                                              <option value="23">23</option>
                                              <option value="24">24</option>
                                              <option value="25">25</option>
                                              <option value="16">26</option>
                                              <option value="27">27</option>
                                              <option value="28">28</option>
                                              <option value="29">29</option>
                                              <option value="30">30</option>
                                              <option value="31">31</option>
                                              <option value="32">32</option>
                                              <option value="33">33</option>
                                              <option value="34">34</option>
                                              <option value="35">35</option>
                                              <option value="36">36</option>
                                              <option value="37">37</option>
                                              <option value="38">38</option>
                                              <option value="39">39</option>
                                              <option value="40">40</option>
                                              <option value="41">41</option>
                                              <option value="42">42</option>
                                              <option value="43">43</option>
                                              <option value="44">44</option>
                                              <option value="45">45</option>
                                              <option value="46">46</option>
                                              <option value="47">47</option>
                                              <option value="48">48</option>
                                              <option value="49">49</option>
                                              <option value="50">50</option>
                                              <option value="51">51</option>
                                              <option value="52">52</option>
                                              <option value="53">53</option>
                                              <option value="54">54</option>
                                              <option value="55">55</option>
                                              <option value="56">56</option>
                                              <option value="57">57</option>
                                              <option value="58">58</option>
                                              <option value="59">59</option>
                                              <option value="60">60</option>
                                              <option value="61">61</option>
                                              <option value="62">62</option>
                                              <option value="63">63</option>
                                              <option value="64">64</option>
                                              <option value="65">65</option>
                                              <option value="66">66</option>
                                              <option value="67">67</option>
                                              <option value="68">68</option>
                                              <option value="69">69</option>
                                              <option value="70">70</option>
                                              <option value="71">71</option>
                                              <option value="72">72</option>
                                              <option value="73">73</option>
                                              <option value="74">74</option>
                                              <option value="75">75</option>
                                              <option value="76">76</option>
                                              <option value="77">77</option>
                                              <option value="78">78</option>
                                              <option value="79">79</option>
                                              <option value="80">80</option>
                                              <option value="81">81</option>
                                              <option value="82">82</option>
                                              <option value="83">83</option>
                                              <option value="84">84</option>
                                              <option value="85">85</option>
                                              <option value="86">86</option>
                                              <option value="87">87</option>
                                              <option value="88">88</option>
                                              <option value="89">89</option>
                                              <option value="90">90</option>
                                              <option value="91">91</option>
                                              <option value="92">92</option>
                                              <option value="93">93</option>
                                              <option value="94">94</option>
                                              <option value="95">95</option>
                                              <option value="96">96</option>
                                              <option value="97">97</option>
                                              <option value="98">98</option>
                                              <option value="99">99</option>
                                              <option value="100">100</option>
										 </select>
                                            </div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Prefererd Jersey Name</label>
												<input type="text"   name="pjname" class="form-control " value="<?php echo $getname['pjname'];?>">
											</div>
										</div>   
									</div>


                                      <div class="row">
									  <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Favorite Football Club</label>
												<input type="text"  name="ffclub"  class="form-control " value="<?php echo $getname['ffclub'];?>">
											</div>
										</div>    
                                        
                                        <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Age*</label>
                                                <input type="text" name="age1"  class="form-control" value="<?php echo $getname['age'];?>" maxlength="3">
											</div>
										</div>
                                                                        
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Upload Photo (1MB Max Size)</label>
                                                   <input type="file" name="fileflu"  class="form-control pd-5" value="<?php echo $getname['fileflu'];?>" style="padding:10px;">
											</div>
										</div>
                                        
                                        
                                      
									</div>
                                    
                                     <div class="row">                                      
									
                                        <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												 <input type="submit" value="Update info" class="btn btn-primary"  name="update" />
											</div>
										</div>
									</div>
									
									
									</div>
									   
								</fieldset>
							</form>	
						</div>						
						
								
					
					
				</div>
			</div>
		</div>
		<!-- News Section End Here-->
        
		<?php require_once('footer.php');?>
        
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
        <script src="admin/js/jquery-ui.js"></script>
		<!-- main js -->
		<script src="js/main.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/validations.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/login.js"></script>
                <script>
  $( function() {
    $( "#inputField" ).datepicker({
		dateFormat: "dd-mm-yy",
		 changeYear: true,
		  yearRange: '1980:2008', 
		});
  } );
  


  </script>
	</body>
</html>