<?php
//Include the PS_Pagination class
include('ps_pagination.php');
include('connection.php');
	
	
	
	/*
	 * Create a PS_Pagination object
	 * 
	 * $conn = MySQL connection object
	 * $sql = SQl Query to paginate
	 * 10 = Number of rows per page
	 * 5 = Number of links
	 * "param1=valu1&param2=value2" = You can append your own parameters to paginations links
	 */
	 	
	$data_query="select * from  tbl__00article";
								//Create a PS_Pagination object
	$pager = new PS_Pagination($conn, $data_query, $pagination_limit=2, 5);

	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();
	
	//Loop through the result set just as you would loop
	if(!$rs)
	{
		echo'<div class="'.$css_error_msg.'">Oops! no much record has been found</strong></div>';
	}
	else
	{
					while($print_data=mysql_fetch_array($rs))
					{
					echo'Booba<br>';
					
					}
					//Display the navigation
	//echo $pager->renderFullNav();
	echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
	}
			
	
	
?>
