<?php
session_start();
include("../phpscript/connection.php");
$db=db_connection();
$q=mysql_query("select * from tbl__28partie__prenante where projet_id='".$_REQUEST['project_id']."'") or die("Query Failed".mysql_error());
$entree=sum_rowsone($db,' tbl__38entree__des__fonds','montant','where projet_id="'.$_REQUEST['project_id'].'"');
$budget=foreign_value('where projet_id="'.$_REQUEST['project_id'].'"','tbl__10nouveau__projet',7,$db);
$ref=($budget-$entree);
	?>
<script>
function check_amount()
{
var a= document.getElementById('montant').value;
var b= document.getElementById('montant2').value;
if(<?php echo $ref;?> < a)
{
	 document.getElementById("demo").innerHTML ="<font color='red'>System Error: Veuillez entrer un nombre inferieur ou egale a "+<?php echo $ref;?>+"</font>";
}else
{
	 document.getElementById("demo").innerHTML = "<font color='green'>Montant Tapper: "+a+"</font><input type='hidden' value='"+a+"' name='montant'/>";
}
return onlyDotsAndNumbers(event);
   }
</script>
	<input type="text" name="montant_typer" id="montant" onkeypress="return check_amount();" class="input-xxlarge"/>
   <label>Montant Disponible:</label> <input type="text" name="montant2" id="montant2" value="<?php echo $ref;?>"  readonly="readonly" class="input-xxlarge"/>
    <p id="demo"></p>