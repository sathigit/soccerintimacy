<?php
include 'includes/connection.php';

if($_SESSION['adminid']=="")
{
  echo "<script>window.location='index.php';</script>";
}

if($added=='')   { $added    = $_REQUEST['added'];}
if($del=='')     { $del      = $_REQUEST['del'];}
if($delete=='')  { $delete   = $_REQUEST['delete'];}
if($update=='')  { $update   = $_REQUEST['update'];}
if($approve=='') { $approve  = $_REQUEST['approve'];}
if($reject=='')  { $reject   = $_REQUEST['reject'];}
if($approved==''){ $approved = $_REQUEST['approved'];}
if($rejected==''){ $rejected = $_REQUEST['rejected'];}
if($ups=='')     { $ups      = $_REQUEST['ups'];}
if($down=='')    { $down     = $_REQUEST['down'];}

$page_count  = $_REQUEST['page_count'];
$page        = $_REQUEST['page'];
$sea_key     = $_REQUEST['sea_key'];
$id          = $_REQUEST['id'];

if($page_count=='')
{
	$page_count="15";
}

if($approve!='')
{
	$approved_str="UPDATE `teams` SET `status` = '0' WHERE `id` = '$approve'";
	$Q($link,$approved_str);
	echo "<script>window.location='view_team.php?approved=1&page=$page&page_count=$page_count&catds=$catds&subcatds=$subcatds';</script>";
}

if($reject!='')
{
	$rejected_str="UPDATE `teams` SET `status` = '1' WHERE `id` = '$reject'";
	$Q($link,$rejected_str);
	echo "<script>window.location='view_team.php?rejected=1&page=$page&page_count=$page_count&catds=$catds&subcatds=$subcatds';</script>";
}


if($del!='')
{	
			$str2       = $Q($link,"SELECT * FROM `teams` WHERE `id`= '$del'");

			//$image2  ="../pimages/".$row['filefl'];
			//@unlink($image2);
			$str_del2="DELETE  FROM `teams` WHERE `id`= '$del'";
			$Q($link,$str_del2);

echo "<script>window.location='view_team.php?delete=1&page=$page&page_count=$page_count';</script>";
}




	 include "common/pagelist.php";

	 $string  = "SELECT * FROM `teams` ";


	 //$string .= " WHERE `eid` = '$catds'";

	
	 //$string .= " AND `status` = '1'";

	
	 $string  .= " ORDER BY `orderi` DESC";
	
	 $query   = $Q($link,$string);

	 $count   = $C($query);
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
     	
		 	<h4 class="form-signin-heading">Manage Teams</h4>
            <div align="right">
            <a href="add_team.php" class="btn btn-inverse">ADD</a>
        		<!--<a href="view_cms.php" class="btn btn-inverse">Back</a>-->
                
       		 </div>


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
                  <div class="row">
                     <span class="span1"><strong>SNO:</strong></span>
                     <div class="span3"><strong>Title:</strong> <i class="icon-th-list"></i></div>
                     <div class="span3"><strong>Action</strong></div>
                     
                  </div>
               </div>
         </div>
             <?php
				  if($count!=0) {
						if($count>0)
					   {
						$total_records = $count;
				
						$records_per_page = $page_count;
				
						$current_page_no =1;
				
						if ($_REQUEST['page'])
						{
						$current_page_no = @$_REQUEST['page'];
						}
				
						$pageL = new pageList($total_records, $records_per_page, $current_page_no);
						$pageL->generate();
				
						$start = $pageL->startRecord;
						
						$string .= " LIMIT $start,$pageL->numOfRows";
					   }
				
						$start_rec = $pageL->startRecord +1;
						$total_rec = $total_records;
				
						if(($pageL->startRecord+$records_per_page) > $total_records)
						{
							$end_rec = $total_records;
						}
						else
						{
							$end_rec = $pageL->startRecord+$records_per_page;
						}
				
						$query = $Q($link,$string);
				    ?>
					<?php
				
					   $j = $start+1;
					   $serial=0;
						 while($row_list=$F($query))
						{
						  $serial++;
						 //$mm = $F($Q("SELECT * FROM `teams` WHERE `id` = '$row_list[mid]'"));
					?>
                    
   	      <div class="midcon">
              <div class="container">
                  <div class="row">
                     <span class="span1"><?php print $j;?></span>
                     <div class="span3"> <i class="icon-th-list"></i> 
					 	<?php echo $row_list['tname'];?></div>
                     <div class="span3">
                     <a href="edit_team.php?edit=<?php echo $row_list['id'];?>&page=<?php echo $page; ?>&page_count=<?php echo $page_count; ?>&sea_key=<?php echo $sea_key; ?>&catds=<?php echo $catds;?>"><i class=" icon-pencil"></i> Edit</a> /  
                     <!-- <a href="view_team.php?del=<?php echo $row_list['id']; ?>&amp;page=<?php echo $page; ?>&amp;page_count=<?php echo $page_count; ?>&amp;sea_key=<?php echo $sea_key; ?>" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-trash"></i> Delete</a>  /  -->
                    
                     <?php if($row_list['status']=='1') {?>
                      <a href="view_team.php?approve=<?php echo $row_list['id']; ?>&amp;page=<?php echo $page; ?>&amp;page_count=<?php echo $page_count; ?>&amp;sea_key=<?php echo $sea_key; ?>"><i class="icon-ok-sign"></i></a>
                      <?php } else {?>
                      <a href="view_team.php?reject=<?php echo $row_list['id']; ?>&amp;page=<?php echo $page; ?>&amp;page_count=<?php echo $page_count; ?>&amp;sea_key=<?php echo $sea_key; ?>" style="text-decoration:none;font-size:12px;">
                      <i class="icon-remove-sign"></i> Activate</a><?php  } ?>
                     </div>
                     
                  </div>
               </div>
         </div>
         <?php  $j++; } } ?>
         
         <div class="text_white">
			<?php
                      if(@$total_records > @$records_per_page)
                      {
                          $pageL->totalRecords;
                          $pageL->currentPage;
                          $pageL->totalPages;
                          echo "<span class='text_white'><strong>Pages:</strong>&nbsp;</span>";
                          $pageL->displayLink("view_team.php?page_count=$page_count&catds=$catds&subcatds=$subcatds", true, true, 10);
                  
                      }?>
          
            </div>
            
            </div>
          </div>
      </div>
      
</div>










    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
	
  </body>
</html>
