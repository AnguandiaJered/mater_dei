<?php
session_start();
include("../phpscript/connection.php");
$db=db_connection();
$q=mysql_query("select * from tbl__28partie__prenante where projet_id='".$_REQUEST['project_id']."'") or die("Query Failed".mysql_error());
	?>
    <label>
<select name="partie__prenante"  class="input-xxlarge">
	<option value="">--Selectionner Partie Prenante--</option>
	<?php while ($rs = mysql_fetch_array($q)) { ?>
	<option value="<?php echo $rs[0]; ?>"><?php echo $rs[3]; ?></option>
	<?php } ?>
</select>
</label>
