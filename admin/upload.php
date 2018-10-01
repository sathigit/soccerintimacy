<?php
include 'includes/connection.php';
include 'includes/snapshot.php';

$catid        = $_POST['catid'];	
$subcatid     = $_POST['subcatid'];	
$title        = $_POST['title'];
$desc         = $_POST['desc'];

if($title!='' && $desc!=''){
	
// A list of permitted file extensions
$allowed    = array('png', 'jpg', 'gif','JPG','jpeg','JPEG');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

$or_val      = $F($Q("SELECT * FROM `files` ORDER BY `order` DESC LIMIT 0,1"));
$up_val      = $or_val['order']+1;
$filefl      = str_replace(" ","-",$_FILES['upl']['name']);	
$file_names  = $filefl;
$pname_thumb = $file_names;
$uploadfiles = $fl_path.$file_names;
move_uploaded_file($_FILES['upl']['tmp_name'], $uploadfiles);

$myimage			    =	new ImageSnapShot;	
$myimage->ImageFile	    =	$fl_path.$pname_thumb;
$myimage->Width		    =	167;
$myimage->Height	    =	113;
$myimage->Resize	    =	true;
$myimage->ResizeScale   =	100;
$myimage->Compression   =   80;
$fthump_save2			=   $fl_path."resize_".$pname_thumb;
$myimage->SaveImageAs($fthump_save2);
			
$ins_img = $Q("INSERT INTO `files` 
(`catid`,`subcatid`, `upl`,`title`,`desc`, `order`,  `status`)
VALUES('$catid','$subcatid','$file_names','$title','$desc','$up_val', '1')");
	 
	//if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/'.$_FILES['upl']['name'])){
		echo '{"status":"success"}';
		exit;
	//}
}

}

?>



