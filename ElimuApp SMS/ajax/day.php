<?php 
require('../phpscript/connection.php');
$db=db_connection();?>
<select name="bjour[]" id="select"  style="width:100px;" required>
        <option value="">--Selectionner--</option>
       <?php
	   if($_REQUEST	['verify']=='same')
	   {
		   $i_zero=($_REQUEST['form_id']+1);
	   }
	   else
	   {
		   $i_zero=1;
	   }
	   for($i=$i_zero; $i<=31; $i++)
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
		   if($i== foreign_value('where chrono_id="'.$_REQUEST['ref_id'].'"','tbl__33chronogramme',9,$db))
		   {
			   echo'selected';
		   }
		   }?>><?php echo $i;?></option>
       <?php 
	   }?>
      </select>