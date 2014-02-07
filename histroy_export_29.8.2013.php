<?php
include("config.php");
require_once('Classes/PHPExcel.php');
require_once('Classes/PHPExcel/IOFactory.php');

 
	getTaskNameArrayList();
	global $TaskNameArr;
	
	$__FloorPointsArray = array();
	$__FloorPointsArray[1] = array("44", "35", "room_tri_birum", "Vagtrum", "46", "34");
	$__FloorPointsArray[2] = array("90", "32", "room_tri_birum", "Toilet", "21", "30");
	$__FloorPointsArray[3] = array("43", "89", "room_tri_birum", html_entity_decode("Personaleomkl&#230;dn.",ENT_COMPAT,"UTF-8"), "38", "61");
	$__FloorPointsArray[4] = array("44", "144", "room_tri_birum", html_entity_decode("Afd. k&#248;kken",ENT_COMPAT,"UTF-8"), "40", "42");
	$__FloorPointsArray[5] = array("31", "193", "room_tri_behan", "Stue 8", "68", "84");
	$__FloorPointsArray[6] = array("31", "275", "room_tri_birum", "Sekretariat", "45", "55");
	$__FloorPointsArray[7] = array("94", "274", "room_tri_birum", "Medicin", "45", "22");
	$__FloorPointsArray[8] = array("32", "336", "room_tri_birum", "Stue 6", "60", "70");
	$__FloorPointsArray[9] = array("45", "408", "room_tri_birum", "Stue 5", "45", "55");
	$__FloorPointsArray[10] = array("45", "465", "room_tri_birum", "Stue 4", "37", "55");
	$__FloorPointsArray[11] = array("45", "511", "room_tri_birum", "Stue 3", "47", "57");
	$__FloorPointsArray[12] = array("47", "582", "room_tri_birum", "Ude 2", "40", "40");
	$__FloorPointsArray[13] = array("41", "642", "room_tri_birum", "Sekretariat", "50", "24");
	$__FloorPointsArray[14] = array("41", "699", "room_tri_birum", "Triage", "40", "20");
	$__FloorPointsArray[15] = array("40", "746", "room_tri_birum", "Pause", "24", "25");
	$__FloorPointsArray[16] = array("41", "778", "room_tri_birum", html_entity_decode("Venterum b&#248;rn",ENT_COMPAT,"UTF-8"), "48", "40");
	$__FloorPointsArray[17] = array("73", "643", "room_tri_birum", "Print", "50", "21");
	$__FloorPointsArray[18] = array("67", "709", "room_tri_birum", html_entity_decode("Kontorspl &#230;ge",ENT_COMPAT,"UTF-8"), "57", "20");
	$__FloorPointsArray[19] = array("100", "643", "room_tri_birum", "Skranke", "48", "20");
	$__FloorPointsArray[20] = array("97", "772", "room_tri_birum", "Venterum", "50", "29");
	$__FloorPointsArray[21] = array("126", "643", "room_tri_birum", "Med.", "20", "20");
	$__FloorPointsArray[22] = array("100", "703", "room_tri_birum", "Venterum", "60", "60");
	$__FloorPointsArray[23] = array("134", "778", "room_tri_birum", "Indgang", "44", "33");
	$__FloorPointsArray[24] = array("146", "848", "room_tri_birum", "Ude 1", "20", "20");
	$__FloorPointsArray[25] = array("186", "642", "room_tri_birum", "Stue 2", "58", "35");
	$__FloorPointsArray[26] = array("179", "711", "room_tri_birum", "Stue 1", "50", "38");
	$__FloorPointsArray[27] = array("199", "777", "room_tri_birum", "Toilet", "20", "20");
	$__FloorPointsArray[28] = array("199", "808", "room_tri_birum", "Toilet", "20", "20");
	$__FloorPointsArray[29] = array("131", "56", "room_tri_birum", "Gang 1", "41", "30");
	$__FloorPointsArray[30] = array("131", "152", "room_tri_birum", "Gang 2", "41", "30");
	$__FloorPointsArray[31] = array("131", "278", "room_tri_birum", "Gang 3", "41", "30");
	$__FloorPointsArray[32] = array("131", "375", "room_tri_birum", "Gang 4", "41", "30");
	$__FloorPointsArray[33] = array("131", "475", "room_tri_birum", "Gang 5", "41", "30");
	$__FloorPointsArray[34] = array("131", "590", "room_tri_birum", "Gang 6", "41", "30");
	$__FloorPointsArray[35] = array("140", "657", "room_tri_birum", "Gang 7", "20", "20");
	$__FloorPointsArray[36] = array("160", "621", "room_tri_birum", "Kopi", "20", "20");
	$__FloorPointsArray[37] = array("182", "45", "room_tri_birum", "Skyllerum1", "35", "35");
	$__FloorPointsArray[38] = array("177", "134", "room_tri_birum", html_entity_decode("Brands&#229;r",ENT_COMPAT,"UTF-8"), "35", "40");
	$__FloorPointsArray[39] = array("174", "280", "room_tri_birum", "Gang 10", "30", "35");
	$__FloorPointsArray[40] = array("177", "328", "room_tri_birum", "Stue 7", "45", "45");
	$__FloorPointsArray[41] = array("186", "403", "room_tri_birum", "Personale toilet", "25", "32");
	$__FloorPointsArray[42] = array("175", "439", "room_tri_birum", "Handicap toilet", "20", "40");
	$__FloorPointsArray[43] = array("179", "474", "room_tri_birum", "Gang 8", "33", "30");
	$__FloorPointsArray[44] = array("238", "193", "room_tri_birum", "Akut kirurgi", "60", "40");
	$__FloorPointsArray[45] = array("245", "284", "room_tri_birum", "Gang 11", "30", "30");
	$__FloorPointsArray[46] = array("245", "340", "room_tri_birum", "Depot", "53", "29");
	$__FloorPointsArray[47] = array("244", "420", "room_tri_birum", "Depot", "36", "35");
	$__FloorPointsArray[48] = array("238", "511", "room_tri_birum", "Kontor", "36", "29");
	$__FloorPointsArray[49] = array("292", "194", "room_tri_birum", "Hovedtavle", "68", "25");
	$__FloorPointsArray[50] = array("294", "330", "room_tri_birum", "Ventilation", "68", "23");
	$__FloorPointsArray[51] = array("271", "472", "room_tri_birum", "Gang 9", "20", "29");
	$__FloorPointsArray[52] = array("279", "505", "room_tri_birum", "Konference", "50", "96");
	$__FloorPointsArray[53] = array("331", "197", "room_tri_birum", "Decont.rum", "54", "30");
	$__FloorPointsArray[54] = array("328", "280", "room_tri_birum", "Gang 12", "30", "35");
	$__FloorPointsArray[55] = array("329", "333", "room_tri_birum", "Teknik", "61", "35");
	$__FloorPointsArray[56] = array("318", "420", "room_tri_birum", "25", "", "41");
	$__FloorPointsArray[57] = array("312", "460", "room_tri_birum", "Afd.sygepl", "30", "35");
	$__FloorPointsArray[58] = array("375", "193", "room_tri_birum", "Morsrum", "31", "36");
	$__FloorPointsArray[59] = array("376", "236", "room_tri_birum", "Fremvisn.", "20", "35");
	$__FloorPointsArray[60] = array("375", "342", "room_tri_birum", html_entity_decode("P&#229;r&#248;rende",ENT_COMPAT,"UTF-8"), "54", "37");
	$__FloorPointsArray[61] = array("415", "275", "room_tri_birum", "Indgang ambulance", "46", "30");
	$__FloorPointsArray[62] = array("456", "275", "room_tri_birum", "Ude 3", "45", "25");
	$__FloorPointsArray[63] = array("182", "90", "room_tri_birum", "Skyllerum2", "36", "34");
	
	
	
	
	function getTaskNameArrayList(){
		global $TaskNameArr;
		$TaskNameArr = array("0"=>"Intern transport");
		$tQry = mysql_query("SELECT T_TASK_ID,T_TASK_NAME FROM tbl_task_list ORDER BY T_TASK_ID");
		while($rows = mysql_fetch_array($tQry) ){		
			$TaskNameArr[$rows['T_TASK_ID']] = $rows['T_TASK_NAME'];			
		}
		//return $TaskNameArr;
	}
	
$st_date = $_REQUEST['create_date_archi']." 00:00:00";
$closedate = $_REQUEST['end_date_archi']." 23:59:59";



$qry = mysql_query("SELECT t.*,u.T_UNAME,T_PROFESSION FROM tbl_timer_log as t, tbl_users as u  WHERE t.T_USER_ID = u.T_USER_ID AND T_TASK_DATE BETWEEN '".$st_date."' AND '".$closedate."'");

//$TaskNameArr = array("1"=>"Internal Transport","2"=>"Chart View","3"=>"Medication list view","4"=>"Report View","5"=>"Test ECG");
$doctor = html_entity_decode('L&#230;ge',ENT_COMPAT,"UTF-8");
$userProfession = array("1"=>$doctor,"2"=>"Sygeplejerske","3"=>"Anden funktion","4"=>"Other Staff");


$objPHPExcel = new PHPExcel();

$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);

$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);




$objPHPExcel->getActiveSheet()->setCellValue('A1', "Bruger");
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

//$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);

$objPHPExcel->getActiveSheet()->setCellValue('B1', "Rum nr.");
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);


 //$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
 //$objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 //$objPHPExcel->getActiveSheet()->getStyle('B1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
 //$objPHPExcel->getActiveSheet()->getStyle('B1')->getFill()->getStartColor()->setARGB('FFFF0000');
 



$objPHPExcel->getActiveSheet()->setCellValue('C1', "Opgave nr.");
$objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->setCellValue('D1', "Opgave");
$objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->setCellValue('E1', "Opgave varighed");
$objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->setCellValue('F1', "Dato");
$objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->setCellValue('G1', "Kommentar");
$objPHPExcel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->setCellValue('H1', "Profession");
$objPHPExcel->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);



$i = 2;
while($arr = mysql_fetch_array($qry)){   
	//print "hi";
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $arr['T_UNAME']);
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $__FloorPointsArray[$arr['T_ROOM_NUM']][3]);
	$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $arr['T_TASK_ID']);
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $TaskNameArr[$arr['T_TASK_ID']]);
	$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $arr['T_TASK_ENDTIME']);
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $arr['T_TASK_DATE']);
	$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $arr['T_TASK_COMMENTS']);
	
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $userProfession[$arr['T_PROFESSION']]);
	
	
	$i++;
	//print "<pre>"; print_r($arr); print "</pre>"; 
}
$objPHPExcel->getActiveSheet()->setTitle('HealthCare');

// Redirect output to a client’s web browser (Excel5)

$today = date("Y_m_d");
header('Content-Type: text/html; charset=utf-8'); 
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="ArchiMed-Rapportgenerering_'.$today.'.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output'); 
$objWriter->save('ArchiMed-Rapportgenerering_'.$today.'.xls');
?>