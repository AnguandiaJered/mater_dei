<?php
session_start();
include('../../phpscript/connection.php');
include('../../phpscript/classe_lib.php');
$db=db_connection();
$header='<span>Du: '.$_GET['from'].' Au: '.$_GET['to'].'</span>
<br/>
<table width="100%" border="1">
<tr bgcolor="#C4DBFF">
<th align="left">LIBELLE</th>
<th align="left">MONTANT BUDGETISE</th>
<th align="left">CUMULE PERIODE ANTERIEURE</th>
<th align="left">CUMULE PERIODE ENCOURS</th>
<th align="left">CUMULE DEPENSE</th>
<th align="left">SOLDE BUDGET</th>
<th align="left">STATUT SOLDE BUDGET</th>
<th align="left">STATUT QUANTITE</th>
</tr>';
$queu=new accessories();
$q=mysql_query("select *from  tbl__32libelle WHERE projet_id='".$_GET['project']."'") or die("Query Failed".mysql_error());
#$q=mysql_query("select *from tbl__39sortie__des__fonds where projet_id='".$_GET['project']."'  and date between '".$_GET['from']."' and '".$_GET['to']."' order by date") or die("Query Failed".mysql_error());
$total_b=0;
$total_c=0;
$total_d=0;
$total_e=0;
$total_f=0;
$total_bb=0;
$total_cc=0;
$content='';
while($row=mysql_fetch_array($q))
{
$b=($row['quantite']*$row['prix__unitaire']*$row['nombre__pers']);
$bb=($row['quantite']*$row['nombre__pers']);
$d=sum_rows($db,'tbl__39sortie__des__fonds','quantite','prix__unitaire','where libelle_id="'.$row[0].'" and  date between "'.$_GET['from'].'" and "'.$_GET['to'].'" ');
$dd=foreign_value('where libelle_id="'.$row[0].'" order by 	sortie_fond_id	desc limit 1','tbl__39sortie__des__fonds',6,$db);
$c=(sum_rowsdate($db,'tbl__39sortie__des__fonds','quantite','prix__unitaire','frequence','where libelle_id="'.$row[0].'"  ','date',$_GET['from']));
#$cc=(sum_rows($db,'tbl__39sortie__des__fonds','quantite','prix__unitaire','where libelle_id="'.$row[0].'" and  date between "'.$_GET['from'].'" and "'.$_GET['to'].'" ')-$dd);
$cc=(sum_rowsone($db,'tbl__39sortie__des__fonds','quantite','where libelle_id="'.$row[0].'"'));
#$cc=(foreign_value('where libelle_id="'.$row[0].'" and  date between "'.$_GET['from'].'" and "'.$_GET['to'].'"','tbl__39sortie__des__fonds',6,$db)-$dd);

#$d=sum_rows($db,'tbl__39sortie__des__fonds','quantite','prix__unitaire','where libelle_id="'.$row[0].'" and  date between "'.date('Y-m-d').'" and "'.date('Y-m-d').'" ');
#$e=($c+$d);
$e=sum_rows3($db,'tbl__39sortie__des__fonds','quantite','prix__unitaire','frequence','where libelle_id="'.$row[0].'"');
$f=($b-$e);
$total_b+=+$b;
$total_c+=+$c;
$total_d+=+$d;
$total_e+=+$e;
$total_f+=+$f;
$total_bb+=+$bb;
$total_cc+=+$cc;
$percentage=(($e*100)/$b);
$sq=(($cc*100)/$bb);
if($percentage<100)
{
	$color='yellow';
	$message='Excedent';
}
else if($percentage==100)
{
	$color='white';
	$message='Excedent';
}else if($percentage>100)
{
	$color='red';
	$message='Normal';
}
//
if($sq<100)
{
	$colorr='yellow';
	$messager='Excedent';
}
else if($sq==100)
{
	$colorr='white';
	$messager='Excedent';
}else if($sq>100)
{
	$colorr='red';
	$messager='Normal';
}
$content.='
<tr>
<td>'.$row['numero__de__la__depense'].'&nbsp;'.$row['description__de__la__depense'].'</td>
<td>'.$b.'</td>
<td>'.$c.'</td>
<td>'.$d.'</td>
<td>'.$e.'</td>
<td>'.$f.'</td>
<td style="background-color:'.$color.'" align="right">'.round($percentage,2).'</td>
<td style="background-color:'.$colorr.'" align="right">'.round($sq,2).'</td>
</tr>';
}
$footer='
<tr>
<td><strong>TOTAL</strong></td>
<td><strong>'.$total_b.'</strong></td>
<td><strong>'.$total_c.'</strong></td>
<td><strong>'.$total_d.'</strong></td>
<td><strong>'.$total_e.'</strong></td>
<td><strong>'.$total_f.'</strong></td>
<td align="right">'.round((($total_d*100)/$total_b),2).'<strong></strong></td>
<td align="right">&nbsp;</td>
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
$mpdf->WriteHTML(header_top($db,'<h2 style="text-transform:uppercase;"><center>SUIVIE BUDGETAIRE PROJET '.foreign_value('WHERE projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',3,$db).'</center></h2>',$annee_scolaire).$output,2);

$mpdf->Output('suivie_fond_projet_'.foreign_value('where projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',3,$db).'.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>