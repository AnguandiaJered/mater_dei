<?php
include("phpscript/connection.php");
$db=db_connection();
$cours_id=$_REQUEST['cours_id'];
$cours=foreign_value('where branche_id="'.$_REQUEST['cours_id'].'"',' tbl__43branches','branche',$db);
$enseignant_id=foreign_value('where cours_id="'.$_REQUEST['cours_id'].'"','tbl__13cours',6,$db);
$enseignant=foreign_value('where enseignant_id="'.$enseignant_id.'"','tbl__12enseignants',2,$db);
$periode=$_GET['order_id'];
if($_GET['affect_id']==1)
{
	$max=foreign_value('where branche_id="'.$_REQUEST['cours_id'].'"','tbl__43branches','max__periode',$db);
}else if($_GET['affect_id']==2)
{
	$max=foreign_value('where branche_id="'.$_REQUEST['cours_id'].'"','tbl__43branches','max__exam',$db);
}
else if($_GET['affect_id']==3)
{
	
	$max=foreign_value('where branche_id="'.$_REQUEST['cours_id'].'"','tbl__43branches','max__trimestre',$db);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coter les eleves</title>
<script src="ajax/jquery-1.9.0.min.js"></script> 
</head>

<body>
<table width="100%">
  <tr>
    <td colspan="4"><p><strong>Nom du Cours:</strong> <?php echo $cours;?></p>
    <p><strong>Max:</strong> <?php echo $max;?></p>
    <p><strong>Enseignant:</strong> <?php echo $enseignant;?></p>
    <p><strong>Periode concernee: </strong> <?php echo $periode;?></p></td>
  </tr>
  <tr>
    <td><strong>Numero</strong></td>
    <td><strong>Nom complet de l'eleve</strong></td>
    <td><strong>Point obtenus</strong></td>
    <td><strong>Action</strong></td>
  </tr>
  <?php
  $j=0;
  $q=$db=mysql_query("select * from tbl__17inscription__des__eleves where classe_id='".$_GET['classe_id']."' order by nom__complet") or die("Query Failed".mysql_error()); 
  while($row=mysql_fetch_array($q))
  {
	    $j++;
   $mark_id_parameter="'markid_".$j."'";
   $mark_secid_parameter="'mark_section_".$j."'";
		?>
   <tr>
    <td><?php  echo $j;?></td>
    <td><?php  echo $row['nom__complet'];?></td>
    <td><div id="mark_section_<?php echo $j;?>">
    <select name="mark" id="markid_<?php echo $j;?>">
    <option value="">-- Selectionner Mark --</option>
    <?php echo marks($max);
	$previous_mark=foreign_value('where inscription__des__eleves_id ="'.$row[0].'" and cours_id="'.$cours_id.'" and affectation_id ="'.$_GET['affect_id'].'" and order_id ="'.$_GET['order_id'].'"','tbl__37point_eleve','mark',$db);
	$mark_id=foreign_value('where inscription__des__eleves_id ="'.$row[0].'" and cours_id="'.$cours_id.'" and affectation_id ="'.$_GET['affect_id'].'" and order_id ="'.$_GET['order_id'].'"','tbl__37point_eleve','point_eleve_id',$db);
	if($mark_id<1)
	{
		$mark_id=0;
	}
	else
	{
		$mark_id=$mark_id;
	}?>
    </select></div></td>
    <td><?php if($mark_id == 0)
{$action='default'; 
?><button type="button" onclick="save_mark(<?php echo $mark_id_parameter;?>,<?php echo $row[0];?>,<?php echo $_GET['affect_id'];?>,<?php echo $_GET['order_id'];?>,<?php echo $mark_secid_parameter;?>,<?php echo $cours_id;?>,'<?php echo $action ?>',<?php echo $mark_id;?>)">Sauvegarder</button><?php }else
	{
		$action='edit';
		echo '('.$previous_mark.')&nbsp;'?>
<button type="button" onclick="save_mark(<?php echo $mark_id_parameter;?>,<?php echo $row[0];?>,<?php echo $_GET['affect_id'];?>,<?php echo $_GET['order_id'];?>,<?php echo $mark_secid_parameter;?>,<?php echo $cours_id;?>,'<?php echo $action ?>',<?php echo $mark_id;?>)">Editer</button>	<?php 
	}?></td>
  </tr>
  <script>
function save_mark(markid,studentid,affect_id,order_id,marksection,coursid,action,stdmarkid) {
    var txt,maxmark;
	maxmark="<?php  echo $max;?>";
	var mark = document.getElementById(markid).value; 
    var r = confirm("Etes-vous sure de vouloir effectuer cette action!("+mark+"/"+maxmark+")");
    if (r == true) {
		
		
	if (mark .length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/marksave.php",
			data: "mark="+mark+"&stid="+studentid+"&affect_id="+affect_id+"&order_id="+order_id+"&cours_id="+coursid+"&action="+action+"&stdmarkid="+stdmarkid+"",
			cache: false,
			beforeSend: function () { 
				$('#'+marksection).html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$('#'+marksection).html( html );
			}
		});
	} else {
		alert('Veuillez selectionner le point pour continuer');
			}
    }
	 else {
     alert('Action annullee');
    }
   
}
</script>
  <?php 
  }?>
</table>

</body>
</html>
