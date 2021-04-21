<?php
include("../phpscript/connection.php");
$db=db_connection();
if($_REQUEST['alphabet']!='none')
{
echo'<div class="form-group"></div><label for="exampleInputEmail1" style="text-transform:capitalize;">Nom Classe</label> <input type="text" name="nom__de__la__classe" value="'.$_REQUEST['nume_id'].$_REQUEST['alphabet'].'" style="text-transform:capitalize;" readonly class="form-control"></div>';
}
else
{
	echo'<div class="form-group"></div><label for="exampleInputEmail1" style="text-transform:capitalize;">Nom Classe</label> <input type="text" name="nom__de__la__classe" value="'.$_REQUEST['nume_id'].'" style="text-transform:capitalize;" readonly class="form-control"></div>';
}
?>