<?php
include("../phpscript/connection.php");
$db=db_connection();
$stdid=$_REQUEST['stdid'];
$sectionid=$_REQUEST['sectionid'];
$par="'".$sectionid."'";
$classid=$_REQUEST['classe_id'];
//$design='pdf';
$parmeters_pdf="'pdf'";
if($_REQUEST['design']=='html')
{
echo '
<div style="border:5px solid #C1DFFD;float:left; background-color:white; width:80%;">'.gen_diploma($db,$_REQUEST['classe_id'],$_REQUEST['stdid']).'</div>
';
$print_btn='<button type="button" onclick="printDiv('.$par.')">Imprimer</button>';
}
else
{
	echo'<div style="border:5px solid #C1DFFD;float:left; background-color:white; width:90%;"><iframe src="MPDF57/examples/kindergarten_diploma.php?classe_id='.$_REQUEST['classe_id'].'&stdid='.$_REQUEST['stdid'].'" width="100%" height="800px;" frameborder="0"></iframe></div>';
	$print_btn='';
}
echo'
<div style="float:right;" id="PrintId"><button type ="button" onclick="html_diploma('.$stdid.','.$classid.','.$par.','.$parmeters_pdf.');">PDF</button>&nbsp;'.$print_btn.'&nbsp;<button type ="button" onclick="return close_window('.$par.');">x</button></div>';
?>