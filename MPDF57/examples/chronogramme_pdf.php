<?php
session_start();
include('../../phpscript/connection.php');
include('../../phpscript/classe_lib.php');
$db=db_connection();
$header='<table border="0" width="100%">
<tr bgcolor="#E0EFFE">
<th align="left">ACTIVITE</th>
<th align="left">DEBUT</th>
<th align="left">FIN</th>
</tr>';
$content='';
$db=$q=mysql_query("select *from tbl__33chronogramme where projet_id='".$_GET['project']."' and b_mois<>''") or die("Query Failed".mysql_error());
while($row=mysql_fetch_array($q))
{
	$content.='
	<tr>
	<td>'.foreign_value('where activite_id="'.$row['activite_id'].'"','tbl__23activite',9,$db).'</td>
	<td>'.$row['debut'].'</td>
	<td>'.$row['fin'].'</td>
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
$mpdf->WriteHTML(header_top($db,'<h2 style="text-transform:uppercase;"><center>CHRONOGRAMME  PROJET '.foreign_value('WHERE projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',3,$db).'</center></h2>',$annee_scolaire).$output,2);

$mpdf->Output('chronogramme_projet_'.foreign_value('where projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',3,$db).'.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>