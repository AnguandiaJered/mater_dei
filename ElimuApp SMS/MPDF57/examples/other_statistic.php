<?php
session_start();
include('../../phpscript/classe_lib.php');
include('../../phpscript/connection.php');
$db=db_connection();
$from=$_GET['from'];
$to=$_GET['to'];
switch($_GET['category'])
{
	case'mute':
	$tbl='tbl__30appel__silencieux';
	$call='Appel Silencieux : ';
	break;
	case'interrupted':
	$call='Appel Interrompu : ';
	$tbl='tbl__32appel__interrompu';
	break;
	case'error':
	$call='Appel Erreur : ';
	$tbl='tbl__31appel__erreur';
	break;
	default:
	{
		$tbl='';
		
	}
}
if($_SESSION['DESIGNATION']=='user')
{
	$reference='where user_id='.$_SESSION['USER_ID'].' and date between "'.$from.'" and "'.$to.'"';
}else
{
	$reference=' where date between "'.$from.'" and "'.$to.'"';
}
if(isset($_GET['province']))
{
	$design=report_net_call_schedule('tbl__31appel__erreur',$from,$to,3);
$count=$design;
}else
{
$count=count_rows($reference,$tbl);
}
$output='<h3>Statistique du: '.$from.'  au: '.$to.'</h3><br>
'.$call.$count;
include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 = file_get_contents('../../retrieve/css-/stylesheets.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);

$mpdf->WriteHTML(header_top($db,'<h1>Rapport Statique</h1>').$output,2);

$mpdf->Output('mpdf.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>