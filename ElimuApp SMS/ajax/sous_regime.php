<?php
include("../phpscript/connection.php");
$db=db_connection();
$sub_regime_id= ($_REQUEST["sub_regime_id"]);
if ($sub_regime_id <> "" ) { 
$sql = "SELECT * FROM  tbl__64sous__regime__de__gestion  WHERE  	regime__de__gestion_id= '".$sub_regime_id."'";
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
<select name="<?php echo $_REQUEST['input_name'];?>" <?php echo $width;?>>
	<option value="">--Selectionner Sous Division--</option>
	<?php while ($rs = mysql_fetch_array($query)) { ?>
	<option value="<?php echo $rs[0]; ?>"><?php echo $rs[2]; ?></option>
	<?php } ?>
</select>
</label>
<?php 
	}
}
?>