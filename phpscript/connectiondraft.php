<?php 
include('define.php');
function get_last_id2($db,$table,$id_flord,$output,$ref)
{
	$db=$q=mysql_query("select * from ".$table." ".$ref." order by ".$id_flord." desc") or die("Query Failed".mysql_error());
	$row=mysql_fetch_array($q);
	return $row[$output];
}
function get_last_id($db,$table,$id_fl,$ref)
{
	$db=$q=mysql_query("select * from ".$table." ".$ref." order by ".$id_fl." desc") or die("Query Failed".mysql_error());
	$row=mysql_fetch_array($q);
	return $row[$id_fl];
}
function notifications($db,$session)
{
	include_once('class_replacer.php');
	$a='Mr,vient,de vous';
	$b='Vous Mr,vous avez,&nbsp;';
	if($_SESSION['DESIGNATION']=='admin'){$session='admin';}else{$session=$session;}
	$content='';
	$db=$q=mysql_query("select * from  tbl__44notifications where to_user_id='".$session."' or from_user_id='".$session."' order by notification_id desc") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($q))
	{
		$replacer=new replace_object($a,$b,$row['notification'].' le '.$row['date'],',');
		if($row['from_user_id']==$session){
			
			
			$content.='<a href="notifications.php?type='.$row['type'].'&data_id='.$row['data_id'].'&user_id='.$row['from_user_id'].'&date='.$row['date'].'&notif='.$replacer->get_output().'" rel="facebox">'.$replacer->get_output().'</a><br>';}
		else
		{
		$content.='<a href="notifications.php?type='.$row['type'].'&data_id='.$row['data_id'].'&user_id='.$row['from_user_id'].'&date='.$row['date'].'&notif='.$row['notification'].'" rel="facebox">'.$row['notification'].'</a><br>';
		}
	}
	return $content;
}
function chrono_msave($db,$action,$amonth,$bmonth,$savior_id,$activite,$projet_id,$ay,$by)
{
	$j=0;
	$num='';
	if($amonth<10)
	{
		$amonth=str_replace('0','',$amonth);
	}
	else
	{
		$amonth=$amonth;
	}
	if($bmonth<10)
	{
		$bmonth=str_replace('0','',$bmonth);
	}
	else
	{
		$bmonth=$bmonth;
	}
	
	for($i=$amonth; $i<$bmonth;$i++)
	{
		
	$j++;
	$cal=($bmonth-$j);
	if($cal<10)
	{
		$cal='0'.$cal;
		}
	else
	{
		$cal=$cal;
	}
	#$num.=($savior_id.',');
	$db=$insert=mysql_query("insert into tbl__33chronogramme  set a_mois='$cal',a_annee='$ay',b_annee='$bmonth',activite_id='$activite',projet_id='".$projet_id."',savior_id='".$savior_id."'") or die("Query Failed".$error());
	}
	return ($num);
}
function duplicate_15_100($db,$case,$activite_id,$from,$to,$color_id)
{
	$content='';
	$tja=0;
	if($to=='exec')
	{
		$begin=2015;$end=2100;
	}
	else
	{
		$begin=$from; $end=$to;
	}
	$j=0;
	for($i=$begin;$i<=$end;$i++)
	{
		$j++;
		if($case=='y')
		{
			if($j==1)
			{
			$content.=' <td colspan="15"><strong>'.$i.'</strong></td>';
			}else
			{
			$content.=' <td colspan="12"><strong>'.$i.'</strong></td>';	
			}
		}
		else if($case=='m')
		{
			if($j==1)
			{
	$before='<td>Budget</td>
	<td>Depenses</td>
	<td>Solde</td>';
			}else
			{
				$before='';
			}
		
			
			$content.=$before.'
	
	<td>'.get_moth_word(1,'fr').'</td>
    <td>'.get_moth_word(2,'fr').'</td>
    <td>'.get_moth_word(3,'fr').'</td>
    <td>'.get_moth_word(4,'fr').'</td>
    <td>'.get_moth_word(5,'fr').'</td>
    <td>'.get_moth_word(6,'fr').'</td>
    <td>'.get_moth_word(7,'fr').'</td>
    <td>'.get_moth_word(8,'fr').'</td>
    <td>'.get_moth_word(9,'fr').'</td>
    <td>'.get_moth_word(10,'fr').'</td>
    <td>'.get_moth_word(11,'fr').'</td>
    <td>'.get_moth_word(12,'fr').'</td>';
		}
		else if($case=='m2')
		{
			if($j==1)
			{
	$before='<td>Budget</td>
	<td>Montant recus</td>
	<td>Solde</td>';
			}else
			{
				$before='';
			}
		
			
			$content.=$before.'   

	
	<td>'.get_moth_word(1,'fr').'</td>
    <td>'.get_moth_word(2,'fr').'</td>
	<td>'.get_moth_word(3,'fr').'</td>
    <td>'.get_moth_word(4,'fr').'</td>
    <td>'.get_moth_word(5,'fr').'</td>
    <td>'.get_moth_word(6,'fr').'</td>
    <td>'.get_moth_word(7,'fr').'</td>
    <td>'.get_moth_word(8,'fr').'</td>
    <td>'.get_moth_word(9,'fr').'</td>
    <td>'.get_moth_word(10,'fr').'</td>
    <td>'.get_moth_word(11,'fr').'</td>
    <td>'.get_moth_word(12,'fr').'</td>';
		}
		else if($case=='data')
		{
			$content.='
	<td style="background-color:'.time_chrono($db,$activite_id,01,$i,$color_id).'">&nbsp;</td>
    <td style="background-color:'.time_chrono($db,$activite_id,02,$i,$color_id).'">&nbsp;</td>
    <td style="background-color:'.time_chrono($db,$activite_id,03,$i,$color_id).'">&nbsp;</td>
   <td style="background-color:'.time_chrono($db,$activite_id,04,$i,$color_id).'">&nbsp;</td>
     <td style="background-color:'.time_chrono($db,$activite_id,05,$i,$color_id).'">&nbsp;</td>
    <td style="background-color:'.time_chrono($db,$activite_id,06,$i,$color_id).'">&nbsp;</td>
    <td style="background-color:'.time_chrono($db,$activite_id,07,$i,$color_id).'">&nbsp;</td>
     <td style="background-color:'.time_chrono($db,$activite_id,8,$i,$color_id).'">&nbsp;</td>
     <td style="background-color:'.time_chrono($db,$activite_id,9,$i,$color_id).'">&nbsp;</td>
    <td style="background-color:'.time_chrono($db,$activite_id,10,$i,$color_id).'">&nbsp;</td>
    <td style="background-color:'.time_chrono($db,$activite_id,11,$i,$color_id).'">&nbsp;</td>
     <td style="background-color:'.time_chrono($db,$activite_id,12,$i,$color_id).'">&nbsp;</td>';
		}
		else if($case=='data2')
		{
			$per=foreign_value('where libelle_id="'.$activite_id.'"','tbl__32libelle',7,$db);
			$prixu=foreign_value('where libelle_id="'.$activite_id.'"','tbl__32libelle',9,$db);
			$qte=foreign_value('where libelle_id="'.$activite_id.'"','tbl__32libelle',8,$db);
			$budget=($per*$prixu*$qte);
			$cumule=sum_rows3($db,'tbl__39sortie__des__fonds','quantite','prix__unitaire','frequence','where libelle_id="'.$activite_id.'"');
			if($j==1)
			{
				$before='<td bgcolor="#F7FCBA">'.$budget.'</td>
	<td bgcolor="#F7FCBA">'.$cumule.'</td>
	<td bgcolor="#F7FCBA">'.($budget-$cumule).'</td>';
			}else
			{
				$before='';
			}
			$content.=$before.'
	
	<td>&nbsp;'.((sum_rowsone($db,'tbl__48libelle__tresorerie','quantite','where libelle_id="'.$activite_id.'" and mois=1 and annee="'.$i.'"')*$per)*$prixu).'</td>
    <td >'.((sum_rowsone($db,'tbl__48libelle__tresorerie','quantite','where libelle_id="'.$activite_id.'" and mois=2 and annee="'.$i.'"')*$per)*$prixu).'</td>
    <td>'.((sum_rowsone($db,'tbl__48libelle__tresorerie','quantite','where libelle_id="'.$activite_id.'" and mois=3 and annee="'.$i.'"')*$per)*$prixu).'</td>
   <td >'.((sum_rowsone($db,'tbl__48libelle__tresorerie','quantite','where libelle_id="'.$activite_id.'" and mois=4 and annee="'.$i.'"')*$per)*$prixu).'</td>
     <td>'.((sum_rowsone($db,'tbl__48libelle__tresorerie','quantite','where libelle_id="'.$activite_id.'" and mois=5 and annee="'.$i.'"')*$per)*$prixu).'</td>
    <td>'.((sum_rowsone($db,'tbl__48libelle__tresorerie','quantite','where libelle_id="'.$activite_id.'" and mois=6 and annee="'.$i.'"')*$per)*$prixu).'</td>
    <td>'.((sum_rowsone($db,'tbl__48libelle__tresorerie','quantite','where libelle_id="'.$activite_id.'" and mois=7 and annee="'.$i.'"')*$per)*$prixu).'</td>
     <td>'.((sum_rowsone($db,'tbl__48libelle__tresorerie','quantite','where libelle_id="'.$activite_id.'" and mois=8 and annee="'.$i.'"')*$per)*$prixu).'</td>
     <td>'.((sum_rowsone($db,'tbl__48libelle__tresorerie','quantite','where libelle_id="'.$activite_id.'" and mois=9 and annee="'.$i.'"')*$per)*$prixu).'</td>
    <td>'.((sum_rowsone($db,'tbl__48libelle__tresorerie','quantite','where libelle_id="'.$activite_id.'" and mois=10 and annee="'.$i.'"')*$per)*$prixu).'</td>
    <td>'.((sum_rowsone($db,'tbl__48libelle__tresorerie','quantite','where libelle_id="'.$activite_id.'" and mois=11 and annee="'.$i.'"')*$per)*$prixu).'</td>
     <td>'.((sum_rowsone($db,'tbl__48libelle__tresorerie','quantite','where libelle_id="'.$activite_id.'" and mois=12 and annee="'.$i.'"')*$per)*$prixu).'</td>';
		}
		else if($case=='data3')
		{
			if($color_id==1){$sum='participation_locale';}else if($color_id==2){$sum='contribution_du_baileur';}else{$sum='commentaire';}
			$per=foreign_value('where libelle_id="'.$activite_id.'"','tbl__32libelle',7,$db);
			$prixu=foreign_value('where libelle_id="'.$activite_id.'"','tbl__32libelle',9,$db);
			$qte=foreign_value('where libelle_id="'.$activite_id.'"','tbl__32libelle',8,$db);
			$budget=sum_rowsone($db,'tbl__32libelle',$sum,'where projet_id="'.$activite_id.'"');
			$cumule=sum_rowsone($db,'tbl__38entree__des__fonds','montant','where source__financement_id="'.$color_id.'"');
			if($j==1)
			{
				$before='<td bgcolor="#F7FCBA">'.$budget.'</td>
	<td bgcolor="#F7FCBA">'.$cumule.'</td>
	<td bgcolor="#F7FCBA">'.($budget-$cumule).'</td>';
			}else
			{
				$before='';
			}
			$content.=$before.'
	
	<td>&nbsp;'.sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id="'.$color_id.'" and annee="'.$i.'" and mois=1').'</td>
    <td >'.sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id="'.$color_id.'" and annee="'.$i.'"  and mois=2').' </td>
    <td>'.sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id="'.$color_id.'" and annee="'.$i.'"  and mois=3').'</td>
   <td>'.sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id="'.$color_id.'" and annee="'.$i.'"  and mois=4').'</td>
     <td>'.sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id="'.$color_id.'" and annee="'.$i.'"  and mois=5').'</td>
    <td>'.sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id="'.$color_id.'" and annee="'.$i.'"  and mois=6').'</td>
    <td>'.sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id="'.$color_id.'" and annee="'.$i.'"  and mois=7').'</td>
     <td>'.sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id="'.$color_id.'" and annee="'.$i.'"  and mois=8').'</td>
     <td>'.sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id="'.$color_id.'" and annee="'.$i.'"  and mois=9').'</td>
    <td>'.sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id="'.$color_id.'" and annee="'.$i.'"  and mois=10').'</td>
    <td>'.sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id="'.$color_id.'" and annee="'.$i.'"  and mois=11').'</td>
     <td>'.sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id="'.$color_id.'" and annee="'.$i.'"  and mois=12').'</td>';
		}
		
		else if($case=='data4')
		{
			if($color_id==1){$sum='participation_locale';}else if($color_id==2){$sum='contribution_du_baileur';}else{$sum='commentaire';}
			$per=foreign_value('where libelle_id="'.$activite_id.'"','tbl__32libelle',7,$db);
			$prixu=foreign_value('where libelle_id="'.$activite_id.'"','tbl__32libelle',9,$db);
			$qte=foreign_value('where libelle_id="'.$activite_id.'"','tbl__32libelle',8,$db);
			$budget=(sum_rowsone($db,'tbl__32libelle','participation_locale','where projet_id="'.$activite_id.'"')+sum_rowsone($db,'tbl__32libelle','contribution_du_baileur','where projet_id="'.$activite_id.'"'));
			$cumule=(sum_rowsone($db,'tbl__38entree__des__fonds','montant','where source__financement_id=1')+sum_rowsone($db,'tbl__38entree__des__fonds','montant','where source__financement_id=2')+sum_rowsone($db,'tbl__38entree__des__fonds','montant','where source__financement_id=3'));
			if($j==1)
			{
				$before='<td bgcolor="#F7FCBA">'.$budget.'</td>
	<td bgcolor="#F7FCBA">'.$cumule.'</td>
	<td bgcolor="#F7FCBA">'.($budget-$cumule).'</td>';
			}else
			{
				$before='';
			}
			$content.=$before.'
	
	<td>&nbsp;'.(sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=1 and annee="'.$i.'" and mois=1')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=2 and annee="'.$i.'" and mois=1')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=3 and annee="'.$i.'" and mois=1')).'</td>
	
	<td>&nbsp;'.(sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=1 and annee="'.$i.'" and mois=2')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=2 and annee="'.$i.'" and mois=2')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=3 and annee="'.$i.'" and mois=2')).'</td>
	
	<td>&nbsp;'.(sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=1 and annee="'.$i.'" and mois=3')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=2 and annee="'.$i.'" and mois=3')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=3 and annee="'.$i.'" and mois=3')).'</td>
	
	<td>&nbsp;'.(sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=1 and annee="'.$i.'" and mois=4')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=2 and annee="'.$i.'" and mois=4')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=3 and annee="'.$i.'" and mois=4')).'</td>
	
	<td>&nbsp;'.(sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=1 and annee="'.$i.'" and mois=5')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=2 and annee="'.$i.'" and mois=5')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=3 and annee="'.$i.'" and mois=5')).'</td>
	
	<td>&nbsp;'.(sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=1 and annee="'.$i.'" and mois=6')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=2 and annee="'.$i.'" and mois=6')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=3 and annee="'.$i.'" and mois=6')).'</td>
	
	<td>&nbsp;'.(sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=1 and annee="'.$i.'" and mois=7')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=2 and annee="'.$i.'" and mois=7')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=3 and annee="'.$i.'" and mois=7')).'</td>
	
	<td>&nbsp;'.(sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=1 and annee="'.$i.'" and mois=8')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=2 and annee="'.$i.'" and mois=8')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=3 and annee="'.$i.'" and mois=8')).'</td>
	
	<td>&nbsp;'.(sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=1 and annee="'.$i.'" and mois=9')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=2 and annee="'.$i.'" and mois=9')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=3 and annee="'.$i.'" and mois=9')).'</td>
	
	<td>&nbsp;'.(sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=1 and annee="'.$i.'" and mois=10')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=2 and annee="'.$i.'" and mois=10')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=3 and annee="'.$i.'" and mois=10')).'</td>
	
	<td>&nbsp;'.(sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=1 and annee="'.$i.'" and mois=11')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=2 and annee="'.$i.'" and mois=11')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=3 and annee="'.$i.'" and mois=11')).'</td>
	
	<td>&nbsp;'.(sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=1 and annee="'.$i.'" and mois=12')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=2 and annee="'.$i.'" and mois=12')+sum_rowsone($db,'tbl__50encaissement','montant','where source__financement_id=3 and annee="'.$i.'" and mois=12')).'</td>
	
	';
		}
		else if($case=='total_pt')
		{
			
			if($j==1)
			{
				$before='<td><strong>'.calculate_p_t_total($activite_id,$i,1,$db,1).'</strong></td>
	<td><strong>'.calculate_p_t_total($activite_id,$i,1,$db,2).'</strong></td>
	<td><strong>'.(calculate_p_t_total($activite_id,$i,1,$db,1)-calculate_p_t_total($activite_id,$i,1,$db,2)).'<strong></td>';
			}
			else
			{
				$before='';
			}
			$content.=$before.'
	
	<td><strong>'.calculate_p_t_total($activite_id,$i,1,$db,0).'</strong></td>
    <td><strong>'.calculate_p_t_total($activite_id,$i,2,$db,0).'</strong></td>
    <td><strong>'.calculate_p_t_total($activite_id,$i,3,$db,0).'</strong></td>
   <td><strong>'.calculate_p_t_total($activite_id,$i,4,$db,0).'</strong></td>
     <td><strong>'.calculate_p_t_total($activite_id,$i,5,$db,0).'</strong></td>
    <td><strong>'.calculate_p_t_total($activite_id,$i,6,$db,0).'</strong></td>
    <td><strong>'.calculate_p_t_total($activite_id,$i,7,$db,0).'</strong></td>
     <td><strong>'.calculate_p_t_total($activite_id,$i,8,$db,0).'</strong></td>
     <td><strong>'.calculate_p_t_total($activite_id,$i,9,$db,0).'</strong></td>
    <td><strong>'.calculate_p_t_total($activite_id,$i,10,$db,0).'</strong></td>
    <td><strong>'.calculate_p_t_total($activite_id,$i,11,$db,0).'</strong></td>
     <td><strong>'.calculate_p_t_total($activite_id,$i,12,$db,0).'</strong></td>';
		}
	}
	return $content;
}

function time_chrono($db,$activite_id,$month,$year,$color_id)
{
if($month<10)
{
	$super_month='0'.$month;
}else
{
	$super_month=$month;
}
$db=$myq=mysql_query("select * from tbl__33chronogramme where activite_id='".$activite_id."' and a_mois='".$super_month."' and a_annee='".$year."' or activite_id='".$activite_id."' and b_mois='".$super_month."' and b_annee='".$year."'  ") or die("Query Failed".mysql_error());
$check=mysql_num_rows($myq);
if($check>=1)
{
	$output= colors($color_id);#'#F3CC00';
}
else
{
	$output='';//think miracle
}
return $output;

}
function chrono_grpahique($db)
{
$header='<table width="100%" border="0">
  <tr bgcolor="#E0EFFE">
    <td><strong>ACTIVITES</strong></td>
  '.duplicate_15_100($db,'y',0,$_GET['from'],$_GET['to'],0).'
  </tr>
  <tr  bgcolor="#EAFDEA">
 	<td>MOIS</td>
    '.duplicate_15_100($db,'m',0,$_GET['from'],$_GET['to'],0).'
    
  </tr>';
 $content='';
 $color_id=0;
  #$db=$q=mysql_query("select * from tbl__33chronogramme where projet_id='".$_GET['project']."'") or die("Query Failed".mysql_error());
  $db=$q=mysql_query("select * from tbl__23activite where projet_id='".$_GET['project']."'") or die("Query Failed".mysql_error());
  while($row=mysql_fetch_array($q)){
	  $color_id++;
  $content.='<tr bgcolor="#EAFDEA">
    <td style="background-color:#D7F0FF;">
	'.$row['activite'].'</td>
  '.duplicate_15_100($db,'data',$row[0],$_GET['from'],$_GET['to'],$color_id).'
  </tr> ';
}
 $footer='</table>';
 return $header.$content.$footer;
}
function filtrage_option()
{
	$content='';
	$option=
	'
	<option value="general">General</option>
	';
	for($i=2015; $i<=2100; $i++)
	{
		$content.='<option value="'.$i.'">'.$i.'</option>';
	}
	return $option.$content;
}
function get_moth_word($value,$lang)
{
	if($lang=='fr')
	{
	switch($value)
	{
	case 1: $month='Janvier';break;
	case 2: $month='Fevrier';break;
	case 3: $month='Mars';break;
	case 4: $month='Avril';break;
	case 5: $month='Mai';break;
	case 6: $month='Juin';break;
	case 7: $month='Juillet';break;
	case 8: $month='Aout';break;
	case 9: $month='Semptembre';break;
	case 10: $month='Octobre';break;
	case 11: $month='Novembre';break;
	case 12: $month='Decembre';break;
	default: $month='Mois invalide'; 
	}
	
	}else if($lang=='en')
	{
	switch($value)
	{
	case 1: $month='January';break;
	case 2: $month='February';break;
	case 3: $month='March';break;
	case 4: $month='April';break;
	case 5: $month='May';break;
	case 6: $month='Juine';break;
	case 7: $month='Juily';break;
	case 8: $month='August';break;
	case 9: $month='Semptember';break;
	case 10: $month='October';break;
	case 11: $month='November';break;
	case 12: $month='December';break;
	default: $month='Unkonwn month'; 
	}
	}
	return $month;
	
}
function sortie_fond($project_id,$db,$header,$footer)
{
	$content='';
	/*
	$db=$q=mysql_query("select * from tbl__32libelle where projet_id='".$project_id."'") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($q))
	{
		
			$input='<input type="checkbox" value="'.$row[0].'" name="frm_check_id[]"/>';
	
		$content.='<tr>
		<td>'.$input.'</td>
		<td>'.$row['numero__de__la__depense'].'&nbsp;'.$row['description__de__la__depense'].'</td>
		</tr>';
	}
	*/
	$mois=str_replace('0','',date('m'));
	$db=$q=mysql_query("select * from  tbl__48libelle__tresorerie where projet_id='".$project_id."' and mois='".$mois."'") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($q))
	{
		
			$input='<input type="checkbox" value="'.$row[0].'" name="frm_check_id[]"/>';
	
		$content.='<tr>
		<td>'.$input.'</td>
		<td>'.foreign_value('where libelle_id="'.$row['libelle_id'].'"','tbl__32libelle',5,$db).'</td>
		</tr>';
	}
	return $header.$content.$footer;
}
function baseline($project_id,$db,$header,$footer)
{
	$content='';
	$db=$q=mysql_query("select * from tbl__23activite where projet_id='".$project_id."'") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($q))
	{
		if(foreign_value('where activite_id="'.$row[0].'"','tbl__37baseline',2,$db)=='')
		{
			$input='<input type="checkbox" value="'.$row[0].'" name="frm_check_id[]"/>';
		}else
		{
			$input='<a href="retrieve/view_detail.php?class=baseline&action=edit&view=default&ref_id='.$row[0].'&ref_menu=default&project='.$project_id.'"><input type="button"  value="Editer" class="btn btn-primary"/></a>';
		}
		$content.='<tr>
		<td>'.$input.'</td>
		<td>'.$row['activite'].'</td>
		</tr>';
	}
	return $header.$content.$footer;
}
function get_project_activities($project_id,$db,$header,$footer)
{
	$content='';
	$db=$q=mysql_query("select * from tbl__23activite where projet_id='".$project_id."'") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($q))
	{
		if(foreign_value('where activite_id="'.$row[0].'"','tbl__33chronogramme',2,$db)=='')
		{
			$detail_btn='';
		}else
		{
			$detail_btn='<a href="chronogramme.php?activite_id='.$row[0].'" rel="facebox">Liste Chronogramme</a>';
		}
		if(foreign_value('where activite_id="'.$row[0].'"','tbl__43year_range',3,$db)=='')
		{
			$input='<a href="espace_de_temps.php?activite_id='.$row[0].'&action=default&projet_id='.$row['projet_id'].'" rel="facebox">Ajouter Espace de Temps</a>';
		}
		else
		{
			$input='<input type="checkbox" value="'.$row[0].'" name="frm_check_id[]"/>&nbsp;<a href="espace_de_temps.php?activite_id='.$row[0].'&action=edit&projet_id='.$row['projet_id'].'&ref_id='.foreign_value('where activite_id="'.$row[0].'"','tbl__43year_range',1,$db).'" rel="facebox">Editer Espace de Temps (De: '.foreign_value('where activite_id="'.$row[0].'"','tbl__43year_range',4,$db).')&nbsp;à '.foreign_value('where activite_id="'.$row[0].'"','tbl__43year_range',5,$db).' </a>';
		}
		 if($row['produit_id']==0){$edit_me=' |<a href="three/edit_activite.php?class=12&action=default&ref_id='.$_GET['ref_id'].'&ref_menu=default&signal=green_light&project='.$_GET['project'].'&impact_id=0&resultat_id=0&produit_id=0&activite_id='.$row[0].'&extra=0" rel="facebox">Edit</a>';}else{$edit_me='';}
		$content.='<tr>
		<td>'.$input.'</td>
		<td>'.$row['activite'].$edit_me.'</td>
		<td>'.$detail_btn.'</td>
		</tr>';
	}
	return $header.$content.$footer;
}
function student_photo($db,$width,$height,$src_avatar,$src_image_path,$ref_q,$table,$range_ouput)
{
	if(foreign_value($ref_q,$table,$range_ouput,$db)!='')
		{
	$photo=str_replace('#_height',$height.'"class="img-circle',str_replace('#_width',$width,str_replace('#_srcdata_buddle',$src_image_path,foreign_value($ref_q,$table,$range_ouput,$db))));
		}else
		{ 	$photo='<img src="'.$src_avatar.'" width="'.$width.'" height="'.$height.'">';
		}
return $photo;
}
function sum_rowsone($db,$table,$output,$ref)
{   $total=0;
	$db=$q=mysql_query("select * from  ".$table." ".$ref."") or die ("Query Failed".mysql_error());
	while($read=mysql_fetch_array($q))
	{
		$total+=+($read[$output]);
	}
	return $total;
}
function sum_rowsfour($db,$table,$output,$output2,$output3,$output4,$ref)
{   $total=0;
	$db=$q=mysql_query("select * from  ".$table." ".$ref."") or die ("Query Failed".mysql_error());
	while($read=mysql_fetch_array($q))
	{
		#$total+=+($read[$output]*$read[$output2]*$read[$output3]*$read[$output4]);
		$total+=+($read[$output2]*$read[$output3]*$read[$output4]);
	}
	return $total;
}
function sum_rows($db,$table,$output,$output2,$ref)
{   $total=0;
	$db=$q=mysql_query("select * from  ".$table." ".$ref."") or die ("Query Failed".mysql_error());
	while($read=mysql_fetch_array($q))
	{
		$total+=+($read[$output]*$read[$output2]);
	}
	return $total;
}
function sum_rows3($db,$table,$output,$output2,$output3,$ref)
{   $total=0;
	$db=$q=mysql_query("select * from  ".$table." ".$ref."") or die ("Query Failed".mysql_error());
	while($read=mysql_fetch_array($q))
	{
		$total+=+($read[$output]*$read[$output2]*$read[$output3]);
	}
	return $total;
}
function sum_rowsdate($db,$table,$output,$output2,$output3,$ref,$date,$from)
{   $total=0;
$total2=0;
    $reference_mois=get_month($from);
	$db=$q=mysql_query("select * from  ".$table." ".$ref."") or die ("Query Failed".mysql_error());
	while($read=mysql_fetch_array($q))
	{
		if(get_year($read[$date])<=get_year($from))
		{
		if(get_month($read[$date])<$reference_mois)
		{
		$total+=+($read[$output]*$read[$output2]*$read[$output3]);
		
		}
		if(get_month($read[$date])==$reference_mois)
		{
			if(get_day($from)>get_day($read[$date]))
			{
				$total2+=+($read[$output]*$read[$output2]*$read[$output3]);
			}
		}
		}
	 
	}
	return ($total+$total2);
}
function mycheckboxes($db,$ref,$table,$class,$width,$onchange,$name,$output,$add_name)
{
	if($onchange==1)
	{
		$reload='form.submit();';
	}else{
		$reload='';
	}
	if($add_name==0)
	{
		$add_me=0;
	}else
	{
		$add_me=$add_name;
	}
	$header='';
	$footer='';
	$db=$q=mysql_query("select * from ".$table." ".$ref."") or die("Query failed");
	$option='';
	$j=-1;
	while($row=mysql_fetch_array($q))
	{
		$j++;
		$option.='<span>'.$row[$output].'</span>
		<input type="checkbox" name="'.$name.'_'.$add_me.'[]" value="'.$row[0].'" class="'.$class.'">|';
	}
	return $header.$option.$footer;
	}
	function mydropdownb($db,$ref,$table,$class,$width,$onchange,$name,$output)
{
	$j=0;
	if($onchange==1)
	{
		$reload='form.submit();';
	}else{
		$reload=$onchange;
	}
	$header='<select name="'.$name.'" class="'.$class.'" onchange="'.$reload.'" style="width:'.$width.'">
	<option value="">--Selectionner--</option>';
	$footer='</select>';
	$db=$q=mysql_query("select * from ".$table." ".$ref."") or die("Query failed");
	$option='';
	while($row=mysql_fetch_array($q))
	{
		$j++;
			 
				if($j==1)
				{
				$option.='
				<option value="new_user">Nouveau Utilisateur ?</option>
				<option value="'.$row[0].'">'.$row['nom'].'&nbsp;'.$row['post__nom'].'</option>';
				}else
				{
				
				$option.='<option value="'.$row[0].'">'.$row['nom'].'&nbsp;'.$row['post__nom'].'</option>';
				}
			
		
	}
	if($j==0)
	{
		$option.='
				<option value="new_user">Nouveau Utilisateur ?</option>';
	}
	return $header.$option.$footer;
	}
function mydropdown($db,$ref,$table,$class,$width,$onchange,$name,$output)
{
	$j=0;
	if($onchange==1)
	{
		$reload='form.submit();';
	}else{
		$reload=$onchange;
	}
	$header='<select name="'.$name.'" class="'.$class.'" onchange="'.$reload.'" style="width:'.$width.'">
	<option value="">--Selectionner--</option>';
	$footer='</select>';
	$db=$q=mysql_query("select * from ".$table." ".$ref."") or die("Query failed");
	$option='';
	while($row=mysql_fetch_array($q))
	{
		$j++;
		
		{
		$option.='<option value="'.$row[0].'">'.$row[$output].'</option>';
		}
	}
	return $header.$option.$footer;
	}
function db_connection()
{
$conn=mysql_connect(''.servername.'',''.username.'',''.pwd.'') or die('connection failed<br>'.mysql_error());
$db=mysql_select_db(''.DB.'',$conn) or die('unknown database'.mysql_error());
return $db;

}

function count_rows($reference,$table)
	{
	$query=mysql_query("select * from ".$table." ".$reference."") or die("Query Failed count".mysql_error());
	$count=mysql_num_rows($query);
	return $count;	
	}
	
function foreign_value($ref,$table,$fld_range,$database)
{
	$j=0;
		//pk find start
		if(!is_string($fld_range))
	{
		$q_1=$database=mysql_query("show columns  from ".$table."") or die("Commande echouer for foreign values".mysql_query());
		while($column=mysql_fetch_array($q_1))
		{
			$j+=1;
			
			 if($j==$fld_range)
			{
				$outpout=$column[0];
			}
			else
			{
				continue;
			}
		}
	}else
	{
		$outpout=$fld_range;
	}
	
	$k_q=$database=mysql_query(" select * from ".$table." ".$ref."")or die ("commande echouer".mysql_query());
	$print=mysql_fetch_array($k_q);
	$foreign_k_value=$print[$outpout];
	return $foreign_k_value;
}
function somme_value($ref,$table,$fld_range,$database)
{
	   $somme=0;
	   
		//pk find start
		$q_1=$database=mysql_query(" select * from ".$table." ".$ref."")or die ("commande echouer".mysql_query());
		
		while($lire=mysql_fetch_array($q_1))
		{
			$somme+=+$lire[$fld_range];
		}
	
	return $somme;
}
function somme_value_j($ref,$table,$fld_range,$database)
{
	   $j=0;
	   
		//pk find start
		$q_1=$database=mysql_query(" select * from ".$table." ".$ref."")or die ("commande echouer".mysql_query());
		
		while($lire=mysql_fetch_array($q_1))
		{
			$j++;
		}
	
	return $j;
}
function checkboxes($database,$table,$label,$id,$name)
{   $checkboxes="";
    if(CL=='vulnerability')
	{
		$reference='where vulnerabilite__courant=1';
	}else
	{
		$reference='';
	}
	$q=mysql_query("select * from ".$table." ".$reference."") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($q))
	{
		if(CL=='vulnerability')
		{
			$checkboxes.="<div class='span4'><input type='checkbox' checked='checked' name='".$name."[]' value='".$row[$id]."'/>&nbsp;  ".$row[$label]."</div>";
		}else
		{
			$checkboxes.="<input type='checkbox' checked='checked' name='".$name."[]' value='".$row[$id]."'/>&nbsp;<span>".$row[$label]."</span><br>";
		}
		
		
	}
return $checkboxes;
}
function cartho($long_q,$centre_id,$link_table)
{   $j=0;
    $long_q=str_replace('#_center_id',$centre_id,$long_q);
	$query=mysql_query("select * from ".$link_table." where ".$long_q."") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($query))
	{
		$j++;
	}
	return $j;
}

function _provenance($province_id,$tranche_age,$from,$to,$ref_object,$object_idd,$ble_ta,$usage)
{
if($_SESSION['DESIGNATION']=='user')
{
	$sess='and user_id='.$_SESSION['USER_ID'].'';
}else
{
	$sess='';
}
$territoire='';	
$ta=0;
$tb=0;
$tc=0;
$td=0;
$te=0;
$tf=0;
$tg=0;
$th=0;	
$chart='';
$q=mysql_query("select * from tbl__06territoire00__ville where province_id='$province_id' and territoire__actif=1") or die("Query Failed".mysql_error());
$counter=mysql_num_rows($q);
if($counter>=1)
{
while($row=mysql_fetch_array($q))
{ 
$ter_id=$row[0];
/*----------------------------------0-12ans-------------------------------------------------------------------------*/
$a=count_rows($reference='where territoire__ville_id='.$ter_id.' and '.$tranche_age.'=1 and sexe="Masculin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" and province_id<>3 '.$sess.'',$table=$ble_ta);
$b=count_rows($reference='where territoire__ville_id='.$ter_id.' and '.$tranche_age.'=1 and sexe="Feminin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" and province_id<>3 '.$sess.'',$table=$ble_ta);
/*----------------------------------13-17ans-------------------------------------------------------------------------*/
$c=count_rows($reference='where territoire__ville_id='.$ter_id.' and '.$tranche_age.'=2 and sexe="Masculin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" and province_id<>3 '.$sess.'',$table=$ble_ta);
$d=count_rows($reference='where territoire__ville_id='.$ter_id.' and '.$tranche_age.'=2 and sexe="Feminin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" and province_id<>3 '.$sess.'',$table=$ble_ta);
/*----------------------------------18-25ans-------------------------------------------------------------------------*/
$e=count_rows($reference='where territoire__ville_id='.$ter_id.' and '.$tranche_age.'=3 and sexe="Masculin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" and province_id<>3 '.$sess.'',$table=$ble_ta);
$f=count_rows($reference='where territoire__ville_id='.$ter_id.' and '.$tranche_age.'=3 and sexe="Feminin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" and province_id<>3 '.$sess.'',$table=$ble_ta);
/*----------------------------------25ans++-------------------------------------------------------------------------*/
$g=count_rows($reference='where territoire__ville_id='.$ter_id.' and '.$tranche_age.'=4 and sexe="Masculin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" and province_id<>3 '.$sess.'',$table=$ble_ta);
$h=count_rows($reference='where territoire__ville_id='.$ter_id.' and '.$tranche_age.'=4 and sexe="Feminin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" and province_id<>3 '.$sess.'',$table=$ble_ta);
/*----------------------------------hinshasa-------------------------------------------------------------------------*/
$aa=count_rows($reference='where province_id=3 and '.$tranche_age.'=1 and sexe="Masculin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" '.$sess.'',$table=$ble_ta);
$bb=count_rows($reference='where province_id=3 and '.$tranche_age.'=1 and sexe="Feminin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" '.$sess.'',$table=$ble_ta);
$cc=count_rows($reference='where province_id=3 and '.$tranche_age.'=2 and sexe="Masculin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" '.$sess.'',$table=$ble_ta);
$dd=count_rows($reference='where province_id=3 and '.$tranche_age.'=2 and sexe="Feminin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" '.$sess.'',$table=$ble_ta);
$ee=count_rows($reference='where province_id=3 and '.$tranche_age.'=3 and sexe="Masculin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" '.$sess.'',$table=$ble_ta);
$ff=count_rows($reference='where province_id=3 and '.$tranche_age.'=3 and sexe="Feminin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" '.$sess.'',$table=$ble_ta);
$gg=count_rows($reference='where province_id=3 and '.$tranche_age.'=4 and sexe="Masculin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" '.$sess.'',$table=$ble_ta);
$hh=count_rows($reference='where province_id=3 and '.$tranche_age.'=4 and sexe="Feminin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" '.$sess.'',$table=$ble_ta);

/*----------------------------------horzone-------------------------------------------------------------------------*/
  //check if am a horzone starts
  $requette=mysql_query("select * from tbl__05province where province_id='$province_id' and hors__zone=1") or die("commande echouer".mysql_error());
  $check=mysql_num_rows($requette);
  if($check>=1)
  {
	  $hz='Autres Hors Zones';

  }else
  {
	  $hz='Hors Zones';

  }
  
  // check if am a horzone ends
$a_a=count_rows($reference='where province_id<>3 and province_id<>'.$province_id.' and '.$tranche_age.'=1 and sexe="Masculin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" '.$sess.'',$table=$ble_ta);
$b_b=count_rows($reference='where province_id<>3 and province_id<>'.$province_id.' and '.$tranche_age.'=1 and sexe="Feminin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" '.$sess.'',$table=$ble_ta);
$c_c=count_rows($reference='where province_id<>3 and province_id<>'.$province_id.' and '.$tranche_age.'=2 and sexe="Masculin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" '.$sess.'',$table=$ble_ta);
$d_d=count_rows($reference='where province_id<>3 and province_id<>'.$province_id.' and '.$tranche_age.'=2 and sexe="Feminin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" '.$sess.'',$table=$ble_ta);
$e_e=count_rows($reference='where province_id<>3 and province_id<>'.$province_id.' and '.$tranche_age.'=3 and sexe="Masculin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" '.$sess.'',$table=$ble_ta);
$f_f=count_rows($reference='where province_id<>3 and province_id<>'.$province_id.' and '.$tranche_age.'=3 and sexe="Feminin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" '.$sess.'',$table=$ble_ta);
$g_g=count_rows($reference='where province_id<>3 and province_id<>'.$province_id.' and '.$tranche_age.'=4 and sexe="Masculin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" '.$sess.'',$table=$ble_ta);
$h_h=count_rows($reference='where province_id<>3 and province_id<>'.$province_id.' and '.$tranche_age.'=4 and sexe="Feminin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and '.$ref_object.'="'.$object_idd.'" '.$sess.'',$table=$ble_ta);


$ta+=$a;
$tb+=+$b;
$tc+=$c;
$td+=+$d;
$te+=$e;
$tf+=+$f;
$tg+=$g;
$th+=+$h;


	$territoire.='<tr bgcolor="#F0F0F0">
    <td width="87" bgcolor="#B3E89B">'.$row[2].'</td>
    <td width="27">'.$a.'</td>
    <td width="21">'.$b.'</td>
    <td width="25">'.$c.'</td>
    <td width="26">'.$d.'</td>
    <td width="26">'.$e.'</td>
    <td width="33">'.$f.'</td>
    <td width="26">'.$g.'</td>
    <td width="25">'.$h.'</td>
	<td width="25" style="font-weight:bold; font-size:13px;">'.($a+$b+$c+$d+$e+$f+$g+$h).'</td>
  </tr>';
  $chart.=($a+$b+$c+$d+$e+$f+$g+$h).',';
 $taa=($aa+$bb+$cc+$dd+$ee+$ff+$gg+$hh);
$ta_a=($a_a+$b_b+$c_c+$d_d+$e_e+$f_f+$g_g+$h_h);
$kinshasa='<tr bgcolor="#F0F0F0">
    <td width="87" bgcolor="#B3E89B">Kinshasa</td>
    <td width="27">'.$aa.'</td>
    <td width="21">'.$bb.'</td>
    <td width="25">'.$cc.'</td>
    <td width="26">'.$dd.'</td>
    <td width="26">'.$ee.'</td>
    <td width="33">'.$ff.'</td>
    <td width="26">'.$gg.'</td>
    <td width="25" >'.$hh.'</td>
	<td style="font-weight:bold; font-size:13px;">'.$taa.'</td>
  </tr>';

  $hors_zone='<tr bgcolor="#F0F0F0">
    <td width="87" bgcolor="#B3E89B">'.$hz.'</td>
    <td width="27">'.$a_a.'</td>
    <td width="21">'.$b_b.'</td>
    <td width="25">'.$c_c.'</td>
    <td width="26">'.$d_d.'</td>
    <td width="26">'.$e_e.'</td>
    <td width="33">'.$f_f.'</td>
    <td width="26">'.$g_g.'</td>
    <td width="25">'.$h_h.'</td>
	<td style="font-weight:bold; font-size:13px;">'.$ta_a.'</td>
  </tr>';
  $footer='<tr bgcolor="#F0F0F0">
    <td width="87">Sous Total</td>
    <td width="27">'.($ta+$aa+$a_a).'</td>
    <td width="21">'.($tb+$bb+$b_b).'</td>
    <td width="25">'.($tc+$cc+$c_c).'</td>
    <td width="26">'.($td+$dd+$d_d).'</td>
    <td width="26">'.($te+$ee+$e_e).'</td>
    <td width="33">'.($tf+$ff+$f_f).'</td>
    <td width="26">'.($tg+$gg+$g_g).'</td>
    <td width="25">'.($th+$hh+$h_h).'</td>
	<td style="font-weight:bold; font-size:13px;">'.($ta+$tb+$tc+$td+$te+$tf+$tg+$th+$taa+$ta_a).'</td>
  </tr>';
 $footer_2='<tr bgcolor="#F0F0F0" >
    <td width="87">Total</td>
   <td colspan="2" style="font-weight:bold; font-size:13px;">'.($ta+$tb+$aa+$bb+$a_a+$b_b).'</td>
   <td colspan="2" style="font-weight:bold; font-size:13px;">'.($tc+$td+$cc+$dd+$c_c+$d_d).'</td>
   <td colspan="2" style="font-weight:bold; font-size:13px;">'.($te+$tf+$ee+$ff+$e_e+$f_f).'</td>
   <td colspan="2" style="font-weight:bold; font-size:13px;">'.($tg+$th+$gg+$hh+$g_g+$h_h).'</td>
   <td style="font-weight:bold; font-size:13px;" bgcolor="#008000">'.($ta+$tb+$tc+$td+$te+$tf+$tg+$th+$taa+$ta_a).'</td>
  </tr>';
}
}
//
if($counter>=1)
{
if($usage==1)
{
	$output=$territoire.$kinshasa.$hors_zone.$footer.$footer_2;
}
else if($usage==2)
{
	$output=$chart.$taa.','.$ta_a;
}
else
{
	$output=($ta+$tb+$tc+$td+$te+$tf+$tg+$th+$taa+$ta_a);
}
return  $output;
}else
{
	return'<span class="label label-important">Aucune Donnée trouvée</span>';
}
}
function vulnerability($v_id,$max,$du,$au,$prov_id)
{   $j=0;
    $k=0;
	$v=0;
	$t=0;
	$maximum=($max*4);
	$rows='';
	for($i=0;$i<$maximum;$i++)
	{
	 $j++;
	 $t++;
	 if($j%4==0)
	 {
		//work here man starts
		$k=($j/4);
		$age=2;
		$sex='Feminin';
		$t=0;
		//wwork here man ends
	 }
	 else
	 {
		 
		$t++;
		 $k=round(($j/4)+1,1);
		 $k=strrev($k);
		 $k=substr($k,+2);

		 if($t==2){$age=1; $sex='Masculin';}elseif($t==4){$age=1; $sex='Feminin';}else if($t==6){$age=2; $sex='Masculin';}
	 }
	  $rows.='<td style="text-align:center">'.get_territories($val_out=$prov_id,$incr=$k,$agge=$age,$gender=$sex,$from=$du,$to=$au,$vul_id=$v_id).'</td>';
    #$rows.='<td>'.$k.'&'.get_territories($val_out=$prov_id,$incr=$k).'&a'.$age.'&s'.$sex.'&t'.$t.'</td>';
	 
		
	}
	return $rows;
}
function get_territories($val_out,$incr,$agge,$gender,$from,$to,$vul_id)
{   $z=0;
	$requette=mysql_query("select * from  tbl__06territoire00__ville where province_id='$val_out'") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($requette))
	{
		$z++;
		if($_GET['type']==2)
		{
			$extra_sql=' and referencement__Keyword=1';
		}else
		{
			$extra_sql='';
		}
		if($z==$incr)
		{   
		if($_SESSION['DESIGNATION']=='user')
		{
		$sess='and user_id='.$_SESSION['USER_ID'].'';
		}else
		{
		$sess='';
		}
			$terr_id=$row[0];
			$counting=count_rows($reference='where territoire__ville_id='.$terr_id.' and tranche__age__enfant='.$agge.' and sexe="'.$gender.'" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and sous_types__des__vulnerabilites__principales_id="'.$vul_id.'" '.$extra_sql.' '.$sess.'',$table='tbl__34appel__long');
			
			return $counting;
		}
		
	}
	
}
function thirty_nine($dbms,$pdf)
			{   $content='';
			if($pdf==1)
			{
				$action='';	
				$hstyle='style="border: 1px solid #bbb; width:100%;"';
				$rstyle='bgcolor="#88B5F7"';
				$tstyle='bgcolor="#EFEFEF"';
			}else
			{
				$action='<th><h3>Action</h3></th>';
				$hstyle='';
				$rstyle='';
				$tstyle='';
			}
			    
				$header='<br><table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" '.$hstyle.'>
            <thead>
                <tr  '.$rstyle.'>
				<th><h3>Numero Matricule</h3></th>
				<th><h3>Information Enfant</h3></th>
				<th><h3>Carthographie Centre</h3></th>		
				<th><h3>Date</h3></th>
				<th><h3>Rapport</h3></th>
				'.$action.'
				</tr>
				</thead><tbody>';
				$footer='</tbody></table>';
				$q=mysql_query("select * from  tbl__39suivie where referencement_id ='".FK."' ") or die("Query Failed".mysql_error());
				while($row=mysql_fetch_array($q))
				{ 
				
				////
				if($pdf==1)
					{
						$sub_action='';
					}else
					{
						$sub_action='<td><a href="?class=38&action=edit&ref_id=default&ref_menu=default"><button class="btn btn-success">&laquo; Voir Referencement</button></a>&nbsp;<a href="../dashboard.php?class='.CL.'&action=edit&ref_id='.$row[0].'&ref_menu='.$row[1].'"><button class="btn btn-success">Ed</button></a> &nbsp; <a href="?class='.CL.'&action=delete_confirm&ref_id='.$row[0].'&ref_menu='.$row[1].'"><button class="btn btn-danger">Ef</button></a></td>';
					}
				//// 
				$appl_id=foreign_value($ref='where referencement_id  ='.$row[1].'',$table='tbl__38referencement',$fld_range=2,$database=$dbms);
				$centre_id=foreign_value($ref='where referencement_id  ='.$row[1].'',$table='tbl__38referencement',$fld_range=3,$database=$dbms);
				$vul_id=foreign_value($ref='where appel__long_id ='.$appl_id.'',$table='tbl__34appel__long',$fld_range=10,$database=$dbms);
				$vulnerabilte=foreign_value($ref='where sous_types__des__vulnerabilites__principales_id ='.$vul_id.'',$table='tbl__10sous__types__des__vulnerabilites__principales',$fld_range=3,$database=$dbms);
					$content.='<tr '.$tstyle.'>
					<td>'.foreign_value($ref='where appel__long_id ='.$appl_id.'',$table='tbl__34appel__long',$fld_range=11,$database=$dbms).'</td>
					<td>Enfant '.foreign_value($ref='where appel__long_id ='.$appl_id.'',$table='tbl__34appel__long',$fld_range=12,$database=$dbms).'&nbsp;'.foreign_value($ref='where appel__long_id ='.$appl_id.'',$table='tbl__34appel__long',$fld_range=13,$database=$dbms).'&nbsp; ayant comme vulnerabilité ('.$vulnerabilte.')</td>
					<td>'.foreign_value($ref='where cartographie__centre_id  ='.$centre_id.'',$table='tbl__23carthographie__centre',$fld_range=5,$database=$dbms).'</td>
					<td>'.$row[2].'</td>
					<td>'.$row[3].'</td>'.$sub_action.'</tr>';
				}
				return $header.$content.$footer;
			}
 function get_activities ($database,$tbl,$carto_id)
 {
	 $activities='';
	 $q=$database=mysql_query("select * from tbl__37link__cartho where cartographie__centre_id='".$carto_id."' ") or die("Query failed".mysql_error());
	 while($row=mysql_fetch_array($q))
	 {
		 $activities.='<p>'.foreign_value($ref='where activite_id ='.$row[2].'',$table='tbl__36activites',$fld_range=2,$database=$database).'</p>';
	 }
	 return $activities;
 }
 function online_users($db,$count)
 {   $content='';
	 $q=$db=mysql_query("select * from tbl__41online__users where login=1 and logout=0 and user_id<>'".$_SESSION['USER_ID']."'") or die("Query Failed".mysql_error());
	 $row_count=mysql_num_rows($q);
	 while($row=mysql_fetch_array($q))
	 {   $photo=str_replace('../','',foreign_value('where user_id='.$row[1].'','tbl__42users__photo',3,$db));
		 $content.=' 
                                   
                                      <table style="text-align:left;">
									  <tr>
									  <td><img src="'.$photo.'" width="30" height="30"/></td>
									  <td style="padding-left:10px;">
										'.foreign_value('where user_id='.$row[1].'','tbl__02login',5,$db).'&nbsp;'.foreign_value('where user_id='.$row[1].'','tbl__02login',6,$db).' </td>
										<th><a href="?class=50&action=default&ref_id=default&ref_menu='.$row[1].'&full_name='.foreign_value('where user_id='.$row[1].'','tbl__02login',5,$db).'&nbsp;'.foreign_value('where user_id='.$row[1].'','tbl__02login',6,$db).'&grd_father=default">&nbsp; &raquo; Message</a></th></tr></table>
                                  
                                    ';
	 }
	 if($count==1)
	 {
		 return $row_count;
	 }else
	 {
	 	return $content;
	 }
 }
 
  function system_info($array_value,$db,$logo)
 {
	 $q=$db=mysql_query("select * from   tbl__03configuration where config_id>0 order by config_id desc limit 1") or die("Query Failed".mysql_error());
	 $row=mysql_fetch_array($q);
     $output=$row[$array_value];
     return $output;
 }
  function header_top($db,$title)
 {   set_time_limit(0);
     $content='
	 <table width="100%">
	 <tr>
	 <th>'.str_replace('#_height',80,str_replace('#_width',200,str_replace('#_srcdata_buddle','../../data_buddle',foreign_value('where config_id>0','tbl__03configuration',12,$db)))).'</th>
	 <th>'.$title.'</th>
	 <th align="left">
	 Email: '.foreign_value('where config_id>0','tbl__03configuration',3,$db).'<br/>
	 Telephone: '.foreign_value('where config_id>0','tbl__03configuration',4,$db).'<br/>
	 Address: '.foreign_value('where config_id>0','tbl__03configuration',5,$db).'<br/>
	 '.foreign_value('where config_id>0','tbl__03configuration',6,$db).'<br/>
	 
	 </th>
	 </tr>
	 </table>
	 <br>
	 <hr size="2">
	 ';
	 return $content;
	 #str_replace('#_height',$height,str_replace('#_width',$width,str_replace('#_src','../../',$logo_root)))
 }
 function counter_statitic($table,$db)
 {   if($_SESSION['DESIGNATION']!='user')
     {
		 $reference='';
		 }
		 else
		 {
			$reference='where user_id='.$_SESSION['USER_ID'].'';
		 }
	 $q=$db=mysql_query("select * from ".$table." ".$reference." ") or ("Query Failed".mysql_error());
	 $count=mysql_num_rows($q);
	 return $count;
 }
 function report_net_call_schedule($tbl,$from,$to,$type)
 {
	 $header='<table width="100%" class="table table-bordered table-invoice"><tr  bgcolor="#A3CFFC">';
	 $th='';
	 $td='';
	 $chart='';
	 if($type==1)
	 {
		 $table='tbl__03type__de__reseau__d666appel';
		 $fld='type__de__reseau__d666appel_id';
		 $fl_date='date__creation__fiche';
		 $output=1;
		 $div_1='container_1';
	 }else if($type==2)
	 {
		$table='tbl__04tranche__horaire__d666appel';
		$fld='tranche__horaire__d666apel_id';
		$fl_date='date__creation__fiche';
		$output=1;
		 $div_1='container_2';
	 }
	 else
	 {
		$table='tbl__06territoire00__ville';
		$fld='territoire__ville_id'; 
		$fl_date='date';
		$output=2;
		$reference=" where province_id='".$_GET['province']."'";
		 $div_1='container_3';
	 }
	 if(isset($reference)){$ref=$reference;}else{$ref="";}
	 $q=mysql_query("select * from ".$table." ".$ref."") or die("Query Failed".mysql_error());
	 while($row=mysql_fetch_array($q))
	 {
		 $th.='<th>'.$row[$output].'</th>';
		 $td.='<td>'.count_rows("where ".$fld."=".$row[0]."  and  	".$fl_date." between '".$from."' and '".$to."'",$tbl).'</td>';
		 $chart.=count_rows("where ".$fld."=".$row[0]."  and  	".$fl_date." between '".$from."' and '".$to."'",$tbl).',';
	 }
      if(CL=='display_1')
	  {
		   return $header.$th.'</tr><tr bgcolor="#EEEEEE">'.$td.'</tr></table><div id="'.$div_1.'" class="chart" style="width:100%; height:400px; margin:auto;"></div>
<script type="text/javascript">
$(document).ready(function () {
	$("#'.$div_1.'").shieldChart({
		dataSeries: [
			{
				seriesType: "'.foreign_value('where usability=1',$table='tbl__49chart__type',$fld_range=2,db_connection()).'", // Change valids "pie, line,spline,gauge,rangearea,area,polararea,polarline,bar,donut,scatter,splinearea" to make different charts.
				applyAnimation: false,
				data: ['.$chart.'],
			}
		]
	});
});
</script>';
	  }else
	  {
	 return $header.$th.'</tr><tr bgcolor="#EEEEEE">'.$td.'</tr></table>';
	  }
 }
 function pourcentage_call($type)
 {   
      $header='<table width="100%" class="table table-bordered table-invoice"><tr  bgcolor="#A3CFFC">
	  <th></th>
	  <th>Appel Court</th> <th>Appel Long</th> <th>Silencieux</th> <th>Appel Interrompu</th> <th>Appel Erreur</th>
	  <th>Total</th>
	  </tr><tr>';
	  if($type==1)
	  {
		   if($_SESSION['DESIGNATION']=='admin'||$_SESSION['DESIGNATION']=='supervisor' ||$_SESSION['DESIGNATION']=='coordonator')
		  	 {
			  $ref_3='where date between "'.$_GET['from'].'" and "'.$_GET['to'].'"';
			  $ref_2='where date__creation__fiche between "'.$_GET['from'].'" and "'.$_GET['to'].'"';
			  }
			  else
			  {
			$ref_3='where user_id='.$_SESSION['USER_ID'].' and date between "'.$_GET['from'].'" and "'.$_GET['to'].'"';
			 $ref_2='where user_id='.$_SESSION['USER_ID'].' and date__creation__fiche between "'.$_GET['from'].'" and "'.$_GET['to'].'"';  
			  }
	  }
	  else
	  {
		  if($_SESSION['DESIGNATION']=='admin'||$_SESSION['DESIGNATION']=='supervisor' ||$_SESSION['DESIGNATION']=='coordonator')
		  	 {
			  $ref_2='';
			  $ref_3='';
			  }
			  else
			  {
			$ref_2='where user_id='.$_SESSION['USER_ID'].'';
			 $ref_3='where user_id='.$_SESSION['USER_ID'].'';  
			  }
	  }
	 $count_call_short=count_rows($ref_2,'tbl__29appel__court');
	 $count_call_long=count_rows($ref_2,'tbl__34appel__long');
	 $count_call_mute=count_rows($ref_3,'tbl__30appel__silencieux');
	 $count_call_interrupted=count_rows($ref_3,'tbl__32appel__interrompu');
	 $count_call_error=count_rows($ref_3,'tbl__31appel__erreur');
	 $sum=($count_call_short+$count_call_long+$count_call_mute+$count_call_interrupted+$count_call_error);
	 $content='
	 <td>Nombre</td>
	 <td>'.($count_call_short).'</td>
	 <td>'.($count_call_long).'</td>
	  <td>'.($count_call_mute).'</td>
	   <td>'.($count_call_interrupted).'</td> 
	   <td>'.($count_call_error).'</td>
	   <td>'.$sum.'</td>
	   </tr><tr>
	   <td>Pourcentage</td>
	   <td>'.round((($count_call_short*100)/$sum),2).'% <div class="progress progress-info">
                <div class="bar" style="width: '.round((($count_call_short*100)/$sum),2).'%"></div>
            </div></td>
	 <td>'.round((($count_call_long*100)/$sum),2).'%<div class="progress progress-info">
                <div class="bar" style="width: '.round((($count_call_long*100)/$sum),2).'%"></div>
            </div></td>
	  <td>'.round((($count_call_mute*100)/$sum),2).'% <div class="progress progress-info">
                <div class="bar" style="width: '.round((($count_call_mute*100)/$sum),2).'%"></div>
            </div></td>
	   <td>'.round((($count_call_interrupted*100)/$sum),2).'% <div class="progress progress-info">
                <div class="bar" style="width: '.round((($count_call_interrupted*100)/$sum),2).'%"></div>
            </div></td> 
	   <td>'.round((($count_call_error*100)/$sum),2).'% <div class="progress progress-info">
                <div class="bar" style="width: '.round((($count_call_error*100)/$sum),2).'%"></div>
            </div></td>
	   <td>100%</td>';
	 return $header.$content.'</tr></table>';
 }
 function redir_page()
 {
	if(isset($_POST['filter_short']))
	{
		$url='retrieve/?class=29&action=retrieving&ref_id=default&ref_menu=default&from='.$_POST['du'].'&to='.$_POST['au'].'';
		echo'<a href="'.$url.'">Aller</a>';
		exit();
	}
	
 }
 function activities_list($id)
 {
	 $content='';
	 $q=mysql_query("select * from tbl__37link__cartho where cartographie__centre_id='".$id."'") or die("Query Failed".mysql_error());
	 while($row=mysql_fetch_array($q))
	 {
		 $content.=foreign_value('where activite_id='.$row[2].'','tbl__36activites',2,db_connection()).'<br>';
	 }
	 return '<br><b>Activités</b><br>'.$content;
 }
 function fifty($dbms,$step)
			{
				$j=0;  
			if($step==1)
			{
				$th='
				<th class="head1 aligncenter"><input type="checkbox" name="checkall" class="checkall" /></th>
                <th class="head0">&nbsp;</th>
				<th class="head1">Expediteur</th>
				<th class="head1">Objet</th>
				<th class="head1"></th>
				<th class="head1">Date</th>';
				$sql="select * from  tbl__50message  where  destinateur_id='".$_SESSION['USER_ID']."' order by message_id desc";
				$css_class='table table-bordered mailinbox';
				
			}
			else if($step==2)
			{
				$th='
				
				<th class="head1">Description</th>
				<th class="head1">Détail</th>';
				$test_gf=foreign_value('where message_id='.FK.'','tbl__50message',9,db_connection());
				if($test_gf!=false)
				{
					$sql="select * from  tbl__50message  where  message_id='".$test_gf."' or grd_father_id='".$test_gf."' order by message_id asc";
				}else
				{
					$sql="select * from  tbl__50message  where  message_id='".FK."' order by message_id asc";
				}
				
				$css_class='table table-bordered mailinbox';
			}
			else
			{
				$th='<th><h3>Date Fiche</h3></th>
				<th><h3>Objet</h3></th>
				<th><h3>Expediteur</h3></th>
				<th><h3>Destinateur</h3></th>
				<th><h3>Message</h3></th>
				<th><h3>Attache</h3></th>
				<th><h3>Action</h3></th>';
				$sql="select * from  tbl__50message  where expediteur_id='".$_SESSION['USER_ID']."'  order by message_id desc";
				$css_class='tinytable';
			}
			 $content='';
				$header='<br><table cellpadding="0" cellspacing="0" border="0" id="table" class="'.$css_class.'">
            <thead>
                <tr>'.$th.'</tr>
				</thead><tbody>';
				$footer='</tbody></table>';
				
				$q=mysql_query($sql) or die("Query Failed".mysql_error());
				$count=mysql_num_rows($q);
				while($row=mysql_fetch_array($q))
				{ 
				$checkq=mysql_query("select * from tbl__50message where grd_father_id='".$row[0]."'   ") or die("Query Failed".mysql_error());
				$counting=mysql_num_rows($checkq);
				if( $step==1 && $counting>=1)
				{
					continue;
				}
				$j++;
				
				if(foreign_value('where message_id='.$row[0].'','tbl__51attach',3,db_connection())!=false)
				{  			
				$attachement='<a href="'.foreign_value('where message_id='.$row[0].'','tbl__51attach',3,db_connection()).'"><button class="btn btn-warning">Télécharger</button></a>';
				}
				else
				{
					$attachement='';
				}
				if($row[1]==$_SESSION['USER_ID'])
				{
				$att_btn='<a href="../dashboard.php?class=attach&action=default&ref_id=default&ref_menu='.$row[0].'"><button class="btn btn-success">Attacher</button></a>&nbsp;';
				}else
				{
					$att_btn='';
				}
				if($row[1]==$_SESSION['USER_ID'])
				{
				$reply='';
				}
				else
				{
					$reply='<a href="../dashboard.php?class=attach&action=default&ref_id=default&ref_menu='.$row[0].'"><button class="btn btn-success">Repondre</button></a>';
				}
				if($step==1)
				{ 
				 if($row[6]!=false){$tr=''; $star='<a class="msgstar"></a>';}else{$tr='unread'; $star='<a class="msgstar starred"></a>';}
				   if($attachement!=false)
				   {
					   $attache='<td class="attachment"><img src="img/attachment.png" alt="" /></td>';
				   }else
				   {
					   $attache='<td></td>';
				   }
					$content.='<tr class="'.$tr.'">
					<td class="aligncenter"><input type="checkbox" name="" /></td>
                                    <td class="star">'.$star.'</td>
					<td>'.foreign_value('where user_id='.$row[1].'','tbl__02login',5,db_connection()).'</td>
					<td><a href="?class=mail_received&action=reading&ref_id='.$row[8].'&ref_menu='.$row[0].'" class="title">('.(count_rows('where 	grd_father_id='.$row[8].' and grd_father_id<>0 ','tbl__50message')+1).')'.$row[2].'...</a></td>'.$attache.'
					
					<td>'.$row[3].'</td>
					
					</tr>';
				}
				else if($step==2)
				{
					if($row[8]!=false)
					{
						$g_father=$row[8];
					}
					else
					{
						$g_father=$row[0];
					}
					if($j==$count)
				{
					$reply_tr='<tr><td>Reponse</td>
					<td><a href="?class=50&action=default&ref_id=default&ref_menu='.$row[1].'&full_name='.foreign_value('where user_id='.$row[1].'','tbl__02login',5,db_connection()).foreign_value('where user_id='.$row[1].'','tbl__02login',6,db_connection()).'&msg_id='.$row[0].'&grd_father='.$g_father.'"><button class="btn btn-success">Repondre</button></a></td></tr>';
				}else
				{
					$reply_tr='';
				}
					$content.='
					<tr bgcolor="#99CBFD">
					<td>No</td>
					<td>'.$j.'</td>
					</tr>
					<tr class="unread">
					<td>Exp</td>
					<td>'.foreign_value('where user_id='.$row[1].'','tbl__02login',5,db_connection()).'</td>
					</tr>
					<tr class="unread">
					<td>Objet</td>
					<td>'.$row[2].'</td>
					</tr>
					<tr class="unread">
					<td>Date</td>
					<td>'.$row[3].'</td>
					</tr>
					<tr class="">
					<td>Message</td>
					<td align="justify">'.$row[5].'</td>
					</tr>
					<tr class="unread">
					<td>Attache</td>
					<td>'.str_replace('../','',$attachement).'</td>
					</tr>
					'.$reply_tr.'';
					
				}
				else
				{
				$content.='<tr>
					<td>'.$row[3].'</td>
					<td>'.$row[2].'</td>
					<td>'.foreign_value('where user_id='.$row[1].'','tbl__02login',5,db_connection()).'</td>
					<td>'.foreign_value('where user_id='.$row[4].'','tbl__02login',5,db_connection()).'</td>
					<td>'.$row[5].'</td>
					<td>'.$attachement.'</td>
					<td>'.$att_btn.$reply.'  </td>
					</tr>';
				}
				}
				return $header.$content.$footer;
			}
			function ev_listner($step,$id,$pdf)
			{   
			    if($step==1)
				{
					if($pdf==1)
					{
						$action='';
						$td='';
						$export='';
						$reference='';
						$ref_2='';
						$ref_3='';
					}else
					{
						$action='<th>Action</th>';
						$td='<td><a href="?class=listners&action=pick_date&ref_id=default&ref_menu=#_ID&full_name=#_full_name"><button class="btn btn-primary">Trier Par Date</button></a></td>';
						$export='<a href="MPDF57/examples/listner_assessment.php?class=listners&action=default&ref_id=default&ref_menu=default"><button class="btn btn-primary btn-large" style="margin-top:20px;">Export en PDF</button></a><br>';
						$reference='';
						$ref_2='';
						$ref_3='';
					}
				}
				 
			    elseif($step==2)
				{
					if($pdf==1)
					{
						$action='';
						$td='';
						$export='Evaluation Ecoutant '.$_GET['full_name'].' Du: '.$_GET['from'].' Au: '.$_GET['to'].'<br>';
						$reference=' and user_id='.FK.'';
						$ref_2=' and     date__creation__fiche between "'.$_GET['from'].'" and "'.$_GET['to'].'"';
						$ref_3=' and 	date between "'.$_GET['from'].'" and "'.$_GET['to'].'"';
					}else
					{
						$action='';
						$td='';
						$export='<a href="MPDF57/examples/listner_assessment.php?class=listners&action=detail&ref_id=default&ref_menu='.FK.'&full_name='.$_GET['full_name'].'&from='.$_GET['from'].'&to='.$_GET['to'].'"><button class="btn btn-primary btn-large" style="margin-top:20px;">Export en PDF</button></a><br>
						Evaluation Ecoutant '.$_GET['full_name'].' Du: '.$_GET['from'].' Au: '.$_GET['to'].'<br>';
						$reference=' and user_id='.FK.'';
						$ref_2=' and     date__creation__fiche between "'.$_GET['from'].'" and "'.$_GET['to'].'"';
						$ref_3=' and 	date between "'.$_GET['from'].'" and "'.$_GET['to'].'"';
					}
				}
				
				 elseif($step==3)
				{
					if($pdf==1)
					{
						$action='';
						$td='';
						$export='Evaluation Ecoutants  Du: '.$_GET['from'].' Au: '.$_GET['to'].'<br>';
						$reference='';
						$ref_2=' and     date__creation__fiche between "'.$_GET['from'].'" and "'.$_GET['to'].'"';
						$ref_3=' and 	date between "'.$_GET['from'].'" and "'.$_GET['to'].'"';
					}else
					{
						$action='';
						$td='';
						$export='<a href="MPDF57/examples/listner_assessment.php?class=listners&action=filter_record&ref_id=default&ref_menu='.FK.'&from='.$_GET['from'].'&to='.$_GET['to'].'"><button class="btn btn-primary btn-large" style="margin-top:20px;">Export en PDF</button></a><br>
						Evaluation Ecoutants  Du: '.$_GET['from'].' Au: '.$_GET['to'].'<br>';
						$reference='';
						$ref_2=' and     date__creation__fiche between "'.$_GET['from'].'" and "'.$_GET['to'].'"';
						$ref_3=' and 	date between "'.$_GET['from'].'" and "'.$_GET['to'].'"';
					}
				}
				else
				{
					$action='';
					$td='';
					$export='';
					$reference='';
					$ref_2='';
					$ref_3='';
				}
				$content='';
				$header=$export.'<table class="table table-bordered mailinbox" style="margin-top:20px;">
				<tr bgcolor="#99CBFD">
				<th>Nom</th>
				<th>Post-Nom</th>
				<th>Sexe</th>
				<th>Appel Court</th>
				<th>Appel Long</th>
				<th>Appel Silencieux</th>
				<th>Appel Interompu</th>
				<th>Appel Erreur</th>
				'.$action.'
				</tr>';
				$q=mysql_query("select * from tbl__02login where  designation='user' ".$reference."") or die("Query Failed".mysql_error());
				while($row=mysql_fetch_array($q))
				{
				$content.='<tr bgcolor="#EAEAEA">
				<td>'.$row[4].'</td>
				<td>'.$row[5].'</td>
				<td>'.$row[6].'</td>
				<td>'.count_rows('where user_id='.$row[0].' '.$ref_2.'','tbl__29appel__court').'</td>
				<td>'.count_rows('where user_id='.$row[0].'  '.$ref_2.'','tbl__34appel__long').'</td>
				<td>'.count_rows('where user_id='.$row[0].' '.$ref_3.'','tbl__30appel__silencieux').'</td>
				<td>'.count_rows('where user_id='.$row[0].' '.$ref_3.'','tbl__32appel__interrompu').'</td>
				<td>'.count_rows('where user_id='.$row[0].' '.$ref_3.'','tbl__31appel__erreur').'</td>
				'.str_replace('#_full_name',$row[4].'&nbsp;'.$row[5],str_replace('#_ID',$row[0],$td)).'
				<tr>';
				}
				
				$footer='</table>';
				return $header.$content.$footer;
				
			}
			function count_ref($id)
			{
				return count_rows('where appel__long_id='.$id.' ','tbl__38referencement');
			}
			function abuseur_statistic($type)
			{
				if($_SESSION['DESIGNATION']=='user')
				{
					$user='and user_id='.$_SESSION['USER_ID'].'';
				}else
				{
					$user='';
				}
				if($type==1)
				{
					$from=$_POST['from'];
					$to=$_POST['to'];
					$abuser_id=$_POST['abuseur'];
					$button='<a href="MPDF57/examples/abuser.php?class=abuser&action=default&ref_id=default&ref_menu=default&from='.$from.'&to='.$to.'&abuser='.$abuser_id.'"><button class="btn btn-primary btn-large">Export PDF</button></a><br>';
				}else
				{
					$from=$_GET['from'];
					$to=$_GET['to'];
					$abuser_id=$_GET['abuser'];
					$button='';
				}
				$content='';
				$top='Satistique Abuseur ('.foreign_value('where 	categorie__abuseur_id='.$abuser_id.'','tbl__18categorie__abuseur',2,db_connection()).') Du '.$from.' Au '.$to.' <br>
				'.$button.'<br>
				<table width="100%" class="table table-bordered mailinbox">
				<tr bgcolor="#D5E3FF">
				<th>Abuseur</th>
				<th>Fille</th>
				<th>Garcon</th>
				</tr>';
				$q=mysql_query("select * from tbl__18categorie__abuseur") or die("Query Failed".mysql_error());
				while($row=mysql_fetch_array($q))
				{
				$content.='
				<tr bgcolor="#F7F7F7">
				<td>'.$row[1].'</td>
				<td>'.count_rows(' where categorie__abuseur_id='.$row[0].' '.$user.'  and sexe="Feminin"  and date__creation__fiche between "'.$from.'" and "'.$to.'"','tbl__34appel__long').'</td>
				<td>'.count_rows(' where categorie__abuseur_id='.$row[0].' '.$user.'  and sexe="Masculin"  and date__creation__fiche between "'.$from.'" and "'.$to.'"','tbl__34appel__long').'</td>
				
				</tr>';
				}
				$bottom='</table>';
				return $top.$content.$bottom;
			}
			function user_access()
			{
				if(isset($_GET['user_access'])&& $_GET['user_access']=='user')
				{
					return $_GET['user_access'];
				}
				else
				{
					return '';
				}
			}

function incoming_store_form($db,$table,$ref,$header,$footer,$dynamic_content,$phase)
{
	$content='';
	$j=0;
	if($phase==1||$phase==3||$phase==5)
	{
	$db=$q=mysql_query("select * from ".$table." ".$ref."") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($q))
	{
		//exception phase 3 starts
		$content.=str_replace('show_id',$row[0],str_replace('omd_id',$row[1],$dynamic_content));

			}
	}else if($phase==2||$phase==4||$phase==6||$phase==7||$phase==8)
	{
		      if(!isset($_POST['id'])and $phase<7 )
	          {
		       //redirect back
		       header('location:?class=27&action=default&ref_id=default&ref_menu=default');
	           }
			   if($phase==7||$phase==8){
			$incr=$_POST['incr_number'];
			   }
			   else{
				  $incr= count($_POST['id']);
				  }
			   for($i=0; $i<$incr; $i++)
            	{
					$j++;
					 if($phase==6)
					{
							$content.=str_replace('show_id',$_POST['id'][$i],str_replace('#_omd',foreign_value('where 	omd_id="'.$_POST['id'][$i].'"','tbl__13omd',2,$db),$dynamic_content));
					}
					 else if($phase==7)
					{
							$content.=str_replace('@checkbox',mycheckboxes($db,'where projet_id="'.$_POST['projet_id'].'"','tbl__22produit','',200,0,'activite','produit',$i),str_replace('#_j',$j,$dynamic_content));
					}
					else if($phase==8)
					{
							$content.=str_replace('@@',$i,str_replace('@_div','<div id="outputz_'.$i.'"> </div>
							<select onchange="return show_total_'.$i.'(this);" style="width:70px;">
							<option value="">--Voir Total--</option>
							<option value="1">--Total--</option>
							</select>',str_replace('#_j',$j,$dynamic_content)));
					}
				}
	}
	if($phase==1||$phase==3||$phase==5)
	{
		return $header.$content.$footer;
	}
	else if($phase==6)
	{

		return $header.$content.$footer;
	}
	else if($phase==7)
	{

		return $header.$content.$footer;
	}
	else if($phase==8)
	{

		return $header.$content.$footer;
	}
	
}

function get_list_ids($postname)
{

	
	$value='';
	for($a=0; $a<count($_POST[$postname]); $a++)
	{
		$value.=$_POST[$postname][$a].',';
	}
	return strrev(substr(strrev($value),+1));
	
}
function incoming_store_form_execution($db,$phase)
{
	if(!isset($_POST['id'])and $phase<7)
	{
		//redirect back
		header('location:?class=omd_phase_2&action=default&ref_id=default&ref_menu=default');
	}
	if($phase==7){
			$incr=count($_POST['role']);
			   }
			    else if($phase==8){
			$incr=count($_POST['category']);
			   }
			   else{
				  $incr= count($_POST['id']);
				  }
for($i=0; $i<$incr; $i++)
            	{
		
		//adding new incoming without stock initiale
		if($phase==7)
		{
			$produits=get_list_ids('activite_'.$i.'');
		
			$q=mysql_query("insert into tbl__28partie__prenante set nom__de__la__partie='".mysql_real_escape_string($_POST['partie'][$i])."' ,role__dans__le__projet='".mysql_real_escape_string($_POST['role'][$i])."',projet_id='".$_POST['projet_id']."',produit='".$produits."' ") or die("Query Failed".mysql_error());
		}
		if($phase==8)
		{
			$q=mysql_query("insert into tbl__29beneficiaire set category='".$_POST['category'][$i]."' ,homme='".$_POST['men'][$i]."',femme='".$_POST['women'][$i]."',fille='".$_POST['girls'][$i]."',garcon='".$_POST['boys'][$i]."',description='".$_POST['description'][$i]."',projet_id='".$_POST['projet_id']."' ") or die("Query Failed".mysql_error());
		}
		else
		{
		$q=mysql_query("insert into tbl__26strategie__omd set omd_id='".$_POST['id'][$i]."' ,strategie__omd='".mysql_real_escape_string($_POST['strategy'][$i])."',projet_id='".$_POST['projet_id']."' ") or die("Query Failed".mysql_error());
		}
	     
	}

}
function outgoing_store_form_execution($db)
{
	if(!isset($_POST['id']))
	{
		//redirect back
		header('location:?class=outgoing_store&action=default&ref_id=default&ref_menu=default');
	}
	for($i=0; $i<count($_POST['id']); $i++)
	{
		//checker starts
		$db=$checker_q=mysql_query("select * from tbl__07sortie__depot where entree_id='".$_POST['id'][$i]."' and branche_id='".$_POST['branche_id']."' and action=1 ") or die('Query Failed'.mysql_error());
		$read_check=mysql_fetch_array($checker_q);
		$checker=mysql_num_rows($checker_q);
		$qte_initiale=$read_check['qte__totale'];
		$sortie_id=$read_check[0];
		//checker ends
		if($checker==1)
		{
		//adding new incoming with stock initiale	
		$q=mysql_query("insert into tbl__07sortie__depot set entree_id='".$_POST['id'][$i]."',branche_id='".$_POST['branche_id']."',qte__initiale='".($qte_initiale)."', qte='".$_POST['qte'][$i]."' ,date='".$_POST['date']."',qte__totale='".($qte_initiale+$_POST['qte'][$i])."',started__qte='".$_POST['qte'][$i]."' ,action=1") or die("Query Failed".mysql_error());
		//update outgoing table
		$update_q=mysql_query("update tbl__07sortie__depot set action=0 where sortie_id='".$sortie_id."' ") or die("Query Failed".mysql_error());
		//update incoming table
		$update_in_q=mysql_query("update tbl__06entree__depot set qte__totale=(qte__totale-'".$_POST['qte'][$i]."') where entree_id='".$_POST['id'][$i]."'") or die("Query Failed".mysql_error());
		}  else
		  {
		//adding new incoming without stock initiale
		$q=mysql_query("insert into tbl__07sortie__depot set entree_id='".$_POST['id'][$i]."',branche_id='".$_POST['branche_id']."', qte__initiale=0, qte='".$_POST['qte'][$i]."' ,date='".$_POST['date']."',qte__totale='".($_POST['qte'][$i])."',started__qte='".$_POST['qte'][$i]."' ,action=1") or die("Query Failed".mysql_error());
		//update incoming table
		$update_in_q=mysql_query("update tbl__06entree__depot set qte__totale=(qte__totale-'".$_POST['qte'][$i]."') where entree_id='".$_POST['id'][$i]."'") or die("Query Failed".mysql_error());
	      }
	}

}
 function out_going_article($incoming_id,$qte_finale,$table,$ref,$code,$pa,$pv,$type)  
 {   $j=0;
	 $content='';
	 $amount_total=0;
	 $q=mysql_query("select * from ".$table."  ".$ref."") or die("Query failed".mysql_error());
	 while($row=mysql_fetch_array($q))
	 {
		$j++;
		if($j==1)
		{
			$qte_ini=$qte_finale;
			$qte_f=($qte_ini-$row['qte']);
		}
		else
		{
			$qte_ini='';
			$qte_ini=$qte_f;
			$qte_f=($qte_f-$row['qte']);
		}
		 if($type==1||$type=='return_total')
		 {
			 $content.='
		 <tr bgcolor="#FCFECD">
		 <td>'.$row['date'].'</td>
		 <td>'.$code.'</td>
		 <td>'.$qte_ini.'</td>
		 <td>0</td>
		 <td>'.$row['qte'].'</td>
		 <td>'.$qte_f.'</td>
		 <td>'.$pa.'</td>
		 <td>'.$pv.'</td>
		 <td>'.(($row['qte']*$pv)-($row['qte']*$pa)).'</td>
		 </tr>';
		 $amount_total+=+(($row['qte']*$pv)-($row['qte']*$pa));
		 }
		 else
		 {
			 $content.='
		 <tr bgcolor="#FCFECD">
		 <td>'.$row['date'].'</td>
		 <td>'.$code.'</td>
		 <td>'.$qte_ini.'</td>
		 <td>0</td>
		 <td>'.$row['qte'].'</td>
		 <td>'.$qte_f.'</td>
		 </tr>';
		 }
	 }
	 if($type=='return_total')
	 {
		 return $amount_total;
	 }
	 else
	 {
	 return $content;
	 }
 }
 function outgoing_branch_form_execution($db)
{
	if(!isset($_POST['id']))
	{
		//redirect back
		header('location:?class=15&action=default&ref_id=default&ref_menu=default');
	}
	for($i=0; $i<count($_POST['id']); $i++)
	{
		//checker starts
		$db=$checker_q=mysql_query("select * from tbl__08sortie__branche where sortie_id='".$_POST['id'][$i]."' and branche_id='".$_SESSION['SUB_STORE']."' and action=1 ") or die('Query Failed'.mysql_error());
		$read_check=mysql_fetch_array($checker_q);
		$checker=mysql_num_rows($checker_q);
		$qte_initiale=$read_check['qte__totale'];
		$sortie_b_id=$read_check[0];
		//checker ends
		if($checker==1)
		{
		//adding new incoming with stock initiale	
		$q=mysql_query("insert into tbl__08sortie__branche set sortie_id='".$_POST['id'][$i]."',branche_id='".$_SESSION['SUB_STORE']."',qte__initiale='".($qte_initiale)."', qte='".$_POST['qte'][$i]."' ,date='".$_POST['date']."',qte__totale='".($qte_initiale+$_POST['qte'][$i])."' ,action=1") or die("Query Failed".mysql_error());
		//update outgoing table
		$update_q=mysql_query("update tbl__08sortie__branche set action=0 where sortie_b_id='".$sortie_b_id."' ") or die("Query Failed".mysql_error());
		//update incoming table
		$update_in_q=mysql_query("update tbl__07sortie__depot set qte__totale=(qte__totale-'".$_POST['qte'][$i]."') where sortie_id='".$_POST['id'][$i]."'") or die("Query Failed".mysql_error());
		}  else
		  {
		//adding new incoming without stock initiale
		$q=mysql_query("insert into tbl__08sortie__branche set sortie_id='".$_POST['id'][$i]."',branche_id='".$_SESSION['SUB_STORE']."', qte__initiale=0, qte='".$_POST['qte'][$i]."' ,date='".$_POST['date']."',qte__totale='".($_POST['qte'][$i])."' ,action=1") or die("Query Failed".mysql_error());
		//update incoming table
		$update_in_q=mysql_query("update tbl__07sortie__depot set qte__totale=(qte__totale-'".$_POST['qte'][$i]."') where sortie_id='".$_POST['id'][$i]."'") or die("Query Failed".mysql_error());
	      }
	}

}

function mydepense($total_max,$conn,$table, $ref)
{
	$conn=$q=mysql_query("select * from ".$table." ".$ref."") or die("Query Failed".mysql_error());
	$content='';
	$total_dep=0;
	$header='<table width="100%">
	<tr bgcolor="#94C6FC">
	<td>Date</td>
	<td colspan="8">Description</td>
	<td>Montant</td>
	</tr>';
	$footer='</table>';
	while($row=mysql_fetch_array($q))
	{	$total_dep+=+$row['montant'];
		$content.='
		<tr>
		<td>'.$row['date'].'</td>
		<td colspan="8">'.$row['depense__description'].'</td>
		<td>'.$row['montant'].'</td>
		</tr>';
	}
	return $header.$content.'
	<tr bgcolor="#3E3E3E" style="color:#fff;">
	<td colspan="9" style="color:#fff;" >Total</td>
	<td style="color:#fff;">'.$total_dep.'</td>
	</tr>
	<tr bgcolor="#3E3E3E" style="color:#fff;">
	<td colspan="9" style="color:#fff;" >Gain Apres Depense</td>
	<td style="color:#fff;"><strong>'.($total_max-$total_dep).'</strong></td>
	</tr>'.$footer;
}
function rappel_de_temps($db,$header,$footer,$category)
		{
 $middle='';
 $db=$q=mysql_query("select * from  tbl__23activite where projet_id='".$_GET['project']."'") or die("Query Failed".mysql_error());
 while($row=mysql_fetch_array($q))
 {
	 if($category=='report')
	{
	$user_id=$_SESSION['USER_ID'];	
	$partie_prenante_id=$user_id;
	#$user_activities=foreign_value('where partie__prenante	="'.$partie_prenante_id.'" ','tbl__28partie__prenante',3,$db);
	if($row['intervenant']==$partie_prenante_id)
	{
	$middle.=duplicator($row[0],$row['activite'],$db,$category);	
	}else
	{
		continue;
	}
	
		
	}
	else
	{
	$middle.=duplicator($row[0],$row['activite'],$db,$category);
	}
 }
	return $header.$middle.$footer;
		}
 function duplicator($activity_id,$activite_string,$db,$category)
 {
  $content='';
  #$array=array('du_1','du_2','du_3','du_4','du_5','du_6','du_7','du_8','du_9','du_10','du_11','du_12');
  $j=0;
 
	  
	  $db=$sql=mysql_query("select * from  tbl__33chronogramme where activite_id='".$activity_id."' and b_mois<>''") or die("Query Failed".$error());
	  	 while($read_q=mysql_fetch_array($sql))
	{

	 $j+=1;
	 #$au=au($activity_id,$j,$db);
	$user_id=foreign_value('where activite_id="'.$read_q['activite_id'].'"',' tbl__23activite',6,$db);
	$fname=foreign_value('where user_id="'.$user_id.'"','  tbl__02users',6,$db);	
	$lname=foreign_value('where user_id="'.$user_id.'"','  tbl__02users',7,$db);
	 if($category=='report')
	{
		
		$content.='
	 <tr>
	 <td>'.$activite_string.'</td>
	 <td>'.$fname.'&nbsp;'.$lname.'</td>
	 <td>Du:'.$read_q['debut'].' Au '.$read_q['fin'].'</td>
	 <td style="background-color:'.notification_time($read_q['debut'],$db,$activity_id,$read_q[0],2).'">'.notification_time($read_q['debut'],$db,$activity_id,$read_q[0],1).'</td>
	 <td>'.check_send_report($activity_id,$read_q[0],$db,'').'</td>
	  <td>'.check_send_report($activity_id,$read_q[0],$db,'alter').'</td>
	 <td>'.check_send_report($activity_id,$read_q[0],$db,'attachment').'</td>
	  <td>Validation:'.foreign_value('where act_id="'.$activity_id.'" and chrono_id="'.$read_q[0].'"',' tbl__36rapport',10,$db).' | Commentaire: '.foreign_value('where act_id="'.$activity_id.'" and chrono_id="'.$read_q[0].'"',' tbl__36rapport',12,$db).'</td> 
   <td>Validation:'.foreign_value('where act_id="'.$activity_id.'" and chrono_id="'.$read_q[0].'"',' tbl__36rapport',11,$db).'| Commentaire:'.foreign_value('where act_id="'.$activity_id.'" and chrono_id="'.$read_q[0].'"',' tbl__36rapport',13,$db).'</td> 
	 </tr>';
	}else
	{	
	 $content.='
	 <tr>
	 <td>'.$activite_string.'</td>
	 <td>'.$fname.'&nbsp;'.$lname.'</td>
	 <td>Du:'.$read_q['debut'].' Au '.$read_q['fin'].'</td>
	 <td style="background-color:'.notification_time($read_q['debut'],$db,$activity_id,$read_q[0],2).'">'.notification_time($read_q['debut'],$db,$activity_id,$read_q[0],1).'</td>
	 </tr>';
	}
		 
  }
  return $content;
 }
 function check_send_report($act_id,$range_id,$db,$case)
 {
$r_pt_q=mysql_query("select * from tbl__36rapport where act_id='".$act_id."' and chrono_id='".$range_id."'")or die("Query Failed".$error());
$rpt_checker=mysql_num_rows($r_pt_q);
if($case=='alter')
{
	if($rpt_checker>=1)
	{
	if(foreign_value('where act_id="'.$act_id.'" and chrono_id="'.$range_id.'"',' tbl__36rapport',10,$db)=='valider'||foreign_value('where act_id="'.$act_id.'" and chrono_id="'.$range_id.'"',' tbl__36rapport',11,$db)=='valider')
	{
	$link='Access Denied';
	}else
	{
		$link='<a href="retrieve/view_detail.php?class=envoyer_le_rapport_activite_sans_photo&action=edit&view=shown&ref_id='.$act_id.'&ref_menu=default&range_id='.$range_id.'&project='.$_GET['project'].'"><button class="btn btn-success" type="button" >Editer</button></a>';
	}
	}
	else
	{
		$link=false;
	}
}
else if($case=='attachment')
{
	if($rpt_checker>=1)
	{
	$link='<a href="retrieve/view_detail.php?class=envoyer_le_rapport_activite_avec_photo&action=default&view=shown&ref_id='.$act_id.'&ref_menu=default&range_id='.$range_id.'&project='.$_GET['project'].'"><button class="btn btn-primary">Attache</button></a> &nbsp;
	<br/>
	<a href="retrieve/view_detail.php?class=voir_la_detaile_des_fichier_envoyes&action=default&view=shown&ref_id='.$act_id.'&ref_menu=default&range_id='.$range_id.'&project='.$_GET['project'].'"><button type="button" class="btn btn-success">Attac('.count_rows("where act_id='".$act_id."' and range_id='".$range_id."'",'tbl__42upload_file').')</button></a>';
	}
	else
	{
		$link=false;
	}
}
else
{
if($rpt_checker<1)
{
 $link='<a href="retrieve/view_detail.php?class=envoyer_le_rapport_activite_sans_photo&action=default&view=shown&ref_id='.$act_id.'&ref_menu=default&range_id='.$range_id.'&project='.$_GET['project'].'"><button class="btn btn-primary">Rapport</button></a>';
}else
{
	$link='<font color="#4BBA1D">Rapport Envoyé</font>';
}
}
	 return $link;
 }
function compare_from_exp($exp_val,$activity_id)
{
	$myexp=explode(',',$exp_val);
	for($i=0; $i<count($myexp);$i++)
	{
		if($activity_id==$myexp[$i])
		{
			return 1;
		}else
		{
			continue;
		}
	}
}
function get_concerned_person($activity_id,$db)
 {
$person='';
$db=$kwery=mysql_query("select * from tbl__28partie__prenante ") or die("Query Failed".mysql_error());
while($r=mysql_fetch_array($kwery))
{
if(compare_from_exp($r['produit'],$activity_id)==1)
{
	$person.=$r['nom__de__la__partie'].',';
}
else
{
	$person.='';
}
}
return $person;
 }
function au ($activity_id,$o,$db)
 {
	 $db=$myq=mysql_query("select * from tbl__33chronogramme where act_id='".$activity_id."'") or die("Query Failed".$error());
	 $reading=mysql_fetch_array($myq);
	$p=0;
 for($l=1; $l<=12; $l++){
		 if($reading['au_'.$l.'']!=''){
		$p+=1;
	if($o==$p){
return'</br><span>Au: '.$reading['au_'.$l.''].'</span>&nbsp;';
	         }

									}

		
					 } 
	
}

function notification_time($du,$db,$activity_id,$range,$case){
$db=$r_pt_q=mysql_query("select * from tbl__36rapport where act_id='".$activity_id."' and chrono_id='".$range."'")or die("Query Failed".$error());
$rpt_checker=mysql_num_rows($r_pt_q);
$read=mysql_fetch_array($r_pt_q);
	$daylen = 60*60*24;
	$now=date('Y-m-d');
	$diff_day=(strtotime($now)-strtotime($du))/$daylen;
	$array_color=array('red'=>'#E12D13','blue'=>'#4D9BEA','green'=>'#83CC60','yellow'=>'#F2FD24','chocolate'=>'#B06111','gray'=>'#C0C0C0');
$start='Date programé: '.$du.'<br>Aujourd\'hui: '.$now.'<br>Diff Jrs: '.$diff_day.'<br>';
	 if($rpt_checker>=1 && $read['validation_chef_de_projet']=='valider')
	  {
		 $message='<strong>DÉJÀ FAIT</strong>';
		 $color=$array_color['blue'];
	  } else
	  {
	if($diff_day==0)
	{
		
		$message='<strong>AUJOURD\'HUI</strong>';
		$color=$array_color['green'];
	}
	 else if($diff_day>=1)
	 {
	
		$message='<strong>RETARD</strong>';
		$color=$array_color['red'];
		
	 }
	else if($diff_day >= -6)
	{
		$message='<strong>CETTE SEMAINE</strong>';
		$color=$array_color['yellow'];
	}
	 else if($diff_day >= -29 and $diff_day <-6)
		 {
	$message='<strong>CE MOIS</strong>';
	$color=$array_color['chocolate'];
		 }
		
		  else
		 {
		$message='<strong>A FAIRE</strong>'; 
		$color=$array_color['gray'];
		 }
	  }
	  if($case==1)
	  {
	  return $start.$message;
	  }else
	  {
		  return $color;
	  }
}
function slipt_record($string,$after_number)
{
	
    $array = str_split($string,$after_number); 

   return implode("<br>",$array);
}
function colors($id)
{
	switch($id)
	{
		case 1: $color="#060";break;
		case 2: $color="#666";break;
		case 3: $color="#999";break;
		case 4: $color="#CCC";break;
		case 5: $color="#FFF";break;
		case 6: $color="#F00";break;
		case 7: $color="#0F0";break;
		case 8: $color="#00F";break;
		case 9: $color="#FF0";break;
		case 10: $color="#0FF";break;
		case 11: $color="#F0F";break;
		case 12: $color="#006";break;
		case 13: $color="#009";break;
		case 14: $color="#00C";break;
		case 15: $color="#00F";break;
		case 16: $color="#900";break;
		case 17: $color="#906";break;
		case 18: $color="#90F";break;
		case 19: $color="#066";break;
		case 20: $color="#09F";break;
		case 21: $color="#6F0";break;
		case 22: $color="#6F9";break;
		case 23: $color="#FF0";break;
		case 24: $color="#FFC";break;
		case 25: $color="#F8B6CE";break;
		case 26: $color="#E18ED2";break;
		case 27: $color="#699";break;
		case 28: $color="#FEFCD3";break;
		case 29: $color="#9C3D4E";break;
		case 30: $color="#044F26";break;
		case 31: $color="#FFF1F0";break;
		case 32: $color="#D6FCBA";break;
		default:{$color="black";}
		
	}
	return $color;
}
function encaissement($db,$projet_id,$from,$to)
{
	$header='<table width="100%" border="0">
  <tr bgcolor="#E0EFFE">
    <td><strong>ENCAISSEMENT</strong></td>
  '.duplicate_15_100($db,'y2',0,$_GET['from'],$_GET['to'],0).'
  </tr>
  <tr  bgcolor="#EAFDEA">
  <td>Tranche</td>
    '.duplicate_15_100($db,'m2',0,$_GET['from'],$_GET['to'],0).'
    
  </tr>';
	$content='';
	$footer='</table>';
	$ids='';
	
	#$color_id=0;
  $content='<tr bgcolor="#EAFDEA">

    <td style="background-color:#D7F0FF;">
	Participation Locale
	</td>'.duplicate_15_100($db,'data3',$projet_id,$from,$to,1).'
	
	</tr>
	<tr bgcolor="#EAFDEA">
    <td style="background-color:#D7F0FF;">
	Contribution Baileur
	</td>'.duplicate_15_100($db,'data3',$projet_id,$from,$to,2).'
	</tr>
	<tr bgcolor="#EAFDEA">
    <td style="background-color:#D7F0FF;">
	Autres
	</td>'.duplicate_15_100($db,'data3',$projet_id,$from,$to,3).'
	</tr>';
 # duplicate_15_100($db,'data2',$row[0],$from,$to,$color_id)
	 $total_f='<tr> <td><strong>TOTAL</strong></td>
	'.duplicate_15_100($db,'data4',$projet_id,$from,$to,0).'
	</tr>';
	return $header.$content.$total_f.$footer;
	
}
function decaisement_pdf($db,$projet_id,$from,$to)
{
	$header='<table width="100%" border="0">
  <tr bgcolor="#E0EFFE">
    <td><strong>DECAISSEMENT</strong></td>
  '.duplicate_15_100($db,'y',0,$_GET['from'],$_GET['to'],0).'
  </tr>
  <tr  bgcolor="#EAFDEA">
  <td>Libelles</td>
    '.duplicate_15_100($db,'m',0,$_GET['from'],$_GET['to'],0).'
    
  </tr>';
	$content='';
	$footer='</table>';
	$ids='';
	
	$color_id=0;
	$db=$q=mysql_query("select * from  tbl__32libelle where projet_id='".$projet_id."'") or die("Query Failed".mysql_error());
 	 while($row=mysql_fetch_array($q)){
	  $color_id++;
  $content.='<tr bgcolor="#EAFDEA">

    <td style="background-color:#D7F0FF;">
	'.$row['description__de__la__depense'].'</td>
  '.duplicate_15_100($db,'data2',$row[0],$from,$to,$color_id).'
  </tr> ';
  $ids.=$row[0].',';
	 }
	 $ids=strrev(substr(strrev($ids),+1));
	 $total_f='<tr> <td><strong>TOTAL</strong></td>
	'.duplicate_15_100($db,'total_pt',$ids,$_GET['from'],$_GET['to'],0).'
	</tr>';
	
	return $header.$content.$total_f.$footer.encaissement($db,$projet_id,$from,$to);
	
}

function calculate_p_t_total($ids,$annee,$mois,$db,$totalbudget)
{
	$total=0;
	$expl=explode(',',$ids);
	for($i=0;$i<count($expl);$i++)
	{
		$per=foreign_value('where libelle_id="'.$expl[$i].'"','tbl__32libelle',7,$db);
		$prixu=foreign_value('where libelle_id="'.$expl[$i].'"','tbl__32libelle',9,$db);
		$qte=foreign_value('where libelle_id="'.$expl[$i].'"','tbl__32libelle',8,$db);
		if($totalbudget==1)
		{
			$total+=+($qte*$prixu*$per);
		}
		else if($totalbudget==2)
		{
			$total+=sum_rows3($db,'tbl__39sortie__des__fonds','quantite','prix__unitaire','frequence','where libelle_id="'.$expl[$i].'"');
		}else
		{
		$total+=+((sum_rowsone($db,'tbl__48libelle__tresorerie','quantite','where libelle_id="'.$expl[$i].'" and mois="'.$mois.'" and annee="'.$annee.'"')*$per)*$prixu);
		}
		
	}
	return $total;
}
function get_month($date)
{
$month=strrev(substr(strrev(substr($date,+5)),+3));
return $month;	
}
function get_day($date)
{
$day=substr($date,+8);

return $day;	
}
function get_year($date)
{
	return substr($date,0,4);
}
function mydropwodwn($db,$tbl,$ref,$id,$output,$css_lass,$js_command,$name,$description,$jsid)
{
	if(isset($_SESSION['DESIGNATION'])&& $jsid!=666){$style='';}else{$style='';}
	$header='<select name="'.$name.'" class="'.$css_lass.'" '.$js_command.' id="'.$jsid.'" '.$style.'><option value="">-- '.$description.' --</option>';
	$content='';
	$q=$db=mysql_query("select * from ".$tbl." ".$ref."") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($q))
	{
		if($tbl=='tbl__15classe')
		{
		$enseignantid=foreign_value($ref='where user_id='.$_SESSION['USER_ID'].'',$table='tbl__21extra__utilisateur',$fld_range=5,$database=$db);
		if(compare_from_exp($row['enseignant_id'],$enseignantid)<1){continue;}
		}
		$content.='<option value="'.$row[$id].'">'.$row[$output].'</option>';
	}
	$footer='</select>';
	return $header.$content.$footer;
}

function id_num_generator_mixer($conn,$tbl,$queries,$lenght,$mixer_string,$action)
{
	

	$get_last_number=mysql_query("select * from ".$tbl." ".$queries."") or die("Query Failed");
	$counter=mysql_num_rows($get_last_number);
	if($counter==0)
	{
	$counter=1;	
	}
	else
	{
	$counter=($counter+1);
	if($action=='edit')
	{
		$counter=($counter-1);
	}
	else
	{
		$counter=$counter;
	}	
	}
	$zeros='';
	$string_lenght=strlen($counter);
	$j=0;
	for($i=0; $i<$lenght; $i++)
	{
		$j++;

		if ($j>$string_lenght)
		{
			$zeros.='0';
		}
		
	}
	
	return $zeros.$counter.'/'.$mixer_string;

}
function num_classe($action_value,$valuedb)
{
	$header='<select id="num_id" style="width:100px;">
			<option value="">--Sel Num</option>';
			$footer='</select>';
			$content='';
			for($a=1; $a<=6; $a++)
			{
				if($action_value!='edit')
				{
					$select='';
				}
				else
				{
					if(substr($valuedb,0,1)==$a)
					{
						$select='selected';
					}else
					{
						$select=false;
					}
				}
				$content.='<option value="'.$a.'" '.$select.'>'.$a.'</option>';
			}
	
return $header.$content.$footer;		
}
function classe_alphabet($action_value,$valuedb)
{
	$header='<select id="alphabet_id" style="width:100px; text-transform:capitalize;" onchange="return show_class_name_1(this);">
			<option value="">--Sel Lettre</option>';
			$footer='</select>';
			$content='';
			for($a=1; $a<=26; $a++)
			{
				if($action_value!='edit')
				{
					$select='';
				}
				else
				{
					if(substr($valuedb,1,1)==alphabet($a))
					{
						$select='selected';
					}else
					{
						$select=false;
					}
				}
				$content.='<option value="'.alphabet($a).'" '.$select.'>'.alphabet($a).'</option>';
			}
	
return $header.$content.$footer;		
}
function alphabet($value)
{
	switch($value)
	{
		case 1: $letter='a'; break;
		case 2: $letter='b'; break;
		case 3: $letter='c'; break;
		case 4: $letter='d'; break;
		case 5: $letter='e'; break;
		case 6: $letter='f'; break;
		case 7: $letter='g'; break;
		case 8: $letter='h'; break;
		case 9: $letter='i'; break;
		case 10: $letter='j'; break;
		case 11: $letter='k'; break;
		case 12: $letter='l'; break;
		case 13: $letter='m'; break;
		case 14: $letter='n'; break;
		case 15: $letter='o'; break;
		case 16: $letter='p'; break;
		case 17: $letter='q'; break;
		case 18: $letter='r'; break;
		case 19: $letter='s'; break;
		case 20: $letter='t'; break;
		case 21: $letter='u'; break;
		case 22: $letter='v'; break;
		case 23: $letter='w'; break;
		case 24: $letter='x'; break;
		case 25: $letter='y'; break;
		case 26: $letter='z'; break;
		
		default:
		{
			$letter='unknown alphabet';
		}
		
	}
	return  $letter;
}
function ajax_url($id,$action)
{
	return'id="+id+"&case="+'.$id.'+"&email="+email+"&pwd="+pwd+"&cpwd="+cpwd+"&action="+"'.$action.'"+"';
}
function marks($value)
{
	$content='';
	for($i=0; $i<=$value; $i++)
	{
		$content.='<option value="'.$i.'">'.$i.'</option>';
	}
	return $content;
}
function display_fees($db,$tbl,$ref,$explode_string,$output,$student_id)
{
	$content='';
	$j=0;
	$q=$db=mysql_query("select * from  ".$tbl." ".$ref."") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($q))
	{
		$j++;
		if(compare_from_exp($explode_string,$row[0])<1){continue;}
		$content.='<div style="float:left; width:200px;">
		<div id="show_pay_id_'.$j.'"><label>'.$row[$output].'</label><input type="checkbox" onclick=" fee_'.$j.'()">
		('.$row['montant'].')<br/><a  onclick="history_'.$j.'();">Montant deja paye:</a>('.sum_rowsone($db,'tbl__27payer__les__frais','montant','where inscription__des__eleves_id="'.$student_id.'" and frais__scolaires_id="'.$row[0].'"').')</div>
		</div>
		';?>
        
        <script>
function fee_<?php echo $j;?>() {
    var a=5;
	var j='<?php echo $j;?>';
	var fee='<?php echo $row['montant'];?>';
	var fee_id='<?php echo $row[0];?>';
	var student_id=document.getElementById('student_id').value;
	var amount=document.getElementById('amount_id').value;
	var amount_paid='<?php echo sum_rowsone($db,'tbl__27payer__les__frais','montant','where inscription__des__eleves_id="'.$student_id.'" and frais__scolaires_id="'.$row[0].'"');?>';
    var r = confirm("Etes vous sure de vouloir payer cette frais?");
    if (r == true) {
	 $.ajax({
			type: "POST",
			url: "ajax/dispatch.php",
			data: "j="+j+"&amount="+amount+"&fee="+fee+"&fee_id="+fee_id+"&student_id="+student_id+"&amount_paid="+amount_paid+"",
			cache: false,
			beforeSend: function () { 
				$('#show_pay_id_<?php echo $j;?>').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#show_pay_id_<?php echo $j;?>").html( html );
			}
		});
	} 
  
}
</script>

<script>
function history_<?php echo $j; ?>()
{
    alert('Historique\n');
}
</script>
    <?php
		
	}
	return '<div style="width:100%;">'.$content.'</div>';
}
function splitervalue($stringvalues,$position)
{
	$k=0;
	$explode=explode(',',$stringvalues);
		for($a=0; $a<count($explode); $a++)
       {
        $k++;
        if($position==$k)
        {
	    return $explode[$a];
        }
      }
}
function mydropdown2outputs($db,$ref,$table,$class,$width,$onchange,$name,$output,$output2,$all_option,$all_option_label)
{
	$j=0;
	if($onchange==1)
	{
		$reload='form.submit();';
	}else{
		$reload=$onchange;
	}
	if($all_option==1)
	{
		$myall_opt='<option value="all">'.$all_option_label.'</option>';
	}else
	{
		$myall_opt='';
	}
	$header='<select name="'.$name.'" class="'.$class.'" onchange="'.$reload.'" style="width:'.$width.'">
	<option value="">--Selectionner--</option>
	'.$myall_opt.'';
	$footer='</select>';
	$db=$q=mysql_query("select * from ".$table." ".$ref." ") or die("Query failed");
	$option='';
	while($row=mysql_fetch_array($q))
	{
		$j++;
		
		{
			if($output2=='')
			{
				$option.='<option value="'.$row[0].'">'.$row[$output].'</option>';
			}else
			{
		$option.='<option value="'.$row[0].'">'.$row[$output].' &nbsp;'.$row[$output2].'</option>';
			}
		}
	}
	return $header.$option.$footer;
	}

	function fee_rpt($db,$table,$ref,$fee_id,$classeid,$from,$to)
	{
		$periode='Du: '.french_date($from).'&nbsp; Au: '.french_date($to).'<br/>';
		$header='<table width="100%">
		<tr bgcolor="#C1DFFD">
		<th>Date</th>'.genfee($db,$fee_id,$classeid,'head',$ref,'').'
		<th>Total general</th>
		</tr>';
		$content='';
		$footer='</table>';
		$total_right=0;
		$q=$db=mysql_query("select distinct date from ".$table." ".$ref."  ") or die("Query Failed".mysql_error());
		while($row=mysql_fetch_array($q))
		{
			
			$total_right+=+getvalues($db,$row['date'],$fee_id,'amount',$classeid);
			$content.='<tr bgcolor="#fff">
		<td>'.french_date($row['date']).'</td>'.genfee($db,$fee_id,$classeid,'body',$ref,$row['date']).'
		<td>'.getvalues($db,$row['date'],$fee_id,'amount',$classeid).'</td>
		</tr>';
		}
		$total_gen='<tr bgcolor="#FFFFCC">
		<td>Total general</td>'.genfee($db,$fee_id,$classeid,'total','','',$from.','.$to.'').'
		<td>'.$total_right.'</td>
		</tr>';
		return $periode.$header.$content.$total_gen.$footer;
	}
	function genfee($db,$fee_id,$classeid,$type,$ref,$date,$output='txt')
	{
	if($fee_id=='all' && $classeid<1)
	{
	$q=$db=mysql_query("select  * from  tbl__14frais__scolaires ") or die("Query Failed".mysql_error());
	$content='';
	while($myrow=mysql_fetch_array($q))
	{	
		if($type=='head')
		{
			$content.='<th align="left">'.$myrow['nom__du__frais'].'</th>';
		}
		else if($type=='body')
		{
			$content.='<td align="left">'.getvalues($db,$date,$myrow[0],$output,$classeid).'</td>';
		}
		else if($type=='total')
		{
			$content.='<td align="left">'.getvalues($db,$date,$myrow[0],'total,'.$output,$classeid).'</td>';
		}
	}
		
	}else
	{
		
		
		if($fee_id =='all' && $classeid>0)
		{
			$content='';
			$exp=explode(',',foreign_value('where classe_id="'.$classeid.'"','tbl__15classe','frais__scolaires_id',$db));
		   for($i=0; $i<count($exp); $i++)
		  {
			if($type=='head')
			{
			$content.='<th align="left">'.foreign_value('where frais__scolaires_id="'.$exp[$i].'"','tbl__14frais__scolaires','nom__du__frais',$db).'</th>';
			}
			else if($type=='body')
			{
			$content.='<td align="left">'.getvalues($db,$date,$exp[$i],$output,$classeid).'</td>';
			}
			else if($type=='total')
			{
			$content.='<td align="left">'.getvalues($db,$date,$exp[$i],'total,'.$output,$classeid).'</td>';
			}
			
		 }
		}else
		{
			if($type=='head')
			{
			$content='<th align="left">'.foreign_value('where frais__scolaires_id="'.$fee_id.'"','tbl__14frais__scolaires','nom__du__frais',$db).'</th>';
			}
			else if($type=='body')
			{
				$content='<td>'.getvalues($db,$date,$fee_id,$output,$classeid).'</td>';
			}
			else if($type=='total')
			{
				$content='<td>'.getvalues($db,$date,$fee_id,'total,'.$output,$classeid).'</td>';
			}
		}
	}
	return $content;
		
	}
function getvalues($db,$date,$feeid,$type,$classeid)
{
	
	if($type=='txt')
	{
		$k=$db=mysql_query("select * from  tbl__27payer__les__frais where date='".$date."' and frais__scolaires_id='".$feeid."'") or die("Query Failed".mysql_error());
	}
	else
	{
		$spliter=explode(',',$type);
		if($spliter[0]=='total')
		{
			$k=$db=mysql_query("select * from  tbl__27payer__les__frais where  frais__scolaires_id='".$feeid."' and date between '".$spliter[1]."' and '".$spliter[2]."' ") or die("Query Failed".mysql_error());
		}else
		{
				if($feeid=='all')
				{
					
					$k=$db=mysql_query("select * from  tbl__27payer__les__frais where date='".$date."'") or die("Query Failed".mysql_error());
					
				}else
				{
					
					$k=$db=mysql_query("select * from  tbl__27payer__les__frais where date='".$date."' and frais__scolaires_id='".$feeid."'") or die("Query Failed".mysql_error());
				}
		}
	}
	
	$content='';
	$total=0;
	while($read=mysql_fetch_array($k))
	{
		//classe
		if($classeid!=''){if(skip_class($db,$read['inscription__des__eleves_id'],$classeid)==0){continue;}}
		//classe
		
		
		$total+=+$read['montant'];	
		if($type=='txt')
		{
		$el_classe_id=foreign_value('where inscription__des__eleves_id="'.$read['inscription__des__eleves_id'].'"','tbl__17inscription__des__eleves','classe_id',$db);
		$content.=foreign_value('where inscription__des__eleves_id="'.$read['inscription__des__eleves_id'].'"','tbl__17inscription__des__eleves','nom__complet',$db).'| '.foreign_value('where classe_id="'.$el_classe_id.'"','tbl__15classe','nom__de__la__classe',$db).'<br/>';
		}
	}
	if($type=='txt')
		{
	return $content.'<hr>Total:'.$total;
		}
		else
		{
			
			return $total;
		}
}
function french_date($date)
{
$create_date = date_create_from_format('Y-m-d',substr($date,0,10));

	if($create_date == true)
  {
  $french_date=date_format($create_date,'d/m/Y');
  return $french_date;
  }
}
function skip_class($db,$stdid,$classeid)
{
	$myclassid=foreign_value('where inscription__des__eleves_id="'.$stdid.'"','tbl__17inscription__des__eleves','classe_id',$db);
	if($classeid==$myclassid)
	{
		return 1;
	}else
	{
		return 0;
	}
}
function insolvable($db,$table,$ref,$feeid,$classeid,$from,$to)
{
	$header='<table width="100%">
	
	<tr bgcolor="#C1DFFD">
    <th align="left">Numero </th>
    <th align="left">Nom complets</th>
    '.genfee_ins($db,$feeid,$classeid,$stdid=0,'head',$from,$to).'
    <th align="left">Total frais a payer</th>
    <th align="left">Total frais deja paye</th>
    <th align="left">Total rester a payer</th>
  </tr>
	';
	
	$footer='</table>';
	$content='';
	$q=$db=mysql_query("select * from ".$table." ".$ref."") or die('Query Failed'.mysql_error());
	//$n=mysql_num_rows($q);
	while($row=mysql_fetch_array($q))
	{
		$content.=retrieve_std($db,$row[0],$row['nom__de__la__classe'],$ref,$from,$to,'data',$feeid);
	}
	return $header.$content.$footer;
}
function genfee_ins($db,$feeid,$classeid,$stdid=0,$type,$from,$to)
{
   $content='';
   $total=0;
		$k=$db=mysql_query("select * from  tbl__14frais__scolaires") or die("cmd error");
		while($read=mysql_fetch_array($k))
		{
			$fees=foreign_value('where classe_id="'.$classeid.'"',' tbl__15classe','frais__scolaires_id',$db);
			if($feeid!='all'){if($read[0]!=$feeid){continue;}}
				if($type=='head')
				{
				       
						$content.='<th align="left">'.$read['nom__du__frais'].'</th>';
				}
				else if($type=='body')
				{
					
					$fees=foreign_value('where classe_id="'.$classeid.'"',' tbl__15classe','frais__scolaires_id',$db);
					if(compare_from_exp($fees,$read[0])<1){$insolvabilite='none';}
					else{
					$montant_frais=foreign_value('where frais__scolaires_id="'.$read[0].'"','tbl__14frais__scolaires','montant',$db);
					$insolvabilite=($montant_frais-sum_rowsone($db,'tbl__27payer__les__frais','montant','where frais__scolaires_id="'.$read[0].'" and inscription__des__eleves_id ="'.$stdid.'"'));
						}
					
					$content.='<td>'.$insolvabilite.'</td>';
				}
				else if($type =='total_a_payer')
				{
					
					$fees=foreign_value('where classe_id="'.$classeid.'"',' tbl__15classe','frais__scolaires_id',$db);
					if(compare_from_exp($fees,$read[0])<1){continue;}
					else
					{
						$content+=+$read['montant'];
					}
					
				}
				else if($type =='total_payer')
				{
					
					$fees=foreign_value('where classe_id="'.$classeid.'"',' tbl__15classe','frais__scolaires_id',$db);
					if(compare_from_exp($fees,$read[0])<1){continue;}
					else
					{
						$content+=+sum_rowsone($db,'tbl__27payer__les__frais','montant','where frais__scolaires_id="'.$read[0].'" and inscription__des__eleves_id ="'.$stdid.'"');
					}
					
				}
				
				
					
				
			}
		
	
	/*
	else
	{
		$fee_string=foreign_value('where classe_id="'.$classeid.'"',' tbl__15classe','frais__scolaires_id',$db);
		$exp=explode(',',$fee_string);
		for($i=0; $i<count($exp); $i++)
		{
			if($type =='head')
			{
				if($feeid<1)
				{
					$content.='<th align="left">'.foreign_value('where frais__scolaires_id="'.$exp[$i].'"',' tbl__14frais__scolaires','nom__du__frais',$db).'</th>';
				}
				else
				{
					if($feeid!=$exp[$i])
					{
						continue;
					}else
					{
						$content.='<th align="left">'.foreign_value('where frais__scolaires_id="'.$exp[$i].'"',' tbl__14frais__scolaires','nom__du__frais',$db).'</th>';
					}
				}
			}
			else if($type=='body')
			{
				$content.='<td>B20</td>';
				
			}
			
		}
		
	}*/
	return $content;
}
function retrieve_std($db,$classe_id,$classename=0,$ref,$from,$to,$type,$feeid)
{
	
	$q=$db=mysql_query("select * from tbl__17inscription__des__eleves  where classe_id='".$classe_id."'") or die('Query failed');
	$n=mysql_num_rows($q);
	$content='';
	$j=0;
	while($row=mysql_fetch_array($q))
	{
	$j++;
	if($j==1)
	{
		$spanrow='<td rowspan="'.$n.'">'.$classename.'</td>';
	}else
	{
		$spanrow='';
	}
	
	$montantapayer=genfee_ins($db,$feeid,$classe_id,$row[0],'total_a_payer',$from,$to);
	$montadjpay=genfee_ins($db,$feeid,$classe_id,$row[0],'total_payer',$from,$to);
	$reste=($montantapayer-$montadjpay);
	$content.='
	<tr bgcolor="#FFF">
    '.$spanrow.'
    <td>'.$row['nom__complet'].'</td>
  '.genfee_ins($db,$feeid,$classe_id,$row[0],'body',$from,$to).'
    <td>'.$montantapayer.'</td>
    <td>'.$montadjpay.'</td>
    <td>'.$reste.'</td>
  </tr>';
	}
	if($type='data')
	{
		return $content;
	}
	
}

function journal_caisse_rpt($db,$table,$ref,$from,$to,$sel,$caisse_bank)
{
	$q=$db=mysql_query("select * from ".$table." ".$ref."") or die('Query Failed'.mysql_error());
	$body_arr=array();
	while($row=mysql_fetch_array($q))
	{
		$body_arr[]=$row['date'].','.$row[0].',e';
	}
	$footer='</table>';
	$output_array=array_merge($body_arr,fee_incoming($db,$from,$to,$type='data',$sel,$caisse_bank));
	return $output_array;//$periode.$header.$body.$footer;
}
function sortie($from,$to,$db,$type='data',$sel,$caisse_bank,$design='html')
{
if($design!='html'){$attribut='width="10%"';}else{$attribut='';}
$header='<table>
<tr bgcolor="#FFFFDD">
<th colspan="5" align="left">SORTIES</th>
</tr>
	<tr bgcolor="#C1DFFD">
	<th align="left">Date</th>
	<th align="left">Libelle/motif</th>
	<th align="left">Sorties</th>
	<th align="left">Caisse ou banque</th>
	</tr>';
	$footer='</table>';
if($sel==3)
{
$q=$db=mysql_query("select * from tbl__29sortie where date between '".$from."' and '".$to."' order by date") or die('Query Failed'.mysql_error());
}
else if($sel == 2)
{
$q=$db=mysql_query("select * from tbl__29sortie where categorie_id=2  and caisse__ou__banque_id ='".$caisse_bank."' and  date between '".$from."' and '".$to."' order by date") or die('Query Failed'.mysql_error());	
}
else if($sel == 1)
{
$q=$db=mysql_query("select * from tbl__29sortie where categorie_id=1  and caisse__ou__banque_id ='".$caisse_bank."' and  date between '".$from."' and '".$to."' order by date") or die('Query Failed'.mysql_error());	
}
$total=0;
$content='';
while($read=mysql_fetch_array($q))
{
	$total+=+$read['montant'];
	
	  if($read['categorie_id']== 1)
	  {
		$bc= foreign_value('where  caisse_id="'.$read['caisse__ou__banque_id'].'"','tbl__23caisse','caisse',$db);
	  }
	  else
	  {
		 $bc= foreign_value('where banque_id="'.$read['caisse__ou__banque_id'].'"','tbl__24banque','banque',$db);//libelle
	  }
	$content.='<tr bgcolor="#FFFFFF">
	<td>'.$read['date'].'</td>
	<td>'.$read['motif'].'</td>
	<td align="right">'.$read['montant'].'</td>
	<td>'.$bc.'</td>
	</tr>';
}
$total_footer='
<tr bgcolor="#FFFFDD">
<td><strong>Total</strong></td>
<td align="right" colspan="2"><strong>'.$total.'</strong></td>
</tr>';
if($type =='total')
{
 return $total;	
}else
{
return $header.$content.$total_footer.$footer;
}
}

function fee_incoming($db,$from,$to,$type='data',$sel,$caisse_bank)
{
	
	if($sel == 3)
	{
		$q=$db=mysql_query("select * from  tbl__27payer__les__frais where  date between '".$from."' and '".$to."'") or die('Query Failed'.mysql_error());
	}
	else if($sel == 2)
	{
		$q=$db=mysql_query("select * from  tbl__27payer__les__frais where  	treasure_bank =2 and treasure_bank_id='".$caisse_bank."' and  date between '".$from."' and '".$to."'") or die('Query Failed'.mysql_error());
	}
	else if($sel == 1)
	{
		$q=$db=mysql_query("select * from  tbl__27payer__les__frais where  	treasure_bank =1 and treasure_bank_id='".$caisse_bank."' and  date between '".$from."' and '".$to."'") or die('Query Failed'.mysql_error());
	}
	$body_arr=array();
	$total=0;
	while($row=mysql_fetch_array($q))
	{
		$body_arr[]=$row['date'].','.$row[0].',p';
	}
	return $body_arr;
	
}
function DateSort($a, $b) {

    // If the dates are equal, do nothing.
    if($a == $b) return 0;
    
    // Dissassemble dates
    list($amonth, $aday, $ayear) = explode('-',$a);
    list($bmonth, $bday, $byear) = explode('-',$b);

    // Pad the month with a leading zero if leading number not present
    $amonth = str_pad($amonth, 2, "0", STR_PAD_LEFT);
    $bmonth = str_pad($bmonth, 2, "0", STR_PAD_LEFT);

    // Pad the day with a leading zero if leading number not present
    $aday = str_pad($aday, 2, "0", STR_PAD_LEFT);
    $bday = str_pad($bday, 2, "0", STR_PAD_LEFT);

    // Reassemble dates
    $a = $ayear . $amonth . $aday;
    $b = $byear . $bmonth . $bday;

    // Determine whether date $a > $date b
    return ($a > $b) ? 1 : -1;
}
function real_journal_caisse($db,$dates,$from,$to,$sel,$caisse_bank,$design='html')
{
usort($dates,'DateSort'); 
$data='';
$header='<table>
<tr bgcolor="#FFFFDD">
<th colspan="5" align="left">ENTREES</th>
</tr>
	<tr bgcolor="#C1DFFD">
	<th align="left">Date</th>
	<th align="left">Libelle/motif</th>
	<th align="left">Entrees</th>
	<th align="left">Caisse ou banque</th>
	</tr>';
$footer='</table>';
$content='';
$total=0;
foreach ($dates as $value)
{
$data.=$value.'<br/>';
$content.='<tr bgcolor="#FFFFFF">
		<td>'.read_row_jc($db,$value,1).'</td>
		<td>'.read_row_jc($db,$value,2).'</td>
		<td align="right">'.read_row_jc($db,$value,3).'</td>
		<td>'.read_row_jc($db,$value,4).'</td>
		</tr>';
		$total+=+read_row_jc($db,$value,3);
}
$total_footer='<tr bgcolor="#FFFFDD">
<td><strong>Total</strong></td>
<td colspan="2" align="right"><strong>'.$total.'</strong></td>
</tr>
<tr bgcolor="#FFFFDD">
<td><strong>Solde</strong></td>
<td colspan="2" align="right"><strong>'.($total-sortie($from,$to,$db,'total',$sel,$caisse_bank,$design)).'</strong></td>
</tr>';
switch($sel)
{
	case 3:
	$des='Global<br/>';
	break;
	case 2:
	$des='Banque : '.foreign_value('where banque_id="'.$caisse_bank.'"',' tbl__24banque','banque',$db).'<br/>';
	break;
	case 1:
	$des='Caisse : '.foreign_value('where caisse_id ="'.$caisse_bank.'"','tbl__23caisse','caisse',$db).'<br/>';
	break;
}

$periode='Du: '.french_date($from).' Au: '.french_date($to).'<br>';
$head_title='<div style="width:100%; margin-bottom:20px;">'.$periode.$des.'</div>';
if($design!='html'){$attribut1=' width:100%;'; $attribut2=' width:100%;';$title=''; }else{$attribut1=''; $attribut2='';$title=$head_title;}
$part_a='<div style="width:100%"><div style="float:left; '.$attribut1.' ">'.$header.$content.$total_footer.$footer.'</div>';
$part_b='<div style="float:left; '.$attribut2.' ">'.sortie($from,$to,$db,'data',$sel,$caisse_bank,$design).'</div></div>';
return $title.$part_a.$part_b;
}


 function read_row_jc($db,$string_v,$type)
{
	$exp=explode(',',$string_v);
	
	if($exp[2]=='e')
	{
	 if($type==1)
	 {
	  return french_date(foreign_value('where entree_id="'.$exp[1].'"','tbl__33entree','date',$db));//date
	 }
	 else if($type==2)
	 {
	  return foreign_value('where entree_id="'.$exp[1].'"','tbl__33entree','motif',$db);//libelle
	 }
	  else if($type==3)
	 {
	  return foreign_value('where entree_id="'.$exp[1].'"','tbl__33entree','montant',$db);//libelle
	 }
	 else if($type==4)
	 {
		 $bc=foreign_value('where entree_id="'.$exp[1].'"','tbl__33entree','categorie_id',$db);
		 $bcid=foreign_value('where entree_id="'.$exp[1].'"','tbl__33entree','caisse__ou__banque_id',$db);
	  if($bc== 1)
	  {
		return foreign_value('where  caisse_id="'.$bcid.'"','tbl__23caisse','caisse',$db);
	  }
	  else
	  {
	  return foreign_value('where banque_id="'.$bcid.'"','tbl__24banque','banque',$db);//libelle
	  }
	 }	
	}
	
	else
	{
		$fee_id=foreign_value('where payer__les__frais_id="'.$exp[1].'"','tbl__27payer__les__frais','frais__scolaires_id',$db);
		$std_id=foreign_value('where payer__les__frais_id="'.$exp[1].'"','tbl__27payer__les__frais','inscription__des__eleves_id',$db);
		$fee=foreign_value('where frais__scolaires_id="'.$fee_id.'"','tbl__14frais__scolaires','nom__du__frais',$db);
		$student_name=foreign_value('where inscription__des__eleves_id="'.$std_id.'"','tbl__17inscription__des__eleves','nom__complet',$db);
		$classe_id=foreign_value('where inscription__des__eleves_id="'.$std_id.'"','tbl__17inscription__des__eleves','classe_id',$db);
		$classe=foreign_value('where  classe_id="'.$classe_id.'"',' tbl__15classe','nom__de__la__classe',$db);
	if($type==1)
	 {
	  return french_date(foreign_value('where payer__les__frais_id="'.$exp[1].'"','tbl__27payer__les__frais','date',$db));//date
	 }
	 else if($type==2)
	 {
	  return $fee.'/'.$student_name.'/'.$classe;//libelle
	 }
	  else if($type==3)
	 {
	  return foreign_value('where payer__les__frais_id="'.$exp[1].'"',' tbl__27payer__les__frais','montant',$db);//libelle
	 }
	 else if($type==4)
	 {
		 $bc=foreign_value('where payer__les__frais_id="'.$exp[1].'"',' tbl__27payer__les__frais','treasure_bank',$db);
		 $bcid=foreign_value('where payer__les__frais_id="'.$exp[1].'"',' tbl__27payer__les__frais','treasure_bank_id',$db);
	  if($bc== 1)
	  {
		return foreign_value('where  caisse_id="'.$bcid.'"','tbl__23caisse','caisse',$db);
	  }
	  else
	  {
	  return foreign_value('where banque_id="'.$bcid.'"','tbl__24banque','banque',$db);//libelle
	  }
	 }	
	}
	
	
}

function student_list($db,$section,$option,$classe)
{
$mysection=foreign_value('where  section_id="'.$section.'"','tbl__11section','section',$db);
$myoption=foreign_value('where option_id="'.$option.'"',' tbl__20option','option__degre',$db);
$myclasse=foreign_value('where classe_id="'.$classe.'"','tbl__15classe','nom__de__la__classe',$db);
$title='Section: '.$mysection.', option: '.$myoption.', classe: '.$myclasse.'';
$header='<table width="100%">
<tr bgcolor="#A6D1FD">
<th align="left">No</th>
<th align="left">Nom complet</th>
</tr>';
$content='';
$j=0;
$q=$db=mysql_query("select * from  tbl__17inscription__des__eleves where  	classe_id='".$classe."'") or die("Query Failed".mysql_error());
while($row=mysql_fetch_array($q))
{
	$j++;
	$content.='<tr bgcolor="#FFFFFF">
	<td>'.$j.'</td>
	<td>'.$row['nom__complet'].'</td>
	</tr>';
}
if($j>0)
{
	$content=$content;
}
else
{
	$content='<tr  bgcolor="#FFD9D9">
	<td colspan="2">Aucune donnee disponible</td>
	</tr>';
}
$footer='</table>';	
return $title.$header.$content.$footer;
}
function gen_diploma($db,$classe_id,$student_id)
{
$section=foreign_value('where 	classe_id="'.$classe_id.'"','tbl__15classe','section_id',$db);
$trim=foreign_value('where classe_id="'.$classe_id.'"','tbl__15classe',8,$db);
if($section == 1)
{
	//maternelle
$header='<table width="100%" border="0">
  <tr>
    <td colspan="'.gen_periode($db,$trim,'n').'" width="50%">
     <p>Nom et Post-nom:'.foreign_value('where inscription__des__eleves_id="'.$student_id.'"','tbl__17inscription__des__eleves','nom__complet',$db).'</p>
    <p>Sexe :'.foreign_value('where inscription__des__eleves_id="'.$student_id.'"','tbl__17inscription__des__eleves','genre',$db).' </p>
    <p>Classe :'.foreign_value('where classe_id="'.$classe_id.'"','tbl__15classe','nom__de__la__classe',$db).'</p>
    <p>Matricule :'.foreign_value('where inscription__des__eleves_id="'.$student_id.'"','tbl__17inscription__des__eleves','numero__matricule',$db).'</p>
    </td>
  </tr>
  <tr bgcolor="#C1DFFD">
    <td colspan="'.gen_periode($db,$trim,'n').'">Trimestre</td>
    '.gen_periode($db,$trim,'p').'
	<td>Total</td>
  </tr>
';
$content='';
$gotten_mark=0;
$max_mark=0;
$total_mark=0;
$myoptionid=foreign_value('where classe_id="'.$classid.'"','tbl__15classe','option_id',$db);
$q=$db=mysql_query("select * from   tbl__43branches where option_id='".$myoptionid."'") or die('Query Failed'.mysql_error());
while($row=mysql_fetch_array($q))
{
	$content.='<tr bgcolor="#FFFFFF">
    <td colspan="'.gen_periode($db,$trim,'n').'">'.$row['branche'].'</td>
    '.gen_periode($db,$trim,'m',$student_id,$row[0]).'
	<td>'.gen_periode($db,$trim,'total_rows',$student_id,$row[0]).'/'.gen_periode($db,$trim,'total_maxpoint',$student_id,$row[0]).'</td>
  </tr>';
$total_mark+=+gen_periode($db,$trim,'total_rows',$student_id,$row[0]);

}
$perc=round((($total_mark*100)/gen_periode($db,$trim,'total_max',$student_id,0,$classe_id)),2);
$total_gen='<tr bgcolor="#FFFFDD">
<td colspan="'.gen_periode($db,$trim,'n').'" rowspan="3"><strong>Total</strong></td>
'.gen_periode($db,$trim,'total',$student_id,0,$classe_id).'
<td><div>'.$total_mark.'/'.gen_periode($db,$trim,'total_max',$student_id,0,$classe_id).'</div>
<div>'.$perc.'%</div>
<div>'.percent_color($perc,'con').'</div>
<div style="background-color:'.percent_color($perc,'c').'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
</tr>';
$footer='</table>';
return $header.$content.$total_gen.$footer;
	
}

else
{
	return 'unknown';
}
}

function gen_periode($db,$n,$type,$stdid=0,$courseid=0,$classid=0)
{
	$j=0;
	$content='';
	$mark='';
	$total='';
	$total_rows=0;
	$total_max=0;
	$total_maxpoint=0;
	for($i=0;$i<$n;$i++)
	{
		$j++;
		$mymark=foreign_value('where inscription__des__eleves_id="'.$stdid.'" and cours_id="'.$courseid.'" and order_id="'.$j.'"',' tbl__37point_eleve','mark',$db);
		if($mymark<1){$mymark=0;}else{$mymark=$mymark;}
		$content.='<td> Trim '.$j.'</td>';
		$mark.='<td>'.$mymark.'/'.foreign_value('where  cours_id="'.$courseid.'"','tbl__13cours','max__trimestre',$db).'</td>';
		$total.=get_diploma_total($db,$j,$stdid,$classid,'gotten');
		$total_rows+=+foreign_value('where inscription__des__eleves_id="'.$stdid.'" and cours_id="'.$courseid.'" and order_id="'.$j.'"',' tbl__37point_eleve','mark',$db);
		$total_max+=+get_diploma_total($db,$j,$stdid,$classid,'total_max');
		$total_maxpoint+=+foreign_value('where  cours_id="'.$courseid.'"','tbl__13cours','max__trimestre',$db);
	}
	if($type =='n')
	{
		return $j;
	}
	else if($type == 'p')
	{
		return $content;
	}
	else if($type == 'm')
	{
		return $mark;
	}
	else if($type == 'total')
	{
		return $total;
	}
	else if($type =='total_rows')
	{
		return $total_rows;
	}
	else if($type =='total_max')
	{
		return $total_max;
	}
	else if($type =='total_maxpoint')
	{
		return $total_maxpoint;
	}
	
}

function get_diploma_total($db,$ordering,$stdid,$classid,$type)
{
	$total1=0;
	$total2=0;
	$myoptionid=foreign_value('where classe_id="'.$classid.'"','tbl__15classe','option_id',$db);
	$q=$db=mysql_query("select * from   tbl__43branches where option_id='".$myoptionid."'") or die('Query Failed'.mysql_error());
	while($row=mysql_fetch_array($q))
	{
		$total1+=foreign_value('where cours_id="'.$row[0].'" and inscription__des__eleves_id="'.$stdid.'" and order_id ="'.$ordering.'" ',' tbl__37point_eleve','mark',$db);
		$total2+=+$row['max__trimestre'];
	}
	$percentage=round((($total1*100)/$total2),2);
	if($type =='gotten')
	{
		
		return '<td><div>'.$total1.'/'.$total2.'</div>
		<div>'.$percentage.'%</div>
		<div>Conduite: '.percent_color($percentage,'con').'</div>
		<div style="background-color:'.percent_color($percentage,'c').'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>';
	}
	else if($type =='max')
	{
		return $total2; 
	}
	else if($type =='c')
	{
		return percent_color($percentage,'c');
	}
	else if($type =='total_max')
	{
		return $total2;
	}
	
}
function percent_color($mark,$type)
{
	if($mark >79 && $mark<=100)
	{
		$color='#FFFF00';
		$conduite='Elite';
	}
	else if($mark >69 && $mark<=79)
	{
		$color='#0000FF';
		$conduite='T.B';
	}
	else if($mark >49 && $mark<=69)
	{
		$color='#17FF17';
		$conduite='BON';
	}
	else if($mark > 39 && $mark<=49)
	{
		$color='#000000';
		$conduite='A.B';
	}
	else
	{
		$color='#FF0000';
		$conduite='Med';
	}
	if($type =='c')
	{
		return $color;
	}
	else
	{
		return $conduite;
	}
}
function ShowSection($db)
{
	 $header=' <ul>
           <li><a href="section.php" rel="facebox">Ajouter Section</a></li>';
     $footer='</ul>';
	$content='';
	$q=$db=mysql_query("select * from  tbl__11section") or die("Query failed".mysql_error());
	while($row = mysql_fetch_array($q))
	{
		$content.='<li style="text-transform:capitalize;">'.$row['section'].' &nbsp;<a href="section.php?id='.$row[0].'" rel="facebox">Edit</a> &nbsp;<a href="option.php?SectionId='.$row[0].'" rel="facebox">Ajouter Option ou Degre</a> '.ShowOption($db,$row[0]).'</li> ';
	}
	return $header.$content.$footer;
}
function ShowOption($db,$SectionId)
{
	$header='<ul>';
	$footer='</ul>';
	$content='';
	$q=$db=mysql_query("select * from tbl__20option where section_id='".$SectionId."'") or die('Query Failed'.mysql_error());
	while($row=mysql_fetch_array($q))
	{
		if(foreign_value('where option_id="'.$row[0].'"','tbl__41periodicite','option_id',$db)>0)
		{
			$edit='<a href="periodicite.php?optionid='.$row[0].'&id='.foreign_value('where option_id="'.$row[0].'"','tbl__41periodicite','periodecite_id',$db).'" rel="facebox">Per Edit </a>';
		}
		else
		{
			$edit='<a href="periodicite.php?optionid='.$row[0].'" rel="facebox">Periodicite</a>';
		}
		
		
			$edit2='<a href="activite.php?optionid='.$row[0].'" rel="facebox">Activite</a>';
		
		$content.='<li style="text-transform:capitalize;">'.$row['option__degre'].'&nbsp; <a href="option.php?id='.$row[0].'&SectionId='.$row['section_id'].'" rel="facebox">Edit</a>&nbsp;|'.$edit.'&nbsp;|'.$edit2.' '.ShowActivites($db,$row[0]).'</li>';
	}
	return $header.$content.$footer;
}
function ShowActivites($db,$optionid)
{
	$header='<ul>';
	$footer='</ul>';
	$content='';
	$q=$db=mysql_query("select * from tbl__42activites where option_id='".$optionid."'") or die('Query Failed'.mysql_error());
	while($row=mysql_fetch_array($q))
	{
		$content.='<li style="text-transform:capitalize;">'.$row['activite'].'<a href=""></a> |<a href="activite.php?optionid='.$optionid.'&id='.$row[0].'" rel="facebox">Edit </a>&nbsp;|<a href="branches.php?ActiviteId='.$row[0].'&OptionId='.$optionid.'" rel="facebox">Braches</a>'.ShowBranches($db,$row[0],$optionid).'</li>';
	}
	return $header.$content.$footer;
}
function ShowBranches($db,$activiteid,$optionid)
{
	$header='<ul>';
	$footer='</ul>';
	$content='';
	$q=$db=mysql_query("select * from  tbl__43branches  where activite_id='".$activiteid."' ") or die('Query failed'.mysql_error());
	while($row=mysql_fetch_array($q))
	{
		$content.='<li style="text-transform:capitalize;">'.$row['branche'].' <a href="branches.php?id='.$row[0].'" rel="facebox">Edit</a></li>';
	}
	return $header.$content.$footer;
}
?>