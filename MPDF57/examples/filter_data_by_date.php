<?php
session_start();
include('../../phpscript/classe_lib.php');
include('../../phpscript/connection.php');
$db=db_connection();
$content='';
$tbl='tbl__34appel__long';
if($_SESSION['DESIGNATION']=='user')
	{
		$q = mysql_query("SELECT * FROM  ".$tbl." where user_id='".$_SESSION['USER_ID']."'") or die(mysql_error());
	}
	else
	{
		$q = mysql_query("SELECT * FROM  ".$tbl."") or die(mysql_error());
	}
	
	
	$sqlrows=mysql_num_rows($q);
	$j=1;
	
	while ($row=mysql_fetch_array($q)) { 
	$j++;
     
			 
			 $content.='<tr bgcolor="#F0F0F0">
			 <td>'.($j-1).'</td>
			<td>'.foreign_value('where province_id="'.$row['province_id'].'"','tbl__05province',2,$db).'</td>
		<td>'.foreign_value('where territoire__ville_id="'.$row['territoire__ville_id'].'"','tbl__06territoire00__ville',3,$db).'</td>
			 <td>'.foreign_value('where groupements00__communes00__cites_id="'.$row['groupements00__communes00__cites_id'].'"','tbl__07groupements00__communes00__cites',3,$db).'</td>
			  <td>'.foreign_value('where localites00__quartiers_id="'.$row['localites00__quartiers_id'].'"','tbl__08localites00__quartiers',3,$db).'</td>
			   <td>'.$row[1].'</td>
			   <td>'.$row[10].'</td>
			   <td>'.$row[14].'</td>
			   <td>'.foreign_value('where 	tranche__d666__age_id="'.$row[13].'"','tbl__13tranche__d666__age',2,$db).'
			  <td>'.$row[19].'</td>
			   <td>'.foreign_value('where 	types__des__vulnerabilites__principales_id="'.$row[41].'"','tbl__09types__des__vulnerabilites__principales',2,$db).'</td>
			    <td>'.foreign_value('where 	sous_types__des__vulnerabilites__principales_id="'.$row[9].'"','tbl__10sous__types__des__vulnerabilites__principales',3,$db).'</td>
				 <td>'.$row[37].','.$row[38].'</td></tr>';			  
			   
	}

$output='<br>Donnee Fiche Appel Long du '.$_GET['from'].' au '.$_GET['to'].'<br>
<table width="100%">
<tr bgcolor="#B9D8FD">
<th>No</th>
<th>Province</th>
<th>Territoire</th>
<th>Groupement/Commune</th>
<th>Localite/Quartier</th>
<th>Date Creation Fiche</th>
<th>Numero Matricule</th>
<th>Sexe</th>
<th>Tranche Age</th>
<th>Age</th>
<th>Categorie Vulnerabilite</th>
<th>Vulnerabilite</th>
<th>Numero Appelan</th>
</tr>'.$content.'
</table>';

include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 = file_get_contents('../../retrieve/css-/stylesheets.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);

$mpdf->WriteHTML(header_top($db).$output,2);

$mpdf->Output('mpdf.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>