<?php
include("config.php");
require_once('Classes/PHPExcel.php');
require_once('Classes/PHPExcel/IOFactory.php');

/*
function getUserName($uid){
	$uqry = mysql_query("SELECT T_UNAME,T_PROFESSION FROM  tbl_users WHERE T_USER_ID=".$uid);
	$rows = mysql_fetch_array($uqry);	
	return $rows
}
//SELECT t.*,u.T_UNAME,T_PROFESSION FROM `tbl_timer_log` as t, tbl_users as u  WHERE t.`T_USER_ID` = u.`T_USER_ID`
*/


$qry = mysql_query("SELECT * FROM tbl_timer_log");

$TaskNameArr = array("1"=>"Internal Transport","2"=>"Chart View","3"=>"Medication list view","4"=>"Report View","5"=>"Test ECG");


$objPHPExcel = new PHPExcel();

$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);

$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);


$objPHPExcel->getActiveSheet()->setCellValue('A1', "User ID");
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->setCellValue('B1', "Room Number");
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->setCellValue('C1', "Task");
$objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->setCellValue('D1', "Task Name");
$objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->setCellValue('E1', "Task End Time");
$objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->setCellValue('F1', "Date");
$objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->setCellValue('G1', "Comments");
$objPHPExcel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);



$i = 2;
while($arr = mysql_fetch_array($qry)){   
	//print "hi";
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $arr['T_USER_ID']);
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $arr['T_ROOM_NUM']);
	$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $arr['T_TASK_ID']);
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $TaskNameArr[$arr['T_TASK_ID']]);
	$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $arr['T_TASK_ENDTIME']);
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $arr['T_TASK_DATE']);
	$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $arr['T_TASK_COMMENTS']);
	
	
	
	$i++;
}
$objPHPExcel->getActiveSheet()->setTitle('HealthCare');










// Redirect output to a client’s web browser (Excel5)
$today = "timerHistroy"; //date("Y_m_d_G_i_s");
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Health_Care_Report_'.$today.'.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output'); 
$objWriter->save('HealthCare_Report_'.$today.'.xls');

?>