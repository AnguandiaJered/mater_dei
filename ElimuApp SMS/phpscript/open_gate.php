<?php
@session_start();//session starts always on the first line
include('connection.php');//connection
include('classe_lib.php');//class page
$db=db_connection();//database connection
$login= new open_gate(); //class login
$success_url='../dashboard.php?class=default&action=default&ref_id=default&ref_menu=default';// redirect when login is successfully
$login_url='../index.php';
$fld_array='2,3';//field range from login table(username and password)
if(!isset($_GET['login']))
{
$failure_url='open_gate.php?login=2&compte__d666utilisateur='.$_POST['compte__d666utilisateur'].'&mot__de__passe='.$_POST['mot__de__passe'].'';//redirect back when login failed
$table=2;//login table
$login->set_login($db,$fld_array,$table,$success_url,$failure_url,3,7,'p');//login execution $design_sess=array field
}else
{
switch($_GET['login'])
{
	case 2: 
$failure_url='open_gate.php?login=error';//redirect back when login failed
$table=21;//login table
$login->set_login($db,$fld_array,$table,$success_url,$failure_url,3,7,'g');//login execution $design_sess=array field
	break;
	default:
	$errmsg_arr = array();
$alert='Acces refuse';
		$errflag = true;
	//If there are input validations, redirect back to the login form
	$errmsg_arr[]='<div class="alert alert-danger alert-dismissable" style="width:358px;">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<strong>'.$alert.'</strong>
</div>';
	$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:'.$login_url.'');
		exit();
		}
	break;
}

}
?>