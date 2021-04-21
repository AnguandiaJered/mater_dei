<?php 
include("../phpscript/connection.php");
$db=db_connection();
$cour_id=$_REQUEST['cours_id'];
$section=foreign_value('where cours_id="'.$cour_id.'"','tbl__13cours','section_id',$db);
if($section == 1)
{
	//
	$maternelle='<option value="3">Trimestre</option>';
}
else
{
	$maternelle='';
}
?>
<select name="affectation" class="form-control" id="AffectationId"  onchange="return show_ordre(this);">
	<option value="">--Selectionner Affectation--</option>
    <option value="1">Periode</option>
    <option value="2">Examen</option>
    <?php //echo $maternelle;?>
    <option value="3">Trimestre</option>
	
</select>
