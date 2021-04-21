<?php
require('../phpscript/connection.php');
$Conn=db_connection();
$firstypeaccount=$_REQUEST['MyFirstTypeAccountId'];;
$secondtypeaccount=$_REQUEST['MySecondTypeAccountId'];
$firstaccount=$_REQUEST['MyFirstAccountb'];
$secondaccount=$_REQUEST['MySecondAccountb'];
$amount=$_REQUEST['MyAmountId'];
$motif=$_REQUEST['MyMotifId'];
$Location="'dashboard.php?class=35&action=default&ref_id=default&ref_menu=default'";
$Entree=mysql_query("insert into tbl__33entree set montant ='".$amount."',motif='".$motif."',date=NOW(),categorie_id='".$secondtypeaccount."',caisse__ou__banque_id='".$secondaccount."'",$Conn) or die("Query Failed");
$Sortie =mysql_query("insert into tbl__29sortie set montant ='".$amount."',motif='".$motif."',date=NOW(),categorie_id='".$firstypeaccount."',caisse__ou__banque_id='".$firstaccount."'",$Conn) or die("Query Failed");
echo '<font color="#00CC00">Transfer effectué avec succè</font> <script>RedirectParent('.$Location.')</script>';
?>