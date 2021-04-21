<?php
include("../phpscript/connection.php");
$db=db_connection();
$choice_id= ($_REQUEST["choice_id"]);
if(isset($_REQUEST['case'])&& $_REQUEST['case']==1)
{
	
	 $par="'caisse_bank_IdFirst'";
  $onchange='ShowSolde('.$choice_id.','.$par.')';
   $JsId='id="caisse_bank_IdFirst"';
}
else
{
  $onchange=''; 
  $JsId='id="caisse_bank_Id"';
}
if ($choice_id <> "" ) { 
switch($choice_id)
{
	case 1:
	$tbl='tbl__23caisse';
	break;
	case 2:
	$tbl='tbl__24banque';
	break;
}

if ($choice_id<3) {
$sql = "SELECT * FROM      ".$tbl." ";
$query=mysql_query($sql);
$count = mysql_num_rows( mysql_query($sql) );
?>

<select name="caisse__ou__banque_id" <?php echo $JsId;?> class="form-control" onchange="<?php echo $onchange;?>">
	<option value="">--Selectionner Compte --</option>
	<?php while ($rs = mysql_fetch_array($query)) { ?>
	<option value="<?php echo $rs[0]; ?>"><div  style="text-transform:capitalize;"><?php echo $rs[1]; ?></div></option>
	<?php } ?>
</select>
<input type="hidden" name="choice_id"  value="<?php echo $choice_id;?>"/>
<?php 
	}
	else
	{
		echo'global';
	}
}
?>