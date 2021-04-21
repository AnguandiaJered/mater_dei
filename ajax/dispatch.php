<?php
session_start();
include("../phpscript/connection.php");
$db=db_connection();
$main_amount=$_REQUEST['amount'];
$fee=$_REQUEST['fee'];
$j=$_REQUEST['j'];
$fee_id=$_REQUEST['fee_id'];
$student_id=$_REQUEST['student_id'];
$amount_paid=$_REQUEST['amount_paid'];
$fee=($fee-$amount_paid);
if(!isset($_SESSION['SOLDE']))
{
	$solde=($main_amount-$fee);
	$operation=$main_amount.'-'.$fee.'='.$solde;
	$_SESSION['SOLDE']=$solde;
	if($solde<1){$solde=0;}else{$solde=$solde;}
	if($main_amount>=$fee){$cash=$fee;}else{$cash=$main_amount;}
}
else
{
	$solde=($_SESSION['SOLDE']-$fee);
	if($solde<$fee){
		if($_SESSION['SOLDE']<1)
		{
		$cash=0;
		}else
		{
			if($_SESSION['SOLDE']<$fee)
			{
				$cash=$_SESSION['SOLDE'];
			}
		    else
		    {
				$cash=$fee;
		    }#$_SESSION['SOLDE'];
		}
		
		}else{$cash=$fee;}
	$operation=$_SESSION['SOLDE'].'-'.$fee.'='.$solde;
	$_SESSION['SOLDE']=$solde;
	
	if($solde<1){$solde=0;}else{$solde=$solde;}
}



?>
<label><?php echo foreign_value('where	frais__scolaires_id="'.$fee_id.'"','tbl__14frais__scolaires',4,$db);?></label>
		(<?php echo foreign_value('where	frais__scolaires_id="'.$fee_id.'"','tbl__14frais__scolaires',5,$db);?>)
        <br />
<label style="font-size:12px; color:#060; font-style:italic;">Operation</label> 
<input type="text" value="<?php echo $operation;?>" readonly="readonly"> 
        <br />
<label style="font-size:12px; color:#060; font-style:italic;">Montant Paye</label> 
<br/>
<input type="text" id="cash_<?php echo $j; ?>" value="<?php echo $cash;?>" readonly="readonly"> 
<br />
<label style="font-size:12px; color:#060; font-style:italic;">Equart</label> :
<strong><?php echo $solde;?></strong>
<br />
<input type="hidden" name="query[]" value="<?php echo $fee_id.','.$cash.','.$student_id; ?>"/>