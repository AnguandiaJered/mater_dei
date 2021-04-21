<?php
session_start();
include('../../phpscript/classe_lib.php');
include('../../phpscript/connection.php');
$db=db_connection();
if($_GET['product']=='all'){$ref='where date between "'.$_GET['from'].'" and "'.$_GET['to'].'"';}else{$ref='where produit_id="'.$_GET['product'].'" and date between "'.$_GET['from'].'" and "'.$_GET['to'].'"';}
$header='<br>
<table width="100%">
<tr bgcolor="#94C6FC">
<th align="left">Date</th>
<th align="left">Produit</th>
<th align="left">Qté Initiale</th>
<th align="left">Entrée</th>
<th align="left">Sortie</th>
<th align="left">Qté Totale</th>
<th align="left">PAU</th>
<th align="left">PVU</th>
<th align="left">Gain</th>
</tr>';
$footer='</table>';
$content='';
$my_total='';                                         
$db=$q=mysql_query("select * from  tbl__06entree__depot ".$ref."") or die('Query Failed'.mysql_error());
while($row=mysql_fetch_array($q))
{
	$content.='
	<tr bgcolor="#D3FED1">
	<td>'.$row['date'].'</td>
	<td>'.foreign_value('where produit_id="'.$row['produit_id'].'"','tbl__05produit',2,$db).'</thd>
	<td>'.$row['qte__initiale'].'</td>
	<td>'.$row['qte'].'</thd>
	<td>0</td>
	<td>'.($row['qte__initiale']+$row['started__qte']).'</thd>
	<td>'.$row['prix__d666achat'].'</thd>
	<td>'.$row['prix__de__vente'].'</thd>
	<td>'. ((($row['qte__initiale']+$row['started__qte'])*$row['prix__de__vente'])-(($row['qte__initiale']+$row['started__qte'])*$row['prix__d666achat'])).'</thd>
	</tr>'.out_going_article($row[0],($row['qte__initiale']+$row['started__qte']),'tbl__07sortie__depot','where entree_id="'.$row[0].'"',foreign_value('where produit_id="'.$row['produit_id'].'"','tbl__05produit',2,$db),$row['prix__d666achat'],$row['prix__de__vente'],1).'';
	$my_total+=+out_going_article($row[0],($row['qte__initiale']+$row['started__qte']),'tbl__07sortie__depot','where entree_id="'.$row[0].'"',foreign_value('where produit_id="'.$row['produit_id'].'"','tbl__05produit',2,$db),$row['prix__d666achat'],$row['prix__de__vente'],'return_total');
}
$pdf=$header.$content.'
<tr>
<td colspan="8" bgcolor="#C4DBFF">Total</td>
<td>'.$my_total.'</td>
</tr>
'.$footer.mydepense($my_total,$db,'tbl__21depenses', 'where date between "'.$_GET['from'].'" and "'.$_GET['to'].'"');
include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 = file_get_contents('../../retrieve/css-/stylesheets.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);

$mpdf->WriteHTML(header_top($db,'<h2>Fiche de Stock Depot</h2>').$pdf,2);

$mpdf->Output('Fiche_de_stock_depot.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>