<?php
session_start();
//Array to store validation errors
	$errmsg_arr = array();
if(!isset($_SESSION['USER_ID']) || (trim($_SESSION['USER_ID']) == '')) {
		$alert='Votre session est terminée veuiller ouvrir votre session avec une clé authentique.';
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
