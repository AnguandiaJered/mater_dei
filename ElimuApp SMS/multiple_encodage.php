<?php
require('phpscript/connection.php');
$db=db_connection();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Multiple encoding</title>
</head>

<body>

<table width="100%" bgcolor="#C1DFFD">
  <tr>
    <th align="left">Nombre de cours</th>
    <th align="left">Section</th>
    <th align="left">Option</th>
    <th align="left">Classe</th>
    <th align="left">Action</th>
  </tr>
  <tr>
    <td><input type="text" id="NumberId"></td>
    <td><?php 
	$sectionId="'MyOptionId'";
	echo mydropdown2outputs($db,'',' tbl__11section','',100,'return show_option('.$sectionId.',this);','section"id="MysectionId','section_id','section',0,''); ?></td>
    <td><div id="MyOptionId"></div></td>
    <td><div id="ClassId"></div></td>
    <td><button type="button" onClick="return gen_form('NumberId');">Generer</button></td>
  </tr>
</table>
<div id="MultipleSavingId" style="margin-top:20px;"></div>
<br/>
<button type="button" onClick="return multiple_saving('NumberId');">Save</button>
<script src="ajax/jquery-1.9.0.min.js"></script> 
<script>
function gen_form(NId)
{
	var n;
	n= document.getElementById(NId).value;
	 $.ajax({
			type: "POST",
			url: "ajax/gen_form.php",
			data: "n="+n+"",
			cache: false,
			beforeSend: function () { 
				$('#MultipleSavingId').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#MultipleSavingId").html( html );
			}
		});
}
function multiple_saving(NId)
{
	var n,i,cours,myquery,cours,section,optionx,classes,lecturers;
	n= document.getElementById(NId).value;
	myquery='';
	
	
	for(i=1;i<=n; i++)
	{
	cours=document.getElementById('CourID'+i).value;	
	section=document.getElementById('MysectionId'+i).value;	
	optionx=document.getElementById('MyOptionId'+i).value;	
	classes=document.getElementById('MyTextAreaId'+i).value;
	lecturers=document.getElementById('MyTextAreaId2'+i).value;
	myquery+="insert into  tbl__13cours set titre__du__cours='"+cours+"',section_id='"+section+"',option_id='"+optionx+"',classe_id='"+classes+"',enseignant_id ='"+lecturers+"'";
		
		//myquery=i;
		/*
		$.ajax({
			type: "POST",
			url: "ajax/multiple_saving.php",
			data: "id=1",
			cache: false,
			beforeSend: function () { 
				$('#RowID'+i).html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#RowID"+i).html( html );
			}
		});
		*/
		
	}
	alert(myquery);
}
function show_option(sectionid,sel)
{
	var mysection_id = sel.options[sel.selectedIndex].value;  
	$.ajax({
			type: "POST",
			url: "ajax/myoption.php",
			data: "mysection_id="+mysection_id+"",
			cache: false,
			beforeSend: function () { 
				$('#'+sectionid).html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$('#'+sectionid).html( html );
			}
		});
}
function show_classes(classid,sel)
{
	var myoption_id = sel.options[sel.selectedIndex].value;  
	$.ajax({
			type: "POST",
			url: "ajax/myclasses.php",
			data: "myoption_id="+myoption_id+"",
			cache: false,
			beforeSend: function () { 
				$('#'+classid).html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$('#'+classid).html( html );
			}
		});
}
function send_class(classid,n,labelname,TextareadId,divTeaxtareaId,divCheckboxId)
{
	var textareax=document.getElementById(TextareadId+n).value;
	document.getElementById(divTeaxtareaId+n).innerHTML='<textarea id="'+TextareadId+n+'" readonly>'+classid+','+textareax+'</textarea>';
	document.getElementById(divCheckboxId+classid).innerHTML='<label>'+labelname+'</label><input type="checkbox" value="'+classid+'" checked="checked" disabled>';
}
function gen_lecturer(n)
{
	var classes;
	classes=document.getElementById('MyTextAreaId'+n).value;
	if(classes!='')
	{
		//process
		$.ajax({
			type: "POST",
			url: "ajax/lecturers.php",
			data: "classes="+classes+"&n="+n+"",
			cache: false,
			beforeSend: function () { 
				$('#LecturerId'+n).html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$('#LecturerId'+n).html( html );
			}
		});
	}
	else
	{
		alert('Veuillez Cocher les classes perspectives');
	}
}
</script>

</body>
</html>
