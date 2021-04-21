<?php
include("../phpscript/connection.php");
$db=db_connection();
$optionid=foreign_value('where classe_id="'.$_REQUEST['classe_id'].'"','tbl__15classe','option_id',$db);
$periode=foreign_value($ref='where option_id='.$optionid.'',$table='  tbl__41periodicite',$fld_range='periode',$database=$db);
$exam=foreign_value($ref='where option_id='.$optionid.'',$table='  tbl__41periodicite',$fld_range='exam',$database=$db);
$trimestre=foreign_value($ref='where option_id='.$optionid.'',$table='  tbl__41periodicite',$fld_range='trimestre',$database=$db);
if($_REQUEST['myaffectid']==1)
{
	$ref=$periode;
}
else if($_REQUEST['myaffectid']==2)
{
	$ref=$exam;
}
else if($_REQUEST['myaffectid']==3)
{
	$ref=$trimestre;
}
$content='';
for($j=1; $j<=$ref; $j++)
{
	$content.=' <option value="'.$j.'">'.$j.'</option>';
}
?>
<select name="ordre" class="form-control"   onchange="return show_markbtn(this);">
 <option value="">--Selectionner--</option>
	<?php  echo $content;?>
   
	
</select>
