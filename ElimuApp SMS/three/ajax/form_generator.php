<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Generator</title>
<script src="jquery-1.9.0.min.js"></script>
<script src="save.js"></script>
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
<table width="100%">
  <tr bgcolor="#E6FFD7">
    <td>Action</td>
    <td><button onclick="MultipleSave(<?php echo $_REQUEST['n']?>,<?php echo $_REQUEST['ActiviteId'];?>,<?php echo $_REQUEST['OptionId'];?>)">Sauvegarder</button></td>
  </tr>
  <tr>
    <td>Nox</td>
    <td>Cours</td>
    <td>Max Periode</td>
    <td>Max Trimestre</td>
     <td>Max Exam</td>
  </tr>
  <?php
  $j=0;
   for($i=0; $i<$_REQUEST['n'];$i++)
  { 
  $j++; ?>
  <tr bgcolor="#FFFFFF">
    <td><?php echo $j;?></td>
    <td><input type="text" style="width:300px;" id="MyCourseId<?php echo $j;?>"/></td>
    <td><input type="text" id="PId<?php echo $j;?>" onkeypress="return onlyDotsAndNumbers(event);"/></td>
    <td><input type="text" id="TId<?php echo $j;?>" onkeypress="return onlyDotsAndNumbers(event);"/></td>
    <td><input type="text" id="EId<?php echo $j;?>" onkeypress="return onlyDotsAndNumbers(event);"/></td>
  </tr>
  <?php 
  }?>
</table>
</body>
</html>