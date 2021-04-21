<?php
include("../phpscript/connection.php");
$db=db_connection();
$classes=strrev(substr(strrev($_REQUEST['classes']),1));
$n=$_REQUEST['n'];
$q=$db=mysql_query("select * from  tbl__15classe") or die("Query Failed".mysql_error());
$content='';
while($row=mysql_fetch_array($q))
{
	if(check_class_exist($classes,$row[0])<1){continue;}
	$content.=$row['enseignant_id'].',';
}
echo read_lecturer($db,strrev(substr(strrev($content),1)),$n);
echo'<div id="TextAreaId2'.$n.'"><textarea  id="MyTextAreaId2'.$n.'" readonly></textarea></div>';
function check_class_exist($class_string,$classid)
{
	$exp=explode(',',$class_string);
	for($i=0; $i<count($exp); $i++)
	{
		if($exp[$i]==$classid)
		{
			return 1;
		}
		else
		{
			continue;
		}
	}
}
function read_lecturer($db,$strlec_id,$n)
{
	$exp=explode(',',$strlec_id);
	$content='';
	for($i=0; $i<count($exp);$i++)
	{
	$par="'".foreign_value('where enseignant_id="'.$exp[$i].'"',' tbl__12enseignants','nom__complet',$db)."','MyTextAreaId2','TextAreaId2','ClassesIddeux'";
	$content.='<div id="ClassesIddeux'.$exp[$i].'">
	<input type="checkbox" value="'.$exp[$i].'" onclick="return send_class('.$exp[$i].','.$n.','.$par.')">'.foreign_value('where enseignant_id="'.$exp[$i].'"',' tbl__12enseignants','nom__complet',$db).'
	</div><hr><br/>';
	}
	return $content;
}
?>