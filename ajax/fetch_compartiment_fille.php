<?php
include("../phpscript/connection.php");
$db=db_connection();
$compartiment_id= ($_REQUEST["compartiment_id"]);
if ($compartiment_id>=1 ) { 

?>
<label>
<select name="le__nombre__de__compartiment__dont__pour__fille" style="width:545px">
	<option value="">--Selectionner le nombre de compartiment--</option>
	<?php for($i=1; $i<=50; $i++)
	{ ?>
	<option value="<?php echo $i ?>"><?php echo $i; ?></option>
	<?php } ?>
</select>
</label>
<?php 
}
?>