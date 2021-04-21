<?php
session_start();
include('../../phpscript/classe_lib.php');
include('../../phpscript/connection.php');
$db=db_connection();
$province_id=$_GET['province'];
$object_id=explode(',',$_GET['object']);
$territoire='';
$from=$_GET['from'];
$to=$_GET['to'];
$ta=0;
$tb=0;
$tc=0;
$td=0;
$te=0;
$tf=0;
$tg=0;
$th=0;
if($_GET['call_type']=='short')
{
	$ble_ta='tbl__29appel__court';
	$tbl_object='tbl__22objet__appel';
	$ref_object='objet__appel_id';
	$tranche_age='tranche__d666__age_id';

}else
{   $ble_ta='tbl__34appel__long';
    $tbl_object='tbl__40objet__appel__long';
	$ref_object='objet__appel__long_id';
	$tranche_age='tranche__age__appelant';
}
if($_SESSION['DESIGNATION']=='user')
{
	$sess='where user_id='.$_SESSION['USER_ID'].' and date between "'.$from.'" and "'.$to.'"';
}else
{
	$sess='where date between "'.$from.'" and "'.$to.'"';
}
$content="";
$total=0;
for($i=0;$i< count($object_id);$i++)
{
	$ID=$object_id[$i];
	//------------------------------------------------------------starts------------------------------------------------------------//
	
	//------------------------------------------------------------ends--------------------------------------------------------------//
	
	
	$content.='<table width="100%" style="border: 1px solid #bbb; width:100%;" align="center" style="text-align:center;">
  <tr>
    <td rowspan="3" width="87" bgcolor="#B3E89B"><h3>Provenance</h3></td>
    <td colspan="8" width="209" bgcolor="#A3CFFC"><h3>'.foreign_value($ref='where '.$ref_object.'='.$object_id[$i].'',$table=$tbl_object,$fld_range=2,$database=$db).'</h3></td>
	<td bgcolor="#EFDBC7"><h3>Total</h3></td>
  </tr>
  <tr bgcolor="#EFDBC7">
    <td colspan="2">0-12ans</td>
    <td colspan="2">13-17ans</td>
    <td colspan="2">18-24ans </td>
    <td colspan="2">25+</td>
	<td></td>
  </tr>
  <tr bgcolor="#EFDBC7">
    <td>G</td>
    <td>F</td>
    <td>G</td>
    <td>F</td>
    <td>G</td>
    <td>F</td>
    <td>H</td>
    <td>F</td>
	<td></td>
  </tr>'._provenance($province_id=$province_id,$tranche_age=$tranche_age,$from=$from,$to=$to,$ref_object=$ref_object,$object_idd=$ID,$ble_ta=$ble_ta,$usage=1).'
  
</table><br><div style="margin-bottom:10px;"></div>';
$total+=+_provenance($province_id=$province_id,$tranche_age=$tranche_age,$from=$from,$to=$to,$ref_object=$ref_object,$object_idd=$ID,$ble_ta=$ble_ta,$usage=0);
}
$total_general='<table  style="margin-top:20px; border: 1px solid #bbb; width:100%;">
<tr bgcolor="#F0F0F0">
<td>Total General</td>
<td colspan="9" bgcolor="#FFFF80" style="font-size:15px; text-align:right;">'.$total.'</td>
</tr>
</table>';
$pdf='<h1 align="center">Statistique du '.$from.' au '.$to.' </h1><br>'.pourcentage_call(1).'<br>
<table width="100%">
<tr bgcolor="#A3CFFC">
<th>Appel Silencieux</th>
<th>Appel Interrompu</th>
<th>Appel Erreur</th>
</tr>
<tr bgcolor="#EEEEEE">
<td>'.count_rows($sess,'tbl__30appel__silencieux').'</td>
<td>'.count_rows($sess,'tbl__32appel__interrompu').'</td>
<td>'.count_rows($sess,'tbl__31appel__erreur').'</td>
</tr>
</table><br>
'.report_net_call_schedule($ble_ta,$from,$to,1).'
<br>
'.report_net_call_schedule($ble_ta,$from,$to,2).'<br>
'.$content.$total_general;
include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 = file_get_contents('../../retrieve/css-/stylesheets.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);

$mpdf->WriteHTML(header_top($db,'<h1>Rapport Statique</h1>').$pdf,2);

$mpdf->Output('mpdf.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>