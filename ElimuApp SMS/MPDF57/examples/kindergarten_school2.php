<?php
session_start();
include('../../phpscript/connection.php');
include('../../phpscript/classe_kindergarten_school.php');
$db=db_connection();
$true_or_false=new true_or_false();
$tableau=new kindergarten_table();
$table='tbl__14identification__de__l666etablissement__pre__primaire';
$output='<p>
<h2><strong>1. IDENTIFICATION DE L\'ETABLISSEMENT</strong></h2>
</p>
<br>
<table width="100%">
<tr>
<td width="50%">1.1 Nom de l\'etablissement</td>
<td width="50%"> '.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,3,$db).'</td>
</tr>
<tr>
<td width="50%">1.2 Adresse de l\'etablissement</td>
<td width="50%"> '.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,4,$db).'</td>
</tr>
<tr>
<td width="50%">1.3 Téléphone de l\'etablissement</td>
<td width="50%"> '.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,5,$db).'</td>
</tr>
<tr>
<td width="50%">1.4 Courriel de l\'etablissement</td>
<td width="50%"> '.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,6,$db).'</td>
</tr>
<tr>
<td width="50%">1.5 Localisation administrative
<p>&nbsp;</p>
Province: '.foreign_value('where province_id="'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,7,$db).'"','tbl__04province',2,$db).'
<br>
Ville: '.foreign_value('where ville_id="'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,9,$db).'"','tbl__06ville',4,$db).'
<br>
Territoire ou Commune: '.foreign_value('where territoire_id="'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,8,$db).'"','tbl__05territoire__ou__commune',3,$db).'</td>
<td width="50%">1.6 Localisation Scolaire
<p>&nbsp;</p>
Division:  '.foreign_value('where division_id="'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,10,$db).'"','tbl__07division',2,$db).'
<br>
Sous-dvision :'.foreign_value('where sous__division_id="'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,11,$db).'"','tbl__08sous__division',3,$db).'
</td>
</tr>
<tr>
<td width="50%">1.7 Milieu </td>
<td width="50%"> '.foreign_value('where milieu_id="'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,12,$db).'"','tbl__09milieu',2,$db).'</td>
</tr>
<tr>
<td width="50%">1.8 Type d\'école </td>
<td width="50%"> '.foreign_value('where type__d666ecole_id="'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,13,$db).'"','tbl__10type__d666ecole',3,$db).'</td>
</tr>
<tr>
<td width="50%">1.9 Regime de gestion </td>
<td width="50%"> '.foreign_value('where regime__de__gestion_id="'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,14,$db).'"','tbl__11regime__de__gestion',2,$db).'</td>
</tr>
<tr>
<td width="60%">1.10 Référence Juridiques (arrêté d\'agrément/d\'autorisation) </td>
<td width="40%"> '.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,16,$db).'</td>
</tr>
<tr>
<td width="50%">1.11 N° Matricule SECOPE</td>
<td width="50%"> '.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,17,$db).'</td>
</tr>
<tr>
<td width="50%">1.12 L\'etablissement est</td>
<td width="50%"> '.foreign_value('where l666etablissement__est_id="'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,18,$db).'"','tbl__12etablissement__est',2,$db).'</td>
</tr>
<tr>
<td width="50%">1.13 Statut d\'occupation</td>
<td width="50%"> '.foreign_value('where statut__666ocupation_id="'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,19,$db).'"','tbl__13statut__666ocupation',2,$db).'</td>
</tr>
<tr>
<td width="50%">1.14 Nom et Post-nom du Chef d\'etablissement</td>
<td width="50%">'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,20,$db).'</td>
</tr>
<tr>
<td width="50%">1.15 Téléphone du Chef d\'etablissement</td>
<td width="50%">'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,21,$db).'</td>
</tr>
</table>
<p>
<h2><strong>2. INFORMATIONS GENERALES SUR L\'ETABLISSEMENT</strong></h2>
</p>
<br>
<ul>
<li>
* L\'établissement dispose-t-il:
</li>
<table width="100%">
<tr>
<td width="50%">2.1 D\'un programme national ?</td>
<td width="50%">'.$true_or_false->yes_or_not(foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,22,$db)).'</td>
</tr>
<tr>
<td width="50%">2.2 D\'un COPA et d\'un COGES ?</td>
<td width="50%">'.$true_or_false->yes_or_not(foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,23,$db)).'</td>
</tr>
<tr>
<td width="50%">2.3 D\'un point d\'eau ?</td>
<td width="50%">'.$true_or_false->yes_or_not(foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,24,$db)).'</td>
</tr>
<tr>
<td width="50%">Type de point d\'eau</td>
<td width="50%">'.foreign_value('where type__point__d666eau_id="'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,25,$db).'"','tbl__20type__point__d666eau',2,$db).'</td>
</tr>
<tr>
<td width="50%">2.4 De l\'électricité ?</td>
<td width="50%">'.$true_or_false->yes_or_not(foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,26,$db)).'</td>
</tr>
<tr>
<td width="50%">2.5 Des latrines (W.C) ?</td>
<td width="50%">'.$true_or_false->yes_or_not(foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,27,$db)).'</td>
</tr>
<tr>
<td width="50%">Nombre de compartiment</td>
<td width="50%">'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,28,$db).'</td>
</tr>
<tr>
<td width="50%">Dont pour fille</td>
<td width="50%">'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,29,$db).'</td>
</tr>
<tr>
<td width="50%">2.6 D\'une cour de récréation ?</td>
<td width="50%">'.$true_or_false->yes_or_not(foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,30,$db)).'</td>
</tr>
<tr>
<td width="50%">2.7 D\'un terrain de sport ?</td>
<td width="50%">'.$true_or_false->yes_or_not(foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,31,$db)).'</td>
</tr>
<tr>
<td width="50%">2.8 D\'une clôture ?</td>
<td width="50%">'.$true_or_false->yes_or_not(foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,32,$db)).'</td>
</tr>
<tr>
<td width="50%">Nature de clôture</td>
<td width="50%">'.foreign_value('where nature__cloture_id="'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,33,$db).'"','tbl__21nature__cloture',2,$db).'</td>
</tr>

<br>
<tr>
<td width="60%">* Les locaux sont-ils utilisés par un deuxième établissement ?</td>
<td width="40%">'.$true_or_false->yes_or_not(foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,34,$db)).'</td>
</tr>
<tr>
<td width="50%">Le nom du deuxième établissement </td>
<td width="50%">'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,35,$db).'</td>
</tr>
<tr>
<td width="50%">* Nombre de visites d\'inspection recues l\'année passée ?</td>;
<td width="50%">'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,36,$db).'</td>
</tr>
<tr>
<td width="50%">* Nombre de réunions avec PV tenues l\'année passée ?</td>
<td>'.foreign_value('where identitification__pre__primaire_id="'.$_GET['id'].'"',$table,37,$db).'</td>
</tr>
</table>
</ul>
<div id="delimiter" style="height:10px;">
&nbsp;
</div>
<h3><strong>2.9 Prise en compte des thèmes transverseaux dans le programme d\'éducation</strong></h3>
<br>
'.$tableau->table_one($db,$_GET['id']).'
<br>
<h4><strong>Tableau 1: Répartition des enfants inscrits par année d\'études, sexe et nombre de classes organisées</strong></h4>
<br>
'.$tableau->table_two($db,$_GET['id']).'
<br>
<h4><strong>Tableau 2: Informations relatives au personnel enseignant</strong></h4>
<br>
'.$tableau->table_three($db,$_GET['id']).'
<br>
<h4><strong>Tableau 3: Informations relatives au personnel administratif et ouvrier</strong></h4>
<br>'
.$tableau->table_four($db,$_GET['id']).'
<br>
<h4><strong>Tableau 4: Nombre de manuels disponible en bon état au sein de l\'établissement, par année d\'études et selon les types de manuels</strong></h4>
<br>
'.$tableau->table_five($db,$_GET['id']).'
<br>
<h4><strong>Tableau 5: Nombre de locaux selon leurs caractéristiques et états</strong></h4>
<br>
'.$tableau->table_six($db,$_GET['id']).'
<br>';

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
$mpdf->WriteHTML(header_top($db,'<h2><center>Enseignement<br> Pré-primaire
<p>
- ST1 -
</p></center></h2>',$annee_scolaire).$output,2);

$mpdf->Output('mpdf.pdf','I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>