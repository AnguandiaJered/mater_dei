 <?php
 require('phpscript/security_auto_hacking.php'); 
 require('phpscript/connection.php');
 $db=db_connection();?>
<div style="margin:0 auto; text-align:center;">
Fermeture de la session 
<br>
<img src="img/loader.gif">
<br>
Patienter ...
</div>
<?php
	//checking extra starts
#$check_extra_q=mysql_query("select * from tbl__41online__users where user_id='".$_SESSION['USER_ID']."' and login=1 and logout=0 order by online__users_id desc limit 1") or die("Query Failed".mysql_error());
#$row=mysql_fetch_array($check_extra_q);
#$o_u_q=$db=mysql_query("update  tbl__41online__users set logout=1 where online__users_id='".$row[0]."'") or die("Query Failed".mysql_error());
//send report for logout option ends
//Unset the variables stored in session
//Unset the variables stored in session
	unset($_SESSION['USER_ID']);
	unset($_SESSION['DESIGNATION']);
	unset( $_SESSION['READFK']);
//checking extra ends
	$data_info='Votre session est terminée.';
		$errflag = true;
		$errmsg_arr[]='<div class="alert alert-success alert-dismissable" style="width:358px;">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<strong>'.$data_info.'</strong>
</div>';
		//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		echo '<script>
		function redirectAction(){
			window.location = "index.php";
		}
		setTimeout(redirectAction,3000);
		</script>';
		exit();
	}
	?>


   
	 


    


    