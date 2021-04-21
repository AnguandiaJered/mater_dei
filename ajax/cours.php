<?php
include("../phpscript/connection.php");
$db=db_connection();
$classe_id= ($_REQUEST["classe_id"]);
$enseignant_sess_id= ($_REQUEST["enseignant_sessid"]);
$optionid=foreign_value('where classe_id="'.$classe_id.'"','tbl__15classe','option_id',$db);
$enseignant_id=foreign_value($ref='where user_id='.$enseignant_sess_id.'',$table='tbl__21extra__utilisateur',$fld_range=5,$database=$db);
if ($classe_id <> "" ) { 
$sql = "SELECT * FROM     tbl__43branches  WHERE  	option_id = '".$optionid."' ";
$query=mysql_query($sql);
$count = mysql_num_rows( mysql_query($sql) );
if ($count > 0 ) {
$width='style="width:485px;"';
?>

<select name="cours_id" id="mycours_id" class="form-control" <?php #echo $width;?> onchange="return show_affectation(this);">
	<option value="">--Selectionner Cours--</option>
	<?php while ($rs = mysql_fetch_array($query)) { ?>
	<option value="<?php echo $rs[0]; ?>"><?php echo $rs['branche']; ?></option>
	<?php } ?>
</select>
<?php 
	}
}
?>