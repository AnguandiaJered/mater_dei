<?php
session_start();
include('../../phpscript/connection.php');
include('../../phpscript/classe_lib.php');
$db=db_connection();
$header='<span>Du: '.$_GET['from'].' Au: '.$_GET['to'].'</span>
<br/>
<table width="100%">
<tr bgcolor="#C4DBFF">
<th align="left">Date de la demande de fonds</th>
<th align="left">Date de reception de fonds</th>
<th align="left">Echeance de justification de fonds</th>
<th align="left">Libellé</th>
<th align="left">Montant</th>
<th align="left">Source</th>
<th align="left">Detail du compte bancaire</th>

</tr>';
$queu=new accessories();
$q=mysql_query("select *from tbl__38entree__des__fonds where projet_id='".$_GET['project']."'  and date__de__reception__de__fonds between '".$_GET['from']."' and '".$_GET['to']."' order by date__de__reception__de__fonds") or die("Query Failed".mysql_error());
$total=0;
while($row=mysql_fetch_array($q))
{
$total+=+$row['montant'];
$content.='
<tr>
<td>'.$row['date__de__la__demande__de__fonds'].'</td>
<td>'.$row['date__de__reception__de__fonds'].'</td>
<td>'.$row['echeance__de__justification__de__fonds'].'</td>
<td>'.$row['libelle'].'</td>
<td align="right">'.$row['montant'].'</td>
<td>'.$row['source'].'</td>
<td>'.$row['details__du__compte__bancaire'].'</td>
</tr>';
}
$footer='
<tr>
<td><strong>TOTAL</strong></td>
<td colspan="4" align="right"><strong>'.$total.'</strong></td>
</tr>
</table>';
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
$mpdf->WriteHTML(header_top($db,'<h2 style="text-transform:uppercase;"><center>ENTREE FOND PROJET '.foreign_value('WHERE projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',3,$db).'</center></h2>',$annee_scolaire).$output,2);

$mpdf->Output('entree_fond_projet_'.foreign_value('where projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',3,$db).'.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>