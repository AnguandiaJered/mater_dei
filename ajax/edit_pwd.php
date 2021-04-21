<?php
session_start();
include('../phpscript/connection.php');
$db=db_connection();
$userid=$_SESSION['USER_ID'];
$current_pwd=foreign_value('where user_id="'.$userid.'"','tbl__02utilisateurs','mot__de__passe',$db);
if(	$current_pwd <> $_REQUEST['currentpwd'])
{
	echo'<font color="#FF0000">Erreur: mot de passe courant incorrect</font>';
}
else
{
	$q=$db=mysql_query("update tbl__02utilisateurs set mot__de__passe='".$_REQUEST['pwd']."' where user_id='".$userid."' ") or die('Query Failed'.mysql_error());
	echo'<font color="#00CC00">Mot de passe change avec succes!</font>';
}
?>