<?php
 include('function_back_up_tbls.php');
 include('define.php');
 $backup_response = backup_Database( $server_name=servername,$username=username,$pwd=pwd,$db_name=DB);
  if($backup_response) {
	 
	header('location:../dashboard.php?class=backup&action=default&view=default&ref_id=default&ref_menu=default');	  
  }
  else 
  { 
	exit();
header('location:../dashboard.php?class=default&action=default&view=default&ref_id=default&ref_menu=default');	  
 }
?>