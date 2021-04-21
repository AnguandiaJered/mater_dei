<?php
session_start();
include('../../phpscript/connection.php');
include('../../phpscript/classe_lib.php');
$db=db_connection();
$from=$_GET['from'];
$to=$_GET['to'];
$mysel=$_GET['mysel'];
$mycaisse_bank=$_GET['mycaisse_bank'];
switch($mysel)
{
	case 3:
	$ref='where date between "'.$from.'" and "'.$to.'" order by entree_id desc';
	break;
	case 2:
	$ref='where caisse__ou__banque_id="'.$mycaisse_bank.'" and  	categorie_id=2 and  date between "'.$from.'" and "'.$to.'" order by entree_id desc ';
	break;
	case 1:
	$ref='where caisse__ou__banque_id="'.$mycaisse_bank.'" and  	categorie_id=1 and  date between "'.$from.'" and "'.$to.'" order by entree_id desc ';
	break;
}
switch($mysel)
{
	case 3:
	$des='Global<br/>';
	break;
	case 2:
	$des='Banque : '.foreign_value('where banque_id="'.$mycaisse_bank.'"',' tbl__24banque','banque',$db).'<br/>';
	break;
	case 1:
	$des='Caisse : '.foreign_value('where caisse_id ="'.$mycaisse_bank.'"','tbl__23caisse','caisse',$db).'<br/>';
	break;
}

$periode='Du: '.french_date($from).' Au: '.french_date($to);
$head='';
$dates=journal_caisse_rpt($db,'tbl__33entree',$ref,$from,$to,$mysel,$mycaisse_bank);
$output=$head.real_journal_caisse($db,$dates,$from,$to,$mysel,$mycaisse_bank,'pdf');
include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13,'P'); 
$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 =''; //file_get_contents('../../retrieve/css-/stylesheets.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);
$mpdf->WriteHTML(header_top($db,'<h2 style="text-transform:uppercase;"><center>Journal Caisse</center></h2><br/><h5 style="font-size:10px;">'.$periode.'&nbsp;'.$des.'</h5>',$annee_scolaire).$output,2);

$mpdf->Output('journal_caisse.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>