<?php
include("../phpscript/connection.php");
$db=db_connection();
$option=$_REQUEST['myoption_id'];
$n='';
$q=$db=mysql_query("select * from  tbl__15classe where option_id='".$option."'") or die("Query Failed".mysql_error());
$content='';
while($row=mysql_fetch_array($q))
{
	//labelname,sectionid,TextareadId,divTeaxtareaId,divCheckboxId
	$par="'".$row['nom__de__la__classe']."','MyTextAreaId','TextAreaId','ClassesId'";
	$content.='<div id="ClassesId'.$row[0].'"><label>'.$row['nom__de__la__classe'].'</label><input type="checkbox"  value="'.$row[0].'" onclick="return send_class('.$row[0].','.$n.','.$par.')"></div>';
}
if($option>0)
{
echo $content;
echo'<div id="TextAreaId"><textarea  id="MyTextAreaId" readonly></textarea></div><br/>
<button type="button" onClick="return gen_lecturer('.$n.')">Gen Enseignant</button>';
}
?>