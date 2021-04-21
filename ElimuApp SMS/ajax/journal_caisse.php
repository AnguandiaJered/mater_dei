<?php
session_start();
include("../phpscript/connection.php");
$db=db_connection();
$from=$_REQUEST['from'];
$to=$_REQUEST['to'];
$mysel=$_REQUEST['mysel'];
$mycaisse_bank=$_REQUEST['mycaisse_bank'];
switch($mysel)
{
	case 3:
	$ref='where date between "'.$from.'" and "'.$to.'" order by entree_id asc';
	break;
	case 2:
	$ref='where caisse__ou__banque_id="'.$mycaisse_bank.'" and  	categorie_id=2 and  date between "'.$from.'" and "'.$to.'" order by entree_id asc ';
	break;
	case 1:
	$ref='where caisse__ou__banque_id="'.$mycaisse_bank.'" and  	categorie_id=1 and  date between "'.$from.'" and "'.$to.'" order by entree_id asc ';
	break;
}

$parameters="'".$from."','".$to."','".$mysel."','".$mycaisse_bank."'";
//$parameters='';
if(!isset($_REQUEST['display']))
{
	
echo'<button class="btn btn-info" style="float:right;" type="button" onclick="return pdf_genrpt('.$parameters.');">PDF</button>';

$dates=journal_caisse_rpt($db,'tbl__33entree',$ref,$from,$to,$mysel,$mycaisse_bank);
echo real_journal_caisse($db,$dates,$from,$to,$mysel,$mycaisse_bank);
}
else
{
	
	echo'<iframe src="MPDF57/examples/journal_caisse.php?from='.$from.'&to='.$to.'&mysel='.$mysel.'&mycaisse_bank='.$mycaisse_bank.'" width="100%" height="800px;" frameborder="0"></iframe>';
}


?>
