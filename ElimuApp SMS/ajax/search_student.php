<?php
session_start();
include("../phpscript/connection.php");
$db=db_connection();
$keyword=mysql_real_escape_string($_REQUEST['keyword']);
$q=$db=mysql_query("select * from tbl__17inscription__des__eleves where nom__complet like '%".$keyword."%' or numero__matricule like'%".$keyword."%' order by nom__complet") or die('Query Failed for search student'.mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recherche Eleve</title>
<!--COMMENT STARTS FANCY POPUP-->
<script src="fancy/jquery.js" type="text/javascript"></script> 
<link href="fancy/facebox1.2/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="fancy/facebox1.2/src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox() 
  	closeImage   : " fancy/closelabel.png" 
})
</script>

<script type="text/javascript">

$(document).ready(function(){
$("#shadow").fadeOut();

	$("#cancel_hide").click(function(){
        $("#").fadeOut("slow");
        $("#shadow").fadeOut();
		
   });
      });
   </script>


<!--COMMENT ENDS -->
</head>

<body>
<table width="100%" >
  <tr bgcolor="#D7E0FB">
    <th align="left">No</th>
    <th align="left">Nom de l'eleve</th>
    <th align="left">Numero matricule</th>
    <th align="left">Classe</th>
    <th align="right">Total deja paye</th>
    <th>Action</th>
  </tr>
  <?php
  $j=0;
  while($row=mysql_fetch_array($q))
  {
	  $j++; ?>
  <tr style="text-transform:uppercase;">
    <td><?php echo $j;?></td>
    <td><?php echo $row['nom__complet'];?></td>
    <td><?php echo $row['numero__matricule'];?></td>
    <td><?php echo foreign_value('where classe_id="'.$row['classe_id'].'"','tbl__15classe',2,$db);?></td>
    <td>&nbsp;</td>
    <td><a href="payer_frais.php?id=<?php echo $row[0];?>" rel="facebox"><button type="button">Payer</button></a>&nbsp;
    <a href="recus_frais.php?id=<?php echo $row[0];?>" rel="facebox"><button type="button">Recus</button></a></td>
  </tr>
  <?php 
  }?>
</table>
</body>
</html>