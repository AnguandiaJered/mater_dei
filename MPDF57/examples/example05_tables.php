<?php
include('../../php_script/library.php');
include('../../php_script/connection.php');
include('../../configuration.php');
$var_date=date('d-M-Y');
$header = '
<h1>Rapport Article</h1>
<h4>Rapport en PDF</h4>
<table class="bpmTopicC" width="100%">
<thead>
<tr class="headerrow"><th>ID</th>
<td align="left">Article</td>
<td align="left">Designation</td>
<td align="left">Prix</td>
<td align="left">Prix en Gros</td>
<td align="left">Prix Casse</td>
<td align="left">Unite Monetaire</td>
</tr>
</thead>
<tbody>';
$var_nothing="";
$q=$query_executer("select * from tbl_article") or die("Query Failed".$error());
while($print=$fetch_record($q))
{
	$before='<tr>
	          <th align="left">'.$print['article_id'].'</th>
              <td align="left">'.$print['article_name'].'</td>
              <td align="left">'.$print['article_designation'].'</td>
			  <td align="left">'.$print['price'].'</td>
			  <td align="left">'.$print['detail_price'].'</td>
			  <td align="left">'.$print['broken_price'].'</td>
			  <td align="left">'.$print['currency'].'</td>
</tr>';
	$var_nothing.=$before;
}

$footer='</tbody></table>
<p>&nbsp;</p>
';

	
	

//==============================================================
//==============================================================
//==============================================================
include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($header.$var_nothing.$footer,2);

$mpdf->Output('mpdf.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================


?>