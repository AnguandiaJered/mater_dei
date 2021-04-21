<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="save_periode"></div>
<table width="100%" border="1">
  <tr>
    <th>Mois</th>
    <th>Annee</th>
    <th>Quantite</th>
  </tr>
  </table>
  <?php 
include('../phpscript/connection.php');
$db=db_connection();
$pp=$_REQUEST['pp'];
$lib=$_REQUEST['lib'];
$projet_id=$_REQUEST['projet'];
if($_REQUEST['periode']>0)
{
$action='save';
for($k=1; $k<= $_REQUEST['periode']; $k++)
{
?>
<div style="margin-top:15px;">
 <tr>
    
    <td><select name="mois[]" id="mois_<?php echo $k;?>" onchange="chrono<?php echo $dy;?>(this);" style="width:100px;" required>
        <option value="">--Selectionner--</option>
       <?php
	   for($i=1; $i<=12; $i++)
	   {?>
       <option value="<?php echo $i;?>">
      <?php echo get_moth_word($i,'fr');?></option>
       <?php 
	   }?>
      </select></td>
      <td><select name="annee[]" id="annee_<?php echo $k;?>"   style="width:100px;" required>
        <option value="">--Selectionner--</option>
       <?php
	 
	   for($i=2016; $i<= 2100; $i++)
	   {
	   ?>
       <option value="<?php echo $i;?>"
     ><?php echo $i;?></option>
       <?php 
	   }?>
      </select></td>
    <td><input type="text" name="qte[]" id="qte_<?php echo $k;?>" onkeypress="return onlyDotsAndNumbers(event);" /></td>
  </tr>
  </div>
  <?php
}
}else
{
	$action='edit';
	$k=0;
	$n=0;
	$kweri=$db=mysql_query("select * from tbl__48libelle__tresorerie where libelle_id='".$lib."'") or die("Query Failed");
	while($row=mysql_fetch_array($kweri))
	{
		$k++;
		$n++;
		?>
    <div style="margin-top:15px;">
 <tr>
    
    <td><select name="mois[]" id="mois_<?php echo $k;?>" onchange="chrono<?php echo $dy;?>(this);" style="width:100px;" required>
        <option value="">--Selectionner--</option>
       <?php
	   for($i=1; $i<=12; $i++)
	   {?>
       <option <?php if($row['mois']==$i){echo'selected';}?> value="<?php echo $i;?>">
      <?php echo get_moth_word($i,'fr');?></option>
       <?php 
	   }?>
      </select></td>
      <td><select name="annee[]" id="annee_<?php echo $k;?>"   style="width:100px;" required>
        <option value="">--Selectionner--</option>
       <?php
	 
	   for($i=2016; $i<= 2100; $i++)
	   {
	   ?>
       <option <?php if($row['annee']==$i){echo'selected';}?> value="<?php echo $i;?>"
     ><?php echo $i;?></option>
       <?php 
	   }?>
      </select></td>
    <td><input type="text" name="qte[]" id="qte_<?php echo $k;?>" onkeypress="return onlyDotsAndNumbers(event);"  value="<?php echo $row['quantite'];?>"/></td>
    <td><input type="hidden" id="id_<?php echo $k;?>" value="<?php echo $row[0];?>" /></td>
  </tr>
  </div>
	
<?php
	}
}
  ?>
  <br />
<div  align="center">
<select onchange="return save_periode(this);">
<option value="">--Executer Action--</option>
<option value="1"><?php if($action=='save'){?>Sauvegarder<?php }else{?>Editer<?php }?></option>
</select>
</div>
<script src="ajax/jquery-1.9.0.min.js"></script>
<script>
function save_periode(sel) {
	var division_id = sel.options[sel.selectedIndex].value; 
	var qte=0;
	var jr=''; 
	<?php
	if($_REQUEST['periode']>0)
	{
	$myref=$_REQUEST['periode'];
	}else{
		$myref=$n;
		}
	for($k=1; $k<= $myref; $k++)
	{
	?>
	qte+=+document.getElementById('qte_<?php echo $k;?>').value;
	<?php 
	if($_REQUEST['periode']>0)
	{?>
	jr+='annee="'+document.getElementById('annee_<?php echo $k;?>').value+'",mois="'+document.getElementById('mois_<?php echo $k;?>').value+'",quantite="'+document.getElementById('qte_<?php echo $k;?>').value+'",projet_id="<?php  echo $projet_id?>",libelle_id="<?php echo $lib;?>"|';
	<?php
	}else
	{?>
	jr+='annee="'+document.getElementById('annee_<?php echo $k;?>').value+'",mois="'+document.getElementById('mois_<?php echo $k;?>').value+'",quantite="'+document.getElementById('qte_<?php echo $k;?>').value+'",projet_id="<?php  echo $projet_id?>",libelle_id="<?php echo $lib;?>" where libelle_tr="'+document.getElementById('id_<?php echo $k;?>').value+'"|';
	<?php
	}
	}
	?>
	var pp='<?php echo $pp;?>';
	var act='<?php echo $action;?>';
	if (division_id  .length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/save_periode.php",
			data: "periode="+qte+"&pp="+pp+"&j="+jr+"&projet_id="+<?php echo $projet_id;?>+"&act="+act+"",
			cache: false,
			beforeSend: function () { 
				$('#save_periode').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#save_periode").html( html );
			}
		});
	} else {
		$("#save_periode").html( "" );
	}
}
</script>


</body>
</html>