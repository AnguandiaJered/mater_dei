<?php
require('../phpscript/connection.php');
$db=db_connection();
if(isset($_GET['id']))
{
	$button='Edit';
	$action="'edit'";
	$valuep=foreign_value('where periodecite_id="'.$_GET['id'].'"',' tbl__41periodicite','periode',$db);
	$valuet=foreign_value('where periodecite_id="'.$_GET['id'].'"',' tbl__41periodicite','trimestre',$db);
	$valueex=foreign_value('where periodecite_id="'.$_GET['id'].'"',' tbl__41periodicite','exam',$db);
	$Id=$_GET['id'];
}else
{
	$button='Sauvegarder';
	$action="'default'";
	$valuep='';
	$valuet='';
	$valueex='';
	$Id=0;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Periodicite</title>
 <SCRIPT language=Javascript>
      <!--
      function onlyDotsAndNumbers(event) {
        var charCode = (event.which) ? event.which : event.keyCode
        if (charCode == 46) {
            return true;
        }
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
      //-->
   </SCRIPT>  
</head>

<body>
<table width="100%" border="0">
  <tr bgcolor="#C1DFFD">
    <th align="left">Periode</th>
    <th align="left">Trimestre</th>
    <th align="left">Exam</th>
    <th align="left">Action</th>
   
  </tr>
  <tr bgcolor="#FFFFFF">
    <td><input type="text" id="PeriodeId" onkeypress="return onlyDotsAndNumbers(event);" value="<?php echo $valuep?>"/></td>
    <td><input type="text" id="TrimestreId" onkeypress="return onlyDotsAndNumbers(event);" value="<?php echo $valuet?>"/></td>
    <td><input type="text" id="ExamId" onkeypress="return onlyDotsAndNumbers(event);" value="<?php echo $valueex?>"/>
    <input type="hidden" id="OptionId" value="<?php echo $_GET['optionid'];?>" /></td>
    <td><button type="button" onClick="return save(3,<?php echo $action; ?>,<?php echo $Id?>);"><?php echo $button;?></button></td>
  </tr>
</table>
<div id="MsgPeriodiciteId"></div>
<script type="text/javascript" src="ajax/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="ajax/ajax.js"></script>
<script type="text/javascript" src="ajax/save.js"></script>

</body>
</html>