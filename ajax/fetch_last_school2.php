<?php
include("../phpscript/connection.php");
$db=db_connection();
if($_REQUEST['student_category_id']==2)
{
	echo'<textarea name="cause__detail" class="input-xxlarge" placeholder="Describe why the student left the school"></textarea>';
}
?>

