<?php
session_start();
include("../phpscript/connection.php");
$db=db_connection();
$form_id = ($_REQUEST["form_id"]);
$sql = "SELECT * FROM tbl__22forme__prise__en__compte  order by forme__prise__en__compte";
if ($form_id > 0 ) {
$query = mysql_query($sql);
?>
<label>
<select name="<?php echo $_REQUEST['input_name']; ?>"  class="input-xxlarge">
	<option value="">--Indiquer sous quelle forme--</option>
	<?php while ($rs = mysql_fetch_array($query)) { ?>
	<option value="<?php echo $rs[0]; ?>"><?php echo $rs[1]; ?></option>
	<?php } ?>
</select>
</label>
<?php 
	}
?>