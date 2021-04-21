<html>
<head>
</head>
<?php
@session_start();
$errmsg_arr = array();	
$errflag = false;
include("../phpscript/connection.php");
require_once('smsgateway/examples/send_sms.php');
$sms=new sowebTelerivet;
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
$ContentMsg='Votre enfant vient de payer les frais suivants';
if(isset($_POST['query']))
{
	$query=$_POST['query'];
	$enfantFullName=foreign_value('WHERE inscription__des__eleves_id="'.$_POST['stdId'].'"',' tbl__17inscription__des__eleves','nom__complet',$db);
	$smsContent='Cher Parent votre enfant '.$enfantFullName.' vient de payer les frais suivants ';
	$smsReceiverNum=foreign_value('WHERE inscription__des__eleves_id="'.$_POST['stdId'].'"',' tbl__17inscription__des__eleves','telephone__personne__de__reference',$db);
	$drcCod=substr($smsReceiverNum,0,4);
	if($drcCod!='243' && strlen($smsReceiverNum) == 10)
	{
		$phoneNumber='243'.substr($smsReceiverNum,+1);
	}
	else
	{
		 if($drcCod =='243' && strlen($smsReceiverNum) == 13)
		 {
			$phoneNumber=$smsReceiverNum; 
		 }
		 else
		 {
			 $phoneNumber='wrongNumber';
		 }
	}
	/*
	 $this->FirstChar=substr($PhoneNumber,0,4);
	 if($this->FirstChar !='243' && strlen($PhoneNumber) == 10)
		 {
			 $PhoneNumber='243'.substr($PhoneNumber,+1);
			 $this->Saving->PdoSaving($Conn,$SavingQueries,$Table);
			 return 2;//send sms
		 }
	*/
	$total=0;
for($j=0; $j<count($query); $j++)
{
$k++;

	$q=$db=mysql_query("insert into  tbl__27payer__les__frais set inscription__des__eleves_id='".splitervalue($query[$j],3)."',frais__scolaires_id='".splitervalue($query[$j],1)."',montant='".splitervalue($query[$j],2)."',motif='".$motif."',treasure_bank='".$treasure_bank."',treasure_bank_id='".$caisse_bank_id."',date=NOW(),montant_dispatch='".$montant_dispatch."',recus='".$recus_id."'") or die("Query Failed".mysql_error());
	
	$ContentMsg.=foreign_value('WHERE frais__scolaires_id="'.splitervalue($query[$j],1).'"','tbl__14frais__scolaires','nom__du__frais',$db).':'.splitervalue($query[$j],2);
	$smsContent.=foreign_value('WHERE frais__scolaires_id="'.splitervalue($query[$j],1).'"','tbl__14frais__scolaires','nom__du__frais',$db).':'.splitervalue($query[$j],2).'USD, ';
	$total+=+splitervalue($query[$j],2);
}
$smsContent.='Total paye:'.$total.'USD <br> Merci';
//echo $recus_id;
//add receipt
mysql_query("insert into tbl__28recus set recus='".$recus_id."',inscription__des__eleves_id='".$_POST['student_idfld']."',date=NOW()") or die("Query Failed".mysql_error());
$msg='Payement effectue avec succes!';
	$css='success';
}

else
{
	$msg='Veuillez effectuer aumoins un calcul pour continuer';
	$css='error';
}
$organization='GSMATERDEI';//str_replace(' ','',foreign_value('WHERE config_id >0 ORDER BY config_id DESC ',' tbl__03configuration','organisation',$db));
$Arg="'".$phoneNumber."','".$organization."','".$smsContent."','".$smsReceiverNum."'";
$sms->sowebSendSms($phoneNumber,$smsContent,'6c05c_UfjCQHtHYCQ5Jg4Q4A6Kt4zN4ayJri','PJ97685d2cb6da154c');//Api key,$projectid
																					
																					
echo 'Envoie Sms Process ...';

$url='../dashboard.php?class=22&action=print_receipt&ref_id='.$recus_id.'&ref_menu=default&MsgContent='.$ContentMsg.'';
$arrayerr[]='<div class="alert alert-'.$css.'" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$msg.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
	
	$array_flag=true;
	if($array_flag)
	{
		$_SESSION['ERRMSG_ARR']=$arrayerr;
		session_write_close();
		
		echo '<script>
		function redirectAction(){
			window.location = "'.$url.'";
		}
		setTimeout(redirectAction,8000);
		</script>';
		//header('location:'.$url.'');
	}	
?>
<!--
<body onload="<?php echo 'SendSms('.$Arg.');';?> closeWindow();">
</body>
<script>
var smsWindow;
function SendSms(SendeTel,Source,smsCotent,genuineNumberFromDb)
{
	/* $.ajax({
			type: "POST",
			url: 'http://121.241.242.114:8080/bulksms/bulksms?username=elit-materdei&password=materdei&type=0&dlr=1&destination='+SendeTel+'&source='+Source+'&message='+DisplayContentSec+'',
			data: "",
			cache: false,
			beforeSend: function () { 
				$('#'+DisplayContentSec).html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#"+DisplayContentSec).html( html );
			}
		});*/
		
		if(SendeTel =='')
		{
			alert('Desoler sms ne peut jamais etre envoyer a un numero vide veuillez attribuer un numero de telephone  a cet enfant');
		}
		else if(SendeTel =='wrongNumber')
		{
			alert('Desoler sms ne peut jamais etre envoyer a un numero incorrect '+genuineNumberFromDb+'');
		}
		else
		{
			
		smsWindow=window.open('http://121.241.242.114:8080/bulksms/bulksms?username=elit-materdei&password=materdei&type=0&dlr=1&destination='+SendeTel+'&source='+Source+'&message='+smsCotent+'', '_blank', "width=50, height=50");
		//setTimeout(smsWindow.close(),20000);
	
		}
}
setTimeout(
function closeWindow()
{
	smsWindow.close();
},5000);
</script>
</html>-->