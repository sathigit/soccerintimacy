<?php	
	@session_start();

	if($up == "")
	{
	  $up = $_REQUEST['up'];
	}
	if($upd == "")
	{
	  $upd = $_REQUEST['upd'];
	}
    session_unset();
	session_destroy();

	header("Location:index.php?up=$up&upd=$upd");
?>