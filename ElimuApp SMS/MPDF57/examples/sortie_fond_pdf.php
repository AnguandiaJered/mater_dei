<?php
session_start();
include('../../phpscript/connection.php');
include('../../phpscript/classe_lib.php');
$db=db_connection();
$header='<span>Du: '.$_GET['from'].' Au: '.$_GET['to'].'</span>
<br/>
<table width="100%">
<tr bgcolor="#C4DBFF">
<th align="left">DATE</th>
<th align="left">LIBELLE LIGNE BUDGETAIRE</th>
<th align="left">LIBELLE</th>
<th align="left">QUANTITE</th>
<th align="left">PRIX UNITAIRE</th>
<th align="left">PREQUENCE</th>
<th align="left">MONTANT</th>

</tr>';
$queu=new accessories();
$q=mysql_query("select *from tbl__39sortie__des__fonds where projet_id='".$_GET['project']."'  and date between '".$_GET['from']."' and '".$_GET['to']."' order by date") or die("Query Failed".mysql_error());
$total=0;
while($row=mysql_fetch_array($q))
{
$total+=+($row['quantite']*$row['prix__unitaire']);
$content.='
<tr>
<td>'.$row['date'].'</td>
<td>'.foreign_value('where libelle_id="'.$row['libelle_id'].'"',' tbl__32libelle',5,$db).'</td>
<td>'.$row['libelle'].'</td>
<td>'.$row['quantite'].'</td>
<td>'.$row['prix__unitaire'].'</td>
<td>'.$row['frequence'].'</td>
<td align="right">'.($row['quantite']*$row['prix__unitaire']).'</td>
</tr>';
}
$footer='
<tr>
<td><strong>TOTAL</strong></td>
<td colspan="6" align="right"><strong>'.$total.'</strong></td>
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
$mpdf->WriteHTML(header_top($db,'<h2 style="text-transform:uppercase;"><center>SORTIE FOND PROJET '.foreign_value('WHERE projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',3,$db).'</center></h2>',$annee_scolaire).$output,2);

$mpdf->Output('sortie_fond_projet_'.foreign_value('where projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',3,$db).'.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>