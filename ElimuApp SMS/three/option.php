<?php
require('../phpscript/connection.php');
$db=db_connection();
if(isset($_GET['id']))
{
	$button='Edit';
	$action="'edit'";
	$value=foreign_value('where option_id="'.$_GET['id'].'"','  tbl__20option','option__degre',$db);
	$Id=$_GET['id'];
}else
{
	$button='Sauvegarder';
	$action="'default'";
	$value='';
	$Id=0;
}
?>
<label>Option</label> &nbsp;<input type="text" id="OptionId" value="<?php echo $value;?>">&nbsp; <input type="hidden" id="SectionId" value="<?php echo $_GET['SectionId'];?>"> &nbsp;<button type="button" onClick="return save(2,<?php echo $action; ?>,<?php echo $Id?>);"><?php echo $button;?></button>
<div id="MsgOptionId"></div>
<script type="text/javascript" src="ajax/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="ajax/ajax.js"></script>
<script type="text/javascript" src="ajax/save.js"></script>
