<?php
session_start();
include("../phpscript/connection.php");
$db=db_connection();
$from=$_REQUEST['from'];
$to=$_REQUEST['to'];
$feeid=$_REQUEST['feeid'];
$sectionid=$_REQUEST['sectionid'];
$optionid=$_REQUEST['optionid'];
$classeid=$_REQUEST['classeid'];
$parameters="'".$from."','".$to."','".$feeid."','".$sectionid."','".$optionid."','".$classeid."'";
if(!isset($_REQUEST['display']))
{
if($classeid<1)
{
	$ref='';
}else
{
	$ref='where classe_id="'.$classeid.'"';
}
echo'<button style="float:right;" type="button" onclick="return pdf_genrpt('.$parameters.');">PDF</button>'.insolvable($db,'tbl__15classe',$ref,$feeid,$classeid,$from,$to);
}
else
{
	echo'<iframe src="MPDF57/examples/rapport_solvabilite.php?from='.$from.'&to='.$to.'&feeid='.$feeid.'&sectionid='.$sectionid.'&optionid='.$optionid.'&classeid='.$classeid.'" width="100%" height="800px;" frameborder="0"></iframe>';
}


?>
