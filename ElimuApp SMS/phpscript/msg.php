 &nbsp; <center>
         <?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0 ) {
		
	
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '',$msg,''; 
		}
	
		unset($_SESSION['ERRMSG_ARR']);
	}
?></center>