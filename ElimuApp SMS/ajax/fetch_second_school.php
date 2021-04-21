<?php
include("../phpscript/connection.php");
$db=db_connection();
$second_id= ($_REQUEST["second_id"]);
if ($second_id>=1 ) { 

?>
<label>
<input type="text" name="le__nom__du__deuxieme__etablissement" class="input-xxlarge" />
</label>
<?php 
	
}
?>