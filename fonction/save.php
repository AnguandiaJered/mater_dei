<?php session_start(); include('fonction.php'); ?>
<?php
if(isset($_SESSION['USER_ID']))
{
		$data['file'] = $_FILES;
		$data['text'] = $_POST;
		
		$obj = $data['text'];
		$_POST = (array)($obj);

	if(isset($_POST['type'])){ $type = $_POST['type'];} else{$type="";} 
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
++++++++++++++++++++++++++++++++++++++++++++++++++ ELIMU GESTELEVE ++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
	if($type == "select_section")
	{
		$section_id = $_POST['section_id'];
		$sect=$bd->query("SELECT * FROM tbl__20option WHERE section_id = ".$section_id." "); ?><option value="">Option</option><?php while($ion=$sect->fetch()){ ?><option value="<?php echo $ion['option_id'];?>"><?php echo $ion['option__degre'];?></option><?php }
	}
	if($type == "select_option")
	{
		$option_id = $_POST['option_id']; $section_id = $_POST['section_id'];
		$sect=$bd->query("SELECT * FROM tbl__15classe WHERE option_id = ".$option_id." AND section_id = ".$section_id."  "); ?><option value="">Classe</option><?php while($ion=$sect->fetch()){ ?><option value="<?php echo $ion['classe_id'];?>"><?php echo $ion['nom__de__la__classe'];?></option><?php }
	}
	if($type == "liste_eleve")
	{
		$option_id = $_POST['option_id']; $section_id = $_POST['section_id']; $classe_id = $_POST['classe_id'];
		$sect=$bd->query("SELECT * FROM ((tbl__17inscription__des__eleves I INNER JOIN tbl__15classe C ON I.classe_id = C.classe_id) INNER JOIN tbl__20option O ON C.option_id = O.option_id ) INNER JOIN tbl__11section S ON O.section_id = S.section_id WHERE I.classe_id = ".$classe_id." ORDER BY I.nom__complet"); $la=$sect->fetch();?>
		<div class="portlet-heading">
			<div class="portlet-title">
				<h4><i class="fa fa-home fa-fw"></i> <?php echo strtoupper($la['nom__de__la__classe'].' / '.$la['option__degre'].' / '.$la['section']);?></h4>
			</div>
			<div class="portlet-widgets">
				<!-- Button Dropdown -->
				<div class="btn-group">
					<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
						Export
					</button>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="portlet-body row">
		<div id="zonne_notif"></div>
			<div class="table-responsive col-lg-12">
				<table class="table table-striped table-bordered table-hover table-green" id="map-table-example">
					<thead>
						<tr>
							<th>#</th>
							<th>Matricule</th>
							<th>Nom complet</th>
							<th>lieu de Naissance</th>
							<th>Date de Naissance</th>
							<th>Sexe</th>
							<th>Responsable</th>
							<th>Télephone Responsable</th>
							<th>Classe</th>
							<th>-</th>
						</tr>
					</thead>
					<tbody>
					<?php $i=0; while($ion=$sect->fetch()){ $i++; ?>
						<tr>
							<td><strong><?php echo $i;?></strong></td>
							<td><?php echo $ion['numero__matricule'];?> <input type="hidden" id="inscription<?php echo $i;?>" value="<?php echo $ion['inscription__des__eleves_id'];?>"></td>
							<td><span class="modif<?php echo $i;?>"><?php echo $ion['nom__complet'];?></span> <input type="text" class="form-control hidden modifie<?php echo $i;?>" id="nom<?php echo $i;?>" value="<?php echo $ion['nom__complet'];?>"/></td>
							<td><span class="modif<?php echo $i;?>"><?php echo $ion['lieu__de__naissance'];?></span> <input type="text" class="form-control hidden modifie<?php echo $i;?>" id="lieu<?php echo $i;?>" value="<?php echo $ion['lieu__de__naissance'];?>"/></td>
							<td><span class="modif<?php echo $i;?>"><?php echo $ion['date__de__naissance'];?></span> <input type="text" class="form-control hidden modifie<?php echo $i;?>" id="date<?php echo $i;?>" value="<?php echo $ion['date__de__naissance'];?>"/></td>
							<td><span class="modif<?php echo $i;?>"><?php echo $ion['genre'];?></span> <select class="form-control hidden modifie<?php echo $i;?>" id="genre<?php echo $i;?>"> <option value="<?php echo $ion['genre'];?>"><?php echo $ion['genre'];?></option><option value="Masculin">Masculin</option> <option value="Feminin">Feminin</option> </select></td>
							<td><span class="modif<?php echo $i;?>"><?php echo $ion['personne__responsable'];?></span> <input type="text" class="form-control hidden modifie<?php echo $i;?>" id="respo<?php echo $i;?>" value="<?php echo $ion['personne__responsable'];?>"/></td>
							<td><span class="modif<?php echo $i;?>"><?php echo $ion['telephone__personne__de__reference'];?></span><input type="text" class="form-control hidden modifie<?php echo $i;?>" id="tel<?php echo $i;?>" value="<?php echo $ion['telephone__personne__de__reference'];?>"/></td>
							<td><span class="modif<?php echo $i;?>"> <?php echo $la['nom__de__la__classe'];?></span> 
								<select class="form-control hidden section_" id="section_<?php echo $i;?>">
									<option value="<?php echo $ion['section_id'];?>"> Section</option>
									<?php $secti=$bd->query("SELECT * FROM tbl__11section "); while($on=$secti->fetch()){ ?><option value="<?php echo $on['section_id'];?>"><?php echo $on['section'];?></option><?php } ?>
								</select><input type="hidden" id="code_section_<?php echo $i;?>" value="<?php echo $i;?>">
								<select class="form-control hidden option_" id="option_<?php echo $i;?>">
									<option value="<?php echo $ion['option_id'];?>">Selectionner Option</option>
								</select><input type="hidden" id="code_option_<?php echo $i;?>" value="<?php echo $i;?>">
								<select class="form-control hidden classe_" id="classe_<?php echo $i;?>">
									<option value="<?php echo $ion['classe_id'];?>">Selectionner Classe</option>
								</select><input type="hidden" id="code_classe_<?php echo $i;?>" value="<?php echo $i;?>">
							</td>
							<td> <i class="fa fa-edit text-primary fa-fw edit" id="edit<?php echo $i;?>"></i> <i class="fa fa-save text-success fa-fw hidden save" id="save<?php echo $i;?>"></i> <input type="hidden" id="code_edit<?php echo $i;?>" value="<?php echo $i;?>"> <input type="hidden" id="code_save<?php echo $i;?>" value="<?php echo $i;?>"> </td>
						</tr>
					<?php 
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				elimu();
			});
		</script>
		<?php
	}
	if($type == "update_eleve")
	{
		$code_eleve=$_POST['code_eleve']; $nom=$_POST['nom']; $lieu=$_POST['lieu']; $date=$_POST['date']; $genre=$_POST['genre']; $respo=$_POST['respo']; $tel=$_POST['tel']; $section=$_POST['section']; $option=$_POST['option']; $classe=$_POST['classe'];
		$bd->exec("UPDATE tbl__17inscription__des__eleves SET nom__complet = '".$nom."',lieu__de__naissance = '".$lieu."',date__de__naissance = '".$date."',genre = '".$genre."',personne__responsable = '".$respo."',telephone__personne__de__reference = '".$tel."',classe_id = '".$classe."',option_id = '".$option."',section_id = '".$section."' WHERE inscription__des__eleves_id = ".$code_eleve." ");
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>ELIMU APP :</strong> Les Informations de <?php echo $nom; ?> viennent d'être mises a jour ! Merci
				</div>
			</div>
		</div>
	<?php
	}


















	if($type == "configurer_hotel")
	{
		$req=$bd->query("SELECT * FROM hotel WHERE code_hotel=1");
		if($req->rowCount()>0)
		  {
			// Telechargement photo
			if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0) 
			{ 
			// si le fichier n'est pas trop gros        
				if ($_FILES['photo']['size'] <= 1024000){               
					// si l'extension est autorisée                
					$infosfichier = pathinfo($_FILES['photo']['name']);               
					$extension_upload = $infosfichier['extension'];                
					$extensions_autorisees = array('JPG', 'jpg', 'jpeg', 'gif', 'png');               
					if (in_array($extension_upload, $extensions_autorisees))
						{	// valide le fichier et le stocker définitivement
							$logo_path='images/hotel/'.$_POST['nom_hotel'].date('YMDhis').'.'.$extension_upload;
							move_uploaded_file($_FILES['photo']['tmp_name'], '../'.$logo_path); 
						}       
					}
					$bd->exec("DELETE FROM hotel WHERE code_hotel=1");
					$nom_hotel=addslashes($_POST['nom_hotel']); $registre_commerce=addslashes($_POST['registre_commerce']); $id_nationnal=addslashes($_POST['id_nationnal']); $num_impot=addslashes($_POST['num_impot']); $autorisation_fct=addslashes($_POST['autorisation_fct']);$adresse_physique=addslashes($_POST['adresse_physique']); $telephone=addslashes($_POST['telephone']);$mail=addslashes($_POST['mail']); $site=addslashes($_POST['site']); $logo = $logo_path;
					$bd->exec("INSERT INTO hotel VALUE(1,'".$nom_hotel."','".$registre_commerce."','".$id_nationnal."','".$num_impot."','".$autorisation_fct."','".$adresse_physique."','".$telephone."','".$mail."','".$site."','".$logo."')");
					?>
				<div class="col-sm-10 col-sm-offset-1 alertsucces">
					<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
					  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
					  <div class="alert-message">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">
							<i class="zmdi zmdi-close"></i>
						  </span>
						</button>
						<strong> Hotelia !</strong> L' Hotel <?php echo $nom_hotel; ?> a été mis à jour avec succès. Merci
					  </div>
					</div>
				</div>
			<?php
			}
		  }
		  else
		  {
			// Telechargement photo
			if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0) 
			{ 
			// si le fichier n'est pas trop gros        
				if ($_FILES['photo']['size'] <= 1024000){               
					// si l'extension est autorisée                
					$infosfichier = pathinfo($_FILES['photo']['name']);               
					$extension_upload = $infosfichier['extension'];                
					$extensions_autorisees = array('JPG', 'jpg', 'jpeg', 'gif', 'png');               
					if (in_array($extension_upload, $extensions_autorisees))
						{	// valide le fichier et le stocker définitivement
							$logo_path='images/hotel/'.$_POST['nom_hotel'].date('YMDhis').'.'.$extension_upload;
							move_uploaded_file($_FILES['photo']['tmp_name'], '../'.$logo_path);
						}       
					}
					$nom_hotel=addslashes($_POST['nom_hotel']); $registre_commerce=addslashes($_POST['registre_commerce']); $id_nationnal=addslashes($_POST['id_nationnal']); $num_impot=addslashes($_POST['num_impot']); $autorisation_fct=addslashes($_POST['autorisation_fct']);$adresse_physique=addslashes($_POST['adresse_physique']); $telephone=addslashes($_POST['telephone']);$mail=addslashes($_POST['mail']); $site=addslashes($_POST['site']); $logo = $logo_path;
					$bd->exec("INSERT INTO hotel VALUE(1,'".$nom_hotel."','".$registre_commerce."','".$id_nationnal."','".$num_impot."','".$autorisation_fct."','".$adresse_physique."','".$telephone."','".$mail."','".$site."','".$logo."')");
				?>
				<div class="col-sm-10 col-sm-offset-1 alertsucces">
					<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
					  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
					  <div class="alert-message">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">
							<i class="zmdi zmdi-close"></i>
						  </span>
						</button>
						<strong> Hotelia !</strong> L' Hotel <?php echo $nom_hotel; ?> a été enregistré avec succès. Merci
					  </div>
					</div>
				</div>
				<?php  
			}
		  }
		  $qst=$bd->query("SELECT * FROM hotel WHERE code_hotel=1"); $rep=$qst->fetch();
		  ?>
		    <div class="panel-heading hug">
				<div class="panel-tools">
				  <a href="#" class="tools-icon">
					<i class="zmdi zmdi-refresh"></i>
				  </a>
				  <a href="#" class="tools-icon">
					<i class="zmdi zmdi-close"></i>
				  </a>
				</div>
				<h3 class="panel-title"><?php echo $rep['nom_hotel']; ?></h3>
				<div class="panel-subtitle"></div>
			</div>
			<div class="table-responsive hug">
				<table>
					<tr class="form-group">
					  <td colspan=2> <h3 class="form-title form-title-first"> <i class="icon-th-list"></i> <?php echo $rep['nom_hotel']; ?> </h3> </td>
					</tr>
					<tr class="form-group">
					  <td colspan=2>
						<img src="<?php echo $rep['logo']; ?>" style="border-radius:30px; width:150px;" />
					  </td>
					</tr>
					<tr class="form-group">
					  <td> Registre de commerce No </td>
					  <td> <?php echo $rep['registre_commerce']; ?> </td>
					</tr>
					<tr class="form-group">
					  <td> Identification Nationle </td>
					  <td> <?php echo $rep['registre_commerce']; ?> </td>
					</tr>
					<tr class="form-group">
					  <td> Registre de commerce No </td>
					  <td> <?php echo $rep['id_nationnal']; ?> </td>
					</tr>
					<tr class="form-group">
					  <td> Numero Impôt </td>
					  <td> <?php echo $rep['num_impot']; ?> </td>
					</tr>
					<tr class="form-group">
					  <td> Autorisation de Fonctioner </td>
					  <td> <?php echo $rep['autorisation_fct']; ?> </td>
					</tr>
					<tr class="form-group">
					  <td> Adresse Physique </td>
					  <td> <?php echo $rep['adresse_physique']; ?> </td>
					</tr>
					<tr class="form-group">
					  <td> Télephone </td>
					  <td> <?php echo $rep['telephone']; ?> </td>
					</tr>
					<tr class="form-group">
					  <td> Mail </td>
					  <td> <?php echo $rep['mail']; ?> </td>
					</tr>
					<tr class="form-group">
					  <td> Site Web </td>
					  <td> <?php echo $rep['site']; ?> </td>
					</tr>
				</table>
			</div>
		<?php
	}
	
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ tarif +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	else if($type == "new_tarif")
	{
		$description_tarif=addslashes($_POST['description_tarif']); $prix=addslashes($_POST['prix']);$unite=addslashes($_POST['unite']); $etat=addslashes($_POST['etat']); $code_categorie=addslashes($_POST['code_categorie']);
		$act=$bd->query("SELECT * FROM tarif_reserv WHERE description_tarif = '".$description_tarif."' ");
		if($act->rowCount()>0){
		?>
		    <div class="col-sm-10 col-sm-offset-1">
				<div class="alert alert-warning alert-icon-bg alert-dismissable" role="alert">
					<div class="alert-icon">
						<i class="zmdi zmdi-alert-triangle"></i>
					</div>
					<div class="alert-message">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">
								<i class="zmdi zmdi-close"></i>
							</span>
						</button>
						<strong>Hotelia !</strong> Il existe déjà un tarif portant le même nom <?php echo $description_tarif; ?> ! Metez y une spécificité SVP, Information non Enregistrée !
					</div>
				</div>
			</div>
		<?php		
		}
		else
		{
		$bd->exec("INSERT INTO tarif_reserv VALUE(null,'".$description_tarif."',".$prix.",'".$unite."','".$etat."',".$code_categorie.")");
		?>
		    <div class="col-sm-10 col-sm-offset-1">
				<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
				  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
				  <div class="alert-message">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">
						<i class="zmdi zmdi-close"></i>
					  </span>
					</button>
					<strong> Hotelia !</strong> Tarification effectuée avec success. Merci
				  </div>
				</div>
			</div>
		<?php	
		}
		?>
		    <table class="table table-striped table-bordered dataTable" id="table-2">
				<thead>
					<tr>
						<th>N° </th>
						<th>Déscription du tarif</th>
						<th>prix</th>
						<th>unité</th>
						<th>Statut</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$qst=$bd->query("SELECT * FROM tarif_reserv ORDER BY description_tarif"); $i=0;
						while($rep=$qst->fetch())
						{
						$i++;
						?>
							<tr>
								<td> <?php echo $i; ?> </td>
								<td> <?php echo $rep['description_tarif']; ?> </td>
								<td> <?php echo $rep['prix']; ?> </td>
								<td><span class="label label-success"><?php echo $rep['unite']; ?></span></td>
								<td><span class="label label-success"><?php echo $rep['etat']; ?></span></td>
								<td class="text-right"> <i class="zmdi zmdi-edit tarification" id="tarification<?php echo $i;?>"></i> <input type="hidden" id="code_tarification<?php echo $i;?>" value="<?php echo $rep['code_tarif'];?>"></td>
							</tr>
						<?php
						}
					?>
				</tbody>
			</table>
		<script src="js/tables-datatables.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				tarification();
			})
		</script>
		<?php
	}
	// modification tarif
	else if($type == "update_tarif")
	{
		$code_tarif = addslashes($_POST['code_tarif']);
		?>
		    <div class="panel-heading">
				<div class="panel-tools">
					<a href="index.php?men=tarif_heberg&courant=2" class="tools-icon">
						<i class="zmdi zmdi-refresh"></i>
					</a>
					<a href="index.php?men=tarif_heberg&courant=2" class="tools-icon">
						<i class="zmdi zmdi-close"></i>
					</a>
				</div>
				<?php
				$tari=$bd->query("SELECT * FROM tarif_reserv WHERE code_tarif = ".$code_tarif." "); $fe=$tari->fetch(); $description_tarif=$fe['description_tarif']; $prix=$fe['prix']; $unite=$fe['unite']; $etat=$fe['etat']; $code_categorie=$fe['code_categorie']; $code_tarif=$fe['code_tarif'];
				?>
				<h3 class="panel-title hug"><i class="icon-terminal form-title-first"></i> MODIFICATION DU TARIF <i><u><?php echo $description_tarif;?></u></i></h3>
			</div>
			<!--  -->
			<div class="table-responsive" data-dismiss="Panel" aria-hidden="true">
				<form action="#" role="form" method="POST" enctype='multipart/form-data' style="margin:15px" class="hug" id="fmodif_tarif">
					<div class="widget-controls pull-right">
					  <a href="#" class="widget-link-remove"><i class="icon-minus-sign"></i></a>
					  <a href="#" class="widget-link-remove"><i class="icon-remove-sign"></i></a>
					</div>
					<div class="form-group">
						<label>Déscription du tarif </label><input type="hidden" name="code_tarif" value="<?php echo $code_tarif;?>">
						<input type="text" class="form-control" name="description_tarif" autocomplete="off" value="<?php echo $description_tarif;?>" required autofocus />
					</div>
					<div class="form-group">
						<label>Prix (Coût) </label>
						<input type="text" class="form-control" name="prix" autocomplete="off" value="<?php echo $prix;?>" required />
					</div>
					<div class="form-group">
						<label>Unité  </label>
						<input type="text" class="form-control" name="unite" autocomplete="off" value="<?php echo $unite;?>" required />
					</div>
					<div class="form-group">
					  <label>Categorie de la Chambre</label>
					  <select class="form-control" name="code_categorie" autocomplete="off" data-plugin="select2" data-options="{ theme: bootstrap }" required >
						<option value="<?php echo $code_categorie;?>">Categorie Actuelle</option>
						<?php $selec=$bd->query("SELECT * FROM categorie_chambre ORDER BY categorie"); while($fund=$selec->fetch()) 
						{ 
						  echo "<option value=".$fund['code_categorie']."> ".$fund['categorie']." </option>";
						}
						?>
					  </select>
					</div>
					<div class="form-group">
					  <label>Etat [Disponibilité]</label>
					  <select class="form-control" name="etat" autocomplete="off" data-plugin="select2" data-options="{ theme: bootstrap }" required >
						<option value="<?php echo $etat;?>">Statut actuel : <?php echo $etat;?></option>
						<option value="dispo">Dispobible (Peut être directement utilisé)</option>
						<option value="indispo">Indisponible (sera pas visible pour la Réception)</option>
					  </select>
					</div>
					<input type="hidden" name="type" value="modifier_tarification">
					<button type="submit" class="btn btn-primary" name="edit_tarif"> Enregistrer </button>
					<button type="refresh" class="btn btn-default"> Annuler </button>
				</form>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					tarification();
				})
			</script>
			<script src="js/forms-plugins.min.js"></script>
			<script src="js/forms-form-masks.min.js"></script>
		<?php
	}
	// action de modification tarif d'une categorie de chambre
	else if($type == "modifier_tarification")
	{
		$description_tarif=addslashes($_POST['description_tarif']); $prix=addslashes($_POST['prix']);$unite=addslashes($_POST['unite']); $etat=addslashes($_POST['etat']); $code_categorie=$_POST['code_categorie']; $code_tarif=$_POST['code_tarif'];
		$act=$bd->query("SELECT * FROM tarif_reserv WHERE description_tarif = '".$description_tarif."' AND prix = ".$prix." AND unite = '".$unite."' AND etat = '".$etat."' AND code_categorie = ".$code_categorie." AND code_tarif = ".$code_tarif." ");
		if($act->rowCount()>0){  }
		else
		{
		$bd->exec("UPDATE tarif_reserv SET description_tarif = '".$description_tarif."', prix = ".$prix.", unite = '".$unite."', etat = '".$etat."', code_categorie = ".$code_categorie." WHERE code_tarif = ".$code_tarif." ");
		?>
		    <div class="col-sm-10 col-sm-offset-1">
				<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
				  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
				  <div class="alert-message">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">
						<i class="zmdi zmdi-close"></i>
					  </span>
					</button>
					<strong> Hotelia !</strong> Tarification <?php echo $description_tarif;?> modifiée avec success. Merci
				  </div>
				</div>
			</div>
		<?php	
		}
		?>
		    <table class="table table-striped table-bordered dataTable" id="table-2">
				<thead>
					<tr>
						<th>N° </th>
						<th>Déscription du tarif</th>
						<th>prix</th>
						<th>unité</th>
						<th>Statut</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$qst=$bd->query("SELECT * FROM tarif_reserv ORDER BY description_tarif"); $i=0;
						while($rep=$qst->fetch())
						{
						$i++;
						?>
							<tr>
								<td> <?php echo $i; ?> </td>
								<td> <?php echo $rep['description_tarif']; ?> </td>
								<td> <?php echo $rep['prix']; ?> </td>
								<td><span class="label label-success"><?php echo $rep['unite']; ?></span></td>
								<td><span class="label label-success"><?php echo $rep['etat']; ?></span></td>
								<td class="text-right"> <i class="zmdi zmdi-edit tarification" id="tarification<?php echo $i;?>"></i> <input type="hidden" id="code_tarification<?php echo $i;?>" value="<?php echo $rep['code_tarif'];?>"></td>
							</tr>
						<?php
						}
					?>
				</tbody>
			</table>
		<script src="js/tables-datatables.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				tarification();
			})
		</script>
		<?php
	}
	else if($type == "save_reservat")
	{
	  $date_reserv=date('Y-m-d'); $date_arrive=addslashes($_POST['date_arrive']);  $nbre_jr=$_POST['nbre_jr']*1; $nbre_pers=1; $code_chambre=addslashes($_POST['code_chambre']); $statut_reserv=addslashes("reserve"); $code_commission=addslashes($_POST['code_commission']); $reservation=addslashes($_POST['reservation']); $prix=addslashes($_POST['prix']); $code_tarif=addslashes($_POST['code_tarif']); $fait_par=addslashes($_SESSION['username']); $dat=$bd->query("SELECT ('".$date_arrive."' + INTERVAL ".$nbre_jr." DAY ) date_sor "); $te=$dat->fetch(); $date_depart=$te['date_sor']; 
	  if(($date_arrive=="") OR ($date_depart=="") OR ($nbre_jr < 1) OR ($_POST['code_chambre'] =="") OR ($_POST['code_tarif'] =="") OR ($nbre_jr < 1) OR ($prix < 1))
	  {
		?>
		  <script type="text/javascript">
			$(".alertno").removeClass("hidden"); $(".alertsucces").addClass("hidden"); $(".alertrr").addClass("hidden");
		  </script>
		<?php  
	  }
	  else
	  {
	  $test=$bd->query("SELECT * FROM reservation WHERE date_arrive >=  '".$_POST['date_arrive']."' AND date_depart <= '".$_POST['date_depart']."' AND code_chambre = '".$_POST['code_chambre']."'");
		if($test->rowCount()<1)
		{
			$bd->exec("INSERT INTO reservation VALUE(NULL,'".$date_reserv."','".$date_arrive."',".$nbre_jr.",'".$date_depart."',".$nbre_pers.",".$code_chambre.",'".$statut_reserv."',".$code_commission.",'".$reservation."',".$code_tarif.",".$prix.",'".$fait_par."')");
			?>
			  <script type="text/javascript">
				$(".alertsucces").removeClass("hidden"); $(".alertrr").addClass("hidden"); $(".alertno").addClass("hidden"); $(".formul")[0].reset();
			  </script>
			<?php     
		}
		else
		{
			?>
			  <script type="text/javascript">
				$(".alertrr").removeClass("hidden"); $(".alertsucces").addClass("hidden"); $(".alertno").addClass("hidden");
			  </script>
			<?php  
		}
	  }
	  ?>
		<table class="table table-striped table-bordered dataTable" id="table-1">
		  <thead>
			<tr>
			  <th></th>
			  <th>Chambre</th>
			  <th>Du au Au</th>
			  <th>Statut</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php $i=0;
			$qst=$bd->query("SELECT * FROM (reservation R NATURAL JOIN chambre) LEFT JOIN commissionnaire C ON R.code_commission = C.code_commission WHERE statut_reserv='reserve' ORDER BY code_reserv Desc"); 
			while($rep=$qst->fetch())
			{
			$i++;
			?>
			<tr>
			  <td> <?php echo $i;?> </td>
			  <td> <?php echo $rep['nom_chambre']; ?> </td>
			  <td> <?php echo $rep['date_arrive']." - ".$rep['date_depart']; ?> </td>
			  <td><span class="label label-warning"><?php echo strtoupper($rep['statut_reserv']); ?></span></td>
			  <td class="text-right"><a data-toggle="modal" href="#" data-target="#RESR<?php echo $rep['code_reserv']; ?>" class="btn btn-primary btn-xs"><i class="zmdi zmdi-edit"></i></a></td>
			</tr>
			<?php
			}
			?>
		  </tbody>
		</table>
		<script src="js/tables-datatables.min.js"></script>
	  <?php
	}
	else if($type == "save_client")
	{ 
		$nom_complet=addslashes($_POST['nom_complet']); $piece_id=addslashes($_POST['piece_id']); $numero_id=addslashes($_POST['numero_id']); $lieu_naiss=addslashes($_POST['lieu_naiss']); $date_naiss=addslashes($_POST['date_naiss']); $nationalite=addslashes($_POST['nationalite']); $profession=addslashes($_POST['profession']); $provenance=addslashes($_POST['provenance']); $telephone=addslashes($_POST['telephone']); $mail=addslashes($_POST['mail']);
		if(($nom_complet=="") OR ($piece_id=="") OR ($numero_id == ""))
		{
		?>
		  <script type="text/javascript">
			$(".clno").removeClass("hidden"); $(".clsucces").addClass("hidden"); $(".clrr").addClass("hidden");
		  </script>
		<?php  
		}
		else
		{
		  $test=$bd->query("SELECT * FROM client WHERE nom_complet =  '".$_POST['nom_complet']."' AND numero_id = '".$_POST['numero_id']."' OR numero_id = '".$_POST['numero_id']."' ");
			if($test->rowCount()<1)
			{
				$pic = $data['file']["photo"];
				//$bree = (array)($pic);
		
				// Telechargement photo
				if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0) 
				{ 
				// si le fichier n'est pas trop gros        
					if ($_FILES['photo']['size'] <= 2621440){               
						// si l'extension est autorisée                
						$infosfichier = pathinfo($_FILES['photo']['name']);               
						$extension_upload = $infosfichier['extension'];                
						$extensions_autorisees = array('JPG', 'jpg', 'jpeg', 'gif', 'png');               
						if (in_array($extension_upload, $extensions_autorisees))
							{	// valide le fichier et le stocker définitivement                       
							move_uploaded_file($_FILES['photo']['tmp_name'], '../images/client/' .$_POST['nom_complet']. date('YMDhis').'.'.$extension_upload); 
							}
						  $photo = 'images/client/' .$_POST['nom_complet']. date('YMDhis').'.'.$extension_upload;
						}
						else
						{
							$photo = 'images/client/user.png';
						}
				}
				// Telechargement Carte piece 
				$msg="";
				if (isset($_FILES['id_scan']) AND $_FILES['id_scan']['error'] == 0) 
				  {	// si le fichier n'est pas trop gros > 25Mo      
					if ($_FILES['id_scan']['size'] <=2621440){
					  // par defo
					  // $extension_upload='';
					  // si l'extension est autorisée
					  $infosfichier = pathinfo($_FILES['id_scan']['name']); $saa=date('Y-m-d_h-i-s'); $nom=$_POST['nom_complet'];       
					  // $extension_upload = $infosfichier['extension'];
					  $extension_upload = strtolower(substr(strrchr($_FILES['id_scan']['name'], '.') ,1) );			  
					  $extensions_autorisees = array('JPG', 'jpg', 'jpeg', 'gif', 'png', 'doc', 'docx', 'xlsx', 'xls', 'csv', 'pdf');               
					  if (in_array($extension_upload, $extensions_autorisees))
						{	// valide le fichier et le stocker définitivement
						  $fichier=addslashes("images/piece_id/$nom$saa.$extension_upload");
						  move_uploaded_file($_FILES['id_scan']['tmp_name'], "../".$fichier);  
						}
					$id_scan=$fichier;
					}
					else 
					{
					  $id_scan="";
					  $msg=$msg." <i style='color:red'>fichier trop tres gros > 25 Mo. ERREUR</i>";
					}
				  }
				  else 
				  {
					if(UPLOAD_ERR_PARTIAL){$id_scan=""; $msg=$msg."<i style='color:red'> Non Terminé. ERREUR</i>";} else if(UPLOAD_ERR_NO_FILE){$id_scan=""; $msg=$msg."<i style='color:red'> Pas de Fichier. ERREUR</i>";}
				  } 
				$bd->exec("INSERT INTO client VALUE(NULL,'".$nom_complet."','".$piece_id."','".$numero_id."','".$lieu_naiss."','".$date_naiss."','".$nationalite."','".$profession."','".$provenance."','".$telephone."','".$mail."','".$photo."','".$id_scan."','normal',0)");
				?>
				  <script type="text/javascript">
					$(".clsucces").removeClass("hidden"); $(".clno").addClass("hidden"); $(".clrr").addClass("hidden"); $("#nvx_client").addClass("hidden");
				  </script>
				<?php 
			}
			else
			{
			?>
			  <script type="text/javascript">
				$(".clrr").removeClass("hidden"); $(".clno").addClass("hidden"); $(".clsucces").addClass("hidden");
			  </script>
			<?php 	
			}
		}
	  ?>
		<div>
		  <label>Sélectionnez un Client</label>
		  <select name="code_client1" id="code_client1" class="form-control hug" data-plugin="select2" data-options="{ theme: bootstrap }">
			<option value="0">Sélectionnez un client</option>
			<?php $qoi=$bd->query("SELECT * FROM client ORDER BY nom_complet"); while($ok=$qoi->fetch()){ ?>
			<option value="<?php echo $ok['code_client']; ?>"><?php echo stripslashes($ok['nom_complet']." | Piece ID : ".$ok['numero_id']." Nationalité :".$ok['nationalite']." | ".$ok['profession']); ?></option>  <?php } ?>
		  </select>
		</div>
		<script src="js/tables-datatables.min.js"></script>
		<script src="js/forms-plugins.min.js"></script>
		<script src="js/forms-form-masks.min.js"></script>
	  <?php
	  }
	else if($type == "save_new_checkin")
	{
		$code_reserv=addslashes($_POST['code_reserv']*1); $code_chambre=addslashes($_POST['code_chambre']*1); $clientel=addslashes($_POST['clientel']*1); 
		if(($code_chambre < 1) OR ($clientel < 1))
		{
		?>
		<div class="col-sm-10 col-sm-offset-1 alertno">
			<div class="alert alert-danger alert-icon-bg alert-dismissable" role="alert">
			  <div class="alert-icon">
				<i class="zmdi zmdi-close-circle-o"></i>
			  </div>
			  <div class="alert-message">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">
					<i class="zmdi zmdi-close"></i>
				  </span>
				</button>
				<strong>Hotelia !</strong> Probleme des données ! Les rubriques RESERVATION, CLIENT, CHAMBRE doivent être completées ! Remplissez la fiche de check-in SVP
			  </div>
			</div>
		</div>
		<?php  
		}
		else
		{
		  $test=$bd->query("SELECT * FROM checkin WHERE date_checkin BETWEEN '".$_POST['date_arrive']."' AND '".$_POST['date_depart']."' AND code_chambre = ".$_POST['code_chambre']." OR date_checkout BETWEEN '".$_POST['date_arrive']."' AND '".$_POST['date_depart']."' AND code_chambre = ".$_POST['code_chambre']." OR date_checkin <= '".$_POST['date_arrive']."' AND date_checkout >= '".$_POST['date_depart']."' AND code_chambre = ".$_POST['code_chambre']."");
		  if($test->rowCount()<1)
		  {
			$date_encode=date('Y-m-d'); $date_checkin=addslashes($_POST['date_arrive']); $nbre_jr=$_POST['nbre_jr']; $code_chambre=$_POST['code_chambre']; $statut_reserv=strtoupper(addslashes("confirme")); $prix_unit=$_POST['prix_unit']; $prix_total=$_POST['prix_total']; $observation=addslashes(htmlspecialchars($_POST['observation'])); $confirmation_checkout=addslashes("attente"); $code_tarif=addslashes($_POST['code_tarif']); $fait_par=addslashes($_SESSION['username']); $dat=$bd->query("SELECT ('".$date_checkin."' + INTERVAL ".$nbre_jr." DAY ) date_sor "); $te=$dat->fetch(); $code_reserv=$_POST['code_reserv']; $date_checkout=$te['date_sor']; 
			try{
			$gener=$bd->query("SHOW TABLE STATUS LIKE 'checkin'"); $rate=$gener->fetch(); $code_checkin=$rate['Auto_increment'];
			$bd->exec("INSERT INTO checkin VALUE(NULL,'".$date_checkin."',".$code_chambre.",".$code_tarif.",".$nbre_jr.",".$prix_unit.",".$prix_total.",'".$date_checkout."','".$confirmation_checkout."','".$observation."',".$code_reserv.",'".$date_encode."','".$fait_par."')") or die("Profession ".$date_checkin."',".$code_chambre.",".$code_tarif.",".$nbre_jr.",".$prix_unit.",".$prix_total.",'".$date_checkout."','".$confirmation_checkout."','".$observation."',".$code_reserv.",'".$date_encode."','".$fait_par);
			$loca=$bd->query("SELECT * FROM location WHERE code_reserv = ".$code_reserv." AND code_checkin = 0"); while($tion=$loca->fetch()){ $code_location=$tion['code_location'];
				$bd->exec("UPDATE location SET code_checkin = ".$code_checkin." WHERE code_checkin = 0 AND code_location = ".$code_location." ");
			}
			$bd->exec("UPDATE reservation SET statut_reserv = '".$statut_reserv."' WHERE code_reserv = ".$code_reserv." ");
			  ?>
				<div class="col-sm-10 col-sm-offset-1 alertsucces">
					<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
					  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
					  <div class="alert-message">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">
							<i class="zmdi zmdi-close"></i>
						  </span>
						</button>
						<strong> Hotelia !</strong> Le Check-in vient d'être pris en charge et enregistré avec succès. Merci
					  </div>
					</div>
				</div>
			  <?php 
			}
			catch(Exception $e)
			{
			die('Erreur : '.$e->getMessage());
			}    
		  }
		  else
		  {
		  ?>
			<div class="col-sm-10 col-sm-offset-1 alertrr">
				<div class="alert alert-warning alert-icon-bg alert-dismissable" role="alert">
				  <div class="alert-icon">
					<i class="zmdi zmdi-alert-triangle"></i>
				  </div>
				  <div class="alert-message">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">
						<i class="zmdi zmdi-close"></i>
					  </span>
					</button>
					<strong>Hotelia !</strong> Cette Chambre n'est pas disponible pour la periode demandée ! Changez la chambre ou verifiez la la periode !
				  </div>
				</div>
			</div>
		  <?php
		  }	
		}
	  }
	else if($type == "rooms_disponible")
	{
	  $date_arrive=$_POST['date_arrive']; $nbre_jr=($_POST['nbre_jr']*1); $dat=$bd->query("SELECT ('".$date_arrive."' + INTERVAL ".$nbre_jr." DAY ) date_sor "); $te=$dat->fetch(); $date_depart=$te['date_sor'];
	  ?>
		  <input type="hidden" id="toka" value="<?php echo $date_depart;?>">
		  <div class="form-group form-group-lg col-md-4">
			<select class="form-control" name="code_chambre" id="code_chambre" onchange="rooms_price()"  data-plugin="select2" data-options="{ theme: bootstrap }" style="width:100%" required>
				<option value="0">Selection de la chambre</option>  <?php  $group=$bd->query("SELECT * FROM categorie_chambre ORDER BY categorie"); while($pe=$group->fetch()){ echo "<optgroup label='".$pe['categorie']."'>";
				  $qoi=$bd->query("SELECT * FROM chambre WHERE statut = 'en service' AND code_categorie = ".$pe['code_categorie']." ORDER BY code_chambre"); while($ok=$qoi->fetch()){  $code_chambre = $ok['code_chambre']; 
				  $test=$bd->query("SELECT * FROM reservation WHERE date_arrive BETWEEN '".$date_arrive."' AND '".$date_depart."' AND code_chambre = ".$code_chambre." OR date_depart BETWEEN '".$date_arrive."' AND '".$date_depart."' AND code_chambre = ".$code_chambre." OR date_arrive <= '".$date_arrive."' AND date_depart >= '".$date_depart."' AND code_chambre = ".$code_chambre.""); if($test->rowCount()<1) {?>
				  <option value="<?php echo $ok['code_chambre']; ?>"><?php echo stripslashes($ok['nom_chambre']."| ".$ok['localisation']); ?></option>  <?php 
				  } 
				}
				echo "</optgroup>";
			  }
			  ?>
			</select>
			<label class="floating-label">Les chambres Disponibles du <?php echo $date_arrive." au ".$date_depart;?></label>
		  </div>
		  <div class="form-group form-group-lg col-md-4" id="tarif">
			<select name="code_tarif" id="code_tarif" class="form-control" onchange="rooms_nuite()" data-plugin="select2" data-options="{ theme: bootstrap }" required >
			  <option value="0">Tarif prix nuitée </option>
				<?php $qoi=$bd->query("SELECT * FROM tarif_reserv ORDER BY code_tarif"); while($ok=$qoi->fetch()){ ?>
			  <option value="<?php echo $ok['code_tarif']; ?>"><?php echo stripslashes($ok['description_tarif']." | ".$ok['prix']." | ".$ok['unite']); ?></option>  <?php } ?>
			</select>
			<label class="floating-label">Tarif des chambres</label>
		  </div>
		  <div class="form-group form-group-lg col-md-4" id="price">
			<input type="text" class="form-control" name="prix_unit" id="prix_unit" value="0" readonly="true"/>
		  <input type="hidden" name="prix_total" id="prix_total" value="0"/>
			<label class="floating-label">Prix d'une nuitée</label>
		  </div>
		<script type="text/javascript">
			$(document).ready(function(){
				ddepart = $("#toka").val(); 
				$("#date_depart").val(ddepart);
			});	
		</script>
		<script src="js/forms-material-form.min.js"></script>
	  <?php 
	  }
	else if($type == "rooms_tarif")
	{
	  $code_chambre=$_POST['code_chambre']; $tar=$bd->query("SELECT code_categorie FROM chambre WHERE code_chambre = ".$code_chambre.""); $if=$tar->fetch(); $code_categorie=$if['code_categorie'];
	  ?>
		<select name="code_tarif" id="code_tarif" class="form-control" onchange="rooms_nuite();" data-plugin="select2" data-options="{ theme: bootstrap }" required >
		  <option value="0">Tarif prix nuitée </option>
			<?php $qoi=$bd->query("SELECT * FROM tarif_reserv WHERE code_categorie = ".$code_categorie." ORDER BY code_tarif"); while($ok=$qoi->fetch()){ ?>
		  <option value="<?php echo $ok['code_tarif']; ?>"><?php echo stripslashes($ok['description_tarif']." | ".$ok['prix']." | ".$ok['unite']); ?></option>  <?php } ?>
		</select>
		<label class="floating-label">Prix d'une nuitée</label>
		<script src="js/forms-material-form.min.js"></script>
	  <?php 
	  }
	else if($type == "rooms_nuite")
	{
	  $code_tarif=$_POST['code_tarif']; $pu=$bd->query("SELECT prix FROM tarif_reserv WHERE code_tarif = ".$code_tarif." "); $int=$pu->fetch(); $prix_u=$int['prix'];
	  ?>
		  <input type="text" class="form-control" name="prix_unit" id="prix_unit" value="<?php echo $prix_u; ?>" readonly="true"/>
		  <input type="hidden" name="prix_total" id="prix_total" value="<?php echo $prix_u; ?>"/>
		  <label class="floating-label">Prix d'une nuitée</label>
		  <script type="text/javascript">
			$(document).ready(function(){
				pt = $("#prix_unit").val() * $("#nbre_jr").val(); 
				$("#prix_total").val(pt);
			});	
		  </script>
		 <script src="js/forms-material-form.min.js"></script>
	  <?php 
	  }
	else if($type == "checkin_client")
	{
	  $nbre_client=$_POST['nbre_client'];
	  for($x=1;$x<=$nbre_client;$x++){
		$code_client=$_POST['code_client'.$x];
		if($code_client > 0)
		{
		$test=$bd->query("SELECT * FROM location WHERE code_reserv = 0 AND code_checkin = 0 AND code_client = ".$code_client." "); if($test->rowCount()<1){
			$bd->exec("INSERT INTO location VALUE(NULL,0,0,".$code_client.")");	
		  }
		  else
		  {
			?>
			<div>
				  <label style="color:#d20000"> Le clien N° <?php echo $x;?> déjà affecté </label>
			</div>
			<?php 
		  }
		}
		else
		{
		  ?>
			<div>
			  <label style="color:#d20000"> Selectionner le clien N° <?php echo $x;?> SVP</label>
			</div>
		  <?php
		}
	  }
	 }
	else if($type == "check_checkin")
	{
		  $cli=$bd->query("SELECT * FROM location NATURAL JOIN client WHERE code_reserv = 0 AND code_checkin = 0"); $n=$cli->rowCount(); echo "<input type='hidden' id='clientel' value=".$n."> <input type='hidden' id='types' value='delete_check'>";  if($cli->rowCount()>0) { while($ent=$cli->fetch())
			{ $nom_complet=$ent['nom_complet']; $telephone=$ent['telephone']; $code_checkin=$ent['code_checkin']; $code_location=$ent['code_location']; $picture=$ent['photo'];
			?>
			<script>
				vuta();
			</script>
				<div class="p-about col-sm-3 pa-avatar">
						<div class="pa-padding" style="padding:1px">
							<div class="pa-avatar">
								<img src="<?php echo $picture;?>" alt="Pas de Photo" width="60" height="60">
							</div>
							<div class="pa-name"><?php echo $nom_complet; ?>
								<?php if($code_checkin == 0){ ?> <i id="loc<?php echo $code_location;?>" class="zmdi zmdi-minus-circle text-danger m-l-5 loc"></i> <?php } else{ ?> <i class="zmdi zmdi-check-circle text-success m-l-5"></i> <?php } ?> <input type='hidden' id='code_loc<?php echo $code_location;?>' value='<?php echo $code_location; ?>'>
							</div>
							<div class="pa-text"><?php echo $telephone; ?></div>
						</div>
				</div>
			<?php
			}
		  }
		  else{ echo "<div class='form-group col-md-5'> Client Pas encore choisi </div> <input type='hidden' id='clientel' value=0>";}
	}
	else if($type == "delete_check_reserv" OR $type == "delete_check")
	{
		$code_location = $_POST['code_location']*1;
		$bd->exec("DELETE FROM location WHERE code_location=".$code_location." AND code_checkin=0");
	} 

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ FIN HEBERGEMENT +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ GESTION PETIT DEPOT +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	else if($type == "save_commande_dde_stock")
	{
		$par=$_SESSION['username']; $date_redaction=date('Y-m-d'); $statut_cmd="attente"; $code_bon= $_POST['code_bon']; $code_guichet= $_POST['code_guichet'];
		$cmd=$bd->query("SELECT * FROM (cmd NATURAL JOIN depot_boisson) NATURAL JOIN doz_bar WHERE code_guichet = ".$code_guichet." ");
		if($cmd->rowCount()>0){ 
		$bd->exec("INSERT INTO bon_cmd VALUES('".$code_bon."','".$date_redaction."','".$statut_cmd."',".$code_guichet.",'".$par."')")or die("Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
			while($ela=$cmd->fetch())
			{
				$qte_cmd=addslashes($ela['qte_cmd']); $prix_unit=$ela['prix_unit']; $date_peremption=$ela['date_peremption']; $code_stock=$ela['code_stock']; $code_doz=$ela['code_doz']; 
				$bd->exec("INSERT INTO cmd_stock VALUE(NULL,".$code_doz.",".$qte_cmd.",".$code_stock.",".$code_guichet.",'".$code_bon."')") or die("Quantité ".$qte_boisson."', Prix unitaire ".$prix_unit.", Prix Total ".$prix_total.", pour le produit N°: ".$code_doz." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
			}
			// Not
			$notif=$bd->query("SELECT * FROM utilisateur WHERE type_user = 'gestock' "); while($tion=$notif->fetch())
			{
				$concerne= addslashes($_SESSION['nom_complet']." Vient de faire une commande. Il attend une livraison de votre part. <a href='index.php?men=dde_stock&courant=10&bc=".$code_bon."'>Voir le bon de cmd</a>");
				$bd->exec("INSERT INTO notification VALUE(null,'".$par."','".$concerne."','".date('Y-m-d H:i:s')."','".$tion['username']."','gestock')");  
			}
			$bd->query("DELETE FROM cmd WHERE code_guichet = ".$code_guichet." ");  
			?>
				<div class="col-sm-10 col-sm-offset-1">
					<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
					  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
						<div class="alert-message">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">
									<i class="zmdi zmdi-close"></i>
								</span>
							</button>
							<strong> Hotelia !</strong> La commande est envoyée au Gestionnaire de Stock pour une livraison. Bon N°  <?php echo $code_bon; ?>
						</div>
					</div>
				</div>
			<?php	
		}
	}
	// suppression d'une ligne de la commande 
	else if($type == "delete_row_cmd")
	{
		$code_cmd=$_POST['code_cmd'];
		$bd->exec("DELETE FROM cmd WHERE code_cmd = ".$code_cmd." ") or die(" Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
	}
	// Actualisation d'une ligne de la commande modal
	else if($type == "reload_cmd_modal")
	{
		$code_guichet=$_POST['code_guichet'];
		$pas=$bd->query("SELECT * FROM cmd NATURAL JOIN doz_bar WHERE code_guichet = ".$code_guichet." "); while($niers=$pas->fetch()){
		?>
			<div id="sup<?php echo $niers['code_cmd'];?>" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog" style="width:25%">
					<div class="modal-content bg-danger">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">
									<i class="zmdi zmdi-close"></i>
								</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="text-center">
								<div>
									<i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
								</div>
								<h3><?php echo $niers['boisson'];?></h3>
								<p>Voulez-vous vraiment Supprimer <strong><u><?php echo $niers['qte_cmd']." ".$niers['unite']." de ".$niers['boisson'];?></u></strong> de cette commande ?</p> <input type="hidden" id="code_line_cmd<?php echo $niers['code_cmd'];?>" value="<?php echo $niers['code_cmd'];?>">
								<div class="m-y-30">
									<button type="button" data-dismiss="modal" class="btn btn-default line_cmd" id="line_cmd<?php echo $niers['code_cmd'];?>">Supprimer</button>
									<button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } 
	}
	// Modification d'une ligne de la commande 
	else if($type == "edit_row_cmd")
	{
		$code_cmd=$_POST['code_cmd']; $qte_cmd=$_POST['qte_cmd']*1;
		$bd->exec("UPDATE cmd SET qte_cmd = ".$qte_cmd." WHERE code_cmd = ".$code_cmd." ") or die(" Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
	}
	// Annulation de la commande
	else if($type == "annuler_toute_cmd")
	{
		$code_guichet = $_POST['code_guichet'];
		$bd->query("DELETE FROM cmd WHERE code_guichet = ".$code_guichet." ");  
		?>
			<div class="col-sm-10 col-sm-offset-1">
				<div class="alert alert-danger alert-icon-bg alert-dismissable" role="alert">
					<div class="alert-icon">
						<i class="zmdi zmdi-close-circle-o"></i>
					</div>
					<div class="alert-message">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">
								<i class="zmdi zmdi-close"></i>
							</span>
						</button>
						<strong>Hotelia !</strong> La commande vient d'être Annuler ! Merci de reprendre le chargement au besoin ...
					</div>
				</div>
			</div>
		<?php
	}
	/* VALIDATION DE LA CMD et Sortie du stock
	Modification d'une ligne de la commande */
	else if($type == "edit_row_cmd_already_sent")
	{
		$code_cmd=$_POST['code_cmd']; $qte_cmd=$_POST['qte_cmd']*1;
		$bd->exec("UPDATE cmd_stock SET qte_cmd = ".$qte_cmd." WHERE code_cmd = ".$code_cmd." ") or die(" Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
	}
	// suppression d'une ligne de la commande deja envoyé 
	else if($type == "delete_row_cmd_already_sent")
	{
		$code_cmd=$_POST['code_cmd'];
		$bd->exec("DELETE FROM cmd_stock WHERE code_cmd = ".$code_cmd." ") or die(" Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
	} 
	else if($type == "validate_delivery_stock")
	{
		$code_bon=$_POST['code_bon']; $statut_cmd=addslashes("livraison");
		$tst=$bd->query("SELECT * FROM bon_cmd WHERE statut_cmd = 'attente' AND code_bon = '".$code_bon."' OR statut_cmd = 'reattente' AND code_bon = '".$code_bon."' "); if($tst->rowCount()>0){ 
			$bd->exec("UPDATE bon_cmd SET statut_cmd = '".$statut_cmd."' WHERE code_bon = '".$code_bon."'") or die(" pour le Bon N°: ".$code_bon." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
			// Not
			while($tion=$tst->fetch())
			{
				$concerne= addslashes($_SESSION['nom_complet']." Vient de confirmer la livraison face à votre commande. Le stock est donc en train de venir. <a href='index.php?men=dde_stock&courant=10&bcl=".$code_bon."'>Voir le bon de commande</a>");
				$bd->exec("INSERT INTO notification VALUE(null,'".$_SESSION['username']."','".$concerne."','".date('Y-m-d H:i:s')."','".$tion['fait_par']."','gestock')");  
			}
		}
	} 
	
	/* CONFIRMTION DE LA RECEPTION et Reception du stock
	Confirmation de la reception*/
	else if($type == "confirm_reception_stock")
	{
		$code_bon=$_POST['code_bon']; $statut_cmd=addslashes("recu"); $date_entre=date('Y-m-d');
		$tst=$bd->query("SELECT * FROM bon_cmd WHERE statut_cmd = 'livraison' AND code_bon = '".$code_bon."' "); if($tst->rowCount()>0){ $g=$tst->fetch(); $guichet=$g['code_guichet'];
			$bd->exec("UPDATE bon_cmd SET statut_cmd = '".$statut_cmd."' WHERE code_bon = '".$code_bon."'") or die("Pour le Bon N°: ".$code_bon." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
			$ope=$bd->query("SELECT * FROM cmd_stock NATURAL JOIN depot_boisson WHERE code_bon = '".$code_bon."'"); while($ration=$ope->fetch()){ $code_depot=$ration['code_stock']; $prix_unit=$ration['prix_unit']; $date_peremption=$ration['date_peremption']; $qte_cmd=$ration['qte_cmd']; $code_doz=$ration['code_doz'];
			  $test=$bd->query("SELECT * FROM stock_guichet WHERE prix_unit = ".$prix_unit." AND date_peremption = '".$date_peremption."' AND code_guichet = ".$guichet." "); if($test->rowCount() > 0){ $ok=$test->fetch(); $code_stock=$ok['code_stock'];
			  $bd->exec("UPDATE stock_guichet SET qte_dispo = qte_dispo + ".$qte_cmd." WHERE code_stock = ".$code_stock." AND code_guichet = ".$guichet." ");
			  $bd->exec("UPDATE depot_boisson SET qte_dispo = qte_dispo - ".$qte_cmd." WHERE code_stock = ".$code_depot." ");
			  }
			  else
			  {
				$bd->exec("INSERT INTO stock_guichet VALUES(NULL,'".$date_entre."',".$qte_cmd.",".$prix_unit.",'".$date_peremption."',".$code_doz.",".$guichet.") ");
				$bd->exec("UPDATE depot_boisson SET qte_dispo = qte_dispo - ".$qte_cmd." WHERE code_stock = ".$code_depot." ");
			  }
			}
			// Not
			  $concerne = addslashes("Hotelia ! Vous vennez de réceptionner un Stock du bon <a href='index.php?men=dde_stock&courant=10&bcl=".$code_bon."'> N° ".$code_bon.". </a>");
			  $bd->exec("INSERT INTO notification VALUES(null,'".$_SESSION['username']."','".$concerne."','".date('Y-m-d H:i:s')."','".$g['fait_par']."','gestock')");
		}
	}
	/* Refuser le stocks */
	else if($type == "refuser_le_stock")
	{
		$code_bon=$_POST['code_bon']; $statut_cmd=addslashes("attente"); $motif=addslashes($_POST['motif']); $date_entre=date('Y-m-d'); $par = $_SESSION['username'];
		$tst=$bd->query("SELECT * FROM bon_cmd WHERE statut_cmd = 'livraison' AND code_bon = '".$code_bon."' "); if($tst->rowCount()>0){ $g=$tst->fetch(); $guichet=$g['code_guichet'];
			$bd->exec("UPDATE bon_cmd SET statut_cmd = '".$statut_cmd."' WHERE code_bon = '".$code_bon."'") or die("Pour le Bon N°: ".$code_bon." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
			// Not
			$notif=$bd->query("SELECT * FROM utilisateur WHERE type_user = 'gestock' "); while($tion=$notif->fetch())
			{
				$concerne= addslashes($_SESSION['nom_complet']." Vient de renvoyer un stock qui lui a été livré. Le motif est <i>$motif</i>. Merci de revoir ça. <a href='index.php?men=dde_stock&courant=10&bc=".$code_bon."'>Voir le bon de cmd</a>");
				$bd->exec("INSERT INTO notification VALUE(null,'".$par."','".$concerne."','".date('Y-m-d H:i:s')."','".$tion['username']."','gestock')");  
			}
		}
	}

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ ACHAT & RECEPTION +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	else if($type == "update_row_achat")
	{
		$code_achat=$_POST['code_achat']; $prix_unit=$_POST['prix_achat']; $qte_article=$_POST['qte_achat']; $prix_total = $_POST['prix_total'];
		$test=$bd->query("SELECT * FROM achat_elabor WHERE qte_article = ".$qte_article." AND prix_unit = ".$prix_unit." AND prix_total = ".$prix_total." AND code_achat = ".$code_achat." "); if($test->rowCount()<1){
			$bd->exec("UPDATE achat_elabor SET qte_article = ".$qte_article." , prix_unit = ".$prix_unit.", prix_total = ".$prix_total." WHERE code_achat = ".$code_achat." ") or die("Quantité ".$qte_article.", Prix unitaire ".$prix_unit.", Prix Total ".$prix_total.", pour la Commande N°: ".$code_bon." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
		}
		$tot=$bd->query("SELECT SUM(prix_total) pt FROM achat_elabor NATURAL JOIN article WHERE username = '".$_SESSION['username']."'"); $t=$tot->fetch(); echo $t['pt'];echo "<script>$('#montant_total').val(".$t['pt'].");</script>";
	}
	else if($type == "delete_row_achat")
	{
		$code_achat=$_POST['code_achat']; 
		$bd->exec("DELETE FROM achat_elabor WHERE code_achat = ".$code_achat." ") or die("Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommenooooocer</a>");
		$tot=$bd->query("SELECT SUM(prix_total)pt FROM achat_elabor NATURAL JOIN article WHERE username = '".$_SESSION['username']."'");$t=$tot->fetch(); echo $t['pt'];echo "<script>window.stopfonction = true; $('#montant_total').val(".$t['pt'].");</script>";
	}
	else if($type == "save_etat_besoin")
	{	
		$par=$_SESSION['username']; $date_redaction=date('Y-m-d'); $montant_total=$_POST['montant_total']; $statut_achat="attente"; $observation=""; $bon=$bd->query("SELECT (count(code_bon)+1) code_bonow FROM bon_achat WHERE date_redaction = '".$date_redaction."'"); $ach=$bon->fetch(); $code_bon= "B-A-P".date('dmY-his-').$ach['code_bonow'];
		$achat=$bd->query("SELECT * FROM achat_elabor NATURAL JOIN article WHERE username = '".$_SESSION['username']."' ");
		
		if($achat->rowCount()>0){ $bd->exec("INSERT INTO bon_achat VALUES('".$code_bon."','".$date_redaction."','".$statut_achat."',".$montant_total.",'".$observation."','".$par."')"); }
		while($ela=$achat->fetch())
		{
			$qte_article=addslashes($ela['qte_article']); $prix_unit=$ela['prix_unit']; $prix_total=$ela['prix_total']; $code_article=$ela['code_article']; 
			try{
				$bd->exec("INSERT INTO achat VALUE(NULL,".$qte_article.",".$prix_unit.",".$prix_total.",".$code_article.",'".$code_bon."')") or die("Quantité ".$qte_article."', Prix unitaire ".$prix_unit.", Prix Total ".$prix_total.", pour le produit N°: ".$code_article." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
			}
				catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			} 
		}
		// Not
		$notif=$bd->query("SELECT * FROM utilisateur WHERE type_user = 'admin' "); while($tion=$notif->fetch())
		{
			$concerne= addslashes($_SESSION['nom_complet']." Vient de faire un état de besoin pour l'Achat des produits en stock. Il attend une confirmation de votre part. <a href='index.php?men=achat_resto&courant=7&ba=".$code_bon."'>Voir le bon de cmd</a>");
			$bd->exec("INSERT INTO notification VALUE(null,'".$par."','".$concerne."','".date('Y-m-d H:i:s')."','".$tion['username']."','gestock')");  
		}
		$bd->query("DELETE FROM achat_elabor WHERE username = '".$par."'");
		?>
			<div class="panel-body dvt">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
					  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
						<div class="alert-message">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">
									<i class="zmdi zmdi-close"></i>
								</span>
							</button>
							<strong> Hotelia !</strong>  Etat de besoin soumis au Gerant pour approbation et autorisation de sortie des liquidité. Bon N°  <?php echo $code_bon; ?>
						</div>
					</div>
				</div>
			</div>
		<?php	
	}
	// modifier l'achat deja envoyé qvqnt de la valider
	else if($type == "update_row_achat_valid")
	{
		$code_achat=$_POST['code_achat']; $code_bon=$_POST['code_bon']; $prix_unit=$_POST['prix_achat']; $qte_article=$_POST['qte_achat']; $prix_total = $_POST['prix_total'];  
		$test=$bd->query("SELECT * FROM achat WHERE qte_article = ".$qte_article." AND prix_unit = ".$prix_unit." AND prix_total = ".$prix_total." AND code_achat = ".$code_achat." "); if($test->rowCount()<1){
			$bd->exec("UPDATE achat SET qte_article = ".$qte_article." , prix_unit = ".$prix_unit.", prix_total = ".$prix_total." WHERE code_achat = ".$code_achat." AND code_bon = '".$code_bon."'") or die("Quantité ".$qte_article.", Prix unitaire ".$prix_unit.", Prix Total ".$prix_total.", pour la Commande N°: ".$code_bon." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
			// update
			$bon=$bd->query("SELECT SUM(prix_total) total FROM achat WHERE code_bon = '".$code_bon."' "); $ach=$bon->fetch(); echo $ach['total'];
			$tst=$bd->query("SELECT * FROM bon_achat WHERE montant_total = ".$ach['total']." AND code_bon = '".$code_bon."' "); if($tst->rowCount()<1){
				$bd->exec("UPDATE bon_achat SET montant_total = ".$ach['total']." WHERE code_bon = '".$code_bon."'") or die(" Prix Total ".$ach['total'].", pour le Bon N°: ".$code_bon);
			}
		}
		$tot=$bd->query("SELECT SUM(prix_total) pt FROM achat NATURAL JOIN article WHERE code_achat = '".$code_bon."'"); $t=$tot->fetch(); echo $t['pt'];
	}
	// Suppresion dune ligne de d'acha deja envoye avant de la valider
	else if($type == "delete_row_achat_confirmed")
	{
		$code_achat=$_POST['code_achat']; $code_bon=$_POST['code_bon'];
		$bd->exec("DELETE FROM achat WHERE code_achat = ".$code_achat." ") or die("Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
		$tot=$bd->query("SELECT SUM(prix_total) pt FROM achat NATURAL JOIN article WHERE code_bon = '".$code_bon."'"); $t=$tot->fetch(); echo $t['pt'];
	}
	// Suppresion dune ligne de d'acha deja envoye avant de la valider
	else if($type == "delete_row_achat_confirmed")
	{
		$code_achat=$_POST['code_achat']; $code_bon=$_POST['code_bon'];
		$bd->exec("DELETE FROM achat WHERE code_achat = ".$code_achat." ") or die("Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
		$tot=$bd->query("SELECT SUM(prix_total) pt FROM achat NATURAL JOIN article WHERE code_bon = '".$code_bon."'"); $t=$tot->fetch(); echo $t['pt'];
	}
	// approuver le bon d'achat
	else if($type == "Approuver_le_bon_achat_boisson")
	{
		$code_bon=$_POST['code_bon']; $observation=addslashes($_POST['observation']); $statut_achat=addslashes("valide");
		$tst=$bd->query("SELECT * FROM bon_achatbar WHERE observation = '".$observation."' AND statut_achat = '".$statut_achat."' AND code_bon = '".$code_bon."' "); if($tst->rowCount()<1){
		$bd->exec("UPDATE bon_achatbar SET observation = '".$observation."', statut_achat = '".$statut_achat."' WHERE code_bon = '".$code_bon."'") or die(" Observation ".str_replace("\n","<br>",$observation).", pour le Bon N°: ".$code_bon." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");}
		// Not
		$notif=$bd->query("SELECT * FROM utilisateur WHERE type_user = 'finance' "); while($tion=$notif->fetch())
		{
			$concerne= addslashes($_SESSION['nom_complet']." Vient d'approuver un bon d'Achat des Boisson. L'achat est donc autorisé. <a href='index.php?men=achat_bar&courant=7&bav=".$code_bon."'>Voir les details</a>");
			$bd->exec("INSERT INTO notification VALUE(null,'".$_SESSION['username']."','".$concerne."','".date('Y-m-d H:i:s')."','".$tion['username']."','gestock')");  
		}
		$accuz=$bd->query("SELECT * FROM bon_achatbar WHERE code_bon = '".$code_bon."' "); while($recep=$accuz->fetch())
		{
			$concerne= addslashes($_SESSION['nom_complet']." Vient d'approuver Votre demande d'achat des Boisson. Passez donc à la caisse-sortie pour l'argent. <a href='index.php?men=achat_bar&courant=7&bav=".$code_bon."'>Voir le Bon apres modification du gerant</a>");
			$bd->exec("INSERT INTO notification VALUE(null,'".$_SESSION['username']."','".$concerne."','".date('Y-m-d H:i:s')."','".$recep['fait_par']."','gestock')");  
		}
	}
	/*MODULE ACHAT RESTO 
	SORTIE DU CASH CAISSE
	Approbation D'un etat de besoin (achat stock de stock)*/
	else if($type == "approbation_sortie_cash")
	{
		$total_bon=$_POST['total_bon']; $dispo=$_POST['dispo']; $montant_sortie=$_POST['montant_sortie']; $justificatif=$_POST['justificatif']; $type_sortie=$_POST['type_sortie']; $code_bon=$_POST['code_bon']; $code_caisse=$_POST['code_caisse']; $observation=addslashes($_POST['observation']); $statut_achat=addslashes("en_cour"); $code_sortie = date('YMDhis')."_".$_SESSION['username']; $date_sortie=date('Y-m-d'); $motif = "Decaissement pour approvisionement du bon N° $code_bon ";
		if($montant_sortie > $total_bon OR $montant_sortie > $dispo)
		{?>
			<script>
		// deja decaissé 
		$already=$bd->query("SELECT IFNULL(SUM(montant_sortie),0) DEJA_SORTIE FROM sortie_bon WHERE code_bon = '".$code_bon."' "); $outputed=$already->fetch(); $DEJA_SORTIE = $outputed['DEJA_SORTIE'];
		// situation de la caisse
		$input=$bd->query("SELECT IFNULL(SUM(montant_verse),0) ENTREE FROM versement WHERE code_caisse = ".$code_caisse." "); $in=$input->fetch(); $ENTREE = $in['ENTREE']; $output=$bd->query("SELECT IFNULL(SUM(montant_sor),0) SORTIE FROM sortie_cash WHERE code_caisse = ".$code_caisse." "); $out=$output->fetch(); $SORTIE = $out['SORTIE']; $DISPO = $ENTREE - $SORTIE;
		/*reste a paye */ $bon_tot=$bd->query("SELECT * FROM bon_achat WHERE code_bon = '".$code_bon."' "); $tot=$bon_tot->fetch(); $montant_total_bon=$tot['montant_total']; $reste_a_retire = $montant_total_bon - $DEJA_SORTIE;
		
				$(document).ready(function(){
					$(".situation-caisse").html("<?php echo $DISPO." $";?>"); $(".deja-decaisse").html("<?php echo $DEJA_SORTIE." FF";?>"); $(".reste-a-retire").html("<?php echo $reste_a_retire." FF";?>"); $("#dispo").val("<?php echo $reste_a_retire;?>"); $("#total_bon").val("<?php echo $reste_a_retire;?>"); $(".totalite").html("Total : <?php echo $reste_a_retire;?> FF"); window.stopfonction = true;
				})
			</script>
			<div class="col-sm-10 col-sm-offset-1 alertrr">
				<div class="alert alert-warning alert-icon-bg alert-dismissable" role="alert">
					<div class="alert-icon">
						<i class="zmdi zmdi-alert-triangle"></i>
					</div>
					<div class="alert-message">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">
								<i class="zmdi zmdi-close"></i>
							</span>
						</button>
						<strong>Hotelia !</strong> Le décaissement de cette somme n'a pas été pris en charge !  Soit vous n'avez pas cette somme, soit vous esseyez de donner plus que prevu !
					</div>
				</div>
			</div>
		<?php
		}
		else
		{
			$tst=$bd->query("SELECT * FROM bon_achat WHERE observation = '".$observation."' AND statut_achat = '".$statut_achat."' AND code_bon = '".$code_bon."' "); if($tst->rowCount()<1){
				$bd->exec("UPDATE bon_achat SET observation = '".$observation."', statut_achat = '".$statut_achat."' WHERE code_bon = '".$code_bon."'") or die(" Observation ".str_replace("\n","<br>",$observation).", pour le Bon N°: ".$code_bon." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
			}
			// enregistrement de la sortie
			$bd->exec("INSERT INTO sortie_cash VALUE('".$code_sortie."',".$montant_sortie.",'".$justificatif."','".$motif."','".$date_sortie."','".$type_sortie."',".$code_caisse.",'".$_SESSION['username']."')");
			$bd->exec("INSERT INTO sortie_bon VALUE(null,".$montant_sortie.",'".$code_bon."','".$code_sortie."')");
			// Not
			$notif=$bd->query("SELECT * FROM utilisateur WHERE type_user = 'admin' "); while($tion=$notif->fetch())
			{
				$concerne= addslashes($_SESSION['nom_complet']." Vient de sortir l'argent ppour bon d'Achat des produits en stock. L'achat est en cours. <a href='index.php?men=achat_resto&courant=7&bav=".$code_bon."'>Voir le bon d'achat</a>");
				$bd->exec("INSERT INTO notification VALUE(null,'".$_SESSION['username']."','".$concerne."','".date('Y-m-d H:i:s')."','".$tion['username']."','gestock')");  
			}
			$accuz=$bd->query("SELECT * FROM bon_achat WHERE code_bon = '".$code_bon."' "); while($recep=$accuz->fetch())
			{
				$concerne= addslashes($_SESSION['nom_complet']." Vient de sortir le cash pour l'achat des produits en stock. Que vous avez demandé. <a href='index.php?men=achat_resto&courant=7&bav=".$code_bon."'>Bon d'achat</a>");
				$bd->exec("INSERT INTO notification VALUE(null,'".$_SESSION['username']."','".$concerne."','".date('Y-m-d H:i:s')."','".$recep['fait_par']."','gestock')");  
			}
			
			// deja decaissé 
			$already=$bd->query("SELECT IFNULL(SUM(montant_sortie),0) DEJA_SORTIE FROM sortie_bon WHERE code_bon = '".$code_bon."' "); $outputed=$already->fetch(); $DEJA_SORTIE = $outputed['DEJA_SORTIE'];
			// situation de la caisse
			$input=$bd->query("SELECT IFNULL(SUM(montant_verse),0) ENTREE FROM versement WHERE code_caisse = ".$code_caisse." "); $in=$input->fetch(); $ENTREE = $in['ENTREE']; $output=$bd->query("SELECT IFNULL(SUM(montant_sor),0) SORTIE FROM sortie_cash WHERE code_caisse = ".$code_caisse." "); $out=$output->fetch(); $SORTIE = $out['SORTIE']; $DISPO = $ENTREE - $SORTIE;
			/*reste a paye */ $bon_tot=$bd->query("SELECT * FROM bon_achat WHERE code_bon = '".$code_bon."' "); $tot=$bon_tot->fetch(); $montant_total_bon=$tot['montant_total']; $reste_a_retire = $montant_total_bon - $DEJA_SORTIE;
			?>
			<div class="panel-body dvt">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
						<div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
							<div class="alert-message">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">
										<i class="zmdi zmdi-close"></i>
									</span>
								</button>
								<strong> Hotelia ! </strong> Le décaissement de <?php echo $montant_sortie; ?> pour le bon d'achat N° <?php echo $code_bon; ?> vient d'être effectué avec success . Merci !!!
							</div>
					</div>
				</div>
			</div>
		<?php
		}
		?>
		<script>
			$(document).ready(function(){
				$(".situation-caisse").html("<?php echo $DISPO." $";?>"); $(".deja-decaisse").html("<?php echo $DEJA_SORTIE." FF";?>"); $(".reste-a-retire").html("<?php echo $reste_a_retire." FF";?>"); $("#dispo").val("<?php echo $reste_a_retire;?>"); $("#total_bon").val("<?php echo $reste_a_retire;?>"); window.stopfonction = true;
			})
		</script>
		<?php
	}
	
//  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ ACHAT BOISSON ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	else if($type == "update_row_achat_boisson")
	{
		$code_achat=$_POST['code_achat']; $prix_unit=$_POST['prix_achat']; $qte_boisson=$_POST['qte_achat']; $prix_total = $_POST['prix_total'];
		$test=$bd->query("SELECT * FROM achat_barelabor WHERE qte_boisson = ".$qte_boisson." AND prix_unit = ".$prix_unit." AND prix_total = ".$prix_total." AND code_achat = ".$code_achat." "); if($test->rowCount()<1){
			$bd->exec("UPDATE achat_barelabor SET qte_boisson = ".$qte_boisson." , prix_unit = ".$prix_unit.", prix_total = ".$prix_total." WHERE code_achat = ".$code_achat." ") or die("Quantité ".$qte_boisson.", Prix unitaire ".$prix_unit.", Prix Total ".$prix_total.", pour la Commande N°: ".$code_bon." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
		}
		$tot=$bd->query("SELECT SUM(prix_total) pt FROM achat_barelabor NATURAL JOIN doz_bar WHERE username = '".$_SESSION['username']."'"); $t=$tot->fetch(); echo $t['pt'];echo "<script> $('#montant_total').val(".$t['pt'].");</script>";
	}
	else if($type == "delete_row_achat_boisson")
	{
		$code_achat=$_POST['code_achat']; 
		$bd->exec("DELETE FROM achat_barelabor WHERE code_achat = ".$code_achat." ") or die("Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
		$tot=$bd->query("SELECT SUM(prix_total)pt FROM achat_barelabor NATURAL JOIN doz_bar WHERE username = '".$_SESSION['username']."'");$t=$tot->fetch(); echo $t['pt'];echo "<script> window.stopfonction = true; $('#montant_total').val(".$t['pt'].");</script>";
	}
	else if($type == "save_etat_besoin_boisson")
	{	
		$par=$_SESSION['username']; $date_redaction=date('Y-m-d'); $montant_total=$_POST['montant_total']; $statut_achat="attente"; $observation=""; $bon=$bd->query("SELECT (count(code_bon)+1) code_bonow FROM bon_achat WHERE date_redaction = '".$date_redaction."'"); $ach=$bon->fetch(); $code_bon= "B-A-P".date('dmY-his-').$ach['code_bonow'];
		$achat=$bd->query("SELECT * FROM achat_barelabor NATURAL JOIN doz_bar WHERE username = '".$_SESSION['username']."' ");
		
		if($achat->rowCount()>0){ $bd->exec("INSERT INTO bon_achatbar VALUES('".$code_bon."','".$date_redaction."','".$statut_achat."',".$montant_total.",'".$observation."','".$par."')"); }
		while($ela=$achat->fetch())
		{
			$qte_boisson=addslashes($ela['qte_boisson']); $prix_unit=$ela['prix_unit']; $prix_total=$ela['prix_total']; $code_doz=$ela['code_doz']; 
			try{
				$bd->exec("INSERT INTO achat_bar VALUE(NULL,".$qte_boisson.",".$prix_unit.",".$prix_total.",".$code_doz.",'".$code_bon."')") or die("Quantité ".$qte_article."', Prix unitaire ".$prix_unit.", Prix Total ".$prix_total.", pour le produit N°: ".$code_article." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
			}
				catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			} 
		}
		// Not
		$notif=$bd->query("SELECT * FROM utilisateur WHERE type_user = 'admin' "); while($tion=$notif->fetch())
		{
			$concerne= addslashes($_SESSION['nom_complet']." Vient de faire un état de besoin pour l'Achat des Boisson. Il attend une confirmation de votre part. <a href='index.php?men=achat_bar&courant=7&ba=".$code_bon."'>Voir le bon d' Achat</a>");
			$bd->exec("INSERT INTO notification VALUE(null,'".$par."','".$concerne."','".date('Y-m-d H:i:s')."','".$tion['username']."','gestock')");  
		}
		$bd->query("DELETE FROM achat_barelabor WHERE username = '".$par."'");
		?>
			<div class="panel-body dvt">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
					  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
						<div class="alert-message">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">
									<i class="zmdi zmdi-close"></i>
								</span>
							</button>
							<strong> Hotelia !</strong>  Etat de besoin soumis au Gerant pour approbation et autorisation de sortie des liquidité. Bon N°  <?php echo $code_bon; ?>
						</div>
					</div>
				</div>
			</div>
		<?php	
	}
	/* VALIDATION DU BON DACHAT BOISSON
	modifier l'achat deja envoyé avant de la valider*/
	else if($type == "update_row_achat_valid_boisson")
	{
		$code_achat=$_POST['code_achat']; $code_bon=$_POST['code_bon']; $prix_unit=$_POST['prix_achat']; $qte_boisson=$_POST['qte_achat']; $prix_total = $_POST['prix_total'];  
		$test=$bd->query("SELECT * FROM achat_bar WHERE qte_boisson = ".$qte_boisson." AND prix_unit = ".$prix_unit." AND prix_total = ".$prix_total." AND code_achat = ".$code_achat." "); if($test->rowCount()<1){
			$bd->exec("UPDATE achat_bar SET qte_boisson = ".$qte_boisson." , prix_unit = ".$prix_unit.", prix_total = ".$prix_total." WHERE code_achat = ".$code_achat." AND code_bon = '".$code_bon."'") or die("Quantité ".$qte_boisson.", Prix unitaire ".$prix_unit.", Prix Total ".$prix_total.", pour la Commande N°: ".$code_bon." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
			// update
			$bon=$bd->query("SELECT SUM(prix_total) total FROM achat_bar WHERE code_bon = '".$code_bon."' "); $ach=$bon->fetch(); echo $ach['total'];
			$tst=$bd->query("SELECT * FROM bon_achatbar WHERE montant_total = ".$ach['total']." AND code_bon = '".$code_bon."' "); if($tst->rowCount()<1){
				$bd->exec("UPDATE bon_achatbar SET montant_total = ".$ach['total']." WHERE code_bon = '".$code_bon."'") or die(" Prix Total ".$ach['total'].", pour le Bon N°: ".$code_bon);
			}
		}
		$tot=$bd->query("SELECT SUM(prix_total) pt FROM achat_bar NATURAL JOIN article WHERE code_achat = '".$code_bon."'"); $t=$tot->fetch(); echo $t['pt'];
	}
	// Suppresion dune ligne de d'acha deja envoye avant de la valider
	else if($type == "delete_row_achat_confirmed_boisson")
	{
		$code_achat=$_POST['code_achat']; $code_bon=$_POST['code_bon'];
		$bd->exec("DELETE FROM achat_bar WHERE code_achat = ".$code_achat." ") or die("Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
		$tot=$bd->query("SELECT SUM(prix_total) pt FROM achat_bar NATURAL JOIN doz_bar WHERE code_bon = '".$code_bon."'"); $t=$tot->fetch(); echo $t['pt'];
	}
	// Suppresion dune ligne de d'acha deja envoye avant de la valider
	else if($type == "delete_row_achat_confirmed")
	{
		$code_achat=$_POST['code_achat']; $code_bon=$_POST['code_bon'];
		$bd->exec("DELETE FROM achat WHERE code_achat = ".$code_achat." ") or die("Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
		$tot=$bd->query("SELECT SUM(prix_total) pt FROM achat NATURAL JOIN article WHERE code_bon = '".$code_bon."'"); $t=$tot->fetch(); echo $t['pt'];
	}
	// approuver le bon d'achat
	else if($type == "Approuver_le_bon_achat")
	{
		$code_bon=$_POST['code_bon']; $observation=addslashes($_POST['observation']); $statut_achat=addslashes("valide");
		$tst=$bd->query("SELECT * FROM bon_achat WHERE observation = '".$observation."' AND statut_achat = '".$statut_achat."' AND code_bon = '".$code_bon."' "); if($tst->rowCount()<1){
		$bd->exec("UPDATE bon_achat SET observation = '".$observation."', statut_achat = '".$statut_achat."' WHERE code_bon = '".$code_bon."'") or die(" Observation ".str_replace("\n","<br>",$observation).", pour le Bon N°: ".$code_bon." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");}
		// Not
		$notif=$bd->query("SELECT * FROM utilisateur WHERE type_user = 'finance' "); while($tion=$notif->fetch())
		{
			$concerne= addslashes($_SESSION['nom_complet']." Vient d'approuver un bon d'Achat des produits en stock. L'achat est donc autorisé. <a href='index.php?men=achat_resto&courant=7&bav=".$code_bon."'>Voir les details</a>");
			$bd->exec("INSERT INTO notification VALUE(null,'".$_SESSION['username']."','".$concerne."','".date('Y-m-d H:i:s')."','".$tion['username']."','gestock')");  
		}
		$accuz=$bd->query("SELECT * FROM bon_achat WHERE code_bon = '".$code_bon."' "); while($recep=$accuz->fetch())
		{
			$concerne= addslashes($_SESSION['nom_complet']." Vient d'approuver Votre demande d'achat des produits en stock. Passez donc à la caisse-sortie pour l'argent. <a href='index.php?men=achat_resto&courant=7&bav=".$code_bon."'>Voir le Bon apres modification du gerant</a>");
			$bd->exec("INSERT INTO notification VALUE(null,'".$_SESSION['username']."','".$concerne."','".date('Y-m-d H:i:s')."','".$recep['fait_par']."','gestock')");  
		}
	}
	
	/*MODULE ACHAT BOISSON 
	SORTIE DU CASH CAISSE
	Approbation D'un etat de besoin (achat stock de boissons)*/
	else if($type == "approbation_sortie_cash_boisson")
	{
		$total_bon=$_POST['total_bon']; $dispo=$_POST['dispo']; $montant_sortie=$_POST['montant_sortie']; $justificatif=$_POST['justificatif']; $type_sortie=$_POST['type_sortie']; $code_bon=$_POST['code_bon']; $code_caisse=$_POST['code_caisse']; $observation=addslashes($_POST['observation']); $statut_achat=addslashes("en_cour"); $code_sortie = date('YMDhis')."_".$_SESSION['username']; $date_sortie=date('Y-m-d'); $motif = "Decaissement pour approvisionement du bon N° $code_bon ";
		if($montant_sortie > $total_bon OR $montant_sortie > $dispo)
		{?>
			<script>
		// deja decaissé 
		$already=$bd->query("SELECT IFNULL(SUM(montant_sortie),0) DEJA_SORTIE FROM sortie_bon WHERE code_bon = '".$code_bon."' "); $outputed=$already->fetch(); $DEJA_SORTIE = $outputed['DEJA_SORTIE'];
		// situation de la caisse
		$input=$bd->query("SELECT IFNULL(SUM(montant_verse),0) ENTREE FROM versement WHERE code_caisse = ".$code_caisse." "); $in=$input->fetch(); $ENTREE = $in['ENTREE']; $output=$bd->query("SELECT IFNULL(SUM(montant_sor),0) SORTIE FROM sortie_cash WHERE code_caisse = ".$code_caisse." "); $out=$output->fetch(); $SORTIE = $out['SORTIE']; $DISPO = $ENTREE - $SORTIE;
		/*reste a paye */ $bon_tot=$bd->query("SELECT * FROM bon_achatbar WHERE code_bon = '".$code_bon."' "); $tot=$bon_tot->fetch(); $montant_total_bon=$tot['montant_total']; $reste_a_retire = $montant_total_bon - $DEJA_SORTIE;
		
				$(document).ready(function(){
					$(".situation-caisse").html("<?php echo $DISPO." $";?>"); $(".deja-decaisse").html("<?php echo $DEJA_SORTIE." FF";?>"); $(".reste-a-retire").html("<?php echo $reste_a_retire." FF";?>"); $("#dispo").val("<?php echo $reste_a_retire;?>"); $("#total_bon").val("<?php echo $reste_a_retire;?>"); $(".totalite").html("Total : <?php echo $reste_a_retire;?> FF"); window.stopfonction = true;
				})
			</script>
			<div class="col-sm-10 col-sm-offset-1 alertrr">
				<div class="alert alert-warning alert-icon-bg alert-dismissable" role="alert">
					<div class="alert-icon">
						<i class="zmdi zmdi-alert-triangle"></i>
					</div>
					<div class="alert-message">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">
								<i class="zmdi zmdi-close"></i>
							</span>
						</button>
						<strong>Hotelia !</strong> Le décaissement de cette somme n'a pas été pris en charge !  Soit vous n'avez pas cette somme, soit vous esseyez de donner plus que prevu !
					</div>
				</div>
			</div>
		<?php
		}
		else
		{
			$tst=$bd->query("SELECT * FROM bon_achatbar WHERE observation = '".$observation."' AND statut_achat = '".$statut_achat."' AND code_bon = '".$code_bon."' "); if($tst->rowCount()<1){
				$bd->exec("UPDATE bon_achatbar SET observation = '".$observation."', statut_achat = '".$statut_achat."' WHERE code_bon = '".$code_bon."'") or die(" Observation ".str_replace("\n","<br>",$observation).", pour le Bon N°: ".$code_bon." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
			}
			// enregistrement de la sortie
			$bd->exec("INSERT INTO sortie_cash VALUE('".$code_sortie."',".$montant_sortie.",'".$justificatif."','".$motif."','".$date_sortie."','".$type_sortie."',".$code_caisse.",'".$_SESSION['username']."')");
			$bd->exec("INSERT INTO sortie_bon VALUE(null,".$montant_sortie.",'".$code_bon."','".$code_sortie."')");
			// Not
			$notif=$bd->query("SELECT * FROM utilisateur WHERE type_user = 'admin' "); while($tion=$notif->fetch())
			{
				$concerne= addslashes($_SESSION['nom_complet']." Vient de sortir l'argent ppour bon d'Achat des produits en stock. L'achat est en cours. <a href='index.php?men=achat_resto&courant=7&bav=".$code_bon."'>Voir le bon d'achat</a>");
				$bd->exec("INSERT INTO notification VALUE(null,'".$_SESSION['username']."','".$concerne."','".date('Y-m-d H:i:s')."','".$tion['username']."','gestock')");  
			}
			$accuz=$bd->query("SELECT * FROM bon_achat WHERE code_bon = '".$code_bon."' "); while($recep=$accuz->fetch())
			{
				$concerne= addslashes($_SESSION['nom_complet']." Vient de sortir le cash pour l'achat des produits en stock. Que vous avez demandé. <a href='index.php?men=achat_resto&courant=7&bav=".$code_bon."'>Bon d'achat</a>");
				$bd->exec("INSERT INTO notification VALUE(null,'".$_SESSION['username']."','".$concerne."','".date('Y-m-d H:i:s')."','".$recep['fait_par']."','gestock')");  
			}
			
			// deja decaissé 
			$already=$bd->query("SELECT IFNULL(SUM(montant_sortie),0) DEJA_SORTIE FROM sortie_bon WHERE code_bon = '".$code_bon."' "); $outputed=$already->fetch(); $DEJA_SORTIE = $outputed['DEJA_SORTIE'];
			// situation de la caisse
			$input=$bd->query("SELECT IFNULL(SUM(montant_verse),0) ENTREE FROM versement WHERE code_caisse = ".$code_caisse." "); $in=$input->fetch(); $ENTREE = $in['ENTREE']; $output=$bd->query("SELECT IFNULL(SUM(montant_sor),0) SORTIE FROM sortie_cash WHERE code_caisse = ".$code_caisse." "); $out=$output->fetch(); $SORTIE = $out['SORTIE']; $DISPO = $ENTREE - $SORTIE;
			/*reste a paye */ $bon_tot=$bd->query("SELECT * FROM bon_achatbar WHERE code_bon = '".$code_bon."' "); $tot=$bon_tot->fetch(); $montant_total_bon=$tot['montant_total']; $reste_a_retire = $montant_total_bon - $DEJA_SORTIE;
			?>
			<script>
				$(document).ready(function(){
					$(".situation-caisse").html("<?php echo $DISPO." $";?>"); $(".deja-decaisse").html("<?php echo $DEJA_SORTIE." FF";?>"); $(".reste-a-retire").html("<?php echo $reste_a_retire." FF";?>"); $("#dispo").val("<?php echo $reste_a_retire;?>"); $("#total_bon").val("<?php echo $reste_a_retire;?>"); window.stopfonction = true;
				})
			</script>
			<div class="panel-body dvt">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
						<div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
							<div class="alert-message">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">
										<i class="zmdi zmdi-close"></i>
									</span>
								</button>
								<strong> Hotelia ! </strong> Le décaissement de <?php echo $montant_sortie; ?> pour le bon d'achat N° <?php echo $code_bon; ?> vient d'être effectué avec success . Merci !!!
							</div>
					</div>
				</div>
			</div>
		<?php
		}
	}
/*/ ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ ACHAT BOISSON ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	Voir les contenu de bon */
	else if($type == "apercevoir_un_bon")
	{
		$etab=""; $etap=""; $eta=""; $ba="** PAS D'INFO **"; $code_bon = $_POST['code_bon']; $type_bon = substr($_POST['code_bon'],0,5);
		if($type_bon == "B-A-B"){ $ba=$code_bon; $etab="active"; } else { $ba=$code_bon; $etap="active"; } ?>
		<div class="p-content" style="margin-top:-20px">
			<ul class="nav nav-tabs nav-tabs-custom" role="tablist">
				<li class="<?php echo $etab;?>">
					<a href="#tab-recepb" data-toggle="tab" role="tab"> Recept Achat<span class="badge badge-primary m-l-5">Boisson</span></a>
				</li>
				<li class="<?php echo $etap;?>">
					<a href="#tab-recepp" data-toggle="tab" role="tab"> Recept Achat<span class="badge badge-primary m-l-5">Produit</span></a>
				</li>
				<li>
					<a href="#tab-suivi" data-toggle="tab" role="tab"> Suivis </a>
				</li>
			</ul>
			<div class="tab-content">
				<!-- Boisson -->
				<div class="tab-pane <?php echo $etab;?>" id="tab-recepb" role="tabpanel">
					<div class="clearfix p-y-20 p-x-30">
						<h4 class="pull-sm-left hug"> RECEPTION DE BOISSON DU BON N° <?php echo $ba;?> </h4>
					</div>
					<div id="alert-recept-stock-boisson"></div>
					<form action="#" method="POST" class="Frecepstock" id="boisson">
						<div class="panel panel-default panel-table drr">
							<div class="panel-body dvt">
								<table class="table table-condensed hug dvt" style="width:100%">
									<thead>
										<tr>
											<th rowspan=2> Produit </th>
											<th colspan=4> Bon De livraison Actuel</th>
											<th rowspan=2 class="number">
												<a href="#" class="btn btn-success"><i class="zmdi zmdi-store"></i></a>
											</th>
										</tr>
										<tr>
											<th>Prix U</th>
											<th>Qté</th>
											<th>P total</th>
											<th>Date d'expiration</th>
										</tr>
									</thead>
									<tbody> <input type="hidden" name="bon_achat" value="<?php echo $ba;?>" />
										<?php 
										$bois=$bd->query("SELECT * FROM achat_bar NATURAL JOIN doz_bar WHERE code_bon = '".addslashes($ba)."' "); $totalb = $x=0; $nb=$bois->rowCount(); if($nb > 0){ while($son=$bois->fetch()){ $x++; 
										?>
										<tr><?php $totalb = $totalb + $son['prix_total']; $code_a=$son['code_achat'];?>
											<td><?php echo $x." . ".$son['boisson']." (".$son['unite'].")";?> </td>
											<td class="number"><input type="text" name="prix_unit<?php echo $code_a;?>" id="prix_unit<?php echo $x;?>" value="<?php echo $son['prix_unit'];?>" size=5 class="number calcul"> FF</td>
											<td class="number"><input type="text" name="qte_boisson<?php echo $code_a;?>" id="qte<?php echo $x;?>" value="<?php echo $son['qte_boisson'];?>" size=5 class="number calcul" /> </td>
											<td class="number"><input type="text" name="prix_total<?php echo $code_a;?>" id="prix_total<?php echo $x;?>" value="<?php echo $son['prix_total'];?>" size=5 class="number calcul"/> FF</td>
											<td class="number"><input type="date" name="date_peremption<?php echo $code_a;?>" placeholder="date d'expiration" size=5 required></td>
											<td class="number">
												<label class="custom-control custom-control-success custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="code_achat" name="code_achat<?php echo $code_a;?>" value="<?php echo $son['code_achat'];?>" />
													<span class="custom-control-indicator"></span>
												</label>
											</td>
										</tr>
										<?php
										}
										?>
										<tr> <input type="hidden" name="nb" id="nb" value="<?php echo $nb;?>" />
											<td colspan=3><input type="text" name="nom_fsseur" placeholder="Nom du Fournisseur" required /></td>
											<td colspan=3><input type="text" name="achete_par" placeholder="Celui qui a supervisé l'achat" required /></td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
								<hr>
								<center class="row" style="width:100%">
									<div class="col-lg-5 col-sm-4 col-xs-6 m-y-5"> <input type="hidden" name="montant_total" value="<?php echo $totalb;?>">
										<button type="<?php if($totalb<=0){echo "button";}else{echo "submit";}?>" class="btn btn-success btn-labeled" name="save_boisson">Enregistrer
											<span class="btn-label btn-label-right">Total : <?php echo $totalb." FF";?></span>
										</button>
									</div>
									<div class="col-lg-5 col-sm-4 col-xs-6 m-y-5">
										<button type="button" class="btn btn-danger btn-labeled" onclick="<?php if($totalb<=0){echo "";}else{echo "annul_achatbar()";}?>">Pas encore
											<span class="btn-label btn-label-right"> Pret</span>
										</button>
									</div>
								</center>
							</div>
						</div>
						<input type="hidden" name="type" value="receptionner_boisson">
					</form>
					<!-- bn lv -->
					<div class="panel-body dvt">
						<div class="col-sm-10 col-sm-offset-1">
							<div class="alert alert-default alert-bordered" style="border-radius:3px">
								<div class="panel panel-default panel-table">
									<div class="panel-heading">
										<div class="panel-tools">
											<a href="#" class="tools-icon">
												<i class="zmdi zmdi-refresh"></i>
											</a>
											<a href="#" class="tools-icon">
												<i class="zmdi zmdi-close"></i>
											</a>
										</div> <?php $i=0; $livraison=$bd->query("SELECT * FROM entree_bar NATURAL JOIN doz_bar WHERE code_bon_achat = '".$code_bon."' "); $bn=$livraison->fetch(); ?>
										<h3 class="panel-title">BON DE LIVRAISON N° <?php echo $bn['code_bon_livr'];?></h3>
										<div class="panel-subtitle">Les produits déjà livrés du bon d'achat actuel</div>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered m-b-0">
												<thead>
													<tr>
														<th></th>
														<th>Nom du produit</th>
														<th>Prix Unitaire</th>
														<th>Quantité</th>
														<th>Prix Total</th>
														<th>Date peremption</th>
													</tr>
												</thead>
												<tbody>
												<?php 
												while($bon=$livraison->fetch()){ $i++;
												?>
													<tr>
														<td><?php echo $i;?></td>
														<td><?php echo $bon['boisson'];?></td>
														<td class="number"><?php echo $bon['prix_unit'];?></td>
														<td class="number"><?php echo $bon['qte_entre'];?></td>
														<td class="number"><?php echo $bon['total_prix'];?></td>
														<td><?php echo $bon['date_peremption'];?></td>
													</tr>
												<?php
												}
												?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Produit -->
				<div class="tab-pane <?php echo $etap;?>" id="tab-recepp" role="tabpanel">
					<div class="clearfix p-y-20 p-x-30">
						<h4 class="pull-sm-left hug"> RECEPTION DES PRODUITS DU BON N° <?php echo $ba;?> </h4>
					</div>
					<div id="alert-recept-stock-produit"></div>
					<form action="#" method="POST" class="Frecepstock" id="produit">
						<div class="panel panel-default panel-table drr">
							<div class="panel-body dvt">
								<table class="table table-condensed hug dvt" style="width:100%">
									<thead>
										<tr>
											<th rowspan=2> Produit </th>
											<th colspan=4> Bon De livraison Actuel</th>
											<th rowspan=2 class="number">
												<a href="#" class="btn btn-success"><i class="zmdi zmdi-store"></i></a>
											</th>
										</tr>
										<tr>
											<th>Prix U</th>
											<th>Qté</th>
											<th>P total</th>
											<th>Date d'expiration</th>
										</tr>
									</thead>
									<tbody> <input type="hidden" name="bon_achat" value="<?php echo $ba;?>" />
									<?php 
									$pro=$bd->query("SELECT * FROM achat NATURAL JOIN article WHERE code_bon = '".addslashes($ba)."' "); $total = $y=0; $n=$pro->rowCount(); if($n > 0){ while($duit=$pro->fetch()){ $y++; 
									?>
										<tr> <?php $total = $total + $duit['prix_total']; $code_a=$duit['code_achat'];?>
											<td><?php echo $y." . ".$duit['article']." (".$duit['unite'].")";?></td>
											<td><input type="text" name="prix_unit<?php echo $code_a;?>" id="prix_unit<?php echo $y;?>" class="number calcul" value="<?php echo $duit['prix_unit'];?>" size=5> FF</td>
											<td><input type="text" name="qte_article<?php echo $code_a;?>" id="qte<?php echo $y;?>" class="number calcul" value="<?php echo $duit['qte_article'];?>" size=5 /> </td>
											<td><input type="text" name="prix_total<?php echo $code_a;?>" id="prix_total<?php echo $y;?>" class="number calcul" value="<?php echo $duit['prix_total'];?>" size=5 /> </td>
											<td><input type="date" name="date_peremption<?php echo $code_a;?>"  placeholder="date d'expiration" size=5 required> </td>
											<td class="number">
												<label class="custom-control custom-control-success custom-checkbox">
													<input class="custom-control-input" type="checkbox" name="code_achat<?php echo $code_a;?>" value="<?php echo $code_a;?>" />
													<span class="custom-control-indicator"></span>
												</label>
											</td>
										</tr>
										<?php
										}
										?>
										<tr> <input type="hidden" name="nb" id="nb" value="<?php echo $n;?>" />
											<td colspan=3><input type="text" name="nom_fsseur" placeholder="Nom du Fournisseur" required /></td>
											<td colspan=3><input type="text" name="achete_par" placeholder="Celui qui a supervisé l'achat" required /></td>
										</tr>
									<?php
									}
									?>
									</tbody>
								</table>
								<hr>
								<center class="row" style="width:100%">
								  <div class="col-lg-5 col-sm-4 col-xs-6 m-y-5"> <input type="hidden" name="montant_total" value="<?php echo $total;?>">
									<button type="<?php if($total<=0){echo "button";}else{echo "submit";}?>" class="btn btn-success btn-labeled" name="save_stock">Enregistrer
									  <span class="btn-label btn-label-right">Total : <?php echo $total." FF";?></span>
									</button>
								  </div>
								  <div class="col-lg-5 col-sm-4 col-xs-6 m-y-5">
									<button type="button" class="btn btn-danger btn-labeled" onclick="<?php if($total<=0){echo "";}else{echo "annul_achatbar()";}?>">Pas encore
									  <span class="btn-label btn-label-right"> Pret</span>
									</button>
								  </div>
								</center>
							</div>
						</div> 
						<input type="hidden" name="type" value="receptionner_produit">
					</form>
					<div class="panel-body dvt">
						<div class="col-sm-10 col-sm-offset-1">
							<div class="alert alert-default alert-bordered" style="border-radius:3px">
								<div class="panel panel-default panel-table">
									<div class="panel-heading">
										<div class="panel-tools">
											<a href="#" class="tools-icon">
												<i class="zmdi zmdi-refresh"></i>
											</a>
											<a href="#" class="tools-icon">
												<i class="zmdi zmdi-close"></i>
											</a>
										</div> <?php $i=0; $livraison=$bd->query("SELECT * FROM entree_depot NATURAL JOIN article WHERE code_bon_achat = '".$code_bon."' "); $bn=$livraison->fetch(); ?>
										<h3 class="panel-title">BON DE LIVRAISON N° <?php echo $bn['code_bon_livr'];?></h3>
										<div class="panel-subtitle">Les produits déjà livrés du bon d'achat actuel</div>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered m-b-0">
												<thead>
													<tr>
														<th></th>
														<th>Nom du produit</th>
														<th>Prix Unitaire</th>
														<th>Quantité</th>
														<th>Prix Total</th>
														<th>Date peremption</th>
													</tr>
												</thead>
												<tbody>
												<?php 
												while($bon=$livraison->fetch()){ $i++;
												?>
													<tr>
														<td><?php echo $i;?></td>
														<td><?php echo $bon['article'];?></td>
														<td class="number"><?php echo $bon['prix_unit'];?></td>
														<td class="number"><?php echo $bon['qte_entre'];?></td>
														<td class="number"><?php echo $bon['total_prix'];?></td>
														<td><?php echo $bon['date_peremption'];?></td>
													</tr>
												<?php
												}
												?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Default -->
				<div class="tab-pane <?php echo $eta;?>" id="tab-suivi" role="tabpanel">
					<div class="clearfix p-y-20 p-x-30">
						<h4 class="pull-sm-left hug"> RECEPTION DES ACHATS DU BON N° XXXXXXXXXXXXXXXXXXXXX </h4>
					</div>
					<div class="panel panel-default panel-table drr">
						<div class="panel-body dvt">
							<table class="table table-condensed hug dvt" style="width:100%">
								<tr>
									<th>
										<p style="font-size:18px;"><br/><br/>En appuyant sur le Numero du bon d'achat Dans la case à votre gauche en vert, Votre bon d'achat avec tous les details va se charger ici ( Dans cette fenettre blue). <br/> <br/> A ce moment là le <b><i><u style="color:red"> n° XXXXXXXXXXXXXXXXXXXXX </u></i></b> sera remplacé par le numero de votre bon d'achat <b><i><u style="color:green"> Ex : B-A-B<?php echo date('dmY-his-');?>10 </u></i></b>. <br> <br>Vous pouvez le modifier selon ce que vous venez de récevoir.</p>
										<hr>
										<center class="row" style="width:100%">
											<div class="col-lg-5 col-sm-4 col-xs-6 m-y-5"> <input type="hidden" name="montant_total" value="<?php echo $total;?>">
												<button type="button" class="btn btn-success btn-labeled" name="save_stock">Enregistrer
													<span class="btn-label btn-label-right"> Total : 0.0000 FF </span>
												</button>
											</div>
											<div class="col-lg-5 col-sm-4 col-xs-6 m-y-5">
												<button type="button" class="btn btn-danger btn-labeled" >Pas encore
													<span class="btn-label btn-label-right"> Pret</span>
												</button>
											</div>
										</center>
									</th>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				window.stopfonction = true;
				// Total Automatique
				$(".calcul").keyup(function(e){
					e.preventDefault();
					var nb = $('#nb').val(), tot=0;
					for(i=1;i<=nb;i++){
						tot = $('#prix_unit'+i).val() * $('#qte'+i).val();
						$('#prix_total'+i).val(tot);
					}
				});
				// Enregistrement
				/* Confirmer la reception du stock d'un bon */
				$('.Frecepstock').on('submit', function (e) {
					if( !window.stopfonction ){return false;}	
					window.stopfonction = false;
					// On empêche le navigateur de soumettre le formulaire
					e.preventDefault();
					var ID = this.id;
					var $form = $(this);
					var formdata = (window.FormData) ? new FormData($form[0]) : null;
					var data = (formdata !== null) ? formdata : $form.serialize();
					$.ajax({
						url: 'fonctions/save.php',
						type:'POST',
						contentType: false, // obligatoire pour de l'upload
						processData: false, // obligatoire pour de l'upload
						data: data,
						beforeSend:function(){
							$('#alert-recept-stock-'+ID).html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
						},
						success: function (response) {
							$('#alert-recept-stock-'+ID).html(response);
						}
					});
				});
			})
		</script>
	<?php
	}
	// receprtioner stock venant d'un achat
	else if($type == "receptionner_produit")
	{
		$par=$_SESSION['username']; $date_entre=date('Y-m-d'); $nom_fsseur=$_POST['nom_fsseur']; $bon_achat=$_POST['bon_achat']; $achete_par=$_POST['achete_par']; $bon=$bd->query("SELECT (COUNT(*)+1) num FROM bon_livr_bar WHERE substr(date_livr,1,7) = '".date('Y-m')."' "); $livr=$bon->fetch(); $code_bon="PRODS-".str_pad($livr['num'],3,'0',STR_PAD_LEFT)."-".date('mY');"DRINK".date('mY');
		$livr=$bd->query("SELECT * FROM entree_depot ED LEFT JOIN bon_livr_pro LP ON ED.code_bon_livr = LP.code_bon WHERE code_bon_achat = '".$bon_achat."' "); if($livr->rowCount()>0){ 
			while($bn=$livr->fetch()){
				if($bn['code_bon']==Null){ 
					$code_bon=$bn['code_bon_livr']; $bd->exec("INSERT INTO bon_livr_pro VALUES('".$code_bon."','".$date_entre."','".$achete_par."','".$nom_fsseur."','".$par."')");} 
				else{
					$code_bon=$bn['code_bon']; 
				} 
			}
		} 
		else { $bd->exec("INSERT INTO bon_livr_pro VALUES('".$code_bon."','".$date_entre."','".$achete_par."','".$nom_fsseur."','".$par."')"); }
		
		$achat=$bd->query("SELECT * FROM achat NATURAL JOIN article WHERE code_bon = '".$bon_achat."' ");
		if($achat->rowCount()>0){
			while($cha=$achat->fetch())
			{ 
				$code_achat=addslashes($cha['code_achat']);
				if(isset($_POST['code_achat'.$code_achat])){
					$code_article=addslashes($cha['code_article']); $qte_entre=addslashes($_POST['qte_article'.$code_achat]); $prix_unit=$_POST['prix_unit'.$code_achat]; $prix_total=$prix_unit * $qte_entre; $date_peremption=$_POST['date_peremption'.$code_achat]; 
					// INSERTION DU STOCK RECU DANS LA BASE
					$bd->exec("INSERT INTO entree_depot VALUE(NULL,'".$date_entre."',".$qte_entre.",".$prix_unit.",".$prix_total.",'".$date_peremption."',".$code_article.",'".$bon_achat."','".$code_bon."')") or die("Quantité ".$qte_entre."', Prix unitaire ".$prix_unit.", Prix Total ".$prix_total.", Date Expiration ".$date_peremption.", pour le produit N°: ".$code_article." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
					$sto=$bd->query("SELECT * FROM depot_produit WHERE code_article = ".$code_article." AND prix_unit = ".$prix_unit." AND date_peremption = '".$date_peremption."' "); 
					if($sto->rowCount()>0){
						$bd->exec("UPDATE depot_produit SET date_entre = '".$date_entre."', qte_dispo = qte_dispo + ".$qte_entre." WHERE date_peremption = '".$date_peremption."' AND prix_unit = ".$prix_unit." AND code_article = ".$code_article." ") or die("Quantité ".$qte_entre."', Prix unitaire ".$prix_unit.", Date Expiration ".$date_peremption.", pour le produit N°: ".$code_article." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
					}
					else
					{
						$bd->exec("INSERT INTO depot_produit VALUE(NULL,'".$date_entre."',".$qte_entre.",".$prix_unit.",'".$date_peremption."',".$code_article.")") or die("Quantité ".$qte_boisson."', Prix unitaire ".$prix_unit.", Date Expiration ".$date_peremption.", pour le produit N°: ".$code_article." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
					}
				}
			}
			// Not
			$notif=$bd->query("SELECT * FROM utilisateur WHERE type_user = 'admin' OR type_user = 'guichet' "); while($tion=$notif->fetch())
			{
				$concerne= addslashes($_SESSION['nom_complet']." Vient d'enregistrer une entrée des produits En Stock. <a href='index.php?men=livraizon&courant=7&bl=".$code_bon."'>Voir le bon de livraison</a>");
				$bd->exec("INSERT INTO notification VALUE(null,'".$par."','".$concerne."','".date('Y-m-d H:i:s')."','".$tion['username']."','gestock')");  
			}
			$bd->query("UPDATE bon_achat SET statut_achat = 'livre' WHERE code_bon = '".$bon_achat."' ");  
			?>
			<div class="panel-body dvt">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
						<div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
							<div class="alert-message">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">
										<i class="zmdi zmdi-close"></i>
									</span>
								</button>
								<strong> Hotelia ! </strong> Cette livraison de stock est enregistrée avec succès. Et le Stock est mis à jour. Bon de livraison N°  <?php echo $code_bon; ?> . Merci !!!
							</div>
					</div>
				</div>
			</div>
			<?php
		}
	}
	else if($type == "receptionner_boisson")
	{
		$par=$_SESSION['username']; $date_entre=date('Y-m-d'); $nom_fsseur=$_POST['nom_fsseur']; $bon_achat=$_POST['bon_achat']; $achete_par=$_POST['achete_par']; $bon=$bd->query("SELECT (COUNT(*)+1) num FROM bon_livr_bar WHERE substr(date_livr,1,7) = '".date('Y-m')."' "); $livr=$bon->fetch(); $code_bon="DRINK-".str_pad($livr['num'],3,'0',STR_PAD_LEFT)."-".date('mY');"DRINK".date('mY');
		$livr=$bd->query("SELECT * FROM entree_bar EB LEFT JOIN bon_livr_bar LB ON EB.code_bon_livr = LB.code_bon WHERE code_bon_achat = '".$bon_achat."' "); if($livr->rowCount()>0){ 
			while($bn=$livr->fetch()){
				if($bn['code_bon']==Null){ 
					$code_bon=$bn['code_bon_livr']; $bd->exec("INSERT INTO bon_livr_bar VALUES('".$code_bon."','".$date_entre."','".$achete_par."','".$nom_fsseur."','".$par."')");} 
				else{
					$code_bon=$bn['code_bon']; 
				} 
			}
		} 
		else { $bd->exec("INSERT INTO bon_livr_bar VALUES('".$code_bon."','".$date_entre."','".$achete_par."','".$nom_fsseur."','".$par."')"); }
		
		$achat=$bd->query("SELECT * FROM achat_bar NATURAL JOIN doz_bar WHERE code_bon = '".$bon_achat."' ");
		if($achat->rowCount()>0){
			while($cha=$achat->fetch())
			{ 
				$code_achat=addslashes($cha['code_achat']);
				if(isset($_POST['code_achat'.$code_achat])){
					$code_doz=addslashes($cha['code_doz']); $qte_entre=addslashes($_POST['qte_boisson'.$code_achat]); $prix_unit=$_POST['prix_unit'.$code_achat]; $prix_total=$prix_unit * $qte_entre; $date_peremption=$_POST['date_peremption'.$code_achat]; 
					// INSERTION DU STOCK RECU DANS LA BASE
					$bd->exec("INSERT INTO entree_bar VALUE(NULL,'".$date_entre."',".$qte_entre.",".$prix_unit.",".$prix_total.",'".$date_peremption."',".$code_doz.",'".$bon_achat."','".$code_bon."')") or die("Quantité ".$qte_entre."', Prix unitaire ".$prix_unit.", Prix Total ".$prix_total.", Date Expiration ".$date_peremption.", pour le produit N°: ".$code_doz." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
					$sto=$bd->query("SELECT * FROM depot_boisson WHERE code_doz = ".$code_doz." AND prix_unit = ".$prix_unit." AND date_peremption = '".$date_peremption."' "); 
					if($sto->rowCount()>0){
						$bd->exec("UPDATE depot_boisson SET date_entre = '".$date_entre."', qte_dispo = qte_dispo + ".$qte_entre." WHERE date_peremption = '".$date_peremption."' AND prix_unit = ".$prix_unit." AND code_doz = ".$code_doz." ") or die("Quantité ".$qte_entre."', Prix unitaire ".$prix_unit.", Date Expiration ".$date_peremption.", pour le produit N°: ".$code_doz." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
					}
					else
					{
						$bd->exec("INSERT INTO depot_boisson VALUE(NULL,'".$date_entre."',".$qte_entre.",".$prix_unit.",'".$date_peremption."',".$code_doz.")") or die("Quantité ".$qte_boisson."', Prix unitaire ".$prix_unit.", Date Expiration ".$date_peremption.", pour le produit N°: ".$code_doz." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer</a>");
					}
				}
			}
			// Not
			$notif=$bd->query("SELECT * FROM utilisateur WHERE type_user = 'admin' OR type_user = 'guichet' "); while($tion=$notif->fetch())
			{
				$concerne= addslashes($_SESSION['nom_complet']." Vient d'enregistrer une entrée des boissons En Stock. <a href='index.php?men=livraizon&courant=7&bl=".$code_bon."'>Voir le bon de livraison</a>");
				$bd->exec("INSERT INTO notification VALUE(null,'".$par."','".$concerne."','".date('Y-m-d H:i:s')."','".$tion['username']."','gestock')");  
			}
			$bd->query("UPDATE bon_achatbar SET statut_achat = 'livre' WHERE code_bon = '".$bon_achat."' ");  
			?>
			<div class="panel-body dvt">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
						<div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
							<div class="alert-message">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">
										<i class="zmdi zmdi-close"></i>
									</span>
								</button>
								<strong> Hotelia ! </strong> Cette livraison de stock est enregistrée avec succès. Et le Stock est mis à jour. Bon de livraison N°  <?php echo $code_bon; ?> . Merci !!!
							</div>
					</div>
				</div>
			</div>
			<?php
		}
		
	}
/* ====================================== GESTION AUTRE SERVICES CONSOMMABLE ================================================================
	Enregistrement d'une nouvelle categorie service */
	
	else if($type == "new_categorie_service")
	{
		$categorie=addslashes($_POST['categorie']); $expli=addslashes($_POST['expli']);
		$act=$bd->query("SELECT * FROM categorie_service WHERE categorie = '".$categorie."' ");
		if($act->rowCount()>0){
		?>
			<div class="col-sm-10 col-sm-offset-1">
				<div class="alert alert-danger alert-icon-bg alert-dismissable" role="alert">
				    <div class="alert-icon"> <i class="zmdi zmdi-close-circle-o"></i> </div>
						<div class="alert-message">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"> <i class="zmdi zmdi-close"></i> </span>
							</button>
							<strong>Hotelia !</strong> La categorie <?php echo $categorie; ?> existe déja, Informations non Enregistrées !
						</div>
				</div>
			</div>
		<?php		
		}
		else
		{
		$bd->exec("INSERT INTO categorie_service VALUE(null,'".$categorie."','".$expli."')");
		?>
			<div class="col-sm-10 col-sm-offset-1">
				<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
					<div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
						<div class="alert-message">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">
									<i class="zmdi zmdi-close"></i>
								</span>
							</button>
							<strong> Hotelia !</strong> La categorie <?php echo $categorie; ?> a été enregistrée avec succès. Merci
						</div>
				</div>
			</div>
		<?php	
		}
		?>
		<table class="table table-condensed dataTable hug dvt" id="table-1">
			<thead>
				<tr>
					<th>N° </th>
					<th>Categorie</th>
					<th>Description</th>
					<th class="number">Actions</th>
				</tr>
			</thead>
			<tbody>
			  <?php 
				$qst=$bd->query("SELECT * FROM categorie_service ORDER BY categorie"); $i=0;
				while($rep=$qst->fetch())
				{
				$i++;
				?>
				<tr>
					<td> <?php echo $i; ?> </td>
					<td style="vertical-align:TOP;"> <span class="affich<?php echo $rep['code_categorie'];?>" id="nom<?php echo $rep['code_categorie'];?>"><?php echo $rep['categorie']; ?> </span> <span class="edit<?php echo $rep['code_categorie'];?> hidden"> <input type="text" class="categories" id="categories<?php echo $rep['code_categorie'];?>" value="<?php echo $rep['categorie'];?>"> <input type="hidden" id="code_categories<?php echo $rep['code_categorie'];?>" value="<?php echo $rep['code_categorie'];?>"></span> </td>
					<td> <span class="affich<?php echo $rep['code_categorie'];?>" id="expli<?php echo $rep['code_categorie'];?>"><?php echo $rep['expli']; ?> </span> <span class="edit<?php echo $rep['code_categorie'];?> hidden"> <textarea data-plugin="autosize" style="resize: none; width: 100%; height: 30px" class="explis" id="explis<?php echo $rep['code_categorie'];?>"> <?php echo $rep['expli'];?></textarea> <input type="hidden" id="code_explis<?php echo $rep['code_categorie'];?>" value="<?php echo $rep['code_categorie'];?>"></span> </td>
					<td class="number">
						<span id="update<?php echo $rep['code_categorie'];?>"><a href="#" class="cat" id="cat<?php echo $rep['code_categorie'];?>"><i class="zmdi zmdi-edit text-warning"> Mod</i></a> <input type="hidden" id="code_cat<?php echo $rep['code_categorie'];?>" value="<?php echo $rep['code_categorie'];?>"></span> <span id="save_update<?php echo $rep['code_categorie'];?>" class="hidden"><a href="#" class="categ" id="categ<?php echo $rep['code_categorie'];?>"><i class="zmdi zmdi-check-circle-u text-primary"> Ok</i></a> <input type="hidden" id="code_categ<?php echo $rep['code_categorie'];?>" value="<?php echo $rep['code_categorie'];?>"></span>
						<a href="#"><i class="zmdi zmdi-eye text-primary">Voir</i></a>
					</td>
				</tr>
				<?php
				}
			  ?>
			</tbody>
		</table>
		<script src="js/tables-datatables.min.js"></script>
		<script src="js/forms-plugins.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				 window.stopfonction = true; services(); 
			})
		</script>
		<?php
	}
	// mise a jour d'une ligne de categorie service
	else if($type == "update_line_categories")
	{
		$categorie=addslashes($_POST['categorie']); $expli=addslashes($_POST['expli']); $code_categorie=$_POST['code_categorie'];
		$act=$bd->query("SELECT * FROM categorie_service WHERE categorie = '".$categorie."' AND expli = '".$expli."' AND code_categorie = ".$code_categorie." ");
		if($act->rowCount()>0){}
		else
		{
			$bd->exec("UPDATE categorie_service SET categorie = '".$categorie."', expli = '".$expli."' WHERE code_categorie = ".$code_categorie."");
		}	
	}
	else if($type == "save_new_service")
	{
		$service=addslashes($_POST['service']); $unite=addslashes($_POST['unite']); $prix_normal=$_POST['prix_normal'];$prix_vip=addslashes($_POST['prix_vip']); $prix_casse=addslashes($_POST['prix_casse']); $code_categorie=$_POST['code_categorie'];
		$act=$bd->query("SELECT * FROM service WHERE service = '".$service."' ");
		if($act->rowCount()>0){
		?>
			<div class="col-sm-10 col-sm-offset-1">
				<div class="alert alert-danger alert-icon-bg alert-dismissable" role="alert">
				    <div class="alert-icon"> <i class="zmdi zmdi-close-circle-o"></i> </div>
						<div class="alert-message">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"> <i class="zmdi zmdi-close"></i> </span>
							</button>
							<strong>Hotelia !</strong> Le service <?php echo $service; ?> existe déja, Informations non Enregistrées !
						</div>
				</div>
			</div>
		<?php		
		}
		else
		{
		$bd->exec("INSERT INTO service VALUE(null,'".$service."','".$unite."',".$prix_normal.",".$prix_vip.",".$prix_casse.",".$code_categorie.")");
		?>
			<div class="col-sm-10 col-sm-offset-1">
				<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
					<div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
						<div class="alert-message">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">
									<i class="zmdi zmdi-close"></i>
								</span>
							</button>
							<strong> Hotelia !</strong> Le Service <?php echo $service; ?> a été enregistrée avec succès. Merci
						</div>
				</div>
			</div>
		<?php	
		}
		?>
			<table class="table table-condensed dataTable hug dvt" id="table-2" width="100%">
				<thead>
					<tr>
						<th rowspan="2">N° </th>
						<th rowspan="2">Service [Unité]</th>
						<th colspan="3">Prix de service</th>
						<th rowspan="2" class="number">Actions</th>
					</tr>
					<tr>
						<th class="number"> Normal</th>
						<th class="number">VIP</th>
						<th class="number">CASSE</th>
					</tr>
				</thead>
				<tbody>
				  <?php 
					$qst=$bd->query("SELECT * FROM service ORDER BY service"); $i=0;
					while($rep=$qst->fetch())
					{
					$i++;
					?>
					<tr>
						<td> <?php echo $i; ?> </td>
						<td style="vertical-align:TOP;"> <span class="Saffich<?php echo $rep['code_serv'];?>" id="nserv<?php echo $rep['code_serv'];?>"><?php echo $rep['service']." [".$rep['unite']."]"; ?> </span> <span class="edit<?php echo $rep['code_serv'];?> hidden"> <input type="text" class="champs" id="services<?php echo $rep['code_serv'];?>" value="<?php echo $rep['service'];?>"> [<input type="text" class="champ" id="unite<?php echo $rep['code_serv'];?>" value="<?php echo $rep['unite'];?>">] <input type="hidden" id="code_services<?php echo $rep['code_serv'];?>" value="<?php echo $rep['code_serv'];?>"> <input type="hidden" id="code_unite<?php echo $rep['code_serv'];?>" value="<?php echo $rep['code_serv'];?>"></span> </td>
						<td class="number"> <span class="Saffich<?php echo $rep['code_serv'];?>" id="normal<?php echo $rep['code_serv'];?>"><?php echo $rep['prix_normal']; ?> </span> <span class="edit<?php echo $rep['code_serv'];?> hidden"> <input type="text" class="champ" id="normals<?php echo $rep['code_serv'];?>" value="<?php echo $rep['prix_normal'];?>"> <input type="hidden" id="code_normals<?php echo $rep['code_serv'];?>" value="<?php echo $rep['code_serv'];?>"></span> </td>
						<td class="number"> <span class="Saffich<?php echo $rep['code_serv'];?>" id="vip<?php echo $rep['code_serv'];?>"><?php echo $rep['prix_vip']; ?> </span> <span class="edit<?php echo $rep['code_serv'];?> hidden"> <input type="text" class="champ" id="vips<?php echo $rep['code_serv'];?>" value="<?php echo $rep['prix_vip'];?>"> <input type="hidden" id="code_vips<?php echo $rep['code_serv'];?>" value="<?php echo $rep['code_serv'];?>"></span> </td>
						<td class="number"> <span class="Saffich<?php echo $rep['code_serv'];?>" id="casse<?php echo $rep['code_serv'];?>"> <?php echo number_format($rep['prix_casse'],"2","."," ");?> </span> <span class="edit<?php echo $rep['code_serv'];?> hidden"> <input type="text" class="champ" id="casses<?php echo $rep['code_serv'];?>" value="<?php echo $rep['prix_casse'];?>"> <input type="hidden" id="code_casses<?php echo $rep['code_serv'];?>" value="<?php echo $rep['code_serv'];?>"></span></td>
						<td class="number">
							<span id="Supdate<?php echo $rep['code_serv'];?>"><a href="#" class="ser" id="ser<?php echo $rep['code_serv'];?>"><i class="zmdi zmdi-edit text-warning"> Mod</i></a> <input type="hidden" id="code_ser<?php echo $rep['code_serv'];?>" value="<?php echo $rep['code_serv'];?>"></span> <span id="Ssave_update<?php echo $rep['code_serv'];?>" class="hidden"><a href="#" class="servi" id="servi<?php echo $rep['code_serv'];?>"><i class="zmdi zmdi-check-circle-u text-primary"> Ok</i></a> <input type="hidden" id="code_servi<?php echo $rep['code_serv'];?>" value="<?php echo $rep['code_serv'];?>"></span>
							<a href="#"><i class="zmdi zmdi-eye text-primary">Voir</i></a>
						</td>
					</tr>
					<?php
					}
				  ?>
				</tbody>
			</table>
		<script src="js/tables-datatables.min.js"></script>
		<script src="js/forms-plugins.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				 window.stopfonction = true; services(); 
			})
		</script>
		<?php
	}
	// mise a jour d'une ligne de services
	else if($type == "update_line_services")
	{
		$service=addslashes($_POST['service']); $unite=addslashes($_POST['unite']); $prix_normal=$_POST['prix_normal'];$prix_vip=addslashes($_POST['prix_vip']); $prix_casse=addslashes($_POST['prix_casse']); $code_serv=$_POST['code_serv'];
		$act=$bd->query("SELECT * FROM service WHERE service = '".$service."' AND unite = '".$unite."' AND prix_normal = ".$prix_normal." AND prix_vip = ".$prix_vip." AND  prix_casse = ".$prix_casse." AND code_serv = ".$code_serv." ");
		if($act->rowCount()>0){}
		else
		{
			$bd->exec("UPDATE service SET service = '".$service."', unite = '".$unite."', prix_normal = ".$prix_normal.", prix_vip = ".$prix_vip.", prix_casse = ".$prix_casse." WHERE code_serv = ".$code_serv."");
		}	
	}
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ VENTE & FACTURA +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	else if($type == "charger_new_panier")
	{
		$code_menu=substr($_POST['code_menu'],3,11); $type_oper=substr($_POST['code_menu'],0,3); $table_cmd=addslashes($_POST['table']); $type_pri=$_POST['type_pri']; $code_fact=addslashes($_POST['code_fact']); $code_guichet=$_POST['code_guichet']; $username=addslashes($_SESSION['username']);
		if($code_menu == "0" OR $table_cmd == "" OR $type_pri == "")
		{
			// changer panier
			if($code_fact == "changer_le_panier_en_cours"){
				?> <script> $(".clsucces").removeClass('hidden');  $("#table").val("<?php echo $table_cmd; ?>");</script> <?php
			}
			// charger panier
			else{
				$table_cmd="PS"; ?> <script> $(".clrr").removeClass('hidden');  $("#table").val("<?php echo $table_cmd; ?>");</script> <?php
			}
		}
		else
		{
			if($type_oper == "bar"){
				$test=$bd->query("SELECT * FROM stock_guichet NATURAL JOIN doz_bar WHERE code_stock = ".$code_menu." "); $repo=$test->fetch(); $code_doz = $repo['code_doz']; $prix=$repo[$type_pri]; $qte_pcs=$_POST['qte_pcs']; $prix_total = $qte_pcs * $prix; 
				$bd->exec("INSERT INTO panier_client VALUE(NULL,".$code_doz.",'".$type_oper."',".$code_menu.",'".$table_cmd."',".$prix.",".$qte_pcs.",".$prix_total.",".$code_guichet.",'".$username."')")or die ("problem ".$code_doz.",".$type_oper.",".$type_pri.",".$table_cmd.",".$prix.",".$qte_pcs.",".$prix_total.",".$code_guichet.",".$username."");
			}
			else if($type_oper == "rst"){
				$test=$bd->query("SELECT * FROM plat_resto NATURAL JOIN categorie_plat WHERE code_plat = ".$code_menu." "); $repo=$test->fetch(); $code_plat = $repo['code_plat']; $prix=$repo[$type_pri]; $qte_pcs=$_POST['qte_pcs']; $prix_total = $qte_pcs * $prix;
				$bd->exec("INSERT INTO panier_client VALUE(NULL,".$code_plat.",'".$type_oper."',0,'".$table_cmd."',".$prix.",".$qte_pcs.",".$prix_total.",".$code_guichet.",'".$username."')");
			}
			else if($type_oper == "srv"){
				$test=$bd->query("SELECT * FROM service NATURAL JOIN categorie_service WHERE code_serv = ".$code_menu." "); $repo=$test->fetch(); $code_serv = $repo['code_serv']; $prix=$repo[$type_pri]; $qte_pcs=$_POST['qte_pcs']; $prix_total = $qte_pcs * $prix;
				$bd->exec("INSERT INTO panier_client VALUE(NULL,".$code_serv.",'".$type_oper."',0,'".$table_cmd."',".$prix.",".$qte_pcs.",".$prix_total.",".$code_guichet.",'".$username."')");
			}
			?> <script> $("#table").val("<?php echo $table_cmd; ?>"); ventes_auclient(); $("#panier_en_cours").html($("#table").val());</script> <?php
		}
		?>
			<script> ventes_auclient(); $("#panier_en_cours").html($("#table").val()); reload_panier_en_cours();</script>
			<div class="p-content" style="margin-top:-30px;"> <?php $dft="active"; $tc=""; $spc=""; if($table_cmd<>"PS"){ $dft="";$tc= $table_cmd;}?>
				<ul class="nav nav-tabs nav-tabs-custom" role="tablist">
					<li class="<?php echo $dft;?>">
						<a href="#tab-panier" data-toggle="tab" role="tab"><i class="zmdi zmdi-shopping-basket"></i> PANIER <span class="badge badge-primary m-l-5">Standard</span></a>
					</li>
					<?php $tab=$bd->query("SELECT * FROM panier_client WHERE username = '".$_SESSION['username']."' AND table_cmd <> 'PS' GROUP BY table_cmd"); while($div=$tab->fetch()){  if($div['table_cmd']==$tc){ $spc="active";}else {$spc="";} ?>
					<li class="<?php echo $spc;?>">
						<a href="#tab-<?php echo str_replace(" ","_",$div['table_cmd']);?>" data-toggle="tab" role="tab"><i class="zmdi zmdi-shopping-basket"></i> <?php echo $div['table_cmd'];?> </a>
					</li>
					<?php } ?>
					<li>
						<a href="#tab-annul" data-toggle="tab" role="tab"> Pas d'autres </a>
					</li>
				</ul>
				<div class="tab-content">
					<!-- cmd panier -->
					<div class="tab-pane <?php echo $dft;?>" id="tab-panier" role="tabpanel">
						<form action="#" method="POST" class="fvente"> <input type="hidden" name="type" value="confirmation_de_la_vente">
							<div class="clearfix p-y-20 p-x-30">
								<div class="col-sm-10 col-sm-offset-1 hidden clsucces">
									<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
									  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
									    <div class="alert-message">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">
													<i class="zmdi zmdi-close"></i>
												</span>
											</button>
											<strong> Hotelia !</strong> Le panier <?php echo $table_cmd; ?> vient d'être activé comme panier en cours ! merci
									    </div>
									</div>
								</div>
								<div class="col-sm-10 col-sm-offset-1 hidden clrr">
									<div class="alert alert-warning alert-icon-bg alert-dismissable" role="alert">
										<div class="alert-icon">
											<i class="zmdi zmdi-alert-triangle"></i>
										</div>
										<div class="alert-message">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">
													<i class="zmdi zmdi-close"></i>
												</span>
											</button>
											<strong>Hotelia !</strong> Pour charger un nouveau panier Vous devez remplir le menu et le type de prix [ Boisson, Plat ou Autres services]
										</div>
									</div>
								</div>
								<h4 class="pull-sm-left"> PANIER DE CLIENT <?php if($table_cmd=="PS"){ ?><i class="zmdi zmdi-check-circle text-success m-l-5"></i> <?php } else { ?> <i class="zmdi zmdi-check-circle text-default m-l-5 panier" id="panier_pan"></i> <input type="hidden" id="code_panier_pan" value="PS"> <?php } ?></h4>
								<select name="code_checkin" class="btn btn-outline-primary pull-sm-right" style="align:right" >
									<option class="zmdi zmdi-plus" value="0"> Imputer La facture à une chambre</option><?php $qoi=$bd->query("SELECT * FROM checkin NATURAL JOIN chambre WHERE confirmation_checkout = 'attente' ORDER BY date_checkin"); while($ok=$qoi->fetch()){ ?>
									<option value="<?php echo $ok['code_checkin']; ?>"><?php echo stripslashes($ok['nom_chambre']." | Du ".$ok['date_checkin']." au ".$ok['date_checkout']); ?></option>  <?php } ?>
								</select>
							</div>
							<!-- Les Alertes En cas d'erreurs -->
							<div class="panel panel-default panel-table drr">
								<div class="panel-body dvt" id="bon_achat">
									<table class="table table-condensed hug dvt" style="width:100%">
										<thead>
											<tr><input type="hidden" name="code_fact" value="<?php echo $code_fact; ?>"> 
												<th rowspan=2>Libellé</th>
												<th colspan=3> Prix de vente et quantité vendue</th>
												<th rowspan=2 class="number">Action <input type="hidden" name="tablecmd" value="PS"> <input name="guichet"  id="guichet" name="guichet" type="hidden" value="<?php echo $code_guichet;?>" >
													<a href="#" class="btn btn-danger btn-xs" onclick="delete_achat()"><i class="zmdi zmdi-delete"></i></a>
												</th>
											</tr>
											<tr>
												<th class="number">Prix Unitaire</th>
												<th class="number">Quantité </th>
												<th class="number">Prix total</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$pa=$bd->query("SELECT * FROM panier_client PC INNER JOIN plat_resto PR ON PR.code_plat = PC.code_plaser WHERE table_cmd = 'PS' AND type_oper = 'rst' AND username = '".$_SESSION['username']."' "); $total = $y=0; while($nier=$pa->fetch()){ $y++; 
										?>
											<tr><?php $total = $total + $nier['prix_total'];?>
												<td><?php echo $y." . ".$nier['plat'];?></td>
												<td class="number"><?php echo $nier['prix_unit']." FF";?></td>
												<td class="number"><?php echo $nier['qte'];?></td>
												<td class="number"><?php echo $nier['prix_total']." FF";?></td>
												<td class="number">
													<a href="#" class="btn btn-primary btn-xs"><i class="zmdi zmdi-edit"></i></a>
													<label class="custom-control custom-control-danger custom-checkbox">
														<input class="custom-control-input" type="checkbox" id="code_panier<?php echo $nier['code_panier'];?>" value="<?php echo $nier['code_panier'];?>">
														<span class="custom-control-indicator"></span>
													</label>
												</td>
											</tr>
										<?php
										}
										$pa_=$bd->query("SELECT * FROM panier_client PC INNER JOIN doz_bar DB ON DB.code_doz = PC.code_plaser WHERE table_cmd = 'PS' AND type_oper = 'bar' AND username = '".$_SESSION['username']."' "); while($nier_=$pa_->fetch()){ $y++; 
										?>
											<tr><?php $total = $total + $nier_['prix_total'];?>
											  <td><?php echo $y." . ".$nier_['boisson'];?></td>
											  <td class="number"><?php echo $nier_['prix_unit']." FF";?></td>
											  <td class="number"><?php echo $nier_['qte'];?></td>
											  <td class="number"><?php echo $nier_['prix_total']." FF";?></td>
											  <td class="number">
												<a href="#" class="btn btn-primary btn-xs"><i class="zmdi zmdi-edit"></i></a>
													<label class="custom-control custom-control-danger custom-checkbox">
														<input class="custom-control-input" type="checkbox" id="code_panier<?php echo $nier_['code_panier'];?>" value="<?php echo $nier_['code_panier'];?>">
														<span class="custom-control-indicator"></span>
													</label>
											  </td>
											</tr>
										<?php
										}
										$pa__=$bd->query("SELECT * FROM panier_client PC INNER JOIN service S ON S.code_serv = PC.code_plaser WHERE table_cmd = 'PS' AND type_oper = 'srv' AND username = '".$_SESSION['username']."' "); while($nier__=$pa__->fetch()){ $y++; 
										?>
											<tr><?php $total = $total + $nier__['prix_total'];?>
											  <td><?php echo $y." . ".$nier__['service'];?></td>
											  <td class="number"><?php echo $nier__['prix_unit']." FF";?></td>
											  <td class="number"><?php echo $nier__['qte'];?></td>
											  <td class="number"><?php echo $nier__['prix_total']." FF";?></td>
											  <td class="number">
												<a href="#" class="btn btn-primary btn-xs"><i class="zmdi zmdi-edit"></i></a>
													<label class="custom-control custom-control-danger custom-checkbox">
														<input class="custom-control-input" type="checkbox" id="code_panier<?php echo $nier__['code_panier'];?>" value="<?php echo $nier__['code_panier'];?>">
														<span class="custom-control-indicator"></span>
													</label>
											  </td>
											</tr>
										<?php
										}
										?>
										</tbody>
									</table>
									<hr>
									<center class="row" style="width:100%">
										<div class="col-lg-4 col-sm-4 col-xs-6 m-y-5"> <input type="hidden" name="montant_total" value="<?php echo $total;?>">
											<button type="<?php if($total<=0){echo "button";}else{echo "submit";}?>" class="btn btn-success btn-labeled" name="save_vente">Confirmer Vente
												<span class="btn-label btn-label-right">Total : <?php echo $total." FF";?></span>
											</button>
										</div>
										<div class="col-lg-4 col-sm-4 col-xs-6 m-y-5">
											<button type="button" class="btn btn-success btn-labeled"> Client
												<span class="btn-label btn-label-right"><input type="text" name="client" style="color:black; width:100px" required /></span>
											</button>
										</div>
										<div class="col-lg-4 col-sm-4 col-xs-6 m-y-5">
											<button type="button" class="btn btn-danger btn-labeled" onclick="<?php if($total<=0){echo "";}else{echo "annul_achat()";}?>">Annuler
												<span class="btn-label btn-label-right"> l'Achat</span>
											</button>
										</div>
									</center>
								</div>
							</div>
						</form>
					</div>
				  <?php $tabb=$bd->query("SELECT * FROM panier_client WHERE username = '".$_SESSION['username']."' AND table_cmd <> 'PS' GROUP BY table_cmd"); while($divb=$tabb->fetch()){  $spcb=""; if($divb['table_cmd']==$tc){ $spcb="active";}else {$spcb="";}?>
				  <!-- table cmd panier-->
					<div class="tab-pane <?php echo $spcb;?>" id="tab-<?php echo str_replace(" ","_",$divb['table_cmd']);?>" role="tabpanel">
						<form action="#" method="POST" class="fvente"> <input type="hidden" name="type" value="confirmation_de_la_vente">
							<div class="clearfix p-y-20 p-x-30">
								<div class="col-sm-10 col-sm-offset-1 hidden clsucces">
									<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
									  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
									    <div class="alert-message">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">
													<i class="zmdi zmdi-close"></i>
												</span>
											</button>
											<strong> Hotelia !</strong> Le panier <?php echo $table_cmd; ?> vient d'être activé comme panier en cours ! merci
									    </div>
									</div>
								</div>
								<h4 class="pull-sm-left"> PANIER DE [** <?php echo $divb['table_cmd'];?> **] <?php if($table_cmd==$divb['table_cmd']){ ?><i class="zmdi zmdi-check-circle text-success m-l-5"></i> <?php } else { ?> <i class="zmdi zmdi-check-circle text-default m-l-5 panier"  id="panier<?php echo str_replace(" ","_",$divb['table_cmd']);?>"></i> <input type="hidden" id="code_panier<?php echo str_replace(" ","_",$divb['table_cmd']);?>" value="<?php echo $divb['table_cmd'];?>" >  <?php } ?> </h4>
								<select name="code_checkin" class="btn btn-outline-primary pull-sm-right" style="align:right" >
									<option class="zmdi zmdi-plus" value="0"> Imputer La facture à une chambre</option><?php $qoi=$bd->query("SELECT * FROM checkin NATURAL JOIN chambre WHERE confirmation_checkout = 'attente' ORDER BY date_checkin"); while($ok=$qoi->fetch()){ ?>
									<option value="<?php echo $ok['code_checkin']; ?>"><?php echo stripslashes($ok['nom_chambre']." | Du ".$ok['date_checkin']." au ".$ok['date_checkout']); ?></option>  <?php } ?>
								</select>
							</div>
							<div class="panel panel-default panel-table drr">
								<div class="panel-body dvt" id="bon_achat">
									<table class="table table-condensed hug dvt" style="width:100%">
										<thead>
											<tr>  <input type="hidden" name="code_fact" value="<?php echo $code_fact; ?>">
											  <th rowspan=2>Libellé</th>
											  <th colspan=3> Prix de vente et quantité vendue</th>
											  <th rowspan=2 class="number">Action <input type="hidden" name="tablecmd" value="<?php echo $divb['table_cmd'];?>">  <input name="guichet"  id="guichet" type="hidden" value="<?php echo $code_guichet;?>" >
												<a href="#" class="btn btn-danger btn-xs" onclick="delete_achat()"><i class="zmdi zmdi-delete"></i></a>
											  </th>
											</tr>
											<tr>
											  <th class="number">Prix Unitaire</th>
											  <th class="number">Quantité </th>
											  <th class="number">Prix total</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$pa=$bd->query("SELECT * FROM panier_client PC INNER JOIN plat_resto PR ON PR.code_plat = PC.code_plaser WHERE table_cmd = '".$divb['table_cmd']."' AND type_oper = 'rst' AND username = '".$_SESSION['username']."' "); $total = $y=0; while($nier=$pa->fetch()){ $y++; 
											?>
											<tr><?php $total = $total + $nier['prix_total'];?>
											  <td><?php echo $y." . ".$nier['plat'];?></td>
											  <td class="number"><?php echo $nier['prix_unit']." FF";?></td>
											  <td class="number"><?php echo $nier['qte'];?></td>
											  <td class="number"><?php echo $nier['prix_total']." FF";?></td>
											  <td class="number">
												<a href="#" class="btn btn-primary btn-xs"><i class="zmdi zmdi-edit"></i></a>
												<label class="custom-control custom-control-danger custom-checkbox">
												  <input class="custom-control-input" type="checkbox" id="code_panier<?php echo $nier['code_panier'];?>" value="<?php echo $nier['code_panier'];?>">
												  <span class="custom-control-indicator"></span>
												</label>
											  </td>
											</tr>
											<?php
											}
											$pa_=$bd->query("SELECT * FROM panier_client PC INNER JOIN doz_bar DB ON DB.code_doz = PC.code_plaser WHERE table_cmd = '".$divb['table_cmd']."' AND type_oper = 'bar' AND username = '".$_SESSION['username']."' "); while($nier_=$pa_->fetch()){ $y++; 
											?>
											<tr><?php $total = $total + $nier_['prix_total'];?>
											  <td><?php echo $y." . ".$nier_['boisson'];?></td>
											  <td class="number"><?php echo $nier_['prix_unit']." FF";?></td>
											  <td class="number"><?php echo $nier_['qte'];?></td>
											  <td class="number"><?php echo $nier_['prix_total']." FF";?></td>
											  <td class="number">
												<a href="#" class="btn btn-primary btn-xs"><i class="zmdi zmdi-edit"></i></a>
												<label class="custom-control custom-control-danger custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="code_panier<?php echo $nier_['code_panier'];?>" value="<?php echo $nier_['code_panier'];?>">
													<span class="custom-control-indicator"></span>
												</label>
											  </td>
											</tr>
											<?php
											}
											$pa__=$bd->query("SELECT * FROM panier_client PC INNER JOIN service S ON S.code_serv = PC.code_plaser WHERE table_cmd = '".$divb['table_cmd']."' AND type_oper = 'srv' AND username = '".$_SESSION['username']."' "); while($nier__=$pa__->fetch()){ $y++; 
											?>
											<tr><?php $total = $total + $nier__['prix_total'];?>
											  <td><?php echo $y." . ".$nier__['service'];?></td>
											  <td class="number"><?php echo $nier__['prix_unit']." FF";?></td>
											  <td class="number"><?php echo $nier__['qte'];?></td>
											  <td class="number"><?php echo $nier__['prix_total']." FF";?></td>
											  <td class="number">
												<a href="#" class="btn btn-primary btn-xs"><i class="zmdi zmdi-edit"></i></a>
												<label class="custom-control custom-control-danger custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="code_panier<?php echo $nier__['code_panier'];?>" value="<?php echo $nier__['code_panier'];?>">
													<span class="custom-control-indicator"></span>
												</label>
											  </td>
											</tr>
											<?php
											}
											?>
										</tbody>
									</table>
									<hr>
									<center class="row" style="width:100%">
										<div class="col-lg-4 col-sm-4 col-xs-6 m-y-5"> <input type="hidden" name="montant_total" value="<?php echo $total;?>">
											<button type="<?php if($total<=0){echo "button";}else{echo "submit";}?>" class="btn btn-success btn-labeled" name="save_vente">Confirmer Vente
												<span class="btn-label btn-label-right">Total : <?php echo $total." FF";?></span>
											</button>
										</div>
										<div class="col-lg-4 col-sm-4 col-xs-6 m-y-5">
											<button type="button" class="btn btn-success btn-labeled"> Client
												<span class="btn-label btn-label-right"><input type="text" name="client" style="color:black; width:100px" required /></span>
											</button>
										</div>
										<div class="col-lg-4 col-sm-4 col-xs-6 m-y-5">
											<button type="button" class="btn btn-danger btn-labeled" onclick="<?php if($total<=0){echo "";}else{echo "annul_achat()";}?>">Annuler
												<span class="btn-label btn-label-right"> l'Achat</span>
											</button>
										</div>
									</center>
								</div>
							</div>
						</form>
					</div>
				<?php } ?>  
				</div>
			</div>
	<?php
	}
	// script confirmation vente 
	else if($type == "confirmation_de_la_vente")
	{
		$par=addslashes($_SESSION['username']); $tablecmd=addslashes($_POST['tablecmd']); $client=addslashes($_POST['client']); $guichet=$_POST['guichet']; $date_fact=date('Y-m-d'); $montant_total = $_POST['montant_total']; $montant_total = $_POST['montant_total']; $code_checkin = $_POST['code_checkin']; /* Code Facture */$factu=$bd->query("SELECT (count(code_fact)+1) code_fanow FROM facture WHERE date_fact = '".date('Y-m-d')."'"); $re=$factu->fetch(); $code_fact= date('dmY-').str_pad($guichet,3,'0',STR_PAD_LEFT)."-".str_pad($re['code_fanow'],4,'0',STR_PAD_LEFT);
		// tot doz
		$doz=$bd->query("SELECT IFNULL(SUM(prix_total),0) total_bar FROM panier_client WHERE username = '".$par."' AND code_guichet = ".$guichet." AND table_cmd = '".$tablecmd."' AND type_oper = 'bar' "); $ze=$doz->fetch(); $total_bar =$ze['total_bar'];
		// tot resto
		$rsto=$bd->query("SELECT IFNULL(SUM(prix_total),0) total_resto FROM panier_client WHERE username = '".$par."' AND code_guichet = ".$guichet." AND table_cmd = '".$tablecmd."' AND type_oper = 'rst' "); $to=$rsto->fetch(); $total_resto=$to['total_resto'];
		// tot autre
		$autre=$bd->query("SELECT IFNULL(SUM(prix_total),0) total_autre FROM panier_client WHERE username = '".$par."' AND code_guichet = ".$guichet." AND table_cmd = '".$tablecmd."' AND type_oper <> 'bar' AND type_oper <> 'rst' "); $tre=$autre->fetch(); $total_autre=$tre['total_autre'];
		$test=$bd->query("SELECT * FROM facture WHERE code_fact = '".$code_fact."' "); if($test->rowCount()<1){
		  $bd->exec("INSERT INTO facture VALUE('".$code_fact."','".$client."',".$total_resto.",".$total_bar.",".$total_autre.",'".$date_fact."',".$montant_total.",".$code_checkin.",".$guichet.",'".$par."')") or die ("Erreur d'insertion de données ".$code_fact.",".$client.",".$total_resto.",".$total_bar.",".$total_autre.",".$date_fact.",".$montant_total." <br>Un Probleme est Survenu ! <a href='".$_SERVER['REQUEST_URI']."'>Recommencer SVP</a> ");
		  $panier=$bd->query("SELECT * FROM panier_client WHERE username = '".$par."' AND code_guichet = ".$guichet." AND table_cmd = '".$tablecmd."' "); while($conf=$panier->fetch()){ $type_oper=$conf['type_oper']; 
			if($type_oper == "bar"){
			  $code_doz = $conf['code_plaser']; $qte=$conf['qte']; $prix_unit=$conf['prix_unit']; $prix_total=$conf['prix_total']; $code_stock=$conf['code_stock']; 
			  $bd->exec("INSERT INTO vente VALUE(NULL,".$code_doz.",'".$type_oper."',".$code_stock.",'".$code_fact."',".$prix_unit.",".$qte.",".$prix_total.",".$guichet.",'".$par."')") or die ("problem ".$code_doz.",".$type_oper.",".$code_menu.",".$table_cmd.",".$prix.",".$qte_pcs.",".$prix_total.",".$code_guichet.",".$username."");
			}
			else if($type_oper == "rst"){ 
			  $code_plat = $conf['code_plaser']; $qte=$conf['qte']; $prix_unit=$conf['prix_unit']; $prix_total=$conf['prix_total']; $type_oper == "rst";
			  $bd->exec("INSERT INTO vente VALUE(NULL,".$code_plat.",'".$type_oper."',0,'".$code_fact."',".$prix_unit.",".$qte.",".$prix_total.",".$guichet.",'".$par."')");
			}
			else{ 
			  $code_plat = $conf['code_plaser']; $qte=$conf['qte']; $prix_unit=$conf['prix_unit']; $prix_total=$conf['prix_total']; $type_oper = "srv";
			  $bd->exec("INSERT INTO vente VALUE(NULL,".$code_plat.",'".$type_oper."',0,'".$code_fact."',".$prix_unit.",".$qte.",".$prix_total.",".$guichet.",'".$par."')");
			}
		  }
		  $bd->query("DELETE FROM panier_client WHERE username = '".$par."' AND table_cmd = '".$tablecmd."'");  
		}
		?>
		<script type="text/javascript" src="js/jQuery.print.js"> </script>
		<script> $("#table").val("PS"); reload_vente_jr(); ventes_auclient(); reload_panier_en_cours(); $(".clsucces").removeClass("hidden"); $("#panier_en_cours").html($("#table").val()); reload_menu_in_case();</script> <?php $tablecmd="PS"; ?>
			<div class="p-content" style="margin-top:-20px;"> <?php $dft="active"; $tc=""; $spc=""; if($tablecmd<>"PS"){ $dft="";$tc= $tablecmd;}?>
				<ul class="nav nav-tabs nav-tabs-custom" role="tablist">
					<li class="<?php echo $dft;?>">
						<a href="#tab-panier" data-toggle="tab" role="tab"><i class="zmdi zmdi-shopping-basket"></i> PANIER <span class="badge badge-primary m-l-5">Standard</span></a>
					</li>
					<?php $tab=$bd->query("SELECT * FROM panier_client WHERE username = '".$_SESSION['username']."' AND table_cmd <> 'PS' GROUP BY table_cmd"); while($div=$tab->fetch()){  if($div['table_cmd']==$tc){ $spc="active";}else {$spc="";} ?>
					<li class="<?php echo $spc;?>">
						<a href="#tab-<?php echo str_replace(" ","_",$div['table_cmd']);?>" data-toggle="tab" role="tab"><i class="zmdi zmdi-shopping-basket"></i> <?php echo $div['table_cmd'];?> </a>
					</li>
					<?php } ?>
					<li>
						<a href="#tab-annul" data-toggle="tab" role="tab"> Pas d'autres </a>
					</li>
				</ul>
				<div class="tab-content">
					<!-- cmd panier -->
					<div class="tab-pane <?php echo $dft;?>" id="tab-panier" role="tabpanel">
						<div class="col-sm-10 col-sm-offset-1 hidden clsucces">
							<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
							  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
							  <div class="alert-message">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">
									<i class="zmdi zmdi-close"></i>
								  </span>
								</button>
								<strong> Hotelia !</strong> Facturation effectuée avec success. Merci
								<button type="button" class="btn btn-space btn-primary" onclick="direct();">
								  <span aria-hidden="true">
									<i class="zmdi zmdi-print"> Imprimer la Facture N° <?php echo $code_fact;?></i>
								  </span>
								</button>
							  </div>
							</div>
						</div>
						<div class="col-sm-10 col-sm-offset-1 hidden clrr">
							<div class="alert alert-warning alert-icon-bg alert-dismissable" role="alert">
								<div class="alert-icon">
									<i class="zmdi zmdi-alert-triangle"></i>
								</div>
								<div class="alert-message">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">
											<i class="zmdi zmdi-close"></i>
										</span>
									</button>
									<strong>Hotelia !</strong> Pour charger un nouveau panier Vous devez remplir le menu et le type de prix [ Boisson, Plat ou Autres services]
								</div>
							</div>
						</div>
						<form action="#" method="POST" class="fvente"> <input type="hidden" name="type" value="confirmation_de_la_vente">
							<div class="clearfix p-y-20 p-x-30">
								<h4 class="pull-sm-left"> PANIER DE CLIENT <?php if($tablecmd=="PS"){ ?><i class="zmdi zmdi-check-circle text-success m-l-5"></i> <?php } else { ?> <i class="zmdi zmdi-check-circle text-default m-l-5 panier" id="panier_pan"></i> <input type="hidden" id="code_panier_pan" value="PS"> <?php } ?></h4>
								<select name="code_checkin" class="btn btn-outline-primary pull-sm-right" style="align:right" >
									<option class="zmdi zmdi-plus" value="0"> Imputer La facture à une chambre</option><?php $qoi=$bd->query("SELECT * FROM checkin NATURAL JOIN chambre WHERE confirmation_checkout = 'attente' ORDER BY date_checkin"); while($ok=$qoi->fetch()){ ?>
									<option value="<?php echo $ok['code_checkin']; ?>"><?php echo stripslashes($ok['nom_chambre']." | Du ".$ok['date_checkin']." au ".$ok['date_checkout']); ?></option>  <?php } ?>
								</select>
							</div>
							<!-- Les Alertes En cas d'erreurs -->
							<div class="panel panel-default panel-table drr">
								<div class="panel-body dvt" id="bon_achat">
									<table class="table table-condensed hug dvt" style="width:100%">
										<thead>
											<tr><input type="hidden" name="code_fact" value="<?php echo $code_fact; ?>"> 
												<th rowspan=2>Libellé</th>
												<th colspan=3> Prix de vente et quantité vendue</th>
												<th rowspan=2 class="number">Action <input type="hidden" name="tablecmd" value="PS">  <input name="guichet"  id="guichet" type="hidden" value="<?php echo $guichet;?>" >
													<a href="#" class="btn btn-danger btn-xs" onclick="delete_achat()"><i class="zmdi zmdi-delete"></i></a>
												</th>
											</tr>
											<tr>
												<th class="number">Prix Unitaire</th>
												<th class="number">Quantité </th>
												<th class="number">Prix total</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$pa=$bd->query("SELECT * FROM panier_client PC INNER JOIN plat_resto PR ON PR.code_plat = PC.code_plaser WHERE table_cmd = 'PS' AND type_oper = 'rst' AND username = '".$_SESSION['username']."' "); $total = $y=0; while($nier=$pa->fetch()){ $y++; 
										?>
											<tr><?php $total = $total + $nier['prix_total'];?>
												<td><?php echo $y." . ".$nier['plat'];?></td>
												<td class="number"><?php echo $nier['prix_unit']." FF";?></td>
												<td class="number"><?php echo $nier['qte'];?></td>
												<td class="number"><?php echo $nier['prix_total']." FF";?></td>
												<td class="number">
													<a href="#" class="btn btn-primary btn-xs"><i class="zmdi zmdi-edit"></i></a>
													<label class="custom-control custom-control-danger custom-checkbox">
														<input class="custom-control-input" type="checkbox" id="code_panier<?php echo $nier['code_panier'];?>" value="<?php echo $nier['code_panier'];?>">
														<span class="custom-control-indicator"></span>
													</label>
												</td>
											</tr>
										<?php
										}
										$pa_=$bd->query("SELECT * FROM panier_client PC INNER JOIN doz_bar DB ON DB.code_doz = PC.code_plaser WHERE table_cmd = 'PS' AND type_oper = 'bar' AND username = '".$_SESSION['username']."' "); while($nier_=$pa_->fetch()){ $y++; 
										?>
											<tr><?php $total = $total + $nier_['prix_total'];?>
											  <td><?php echo $y." . ".$nier_['boisson'];?></td>
											  <td class="number"><?php echo $nier_['prix_unit']." FF";?></td>
											  <td class="number"><?php echo $nier_['qte'];?></td>
											  <td class="number"><?php echo $nier_['prix_total']." FF";?></td>
											  <td class="number">
												<a href="#" class="btn btn-primary btn-xs"><i class="zmdi zmdi-edit"></i></a>
													<label class="custom-control custom-control-danger custom-checkbox">
														<input class="custom-control-input" type="checkbox" id="code_panier<?php echo $nier_['code_panier'];?>" value="<?php echo $nier_['code_panier'];?>">
														<span class="custom-control-indicator"></span>
													</label>
											  </td>
											</tr>
										<?php
										}
										?>
										</tbody>
									</table>
									<hr>
									<center class="row" style="width:100%">
										<div class="col-lg-4 col-sm-4 col-xs-6 m-y-5"> <input type="hidden" name="montant_total" value="<?php echo $total;?>">
											<button type="<?php if($total<=0){echo "button";}else{echo "submit";}?>" class="btn btn-success btn-labeled" name="save_vente">Confirmer Vente
												<span class="btn-label btn-label-right">Total : <?php echo $total." FF";?></span>
											</button>
										</div>
										<div class="col-lg-4 col-sm-4 col-xs-6 m-y-5">
											<button type="button" class="btn btn-success btn-labeled"> Client
												<span class="btn-label btn-label-right"><input type="text" name="client" style="color:black; width:100px" required /></span>
											</button>
										</div>
										<div class="col-lg-4 col-sm-4 col-xs-6 m-y-5">
											<button type="button" class="btn btn-danger btn-labeled" onclick="<?php if($total<=0){echo "";}else{echo "annul_achat()";}?>">Annuler
												<span class="btn-label btn-label-right"> l'Achat</span>
											</button>
										</div>
									</center>
								</div>
							</div>
						</form>
					</div>
				  <?php $tabb=$bd->query("SELECT * FROM panier_client WHERE username = '".$_SESSION['username']."' AND table_cmd <> 'PS' GROUP BY table_cmd"); while($divb=$tabb->fetch()){  $spcb=""; if($divb['table_cmd']==$tc){ $spcb="active";}else {$spcb="";}?>
				  <!-- table cmd panier-->
					<div class="tab-pane <?php echo $spcb;?>" id="tab-<?php echo str_replace(" ","_",$divb['table_cmd']);?>" role="tabpanel">
						<form action="#" method="POST" class="fvente"> <input type="hidden" name="type" value="confirmation_de_la_vente">
							<div class="clearfix p-y-20 p-x-30">
								<h4 class="pull-sm-left"> PANIER DE [** <?php echo $divb['table_cmd'];?> **] <?php if($tablecmd==$divb['table_cmd']){ ?><i class="zmdi zmdi-check-circle text-success m-l-5"></i> <?php } else { ?> <i class="zmdi zmdi-check-circle text-default m-l-5 panier" id="panier<?php echo str_replace(" ","_",$divb['table_cmd']);?>"></i> <input type="hidden" id="code_panier<?php echo str_replace(" ","_",$divb['table_cmd']);?>" value="<?php echo $divb['table_cmd'];?>" > <?php } ?></h4>
								<select name="code_checkin" class="btn btn-outline-primary pull-sm-right" style="align:right" >
									<option class="zmdi zmdi-plus" value="0"> Imputer La facture à une chambre</option><?php $qoi=$bd->query("SELECT * FROM checkin NATURAL JOIN chambre WHERE confirmation_checkout = 'attente' ORDER BY date_checkin"); while($ok=$qoi->fetch()){ ?>
									<option value="<?php echo $ok['code_checkin']; ?>"><?php echo stripslashes($ok['nom_chambre']." | Du ".$ok['date_checkin']." au ".$ok['date_checkout']); ?></option>  <?php } ?>
								</select>
							</div>
							<div class="panel panel-default panel-table drr">
								<div class="panel-body dvt" id="bon_achat">
									<table class="table table-condensed hug dvt" style="width:100%">
										<thead>
											<tr>  <input type="hidden" name="code_fact" value="<?php echo $code_fact; ?>">
											    <th rowspan=2>Libellé</th>
											    <th colspan=3> Prix de vente et quantité vendue</th>
											    <th rowspan=2 class="number">Action <input type="hidden" name="tablecmd" value="<?php echo $divb['table_cmd'];?>">  <input name="guichet"  id="guichet" type="hidden" value="<?php echo $guichet;?>" >
												    <a href="#" class="btn btn-danger btn-xs" onclick="delete_achat()"><i class="zmdi zmdi-delete"></i></a>
											    </th>
											</tr>
											<tr>
											    <th class="number">Prix Unitaire</th>
											    <th class="number">Quantité </th>
											    <th class="number">Prix total</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$pa=$bd->query("SELECT * FROM panier_client PC INNER JOIN plat_resto PR ON PR.code_plat = PC.code_plaser WHERE table_cmd = '".$divb['table_cmd']."' AND type_oper = 'rst' AND username = '".$_SESSION['username']."' "); $total = $y=0; while($nier=$pa->fetch()){ $y++; 
											?>
											<tr><?php $total = $total + $nier['prix_total'];?>
											    <td><?php echo $y." . ".$nier['plat'];?></td>
											    <td class="number"><?php echo $nier['prix_unit']." FF";?></td>
											    <td class="number"><?php echo $nier['qte'];?></td>
											    <td class="number"><?php echo $nier['prix_total']." FF";?></td>
											    <td class="number">
												    <a href="#" class="btn btn-primary btn-xs"><i class="zmdi zmdi-edit"></i></a>
												    <label class="custom-control custom-control-danger custom-checkbox">
														<input class="custom-control-input" type="checkbox" id="code_panier<?php echo $nier['code_panier'];?>" value="<?php echo $nier['code_panier'];?>">
														<span class="custom-control-indicator"></span>
												    </label>
											    </td>
											</tr>
											<?php
											}
											$pa_=$bd->query("SELECT * FROM panier_client PC INNER JOIN doz_bar DB ON DB.code_doz = PC.code_plaser WHERE table_cmd = '".$divb['table_cmd']."' AND type_oper = 'bar' AND username = '".$_SESSION['username']."' "); while($nier_=$pa_->fetch()){ $y++; 
											?>
											<tr><?php $total = $total + $nier_['prix_total'];?>
											    <td><?php echo $y." . ".$nier_['boisson'];?></td>
											    <td class="number"><?php echo $nier_['prix_unit']." FF";?></td>
											    <td class="number"><?php echo $nier_['qte'];?></td>
											    <td class="number"><?php echo $nier_['prix_total']." FF";?></td>
											    <td class="number">
													<a href="#" class="btn btn-primary btn-xs"><i class="zmdi zmdi-edit"></i></a>
													<label class="custom-control custom-control-danger custom-checkbox">
														<input class="custom-control-input" type="checkbox" id="code_panier<?php echo $nier_['code_panier'];?>" value="<?php echo $nier_['code_panier'];?>">
														<span class="custom-control-indicator"></span>
													</label>
											    </td>
											</tr>
											<?php
											}
											?>
										</tbody>
									</table>
									<hr>
									<center class="row" style="width:100%">
										<div class="col-lg-4 col-sm-4 col-xs-6 m-y-5"> <input type="hidden" name="montant_total" value="<?php echo $total;?>">
											<button type="<?php if($total<=0){echo "button";}else{echo "submit";}?>" class="btn btn-success btn-labeled" name="save_vente">Confirmer Vente
												<span class="btn-label btn-label-right">Total : <?php echo $total." FF";?></span>
											</button>
										</div>
										<div class="col-lg-4 col-sm-4 col-xs-6 m-y-5">
											<button type="button" class="btn btn-success btn-labeled"> Client
												<span class="btn-label btn-label-right"><input type="text" name="client" style="color:black; width:100px" required /></span>
											</button>
										</div>
										<div class="col-lg-4 col-sm-4 col-xs-6 m-y-5">
											<button type="button" class="btn btn-danger btn-labeled" onclick="<?php if($total<=0){echo "";}else{echo "annul_achat()";}?>">Annuler
												<span class="btn-label btn-label-right"> l'Achat</span>
											</button>
										</div>
									</center>
								</div>
							</div>
						</form>
					</div>
				<?php } ?>  
				</div>
			</div>
			<div class="widget widget-tile hidden" id="fact" style="padding:3px;margin:0px;"> <?php $swali0=$bd->query("SELECT * FROM hotel WHERE code_hotel = 1"); $jibu0=$swali0->fetch(); $hotel=$jibu0['nom_hotel']; $logo=$jibu0['logo']; $rccm=$jibu0['registre_commerce']; $adress=$jibu0['adresse_physique']; $contact=$jibu0['telephone']; $mail=$jibu0['mail'];?>
				<i>
					<?php echo "<table style='font-size:10px;'> <tr><th rowspan=4> <img src='$logo' style='width:80px'/> </th></tr>  <tr><th> $hotel </th></tr>  <tr><th> $rccm </th></tr>  <tr><th> $adress </th></tr></table>"; $TG=$TGdol=0;?>
				</i>
				<div class="panel panel-default panel-table drr">
					<div class="panel-body dvt" style="padding:1px;">
						<center><b> FACTURE </b> <br>N° : <?php echo $code_fact;?> <br><?php echo date('d-m-Y h:i');?></center>
						<hr/>
						<?php
						$client=$bd->query("SELECT * FROM facture WHERE code_fact = '".$code_fact."' ");
						while($nom=$client->fetch()){ ?> 							
							<table class="table table-bordered m-b-0 hug" style="font-size:12px">
								<caption>
									<p class="row">
										<i class="col-md-3"> Nom : </i>
										<b class="col-md-9"><?php echo $nom['client'];?> </b>
									</p>
								</caption>
								<thead>
									<tr>
										<th style="padding:0;width:2%"> </th>
										<th style="padding:0;width:58%"> Libellé </th>
										<th style="padding:0;" class="number"> Qté </th>
										<th style="padding:0;" class="number"> PU </th>
										<th style="padding:0;" class="number"> Tot. </th>
									</tr>
								</thead>
								<tbody>
								<?php
								$i=0;
								$rst=$bd->query("SELECT * FROM vente V INNER JOIN plat_resto PR ON V.code_plaser = PR.code_plat WHERE V.type_oper = 'rst' AND V.code_fact = '".$code_fact."' GROUP BY V.code_vente");
								if($rst->rowCount()>0)
								{
								  while($rep=$rst->fetch())
									{
									$i++; 
									?>
									<tr style="padding:0;">
										<td style="padding:0;"> <?php echo $i;?></td>
										<td style="padding:0;" class="user-avatar"> <?php echo $rep['plat'];?> </td>
										<td style="padding:0;" class="number"> <?php echo $rep['qte'];?> </td>
										<td style="padding:0;" class="number"> <?php echo round($rep['prix_unit'],4);?> </td>
										<td style="padding:0;" class="number"> <?php echo round($rep['prix_total'],4);?> </td>
									</tr>
									<?php
									}
								}
								$bar=$bd->query("SELECT * FROM vente V INNER JOIN doz_bar DB ON V.code_plaser = DB.code_doz WHERE V.type_oper = 'bar' AND V.code_fact = '".$code_fact."' GROUP BY V.code_vente");
								if($bar->rowCount()>0)
								{
								  while($repp=$bar->fetch())
									{
									$i++; 
									?>
									<tr style="padding:0;">
										<td style="padding:0;"> <?php echo $i;?></td>
										<td style="padding:0;" class="user-avatar"> <?php echo $repp['boisson'];?> </td>
										<td style="padding:0;" class="number"> <?php echo $repp['qte'];?> </td>
										<td style="padding:0;" class="number"> <?php echo round($repp['prix_unit'],4);?> </td>
										<td style="padding:0;" class="number"> <?php echo round($repp['prix_total'],4);?> </td>
									</tr>
									<?php
									}
								}
								/* $autre=$bd->query("SELECT * FROM ventes V INNER JOIN doz_bar DB ON V.code_plaser = DB.code_doz WHERE V.type_oper = 'bar' AND V.code_fact = '".$_GET['code_fact']."' GROUP BY DB.boisson");
								if($bar->rowCount()>0)
								{
								  while($repp=$bar->fetch())
									{
									$i++; 
									?>
									  <tr style="padding:0;">
										<td style="padding:0;"> <?php echo $i;?></td>
										<td style="padding:0;" class="user-avatar"> <?php echo $rep['boisson'];?> </td>
										<td style="padding:0;" class="number"> <?php echo $repp['qte'];?> </td>
										<td style="padding:0;" class="number"> <?php echo round($repp['prix'],4);?> </td>
										<td style="padding:0;" class="number"> <?php echo round($repp['total'],4);?> </td>
									  </tr>
									<?php
									}
								}*/
								?>
								</tbody>
								<tfoot>
									<tr>
										<th> </th> <th style="padding:0;" class="number"> Tot. Resto </th> <th style="padding:0;" class="number"> Tot. Bar </th> <th style="padding:0;" class="number"> Autres Tot. </th> <th style="padding:0;" class="number"> Tot. Gén </th>
									</tr>
									<tr>
										<th style="padding:0;" class="number"> T </th> <th style="padding:0;" class="number"> <?php echo $nom['total_resto'];?> </th> <th style="padding:0;" class="number"> <?php echo $nom['total_bar'];?> </th> <th style="padding:0;" class="number"> <?php echo $nom['total_autre'];?> </th> <th style="padding:0;" class="number"> <?php echo $nom['total'];?> </th>
									</tr>
									<!--<tr>
										<th style="padding:0;" colspan=2> TVA </th> <th style="padding:0;" colspan=3 style="font-size:12px;" class="number"> <?php echo "0"; round(($tout_tot * 16)/100,4); ?> $</th>
									</tr>
									<tr>
										<th style="padding:0;" colspan=2> Total à Payer </th> <th style="padding:0;" colspan=3 style="font-size:12px;" class="number"> <?php echo round($tout_tot,4); ?> $</th>
									</tr>
									<tr>
										<th style="padding:0;" colspan=2> Total En Fc </th> <th style="padding:0;" colspan=3 style="font-size:12px;" class="number"> <?php echo $tot_dol; ?> Fc</th>
									</tr>-->
								</tfoot>
							</table>
							
						<p class="row text-right">
							<b class="col-md-4"> Tot. Gén. </b>
							<b class="pull-right col-md-4"><?php echo $nom['total'];?> $</b>
							<b class="pull-right col-md-4"><?php echo $nom['total']*1600;?> Fc</b>
						</p><i><b> Nous somme à votre service !</b> <br> NB. Vous pouvez efféctuer le paiement sur le guichet de votre choix.</i></p>
						<span style="padding:1px;"> -- <?php echo $hotel.", ".$contact." | ".$mail;?> --</span>
						<?php 
						}
					  ?>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				function direct() 
				{
					$("#fact").removeClass("hidden");
					$.print("#fact");
					$("#fact").addClass("hidden");
				}
			</script>
	<?php
	}
	
	// Actualisation du Div vente du jour 
	else if($type == "reload_vente_jr")
	{
		$code_guichet = $_POST['code_guichet'];
		$vente_jour = $bd->query("SELECT SUM(total) TOTAL, SUM(total_resto) TOTAL_R, SUM(total_bar) TOTAL_B, SUM(total_autre) TOTAL_A FROM facture F WHERE code_guichet = ".$code_guichet." AND date_fact = '".date('Y-m-d')."' AND code_checkin = 0 "); $dujour=$vente_jour->fetch(); $TOTAL=$dujour['TOTAL']; $TOTAL_B=$dujour['TOTAL_B']; $TOTAL_R=$dujour['TOTAL_R']; $TOTAL_A=$dujour['TOTAL_A']; ?>
			<div class="wt-content p-a-20 p-b-50">
				<div class="wt-title">Vente Du Jours</div>
				<div class="wt-number"><?php echo $TOTAL; ?> $</div>
				<div class="wt-text"> <?php echo "BOISSON : ".$TOTAL_B."$, RESTO : ".$TOTAL_R."$, AUTRES : ".$TOTAL_A."$"; ?></div>
			</div>
			<div class="wt-icon">
				<i class="zmdi zmdi-shopping-basket"></i>
			</div>
			<div class="wt-chart">
				<span id="peity-chart-2"><?php echo $TOTAL_B.",".$TOTAL_R.",".$TOTAL_A; ?></span>
			</div>
			<script src="js/dashboard-2.min.js"></script>
		<?php	
	}
	
	// Actualisation du Div panier en cours 
	else if($type == "reload_panier_en_cours")
	{
		$code_guichet = $_POST['code_guichet'];
		?>
			<div class="wt-content p-a-20 p-b-50">
				<div class="wt-title">LES PANIERS EN COURS</div>
			</div>
			<div class="wt-icon">
				<i class="zmdi zmdi-shopping-basket"></i> => <i class="zmdi zmdi-money-box"></i>
			</div>
			<?php $panier_encours = $bd->query("SELECT *,SUM(prix_total) TOT FROM panier_client WHERE code_guichet = ".$code_guichet." AND username = '".$_SESSION['username']."' GROUP BY table_cmd");
				$i=0; ?>
				<div class="panel-group bg-primary" id="accordionOne" role="tablist" aria-multiselectable="true">
					<?php while($cours=$panier_encours->fetch())
					{ $i++;
					  ?>
					  <div class="panel panel-default bg-primary">
						<div class="panel-heading" role="tab">
						  <h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordionOne" href="#accordion-<?php echo $i;?>" aria-expanded="true">
							  <i class="zmdi zmdi-chevron-down"></i> <i class="zmdi zmdi-shopping-basket"></i> <?php echo $cours['table_cmd']."=>".$cours['TOT'];?> 
							</a>
						  </h4>
						</div>
						<div id="accordion-<?php echo $i;?>" class="panel-collapse collapse" role="tabpanel">
						  <div class="panel-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia non massa a euismod. Nam bibendum mauris mollis, ultricies orci vitae, tristique est. Mauris pellentesque justo ut est fringilla imperdiet.</p>
						  </div>
						</div>
					  </div>
					<?php
					}
					?>
				</div>
		<?php
	}
	
	// Actualisation du Div panier en cours 
	else if($type == "reload_menu_in_case")
	{
		$code_guichet = $_POST['code_guichet'];
		?>
			<option value="0">Sélectionnez un Menu</option>
			<?php $qoi=$bd->query("SELECT * FROM plat_resto NATURAL JOIN categorie_plat ORDER BY plat"); while($ok=$qoi->fetch()){ ?>
			<option value="rst<?php echo $ok['code_plat']; ?>"><?php echo stripslashes($ok['plat']." | ".$ok['composant']." | ".$ok['categ_plat']." Dispo :".$ok['dispo']); ?></option>  <?php } ?>
			<?php $qois=$bd->query("SELECT * FROM (stock_guichet NATURAL JOIN doz_bar) NATURAL JOIN categorie_doz WHERE code_guichet = ".$code_guichet." ORDER BY boisson "); while($oks=$qois->fetch()){ ?>
			<option value="bar<?php echo $oks['code_doz']; ?>"><?php echo stripslashes($oks['boisson']." | ".$oks['unite']." | S.Disp :".$oks['qte_dispo']." | Exp: ".$oks['date_peremption']." | ".$oks['categorie']); ?></option>  <?php } ?>
		<?php
	}
	
/*################################################################################################################################################################################
############################################################################ PAYEMENT ###############################################################################################-->

	spercevoir la facture */
	else if($type == "apercevoir_une_fact")
	{
		$code_fact = $_POST['code_fact']; $gui=$bd->query("SELECT * FROM guichet_user WHERE au = '0000-00-00' AND username = '".$_SESSION['username']."' "); $cht=$gui->fetch(); if($gui->rowCount()>0){$guichet_encour=$cht['code_guichet'];}else{$guichet_encour=0;}
		$info_facture=$bd->query("SELECT * FROM (facture NATURAL JOIN guichet) NATURAL JOIN utilisateur WHERE code_fact = '".$code_fact."' "); $rep=$info_facture->fetch(); $client=$rep['client']; $guichet_fac=$rep['nom_guichet']; $user_fac=$rep['nom_complet']; $user_fac_tel=$rep['telephone']; $user_fac_mail=$rep['mail']; $Tresto=$rep['total_resto']; $Tbar=$rep['total_bar']; $Tautre=$rep['total_autre']; $Total=$rep['total'];
		$info_hotel=$bd->query("SELECT * FROM hotel WHERE code_hotel = 1 "); $repo=$info_hotel->fetch(); $hotel=$repo['nom_hotel']; $site=$repo['site']; $tel=$repo['telephone']; $logo=$repo['logo']; $adress=$repo['adresse_physique'];?>
		<div class="panel panel-default m-b-0">
			<div class="panel-heading">
				<h3 class="m-y-0 pull-left">Facture N° : <?php echo $code_fact; ?> </h3> <h3 class="m-y-0 pull-right">Client : <?php echo $client; ?> </h3>
			</div>
			<div class="panel-body">
				<div class="row m-b-30">
					<div class="col-sm-6">
						<h4> <img src="<?php echo $logo;?>" height=48 width=48 class="zmdi zmdi-apple zmdi-hc-3x m-r-10"/> <?php echo $hotel;?></h4>
						<p><a class="text-primary" href="#"><?php echo $site;?></a></p>
						<p><?php echo $adress;?> </p>
						<p class="m-b-0">Telephone: <?php echo $tel;?></p>
					</div>
					<div class="col-sm-6">
						<h4> <i class="zmdi zmdi-desktop-mac zmdi-hc-3x m-r-10"></i> <?php echo $guichet_fac;?></h4>
						<p><a class="text-primary" href="#"><?php echo $user_fac_mail;?></a></p>
						<p><?php echo $user_fac;?></p>
						<p class="m-b-0">Telephone: <?php echo $user_fac_tel;?></p>
					  </div>
				</div>
				<table class="table table-bordered m-b-30">
					<thead>
						<tr>
							<th>#</th>
							<th> Description </th>
							<th> Qte </th>
							<th> Prix U </th>
							<th> Prix Total </th>
						</tr>
					</thead>
					<tbody>
					<?php $k=0;
					$rst=$bd->query("SELECT * FROM vente V INNER JOIN plat_resto PR ON V.code_plaser = PR.code_plat WHERE V.type_oper = 'rst' AND V.code_fact = '".$code_fact."' GROUP BY V.code_vente");
						if($rst->rowCount()>0)
						{
						  while($rep=$rst->fetch())
							{ $k++; 
							?>
							<tr>
								<td><?php echo $k;?></td>
								<td><?php echo $rep['plat'];?></td>
								<td><?php echo $rep['qte'];?> </td>
								<td>$<?php echo round($rep['prix_unit'],4);?></td>
								<td>$<?php echo round($rep['prix_total'],4);?></td>
							</tr>
							<?php
							}
						}
						$bar=$bd->query("SELECT * FROM vente V INNER JOIN doz_bar DB ON V.code_plaser = DB.code_doz WHERE V.type_oper = 'bar' AND V.code_fact = '".$code_fact."' GROUP BY V.code_vente");
						if($bar->rowCount()>0)
						{
						  while($repp=$bar->fetch())
							{ $k++; 
							?>
							<tr>
								<td><?php echo $k;?></td>
								<td><?php echo $repp['boisson'];?></td>
								<td><?php echo $repp['qte'];?> </td>
								<td>$<?php echo round($repp['prix_unit'],4);?></td>
								<td>$<?php echo round($repp['prix_total'],4);?></td>
							</tr>
							<?php
							}
						}
						$srv=$bd->query("SELECT * FROM vente V INNER JOIN service S ON S.code_serv = V.code_plaser WHERE V.type_oper = 'srv' AND V.code_fact = '".$code_fact."' GROUP BY V.code_vente");
						if($srv->rowCount()>0)
						{
						  while($reppp=$srv->fetch())
							{ $k++; 
							?>
							<tr>
								<td><?php echo $k;?></td>
								<td><?php echo $reppp['service']."[".$reppp['unite']."]";?></td>
								<td><?php echo $reppp['qte'];?> </td>
								<td>$<?php echo round($reppp['prix_unit'],4);?></td>
								<td>$<?php echo round($reppp['prix_total'],4);?></td>
							</tr>
							<?php
							}
						}
						?>
						<tr>
							<td scope="row" colspan="4">
								<div class="text-right">
									T. Resto
									<br> T. Bar
									<br> T. Autres
									<br>
									<strong>TOTAL</strong>
								</div>
							</td>
							<td>
								$<?php echo $Tresto;?>
								<br> $<?php echo $Tbar;?>
								<br> $<?php echo $Tautre;?>
								<br>
								<strong>$<?php echo $Total;?></strong>
							</td>
						</tr>
					</tbody>
				</table>
				<span id="body_recu">
					<div class="row m-b-30 hidden head_recu">
						<div class="col-sm-6">
							<h4> <img src="<?php echo $logo;?>" height=48 width=48 class="zmdi zmdi-apple zmdi-hc-3x m-r-10"/> <?php echo $hotel;?></h4>
							<p><a class="text-primary" href="#"><?php echo $site;?></a></p>
							<p><?php echo $adress;?> </p>
							<p class="m-b-0">Telephone: <?php echo $tel;?></p>
						</div>
						<div class="col-sm-6">
							<h4> RECU N° <span id="num_recu">...</span></h4>
							<p>Du <?php echo date('d-m-Y H:i');?></a></p>
							<p>Par : <?php echo $_SESSION['nom_complet'];?></p>
							<p class="m-b-0">Facture : <?php echo $code_fact;?></p>
						</div>
					</div>
					<div class="row m-b-30">
					<?php
					$recu=$bd->query("SELECT *, IFNULL(SUM(P.montant_paye),0) deja_payes FROM payment P WHERE P.code_fact='".$code_fact."' "); $cu=$recu->fetch(); $deja_payes=$cu['deja_payes']; $solde = $Total - $deja_payes;
					?>
						<div class="col-sm-4">
							<h4> STUATION FACTURE </h4>
							<table class="table table-bordered-hover">
								<tr>
									<td>Montant du </td> <td>$ <?php echo $Total;?> <input type="hidden" id="montant_du" value="<?php echo $Total;?>"></td>
								</tr>
								<tr>
									<td>Déjà payé </td> <td id="ex_deja_payes">$ <?php echo $deja_payes;?></td> <input type="hidden" id="deja_payes" value="<?php echo $deja_payes;?>"></td>
								</tr>
								<tr>
									<td>Reste à payer</td> <td id="ex_solde">$ <?php echo $solde;?> </td><input type="hidden" id="solde" value="<?php echo $solde;?>">
								</tr>
							</table>
						</div>
						<div class="col-sm-8">
							<h4>RECEPTION PAIEMENT</h4><input type="hidden" id="code_fact" value="<?php echo $code_fact; ?>"> <input type="hidden" id="code_paye" value="0"> <input type="hidden" id="guichet" value="<?php echo $guichet_encour;?>">
							<table class="table table-bordered-hover"> 
								<tr>
									<td>Montant reçu </td> <td> <span class="hidden" id="voir_montant_paye"></span><input id="montant_paye" name="montant_paye" autocomplete="off" autofocus class="form-control input-pill" type="number"></td>
								</tr>
								<tr>
									<td>Payé par</td> <td> <span class="hidden" id="voir_payeur"> </span><input id="payeur" name="payeur" class="form-control input-pill" type="text"> </td>
								</tr>
								<tr>
									<td>Solde</td> <td id="voir_solde">$ <?php echo $solde;?></td><input id="soldenow" name="soldenow" value="<?php echo $solde;?>" type="hidden">
								</tr>
							</table>
						</div>
					</div>
					<div class="row m-b-30 hidden head_recu">
						<i> Nous somme à votre service !</i>
					</div>
				</span>
			</div>
			<div class="panel-footer text-right">
				<button type="button" class="btn btn-success btn-labeled save_payment" id="savpayment">Enregistrer paiement
					<span class="btn-label btn-label-right p-x-10">
						<i class="zmdi zmdi-save"></i>
					</span>
				</button>
				<button type="button" class="btn btn-primary btn-labeled save_print" id="savprint">Enregistrer et Imprimer
					<span class="btn-label btn-label-right p-x-10">
						<i class="zmdi zmdi-print"></i>
					</span>
				</button>
				<button type="button" class="btn btn-warning btn-labeled">Download
					<span class="btn-label btn-label-right p-x-10">
						<i class="zmdi zmdi-download"></i>
					</span>
				</button>
			</div>
		</div>
		<div id="suite_enregistrement"></div>
		<script type="text/javascript">
			$(document).ready(function(){
				payment_page(); 
			});	
		</script>
		<?php
	}
	/* payement la facture */
	else if($type == "save_invoce_payment")
	{
		$code_fact = $_POST['code_fact'];$solde = $_POST['solde'];$code_paye = $_POST['code_paye'];$payeur = $_POST['payeur'];$type_oper = $_POST['type_oper'];$montant_du = $_POST['montant_du'];$montant_paye = $_POST['montant_paye'];$date_paye = date('Y-m-d');$code_guichet = $_POST['guichet'];$username = $_SESSION['username'];$deja_payes = $montant_du-$solde; if($solde == $montant_du){ $statut_paye = "A-PAYER";} else if($solde == 0){ $statut_paye = "SOLDEE";} else if($solde > 0 AND $solde < $montant_du){$statut_paye="A-SOLDER"; } else {$statut_paye="SOLDEE-PLUS";}
		if($code_paye==0 AND $montant_paye <= 0){
			$genercle=$bd->query("SELECT AUTO_INCREMENT AS last FROM INFORMATION_SCHEMA.TABLES WHERE table_name='payment'"); $ratecle=$genercle->fetch(); $code_paye=$ratecle['last'];
			$bd->exec("INSERT INTO payment VALUE(null,'".$payeur."','".$type_oper."','".$statut_paye."',".$montant_du.",".$montant_paye.",'".$date_paye."','".$code_fact."',".$code_guichet.",'".$username."')");
			?> <script type="text/javascript"> $(document).ready(function(){ $("#ex_deja_payes").html("<?php echo "$ ".$deja_payes;?>"); $("#deja_payes").val("<?php echo $deja_payes;?>"); });	</script> <?php
		}
		else{
			$payment=$bd->query("SELECT * FROM payment P WHERE P.code_fact='".$code_fact."' AND P.code_payment = ".$code_paye." "); if($payment->fetch()<1){
				$genercle=$bd->query("SELECT AUTO_INCREMENT AS last FROM INFORMATION_SCHEMA.TABLES WHERE table_name='payment'"); $ratecle=$genercle->fetch(); $code_paye=$ratecle['last'];
				$bd->exec("INSERT INTO payment VALUE(null,'".$payeur."','".$type_oper."','".$statut_paye."',".$montant_du.",".$montant_paye.",'".$date_paye."','".$code_fact."',".$code_guichet.",'".$username."')");
				?> <script type="text/javascript"> $(document).ready(function(){ $("#ex_deja_payes").html("<?php echo "$ ".$deja_payes;?>"); $("#deja_payes").val("<?php echo $deja_payes;?>"); });	</script> <?php
			} else {}
		}
		?> <script type="text/javascript"> $(document).ready(function(){ $("#code_paye").val(<?php echo $code_paye;?>); 
				window.stopfonction = true; payment_page(); 
			});	
		</script> <?php
	}
	/* payement la facture */
	else if($type == "search_invoce")
	{
		$type_client = substr($_POST['code_client'],0,6); $code_client = substr($_POST['code_client'],6,15); $trie = $_POST['trie']; $table="client_moral"; if($type_client=="client"){ $table="client"; }
		$clientel=$bd->query("SELECT * FROM ".$table." WHERE code_client=".$code_client." "); $le=$clientel->fetch(); $nom_client=$le['nom_complet'];
		?>
		<div class="clearfix p-y-20 p-x-30">
			<h4 class="pull-sm-left"> LES FACTURES DU CLIENT : <i style="color:#aad3ad"><?php echo $type_client." ".$nom_client;?></i> </h4>
		</div>
		<div class="panel panel-default panel-table drr">
			<div class="panel-body dvt">
				<div class="pc-task">
					<div class="" data-dismiss="Panel" aria-hidden="true">
						<div class="catalog-products">
							<div class="row gutter-sm">
								<?php
								$facture = $bd->query("SELECT *,F.code_fact code_fact,IFNULL(SUM(P.montant_paye),0) deja_paye FROM (facture F LEFT JOIN payment P ON F.code_fact = P.code_fact) INNER JOIN attribution_fact AF ON F.code_fact = AF.code_fact WHERE AF.type_client = '".$table."' AND AF.code_client = '".$code_client."' GROUP BY F.code_fact ORDER BY F.date_fact DESC"); if($facture->rowCount()>0)
								{
									while($fac=$facture->fetch()){	$statut=""; $code_fact=$fac['code_fact']; $client=$fac['client']; $total=$fac['total']; $deja_paye=$fac['deja_paye']; if($deja_paye == 0){ $statut="<div class='cp-label bg-danger dv'>A PAYER</div>"; }elseif($deja_paye < $total){ $statut="<div class='cp-label bg-warning dv'>A SOLDER</div>"; } else { $statut="<div class='cp-label bg-success dv'>PAYE</div>"; }
										if($trie=="trie2"){
											if($total > $deja_paye){ 
												?>
												<div class="col-md-2 col-sm-6" style="margin-top:-20px;margin-bottom:-20px;">
													<div class="c-product" style="background-color:#dbdbdb;">
														<a class="be-toggle-right-sidebar cp-img FACTURE" id="FACTURE<?php echo $code_fact; ?>" style="background-image: url(img/photos/2.jpg);height:80px"> <input type="hidden" id="code_FACTURE<?php echo $code_fact; ?>" value="<?php echo $code_fact; ?>">
															<?php echo $statut; ?>
														</a>
														<div class="cp-content">
															<div class="cp-title">Total : <b><?php echo $total;?> $</b></div>
															<div class="cp-price">
																<p><?php echo $client;?></p>
															</div>
														</div>
													</div>
												</div>
												<?php
											}
										}
										else if($trie=="trie1"){
											if($total <= $deja_paye){ 
												?>
												<div class="col-md-2 col-sm-6" style="margin-top:-20px;margin-bottom:-20px;">
													<div class="c-product" style="background-color:#dbdbdb;">
														<a href="#tab-payement" data-toggle="tab" role="tab" class="be-toggle-right-sidebar cp-img FACTURE" id="FACTURE<?php echo $code_fact; ?>" style="background-image: url(img/photos/2.jpg);height:80px"> <input type="hidden" id="code_FACTURE<?php echo $code_fact; ?>" value="<?php echo $code_fact; ?>">
															<?php echo $statut; ?>
														</a>
														<div class="cp-content">
															<div class="cp-title">Total : <b><?php echo $total;?> $</b></div>
															<div class="cp-price">
																<p><?php echo $client;?></p>
															</div>
														</div>
													</div>
												</div>
												<?php
											}
										}
										else {
											?>
											<div class="col-md-2 col-sm-6" style="margin-top:-20px;margin-bottom:-20px;">
												<div class="c-product" style="background-color:#dbdbdb;">
													<a href="#tab-payement" data-toggle="tab" role="tab" class="be-toggle-right-sidebar cp-img FACTURE" id="FACTURE<?php echo $code_fact; ?>" style="background-image: url(img/photos/2.jpg);height:80px"> <input type="hidden" id="code_FACTURE<?php echo $code_fact; ?>" value="<?php echo $code_fact; ?>">
														<?php echo $statut; ?>
													</a>
													<div class="cp-content">
														<div class="cp-title">Total : <b><?php echo $total;?> $</b></div>
														<div class="cp-price">
															<p><?php echo $client;?></p>
														</div>
													</div>
												</div>
											</div>
											<?php
										}
									}
								}
								else
								{
								?>
								<div class="col-md-12 col-sm-12" style="margin-top:-20px;margin-bottom:-20px;">
									<div class="c-product" style="background-color:#dbdbdb;">
										<a data-toggle="modal" href="#" data-target="#day" class="be-toggle-right-sidebar cp-img" style="background-image: url(img/photos/10.jpg);height:80px" href="#">
											<div class='cp-label bg-danger'>Pas de Facture pour le Client <?php echo $nom_client;?></div>
										</a>
										<div class="cp-content">
											<div class="cp-price">
												<p>Le client <b><?php echo $nom_client;?></b> n'a pas de facture pour le moment.</p>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				window.stopfonction = true; payment_page(); 
			});	
		</script>
		<?php
	}
	else if($type == "attribuer_une_fact")
	{
		$code_fact = $_POST['code_fact'];
		$info_facture=$bd->query("SELECT * FROM (facture NATURAL JOIN guichet) NATURAL JOIN utilisateur WHERE code_fact = '".$code_fact."' "); $rep=$info_facture->fetch(); $client=$rep['client']; $guichet_fac=$rep['nom_guichet']; $user_fac=$rep['nom_complet']; $user_fac_tel=$rep['telephone']; $user_fac_mail=$rep['mail']; $Tresto=$rep['total_resto']; $Tbar=$rep['total_bar']; $Tautre=$rep['total_autre']; $Total=$rep['total'];
		$info_hotel=$bd->query("SELECT * FROM hotel WHERE code_hotel = 1 "); $repo=$info_hotel->fetch(); $hotel=$repo['nom_hotel']; $site=$repo['site']; $tel=$repo['telephone']; $logo=$repo['logo']; $adress=$repo['adresse_physique'];?>
		
		<div class="panel panel-default m-b-0">
			<div class="panel-heading">
				<h3 class="m-y-0 pull-left">Facture N° : <?php echo $code_fact; ?> </h3> <h3 class="m-y-0 pull-right">Client : <?php echo $client; ?> </h3>
			</div>
			<div class="panel-body">
				<div class="row m-b-30">
					<div class="col-sm-6">
						<h4> <img src="<?php echo $logo;?>" height=48 width=48 class="zmdi zmdi-apple zmdi-hc-3x m-r-10"/> <?php echo $hotel;?></h4>
						<p><a class="text-primary" href="#"><?php echo $site;?></a></p>
						<p><?php echo $adress;?> </p>
						<p class="m-b-0">Telephone: <?php echo $tel;?></p>
					</div>
					<div class="col-sm-6">
						<h4> <i class="zmdi zmdi-desktop-mac zmdi-hc-3x m-r-10"></i> <?php echo $guichet_fac;?></h4>
						<p><a class="text-primary" href="#"><?php echo $user_fac_mail;?></a></p>
						<p><?php echo $user_fac;?></p>
						<p class="m-b-0">Telephone: <?php echo $user_fac_tel;?></p>
					  </div>
				</div>
				<table class="table table-bordered m-b-30">
					<thead>
						<tr>
							<th>#</th>
							<th> Description </th>
							<th> Qte </th>
							<th> Prix U </th>
							<th> Prix Total </th>
						</tr>
					</thead>
					<tbody>
					<?php $k=0;
					$rst=$bd->query("SELECT * FROM vente V INNER JOIN plat_resto PR ON V.code_plaser = PR.code_plat WHERE V.type_oper = 'rst' AND V.code_fact = '".$code_fact."' GROUP BY V.code_vente");
						if($rst->rowCount()>0)
						{
						  while($rep=$rst->fetch())
							{ $k++; 
							?>
							<tr>
								<td><?php echo $k;?></td>
								<td><?php echo $rep['plat'];?></td>
								<td><?php echo $rep['qte'];?> </td>
								<td>$<?php echo round($rep['prix_unit'],4);?></td>
								<td>$<?php echo round($rep['prix_total'],4);?></td>
							</tr>
							<?php
							}
						}
						$bar=$bd->query("SELECT * FROM vente V INNER JOIN doz_bar DB ON V.code_plaser = DB.code_doz WHERE V.type_oper = 'bar' AND V.code_fact = '".$code_fact."' GROUP BY V.code_vente");
						if($bar->rowCount()>0)
						{
						  while($repp=$bar->fetch())
							{ $k++; 
							?>
							<tr>
								<td><?php echo $k;?></td>
								<td><?php echo $repp['boisson'];?></td>
								<td><?php echo $repp['qte'];?> </td>
								<td>$<?php echo round($repp['prix_unit'],4);?></td>
								<td>$<?php echo round($repp['prix_total'],4);?></td>
							</tr>
							<?php
							}
						}
						$srv=$bd->query("SELECT * FROM vente V INNER JOIN service S ON S.code_serv = V.code_plaser WHERE V.type_oper = 'srv' AND V.code_fact = '".$code_fact."' GROUP BY V.code_vente");
						if($srv->rowCount()>0)
						{
						  while($reppp=$srv->fetch())
							{ $k++; 
							?>
							<tr>
								<td><?php echo $k;?></td>
								<td><?php echo $reppp['service']."[".$reppp['unite']."]";?></td>
								<td><?php echo $reppp['qte'];?> </td>
								<td>$<?php echo round($reppp['prix_unit'],4);?></td>
								<td>$<?php echo round($reppp['prix_total'],4);?></td>
							</tr>
							<?php
							}
						}
						?>
						<tr>
							<td scope="row" colspan="4">
								<div class="text-right">
									T. Resto
									<br> T. Bar
									<br> T. Autres
									<br>
									<strong>TOTAL</strong>
								</div>
							</td>
							<td>
								$<?php echo $Tresto;?>
								<br> $<?php echo $Tbar;?>
								<br> $<?php echo $Tautre;?>
								<br>
								<strong>$<?php echo $Total;?></strong>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<input type="hidden" id="code_clients" value=""><input type="hidden" id="code_fact" value="<?php echo $code_fact;?>"><input type="hidden" id="type_client" value="">
			<div class="panel-footer text-right hidden" id="actionfact">
				<button type="button" class="btn btn-success btn-labeled" id="save_attrib">Attribuer la facture a ce client
					<span class="btn-label btn-label-right p-x-10">
						<i class="zmdi zmdi-save"></i>
					</span>
				</button>
				<button type="button" class="btn btn-primary btn-labeled" id="delete_attrib">Supprimer l'attribution de cette facture
					<span class="btn-label btn-label-right p-x-10">
						<i class="zmdi zmdi-delete"></i>
					</span>
				</button>
			</div>
		</div>
		<div id="suite_select"></div>
		<script type="text/javascript">
			$(document).ready(function(){
				window.stopfonction = true; opfact(); 
			});	
		</script>
		<?php
	}
	else if($type == "attribuer_au_client")
	{
		$type_client = substr($_POST['code_client'],0,6); $code_client = substr($_POST['code_client'],6,15); $table="client_moral"; if($type_client=="client"){ $table="client"; }
		$clientel=$bd->query("SELECT * FROM ".$table." WHERE code_client=".$code_client." "); $le=$clientel->fetch(); $nom_client=$le['nom_complet'];
		if($table=="client"){$types="Client Personne physique";}else{$types="Client Personne Morale [tiers payant]";}
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#clients").html("<?php echo $nom_client;?>");
				$("#type_clients").html("<?php echo $types;?>");
				$("#code_clients").val("<?php echo $code_client;?>");	
				$("#type_client").val("<?php echo $table;?>");
				window.stopfonction = true; opfact();			
			});	
		</script>
		<?php
	}
	else if($type == "save_attribution")
	{
		$type_client = $_POST['type_client']; $code_client = $_POST['code_client']; $code_fact = $_POST['code_fact']; $username = $_SESSION['username'];
		$attribu=$bd->query("SELECT * FROM attribution_fact WHERE code_fact='".$code_fact."' ");
		$attri=$bd->query("SELECT * FROM attribution_fact WHERE code_client=".$code_client." AND code_fact='".$code_fact."' AND type_client='".$type_client."' "); if($attri->rowCount()<1)
			{
				if($attribu->rowCount()<1){
				$bd->exec("INSERT INTO attribution_fact VALUE(null,'".$code_fact."',".$code_client.",'".$type_client."','".$username."')");
				?>
					<div class="col-sm-10 col-sm-offset-1">
						<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
						  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
						  <div class="alert-message">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							  <span aria-hidden="true">
								<i class="zmdi zmdi-close"></i>
							  </span>
							</button>
							<strong> Hotelia !</strong> Facture attribuée au client choisi avec success. Merci
						  </div>
						</div>
					</div>
				<?php					
				}
				else{
				$bd->exec("UPDATE attribution_fact SET code_client = ".$code_client.", type_client = '".$type_client."', username = '".$username."' WHERE code_fact = '".$code_fact."' ");
				?>
					<div class="col-sm-10 col-sm-offset-1">
						<div class="alert alert-info alert-icon-bg alert-dismissable" role="alert">
						  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
						  <div class="alert-message">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							  <span aria-hidden="true">
								<i class="zmdi zmdi-close"></i>
							  </span>
							</button>
							<strong> Hotelia !</strong> Facture réattribuée au client choisi avec success. Merci
						  </div>
						</div>
					</div>
				<?php	
				}
			}
			else{
				?>
				<div class="col-sm-10 col-sm-offset-1 clrr">
					<div class="alert alert-warning alert-icon-bg alert-dismissable" role="alert">
						<div class="alert-icon">
							<i class="zmdi zmdi-alert-triangle"></i>
						</div>
						<div class="alert-message">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">
									<i class="zmdi zmdi-close"></i>
								</span>
							</button>
							<strong>Hotelia !</strong> La facture N° <?php echo $code_fact; ?> est deja attribuée à ce meme client
						</div>
					</div>
				</div>
			<?php	
			}
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				window.stopfonction = true; opfact(); 
			});	
		</script>
		<?php
	}
	else if($type=="attribution_fact_heberg")
	{
		$type_client = substr($_POST['code_client'],0,6); $code_client = substr($_POST['code_client'],6,15); $table="client_moral"; if($type_client=="client"){ $table="client"; }
		$clientel=$bd->query("SELECT * FROM ".$table." WHERE code_client=".$code_client." "); $le=$clientel->fetch(); $nom_client=$le['nom_complet'];
		?>
		<script type="text/javascript">
			$(document).ready(function(){ window.stopfonction = true; fact_checkout();
				$("#fin_type_client").val("<?php echo $table;?>"); $("#fin_code_client").val("<?php echo $code_client;?>");
				$("#fin_client").html(" <?php echo $nom_client;?>");
			});	
		</script>
		<?php
	}
	else if($type == "save_fact_hebergement")
	{
		$hebergement = $_POST['hebergement']; $consommation = $_POST['consommation'];$nbre_jr = $_POST['nbre_jr']; $prix_unit = $_POST['prix_unit']; $montant_total = $_POST['montant_total']; $code_checkin = $_POST['code_checkin']; $statut_facture = "elaboration"; $date_facture = date("Y-m-d"); $type_client = $_POST['type_client']; $code_client = $_POST['code_client']; $username = $_SESSION['username'];
		$heberg=$bd->query("SELECT * FROM facture_heberg WHERE code_checkin=".$code_checkin." "); if($heberg->rowCount()<1){
			$bd->exec("INSERT INTO facture_heberg VALUE(null,'".$date_facture."',".$hebergement.",".$nbre_jr.",".$prix_unit.",".$consommation.",".$montant_total.",'".$statut_facture."',".$code_checkin.",".$code_client.",'".$type_client."','".$username."')");
			$numero_facture=$bd->query("SELECT * FROM facture_heberg WHERE code_checkin=".$code_checkin." ");$yes=$numero_facture->fetch(); $code_facture=$yes['code_facture'];
			?>
				<div class="col-sm-10 col-sm-offset-1">
					<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
					  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
					  <div class="alert-message">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">
							<i class="zmdi zmdi-close"></i>
						  </span>
						</button>
						<strong> Hotelia !</strong> Facture enregistrée et attribuée au client choisi avec success. Merci
					  </div>
					</div>
				</div>
				<script type="text/javascript">
					$(document).ready(function(){
						$("#numero_facture").html(" <?php echo $code_facture;?>");
					});	
				</script>
			<?php					
		}
		else{
			$bd->exec("UPDATE facture_heberg SET date_facture = '".$date_facture."', hebergement = ".$hebergement.",jour = ".$nbre_jr.", prix = ".$prix_unit.",consommation = ".$consommation.", montant_total = ".$montant_total.",statut_facture = '".$statut_facture."', code_client = ".$code_client.", type_client = '".$type_client."', username = '".$username."' WHERE code_checkin = ".$code_checkin." ");
			$yes=$heberg->fetch(); $code_facture=$yes['code_facture'];
			?>
				<div class="col-sm-10 col-sm-offset-1">
					<div class="alert alert-info alert-icon-bg alert-dismissable" role="alert">
					  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
					  <div class="alert-message">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">
							<i class="zmdi zmdi-close"></i>
						  </span>
						</button>
						<strong> Hotelia !</strong> Facture mise à jour avec success. Merci
					  </div>
					</div>
				</div>
				<script type="text/javascript">
					$(document).ready(function(){
						$("#numero_facture").html(" <?php echo $code_facture;?>");
					});	
				</script>
			<?php	
		}
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				window.stopfonction = true; fact_checkout();
			});	
		</script>
		<?php
	}
	else if($type == "save_and_checkout")
	{
		$hebergement = $_POST['hebergement']; $consommation = $_POST['consommation'];$nbre_jr = $_POST['nbre_jr']; $prix_unit = $_POST['prix_unit']; $montant_total = $_POST['montant_total']; $code_checkin = $_POST['code_checkin']; $statut_facture = "elaboration"; $date_facture = date("Y-m-d"); $type_client = $_POST['type_client']; $code_client = $_POST['code_client']; $username = $_SESSION['username'];
		$heberg=$bd->query("SELECT * FROM facture_heberg WHERE code_checkin=".$code_checkin." "); if($heberg->rowCount()<1){
			$bd->exec("INSERT INTO facture_heberg VALUE(null,'".$date_facture."',".$hebergement.",".$nbre_jr.",".$prix_unit.",".$consommation.",".$montant_total.",'".$statut_facture."',".$code_checkin.",".$code_client.",'".$type_client."','".$username."')");
			$numero_facture=$bd->query("SELECT * FROM facture_heberg WHERE code_checkin=".$code_checkin." ");$yes=$numero_facture->fetch(); $code_facture=$yes['code_facture'];
			// cloture
			$check=$bd->query("SELECT *,(date_checkin + INTERVAL ".$nbre_jr." DAY ) date_sor,(prix_unit * ".$nbre_jr." ) total FROM checkin WHERE code_checkin=".$code_checkin." "); if($check->rowCount()>0){ $in=$check->fetch(); $date_checkout = $in['date_sor']; $confirmation_checkout="confirme";  $prix_total=$in['total'];
				$bd->exec("UPDATE checkin SET nbre_jr = ".$nbre_jr.", date_checkout = '".$date_checkout."',  prix_total = ".$prix_total.", confirmation_checkout = '".$confirmation_checkout."' WHERE code_checkin = ".$code_checkin." ");
			}
			?>
				<div class="col-sm-10 col-sm-offset-1">
					<div class="alert alert-success alert-icon-bg alert-dismissable" role="alert">
					  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
					  <div class="alert-message">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">
							<i class="zmdi zmdi-close"></i>
						  </span>
						</button>
						<strong> Hotelia !</strong> Facture enregistrée et le checkin est Cloturé avec success. Merci
					  </div>
					</div>
				</div>
				<script type="text/javascript">
					$(document).ready(function(){
						$("#numero_facture").html(" <?php echo $code_facture;?>");
						$("#print_fact").removeClass("hidden"); $("#closer").addClass("hidden");
					});	
				</script>
			<?php					
		}
		else{
			$bd->exec("UPDATE facture_heberg SET date_facture = '".$date_facture."', hebergement = ".$hebergement.",jour = ".$nbre_jr.", prix = ".$prix_unit.",consommation = ".$consommation.", montant_total = ".$montant_total.",statut_facture = '".$statut_facture."', code_client = ".$code_client.", type_client = '".$type_client."', username = '".$username."' WHERE code_checkin = ".$code_checkin." ");
			$yes=$heberg->fetch(); $code_facture=$yes['code_facture'];
			// cloture
			$check=$bd->query("SELECT *,(date_checkin + INTERVAL ".$nbre_jr." DAY ) date_sor,(prix_unit * ".$nbre_jr." ) total FROM checkin WHERE code_checkin=".$code_checkin." "); if($check->rowCount()>0){ $in=$check->fetch(); $date_checkout = $in['date_sor']; $confirmation_checkout="confirme";  $prix_total=$in['total'];
				$bd->exec("UPDATE checkin SET nbre_jr = ".$nbre_jr.", date_checkout = '".$date_checkout."',  prix_total = ".$prix_total.", confirmation_checkout = '".$confirmation_checkout."' WHERE code_checkin = ".$code_checkin." ");
			}
			?>
				<div class="col-sm-10 col-sm-offset-1">
					<div class="alert alert-info alert-icon-bg alert-dismissable" role="alert">
					  <div class="alert-icon">  <i class="zmdi zmdi-check"></i>  </div>
					  <div class="alert-message">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">
							<i class="zmdi zmdi-close"></i>
						  </span>
						</button>
						<strong> Hotelia !</strong> Facture mise à jour et le Check-out cloturé avec success. Merci
					  </div>
					</div>
				</div>
				<script type="text/javascript">
					$(document).ready(function(){
						$("#numero_facture").html(" <?php echo $code_facture;?>");
						$("#print_fact").removeClass("hidden"); $("#closer").addClass("hidden");
					});	
				</script>
			<?php	
		}
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				window.stopfonction = true; fact_checkout();
			});	
		</script>
		<?php
	}
	else if($type=="selection_du_client_facglo")
	{
		$type_client = substr($_POST['code_client'],0,6); $code_client = substr($_POST['code_client'],6,15); $table="client_moral"; if($type_client=="client"){ $table="client"; }
		$factures=$bd->query("SELECT * FROM facture_heberg WHERE code_client=".$code_client." AND type_client = '".$table."'"); 
		?>
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>N°</th>
					<th>Date </th>
					<th>Heberg</th>
					<th>Consom.</th>
					<th>Tot</th>
				</tr>
			</thead>
			<tbody>
			<?php
				while($cli=$factures->fetch()){
				?>
				<tr class="fact_h" id="fact_h<?php echo $cli['code_facture'];?>"> <input type="hidden" id="code_fact_h<?php echo $cli['code_facture'];?>" value="<?php echo $cli['code_facture'];?>">
					<td><?php echo $cli['code_facture'];?></td>
					<td><?php echo $cli['date_facture'];?></td>
					<td><?php echo $cli['hebergement'];?></td>
					<td><?php echo $cli['consommation'];?></td>
					<td><?php echo $cli['montant_total'];?></td>
				</tr> 
				<script type="text/javascript"> $(document).ready(function(){ fact_global(); window.stopfonction = true; });</script> <?php
				}
			?>
			</tbody>
		</table>
		<?php
	}
	else if($type=="creation_facture_globale")
	{
		$code_facture = $_POST['code_facture'];
		$facture=$bd->query("SELECT * FROM facture_heberg WHERE code_facture = ".$code_facture." "); $ok=$facture->fetch(); $total = $_POST['total'] + $ok['montant_total'];
		if($code_facture<>0){ ?>
			<script type="text/javascript"> 
			$(document).ready(function(){ 
				var nbr = parseInt($("#nb").val())+1; 
				var markup = "<tr><td><?php echo $ok['code_facture'];?></td> <td><?php echo $ok['date_facture'];?></td> <td>$ <?php echo $ok['hebergement'];?></td><td>$ <?php echo $ok['consommation'];?></td><td>$ <?php echo $ok['montant_total'];?></td> <td> <i class='zmdi zmdi-window-minimize text-danger'></i> </td></tr>";
				$("#fact_concerne").append(markup); $("#nb").val(nbr); $("#Total_facturation").html('$ <?php echo $total;?>'); $("#total").val('<?php echo $total;?>'); $("#code_fact_h<?php echo $ok['code_facture'];?>").val('0');
			});
			</script> 
		<?php
		}
	}
	else if($type=="reload_situation_jr")
	{
		$code_guichet = $_POST['code_guichet'];
		$vente_jour = $bd->query("SELECT * ,IFNULL(SUM(montant_paye),0) TOTAL FROM payment P WHERE code_guichet = ".$code_guichet." AND date_paye = '".date('Y-m-d')."'"); $dujour=$vente_jour->fetch(); $TOTAL=$dujour['TOTAL'];  ?>
			<div class="wt-content p-a-20 p-b-50">
				<div class="wt-title">Situation du Jours</div>
				<div class="wt-number"><?php echo $TOTAL; ?> $</div>
				<div class="wt-text"> pour aujuourd'hui</div>
			</div>
			<div class="wt-icon">
				<i class="zmdi zmdi-shopping-basket"></i>
			</div>
			<div class="wt-chart">
				<span id="peity-chart-2">18,8,10,15,6,15,20,19</span>
			</div>
			<script src="js/dashboard-2.min.js"></script>
		<?php
	}
}
else
{
	
}
?>
<script type="text/javascript"> $(document).ready(function(){ window.stopfonction = true; });</script>
</html>