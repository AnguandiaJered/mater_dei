<?php
session_start();
unset($_SESSION['SOLDE']);
require('phpscript/connection.php');
$db=db_connection();//connection variable
$id=$_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payer Frais</title>
<script src="ajax/jquery-1.9.0.min.js"></script> 
 <!--Numeric and dot Valiadation starts -->
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
   <script>
function show_alert() {
var compte = document.getElementById('caisse_bank_Id');
var amount=document.getElementById('amount_id').value;
  if(confirm("Etes-vous sure de terminer cette action?\nSi oui alors assurer vous que tous les champs sont deja remplis\nAutrement vous devriez les remplir avant de continuer."))
if(compte && amount>0)
{
    document.forms[0].submit();
}else
{
	alert("Veuillez Selectionner Caisse ou Banque et le montant doit etre superieur a zero");
	return false;
}
  else
    return false;
}
</script> 

</head>

<body>
<form method="post" action="ajax/save_fees.php" target="_parent" onsubmit=" return show_alert();">
<input type="hidden" value="<?php echo $id;?>" name="stdId"/>
<table width="100%" border="0">
  <tr>
    <td>Nom</td>
    <td><?php echo foreign_value('where inscription__des__eleves_id="'.$id.'"',' tbl__17inscription__des__eleves',2,$db); ?></td>
  </tr>
  <tr>
    <td>Numero</td>
    <td style="text-transform:uppercase;"><?php echo foreign_value('where inscription__des__eleves_id="'.$id.'"',' tbl__17inscription__des__eleves',15,$db); ?></td>
  </tr>
  <tr>
    <td>Classe</td>
    <td style="text-transform:uppercase;"><?php $classe_id=foreign_value('where inscription__des__eleves_id="'.$id.'"',' tbl__17inscription__des__eleves',14,$db); 
	echo foreign_value('where classe_id="'.$classe_id.'"','tbl__15classe',2,$db);?></td>
  </tr>
  </tr>
    <td>Montant deja paye</td>
    <td><?php echo sum_rowsone($db,'tbl__27payer__les__frais','montant','where inscription__des__eleves_id="'.$id.'"');?></td>
  </tr>
  <tr>
    <td>Montant</td>
    <td><input type="text" id="amount_id" onkeypress="return onlyDotsAndNumbers(event);" name="montant_dispatch" />
    	<input type="hidden" id="student_id" name="student_idfld"  value="<?php echo $id;?>" /></td>
  </tr>
   <tr>
    <td width="26%">Frais concernes</td>
    <td width="74%">
	<br />
    <div id="showfeesBigId"><button onclick="return show_feesBig(<?php echo $id; ?>);">Afficher les frais</button></div>
	</td>
  <tr>
    <td>Montant a payer</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Motif</td>
    <td><label for="motifId"></label>
    <textarea name="motif" id="motifId" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>Date</td>
    <td> <?php echo date('d-m-Y');?>
    <input name="date" type="hidden" value="<?php echo date('d-m-Y');?>" /></td>
  </tr>
  <tr>
    <td>Caisse ou Banque</td>
    <td><select name="choice" onchange="return show_treasure_bank(this);">
    <option value="">-- Selectionner --</option>
    <option value="1">Caisse</option>
    <option value="2">Banque</option>
    </select></td>
    <td width="0%"><div id="treasure_bankId"></div></td>
  </tr>
  <tr>
  <td></td>
<td><input type="submit" value="Sauvegarder" /></td>
</tr>
</table>


</form>
</body>
<script>
function show_feesBig(StudentId) {
    var a=5;
	var classe_id='<?php echo $classe_id;?>';
	var amount=document.getElementById('amount_id').value;
    var r = confirm("Etes vous sure de vouloir actualiser la section frais ?");
    if (r == true) {
	 $.ajax({
			type: "POST",
			url: "ajax/refresh_fees.php",
			data: "classe_id="+classe_id+"&student_id="+StudentId+"",
			cache: false,
			beforeSend: function () { 
				$('#showfeesBigId').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#showfeesBigId").html( html );
			}
		});
	} 
    
  
}
function show_treasure_bank(sel) {
	var choice_id = sel.options[sel.selectedIndex].value;  
	if (choice_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/treasure_bank.php",
			data: "choice_id="+choice_id+"",
			cache: false,
			beforeSend: function () { 
				$('#treasure_bankId').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#treasure_bankId").html( html );
			}
		});
	} else {
		$("#treasure_bankId").html( "" );
	}
}

function SendSms(SendeTel,Source,DisplayContentSec)
{
	/* $.ajax({
			type: "POST",
			url: "http://121.241.242.114:8080/bulksms/bulksms?username=elit-materdei&password=materdei&type=0&dlr=1&destination="+SendeTel+"&source=NALEDI&message="+MsgContent+"",
			data: "",
			cache: false,
			beforeSend: function () { 
				$('#'+DisplayContentSec).html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#"+DisplayContentSec).html( html );
			}
		});*/
		window.open('http://121.241.242.114:8080/bulksms/bulksms?username=elit-materdei&password=materdei&type=0&dlr=1&destination='+SendeTel+'&source='+Source+'&message='+DisplayContentSec+'', '_blank');
}
</script>
</html>

