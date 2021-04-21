<?php
include("../phpscript/connection.php");
$db=db_connection();
$mark=$_REQUEST['mark'];
$std_id=$_REQUEST['stid'];
$affect_id=$_REQUEST['affect_id'];
$order_id=$_REQUEST['order_id'];
$action=$_REQUEST['action'];
$stdmarkid=$_REQUEST['stdmarkid'];
$cours_id=$_REQUEST['cours_id'];
if($action == 'default')
{
$q=$db=mysql_query("insert into  tbl__37point_eleve set inscription__des__eleves_id ='".$std_id."', affectation_id='".$affect_id."',order_id='".$order_id."',mark='".$mark."',cours_id='".$cours_id."'") or die('Query Failed for saving mark'.mysql_error());
}
else
{
	//altering
	$q=$db=mysql_query("update tbl__37point_eleve set inscription__des__eleves_id ='".$std_id."', affectation_id='".$affect_id."',order_id='".$order_id."',mark='".$mark."',cours_id='".$cours_id."' where point_eleve_id='".$stdmarkid."'") or die('Query Failed for saving mark'.mysql_error());
	
}
echo $mark; 
?>