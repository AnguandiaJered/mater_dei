<?php
include('phpscript/connection.php');//connection page
$db=db_connection();
echo '<div style="float:right;"><button type ="button">x</button></div>
<div style="">'.gen_diploma($db,$_GET['classe_id'],$_GET['stdid']).'</div>';
?>
