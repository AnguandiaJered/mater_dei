<?php
if(!$_SESSION['EMAIL']||!$_SESSION['PWD']||!$_SESSION['PORTAIL'])
{
	$errmsg_arr = array();
$alert='Access refusé Veuillez Ouvrir La Session';
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
		header('location:index.php');
		exit();
		}
}
?>