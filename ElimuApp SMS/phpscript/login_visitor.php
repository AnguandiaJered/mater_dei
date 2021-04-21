<?php
@session_start();//session starts always on the first line
include('connection.php');//connection
$db=db_connection();//database connection
$email=mysql_real_escape_string(strip_tags($_POST['email']));
$pwd=mysql_real_escape_string(strip_tags($_POST['pwd']));
$q=$db=mysql_query("select * from tbl__55visiteurs where email__addresse='$email' and 	access__code='$pwd'") or die("Query Failed".mysql_error());
$row=mysql_fetch_array($q);
$checker=mysql_num_rows($q);
if($checker>=1)
{
$_SESSION['EMAIL']=$row['email__addresse'];
$_SESSION['PWD']=$row['access__code'];
$_SESSION['PORTAIL']=$row['portail_id'];
header('location:../search.php');
	//login Successfully
}else
{
	$errmsg_arr = array();
$alert='Access refusé';
		$errflag = true;
	//If there are input validations, redirect back to the login form
	$errmsg_arr[]='<div class="alert alert-danger">            
                                    <strong>Sys Message!</strong> '.$alert.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
	$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../index.php');
		exit();
		}
}

?>