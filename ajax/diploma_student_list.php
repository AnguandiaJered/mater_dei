<?php
include("../phpscript/connection.php");
$db=db_connection();
$classe_id=$_REQUEST['classe_id'];
$q=$db=mysql_query("select * from tbl__17inscription__des__eleves where classe_id='".$classe_id."' order by nom__complet") or die('Query Failed'.mysql_error());
$j=0;
?>
<table width="100%" border="0">
  <tr bgcolor="#C1DFFD">
    <th align="left">No</th>
    <th align="left">Nom complet</th>
    <th align="left">Action</th>
  </tr>
  <?php 
  while($row=mysql_fetch_array($q))
  {
	  $j++;?>
  <tr bgcolor="#FFFFFF">
    <td><?php echo $j;?></td>
    <td><?php echo $row['nom__complet']; ?></td>
    <td><button type="button" onclick="html_diploma(<?php echo $row[0];?>,<?php echo $classe_id;?>,'DiplomaHtmlId_<?php echo $j;?>','html');">Bulletin Html</button>&nbsp;<a href="gen_bulletin.php?stdid=<?php echo $row[0];?>&classe_id=<?php echo $classe_id;?>" rel="facebox"><button type="button">Bulletin Popup</button></a></td>
  </tr>
  <tr><td colspan="3"><div id="DiplomaHtmlId_<?php echo $j;?>"></div></td></tr>
  <?php
  }?>
</table>

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