<?php
session_start();
include('../../phpscript/connection.php');
$db=db_connection();
$header='<table width="100%">
<tr bgcolor="#C4DBFF">
  	<th valign="top"><p><h3>ACTIVITES</h3></p></th>
	<th  valign="top"><p><h3>PERSONNES ASSOCIEES</h3></p></th>
    <th  valign="top"><p><h3>PERIODE</h3> </p></th>
    <th  valign="top"><p><h3>NOTIFICATION RAPPEL TEMPS</h3></p></th>
  </tr>';
  $footer='</table>';
$output=rappel_de_temps($db,$header,$footer,'');
include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 
$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 = file_get_contents('../../retrieve/css-/stylesheets.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);
$mpdf->WriteHTML(header_top($db,'<h2 style="text-transform:uppercase;"><center>RAPPEL DE TEMPS PROJET '.foreign_value('WHERE projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',3,$db).'</center></h2>',$annee_scolaire).$output,2);

$mpdf->Output('rappel_de_temps_projet_'.foreign_value('where projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',3,$db).'.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>