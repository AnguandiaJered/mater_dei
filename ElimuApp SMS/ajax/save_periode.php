<?php
include('../phpscript/connection.php');
$db=db_connection();//connection variable
$total_q=$_REQUEST['periode'];
$project_q=$_REQUEST['pp'];
$kweri=$_REQUEST['j'];
$action=$_REQUEST['act'];
if($total_q>$project_q)
{
	echo'Verifier les entrees Quantites';
}
else if($total_q<1)
{
	echo'Veuillez Remplir la case Quantite';
}
else if($total_q<$project_q)
{
	echo'Veuillez egaliser la quantite avec les entrees';
}
else
{
	
	$expl=explode('|',$kweri);
	for($i=0; $i<count($expl); $i++)
	{
		if($action=='save')
		{$q=$db=mysql_query("insert into tbl__48libelle__tresorerie set ".$expl[$i]." ");# or die("Query Failed".mysql_error());
		$delq=mysql_query("delete from tbl__48libelle__tresorerie where quantite=0");
		}else
		{
		$q=$db=mysql_query("update tbl__48libelle__tresorerie set ".$expl[$i]." ") ;
		}
	}
	if($action=='save'){echo'<h2 style="color:green;">Plan de tresorerie ajoute avec succes!!</h2>';}else{echo'<h2 style="color:green;">Plan de tresorerie edite avec succes!!</h2>';}
	$back='dashboard.php?class=47&action=default&ref_id='.$_REQUEST['projet_id'].'&ref_menu=default&signal=green_light';
	echo '<script>
		function redirectAction(){
			window.location = "'.$back.'";
		}
		setTimeout(redirectAction,1000);
		</script>';
}

?>
