<div class="navbar">
  <div class="navbar-inner">
   <div class="container">
        
        <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <div class="nav-collapse collapse">
              <ul class="nav">
              <li><a  href="adminstrator.php" >Adminstrator</a> </li> 
              <li><a  href="view_registrations.php"> Manage Registrations </a></li>            
              <li><a  href="view_cms.php"> Manage events </a></li>
               <li><a  href="view_blog_hi.php"> Manage news </a></li> 
              <li><a  href="view_team.php"> Manage Teams </a></li> 
               <li><a  href="view_newsletter.php"> Manage newsletter </a></li> 
            
              <!--  <li><a  href="view_category.php"> Manage Album Category </a></li> 
              <li><a  href="view_subcategory.php"> Manage Album </a></li> -->
             <!-- <li class="dropdown">
              	<a data-toggle="dropdown" href="view_images.php">Upload Album Images <span class="caret"></span> </a>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                     <?php
                                $getdatam	=	$Q("SELECT * FROM `ex_subcat` WHERE `id` != ''");
                                while($getvalm	=	$F($getdatam))
                                {
                     ?>                          
                    <li><a  href="view_images.php?catds=<?php echo $getvalm['id'];?>&<?php echo $getvalm['title'];?>" ><?php echo $getvalm['title'];?></a>  
                    <?php }?>                    
                 </ul>
             
              </li>  -->        
          	</ul>
           
            
        </div>
   
      </div>
    </div>
</div>
