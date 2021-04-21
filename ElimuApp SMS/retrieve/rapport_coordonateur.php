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
    
	<script src="js/modernizr.custom.63321.js" type="text/javascript"></script>   
    <link href="css/styleResp.css" rel="stylesheet" type="text/css" />
     <link href="css-/stylesheets.css" rel="stylesheet" type="text/css" />
    <!--Css pannel contact-->
    <link href="css/stylesContact.css" rel="stylesheet" type="text/css" />
    <!--End Css pannel contact-->
     <!--calendar starts -->
    <script type='text/javascript' src='../calendar/tcal.js'></script>
    <link href="../calendar/tcal.css" rel="stylesheet" type="text/css" />
    
  <!--calendar ends -->
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
    <script>
function goBack()
  {
  window.history.back();
  }
function goforward()
  {
  window.history.forward()
  }
</script>
<!--alert before form submiting -->
  <script>
function show_alert() {
  if(confirm("Etes-vous sure de terminer cette action?\nSi oui alors assurer vous que tous les champs sont deja remplis\nAutrement vous devriez les remplir avant de continuer."))
    document.forms[0].submit();
  else
    return false;
}
</script>
</head>
<body style="overflow:auto;">
<div class="preview-top">
 <div class="sub-preview">
    <div style=" margin-left:-200px;">
    <div class="button-top" >
    <a class="button blue" href="../dashboard.php?class=default&action=default&view=default&ref_id=default&ref_menu=default">Accueil</a> 
   </div>
     <!--###################Return link ends##################################### -->
   <div class="button-top"><a class="button blueTop" onclick="changeCSS('css/styleResp.css', 0);" href="#"></a></div>
     <div class="button-top"><a class="button red" onclick="changeCSS('css/skin_red/styleResp.css', 0);"  href="#"></a></div>
     <div class="button-top"><a class="button green" onclick="changeCSS('css/skin_green/styleResp.css', 0);" href="#"></a></div>
 </div>
</div>
<!--###################################################################################Retrieve starts##################################### -->
<div align="center"><?php include('../phpscript/msg.php');?></div>

	<div id="tablewrapper" >
		<div id="tableheader">
        	<div class="search">
                <select id="columns" onchange="sorter.search('query')"></select>
                <input type="text" id="query" onkeyup="sorter.search('query')" />
            </div>
            <span class="details">
				<div>Donneés <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></div>
        		<div class="btn-reset"><a class="button blue" href="javascript:sorter.reset()">refixer</a></div>
        	</span>
        </div>
        <section>
        <?php 
if($_GET['class']=='comment_report')
{
?>
<form action="../php_script/executer.php?<?php echo'option='.$_GET['option'].'&action=default&view=shown&ref_id='.$_GET['ref_id'].'&ref_menu='.$_GET['ref_menu'].'&rpt_id='.$_GET['rpt_id'].'';?>" method="post">
<table width="100%"  border="0" id="table" class="tinytable">
  <tr>
    <td>Date</td>
    <td><input type="text" class="tcal" name="date"/></td>
  </tr>
  <tr>
    <td>Commentaire</td>
    <td><textarea name="comment" required="required" style="width:500px; height:200px;"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="executer" value="Commenter" class="btn btn-primary"/></td>
  </tr>
</table>

</form>

<table width="100%" border="1" id="table" class="tinytable" style="margin-top:10px;">
  <tr>
    <th><h3>Date</h3></th>
    <th><h3>Commentaire</h3></th>
   </tr>
   <?php
   $q=mysql_query("select * from  tbl__comment__report where user_id='".$_SESSION['SESS_USER_ID']."' and rapport_id='".$_GET['rpt_id']."'") or die("Query Failed".mysql_error());
   while($row=mysql_fetch_array($q))
   { 
   ?>
  <tr>
    <td><?php echo $row['date'];?></td>
    <td><?php echo $row['comment'];?></td>
   </tr>
   <?php 
   }?>
</table>
<?php 
exit();
}
if($_GET['action']=='default')
		{?>
 <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
<thead>
<tr>
  <th width="171" valign="top"><p><h3>ACTIVITES</h3></p></th>
    <th width="85" valign="top"><p>
    <h3>Description de la réalisation de l'activité</h3>      </p></th>
    <th width="91" valign="top"><p><h3>Résultats obtenus</h3>      </p></th>
    <th width="85" valign="top"><p><h3>Indicateurs atteints</h3>      </p></th>
    <th width="85" valign="top"><p><h3> Valeur Indicateurs atteints</h3>      </p></th>
    <th width="112" valign="top"><p><h3>Difficultés recontrées et solutions apportées</h3>      </p></th>
      <th width="112" valign="top"><p><h3>Recommandations</h3>      </p></th>
      <th width="112" valign="top"><p><h3>Attaches</h3>      </p></th>
      <th width="112" valign="top"><p><h3>Action</h3>      </p></th>
		<th><p><h3>Status Admin</h3></p></th>
        <th><p><h3>Chef Projet</h3></p></th>
  </tr>
  </thead>
  <?php
 if ($_SESSION['DESIGNATION']=='partenaire')
 {
	 $my_q=mysql_query("select * from tbl__36rapport where project_id='".ID."' and validation_admin='valider'") or die("Query Failed".mysql_error());
 }else
 {
  $my_q=mysql_query("select * from tbl__36rapport where project_id='".ID."'") or die("Query Failed".mysql_error());
 }
 
  while($print_my=mysql_fetch_array($my_q))
  {
  ?>
<td><?php $act_id=$print_my['act_id'];
$activity_query=mysql_query("select * from  tbl__23activite where activite_id='$act_id'") or die("Query Failed".$error());
	while($print_act=mysql_fetch_array($activity_query))
	{
	echo $print_act['activite'].'<br>';
	}?></td>
<td><div><?php  echo slipt_record($print_my['description_et_realisation'],20) ;?></div></td>
<td><?php 
echo slipt_record($print_my['resultat_obtenu'],20);
 ?></td>
<td><?php  echo slipt_record($print_my['Indicateur_atteint'],20) ;?></td>
<td><?php  echo slipt_record($print_my['valeur__indicateur__atteint'],20);?></td>
<td><?php  echo slipt_record($print_my['difficulte_et_solution'],20);?></td>
<td><?php  echo slipt_record($print_my['recommandaction'],20);?></td>
<td > <a href="<?php echo'view_detail.php?class=voir_la_detaile_des_fichier_envoyes&action=default&view=shown&ref_id='.$act_id.'&ref_menu='.$print_act['activite'].'&range_id='.$print_my['chrono_id'].''?>"><button type="button" class="btn btn-success">Fichier(<?php $file_number_q=mysql_query("select * from  tbl__42upload_file where act_id='".$act_id."' and range_id='".$print_my['chrono_id']."'") or die("Query Failed".$error());
	echo mysql_num_rows($file_number_q);?>)</button></a></td>
<td style="width:300px;"><a href="<?php echo'../MPDF57/examples/get_pdf_report.php?project='.ID.'&id='.$print_my[0].''?>"><button type="button" class="btn btn-success">PDF</button></a>
<?php
 if($_SESSION['DESIGNATION']=='admin'||$_SESSION['DESIGNATION']=='chef_de_projet')
  { 
?> &nbsp;
 <a href="?class=voir_les_rapport_envoyes&action=edit&view=shown&ref_id=<?php echo $_GET['ref_id'];?>&ref_menu=<?php echo $_GET['ref_menu']; ?>&rpt_id=<?php echo $print_my['rapport_id'];?>"><button type="button" class="btn btn-success">Valider</button></a>
 <?php }
?>
 
</td>
  <td>Validation: <?php echo $print_my['validation_admin'];?> | Commentaire: <?php echo $print_my['commentaire_admin']; ?></td> 
   <td>Validation: <?php echo $print_my['validation_chef_de_projet'];?> | Commentaire: <?php echo $print_my['commentaire_chef_de_projet']; ?></td>  
  </tr>
  <?php 
  }?>
</table>
   <?php }else if($_GET['action']=='edit')
	  {
		  $q=mysql_query("select * from  tbl__36rapport where rapport_id='".$_GET['rpt_id']."'") or die("Query Failed".mysql_error());
		  $row=mysql_fetch_array($q);?>
      <form method="post"  onsubmit="return show_alert();" action="executer.php?<?php echo'class='.$_GET['class'].'&action=default&view=shown&ref_id='.$_GET['ref_id'].'&ref_menu='.$_GET['ref_menu'].'&rpt_id='.$_GET['rpt_id'].'';?>" enctype="multipart/form-data">
     <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
     <thead>
      <tr>
      <th><h3>Description et realisation</h3></th>
      <th><h3>Resultat Obtenu</h3></th>
      <th><h3> Indicateur Atteint</h3></th>
      <th><h3>Difficulte et Solution</h3></th>
      <th><h3>Recommandation</h3></th>
      <th><h3>Commentaire</h3></th>
      <th><h3>Validation</h3></th>
      </tr>
      </thead>
      <tr>
       <?php
	  if($_SESSION['DESIGNATION']=='admin'){$fld='validation_admin';$fld_cmt='commentaire_admin';}else{$fld='validation_chef_de_projet'; $fld_cmt='commentaire_chef_de_projet';} 
	  ?>
      <td><textarea name="1"  style="width:100px;" readonly="readonly"><?php echo $row['description_et_realisation'];?></textarea></td>
      <td><textarea name="2" style="width:100px;" readonly><?php echo $row['resultat_obtenu'];?></textarea></td>
      <td><textarea name="3" style="width:100px;" readonly><?php echo $row['Indicateur_atteint'];?></textarea></td>
      <td><textarea name="4" style="width:100px;" readonly><?php echo $row['difficulte_et_solution'];?></textarea></td>
      <td><textarea name="5" style="width:100px;" readonly><?php echo $row['recommandaction'];?></textarea></td>
       <td><textarea name="commentaire"><?php echo $row[$fld_cmt];?></textarea></td>
      <td><select name="6" required style="width:100px;" >
      <option value="">--Valider--</option>
     
      <option value="valider" <?php if($row[$fld]=='valider'){echo'selected';}?>>Valider</option>
      <option value="reviser" <?php if($row[$fld]=='reviser'){echo'selected';}?>>Reviser</option>
       <option value="rejetter" <?php if($row[$fld]=='rejetter'){echo'selected';}?>>Rejetter</option>
      </select></td>
      </tr>
      <tr>
      <td colspan="7"><input type="submit" value="Valider le rapport" class="btn btn-primary"/>&nbsp;
      <a href="?class=voir_les_rapport_envoyes&action=default&view=shown&ref_id=<?php echo ID;?>&ref_menu=default"><button type="button" class="btn btn-success">Voir Rapports</button> </a></td>
      </tr>
      </table>
      </form>
      <?php 
	  }
	  ?>
    </section>
        <div id="tablefooter">
          <div id="tablenav">
            	<div>
                    <img src="images/first.png" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
                    <img src="images/previous.png" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
                    <img src="images/next.png" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
                    <img src="images/last.png" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
                </div>
                <div>
                	<select  id="pagedropdown"></select>
				</div>
                <div class="btn-reset"><a class="button blue" href="javascript:sorter.showall()">Voir tout</a>
                </div>
            </div>
			<div id="tablelocation">
            <div>
                  <select onchange="sorter.size(this.value)">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                        <option value="10" selected="selected">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="txt-page">Entries Per Page</span>
                </div>

            	
                <div class="page txt-txt">Page <span id="currentpage"></span> of <span id="totalpages"></span></div>
            </div>
        </div>
    </div>
    
	


	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript">
	var sorter = new TINY.table.sorter('sorter','table',{
		headclass:'head',
		ascclass:'asc',
		descclass:'desc',
		evenclass:'evenrow',
		oddclass:'oddrow',
		evenselclass:'evenselected',
		oddselclass:'oddselected',
		paginate:true,
		size:10,
		colddid:'columns',
		currentid:'currentpage',
		totalid:'totalpages',
		startingrecid:'startrecord',
		endingrecid:'endrecord',
		totalrecid:'totalrecords',
		hoverid:'selectedrow',
		pageddid:'pagedropdown',
		navid:'tablenav',
		sortcolumn:1,
		sortdir:1,
		columns:[{index:7, format:'%', decimals:1},{index:8, format:'$', decimals:0}],
		init:true
	});
  </script>
 
</body>
</html>