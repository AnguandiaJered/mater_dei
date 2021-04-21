<?php
session_start();
include('../../phpscript/connection.php');
$db=db_connection();
$header='<table width="100%">
<tr bgcolor="#C4DBFF">
<th align="left">AGENT</th>
<th align="left">FONCTION</th>
<th align="left">PARTIE PRENANTE</th>
</tr>';
$content='';
$q=mysql_query("select * from  tbl__34attribution__activites__aux__utilisateurs where projet_id='".$_GET['project']."'") or die("Query Failed".mysql_error());
while($row=mysql_fetch_array($q))
{
$content.='
<tr>
<td>'. foreign_value('where user_id="'.$row['user_id'].'"',' tbl__02users',5,$db).'</td>
<td>'. foreign_value('where fonction_id="'.$row['fonction_id'].'"','  tbl__35fonction',2,$db).'</td>
<td>'. foreign_value('where partie__prenante="'.$row['partie__prenante'].'"','tbl__28partie__prenante',4,$db).'</td>
</tr>';	
}
$footer='</table>';
$output=$header.$content.$footer;
include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 
$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 = file_get_contents('../../retrieve/css-/stylesheets.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);
$mpdf->WriteHTML(header_top($db,'<h2 style="text-transform:uppercase;"><center>ATTRIBUTION ACTIVITES PROJET '.foreign_value('WHERE projet_id="'.$_GET['project'].'"','tbl__10projet',3,$db).'</center></h2>',$annee_scolaire).$output,2);

$mpdf->Output('attribution_activites_projet_'.foreign_value('where projet_id="'.$_GET['project'].'"','tbl__10projet',3,$db).'.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>