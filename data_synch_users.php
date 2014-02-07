<?php
/**************
	 @	Filename	: data_synch_users.php
	 @	Created		: 05.02.2013
	 @	Description	: Read Data from Application and Push to the DB For User Tables
	 @	Table Name	: tbl_users
**************/
header('Access-Control-Allow-Origin: *');
include("config.php");


//json_encode($optres)
	
	$UsersArr = json_decode(stripcslashes($_REQUEST['myuserinfo']), true);
	
	$cnt = count($UsersArr);	
		for($s = 0; $s < $cnt; $s++) {		
				$txt_USER_ID =  $UsersArr[$s]['oT_USER_ID'];
				$txt_UNAME =  $UsersArr[$s]['oT_UNAME'];
				$txt_PROFESSION =  $UsersArr[$s]['oT_PROFESSION'];
				$txt_STATUS = 	$UsersArr[$s]['oT_STATUS'];
				
				/*$sqlSel = mysql_query("SELECT * FROM  tbl_users WHERE T_USER_ID = ".$txt_USER_ID);
				$numRows = mysql_num_rows($sqlSel);
				if($numRows == 0){	//Insert*/
						//".$txt_USER_ID.",
				$ExecQry = "INSERT INTO tbl_users (T_UNAME,T_PROFESSION,T_STATUS) VALUES (
						'".$txt_UNAME."',
						'".$txt_PROFESSION."',
						".$txt_STATUS."
						)";
				/*}else{	//Update
					$ExecQry = "UPDATE tbl_users SET  T_UNAME='".$txt_UNAME."',T_PROFESSION=".$txt_PROFESSION."  WHERE T_USER_ID=".$txt_USER_ID;
				}*/
				$exec = mysql_query($ExecQry); 
				$lastUserID = mysql_insert_id();
				if($exec){					//echo "0";	//Success					
					$resArr[] = array("msg"=>"ok","client_uid"=>$txt_USER_ID,"server_uid" => $lastUserID);
				}else{
					//echo $txt_USER_ID;	//Failure
					$resArr[] = array("msg"=>"fail","client_UID"=>$txt_USER_ID);
				}	
				
				
	}
	
	header("Content-type: application/json");	
	$userRes['responsearr'] = $resArr;
	echo json_encode($userRes);
 
?>