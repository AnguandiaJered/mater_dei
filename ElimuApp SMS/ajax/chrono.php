<?php
$myrequest=$_REQUEST['form_id'];
if($myrequest=='general')
{
	$header='<select name="exec" onChange="form.submit();">
	<option value="">--Selectionner--</option>';
	
		$content='<option value="exec">Generer Graphique Chronogramme</option>';
	
	$footer='</select>';
	echo $header.$content.$footer;
}else
{
	$header='<select name="exec" onChange="form.submit();">
	<option value="">--Selectionner--</option>';
	$content='';
	for($i=$myrequest; $i<=2100; $i++)
	{
		$content.='<option value="'.$i.'">'.$i.'</option>';
	}
	$footer='</select>';
	echo $header.$content.$footer;
}
?>