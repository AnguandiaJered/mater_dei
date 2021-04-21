<?php
include('../phpscript/security_auto_hacking.php');
include('../phpscript/connection.php');
$db=db_connection();//connection variable
$_SESSION['UPLOAD_FILE']=6;
if(foreign_value('where enseignant_id="'.$_GET['id'].'"','tbl__21extra__utilisateur',5,$db)<1)
{
	$action='default';
	$id='default';
}else
{
	$action='edit';
	$id=foreign_value('where enseignant_id="'.$_GET['id'].'"','tbl__21extra__utilisateur',1,$db);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Creer compte enseignant</title>
<script>
function show_alert() {
  if(confirm("Etes-vous sure de terminer cette action?\nSi oui alors assurer vous que tous les champs sont deja remplis\nAutrement vous devriez les remplir avant de continuer."))
    document.forms[0].submit();
  else
    return false;
}
</script>
</head>

<body>
<h3>Creation Compte Enseignant</h3>
<br />
<form id="form1" name="form1" method="post" onsubmit=" return show_alert();" enctype="multipart/form-data" action="<?php echo '../phpscript/executer.php?class=21&action='.$action.'&ref_id='.$id.'&ref_menu=default';?>">
<table width="100%" border="0">
<tr>
    <td>Nom Complet</td>
    <td><?php echo foreign_value('where enseignant_id="'.$_GET['id'].'"','tbl__12enseignants',2,$db);?></td>
  </tr>
  <tr>
    <td>E-mail</td>
    <td><label for="textfield"></label>
      <input type="text" name="compte__d666utilisateur" id="emailid" value="<?php if($action=='edit'){ echo foreign_value('where user_id ="'.$id.'"',' tbl__21extra__utilisateur',2,$db); }?>" />
      <input type="hidden" name="enseignant_id"  value="<?php echo $_GET['id'];?>" />
       <input type="hidden" name="designation" value="enseignant" /> <div id="check_email"></div></td>
  </tr>
  <tr>
    <td>Mot de Passe</td>
    <td><label for="textfield2"></label>
      <input type="text" name="mot__de__passe" id="pwdid" value="<?php if($action=='edit'){ echo foreign_value('where user_id ="'.$id.'"',' tbl__21extra__utilisateur',3,$db); }?>" /><div id="check_pwd"></div></td>
  </tr>
   <tr>
    <td>Confirmer mot de Passe</td>
    <td><label for="textfield2"></label>
      <input type="text" name="textfield2" id="cpwdid" value="<?php if($action=='edit'){ echo foreign_value('where user_id ="'.$id.'"',' tbl__21extra__utilisateur',3,$db); }?>" /><div id="check_cpwd"></div></td>
  </tr>
   <tr>
    <td>Designation</td>
    <td><select name="designationx" onchange="return show_savebtn(this);">
    <option value="">--- Selectionner Designation ---</option>
    <option value="1">Enseignant</option>
    </select></td>
  </tr>
  <tr>
    <td>Photo</td>
    <td><label for="fileField"></label>
      <input type="file" name="photo" id="fileField" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div id="saveid"></div></td>
  </tr>
</table>
</form>
<script src="../ajax/jquery-1.9.0.min.js"></script> 
<script>
function show_savebtn(sel) {
	var id = sel.options[sel.selectedIndex].value;  
	var email=document.getElementById('emailid').value;
	var pwd=document.getElementById('pwdid').value;
	var cpwd=document.getElementById('cpwdid').value;
	if (id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "../ajax/savebtn.php",
			data: "<?php echo ajax_url(0,$action);?>",
			cache: false,
			beforeSend: function () { 
				$('#saveid').html('<img src="../ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#saveid").html( html );
			}
		});
	} else {
		$("#saveid").html( "" );
	}
	if (id  .length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "../ajax/savebtn.php",
			data: "<?php echo ajax_url(4,$action);?>",
			cache: false,
			beforeSend: function () { 
				$('#check_email').html('<img src="../ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#check_email").html( html );
			}
		});
	} else {
		$("#check_email").html( "" );
	}
	if (id  .length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "../ajax/savebtn.php",
			data: "<?php echo ajax_url(5,$action);?>",
			cache: false,
			beforeSend: function () { 
				$('#check_pwd').html('<img src="../ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#check_pwd").html( html );
			}
		});
	} else {
		$("#check_pwd").html( "" );
	}
	if (id  .length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "../ajax/savebtn.php",
			data: "<?php echo ajax_url(6,$action);?>",
			cache: false,
			beforeSend: function () { 
				$('#check_cpwd').html('<img src="../ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#check_cpwd").html( html );
			}
		});
	} else {
		$("#check_cpwd").html( "" );
	}
}
</script>
</body>
</html>