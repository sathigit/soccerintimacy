<?php
error_reporting (E_ALL); 
@session_start();


$link = mysqli_connect("localhost", "root", "", "socceri");
//$link = mysqli_connect("localhost", "socce_tbd", "wRul2$27","soccerin_tbd");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Print host information
//echo "Connect Successfully. Host info: " . mysqli_get_host_info($link);


$Q = "mysqli_query";
$F = "mysqli_fetch_array";
$C = "mysqli_num_rows";

date_default_timezone_set('Asia/Calcutta');

$p_date      =  date('d/m/Y');
$p_date2     =  date('Y-m-d');
$p_time      =  date('h:i:s-a');
$datee      =   date('Y');

$sitemail   = $F($Q($link,"SELECT * FROM `ex_admin` WHERE `id` = '1'"));




$sitename   = "soccerintimacy.com";

$site_email = "$sitemail[email]";

 $fl_path     = $_SERVER['DOCUMENT_ROOT']."/soccer-new/photo/";
$fl_path2 = $_SERVER['DOCUMENT_ROOT']."/soccer-new/team/";
$fl_path3     = $_SERVER['DOCUMENT_ROOT']."/soccer-new/news/";

error_reporting (E_ALL ^ E_NOTICE); 



?>