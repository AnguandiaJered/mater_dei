<?php
include('phpscript/connection.php');//connection page
$db=db_connection();//connection variable
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Transfert d'argent</title>
<script src="calendar/tcal.js" type="text/javascript"></script>
<script src="ajax/jquery-1.9.0.min.js"></script> 
<script type='text/javascript' src='calendar/tcal.js'></script>
    <link href="calendar/tcal.css" rel="stylesheet" type="text/css" />
           <SCRIPT language=Javascript>
      <!--
      function onlyDotsAndNumbers(event) {
        var charCode = (event.which) ? event.which : event.keyCode
        if (charCode == 46) {
            return true;
        }
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
      //-->
   </SCRIPT>  
</head>

<body>
<div id="TransferId">
<table width="100%">
<tr bgcolor="#C1DFFD">
<th align="left" >Type de compte</th>
<th align="left">Compte</th>
<th align="left">Solde Disponible</th>
</tr>
<tr>
<td><select name="" id="FirstTypeAccountId" onchange="return show_caisse_or_treasure(this,1,'sec_bank_treasureId');">
<option value="">--Selectionner--</option>
<option value="1">Caisse</option>
<option value="2">Banque</option>
</select></td>
<td><div id="sec_bank_treasureId"></div></td>
<td><div id="SoldeId"></div></td>
</tr>
</table>
<br/>
<form id="form1" name="form1" method="post" action=""> 
   <table width="519">
  <tr>
    <td width="215">Montant</td>
    <td width="292"><label for="textfield"></label>
      <input type="text" name="textfield" id="AmountId"  onkeypress="return onlyDotsAndNumbers(event);"/></td>
  </tr>
  <tr>
    <td>Motif</td>
    <td><label for="textfield2"></label>
      <textarea name="textfield2" id="MotifId"></textarea></td>
  </tr>
</table>
<br/>
<br/>
<table width="52%">
<tr>
<td width="43%">Destinaton : Caisse ou Banque</td>
<td width="57%">Compte</td>
</tr>
<tr>
<td><select id="SecondTypeAccountId" name="" onchange="return show_caisse_or_treasure(this,2,'sec_bank_treasureId1');">
<option value="">--Selectionner--</option>
<option value="1">Caisse</option>
<option value="2">Banque</option>
</select></td>
<td><div id="sec_bank_treasureId1"></div></td>
</tr>
<td></td>
<td>  <input type="button" name="transfert" id="button"  onclick="return TransferFund('FirstTypeAccountId','SecondTypeAccountId','caisse_bank_IdFirst','caisse_bank_Id','AmountId','MotifId','AvailableSoldId');" value="Transferer" />
</td>
</table>
</form></div>
<script>
function show_caisse_or_treasure(id,Case,SectionId)
{
	myselect= id.options[id.selectedIndex].value;
	$.ajax({
			type: "POST",
			url: "ajax/treasure_bank.php",
			data: "choice_id="+myselect+"&case="+Case+"",
			cache: false,
			beforeSend: function () { 
				$('#'+SectionId).html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#"+SectionId).html( html );
			}
		});
}
function ShowSolde(CategoryId,AccountId)
{
	
	var MyAccount = document.getElementById(AccountId).value;
	$.ajax({
			type: "POST",
			url: "ajax/avaible_sold.php",
			data: "AccountId="+MyAccount+"&CategoryId="+CategoryId+"",
			cache: false,
			beforeSend: function () { 
				$('#SoldeId').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#SoldeId").html( html );
			}
		});
	
}

function TransferFund(FirstTypeAccountId,SecondTypeAccountId,FirstAccount,SecondAccount,AmountId,MotifId,AvailableSoldId)
{
	var MyFirstAccounta,MyFirstAccountb,MySecondAccounta,MySecondAccountb,MyAmountId,MyMotifId,MyAvailableSoldIda,MyAvailableSoldIdb;
	var MyFirstTypeAccountId,MySecondTypeAccountId;
	MyFirstTypeAccountId=document.getElementById(FirstTypeAccountId).value;
	MySecondTypeAccountId=document.getElementById(SecondTypeAccountId).value;
	MyFirstAccounta=document.getElementById(FirstAccount);
	MySecondAccounta=document.getElementById(SecondAccount);
	MyAvailableSoldIda=document.getElementById(AvailableSoldId);
	if(MyFirstAccounta)
	{
		MyFirstAccountb=document.getElementById(FirstAccount).value;
	}
	else
	{
		MyFirstAccountb='';
	}
	if(MySecondAccounta)
	{
	MySecondAccountb=document.getElementById(SecondAccount).value;
	}
	else
	{
	MySecondAccountb='';	
	}
	if(MyAvailableSoldIda)
	{
	MyAvailableSoldIdb=document.getElementById(AvailableSoldId).value;
	}
	else
	{
	MyAvailableSoldIdb='';	
	}

	
	MyAmountId=document.getElementById(AmountId).value;
	MyMotifId=document.getElementById(MotifId).value;
	var a= (MyAmountId*9999999999);
	var b= (MyAvailableSoldIdb*9999999999);
	 if(a >=  b)
	{
		alert('Le solde disponible est inferieur au montant exige');
		//alert(MyAvailableSoldIdb+'&'+MyAmountId);
	}
	/*MyAvailableSoldId=document.getElementById(MyAvailableSoldId).value; */
	else if(MyFirstAccountb =='')
	{
		alert('Veuillez Selectionner le compte expediteur');
	}
	else if(MySecondAccountb == '')
	{
		alert('Veuillez Selectionner le compte destination');
	}
	else if(MyAmountId =='')
	{
		alert('Veuillez Ajouter le montant');
	}
	else if(MyFirstAccountb == MySecondAccountb && MyFirstTypeAccountId == MySecondTypeAccountId)
	{
		alert('Un compte ne peut jamais se tranferer le montant');
	}
	

	
	else if(MyMotifId =='')
	{
		alert('Veuillez ajouter le motif');
	}
	else
	{
		//process
		$.ajax({
			type: "POST",
			url: "ajax/transfering.php",
			data: "MyAmountId="+MyAmountId+"&MyFirstTypeAccountId="+MyFirstTypeAccountId+"&MySecondTypeAccountId="+MySecondTypeAccountId+"&MyFirstAccountb="+MyFirstAccountb+"&MySecondAccountb="+MySecondAccountb+"&MyMotifId="+MyMotifId+"",
			cache: false,
			beforeSend: function () { 
				$('#TransferId').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#TransferId").html( html );
			}
		});
		
	}
	
}
function RedirectParent(MyLocation)
{
	parent.document.location.href =MyLocation;
}
</script>
</body>
</html>