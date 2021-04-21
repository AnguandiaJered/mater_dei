<?php
include("../phpscript/connection.php");
$db=db_connection();
$option_id= ($_REQUEST["option_id"]);
if ($option_id <> "" ) { 
$sql = "SELECT * FROM     tbl__15classe  WHERE  	option_id= '".$option_id."' ";
$query=mysql_query($sql);
$count = mysql_num_rows( mysql_query($sql) );
if ($count > 0 ) {
?>

<select name="classe_id" class="form-control" onchange="show_enrollment_btn(this);">
	<option value="">--Selectionner Classe--</option>
	<?php while ($rs = mysql_fetch_array($query)) { ?>
	<option value="<?php echo $rs[0]; ?>"><div  style="text-transform:capitalize;"><?php echo $rs[1]; ?></div></option>
	<?php } ?>
</select>
<?php 
	}
}
?>