<?php
error_reporting(0);
include("config.php");
//header("content-type: application/json");
	
	
	$arr = json_decode(stripcslashes($_REQUEST['mytimerinfo']), true);
	print_r($arr);
	
	exit;
	
	
	
	$getTempData =  (array) json_decode($_REQUEST['mytimerinfo']);
	$error = json_last_error();	
	//print "me";
	foreach($getTempData as $data)		{
			print "hi";			
			print "<pre>"; print_r($getTempData); print "</pre>";
		}
		
	

?>