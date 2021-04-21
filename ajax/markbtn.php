<?php
include("../phpscript/connection.php");
$db=db_connection();
echo'<a href="cote.php?order_id='.$_REQUEST['order_id'].'&cours_id='.$_REQUEST['cours_id'].'&classe_id='.$_REQUEST['classe_id'].'&affect_id='.$_REQUEST['affect_id'].'" rel="facebox"><button type="button">Attribuer point obtenu</button></a>';
?>
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