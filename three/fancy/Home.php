

<html>

<script src="jquery.js" type="text/javascript"></script>
<head><title>Home</title></head>
<link href="facebox1.2/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />

			<script src="facebox1.2/src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox() 
  	closeImage   : " closelabel.png" 
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

</body>


   

		<a href='remote.php?id=5' rel='facebox'>link</a>
		



  
</body>
</html>