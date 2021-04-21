<?php
include("../phpscript/connection.php");
$db=db_connection();
$course_id= ($_REQUEST["course_id"]);
if ($division_id <> "" ) { 
$sql = "SELECT * FROM  tbl__10classes  WHERE  	course_id= '".$course_id."' ";
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
<select name="class_id" <?php echo $width;?>>
	<option value="">--Select Class--</option>
	<?php while ($rs = mysql_fetch_array($query)) { ?>
	<option value="<?php echo $rs[0]; ?>"><?php echo $rs[2]; ?></option>
	<?php } ?>
</select>
</label>
<?php 
	}
}
?>