<?php
include('phpscript/security_auto_hacking.php'); //avoid unautorized login
require('phpscript/connection.php');
$db=db_connection();//connection variable
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inscription Eleve</title>
</head>

<body>
<table width="100%">
<tr>
<th align="left">Classe</th>
<th align="left">Cours</th>
<th align="left">Affectation</th>
<th align="left">Ordre</th>
<th align="left">Encodage Point</th>
</tr>
<tr>
<td><?php echo mydropwodwn($db,'tbl__15classe','',0,'nom__de__la__classe','form-control','onchange="return show_cours(this);"','classe_id','Selectionner Cours','classe_id');?></td>
<td><div id="cours_id"></div></td>
<td><div id="affectation_id"></div></td>
<td><div id="order_id"></div></td>
<td><div id="markbtn_id"></div></td>
</tr>
</table>
</body>
</html>
<script src="ajax/jquery-1.9.0.min.js"></script> 
<script>
function show_cours(sel) {
	var classe_id = sel.options[sel.selectedIndex].value;  
	if (classe_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/cours.php",
			data: "classe_id="+classe_id+"&enseignant_sessid="+<?php echo $_SESSION['USER_ID'];?>+"",
			cache: false,
			beforeSend: function () { 
				$('#cours_id').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#cours_id").html( html );
			}
		});
	} else {
		$("#cours_id").html( "" );
	}
}
function show_affectation(sel) {
	var cours_id = sel.options[sel.selectedIndex].value;  
	if (cours_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/affectation.php",
			data: "cours_id="+cours_id+"",
			cache: false,
			beforeSend: function () { 
				$('#affectation_id').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#affectation_id").html( html );
			}
		});
	} else {
		$("#affectation_id").html( "" );
	}
}
function show_ordre(sel) {
	var myaffect = sel.options[sel.selectedIndex].value;  
	var cours_id=document.getElementById('mycours_id').value;
	var classe_id=document.getElementById('classe_id').value;
	if (myaffect.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/ordre.php",
			data: "cours_id="+cours_id+"&classe_id="+classe_id+"&myaffectid="+myaffect+"",
			cache: false,
			beforeSend: function () { 
				$('#order_id').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#order_id").html( html );
			}
		});
	} else {
		$("#order_id").html( "" );
	}
}
function show_markbtn(sel) {
	var order_id = sel.options[sel.selectedIndex].value;  
	var cours_id=document.getElementById('mycours_id').value;
	var classe_id=document.getElementById('classe_id').value;
	var myaffect;
	myaffect= document.getElementById('AffectationId').value;
	
	if (order_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/markbtn.php",
			data: "order_id="+order_id+"&cours_id="+cours_id+"&classe_id="+classe_id+"&affect_id="+myaffect+"",
			cache: false,
			beforeSend: function () { 
				$('#markbtn_id').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#markbtn_id").html( html );
			}
		});
	} else {
		$("#markbtn_id").html( "" );
	}
}


</script>