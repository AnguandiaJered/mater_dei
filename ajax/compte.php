<?php
include("../phpscript/connection.php");
$db=db_connection();
$type_de_compte_id= ($_REQUEST["type_de_compte_id"]);
if ($type_de_compte_id <> "" ) { 
$sql = "SELECT * FROM      tbl__26compte  WHERE  	 	type__de__compte_id= '".$type_de_compte_id."' ";
$query=mysql_query($sql);
$count = mysql_num_rows( mysql_query($sql) );
if ($count > 0 ) {
?>

<select name="compte_id" class="form-control" onchange="show_enrollment_btn(this);">
	<option value="">--Selectionner Compte--</option>
	<?php while ($rs = mysql_fetch_array($query)) { ?>
	<option value="<?php echo $rs[0]; ?>"><div  style="text-transform:capitalize;"><?php echo $rs[2]; ?></div></option>
	<?php } ?>
</select>
<?php 
	}
}
?>