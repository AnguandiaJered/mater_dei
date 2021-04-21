<?php
session_start();
include("../phpscript/connection.php");
$db=db_connection();
$q=mysql_query("select * from tbl__22produit where projet_id='".$_REQUEST['project_id']."'") or die("Query Failed".mysql_error());
	while($row=mysql_fetch_array($q))
	{
		
		if($_REQUEST['action']=='edit')
		{
			echo"<input type='checkbox' ".read_explode_queu($row[0],$db)."  name='activites[]' value='".$row[0]."'/>&nbsp;<span>".$row['produit']."</span><br>";
		}else
		{
			echo"<input type='checkbox'  name='activites[]' value='".$row[0]."'/>&nbsp;<span>".$row['produit']."</span><br>";
		}
		
	}
	
	function read_explode_queu($id,$db)
{
	$db=$q=mysql_query("select * from tbl__34attribution__activites__aux__utilisateurs where attribution_id='".$_REQUEST['ref_id']."'") or die("Query Failed".mysql_error());
	$read=mysql_fetch_array($q);
	$activites=$read['activites'];
	$explode=explode(',',$activites);
	for($i=0; $i<count($explode); $i++)
	{
	if($id==$explode[$i])
	{
		return 'checked';
	}
	else
	{
		continue;
	}
	}
	
}

?>