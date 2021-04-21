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
</tr>
<tr>
<td><?php echo mydropwodwn($db,'tbl__15classe','',0,'nom__de__la__classe','form-control','onchange="return std_list(this);"','classe_id','Selectionner Cours','classe_id');?></td>
</tr>
</table>
<div id="StudentListId"></div>
</body>
</html>
<script src="ajax/jquery-1.9.0.min.js"></script> 
<script>
function std_list(sel) {
	var classe_id = sel.options[sel.selectedIndex].value;  
	if (classe_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/diploma_student_list.php",
			data: "classe_id="+classe_id+"",
			cache: false,
			beforeSend: function () { 
				$('#StudentListId').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#StudentListId").html( html );
			}
		});
	} else {
		$("#StudentListId").html( "" );
	}
}

function html_diploma(stdid,classid,sectionid,design)
{
	 $.ajax({
			type: "POST",
			url: "ajax/gen_bulletin.php",
			data: "classe_id="+classid+"&stdid="+stdid+"&sectionid="+sectionid+"&design="+design+"",
			cache: false,
			beforeSend: function () { 
				$('#'+sectionid).html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$('#'+sectionid).html( html );
			}
		});
}

function close_window(sectionid)
{
	document.getElementById(sectionid).innerHTML='';
}

function printDiv(divName) {
    
	 document.getElementById('PrintId').innerHTML='';
	
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	
}

</script>