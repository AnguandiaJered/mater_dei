<?php
require('../phpscript/connection.php');
$db=db_connection();
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
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
<link href="css/dtree.css" rel="stylesheet" />
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/dtree.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".dTree").dTree();
    });  
</script>
<title>Jquery Directory Tree</title>
</head>
<body>
    <div class="dTree" id="ThreeId">
       <?php echo ShowSection($db);?>
    </div>
</body>
</html>
