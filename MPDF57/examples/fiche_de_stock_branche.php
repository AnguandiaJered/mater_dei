<?php
session_start();
include('../../phpscript/classe_lib.php');
include('../../phpscript/connection.php');
$session_branche=$_SESSION['SUB_STORE'];
$db=db_connection();
if($_GET['product']=='all'){$ref='where date between "'.$_GET['from'].'" and "'.$_GET['to'].'" and branche_id="'.$session_branche.'"';}else
{$ref='where date between "'.$_GET['from'].'" and "'.$_GET['to'].'" and branche_id="'.$session_branche.'"';}
$header='<br>
<table width="100%">
<tr bgcolor="#94C6FC">
<th align="left">Date</th>
<th align="left">Produit</th>
<th align="left">Qté Initiale</th>
<th align="left">Entrée</th>
<th align="left">Sortie</th>
<th align="left">Qté Totale</th>
</tr>';
$footer='</table>';
$content='';
$db=$q=mysql_query("select * from  tbl__07sortie__depot ".$ref."") or die('Query Failed'.mysql_error());
while($row=mysql_fetch_array($q))
{
	$entree_id=$row['entree_id'];
	$produit_id=foreign_value('where entree_id="'.$entree_id.'"','tbl__06entree__depot',3,$db);
	$produit=foreign_value('where produit_id="'.$produit_id.'"','tbl__05produit',2,$db);
	if($_GET['product']!='all'){if($produit_id!=$_GET['product']){//skip row
	continue;}}
	$content.='
	<tr bgcolor="#D3FED1">
	<td>'.$row['date'].'</td>
	<td>'.$produit.'</th>
	<td>'.$row['qte__initiale'].'</td>
	<td>'.$row['qte'].'</thd>
	<td>0</thd>
	<td>'.($row['qte']+$row['qte__initiale']).'</thd>
	</tr>'.out_going_article($row[0],($row['qte']+$row['qte__initiale']),'tbl__08sortie__branche','where sortie_id="'.$row[0].'"',$produit,'','',0).'';
}
$pdf=$header.$content.$footer;
include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 = file_get_contents('../../retrieve/css-/stylesheets.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);

$mpdf->WriteHTML(header_top($db,'<h2>Fiche de Stock Branche '.foreign_value('where branche_id="'.$session_branche.'"','tbl__03branche',2,$db).'</h2>').$pdf,2);

$mpdf->Output('Fiche_de_stock_depot.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>