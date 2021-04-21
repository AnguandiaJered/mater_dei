<?php
require('../phpscript/connection.php');
$db=db_connection();
if(isset($_GET['id']))
{
	$button='Edit';
	$action="'edit'";
	$value=foreign_value('where section_id="'.$_GET['id'].'"',' tbl__11section','section',$db);
	$Id=$_GET['id'];
}else
{
	$button='Sauvegarder';
	$action="'default'";
	$value='';
	$Id=0;
}
?>
<label>Section</label> &nbsp;<input type="text" id="SectionID" value="<?php echo $value;?>">&nbsp;<button type="button" onClick="return save(1,<?php echo $action; ?>,<?php echo $Id;?>);"><?php echo $button;?></button>
<div id="MsgSectionId"></div>
<script type="text/javascript" src="ajax/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="ajax/ajax.js"></script>
<script type="text/javascript" src="ajax/save.js"></script>

