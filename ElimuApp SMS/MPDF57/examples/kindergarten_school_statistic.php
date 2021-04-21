<?php
session_start();
include('../../phpscript/connection.php');
include('../../phpscript/classe_kindergarten_school_statistic.php');
include('../../phpscript/classe_kindergarten_school_statistic_2.php');
include('../../phpscript/classe_kindergarten_school_statistic_3.php');
include('../../phpscript/classe_kindergarten_school_statistic_4.php');
$db=db_connection();
$tableau=new kindergarten_statistic();
$tableau_2=new kindergarten_statistic_2();
$tableau_3=new kindergarten_statistic_3();
$tableau_4=new kindergarten_statistic_4();
$table='';
switch($_GET['type'])
{
	case 1:
	$output='<h4><strong>NOMBRE D\'ECOLES PAR SOUS-DIVISION ET REGIME DE GESTION </strong></h4>
    <br>
    '.$tableau->table_one($db,1).'';
    $file_name='Nombre_decole_par_sous_division_et_regime_ecole_maternelle';
	break;//nombre d'ecole
	case 2:
	$output='<h4>NOMBRE DES CLASSES PAR SOUS-DIVISION ET REGIME DE GESTION </strong></h4>
    <br>
    '.$tableau_2->table_one_2($db,1).'';
     $file_name='Nombre_des_classes_par_sous_division_et_regime_ecole_maternelle';
	break;//nombre des classes
	case 3:
	$output='<h4><strong>REPARTITION DES EFFECTIFS DES ECOLIERS PAR SOUS DIVISION, REGIME DE GESTION ET PAR SEXE </strong></h4>
    <br>
    '.$tableau_3->table_one_3($db,1).'';
     $file_name='repartition_des_effectifs_des_ecoliers_par_sous_division_et_regime_ecole_maternelle';
	break;
	case 4:
	$output='<h4><strong>NOMBRE D\'ENSEIGNANTS PAR SOUS-DIVISION ET PAR REGIME ET SEXE </strong></h4>
    <br>
    '.$tableau_4->table_one_4($db,1).'';
     $file_name='nombre_denseignants_par_sous_division_et_regime_ecole_maternelle';
	break;
	default:
	{
		echo'Option Not Found';
	}

}
/*
$output='<h4><strong>I.1.1: NOMBRE D\'ECOLES PAR SOUS-DIVISION ET REGIME DE GESTION </strong></h4>
<br>
'.$tableau->table_one($db,1).'
<br>
<h4><strong>I.1.2: NOMBRE DES CLASSES PAR SOUS-DIVISION ET REGIME DE GESTION </strong></h4>
<br>
'.$tableau_2->table_one_2($db,1).'<br>
<div style="margin-top:120px;">
<h4><strong>I.2: REPARTITION DES EFFECTIFS DES ECOLIERS PAR SOUS DIVISION, REGIME DE GESTION ET PAR SEXE </strong></h4>
<br>
'.$tableau_3->table_one_3($db,1).
'<br>
<h4><strong>I.3: NOMBRE D\'ENSEIGNANTS PAR SOUS-DIVISION ET PAR REGIME ET SEXE </strong></h4>
<br>
'.$tableau_4->table_one_4($db,1).'';
*/
include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('../../retrieve/css-/stylesheets.css');
$stylesheet_2 = file_get_contents('../../retrieve/css-/stylesheets.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($stylesheet_2,1);
$annee_sco_id=foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'" ','tbl__14identification__de__l666etablissement__pre__primaire',2,$db);
$annee_scolaire=foreign_value('where 	annee__scolaire_id="'.$annee_sco_id.'" ','tbl__37annee__scolaire',2,$db);
$mpdf->WriteHTML($output,2);
/*
$mpdf->WriteHTML(header_top($db,'<h2><center>Enseignement<br> Pré-primaire
<p>
- ST1 -
</p></center></h2>',$annee_scolaire).$output,2);
*/

$mpdf->Output(''.$file_name.'.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>