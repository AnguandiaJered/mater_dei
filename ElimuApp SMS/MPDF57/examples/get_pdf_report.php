<?php
session_start();
include('../../phpscript/connection.php');
include('../../phpscript/classe_lib.php');
$db=db_connection();
$act_id=foreign_value('where rapport_id="'.$_GET['id'].'"','tbl__36rapport',8,$db);
$activite=foreign_value('where activite_id="'.$act_id.'"','tbl__23activite',9,$db);
$size=16;
$output='

<div><strong>Activite</strong>: '.$activite.'</div>
<div><strong>Description de la réalisationde l\'activité</strong>: '.foreign_value('where rapport_id="'.$_GET['id'].'"','tbl__36rapport',2,$db).'</div>
<div><strong>Résultats obtenus</strong>: '.foreign_value('where rapport_id="'.$_GET['id'].'"','tbl__36rapport',3,$db).'</div>
<div><strong>Indicateurs atteints</strong> :'.foreign_value('where rapport_id="'.$_GET['id'].'"','tbl__36rapport',4,$db).'</div>
<div><strong>Difficultés recontrées et solutions apportées</strong>: '.foreign_value('where rapport_id="'.$_GET['id'].'"','tbl__36rapport',5,$db).'</div>
<div><strong>Recommendation</strong>: '.foreign_value('where rapport_id="'.$_GET['id'].'"','tbl__36rapport',6,$db).'</div>';
include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 
$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 = file_get_contents('../../retrieve/css-/stylesheets.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);
$mpdf->WriteHTML(header_top($db,'<h2 style="text-transform:uppercase;"><center>RAPPORT PROJET '.foreign_value('WHERE projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',3,$db).'</center></h2>',$annee_scolaire).$output,2);

$mpdf->Output('rapport_projet_'.foreign_value('where projet_id="'.$_GET['project'].'"','tbl__10nouveau__projet',3,$db).'.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>