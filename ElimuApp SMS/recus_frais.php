<?php
session_start();
include("phpscript/connection.php");
$db=db_connection();
$id=$_GET['id'];
$q=$db=mysql_query("select * from tbl__28recus where inscription__des__eleves_id='".$id."'") or die('Query Failed'.mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recus</title>
<script src="ajax/jquery-1.9.0.min.js"></script> 
</head>

<body>
<table width="100%" border="0">
  <tr>
    <th>Date</th>
    <th>No Recus</th>
    </tr>
 <?php
 $j=0;
 while($row=mysql_fetch_array($q))
 {
	 $j++; ?>

  <tr>
  <td><?php echo $row['date'];?></td>
   <td><?php echo $row['recus'];?></td>
  </tr>
  <tr><td colspan="3"><div id="show_receipt_<?php echo $j;?>"><button onclick="print_receipt_<?php echo $j;?>();" value="1" id="print_btn_<?php echo $j;?>">Imprimer</button></div></td></tr>
   <script>
function print_receipt_<?php echo $j;?>() {
    var a=5;
	var j;
	j='<?php echo $j;?>';
	var print_btn=document.getElementById('print_btn_<?php echo $j;?>').value;
	var receipt_number='<?php echo $row['recus'];?>';
	var text;
	if(print_btn>0)
	{
		text='Etes vous sure de vouloir imprimer';
	}
	else
	{
		text='Etes vous sure de vouloir Fermer le display recus';
	}
    var r = confirm(""+text+"?");
    if (r == true) {
	 $.ajax({
			type: "POST",
			url: "ajax/display_receipt.php",
			data: "receipt_number="+receipt_number+"&j="+j+"&print_btn="+print_btn+"",
			cache: false,
			beforeSend: function () { 
				$('#show_receipt_<?php echo $j;?>').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#show_receipt_<?php echo $j;?>").html( html );
			}
		});
	} 
  
}
</script>
 <?php 
 }?>
  
</table>
</body>
</html>