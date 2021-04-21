<?php
include("../phpscript/connection.php");
$db=db_connection();
$source_id= ($_REQUEST["source_id"]);
if ($source_id>=1 ) { 
$sql = "SELECT * FROM  tbl__20type__point__d666eau ORDER BY type__point__d666eau";
$count = mysql_num_rows( mysql_query($sql) );
if ($count > 0 ) {
$query = mysql_query($sql);
if($_REQUEST['class']=='maping')
{
	$width='style="width:120px;"';
}else
{
	$width='style="width:545px;"';
	
}
?>
<label>
<select name="type__point__d666eau_id" <?php echo $width;?>>
	<option value="">--Selectionner type de point d'eau--</option>
	<?php while ($rs = mysql_fetch_array($query)) { ?>
	<option value="<?php echo $rs[0]; ?>"><?php echo $rs[1]; ?></option>
	<?php } ?>
</select>
</label>
<?php 
	}
}
?>