<?php
@session_start();
$errmsg_arr = array();	
$errflag = false;
include("../phpscript/connection.php");
$db=db_connection();
$recus_id=str_replace('/','',id_num_generator_mixer($db,'tbl__28recus','',7,'','default'));
$date=$_POST['date'];
$treasure_bank=$_POST['choice'];
$motif=mysql_real_escape_string(strip_tags($_POST['motif']));
#echo $motif;
#exit();
$montant_dispatch=$_POST['montant_dispatch'];
$caisse_bank_id=$_POST['caisse__ou__banque_id'];
$k=0;
if(isset($_POST['query']))
{
	$query=$_POST['query'];
for($j=0; $j<count($query); $j++)
{
$k++;

	$q=$db=mysql_query("insert into  tbl__27payer__les__frais set inscription__des__eleves_id='".splitervalue($query[$j],3)."',frais__scolaires_id='".splitervalue($query[$j],1)."',montant='".splitervalue($query[$j],2)."',motif='".$motif."',treasure_bank='".$treasure_bank."',treasure_bank_id='".$caisse_bank_id."',date=NOW(),montant_dispatch='".$montant_dispatch."',recus='".$recus_id."'") or die("Query Failed".mysql_error());
	
}
//echo $recus_id;
//add receipt
mysql_query("insert into tbl__28recus set recus='".$recus_id."',inscription__des__eleves_id='".$_POST['student_idfld']."',date=NOW()") or die("Query Failed".mysql_error());
$msg='Payement effectue avec succes!';
	$css='success';
	echo $k;
	exit();
}

else
{
	$msg='Veuillez effectuer aumoins un calcul pour continuer';
	$css='error';
}
$url='../dashboard.php?class=22&action=print_receipt&ref_id='.$recus_id.'&ref_menu=default';
$arrayerr[]='<div class="alert alert-'.$css.'" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$msg.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
	
	$array_flag=true;
	if($array_flag)
	{
		$_SESSION['ERRMSG_ARR']=$arrayerr;
		session_write_close();
		//header('location:'.$url.'');
	}	
?>