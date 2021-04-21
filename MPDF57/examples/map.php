<?php
include('../../phpscript/classe_lib.php');
include('../../phpscript/connection.php');
$db=db_connection();
$province_id=$_GET['province'];
if(isset($_GET['terr_id'])){$terr=' and territoire__ville_id='.$_GET['terr_id'].'';}else{$terr='';}
if(isset($_GET['group_id'])){$group=' and groupements00__communes00__cites_id='.$_GET['group_id'].'';}else{$group='';}
if(isset($_GET['local_id'])){$local=' and localites00__quartiers_id='.$_GET['local_id'].'';}else{$local='';}
$long_query='';
$activite='';
$explode=explode(',',$_GET['activite']);
for($h=0;$h<count ($explode);$h++)
{
	$counter++;
	$long_query.="cartographie__centre_id ='#_center_id' and activite_id='$explode[$h]'or ";
	$activite.=foreign_value($ref="where activite_id='$explode[$h]'",$table='tbl__36activites',$fld_range=2,$database=$db).',';
}
$send_count=$counter;
$long_query=strrev($long_query);
$long_query=substr($long_query,+3);
$long_query=strrev($long_query);
$header='Carthographie Portant Activités:'.$activite.' <br><table style="border: 1px solid #bbb; width:100%;">
<tr bgcolor="#96BDFE">
<th><h3>Province</h3></th>
<th><h3>Territoire</h3></th>
<th><h3>organisation</h3></th>
<th><h3>Activités</h3></th>
<th><h3>SPEC</h3></th>
<th><h3>Acronyme</h3></th>
<th><h3>Personne</h3></th>
<th><h3>Telephone</h3></th>
<th><h3>Email</h3></th>
</tr>';
$content='';
$q=$db=mysql_query("select * from  tbl__23carthographie__centre where province_id='$province_id' ".$terr."") or die("Query Failed".mysql_error());
$count=mysql_num_rows($q);
if($count>=1)
 {
while($row=mysql_fetch_array($q))
{  
$link= cartho($long_q=$long_query,$centre_id=$row[0],$link_table='tbl__37link__cartho').',';
if($link>=$_GET['max'])
		
		{				
	$content.='<tr bgcolor="#EEEEEE">
<td>'.foreign_value($ref='where province_id='.$row[1].'',$table='tbl__05province',$fld_range=2,$database=$db).'</td>
<td>'.foreign_value($ref='where territoire__ville_id='.$row[2].'',$table='tbl__06territoire00__ville',$fld_range=3,$database=$db).'</td>
<td>'.$row[5].'</td>
<td>'.get_activities ($database=$db,$tbl='tbl__37link__cartho',$carto_id=$row[0]).'</td>
<td>'.$row[4].'</td>
<td>'.$row[5].'</td>
<td>'.$row[6].'</td>
<td>'.$row[7].'</td>
<td>'.$row[8].'</td>
</tr>';
		}
}
 }
   else
   {
	   $content='<tr bgcolor="#FFDFDD" ><td colspan="11">Aucune Donnée Trouvée</td></tr>';
   }

$footer='</table>';
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

$mpdf->WriteHTML(header_top($db,'<h1>Rapport Carthographie</h1>').$output,2);

$mpdf->Output('mpdf.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>