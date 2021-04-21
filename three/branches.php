<?php
require('../phpscript/connection.php');
$db=db_connection();
if(isset($_GET['id']))
{
	$button='Edit';
	$action="'edit'";
	$course=foreign_value('where  	branche_id="'.$_GET['id'].'"','   tbl__43branches','branche',$db);
	$p=foreign_value('where  	branche_id="'.$_GET['id'].'"','   tbl__43branches','max__periode',$db);
	$t=foreign_value('where  	branche_id="'.$_GET['id'].'"','   tbl__43branches','max__trimestre',$db);
	$ex=foreign_value('where  	branche_id="'.$_GET['id'].'"','   tbl__43branches','max__exam',$db);
	$Id=$_GET['id'];
}else
{
	$button='Sauvegarder';
	$action="'default'";
	$value='';
	$Id=0;
	$course='';
	$p='';
	$t='';
	$ex='';
}
?>
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
<?php if(!isset($_GET['id']))
{?>
<table width="100%">
  <tr bgcolor="#C1DFFD">
    <th align="left">Nombre Cours</th>
    <th align="left">Action</th>
  </tr>
  <tr>
    <td><input  type="text" id="CourseId"  onkeypress="return onlyDotsAndNumbers(event);"/></td>
    <td><button type="button" onclick=" return Gen_Form('CourseId',<?php echo $_GET['ActiviteId']?>,<?php echo $_GET['OptionId'];?>);">Generer</button></td>
  </tr>
</table>
<?php 
}else
{?>
<table width="100%" >
  <tr bgcolor="#C1DFFD">
    <th align="left">Cours</th>
    <th align="left">Max Periode</th>
    <th align="left">Max Trimestre</th>
    <th align="left">Max exam</th>
    <th align="left">Action</th>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td><input type="text" id="CourseId" value="<?php echo $course;?>" style="width:300px;" /></td>
    <td><input type="text" id="PId" value="<?php echo $p;?>" onkeypress="return onlyDotsAndNumbers(event);"/></td>
    <td><input type="text" id="TId" value="<?php echo $t;?>" onkeypress="return onlyDotsAndNumbers(event);"/></td>
    <td><input type="text" id="EId"   value="<?php echo $ex;?>" onkeypress="return onlyDotsAndNumbers(event);"/></td>
    <td><button type="button" onclick="save(5,'edit',<?php echo $Id;?>)">Editer</button></td>
  </tr>
</table>
<?php 
}?>

<div id="FormGeneratorId"></div>
<script type="text/javascript" src="ajax/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="ajax/ajax.js"></script>
<script type="text/javascript" src="ajax/save.js"></script>
