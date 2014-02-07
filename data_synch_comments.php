<?php
/**************
	 @	Filename	: data_synch_users.php
	 @	Created		: 05.02.2013
	 @	Description	: Read Data from Application and Push to the DB For Over all comments
	 @	Table Name	: tbl_comments
**************/
header('Access-Control-Allow-Origin: *');
include("config.php");

/*
	//Example Request Syx
'[{"oT_COMMENT_ID":1,"oT_USER_ID":1,"oT_COMMENTS":"over all comments","oT_COMMENT_DATE":"2013-09-10 12:30:16","oT_EXTRA_INFO":"firster","oSERVER_UID":3,"oSERVER_ID":0},
{"oT_COMMENT_ID":2,"oT_USER_ID":1,"oT_COMMENTS":"next comments","oT_COMMENT_DATE":"2013-09-10 12:34:50","oT_EXTRA_INFO":"nextonces","oSERVER_UID":3,"oSERVER_ID":0}]';
*/

//$_REQUEST['mytimerinfo'] = '[{"oT_COMMENT_ID":1,"oT_USER_ID":1,"oT_COMMENTS":"","oT_COMMENT_DATE":"2013-09-11 18:28:16","oT_EXTRA_INFO":"aSD\'sdsd","oSERVER_UID":10,"oSERVER_ID":0}]';


	$CommentsArr = json_decode(stripcslashes($_REQUEST['mytimerinfo']), true);
	$cnt = count($CommentsArr);	
	
	
	
	
	for($s = 0; $s < $cnt; $s++) {	
	
				$txt_COMMENT_ID =  $CommentsArr[$s]['oT_COMMENT_ID'];
				$txt_COMMENTS =  mysql_escape_string($CommentsArr[$s]['oT_COMMENTS']);
				$txt_COMMENT_DATE =  date("Y-m-d",strtotime($CommentsArr[$s]['oT_COMMENT_DATE']));
				$txt_EXTRA_INFO =  mysql_escape_string($CommentsArr[$s]['oT_EXTRA_INFO']);
				
				$txt_SERVER_UID =  $CommentsArr[$s]['oSERVER_UID'];	//server user id from local db fields
				
				$txt_SERVER_ID = $CommentsArr[$s]['oSERVER_ID'];		//For update the Exist Records 
				
				
				if($txt_SERVER_ID !=0 && $txt_SERVER_ID != "")	{	
					 $ExecQry = "UPDATE tbl_user_comments SET  T_COMMENTS='".$txt_COMMENTS."',T_EXTRA_INFO='".$txt_EXTRA_INFO."' WHERE T_COMMENT_ID=".$txt_SERVER_ID;
					$exec = mysql_query($ExecQry);
					$lastCommentID = $txt_SERVER_ID;
						
				}else{
				$ExecQry = "INSERT INTO tbl_user_comments (T_USER_ID,T_COMMENTS,T_COMMENT_DATE,T_EXTRA_INFO) VALUES (						
						".$txt_SERVER_UID.",
						'".$txt_COMMENTS."',
						'".$txt_COMMENT_DATE."',
						'".$txt_EXTRA_INFO."'
						)";
						$exec = mysql_query($ExecQry); 
						$lastCommentID = mysql_insert_id();
				}

				if($exec){
					//echo "0";	//Success					
					$resArr[] = array("msg"=>"ok","client_commentsid"=>$txt_COMMENT_ID,"server_commentsid" => $lastCommentID);
				}else{
					//echo $txt_TIMER_ID;	//Failure
					$resArr[] = array("msg"=>"fail","client_commentsid"=>$txt_COMMENT_ID,"arr"=>$CommentsArr);
				}				
						
	
	}
	
	header("Content-type: application/json");	
	$userRes['responsearr'] = $resArr;
	echo json_encode($userRes);
	
	
	
?>