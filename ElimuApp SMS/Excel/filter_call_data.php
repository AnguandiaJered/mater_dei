<?php
  session_start();
  require_once('OLEwriter.php');
  require_once('BIFFwriter.php');
  require_once('Worksheet.php');
  require_once('Workbook.php');
  //require_once('dbcon.php');
  


    function HeaderingExcel($filename) {
      header("Content-type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename=$filename" );
      header("Expires: 0");
      header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
      header("Pragma: public");
      }
switch($_GET['class'])
{
	case 34:
	$file='Appel_Long';
	$tbl='tbl__34appel__long';
	break;
	default:
	{
		$file='undfined_file';
	}
}
	  // HTTP headers
	  //donner le nom du fichier
HeaderingExcel('etat_de_sortie_fiche_appel_'.$file.'_du_'.$_GET['from'].'_au_'.$_GET['to'].'.xls');// Creating a workbook
$workbook = new excel("-");
// Creating the first worksheet
$worksheet1 =& $workbook->add_worksheet('candidate result');
$worksheet1->freeze_panes(1, 0);
  $worksheet1->set_column(0, 0, 25);
  $worksheet1->set_column(1, 1, 20);
  $worksheet1->set_column(1, 2, 20);
  $worksheet1->set_column(1, 3, 20);
  $worksheet1->set_column(1, 4, 20);
  $worksheet1->set_column(1, 5, 20);
  $worksheet1->set_column(1, 6, 18);
  $worksheet1->set_column(1, 7, 20);
  $worksheet1->set_column(1, 8, 10);
  $worksheet1->set_column(1, 9, 20);
  $worksheet1->set_column(1, 10, 20);
  $worksheet1->set_column(1, 11, 20);
  $worksheet1->set_column(1, 12, 20);










   $worksheet1->write_string(0,0,'Donnee Fiche Appel Long du '.$_GET['from'].' au '.$_GET['to'].'');
   $worksheet1->write_string(1,1,"Province");
   $worksheet1->write_string(1,2,"Territoire");
   $worksheet1->write_string(1,3,"Groupement/Commune");
   $worksheet1->write_string(1,4,"Localite/Quartier");
   $worksheet1->write_string(1,5,"Date Creation Fiche");
   $worksheet1->write_string(1,6,"Numero Matricule");
   $worksheet1->write_string(1,7,"Sexe");
   $worksheet1->write_string(1,8,"Tranche Age");
   $worksheet1->write_string(1,9,"Age");
   $worksheet1->write_string(1,10,"Categorie Vulnerabilite");
   $worksheet1->write_string(1,11,"Vulnerabilite");
   $worksheet1->write_string(1,12,"Numero Appelant");

 






/////////////////

//2. call connection page
include('../phpscript/connection.php');
$db=db_connection();
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
	
	WHILE ($row=mysql_fetch_array($q)) { 
	$j++;
     
			 
			  $worksheet1->write_string($j,0,$j-1);
			  $worksheet1->write_string($j,1,"".foreign_value('where province_id="'.$row['province_id'].'"','tbl__05province',2,$db)."");
			  $worksheet1->write_string($j,2,"".foreign_value('where territoire__ville_id="'.$row['territoire__ville_id'].'"','tbl__06territoire00__ville',3,$db)."");
			  $worksheet1->write_string($j,3,"".foreign_value('where groupements00__communes00__cites_id="'.$row['groupements00__communes00__cites_id'].'"','tbl__07groupements00__communes00__cites',3,$db)."");
			  $worksheet1->write_string($j,4,"".foreign_value('where localites00__quartiers_id="'.$row['localites00__quartiers_id'].'"','tbl__08localites00__quartiers',3,$db)."");
			   $worksheet1->write_string($j,5,$row[1]);
			   $worksheet1->write_string($j,6,$row[10]);
			   $worksheet1->write_string($j,7,$row[14]);
			   $worksheet1->write_string($j,8,foreign_value('where 	tranche__d666__age_id="'.$row[13].'"','tbl__13tranche__d666__age',2,$db));
			   $worksheet1->write_string($j,9,$row[19]);
			   $worksheet1->write_string($j,10,foreign_value('where 	types__des__vulnerabilites__principales_id="'.$row[41].'"','tbl__09types__des__vulnerabilites__principales',2,$db));
			    $worksheet1->write_string($j,11,foreign_value('where 	sous_types__des__vulnerabilites__principales_id="'.$row[9].'"','tbl__10sous__types__des__vulnerabilites__principales',3,$db));
				 $worksheet1->write_string($j,12,$row[37].','.$row[38]);			  
			   
				
							   
	
			
		
			
			 
	}
	
	
	
/////////////////
  
  

  
$workbook->close();
?>