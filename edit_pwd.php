<?php
session_start();
include('phpscript/connection.php');//connection page
$db=db_connection();//connection variable
//$userid=$_SESSION['USER_ID'];
//$current_pwd=foreign_value('where user_id="'.$userid.'"','tbl__02users','mot__de__passe',$db);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Pwd</title>
<style type="text/css">
tr.spaceUnder > td
{
  padding-bottom: 1em;
}
</style>
</head>

<body>
<div id="msgId"></div>
<table width="100%" border="0">
  <tr class="spaceUnder">
    <td>Mot de passe courant</td>
    <td>
     <div id="show_currentpwd"><input type="password" name="textfield" id="currentpwdid" /></div></td>
  </tr>
  <tr class="spaceUnder">
    <td>Nouveau mot de passe</td>
    <td>
   <div id="show_pwd"> <input type="password" name="textfield" id="pwd" /></div></td>
  </tr>
  <tr class="spaceUnder">
    <td>Confirmer mot de passe</td>
    <td>
    <div id="show_cpwd"><input type="password" name="textfield" id="cpwd" /></div></td>
  </tr>
  <tr>
    <td><div id="show_pwd_btn"><input type="checkbox" onclick="show_pwd();" />&nbsp;<label>Afficher Mot de passes</label></div></td>
    <td>
    <button onclick="alter_pwd();">Changer mot de passe</button>
   </td>
  </tr>
</table>
</body>
</html>
<script src="ajax/jquery-1.9.0.min.js"></script>
<script>
function show_pwd()
{
	var pwd_value,cpwd_value,currentpwd;
	pwd_value= document.getElementById('pwd').value;
	cpwd_value= document.getElementById('cpwd').value;
	currentpwd= document.getElementById('currentpwdid').value;
	document.getElementById('show_pwd_btn').innerHTML='<input type="checkbox" onclick="hide_pwd();" />&nbsp;<label>Masquer Mot de passes</label>';
	document.getElementById('show_pwd').innerHTML='<input type="text" name="textfield" value="'+pwd_value+'" id="pwd"  />';
	document.getElementById('show_cpwd').innerHTML='<input type="text" name="textfield" value="'+cpwd_value+'" id="cpwd"  />';
	document.getElementById('show_currentpwd').innerHTML='<input type="text" name="textfield" value="'+currentpwd+'" id="currentpwdid"  />';
	//document.getElementById('pwd').
}
function hide_pwd()
{
    var pwd_value,cpwd_value,currentpwd;
	pwd_value= document.getElementById('pwd').value;
	cpwd_value= document.getElementById('cpwd').value;
	currentpwd= document.getElementById('currentpwdid').value;
	document.getElementById('show_pwd_btn').innerHTML='<input type="checkbox" onclick="show_pwd();" />&nbsp;<label>Afficher Mot de passes</label>';
	document.getElementById('show_pwd').innerHTML='<input type="password" name="textfield" value="'+pwd_value+'" id="pwd"  />';
	document.getElementById('show_cpwd').innerHTML='<input type="password" name="textfield" value="'+cpwd_value+'" id="cpwd"/>';
	document.getElementById('show_currentpwd').innerHTML='<input type="password" name="textfield" value="'+currentpwd+'" id="currentpwdid"  />';	
}
function alter_pwd()
{
	var pwd,cpwd,currentpwd,msgbox;
	pwd= document.getElementById('pwd').value;
	cpwd= document.getElementById('cpwd').value;
	currentpwd= document.getElementById('currentpwdid').value;
	if(currentpwd =='')
	{
		alert('Veuillez ajouter le mot de passe courant');
		document.getElementById('currentpwdid').focus();
	}else if(pwd == '')
	{
		alert('Veuillez ajouter le mot de passe');
		document.getElementById('pwd').focus();
	}
	else if(pwd.length < 6)
	{
		alert('La longeur du mot de passe est supereieur a 5 carateurs');
		document.getElementById('pwd').focus();
	}
	else if(cpwd == '')
	{
		alert('Veuillez confirmer le mot de passe');
		document.getElementById('cpwd').focus();
	}
	else if(pwd != cpwd)
	{
		alert('Les deux mot de passes ne sont semblables');
		return show_pwd();
	}
	else
	{
		//process
		msgbox= confirm('Etes vous sur de changer votre mot de passe ?');
		if(msgbox == true)
		{
	$.ajax({
      type: "POST",
      url: "ajax/edit_pwd.php",
      data: "pwd="+pwd+"&currentpwd="+currentpwd+"",
      cache: false,
      beforeSend: function () { 
        $('#msgId').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
      },
      success: function(html) {    
        $("#msgId").html( html );
      }
    });	
		}
	}
}
</script>