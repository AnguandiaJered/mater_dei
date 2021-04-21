<?php
include("../phpscript/connection.php");
$db=db_connection();
$last_year=date('Y');
$last_year=($last_year-1);
$current_year=date('Y');
$string_year=$last_year.'-'.$current_year;
$get_class_name='<div style="text-transform:uppercase;">'.foreign_value('where classe_id="'.$_REQUEST['classe_id'].'"',' tbl__15classe',2,$db).'</div>';
$get_section='<div style="text-transform:capitalize;">'.substr(foreign_value('where section_id="'.$_REQUEST['section_id'].'"','  tbl__11section',2,$db),0,1).'</div>';
$num_mat=strip_tags(id_num_generator_mixer($db,'tbl__17inscription__des__eleves','where option_id="'.$_REQUEST['option_id'].'"',6,$get_class_name.$get_section.'/'.$string_year,$_REQUEST['action']));
if($_REQUEST['action']=='default')
{
echo '<a href="inscription_popup.php?class=17&ref_id=default&ref_menu=default&num_mat='.$num_mat.'&section_id='.$_REQUEST['section_id'].'&option_id='.$_REQUEST['option_id'].'&classe_id='.$_REQUEST['classe_id'].'&id='.$_REQUEST['id'].'&action='.$_REQUEST['action'].'" rel="facebox"><button type="button" class="btn btn-primary btn-block">Inscrire</button></a>';
}else
{
echo '<a href="inscription_popup.php?class=17&ref_id=default&ref_menu=default&num_mat='.$num_mat.'&section_id='.$_REQUEST['section_id'].'&option_id='.$_REQUEST['option_id'].'&classe_id='.$_REQUEST['classe_id'].'&id='.$_REQUEST['id'].'&action='.$_REQUEST['action'].'" rel="facebox"><button type="button">Editer Inscription</button></a>';
}
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