<?php 
$section=$_REQUEST['section_id'];
$option=$_REQUEST['option_id'];;
$classe=$_REQUEST['classe_id'];
?>
<button class="btn btn-primary" type="button" onclick="student_list(<?php echo $section;?>,<?php echo $option;?>,<?php echo $classe;?>,'html')">Liste Eleve</button>&nbsp;<button class="btn btn-info " type="button" onclick="student_list(<?php echo $section;?>,<?php echo $option;?>,<?php echo $classe;?>,'pdf')">PDF</button>