
<?php
session_start();
include('../../phpscript/connection.php');
include('budget_functions.php');
$db=db_connection();
$output='
<table width="100%">
<tr bgcolor="#CEE7FF">
<td>Context du Projet</td>
<td>'.foreign_value('where projet_id="'.$_GET['project'].'"',' tbl__11analyse__de__la__situation',3,$db).'</td>
</tr>
<tr bgcolor="#CEE7FF">
<td>Context du Partenaire</td>
<td>'.foreign_value('where projet_id="'.$_GET['project'].'"',' tbl__11analyse__de__la__situation',4,$db).'</td>
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
$mpdf->WriteHTML(header_top($db,'<h2 style="text-transform:uppercase;"><center>ANALYSE DE LA SITUATION PROJET '.foreign_value('WHERE projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',3,$db).'</center></h2>',$annee_scolaire).$output,2);

$mpdf->Output('analyse_de_la_situation_projet_'.foreign_value('where projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',3,$db).'.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>