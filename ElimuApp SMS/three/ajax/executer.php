<?php
require('../../phpscript/connection.php');
$db=db_connection();
$action=$_REQUEST['Action'];
$type=$_REQUEST['Type'];
$id=$_REQUEST['Id'];
switch($type)
{
	case 1:
	$section=$_REQUEST['SectionId'];
	if($action == 'default'):
	$q=$db=mysql_query("insert into  tbl__11section set section='".$section."'") or die('Query Failed'.mysql_error());
	else:
	$q=$db=mysql_query("update tbl__11section set section='".$section."' where section_id='".$id."'") or die('Query Failed'.mysql_error());
	endif;
	break;
	case 2:
	$section=$_REQUEST['SectionId'];
	$option=$_REQUEST['OptionId'];
	if($action == 'default'):
	$q=$db=mysql_query("insert into   tbl__20option set section_id='".$section."',option__degre='".$option."'") or die('Query Failed'.mysql_error());
	else:
	$q=$db=mysql_query("update  tbl__20option set section_id='".$section."',option__degre='".$option."' where option_id='".$id."'") or die('Query Failed'.mysql_error());
	endif;
	break;
	case 3:
	$option=$_REQUEST['OptionId'];
	$exam=$_REQUEST['Exam'];
	$trimestre=$_REQUEST['Trimestre'];
	$periode=$_REQUEST['Periode'];
	if($action == 'default'):
	$q=$db=mysql_query("insert into  tbl__41periodicite set option_id='".$option."',periode='".$periode."',trimestre='".$trimestre."',exam='".$exam."'") or die('Query failed'.mysql_error());
	else:
	$q=$db=mysql_query("update  tbl__41periodicite set option_id='".$option."',periode='".$periode."',trimestre='".$trimestre."',exam='".$exam."' where periodecite_id='".$id."'") or die('Query failed'.mysql_error());
	endif;
	break;
	case 4:
	if($action == 'default'):
	$q=$db=mysql_query("insert into  tbl__42activites set option_id='".$_REQUEST['OptionId']."',activite='".strip_tags(mysql_real_escape_string($_REQUEST['ActiviteId']))."'") or die("Query Failed".mysql_error());
	else:
	$q=$db=mysql_query("update  tbl__42activites set option_id='".$_REQUEST['OptionId']."',activite='".$_REQUEST['ActiviteId']."' where activite_id='".$id."'") or die("Query Failed".mysql_error());
	endif;
	break;
	case 5:
	if($action =='default'):
	$sql_query=strrev(substr(strrev($_REQUEST['Sql']),1));
	$exp=explode('|',$sql_query);
	for($i=0; $i<count($exp); $i++)
	{
		$sql=$db=mysql_query("".$exp[$i]."") or die('Query Failed'.mysql_error());
		//echo $exp[$i].'<br/>';
	}
	else:
	$q=$db=mysql_query("update  tbl__43branches set branche='".strip_tags(mysql_real_escape_string($_REQUEST['Course']))."',max__periode='".$_REQUEST['Periode']."',max__trimestre='".$_REQUEST['Trimestre']."',max__exam='".$_REQUEST['Exam']."' where branche_id='".$id."'") or die('Query Failed'.mysql_error());
	endif;
	break;
	default:
	echo'Invalid Option';
	break;
}
echo '<script>  RefreshTree();</script>
<font color="#009900">Action effectuee avec succes</font>';
?>