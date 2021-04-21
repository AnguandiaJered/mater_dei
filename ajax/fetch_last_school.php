<?php
include("../phpscript/connection.php");
$db=db_connection();
if($_REQUEST['student_category_id']==2)
{
	echo'<input type="text" name="last__school__name" class="input-xxlarge"/>';
}
?>

