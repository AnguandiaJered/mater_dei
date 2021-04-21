<?php
session_start();
include('../../phpscript/classe_lib.php');
include('../../phpscript/connection.php');
$db=db_connection();
if($_SESSION['DESIGNATION']=='user')
{
	$sess='and user_id='.$_SESSION['USER_ID'].'';
}else
{
	$sess='';
}
$province_id=$_GET['province'];
#$object_id=explode(',',$_GET['object']);
$from=$_GET['from'];
$to=$_GET['to'];
$option=$_GET['option'];
$type=$_GET['type'];
$top='<table cellspacing="0" cellpadding="0"   style="border: 1px solid #bbb; width:100%;">
 
  <tr>
    <td rowspan="3" bgcolor="#AEF9B3" style="text-align:center" width="130">VULNERABILITE</td>
	';
  
$bottom='</table>';
//territoires starts
$territoire='';
$tranche_age='';
$genre='';
$a=0;
if(isset($_GET['ter_id']))
{   $j=0;
	$terr_ref='and territoire__ville_id="'.$_GET['ter_id'].'"';
	$extra_col='<td>T</td>';
	$span_g=3;
	$span_ter=6;
	$vul_ids='';
	$g_1width='style="width:15%;"';
	if($_GET['vul']==''||$_GET['ter_id']==''||$_GET['from']==''||$_GET['to']=='')
		{
			//redirect back
			header('location:../../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu='.FK.'&option='.$option.'&province='.$province_id.'&type='.$type.'');
		exit();}
	$vul_explode=explode(',',$_GET['vul']);
	for($i=0;$i<count($vul_explode);$i++)
	{
		$j++;
		$vul_ids.='sous_types__des__vulnerabilites__principales_id='.$vul_explode[$i].' or ';
	}
	$vul_ids=strrev($vul_ids);
	$vul_ids=substr($vul_ids,+4);
	$vul_ids='where '.strrev($vul_ids).' and vulnerabilite__courant=1';
}else
{   
    if($_GET['from']==''||$_GET['to']=='')
		{
			//redirect back
			header('location:../../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu='.FK.'&option='.$option.'&province='.$province_id.'&type='.$type.'');
		exit();}
	$terr_ref='';
	$extra_col='';
	$span_g=2;
	$span_ter=4;
	$vul_ids='where vulnerabilite__courant=1';
	$g_1width='';
}


$q=mysql_query("select * from  tbl__06territoire00__ville where province_id ='$province_id'  ".$terr_ref."") or die("Query Failed".mysql_error());
$count=mysql_num_rows($q);
while($row=mysql_fetch_array($q))
{
	$a++;
	if($a==1)
	{
	$tranche_age.='<tr bgcolor="#EFDBC7" style="text-align:center"><td colspan="'.$span_g.'">0-12ans</td><td colspan="'.$span_g.'">13-17ans</td>';	
	$territoire.=' <td colspan="'.$span_ter.'" bgcolor="#61C6FC" width="59" style="text-align:center">'.$row[2].'</td>';
	$genre.='<tr bgcolor="#EFDBC7"><td '.$g_1width.'>G</td><td>F</td>'.$extra_col.'<td>G</td><td>F</td>'.$extra_col.'';
	}
	else if($a==$count)
	{
		$territoire.=' <td colspan="4" bgcolor="#61C6FC" width="59" style="text-align:center">'.$row[2].'</td></tr>';
		$tranche_age.='<td colspan="2" style="text-align:center">0-12ans</td><td colspan="2">13-17ans</td>tr</tr>';
		$genre.='<td style="text-align:center">G</td><td>F</td><td>G</td><td>F</td></tr>';
	}else
	{	
		$territoire.=' <td colspan="4" bgcolor="#61C6FC" width="59" style="text-align:center">'.$row[2].'</td>';
		$tranche_age.='<td colspan="2" style="text-align:center">0-12ans</td><td colspan="2">13-17ans</td>';
		$genre.='<td style="text-align:center">G</td><td>F</td><td>G</td><td>F</td>';
	}
}
//territoires ends
//content starts
$content='';

$q_2=mysql_query("select * from  tbl__10sous__types__des__vulnerabilites__principales ".$vul_ids." ") or die("Query Failed".mysql_error());
$g_1=0;$f_1=0;$t_1=0;$g_2=0;$f_2=0;$t_2=0;
while($row_2=mysql_fetch_array($q_2))
{  //changes starts 
if(isset($_GET['ter_id']))
{ 
	if($type==2)
	{
		$extra_sql=' and referencement__Keyword=1';
	}
	else
	{
		$extra_sql='';
	}
	//values starts
	$a=count_rows($reference='where territoire__ville_id='.$_GET['ter_id'].' and tranche__age__enfant=1 and sexe="Masculin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and sous_types__des__vulnerabilites__principales_id="'.$row_2[0].'" '.$sess.''.$extra_sql.'',$table='tbl__34appel__long');
	$b=count_rows($reference='where territoire__ville_id='.$_GET['ter_id'].' and tranche__age__enfant=1 and sexe="Feminin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and sous_types__des__vulnerabilites__principales_id="'.$row_2[0].'" '.$extra_sql.' '.$sess.'',$table='tbl__34appel__long');
	$a_2=count_rows($reference='where territoire__ville_id='.$_GET['ter_id'].' and tranche__age__enfant=2 and sexe="Masculin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and sous_types__des__vulnerabilites__principales_id="'.$row_2[0].'" '.$extra_sql.' '.$sess.'',$table='tbl__34appel__long');
	$b_2=count_rows($reference='where territoire__ville_id='.$_GET['ter_id'].' and tranche__age__enfant=2 and sexe="Feminin" and  date__creation__fiche between "'.$from.'" and "'.$to.'" and sous_types__des__vulnerabilites__principales_id="'.$row_2[0].'" '.$extra_sql.' '.$sess.'',$table='tbl__34appel__long');
	$t=($a+$b);
	$tt=($a_2+$b_2);
	$g_1+=+$a;
	$f_1+=+$b;
	$g_2+=+$a_2;
	$f_2+=+$b_2;
	$t_1+=+$t;
	$t_2+=+$tt;
	
	//values ends
	 $vulnerabilty='<td>'.$a.'</td><td>'.$b.'</td><td>'.$t.'</td> <td>'.$a_2.'</td><td>'.$b_2.'</td><td>'.$tt.'</td>';
}else
{
	 $vulnerabilty=vulnerability($v_id=$row_2[0],$max=$count,$du=$from,$au=$to,$prov_id=$province_id);
} //changes ends
	$content.='<tr bgcolor="#F0F0F0">
	<td bgcolor="#AEF9B3" style="text-align:center">'.$row_2[2].'</td>'.$vulnerabilty.'
	</tr>';
}
//content ends
//separation starts
if($option==1&& $type==1)
{
	$pre='<center><h3>Statistique Vulnerabilité Globale du '.$from.' au '.$to.' Province: '.foreign_value($ref='where province_id='.$province_id.'',$table='tbl__05province',$fld_range=2,$database=$db).'</h3> </center><br>';
$pdf=$pre.$top.$territoire.$tranche_age.$genre.$content.$bottom;
}
else if($option==1&&$type==2)
{   $pre='<center><h3>Statistique Referé Globale du '.$from.' au '.$to.' Province: '.foreign_value($ref='where province_id='.$province_id.'',$table='tbl__05province',$fld_range=2,$database=$db).'</h3> </center><br>';
	$pdf=$pre.$top.$territoire.$tranche_age.$genre.$content.$bottom;
}
else if($option==2&&$type==1)
{   $total='<tr bgcolor="#F8EEAD"><td>Total</td><td>'.$g_1.'</td><td>'.$f_1.'</td><td>'.$t_1.'</td><td>'.$g_2.'</td><td>'.$f_2.'</td><td>'.$t_2.'</td></tr>';
   $pre='<center><h3>Statistique Vulnerabilité Personalisé du '.$from.' au '.$to.' Province: '.foreign_value($ref='where province_id='.$province_id.'',$table='tbl__05province',$fld_range=2,$database=$db).'</h3> </center><br>';
	$pdf=$pre.$top.$territoire.$tranche_age.$genre.$content.$total.$bottom;#'padding work 2';
}
else if($option==2&&$type==2)
{
$pre='<center><h3>Statistique Referé Personalisé du '.$from.' au '.$to.' Province: '.foreign_value($ref='where province_id='.$province_id.'',$table='tbl__05province',$fld_range=2,$database=$db).'</h3> </center><br>';   
$total='<tr bgcolor="#F8EEAD"><td>Total</td><td>'.$g_1.'</td><td>'.$f_1.'</td><td>'.$t_1.'</td><td>'.$g_2.'</td><td>'.$f_2.'</td><td>'.$t_2.'</td></tr>';
$pdf=$pre.$top.$territoire.$tranche_age.$genre.$content.$total.$bottom;
}

//separation ends
include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 = file_get_contents('../../retrieve/css-/stylesheets.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);

$mpdf->WriteHTML(header_top($db,'<h1>Rapport Statique</h3>').$pdf,2);

$mpdf->Output('mpdf.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================
?>