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
<script src="calendar/tcal.js" type="text/javascript"></script>
</head>

<body>
<table width="100%">
<tr bgcolor="#C1DFFD">
<th>Elimu App</th>
<th align="left">Du</th>
<th align="left">Au</th>
<th align="left">Frais</th>
<th align="left">Section</th>
<th align="left">Option</th>
<th align="left">Classe</th>
<th align="left">Action</th>
</tr>
<tr>
<td></td>
<td><input type="text" id="from" name="from" class="tcal" style="width:100px;"/></td>
<td><input type="text" name="to" id="to" class="tcal" style="width:100px;"/></td>
<td><?php echo mydropdown2outputs($db,'','tbl__14frais__scolaires','',100,0,'frais"id="feeId','nom__du__frais','',1,'Toutes les categories'); ?></td>
<td><?php echo mydropdown2outputs($db,'',' tbl__11section','',100,'return show_option(this);','sectioninput"id="sectionId','section','',1,'Toutes les categories'); ?></td>
<td><div id="option_id"></div></td>
<td><div id="classeId"></div></td>
<td><button onclick="generate_rpt('from','to','feeId','sectionId','optionId','myclasseId');">Generer rapport</button></td>
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
function generate_rpt(from,to,feeid,sectionid,optionid,classeid)
{
	var myfrom,myto,myfee,mysec,myopt,myclasseid;
	myfrom = document.getElementById(from).value;
	myto= document.getElementById(to).value;
	myfee= document.getElementById(feeid).value;
	mysec= document.getElementById(sectionid).value;
	if(document.getElementById(optionid))
	{
		myopt= document.getElementById(optionid).value;
	}
	else
	{
		myopt='';
	}
	if(document.getElementById(classeid))
	{
		myclasseid= document.getElementById(classeid).value;
	}
	else
	{
		myclasseid='';
	}
	if(myfrom == '')
	{
		alert('Veuillez selectionner la date du pour continuer');
	}
	else if(myto == '')
	{
		alert('Veuillez selectionner la date au pour continuer');
	}
	else if(myfee == '')
	{
		alert('Veuillez selectionner fraie pour continuer');
	}
	else if(mysec == '')
	{
		alert('Veuillez selectionner la section pour continuer');
	}
	else if(mysec!='all')
	{
		 if(myopt=='')
		 {
			 alert('Veuillez selectionner l\'option pour continuer');
		 }
		 else if(myclasseid=='')
		 {
			 alert('Veuillez selectionner la classe pour continuer');
		 }
		 else
		 {
			 //process
			 $.ajax({
			type: "POST",
			url: "ajax/financial_rpt.php",
			data: "from="+myfrom+"&to="+myto+"&feeid="+myfee+"&sectionid="+mysec+"&optionid="+myopt+"&classeid="+myclasseid+"",
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
	else
	{
		 $.ajax({
			type: "POST",
			url: "ajax/financial_rpt.php",
			data: "from="+myfrom+"&to="+myto+"&feeid="+myfee+"&sectionid="+mysec+"&optionid="+myopt+"&classeid="+myclasseid+"",
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
function pdf_genrpt(myfrom,myto,myfee,mysec,myopt,myclasseid)
{
	$.ajax({
			type: "POST",
			url: "ajax/financial_rpt.php",
			data: "from="+myfrom+"&to="+myto+"&feeid="+myfee+"&sectionid="+mysec+"&optionid="+myopt+"&classeid="+myclasseid+"&display=dpf",
			cache: false,
			beforeSend: function () { 
				$('#rpt').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#rpt").html( html );
			}
		});
}
</script>
</body>
</html>