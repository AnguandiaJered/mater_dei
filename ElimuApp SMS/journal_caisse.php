<?php
include('phpscript/connection.php');//connection page
$db=db_connection();//connection variable
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rapport perception des frais</title>
<link href="calendar/tcal.css" type="text/css" rel="stylesheet" />
<link href="css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="css/8nov17.css" rel="stylesheet">
<script src="calendar/tcal.js" type="text/javascript"></script>
</head>

<body class="_8nov17_body">
<table width="100%">
<tr class="_8nov17_tr" bgcolor="#C1DFFD">
<th class="_8nov17_rap_left2 " colspan="2" align="left">Periode</th>
<th class="_8nov17_rap_left" align="left">Selection</th>
<th class="_8nov17_rap_left" align="left">Caisse ou banque</th>
<th class="_8nov17_rap_leftbuton" align="left">Action</th>
</tr>

<tr class="_8nov17_tr">

<td class="_8nov17_rap_left">
	 <input type="text" id="from" name="from" class="tcal  form-control" placeholder="DU" /></td> 
<td class="_8nov17_rap_left"> <input type="text" name="to" id="to" class="tcal form-control" placeholder="AU" /></td>

<td class="_8nov17_rap_left"><select id="treasure_or_bankId" onchange="return show_bank_or_treasure(this);" class="form-control">
<option value="">-- Selectionner --</option>
<option value="1">Caisse</option>
<option value="2">Banque</option>
<option value="3">Global</option>
</select></td>
<td class="_8nov17_rap_left"><div id="sec_bank_treasureId"></div></td>
<td class="_8nov17_rap_left"><button class="btn btn-primary btn-block" onclick="generate_rpt('from','to','treasure_or_bankId','caisse_bank_Id');">Generer rapport</button></td>
</tr>

</table>
<div id="rpt"></div>
<script src="ajax/jquery-1.9.0.min.js"></script> 
<script>
function show_option(sel) {
	var section_id = sel.options[sel.selectedIndex].value;  
	if (section_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/myoptionrpt.php",
			data: "section_id="+section_id+"",
			cache: false,
			beforeSend: function () { 
				$('#option_id').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#option_id").html( html );
			}
		});
	} else {
		$("#option_id").html( "" );
	}
}
function show_classes(sel) {
	var option_id = sel.options[sel.selectedIndex].value;  
	if (option_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/myclassesrpt.php",
			data: "optionid="+option_id+"",
			cache: false,
			beforeSend: function () { 
				$('#classeId').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#classeId").html( html );
			}
		});
	} else {
		$("#classeId").html( "" );
	}
}
function generate_rpt(from,to,sel,caisse_bank)
{
	var myfrom,myto,mysel;
	myfrom = document.getElementById(from).value;
	myto= document.getElementById(to).value;
	mysel= document.getElementById(sel).value;
	if(document.getElementById(caisse_bank))
	{
		mycaisse_bank= document.getElementById(caisse_bank).value;
	}
	else
	{
		mycaisse_bank='';
	}
	if(myfrom == '')
	{
		alert('Veuillez selectionner la date du pour continuer');
	}
	else if(myto == '')
	{
		alert('Veuillez selectionner la date au pour continuer');
	}
	else if(mysel == '')
	{
		alert('Veuillez selectionner caisse ou banque au pour continuer');
	}
	else
	{
		 $.ajax({
			type: "POST",
			url: "ajax/journal_caisse.php",
			data: "from="+myfrom+"&to="+myto+"&mysel="+mysel+"&mycaisse_bank="+mycaisse_bank+"",
			cache: false,
			beforeSend: function () { 
				$('#rpt').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#rpt").html( html );
			}
		});
	}
}
function pdf_genrpt(from,to,sel,caisse_bank)
{
	$.ajax({
			type: "POST",
			url: "ajax/journal_caisse.php",
			data:"from="+from+"&to="+to+"&mysel="+sel+"&mycaisse_bank="+caisse_bank+"&display=pdf",
			cache: false,
			beforeSend: function () { 
				$('#rpt').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#rpt").html( html );
			}
		});
}
function show_bank_or_treasure(id)
{
	myselect= id.options[id.selectedIndex].value;
	$.ajax({
			type: "POST",
			url: "ajax/treasure_bank.php",
			data: "choice_id="+myselect+"",
			cache: false,
			beforeSend: function () { 
				$('#sec_bank_treasureId').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#sec_bank_treasureId").html( html );
			}
		});
}
</script>
</body>
</html>