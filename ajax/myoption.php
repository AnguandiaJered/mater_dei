<?php
include("../phpscript/connection.php");
$db=db_connection();
$section_id=$_REQUEST['mysection_id'];
$par="'ClassId'";
echo mydropdown($db,'where section_id="'.$section_id.'"','tbl__20option','',100,'return show_classes('.$par.',this);','option"id="MyOptionId','option__degre');
?>