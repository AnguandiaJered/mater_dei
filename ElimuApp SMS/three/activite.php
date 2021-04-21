<?php
require('../phpscript/connection.php');
$db=db_connection();
if(isset($_GET['id']))
{
	$button='Edit';
	$action="'edit'";
	$value=foreign_value('where  activite_id="'.$_GET['id'].'"','  tbl__42activites','activite',$db);
	$Id=$_GET['id'];
}else
{
	$button='Sauvegarder';
	$action="'default'";
	$value='';
	$Id=0;
}
?>
<label>Activite</label> &nbsp;<input type="text" id="ActiviteId" value="<?php echo $value;?>">&nbsp; <input type="hidden" id="OptionId" value="<?php echo $_GET['optionid'];?>"> &nbsp;<button type="button" onClick="return save(4,<?php echo $action; ?>,<?php echo $Id?>);"><?php echo $button;?></button>
<div id="MsgActiviteId"></div>
<script type="text/javascript" src="ajax/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="ajax/ajax.js"></script>
<script type="text/javascript" src="ajax/save.js"></script>
