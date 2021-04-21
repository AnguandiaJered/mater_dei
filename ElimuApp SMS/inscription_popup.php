<?php 
include('phpscript/security_auto_hacking.php'); //avoid unautorized login
include('phpscript/connection.php');//connection page
include('phpscript/classe_lib.php');//class page
$db=db_connection();//connection variable
$_SESSION['UPLOAD_FILE']=16;
$_SESSION['UPLOAD_FILE_update']=17;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inscription</title>
<link href="css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="css/8nov17.css" rel="stylesheet">
<script>
function show_alert() {
  if(confirm("Etes-vous sure de terminer cette action?\nSi oui alors assurer vous que tous les champs sont deja remplis\nAutrement vous devriez les remplir avant de continuer."))
    document.forms[0].submit();
  else
    return false;
}
</script>
</head>

<body>
<h1 class="_8nov17_titre" align="">Inscription des eleves</h1>
<form method="post" target="_parent" onsubmit=" return show_alert();" enctype="multipart/form-data" action="<?php echo 'phpscript/executer.php?class='.CL.'&action='.$_GET['action'].'&ref_id='.$_GET['id'].'&ref_menu='.FK.'';?>">
<table width="100%" border="0">
 <tr>
    <td>Numero matricule</td>
    <td style="text-transform:uppercase;"><?php echo $_GET['num_mat'];?><label for="textfield"></label>
      <input  type="hidden" name="numero__matricule" id="textfield" readonly="readonly"  style="text-transform:uppercase" value="<?php echo $_GET['num_mat'];?>"/></td>
  </tr>
   <tr>
    <td>Section</td>
    <td><?php echo foreign_value('where section_id="'.$_GET['section_id'].'"','tbl__11section',2,$db);?><label for="textfield"></label>
      <input type="hidden" name="section_id" id="textfield" value="<?php echo $_GET['section_id'];?>" /></td>
  </tr>
   <tr>
    <td>Option</td>
    <td><?php echo foreign_value('where option_id="'.$_GET['option_id'].'"','tbl__20option',3,$db);?>
    <label for="textfield"></label>
      <input type="hidden" name="option_id" id="textfield" value="<?php echo $_GET['option_id'];?>" /></td>
  </tr>
   <tr>
    <td>Classe</td>
    <td style="text-transform:uppercase;"><?php echo foreign_value('where classe_id="'.$_GET['classe_id'].'"',' tbl__15classe',2,$db);?>
    <label for="textfield"></label>
      <input type="hidden" name="classe_id" id="textfield" value="<?php echo $_GET['classe_id'];?>" /></td>
  </tr>
  <tr>
    <td>Nom complet</td>
    <td><label for="textfield"></label>
      <input type="text" placeholder="Nom complet" class="form-control" name="nom__complet" id="textfield" value="<?php if($_GET['action']=='edit'){echo foreign_value('where inscription__des__eleves_id="'.$_GET['id'].'"','tbl__17inscription__des__eleves',2,$db);}?>" /></td>
  </tr>
  <tr>
    <td>Lieu de naissance</td>
    <td><input type="text" placeholder="Lieu de naissance" class="form-control" name="lieu__de__naissance" id="textfield2" value="<?php if($_GET['action']=='edit'){echo foreign_value('where inscription__des__eleves_id="'.$_GET['id'].'"','tbl__17inscription__des__eleves',3,$db);}?>" /></td>
  </tr>
  <tr>
    <td>Date de naissance</td>
    <td><input type="text" placeholder="Date de naissance" class="form-control" name="date__de__naissance" id="textfield3" value="<?php if($_GET['action']=='edit'){echo foreign_value('where inscription__des__eleves_id="'.$_GET['id'].'"','tbl__17inscription__des__eleves',4,$db);}?>" /></td>
  </tr>
  <tr>
    <td>Genre</td>
    <td>
    <label class="radio-inline1">
    Masculin <input type="radio" value="Masculin"  name="genre" <?php if($_GET['action']=='edit'){ if(foreign_value('where inscription__des__eleves_id="'.$_GET['id'].'"','tbl__17inscription__des__eleves',5,$db)=='Masculin'){echo'checked';}}?>/> </label> 
     <label class="radio-inline1">
     Feminin <input type="radio" value="Feminin" name="genre" <?php if($_GET['action']=='edit'){ if(foreign_value('where inscription__des__eleves_id="'.$_GET['id'].'"','tbl__17inscription__des__eleves',5,$db)=='Feminin'){echo'checked';}}?>/>
     </label>


    </td>
  </tr>
  <tr>
    <td>Ecole de provenance</td>
    <td><input type="text" placeholder="Ecole de provenance" class="form-control" name="ecole__de__provenance" id="textfield4"  value="<?php if($_GET['action']=='edit'){echo foreign_value('where inscription__des__eleves_id="'.$_GET['id'].'"','tbl__17inscription__des__eleves',6,$db);}?>" /></td>
  </tr>
  <tr>
    <td>Classe de provenance</td>
    <td><input type="text" placeholder="Classe de provenance" class="form-control" name="classe__de__provenance" id="textfield5" value="<?php if($_GET['action']=='edit'){echo foreign_value('where inscription__des__eleves_id="'.$_GET['id'].'"','tbl__17inscription__des__eleves',7,$db);}?>" /></td>
  </tr>
  <tr>
    <td>Points obtenus</td>
    <td><input type="text" placeholder="Points obtenus" class="form-control" name="point__obtenus" id="textfield6"  value="<?php if($_GET['action']=='edit'){echo foreign_value('where inscription__des__eleves_id="'.$_GET['id'].'"','tbl__17inscription__des__eleves',8,$db);}?>"/></td>
  </tr>
  <tr>
    <td>Conduite obtenue</td>
    <td><input name="conduite__obtnue" placeholder="Conduite obtenue" class="form-control" type="text" id="textfield7" value="<?php if($_GET['action']=='edit'){echo foreign_value('where inscription__des__eleves_id="'.$_GET['id'].'"','tbl__17inscription__des__eleves',9,$db);}?>" /></td>
  </tr>
  <tr>
    <td>Adresse</td>
    <td><textarea placeholder="Adresse" class="form-control" name="adresse" id="textfield8"><?php if($_GET['action']=='edit'){echo foreign_value('where inscription__des__eleves_id="'.$_GET['id'].'"','tbl__17inscription__des__eleves',10,$db);}?></textarea></td>
  </tr>
  <tr>
    <td>Personne responsable (parent ou tuteur)</td>
    <td><input type="text" placeholder="Personne responsable (parent ou tuteur)" class="form-control" name="personne__responsable" id="textfield9" value="<?php if($_GET['action']=='edit'){echo foreign_value('where inscription__des__eleves_id="'.$_GET['id'].'"','tbl__17inscription__des__eleves',11,$db);}?>" /></td>
  </tr>
  <tr>
    <td>Téléphone de la personne résponsable</td>
    <td><input type="text" placeholder="Téléphone de la personne résponsable" class="form-control" name="telephone__personne__de__reference" id="textfield10" value="<?php if($_GET['action']=='edit'){echo foreign_value('where inscription__des__eleves_id="'.$_GET['id'].'"','tbl__17inscription__des__eleves','telephone__personne__de__reference',$db);}?>" /></td>
  </tr>
  <tr>
    <td>Moyen de locomotion</td>
    <td><input type="text" placeholder="Moyen de locomotion" class="form-control" name="moyen__de__locomotion" id="textfield11" value="<?php if($_GET['action']=='edit'){echo foreign_value('where inscription__des__eleves_id="'.$_GET['id'].'"','tbl__17inscription__des__eleves','moyen__de__locomotion',$db);}?>" /></td>
  </tr>
  <tr>
    <td>Photo</td>
    <td><input class="btn btn-default btn-block" type="file" name="photo"/></td>
  </tr>
  <tr>
    <td>Télécharger le dossier</td>
    <td><input placeholder="Télécharger" class="btn btn-default btn-block" type="file" name="dossier"/></td>
  </tr>
  <tr>
  <td></td>
  <td><input class="btn btn-primary btn-block" type="submit" value="<?php if($_GET['action']=='default'){echo 'Sauvegarder';}else{echo'Editer';}?>"/></td>
  </tr>
</table>
</form>

</body>
</html>