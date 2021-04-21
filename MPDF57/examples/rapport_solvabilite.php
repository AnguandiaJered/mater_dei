<?php
session_start();
include('../../phpscript/connection.php');
include('../../phpscript/classe_lib.php');
$db=db_connection();
set_time_limit(-1);
$from=$_GET['from'];
$to=$_GET['to'];
$feeid=$_GET['feeid'];
$sectionid=$_GET['sectionid'];
$optionid=$_GET['optionid'];
$classeid=$_GET['classeid'];
if($classeid<1)
{
	$ref='';
}else
{
	$ref='where classe_id="'.$classeid.'"';
}
$orientation='L';
$output=insolvable($db,'tbl__15classe',$ref,$feeid,$classeid,$from,$to);
include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13,$orientation); 
$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 = file_get_contents('../../retrieve/css-/stylesheets.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);
$mpdf->WriteHTML(header_top($db,'Rapport de Solvabilite',$annee_scolaire).$output,2);

$mpdf->Output('rapport_frais.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>