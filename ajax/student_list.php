<?php
include("../phpscript/connection.php");
$db=db_connection();
$section=$_REQUEST['section'];
$option=$_REQUEST['option'];
$classe=$_REQUEST['classe'];
$design=$_REQUEST['design'];
if($design == 'html')
{
echo student_list($db,$section,$option,$classe);
}
else
{
	echo'<iframe src="MPDF57/examples/student_list.php?section='.$section.'&option='.$option.'&classe='.$classe.'" width="100%" height="800px;" frameborder="0"></iframe>';
}
?>