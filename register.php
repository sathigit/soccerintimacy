<?php
require_once 'admin/includes/connection.php';
date_default_timezone_set('Etc/UTC');
require 'PHPMailer-master/PHPMailerAutoload.php';
$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$password = $_POST["password"];
$filefl = $_FILES['filefl']['name'];

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
 $checktitle     = $Q($link,"SELECT `email` FROM `register` WHERE `email` = '$email'");
$check_count    = $C($checktitle);


 if(!$check_count)
	{	
		$uniql       = uniqid();
		$file_names  = $uniql;
		$pname_thumb = $file_names;
		$unid = str_pad(rand(0,9999), 5, "0", STR_PAD_LEFT);
		//$uploadfiles = $fl_path.$file_names;				
		//move_uploaded_file($_FILES['filefl']['tmp_name'],$uploadfiles);
		
		$or_val          = $F($Q($link,"SELECT * FROM `register` ORDER BY `orders` DESC LIMIT 0,1"));
	    $up_val          = $or_val['orders']+1;
		
$sql = "INSERT INTO register (firstname, lastname, email,mobile,age,gender,reg_date,reg_time,password,filefl,`orders`, `status`,`uid`)
VALUES ('$fname','$lname','$email','$mobile','$age','$gender',	CURRENT_DATE(), CURRENT_TIME(),'$password','$file_names','$up_val', '1','$unid')";
		  if(mysqli_query($link, $sql)){
			  echo "Registered successfully...";
			  $success = true;
		  } else{
			  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		  }

	}else{echo "This email address is already registered";$success = false;}
	
	
	if($success){
$check    = "SELECT * FROM `register` WHERE `email`='$email' AND `password` = '$password' ";
$result   = $Q($link,$check);
$count    = $C($result);

@$message1 =' 
<p><strong>Hi '.ucfirst($fname).', Thanking You registering with us...! Soccer Intimacy Registration!</strong></p>
<p>Soccerintimacy.com, Registration Details </p>      
				  
				  <p>USERNAME:      '.$email.' </p>      
				  
				  <p>PASSWORD:     '.$password.' </p>
Regards,<br />
Soccerintimacy.com...!';

@$message2 ='
		<p><strong>Hi Admin , '.ucfirst($fname).', has registered in soccerintimacy.com! Login to your admin panel of the website to see his details</strong></p>
		 
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
$mail->SetFrom('info@soccerintimacy.com', 'Soccerintimacy Registration');
//Set who the message is to be sent to
$mail->addAddress($email);
//Set the subject line
$mail->Subject = "Registration for Soccerintimacy.com";
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
$mail->Password = "Li3~dy83";
$mail->SetFrom('info@soccerintimacy.com', 'Soccerintimacy registration email');
$mail->addAddress($site_email);
$mail->Subject = "Soccerintimacy registration email";
$mail->msgHTML($message2);
$mail->send();


if(!$mail->Send()) {
	//echo "<p class='error'>Problem in Sending Mail.</p>";
} else {
	if($count>0)
	{
      $row_admin           = $F($result);
	  $_SESSION['adminid'] = $row_admin['id'];
	  echo "<script>window.location='index.php';</script>";
    }
}




}



?>