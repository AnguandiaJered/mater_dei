<?php
require('../phpscript/connection.php');
$db=db_connection();
?>
<table width="100%" border="0">
  <tr>
    <th>BUDGET GLOBAL</th>
    <th>MONTANT DEJA REÇU</th>
    <th>SOLDE A RECEVOIR</th>
  </tr>
  <tr>
    <td><?php echo $buget_global=foreign_value('where projet_id="'.$_REQUEST['projet_id'].'"','tbl__10nouveau__projet',7,$db);?></td>
    <td><?php echo  $got=sum_rowsone($db,'tbl__38entree__des__fonds','montant','where projet_id="'.$_REQUEST['projet_id'].'"');?></td>
    <td><?php echo ($buget_global-$got);?></td>
  </tr>
</table>

