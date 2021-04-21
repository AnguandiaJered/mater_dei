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
HeaderingExcel('Arrivage_de_bon_de_commande_'.$_GET['bn_cmd_no'].'_sur_la_phase_'.$_GET['phase'].'.xls');// Creating a workbook
$workbook = new excel("-");
// Creating the first worksheet
$worksheet1 =& $workbook->add_worksheet('candidate result');
$worksheet1->freeze_panes(1, 0);
  $worksheet1->set_column(0, 0, 25);
  $worksheet1->set_column(1, 1, 20);
  $worksheet1->set_column(1, 2, 20);
  $worksheet1->set_column(1, 3, 20);
  $worksheet1->set_column(1, 4, 20);










   $worksheet1->write_string(0,0,"No bon de commande");
   $worksheet1->write_string(0,1,"Code Article");
   $worksheet1->write_string(0,2,"Date");
   $worksheet1->write_string(0,3,"Fournisseur");
$worksheet1->write_string(0,4,"Reference");
$worksheet1->write_string(0,5,"Libelle");
$worksheet1->write_string(0,6,"Qte a recevoir");
$worksheet1->write_string(0,7,"Depot");
 






/////////////////
	
//1. call the library page
include('library.php');
//2. call connection page
include('connection.php');
	$qryreport = mysql_query("SELECT * FROM  tbl_arrivage where bn_cmd_no='".$_GET['bn_cmd_no']."'") or die(mysql_error());
	
	$sqlrows=mysql_num_rows($qryreport);
	$j=0;
	
	WHILE ($reportdisp=mysql_fetch_array($qryreport)) { $id=$reportdisp['article_id'];
	$query_article=$query_executer("select * from tbl_article where article_id='$id'") or die("Query Failed".$error());
	$print=$fetch_record($query_article);
	$j=$j+1;
                    
                        $date=$reportdisp['date'];
                        $fournisseur=$reportdisp['fournisseur'];
                        $article_id=$reportdisp['article_id'];
                        $libele=$reportdisp['libele'];
						 $qte=$reportdisp['qte'];
						  $bn_cmd_no=$reportdisp['bn_cmd_no'];

			
			
			
				
			
			
			 $worksheet1->write_string($j,0,"$bn_cmd_no");
			 $worksheet1->write_string($j,1,"$article_id");
			 $worksheet1->write_string($j,2,"$date");
			 $worksheet1->write_string($j,3," $fournisseur");
			 $worksheet1->write_string($j,4,"".$print['libellearticle']."");
			 $worksheet1->write_string($j,5," $libele");
			  $worksheet1->write_string($j,6," $qte");
			  $worksheet1->write_string($j,7,"".$print['depot']."");
	
			
		
			
			 
	}
	
	
	
/////////////////
  
  

  
$workbook->close();
?>