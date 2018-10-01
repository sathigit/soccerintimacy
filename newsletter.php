<?php
require_once 'admin/includes/connection.php';


$newsemail = $_POST["newsemail"];


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
 $checktitle     = $Q($link,"SELECT `email` FROM `newsletter` WHERE `email` = '$newsemail'");
$check_count    = $C($checktitle);

 if($check_count==0)
	{	
		$or_val          = $F($Q($link,"SELECT * FROM `newsletter` ORDER BY `orderi` DESC LIMIT 0,1"));
	    $up_val          = $or_val['orderi']+1;
		
$sql = "INSERT INTO newsletter (email,reg_date,reg_time,`orderi`, `status`)
VALUES ('$newsemail',CURRENT_DATE(), CURRENT_TIME(),'$up_val', '1')";
		  if(mysqli_query($link, $sql)){
			  sleep(3);
			  echo "Subscribed successfully...";
		  } else{
			  echo "This email address is already subscribed";
		  }

	}else{echo "This email address is already subscribed";}
	
	
	




?>