<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Receipt</title>
</head>

<body>
<br/>
<?php if($_REQUEST['print_btn']>0)
{?>
<button onclick="print_receipt_<?php echo $_REQUEST['j'];?>();" value="0" id="print_btn_<?php echo $_REQUEST['j'];?>" style="background-color:#BA1612">X</button>
<iframe src="MPDF57/examples/print_receipt.php?id=<?php echo $_REQUEST['receipt_number'];?>" width="100%" height="400px" frameborder="0" style="margin-top:20px;"></iframe>
<?php 
}else
{?>
<button onclick="print_receipt_<?php echo $_REQUEST['j'];?>();" value="1" id="print_btn_<?php echo $_REQUEST['j'];?>">Imprimer</button>
<?php 
}?>
</body>
</html>