<?php
/**************
	 @	Filename	: data_synch.php
	 @	Created		: 05.02.2013
	 @	Description	: Read Data from Application and Push to the DB
	 @	Table Name	: tbl_timer_log
**************/
header('Access-Control-Allow-Origin: *');
include("config.php");

	

		//print_r($_POST);exit;
		
	$TimerLogArr = json_decode(stripcslashes($_REQUEST['mytimerinfo']), true);
	//print "<pre>"; print_r($TimerLogArr);
	$cnt = count($TimerLogArr);	
	for($s = 0; $s < $cnt; $s++) {	
	
				$txt_TIMER_ID =  $TimerLogArr[$s]['oT_TIMER_ID'];
				$txt_USER_ID =  $TimerLogArr[$s]['oT_USER_ID'];
				$txt_ROOM_NUM =  $TimerLogArr[$s]['oT_ROOM_NUM'];
				$txt_TASK_ID = 	$TimerLogArr[$s]['oT_TASK_ID'];
				$txt_TASK_DATE =  $TimerLogArr[$s]['oT_TASK_DATE'];
				$txt_TASK_ENDTIME =  $TimerLogArr[$s]['oT_TASK_ENDTIME'];	
				$txt_TASK_COMMENTS =  $TimerLogArr[$s]['oT_TASK_COMMENTS'];
				$txt_SERVER_UID =  $TimerLogArr[$s]['oSERVER_UID'];
				
				$txt_SERVER_ID = $TimerLogArr[$s]['oSERVER_ID'];		//For update the Exist Records
				
				/*
				//".$txt_TIMER_ID.",
				
					*/
				/** IF Server ID is not Empty then Update the Records **/	
			
				if($txt_SERVER_ID !=0 && $txt_SERVER_ID != "")	{						
						$ExecQry = "UPDATE tbl_timer_log SET  T_ROOM_NUM='".$txt_ROOM_NUM."',T_TASK_ID=".$txt_TASK_ID.",T_TASK_DATE='".$txt_TASK_DATE."',T_TASK_ENDTIME='".$txt_TASK_ENDTIME."',T_TASK_COMMENTS='".$txt_TASK_COMMENTS."' WHERE T_TIMER_ID=".$txt_SERVER_ID;
						$exec = mysql_query($ExecQry);
						$lastTimerID = $txt_SERVER_ID;
				}else{
					$ExecQry = "INSERT INTO tbl_timer_log (T_USER_ID,T_ROOM_NUM,T_TASK_ID,T_TASK_DATE,T_TASK_ENDTIME,T_TASK_COMMENTS) VALUES (						
						".$txt_SERVER_UID.",
						'".$txt_ROOM_NUM."',
						".$txt_TASK_ID.",
						'".$txt_TASK_DATE."',
						'".$txt_TASK_ENDTIME."',
						'".$txt_TASK_COMMENTS."'
						)";
						$exec = mysql_query($ExecQry); 
						$lastTimerID = mysql_insert_id();
					}	
				
				
				if($exec){
					//echo "0";	//Success					
					$resArr[] = array("msg"=>"ok","client_timerid"=>$txt_TIMER_ID,"server_timerid" => $lastTimerID);
				}else{
					//echo $txt_TIMER_ID;	//Failure
					$resArr[] = array("msg"=>"fail","client_timerid"=>$txt_TIMER_ID);
				}
				
	}
	
	header("Content-type: application/json");	
	$userRes['responsearr'] = $resArr;
	echo json_encode($userRes);
	
	
	//echo json_encode($resArr);	
?>