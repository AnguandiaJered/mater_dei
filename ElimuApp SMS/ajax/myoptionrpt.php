<?php
include("../phpscript/connection.php");
$db=db_connection();
$section_id= ($_REQUEST["section_id"]);
if ($section_id <> "" ) { 
$sql = "SELECT * FROM    tbl__20option  WHERE  	section_id= '".$section_id."' ";
$query=mysql_query($sql);
$count = mysql_num_rows( mysql_query($sql) );
if ($count > 0 ) {
$width='style="width:100px;"';
?>

<select name="option_id" class="form-control" id="optionId" <?php echo $width;?> onchange="return show_classes(this);">
	<option value="">--Selectionner Option--</option>
	<?php while ($rs = mysql_fetch_array($query)) { ?>
	<option value="<?php echo $rs[0]; ?>"><?php echo $rs[2]; ?></option>
	<?php } ?>
</select>
<?php 
	}
}
?>