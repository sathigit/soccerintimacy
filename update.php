<?php
if(isset($_REQUEST['update'])){
	
$fname1 = $_POST["firstname1"];
$lname1 = $_POST["lastname1"];
$mobile1 = $_POST["mobile1"];
$age1 = $_POST["age1"];
$gender1 = $_POST["gender1"];
$height = $_POST["height"];
$weight = $_POST["weight"];
$country = $_POST["country"];
if($_POST["position1"]==''){$position1 = $getname["position1"];}else{$position1 = $_POST["position1"];}
if($_POST["position2"]==''){$position2 = $getname["position2"];}else{$position2 = $_POST["position2"];}
if($_POST["jersysize"]==''){$jersysize = $getname["jersysize"];}else{$jersysize = $_POST["jersysize"];}
if($_POST["experience"]==''){$experience = $getname["expereince"];}else{$experience = $_POST["experience"];}
if($_POST["sfoot"]==''){$sfoot = $getname["sfoot"];}else{$sfoot = $_POST["sfoot"];}
if($_POST["studsize"]==''){$studsize = $getname["studsize"];}else{$studsize = $_POST["studsize"];}
if($_POST["jersyno"]==''){$jersyno = $getname["jersyno"];}else{$jersyno = $_POST["jersyno"];}
$pjname = $_POST["pjname"];
$ffclub = $_POST["ffclub"];
$dob = $_POST["dob"];
$fileflu = $_FILES['fileflu']['name'];

$asi_ty  = $Q($link, "UPDATE `register` SET 
`firstname` = '$fname1', 
`lastname` = '$lname1', 
`mobile` = '$mobile1', 
`age` = '$age1', 
`gender` = '$gender1', 
`height` = '$height', 
`weight` = '$weight', 
`country` = '$country', 
`position1` = '$position1', 
`position2` = '$position2',
`jersysize` = '$jersysize',
`expereince` = '$experience',
`sfoot` = '$sfoot',
`studsize` = '$studsize',
`jersyno` = '$jersyno',
`pjname` = '$pjname',
`ffclub` = '$ffclub',
`dob` = '$dob'
 WHERE `id`='$_SESSION[adminid]' "); 
if($fileflu){

		
			$filetypes    = array('png', 'jpg', 'gif','JPG','jpeg','JPEG','svg');
		$theFileSize  = $_FILES['fileflu']['size'];
		$ext = pathinfo($fileflu, PATHINFO_EXTENSION);
					
			if(!in_array($ext,$filetypes))
			{  
				echo "<script>window.location='profile.php?er_ext=1';</script>";
			} 
			 if($theFileSize>1000000 && $fileflu!='')
			{  
				echo "<script>window.location='profile.php?er_size=1';</script>"; 
			}
		
		$pic_del     = "photo/".$getname['filefl']; 
		@unlink($pic_del);
			
$uniql       = uniqid();
		$file_names  = $uniql.$fileflu;
		$pname_thumb = $file_names;
		$uploadfiles = $fl_path.$file_names;				
		move_uploaded_file($_FILES['fileflu']['tmp_name'],$uploadfiles);
		
		$or_val          = $Q($link,"SELECT * FROM `register` ORDER BY `order` DESC LIMIT 0,1");
	    $up_val          = $or_val['order']+1;
		
		$img_dte  = $Q($link,"UPDATE `register` SET `filefl` = '$file_names'  WHERE `id`='$_SESSION[adminid]'");
		
			
}
  echo "<script>window.location='profile.php?updated=1';</script>";			

}

if(isset($_REQUEST['sendemail'])){
	
	$forgot = $_POST["forgot"];
	
$check    = "SELECT * FROM `register` WHERE `email`='$forgot' AND `status` = '1'";
$getname    = $F($Q($link,"SELECT * FROM `register` WHERE `email` = '$forgot' AND `status` = '1'"));

$result   = $Q($link,$check);
$count    = $C($result);
  if($count>0)
  {
	  
	  
  		$row      = $F($checkemail);
		
		@$message1 ='
		<p><strong>Hi '.ucfirst($getname['firstname']).', Find your forgotten password below !</strong></p>
		<p>Soccerintimacy.com, Login credentials </p>      
				  
				  <p>USERNAME:      '.$getname['email'].' </p>      
				  
				  <p>PASSWORD:     '.$getname['password'].' </p>
		 
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
$mail->SetFrom('info@soccerintimacy.com', 'Soccer intimacy forgot password');
//Set who the message is to be sent to
$mail->addAddress($forgot);
//Set the subject line
$mail->Subject = "Soccerintimacy Login credentials Retrieval";
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message1);
//Replace the plain text body with one created manually
$mail->send();
		
	   echo "<script>window.location='index.php?updated=2';</script>";
}echo "<script>window.location='index.php?updated=3';</script>";
}
?>

