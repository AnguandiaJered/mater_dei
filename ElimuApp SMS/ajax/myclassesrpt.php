<?php
include("../phpscript/connection.php");
$db=db_connection();
$option_id= ($_REQUEST["optionid"]);
if ($option_id <> "" ) { 
$sql = "SELECT * FROM     tbl__15classe  WHERE  	option_id= '".$option_id."' ";
$query=mysql_query($sql);
$count = mysql_num_rows( mysql_query($sql) );
if ($count > 0 ) {
$width='style="width:100px;"';
?>

<select   name="option_id" class="form-control" id="myclasseId" <?php echo $width;?> >
	<option value="">--Selectionner Classe--</option>
	<?php while ($rs = mysql_fetch_array($query)) { ?>
	<option value="<?php echo $rs[0]; ?>"><?php echo $rs[1]; ?></option>
	<?php } ?>
</select>
<?php 
	}
}
?>