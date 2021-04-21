<?php
session_start();
include('../../phpscript/classe_lib.php');
include('../../phpscript/connection.php');
$db=db_connection();
if(FK=='detail')
		{   
		$table_header='<div class="maincontent">
         <div class="span6"><table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
                   <thead>
                        <tr>
                           <th  style="width:400px;"><h3>Détail</h3></th>
                            <th  style="width:400px;"><h3>Description</h3></th></tr>';
		    $table_footer='</table> </div></div>';
		$fk_table='tbl__01foreign__keys';
	
		}
		else 
		{
		$tbl=new open_gate();
		 $header='<br><table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
            <thead>
                <tr>';
	   $header_content='<th><h3 style="text-transform:capitalize;">#_table_header_content</h3></th>';
	   $header_close='</tr> </thead> <tbody>';
	   $footer='</table>';
	   $delimiter_int=100;
	   $delimiter_app=1;
	   $extra_btn='';
	   $retrieve_record=new retrieve_record();
	   $ForeignKeysArray='tbl__01foreign__keys';
	   
	if(isset($reference)){$ref_query=$reference;}else{$ref_query='';}
	$pdf=$retrieve_record->show_record($header,$header_content,$header_close,$footer,$db,$tbl->table_name(CL,$d),$extra_btn,$delimiter_int,$delimiter_app,$ForeignKeysArray,$ref_query);
		}
include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 = file_get_contents('../../retrieve/css/styleResp.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);

$mpdf->WriteHTML(header_top($db,'<h1>Etat de Sortie</h1>').$pdf,2);

$mpdf->Output('mpdf.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================


?>
