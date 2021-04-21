<?php
session_start();
include('../../phpscript/connection.php');
include('../../phpscript/classe_lib.php');
$db=db_connection();
$section=$_GET['section'];
$option=$_GET['option'];
$classe=$_GET['classe'];
$output=student_list($db,$section,$option,$classe);;
include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13,'P'); 
$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 = file_get_contents('../../retrieve/css-/stylesheets.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);
$mpdf->WriteHTML(header_top($db,'<h2 style="text-transform:uppercase;"><center>Liste eleve</center></h2>',$annee_scolaire).$output,2);

$mpdf->Output('Liste_eleve.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>