<?php
session_start();
include("../phpscript/connection.php");
$db=db_connection();
$terr_id = ($_REQUEST["territoire__ville_id"] <> "") ? trim( addslashes($_REQUEST["territoire__ville_id"])) : "";
if ($terr_id <> "" ) { 
$sql = "SELECT * FROM tbl__06ville  WHERE  		territoire_id= ".$terr_id."";
$count = mysql_num_rows( mysql_query($sql) );
if ($count > 0 ) {
$query = mysql_query($sql);
if(isset($_REQUEST['class']))
{
if($_REQUEST['class']=='maping')
{
	$width='style="width:120px;"';
}else
{
	$width='style="width:545px;"';
	
}
}else
{
	$width='style="width:360px;"';
}
?>
<label>
<select name="ville_id"  <?php echo $width;?>>
	<option value="">--Selectionner Sites--</option>
	<?php while ($rs = mysql_fetch_array($query)) { ?>
	<option value="<?php echo $rs[0]; ?>"><?php echo $rs[3]; ?></option>
	<?php } ?>
</select>
</label>
<?php 
	}
}
?>