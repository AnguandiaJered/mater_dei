<?php
require('phpscript/connection.php');
$db=db_connection();//connection variable
echo "breeeeeeeeee";
//$type__de__compte_id = $_POST["type__de__compte_id"];
$nom__du__frais = $_POST["nom__du__frais"];
$montant = $_POST["montant"];


$q=mysql_query("INSERT INTO `tbl__80frais__transport`(`nom__du__frais`, `montant`) VALUES ('$nom__du__frais' , $montant)") or die("Query Failed".mysql_error());
?>