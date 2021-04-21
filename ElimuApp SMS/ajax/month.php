<?php 
require('../phpscript/connection.php');
$db=db_connection();?>
<select name="bmois[]" id="select"  style="width:100px;" required>
        <option value="">--Selectionner--</option>
       <?php
	   for($i=($_REQUEST['form_id']); $i<=12; $i++)
	   {
		   if($i<10)
		   {
			   $add=0;
		   }
		   else
		   {
			   $add='';
		   }
	   ?>
       <option value="<?php echo $add.$i;?>"
        <?php 
	   if($_REQUEST['action']=='edit')
	   {
		   if($i== foreign_value('where chrono_id="'.$_REQUEST['ref_id'].'"','tbl__33chronogramme',10,$db))
		   {
			   echo'selected';
		   }
		   }?>><?php echo get_moth_word($i,'fr');?></option>
       <?php 
	   }?>
      </select>