<?php
function main_func($db,$projet_id)
{
	$header='<table width="100%">
	<tr bgcolor="yellow">
	<th align="center" colspan="5">CADRE LOGIQUE</th>
	</tr>
	<tr bgcolor="#C4DBFF">
	<th align="justify" colspan="5">Titre Projet:</th>
	</tr>
	<tr bgcolor="#C4DBFF">
	<th align="justify" colspan="5">Objectif Global :
	';
	$content='';
	$db=$q=mysql_query("select * from tbl__20impact where projet_id='".$projet_id."'") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($q))
	{
		$content.='
		'.$row['impact'].'</th></tr>
		<tr bgcolor="gray">
<th>Résultat Attendus</th>
<th>Indicateurs</th>
<th>Cible</th>
<th>Source de verification</th>
<th>Hypothese/Risques</th>
		</tr>
		</tr>'.resultat($db,$row[0]);
	}
	$footer='</table>';
	return $header.$content.$footer;
}
function resultat($db,$id)
{
	$content='';
	$j=0;
	$db=$qe=mysql_query("select * from  tbl__21resultat where impact_id='".$id."'") or die("Query Failed".mysql_error());
	while($rowe=mysql_fetch_array($qe))
	{
		$j++;
		if($j==1)
		{
			$content='<tr bgcolor="#D3FED1">
		<th align="left" colspan="5">RESULTAT</th>
		</tr>
			<tr bgcolor="#D3FED1">
		<td>Resultat '.$j.' : '.$rowe['resultat'].'</td>
		<td>'.$rowe['indicateurs'].'</td>
		<td>Cible: '.$rowe['cible']. '</td>
		<td>'.$rowe['sources__de__verification'].'</td>
		<td>'.$rowe['hypotheses__risques'].'</td>
		</tr>'.produit($db,$rowe[0],$j);
		}
		else
		{
		$content.='<tr bgcolor="#D3FED1">
		<td>Resultat '.$j.' : '.$rowe['resultat'].'</td>
		<td>'.$rowe['indicateurs'].'</td>
		<td>Cible: '.$rowe['cible']. '</td>
		<td>'.$rowe['sources__de__verification'].'</td>
		<td>'.$rowe['hypotheses__risques'].'</td>
		</tr>'.produit($db,$rowe[0],$j);
		}
	}
	return $content;
}

function produit($db,$resultat_id,$resultat_range)
{
	$contentp='';
	$j=0;
	$db=$qp=mysql_query("select * from  tbl__22produit where resultat_id='".$resultat_id."' ") or die("Query Failed".mysql_error());
	while($rowp=mysql_fetch_array($qp))
	{
		$j++;
		if($j==1)
		{
			$contentp='<tr  bgcolor="#FEE6E2">
		<th align="left" colspan="5">PRODUIT</th>
		</tr>
			<tr bgcolor="#FEE6E2">
		<td >Produit '.$resultat_range.'.'.$j.' : '.$rowp['produit'].'<br></td>
		<td>'.$rowp['indicateurs'].'</td>
		<td>'.$rowp['cible']. '</td>
		<td>'.$rowp['sources__de__verification'].'</td>
		<td>'.$rowp['hypotheses__risques'].'</td>
		</tr>'.activite($db,$rowp[0],$resultat_range.'.'.$j);
		}
		else
		{
		$contentp.='<tr bgcolor="#FEE6E2">
		<td>Produit '.$resultat_range.'.'.$j.': '.$rowp['produit'].'<br></td>
		<td>'.$rowp['indicateurs'].'</td>
		<td>'.$rowp['cible']. '</td>
		<td>'.$rowp['sources__de__verification'].'</td>
		<td> | hypotheses Risques: '.$rowp['hypotheses__risques'].'</td>
		</tr>'.activite($db,$rowp[0],$resultat_range.'.'.$j);
		}
	}
	return $contentp;
}
function activite($db,$produit_id,$produit_range_code)
{
	$contentp='';
	$j=0;
	$db=$qp=mysql_query("select * from   tbl__23activite where produit_id='".$produit_id."' ") or die("Query Failed".mysql_error());
	while($rowa=mysql_fetch_array($qp))
	{
		$j++;
		if($j==1)
		{
			$contentp='<tr  bgcolor="#FEE6E2">
		<th align="left" colspan="5">ACTIVITE</th>
		</tr>
			<tr bgcolor="#DAE9FE">
		<td colspan="5">Activite '.$produit_range_code.'.'.$j.':'.$rowa['activite'].' </td>
		
		</tr>';#'.hypothese($db,$rowp[0]);
		}
		else
		{
		$contentp.='<tr bgcolor="#DAE9FE">
		<td colspan="5">Activite '.$produit_range_code.'.'.$j.':'.$rowa['activite'].' </td>
		
		</tr>';#.hypothese($db,$rowp[0]);
		}
	}
	return $contentp;
}

/*
function hypothese($db,$prod_id)
{
	$contenth='';
	$j=0;
	$db=$qh=mysql_query("select * from  tbl__23hypothese where produit_id='".$prod_id."' ") or die("Query Failed".mysql_error());
	while($rowh=mysql_fetch_array($qh))
	{
		$j++;
		if($j==1)
		{
			$contenth='<tr  bgcolor="#FFFBEA">
		<th align="left">HYPOTHESE</th>
		</tr>
			<tr bgcolor="#FFFBEA">
		<td>'.$rowh['hypothese'].'</td>
		</tr>'.risque($db,$rowh[0]);
		}
		else
		{
		$contenth.='<tr bgcolor="#FFFBEA">
		<td>'.$rowh['hypothese'].'</td>
		</tr>'.risque($db,$rowh[0]);
		}
	}
	return $contenth;
}

function risque($db,$hyp_id)
{
	$contentr='';
	$j=0;
	$db=$qr=mysql_query("select * from  tbl__24risque where hypothese_id='".$hyp_id."' ") or die("Query Failed".mysql_error());
	while($rowr=mysql_fetch_array($qr))
	{
		$j++;
		if($j==1)
		{
			$contentr='<tr  bgcolor="#FADBFD">
		<th align="left">RISQUE</th>
		</tr>
			<tr bgcolor="#FADBFD">
		<td>'.$rowr['risque'].'</td>
		</tr>'.resultat($db,$rowr[0]);
		}
		else
		{
		$contentr.='<tr bgcolor="#FADBFD">
		<td>'.$rowr['risque'].'</td>
		</tr>'.resultat($db,$rowr[0]);
		}
	}
	return $contentr;
}
function resultat($db,$risque_id)
{
	$contentrt='';
	$j=0;
	$db=$qrt=mysql_query("select * from  tbl__25resultat where risque_id='".$risque_id."' ") or die("Query Failed".mysql_error());
	while($rowrt=mysql_fetch_array($qrt))
	{
		$j++;
		if($j==1)
		{
			$contentrt='<tr  bgcolor="#FFC5A8">
		<th align="left">RESULTAT</th>
		</tr>
			<tr bgcolor="#FFC5A8">
		<td>'.$rowrt['resultat'].'</td>
		</tr>';
		}
		else
		{
		$contentrt.='<tr bgcolor="#FFC5A8">
		<td>'.$rowrt['resultat'].'</td>
		</tr>';
		}
	}
	return $contentrt;
}
*/
?>