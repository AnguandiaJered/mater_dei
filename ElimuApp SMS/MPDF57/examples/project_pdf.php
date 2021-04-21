<?php
session_start();
include('../../phpscript/connection.php');
include('budget_functions.php');
$db=db_connection();
$part_mso_id=foreign_value('where projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',2,$db);
$output='
<table width="100%">
<tr bgcolor="#fff">
<td>Partenaire de mise en oeuvre</td>
<td>'.foreign_value('where partenaire__de__mise__en__oeuvre_id="'.$part_mso_id.'"',' tbl__09partenaire__de__mise__en__oeuvre',2,$db).'</td>
</tr>
<tr bgcolor="#fff">
<td>Location</td>
<td>'.foreign_value('where projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',4,$db).'</td>
</tr>
<tr bgcolor="#fff">
<td>Période couverte/Mois</td>
<td>'.foreign_value('where projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',5,$db).'</td>
</tr>
<tr bgcolor="#fff">
<td>Date du demarrage</td>
<td>'.foreign_value('where projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',6,$db).'</td>
</tr>
<tr bgcolor="#fff">
<td>Budget Global</td>
<td>'.foreign_value('where projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',7,$db).'</td>
</tr>
<tr bgcolor="#fff">
<td>Partenaires d\'execution</td>
<td>'.foreign_value('where projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',8,$db).'</td>
</tr>
</table>';
include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 = file_get_contents('../../retrieve/css-/stylesheets.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);
$mpdf->WriteHTML(header_top($db,'<h2 style="text-transform:uppercase;"><center>PROFIL PROJET '.foreign_value('WHERE projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',3,$db).'</center></h2>',$annee_scolaire).$output,2);

$mpdf->Output('projet_'.foreign_value('where projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',3,$db).'.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>