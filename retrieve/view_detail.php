<?php 
@session_start();
include('../phpscript/connection.php');
include('../phpscript/classe_lib.php');
$db=db_connection(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::Bienvenu(e) au *** <?php echo system_info(1,$db,'tbl__03configuration');?> *** ::</title>
<link rel="shortcut icon" href="../img/gemicon/fovico.png">
    
	<script src="js/modernizr.custom.63321.js" type="text/javascript"></script> 
    <script type='text/javascript' src='../calendar/tcal.js'></script>  
    <link href="css/styleResp.css" rel="stylesheet" type="text/css" />
     <link href="css-/stylesheets.css" rel="stylesheet" type="text/css" />
      <link href="../calendar/tcal.css" rel="stylesheet" type="text/css" />
    <!--Css pannel contact-->
    <link href="css/stylesContact.css" rel="stylesheet" type="text/css" />
    <!--End Css pannel contact-->
       <script type="text/javascript">
           function changeCSS(cssFile, cssLinkIndex) {

               var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);

               var newlink = document.createElement("link")
               newlink.setAttribute("rel", "stylesheet");
               newlink.setAttribute("type", "text/css");
               newlink.setAttribute("href", cssFile);

               document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
           }
    </script>
    <!--alert before form submiting -->
     <!--Numeric and dot Valiadation starts -->
           <SCRIPT language=Javascript>
      <!--
      function onlyDotsAndNumbers(event) {
        var charCode = (event.which) ? event.which : event.keyCode
        if (charCode == 46) {
            return true;
        }
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
      //-->
   </SCRIPT>  
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
<div class="preview-top">
 <div class="sub-preview">
    
  <!--###################Return link starts##################################### -->
  <?php
  if(isset($_GET['read_col']))
	    {
			$extra_link='&read_col='.$_GET['read_col'].'';
     	}else
		{
		    $extra_link='';
		} 
		if(CL==6)
		{
			$go_back_url='../dashboard.php?class=incoming_store&action=default&ref_id=default&ref_menu=default';
		}
		if(CL==7)
		{
			$go_back_url='../dashboard.php?class=outgoing_store&action=default&ref_id=default&ref_menu=default';
		}
		else
		{
			$go_back_url='../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu='.$_GET['ref_menu'].$extra_link.'';
		}
  ?>
   <div class="button-top"><a class="button blue" href="../dashboard.php?class=default&action=default&ref_id=default&ref_menu=<?php echo $_GET['ref_menu'].$extra_link; ?>"> Accueil</a></div>
  
     <!--###################Return link ends##################################### -->
   <div class="button-top"><a class="button blueTop" onclick="changeCSS('css/styleResp.css', 0);" href="#"></a></div>
     <div class="button-top"><a class="button red" onclick="changeCSS('css/skin_red/styleResp.css', 0);"  href="#"></a></div>
     <div class="button-top"><a class="button green" onclick="changeCSS('css/skin_green/styleResp.css', 0);" href="#"></a></div>
 </div>
</div>
 <?php
 switch(CL)
 {
 case 17:
     if(AC=='default')
       {
                 if(!isset($_POST['frm_check_id']))
                   {   $errmsg_arr = array();	
    $errflag = false;
	$alert='Veuillez Cochez aumoins une case pour continuer';
	$errmsg_arr[] = '<div class="alert alert-warning" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$alert.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
	$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		$url='../dashboard.php?class=project_activities&action=default&view=default&ref_id=default&ref_menu=default&project='.$_GET['project'].'';
		header('location:'.$url.'');
		exit();
		            }
	
             }
}?>
 <form id="validate" method="POST" action="executer.php?class=<?php echo CL; ?>&action=<?php echo AC; ?>&view=default&ref_id=default&ref_menu=default&project=<?php echo $_GET['project']; ?>" onSubmit="return show_alert();" enctype="multipart/form-data">
 <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="margin-top:10px;">
   <tr>
   <td width="20"></td>
     <td width="104" rowspan="2" valign="top"><p><em>&nbsp;</em>
       <input type="submit" name="button" class="btn btn-primary"   id="button" value="Configurer" />
     </p></td>
     <td width="213" colspan="3" valign="top"><p align="center"><strong>DEBUT</strong></p></td>
     <td width="213" colspan="3" valign="top"><p align="center"><strong>FIN</strong></p></td>
    </tr>
   <tr>
   <tr>
   <td colspan="2"></td>
     <td valign="top">Jour</td>
     <td valign="top">Mois</td>
     <td valign="top">Année</td>
     <td valign="top">Jour</td>
     <td valign="top">Mois </td>
     <td valign="top">Année</td>
    </tr>
   
   <?php
   if(AC=='edit')
   {
        $reference=1;
	
   }
   elseif(AC=='single')
   {
	   $reference=1;
   }
   else
   {
	   $reference=$_POST['frm_check_id'];
	   
   }
   for($dy=0; $dy< count($reference); $dy++)
   {  if(AC=='edit')
       { 
	   $ID=ID;
	   }
	   elseif(AC=='single')
	   {
		   $ID=REF_MENU;
	   }
	   else
	   {
	  $ID=$reference[$dy]; 
	   }
	 $q_3=mysql_query("select * from tbl__23activite where activite_id='".$ID."'") or die("Query Failed".$error());
			   $p_3=mysql_fetch_array($q_3);
			    $activity_id=$p_3['activite_id'];
				   $alter_query=mysql_query("select * from tbl__33chronogramme where 	chrono_id='".ID."' and projet_id='".$_GET['project']."' ") or die("Query Failed".$error());
				   $editer=mysql_fetch_array($alter_query);
   ?>
   <tr>
   <td width="20"><input type="hidden" name="frm_check_id[]" value="<?php if(AC=='edit'){ echo ID;}elseif(AC=='single')
	   {
		   echo REF_MENU;
	   }else{
	   echo $_POST['frm_check_id'][$dy];} ?>"/></td>
     <td width="104" valign="top"><p><strong><?php  if($_GET['action']=='default'){echo $p_3['activite'];}
	 else
	 {
		  echo foreign_value('where activite_id="'.$editer['activite_id'].'"',' tbl__23activite',9,$db);
		 echo'<input type="hidden" name="savior_id" value="'.$editer['savior_id'].'"/>';
	 }?></strong></p></td>
     <td valign="top">
       <label for="select"></label>
       <select name="jour[]" id="select"  style="width:100px;" required>
        <option value="">--Selectionner--</option>
       <?php
	   for($i=1; $i<=31; $i++)
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
       <option value="<?php echo $add.$i;?>" <?php 
	   if($_GET['action']=='edit')
	   {
		   if($i== $editer['a_jour'])
		   {
			   echo'selected';
		   }
		   }?>><?php echo $i;?></option>
       <?php 
	   }?>
      </select></td>
     <td valign="top"><select name="mois[]" id="select" onchange="chrono<?php echo $dy;?>(this);" style="width:100px;" required>
        <option value="">--Selectionner--</option>
       <?php
	   for($i=1; $i<=12; $i++)
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
	   if($_GET['action']=='edit')
	   {
		   if($i== $editer['a_mois'])
		   {
			   echo'selected';
		   }
		   }?>><?php echo get_moth_word($i,'fr');?></option>
       <?php 
	   }?>
      </select></td>
     <td valign="top"><select name="annee[]" id="select"   style="width:100px;" required>
        <option value="">--Selectionner--</option>
       <?php
	   if($_GET['action']=='default'){$activite_id=$reference[$dy];}else{$activite_id=$editer['activite_id'];}
	   $start=foreign_value('where activite_id="'.$activite_id.'"','tbl__43year_range',4,$db);
	   $end=foreign_value('where activite_id="'.$activite_id.'"','tbl__43year_range',5,$db);
	   for($i=$start; $i<= $end; $i++)
	   {
	   ?>
       <option value="<?php echo $i;?>"
       <?php 
	   if($_GET['action']=='edit')
	   {
		   if($i== $editer['a_annee'])
		   {
			   echo'selected';
		   }
		   }?>><?php echo $i;?></option>
       <?php 
	   }?>
      </select></td>
     <td valign="top">
       <label for="select"></label>
       <select name="bjour[]" id="select"  style="width:100px;" required>
        <option value="">--Selectionner--</option>
       <?php
	   for($i=1; $i<=31; $i++)
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
	   if($_GET['action']=='edit')
	   {
		   if($i== $editer['b_jour'])
		   {
			   echo'selected';
		   }
		   }?>><?php echo $i;?></option>
       <?php 
	   }?>
      </select></td>
     <td valign="top"><div id="chrono<?php echo $dy;?>"></div></td>
     <td valign="top"><select name="bannee[]" id="select"   style="width:100px;" required>
        <option value="">--Selectionner--</option>
       <?php
	   if($_GET['action']=='default'){$activite_id=$reference[$dy];}else{$activite_id=$editer['activite_id'];}
	   $start=foreign_value('where activite_id="'.$activite_id.'"','tbl__43year_range',4,$db);
	   $end=foreign_value('where activite_id="'.$activite_id.'"','tbl__43year_range',5,$db);
	   for($i=$start; $i<= $end; $i++)
	   {
	   ?>
       <option value="<?php echo $i;?>"
        <?php 
	   if($_GET['action']=='edit')
	   {
		   if($i== $editer['b_annee'])
		   {
			   echo'selected';
		   }
		   }?>><?php echo $i;?></option>
       <?php 
	   }?>
      </select></td>
    </tr>
   <?php
   }
   ?>
 </table>
 </form>
<?php 
 break;
 case 'baseline':
     if(AC=='default')
       {
                 if(!isset($_POST['frm_check_id']))
                   {   $errmsg_arr = array();	
    $errflag = false;
	$alert='Veuillez Cochez aumoins une case pour continuer';
	$errmsg_arr[] = '<div class="alert alert-warning" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$alert.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
	$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		$url='../dashboard.php?class=baseline&action=default&view=default&ref_id=default&ref_menu=default&project='.$_GET['project'].'';
		header('location:'.$url.'');
		exit();
		            }
	
             }
}?>
 <form id="validate" method="POST" action="executer.php?class=<?php echo CL; ?>&action=<?php echo AC; ?>&view=default&ref_id=default&ref_menu=default&project=<?php echo $_GET['project']; ?>" onSubmit="return show_alert();" enctype="multipart/form-data">
 <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="margin-top:10px;">
   <tr>
   <td width="20"></td>
     <td width="104" rowspan="2" valign="top"><p><em>&nbsp;</em>
       <input type="submit" name="button" class="btn btn-primary"   id="button" value="Configurer" />
     </p></td>
     <td width="213" colspan="3" valign="top"><p align="center">PROGRES</p></td>
   </tr>
   <tr>
   <td width="20"></td>
     <td width="71" valign="top"></td>
   </tr>
   <?php
   if(AC=='edit')
   {
        $reference=1;
	
   }
   elseif(AC=='single')
   {
	   $reference=1;
   }
   else
   {
	   $reference=$_POST['frm_check_id'];
	   
   }
   for($dy=0; $dy< count($reference); $dy++)
   {  if(AC=='edit')
       { 
	   $ID=ID;
	   }
	   elseif(AC=='single')
	   {
		   $ID=REF_MENU;
	   }
	   else
	   {
	  $ID=$reference[$dy]; 
	   }
	 $q_3=mysql_query("select * from tbl__23activite where activite_id='".$ID."'") or die("Query Failed".$error());
			   $p_3=mysql_fetch_array($q_3);
			    $activity_id=$p_3['activite_id'];
				   $alter_query=mysql_query("select * from tbl__37baseline where baseline_id='".ID."' and projet_id='".$_GET['project']."' ") or die("Query Failed".$error());
				   $editer=mysql_fetch_array($alter_query);
   ?>
   <tr>
   <td width="20"><input type="hidden" name="frm_check_id[]" value="<?php if(AC=='edit'){ echo ID;}elseif(AC=='single')
	   {
		   #echo REF_MENU;
	   }else{
	   echo $_POST['frm_check_id'][$dy];} ?>"/></td>
     <td width="104" valign="top"><p><strong><?php echo $p_3['activite'];?></strong></p></td>
     <td width="71" valign="top">
      <textarea  name="baseline[]" required><?php if(AC=='edit'){echo $editer['baseline'];}?></textarea>
     </td>
   </tr>
   <?php
   }
   ?>
 </table>
 </form>
<?php 
 break;
 case 39:
     if(AC=='default')
       {
                 if(!isset($_POST['frm_check_id']))
                   {   $errmsg_arr = array();	
    $errflag = false;
	$alert='Veuillez Cochez aumoins une case pour continuer';
	$errmsg_arr[] = '<div class="alert alert-warning" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$alert.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
	$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		$url='../dashboard.php?class=39&action=default&view=default&ref_id=default&ref_menu=default&project='.$_GET['project'].'';
		header('location:'.$url.'');
		exit();
		            }
	
             }
}?>
 <form id="validate" method="POST" action="executer.php?class=<?php echo CL; ?>&action=<?php echo AC; ?>&view=default&ref_id=default&ref_menu=default&project=<?php echo $_GET['project']; ?>" onSubmit="return show_alert();" enctype="multipart/form-data">
 <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="margin-top:10px;">
   <tr>
   <td width="20"></td>
     <td width="104" rowspan="2" valign="top"><p><em>&nbsp;</em>
       <input type="submit" name="button" class="btn btn-primary"   id="button" value="Configurer" />
     </p></td>
     <td width="213"  valign="top"><p align="center">LIBELLE OU JUSTIFICATION</p></td>
     <td width="213"  valign="top"><p align="center">QUANTITE</p></td>
      <td width="213"  valign="top"><p align="center">PRIX UNITAIRE</p></td>
       <td width="213"  valign="top"><p align="center">FREQUENCE</p></td>
       <td width="213"  valign="top"><p align="center">DATE</p></td>
   </tr>
   <tr>
   <td width="20"></td>
     <td width="71" valign="top"></td>
   </tr>
   <?php
   if(AC=='edit')
   {
        $reference=1;
	
   }
   elseif(AC=='single')
   {
	   $reference=1;
   }
   else
   {
	   $reference=$_POST['frm_check_id'];
	   
   }
   for($dy=0; $dy< count($reference); $dy++)
   {  if(AC=='edit')
       { 
	   $ID=ID;
	   }
	   elseif(AC=='single')
	   {
		   $ID=REF_MENU;
	   }
	   else
	   {
	  $ID=$reference[$dy]; 
	   }
	 $q_3=mysql_query("select * from  tbl__48libelle__tresorerie where libelle_tr='".$ID."'") or die("Query Failed".$error());
			   $p_3=mysql_fetch_array($q_3);
			   # $activity_id=$p_3['produit_id'];
				   $alter_query=mysql_query("select * from  tbl__39sortie__des__fonds where sortie_fond_id='".ID."' and projet_id='".$_GET['project']."' ") or die("Query Failed".$error());
				   $editer=mysql_fetch_array($alter_query);
   ?>
   <tr>
   <td width="20">
   <input type="hidden" name="libelle_id[]" value="<?php if(AC!='edit'){echo foreign_value('where libelle_tr="'.$_POST['frm_check_id'][$dy].'"',' tbl__48libelle__tresorerie',3,$db);}?>"/>
   <input type="hidden" name="frm_check_id[]" value="<?php if(AC=='edit'){ echo ID;}elseif(AC=='single')
	   {
		   #echo REF_MENU;
	   }else{
	   echo $_POST['frm_check_id'][$dy];} ?>"/></td>
     <td width="104" valign="top"><p><strong><?php
     if(AC=='default'){  $lib_id=$p_3['libelle_id']; echo'&nbsp;'.foreign_value('where libelle_id="'.$lib_id.'"','tbl__32libelle',5,$db);}else{ echo $editer['libelle']; }?></strong></p></td>
      <td width="71" valign="top">
      <textarea  name="libelle[]" required><?php if(AC=='edit'){echo $editer['libelle'];}else{echo foreign_value('where libelle_id="'.$lib_id.'"','tbl__32libelle',5,$db);}?></textarea>
     </td>
     <td width="71" valign="top">
      <input type="text" name="quantite[]" onkeypress="return onlyDotsAndNumbers(event)"  value="<?php if(AC=='edit'){echo $editer['quantite'];}else{echo $p_3['quantite'];}?>" required>
     </td>
      <td width="71" valign="top">
      <input type="text" name="pu[]" onkeypress="return onlyDotsAndNumbers(event)" value="<?php if(AC=='edit'){echo $editer['prix__unitaire'];}?>" required>
     </td>
      <td width="71" valign="top">
       <input type="text" name="frequence[]" onkeypress="return onlyDotsAndNumbers(event)" value="<?php if(AC=='edit'){echo $editer['frequence'];}?>"required>
     </td>
      <td width="71" valign="top">
       <input type="text" name="date"  value="<?php if(AC=='default'){echo $_POST['date'];}else{ echo $editer['date']; }
	   ?>"  readonly="readonly" required>
     </td>
   </tr>
   <?php
   }
   ?>
 </table>
 </form>
<?php 
 break;
 case 'view_outgoing_fund':
     if(AC=='default')
       {
}?>
 
 <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="margin-top:10px;">
   <tr>
   <td width="213"  valign="top"><p align="center">DATE</p></td>
  	<td width="213"  valign="top"><p align="center">LIBELLE OU JUSTIFICATION</p></td>
     <td width="213"  valign="top"><p align="center">QUANTITE</p></td>
      <td width="213"  valign="top"><p align="center">PRIX UNITAIRE</p></td>
       <td width="213"  valign="top"><p align="center">FREQUENCE</p></td>
       <td width="213"  valign="top"><p align="center">ACTION</p></td>
       
   </tr>
   
  <?php
	 $query=mysql_query("select * from tbl__39sortie__des__fonds where projet_id='".$_GET['project']."'") or die("Query Failed".$error());
	 while($row=mysql_fetch_array($query))
	 {
   ?>
   <tr>
 
     <td width="104" valign="top"><p><strong><?php echo $row['date'];?></strong></p></td>
      <td width="104" valign="top"><p><strong><?php echo $row['libelle'];?></strong></p></td>
       <td width="104" valign="top"><p><strong><?php echo $row['quantite'];?></strong></p></td>
        <td width="104" valign="top"><p><strong><?php echo $row['prix__unitaire'];?></strong></p></td>
         <td width="104" valign="top"><p><strong><?php echo $row['frequence'];?></strong></p></td>
         <td width="213"  valign="top"><p align="center"><a href="?class=39&action=edit&view=default&ref_id=<?php echo $row[0];?>&ref_menu=default&project=<?php echo $row['projet_id'];?>"><button class="btn btn-primary">Editer</button></a></p></td>
      
   </tr>
   <?php
   }
   ?>
 </table>
<?php 
 break;
 case 'envoyer_le_rapport_activite_sans_photo':
$alter_query=mysql_query("select * from tbl__36rapport where 	act_id='".ID."' and project_id='".$_GET['project']."'  and chrono_id='".$_GET['range_id']."'") or die("Query Failed".$error());
 $editer=mysql_fetch_array($alter_query);
	?>
          
             <h3>Personnel suivi du projet</h3>
              <form method="post" action="executer.php<?php echo'?class='.CL.'&action='.AC.'&view=shown&ref_id='.ID.'&ref_menu='.FK.'&range_id='.$_GET['range_id'].'&project='.$_GET['project'].''?>" onsubmit="return show_alert(); ">
 <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="margin-top:10px;">
  <tr>
    <th width="80"><p><h3>Activites</h3></p></th>
    <th width="80"><p><h3>Deroulement de l'activité</h3></p></th>
    <th width="80" valign="top"><p><h3>Résultats obtenus</h3></p></th>
    <th width="91" valign="top"><p><h3>Indicateurs atteints</h3></p></th>
    <th width="82" valign="top"><p><h3>Difficultés recontrées et solutions    apportées</h3></p></th>
    <th width="85" valign="top"><p><h3>Recommandations</h3></p></th>
  </tr>
  <tr>
    <td width="80" nowrap="nowrap"><p>
    <?php
	echo foreign_value('where activite_id="'.ID.'"','tbl__23activite',9,$db);  
	?></p></td>
    <td width="80"><p><textarea name="frm_2"  style="width:200px;  height:170px;"><?php if(AC=='edit'){echo $editer['description_et_realisation'];}?></textarea></p></td>
    <td width="80" nowrap="nowrap"><p><textarea name="frm_3"  style="width:200px;   height:170px;"><?php if(AC=='edit'){echo $editer['resultat_obtenu'];}?></textarea></p></td>
    <td width="91"><p><textarea name="frm_4"  style="width:200px;   height:170px;"><?php if(AC=='edit'){echo $editer['Indicateur_atteint'];}?></textarea></p>
    <br>
    Valeur:
    <br><br>
    <input type="text" name="valeur_atteint_value" value="<?php if(AC=='edit'){echo $editer['valeur__indicateur__atteint'];}?>" onkeypress="return onlyDotsAndNumbers(event);"/></td>
    <td width="82" nowrap="nowrap"><p><textarea name="frm_5"  style="width:200px;   height:170px;"><?php if(AC=='edit'){echo $editer['difficulte_et_solution'];}?></textarea></p></td>
    <td width="85" nowrap="nowrap" ><p><textarea name="frm_6"  style="width:200px;   height:170px;"><?php if(AC=='edit'){echo $editer['recommandaction'];}?></textarea></p></td>
  </tr>
 
</table>
<br />
<input type="submit" value="<?php if(AC=='edit'){echo'Editer Rapport';}else{?>Envoyer Rapport<?php }?>" class="btn btn-primary"/>
    <?php
    break;
	case 'envoyer_le_rapport_activite_avec_photo':?>
    
	<fieldset><legend>Configuration Fichier(doc,ppt,xl,pdf,jpg,png,gif,avi,vob etc...)</legend>
    <form method="post" enctype="multipart/form-data">
    <div  style="margin-left:10px; margin-bottom:10px;">
    <label>Nobre de fichier:</label>
    <input type="text" name="frm_number"/>
    <br />
    <input type="submit" class="btn btn-primary"  value="Generer"/>
    </div>
    </form>
    <hr />
   <form method="post"  action="executer.php<?php echo'?class='.CL.'&action=default&view=shown&ref_id='.ID.'&ref_menu=default&range_id='.$_GET['range_id'].'&project='.$_GET['project'].'';?>" enctype="multipart/form-data" onsubmit="return show_alert();">
    <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="margin-top:10px;">
  <tr>
    <td>No</td>
    <td>Fichier Source</td>
  </tr>
  <?php
  if(isset($_POST['frm_number']))
  {
	  $m=0;
	  for($k=0; $k<($_POST['frm_number']); $k++)
	  {
		  $m=$m+1;
  ?>
  <tr>
    <td><?php echo $m;?></td>
    <td><input type="file" name="uploaded_file[]" required="required"  />
    <input type="hidden"  name="frm_file[]" /></td>
  </tr>
  <?php
	  }
  }?>
</table>
<br />
    <input type="submit" style="margin-bottom:10px; margin-left:10px;"  class="btn btn-primary" <?php if(!isset($_POST['frm_number']))
	{
		echo'disabled="disabled"';
		
		}
		else if(isset($_POST['frm_number']) and $_POST['frm_number']<1)
		{
		echo'disabled="disabled"';	
		}
	?>  value="Envoyer Fichier"/>
    <p></p>
</form>

	<?php
    break;
	case 'voir_la_detaile_des_fichier_envoyes':?>
    <h3 style="text-transform:uppercase">DETAILE FICHIERS TELECHARGES</h3>
	<table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="margin-top:10px;">
  <tr>
  <th><h3>Fichier</h3></th>
  <th><h3>Extension Fichier</h3></th>
  <th><h3>Visualisation</h3></th>
   <th><h3>ACTION</h3></th>
   </tr>
   <?php 
   $file_up_q=mysql_query("select * from tbl__42upload_file where act_id='".ID."' and  range_id='".$_GET['range_id']."'") or die("Query Failed".$error());
   $check_file=mysql_num_rows($file_up_q);
   if($check_file>=1)
   {
   while($p_file=mysql_fetch_array($file_up_q))
   {?>
   <tr>
   <td><?php echo str_replace('../file_uploaded/','', $p_file['file_path']);?></td>
   <td><?php  $file_path= $p_file['file_path'];echo $ext=substr($file_path,-3);?></td>
   <td><?php  $ext=substr($file_path,-3);
   $extension=array('jpg','jpeg','gif','png');
   foreach($extension as $value)
   {
	   if($ext==$value)
	   {
		  echo'<img src="'.$file_path.'" alt="x" height="100" width="100">';
	   }
	   else
	   {
		   break;
		  
	   }
   }?></td>
   <td>
   <a href="<?php echo $file_path;?>"><button type="button" class="btn btn-primary">Téléchargé Fichier</button></a></td>
   </tr>
    <?php
   }
   }
   else
   {?>
   <tr style="background-color:#FBC7BF"><td colspan="4"><center>! Aucun Fichier Téléchargé</center></td></tr>
	<?php
   }
    break;
 }
 ?>

 </div>
    </section>
       
   <script src="../ajax/jquery-1.9.0.min.js"></script>
<script>
<?php 
for($dy=0; $dy< count($reference); $dy++)
   { ?>
function chrono<?php echo $dy;?>(sel) {
	var form_id = sel.options[sel.selectedIndex].value; 
	var ref_id="<?php echo $_GET['ref_id'];?>";
	var myaction="<?php echo $_GET['action'];?>";
	if (form_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "../ajax/month.php",
			data: "form_id="+form_id +"&action="+myaction+"&ref_id="+ref_id+"",
			cache: false,
			beforeSend: function () { 
				$('#chrono<?php echo $dy;?>').html('<img src="../ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#chrono<?php echo $dy;?>").html( html );
			}
		});
	} else {
		$("#chrono<?php echo $dy;?>").html( "" );
	}
}


<?php
}
?>
<!--show total -->
</script>
</body>
</html>