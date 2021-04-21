<?php
require('../phpscript/connection.php');
$db=db_connection();
$accountid=$_REQUEST['AccountId'];
$categorieid=$_REQUEST['CategoryId'];
$incoming=(sum_rowsone($db,'tbl__33entree','montant','where categorie_id="'.$categorieid.'" and caisse__ou__banque_id="'.$accountid.'"')+sum_rowsone($db,'tbl__27payer__les__frais','montant','where treasure_bank="'.$categorieid.'" and  treasure_bank_id ="'.$accountid.'"'));
$outcoming=sum_rowsone($db,'tbl__29sortie','montant','where categorie_id="'.$categorieid.'" and caisse__ou__banque_id="'.$accountid.'"');
$available_solde=($incoming-$outcoming);
//$real_solde=settype($available_solde,"integer");
echo '<strong>'.$available_solde.'</strong><input type="hidden" id="AvailableSoldId" value="'.str_replace(" ", "", $available_solde).'"/>';
?>