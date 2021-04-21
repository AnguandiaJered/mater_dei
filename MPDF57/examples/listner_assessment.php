<?php
session_start();
include('../../phpscript/classe_lib.php');
include('../../phpscript/connection.php');
$db=db_connection();
if(AC=='detail')
{
	$output=ev_listner(2,ID,1);
	$sess='<br><b>Rapport:</b><br>'.$_SESSION['REPORT'];
}else if(AC=='filter_record')
{
	$output=ev_listner(3,ID,1);
	$sess='';
}
else
{
	$output=ev_listner(1,ID,1);
	$sess='';
}

include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 = file_get_contents('../../retrieve/css-/stylesheets.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);

$mpdf->WriteHTML(header_top($db,'<h1>Evaluation Ecoutants</h1>').$output.$sess,2);

$mpdf->Output('mpdf.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>