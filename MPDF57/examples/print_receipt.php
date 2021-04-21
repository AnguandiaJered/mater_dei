<?php
session_start();
include('../../phpscript/connection.php');
include('../../phpscript/classe_lib.php');
$db=db_connection();
$treasurebank=foreign_value('where  recus="'.$_GET['id'].'" limit 1',' tbl__27payer__les__frais',6,$db);
$treasurebankId=foreign_value('where  recus="'.$_GET['id'].'" limit 1',' tbl__27payer__les__frais',7,$db);
switch($treasurebank)
{
	case 1:
	$teller=foreign_value('where  caisse_id ="'.$treasurebankId.'" ','tbl__23caisse',2,$db);
	$legend='Caisse';
	break;
	case 2:
	$teller=foreign_value('where  banque_id  ="'.$treasurebankId.'" ',' tbl__24banque',2,$db);
	$legend='Banque';
	break;
}
$student_id=foreign_value('where recus ="'.$_GET['id'].'"',' tbl__28recus',2,$db);
$classe_id=foreign_value('where inscription__des__eleves_id ="'.$student_id.'"','tbl__17inscription__des__eleves',14,$db);
$header='<table width="100%">
<tr>
<td>Nom</td><td>'.foreign_value('where inscription__des__eleves_id ="'.$student_id.'"','tbl__17inscription__des__eleves',2,$db).'</td>
</tr>
<tr>
<td>Numero matricule</td><td style="text-transform:uppercase;">'.foreign_value('where inscription__des__eleves_id ="'.$student_id.'"','tbl__17inscription__des__eleves',15,$db).'</td>
</tr>
<tr>
<td>Classe</td><td style="text-transform:uppercase;">'.foreign_value('where classe_id ="'.$classe_id.'"','tbl__15classe',2,$db).'</td>
</tr>
<tr>
<td>Total deja paye</td><td>'.sum_rowsone($db,'tbl__27payer__les__frais','montant','where inscription__des__eleves_id="'.$student_id.'"').'</td>
</tr>
<tr>
<td>Motif</td><td>'.foreign_value('where  recus="'.$_GET['id'].'" limit 1',' tbl__27payer__les__frais',5,$db).'</td>
</tr>
<tr>
<td>'.$legend.'</td><td>'.$teller.'</td>
</tr>

</table>
<h3>Dispatch</h3>
<table width="100%">
<tr bgcolor="#CCDFFD">
<th align="left">Frais</th>
<th align="right">Montant</th>
</tr>';
$footer='</table>';
$content='';
$total=0;
$q=$db=mysql_query("select * from   tbl__27payer__les__frais where recus='".$_GET['id']."'") or die('Query Failed dispatch'.mysql_error());
while($row=mysql_fetch_array($q))
{
	$total+=+$row['montant'];
	$content.='<tr>
	<td>'.foreign_value('where frais__scolaires_id ="'.$row['frais__scolaires_id'].'"','tbl__14frais__scolaires',4,$db).'</td>
	<td align="right">'.$row['montant'].'</td>
	</tr>';
}
$total='<tr bgcolor="#CCDFFD">
<td><strong>Total</strong></td>
<td align="right"><strong>'.$total.'</strong></td>
</tr>';
$output=$header.$content.$total.$footer.'';
include("../mpdf.php");

$mpdf=new mPDF('c','A5','','',10,10,10,10,0,0); 
$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 = file_get_contents('../../retrieve/css-/stylesheets.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);
$mpdf->WriteHTML(header_top($db,'<h3 style="text-transform:uppercase;"><center>RECUS No '.$_GET['id'].' <br/>Du '.foreign_value('where recus ="'.$_GET['id'].'"',' tbl__28recus',4,$db).'</center></h3>',$annee_scolaire).$output,2);

$mpdf->Output('Recus'.$_GET['id'].'.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>