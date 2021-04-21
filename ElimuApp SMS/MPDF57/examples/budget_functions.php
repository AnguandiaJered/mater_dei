<?php
function generate_budget($db,$projet_id,$adjust)
{
	$header='<table width="100%" border="1">
	<tr  style="background-color:#C4DBFF">
	<th colspan="10">Budget détaillé</th>
	</tr>
	<tr style="background-color:#E8E8E8">
	<th>N° de depense</th>
	<th>Description de la depense</th>
	<th>Unité</td>
	<th>Nb Pers</td>
	<th>Quantité/Nb Jour/Nb Mois/Freq</th>
	<th>Prix/coût unitaire</td>
	<th>Montant total</td>
	<th>Participation Locale</td>
	<th>Contribution du baleur</td>
	<th>Commentaires et clarifications</th>
	</tr>'.resultat($db,$projet_id,$adjust);
	$footer='</table>';
	return $header.$footer;
}
function resultat($db,$projet_id,$adjust)
{
	$content='';
	$j=0;
	$db=$q=mysql_query("select * from  tbl__21resultat where projet_id='".$projet_id."'") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($q))
	{
		$j++;
		$content.=produit($db,$row[0],$projet_id,$j,$adjust);
	}
	if($adjust==1){$link='|<a  rel="facebox" href="plan_de_tresorie2.php?projet_id='.$projet_id.'">(Pland encaissement)</a>';}else{$link='';}
	return $content.'<tr style="background-color:#D0E2FD">
	<td colspan="6"><strong>TOTAL DU PROJET</strong>'.$link.'</td>
	<td align="right"><strong>'. sum_rowsfour($db,' tbl__32libelle','unite','nombre__pers','quantite','prix__unitaire','where projet_id="'.$projet_id.'"').'</strong></td>
	<td align="right"><strong>'.sum_rowsone($db,'tbl__32libelle','participation_locale','where projet_id="'.$projet_id.'"').'</strong></td>
	<td align="right"><strong>'.sum_rowsone($db,'tbl__32libelle','contribution_du_baileur','where projet_id="'.$projet_id.'"').'</strong></td>
	<td></td>
	</tr>';
}
function produit($db,$resultat_id,$projet_id,$resultat_range,$adjust)
{
	$content='';
	$j=0;
	$db=$q=mysql_query("select * from   tbl__22produit  where resultat_id='".$resultat_id."'") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($q))
	{
		$j++;
		$content.='<tr style="background-color:#FEE34B"><td>'.$resultat_range.'.'.$j.'&nbsp;Produit</td>
		<td colspan="6">'.$row['produit'].'</td>
		<td colspan="3"></td>
		</tr>'.activite($db,$row[0],$resultat_range.'.'.$j,$adjust);
	}
	return $content;
}
function activite($db,$produit_id,$produit_range_code,$adjust)
{
	$content='';
	
	$j=0;
	$db=$q=mysql_query("select * from   tbl__23activite  where produit_id='".$produit_id."'") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($q))
	{
		$j++;
	
		$content.='<tr style="background-color:#FFF088"><td>'.$produit_range_code.'.'.$j.'&nbsp;'.$row['activite'].'</td>
		<td colspan="6">'.$row['activite'].'</td>
		<td colspan="3"></td>
		</tr>'.libelle($db,$row[0],$produit_range_code.'.'.$j,$adjust);
	}
	return $content.'<tr style="background-color:#F8ADAB">
	<td colspan="6"><strong>TOTAL DE PRODUIT </strong>'.$produit_range_code.'</td>
	<td align="right"><strong>'. sum_rowsfour($db,' tbl__32libelle','unite','nombre__pers','quantite','prix__unitaire','where produit_id="'.$produit_id.'"').'</strong></td>
	<td align="right"><strong>'.sum_rowsone($db,'tbl__32libelle','participation_locale','where produit_id="'.$produit_id.'"').'</strong></td>
	<td align="right"><strong>'.sum_rowsone($db,'tbl__32libelle','contribution_du_baileur','where produit_id="'.$produit_id.'"').'</strong></td>
	<td></td>
	</tr>';
}
function libelle($db,$activite_id,$activite_range_code,$adjust)
{
	$content='';
	$big_total_libelle=0;
	$tpl=0;
	$tcb=0;
	$j=0;
	$db=$q=mysql_query("select * from   tbl__32libelle  where activite_id='".$activite_id."'") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($q))
	{
		#$total_libelle=($row['unite']*$row['nombre__pers']*$row['quantite']*$row['prix__unitaire']);
			if($adjust==1){$link='<a  rel="facebox" href="plan_de_tresorie.php?libelle_id='.$row[0].'&projet_id='.$row['projet_id'].'&activite_id='.$row['activite_id'].'">(Pland de Decaissement)</a>';}else{$link='';}
		$total_libelle=($row['nombre__pers']*$row['quantite']*$row['prix__unitaire']);
		$big_total_libelle+=+$total_libelle;
		$tcb+=+$row['contribution_du_baileur'];
		$tpl+=+$row['participation_locale'];
		$j++;
		$content.='<tr style="background-color:#FFFFFF"><td>'.$activite_range_code.'.'.$j.'&nbsp;Activité &nbsp;'.$link.'</td>
		<td>'.$row['description__de__la__depense'].'</td>
		<td align="right">'.$row['unite'].'</td>
		<td align="right">'.$row['nombre__pers'].'</td>
		<td align="right">'.$row['quantite'].'</td>
		<td align="right">'.$row['prix__unitaire'].'</td>
		<td align="right">'.$total_libelle.'</td>
		<td align="right">'.$row['participation_locale'].'</td>
		<td align="right">'.$row['contribution_du_baileur'].'</td>
		<td>'.$row['commentaire'].'</td>
		</tr>';#.titre_2($db,$row[0]);
	}
	return $content.'
	<tr style="background-color:#D89E96">
	<td style="background-color:white;"></td>
	<td colspan="5"><strong>Sous-total Activite '.$activite_range_code.'</strong></td>
	<td align="right"><strong>'.$big_total_libelle.'</strong></td>
	<td align="right">'.$tpl.'</td>
	<td align="right">'.$tcb.'</td>
	<td></td>
	</tr>';
}
function titre_2($db,$titre_1_id)
{
	$content_2='';
	$j2=0;
	$db=$q2=mysql_query("select * from   tbl__31titre2 where titre1_id='".$titre_1_id."'") or die("Query Failed".mysql_error());
	while($row2=mysql_fetch_array($q2))
	{
		$j2++;
		$content_2.='<tr style="background-color:#CEE7FF"><td colspan="5">'.$row2['titre2'].'</td>'.titre_3($db,$row2[0]).'</tr>';
	}
	return $content_2.'<tr><td><strong>Total (B)</strong></td><td colspan="4" align="right"><strong>'.sum_rows($db,'tbl__32libelle','quantite','unitaire','where titre1_id="'.$titre_1_id.'"').'</strong></td></tr>';
}
function titre_3($db,$titre_2_id)
{
	$content_3='';
	$total_3=0;
	$j2=0;
	$db=$q3=mysql_query("select * from   tbl__32libelle where titre2_id	='".$titre_2_id."'") or die("Query Failed".mysql_error());
	while($row3=mysql_fetch_array($q3))
	{
		$j2++;
		$content_3.='<tr>
		<td>'.$row3['libelle'].'</td>
		<td>'.$row3['quantite'].'</td>
		<td>'.$row3['frequence'].'</td>
		<td>'.$row3['unitaire'].'</td>
		<td align="right">'.($row3['quantite']*$row3['unitaire']).'</td>
		</tr>';
		$total_3+=+($row3['quantite']*$row3['unitaire']);
	}
	return $content_3.'<tr><td><strong>Total (A)</strong></td><td colspan="4" align="right"><strong>'.$total_3.'</strong></td></tr>';
}
?>