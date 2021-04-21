<?php
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
	  
	  // HTTP headers
	  //donner le nom du fichier
HeaderingExcel('demo.xls');// Creating a workbook
$workbook = new excel("-");
// Creating the first worksheet
$worksheet1 =& $workbook->add_worksheet('candidate result');
$worksheet1->freeze_panes(1, 0);
  $worksheet1->set_column(0, 0, 25);
  $worksheet1->set_column(1, 1, 20);
  $worksheet1->set_column(1, 2, 20);
  $worksheet1->set_column(1, 3, 20);
  $worksheet1->set_column(1, 4, 20);










   $worksheet1->write_string(0,0,"Donnée Fiche Appel");
   $worksheet1->write_string(0,1,"Province");
   $worksheet1->write_string(0,2,"Territoire");
   $worksheet1->write_string(0,3,"Groupement/Commune");
   $worksheet1->write_string(0,4,"Localité/Quartier");

 






/////////////////

//2. call connection page
include('../phpscript/connection.php');
$db=db_connection();
	$qryreport = mysql_query("SELECT * FROM  tbl_demo") or die(mysql_error());
	
	$sqlrows=mysql_num_rows($qryreport);
	$j=0;
	
	WHILE ($reportdisp=mysql_fetch_array($qryreport)) { 
	$j=$j+1;
     
			 
			  $worksheet1->write_string($j,0,"".$reportdisp['article_code']."");
			   $worksheet1->write_string($j,1,"".$reportdisp['libellearticle']."");
			    $worksheet1->write_string($j,2,"".$reportdisp['unite']."");
				 $worksheet1->write_string($j,3,"".$reportdisp['prix_article']."");
				
							   
	
			
		
			
			 
	}
	
	
	
/////////////////
  
  

  
$workbook->close();
?>