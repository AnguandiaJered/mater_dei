<?php 
session_start();
unset($_SESSION['SOLDE']);
include("../phpscript/connection.php");
$db=db_connection();
$classe_id=$_REQUEST['classe_id'];
$student_id=$_REQUEST['student_id'];
echo'<button onclick="return show_feesBig('.$student_id.');">Actualiser les operations</button><br>';
echo display_fees($db,'tbl__14frais__scolaires','',foreign_value('where classe_id="'.$classe_id.'"','tbl__15classe',6,$db),'nom__du__frais',$student_id);
?>