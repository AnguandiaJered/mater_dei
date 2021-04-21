
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
++++++++++++++++++++++++++++++++++++++++ ELIMU +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/
window.stopfonction = true;

function elimu() {
	$('#section_id').change(function (e) {
		e.preventDefault();
		var section_id = $('#section_id').val(), type="select_section";
		$.ajax({
			url: 'fonction/save.php',
			type: 'POST',
			data: {section_id:section_id,type:type}, cache: false,
			beforeSend:function(){
				$('#option_id').html('<img src="img/loaders/loader30.gif" alt="Patianter" width="180" height="180">');
			},
			success:function(data){
				$('#option_id').removeClass("hidden");
				$('#option_id').html(data);
			}
		});
	});
	$('#option_id').change(function (e) {
		e.preventDefault();
		var option_id = $('#option_id').val(),section_id = $('#section_id').val(), type="select_option";
		$.ajax({
			url: 'fonction/save.php',
			type: 'POST',
			data: {option_id:option_id,section_id:section_id,type:type}, cache: false,
			beforeSend:function(){
				$('#classe_id').html('<img src="img/loaders/loader30.gif" alt="Patianter" width="180" height="180">');
			},
			success:function(data){
				$('#classe_id').removeClass("hidden");
				$('#classe_id').html(data);
			}
		});
	});
	$('#classe_id').change(function (e) {
		e.preventDefault();
		var option_id = $('#classe_id').val(),option_id = $('#option_id').val(),section_id = $('#section_id').val(), type="000";
		$('#action_b').removeClass("hidden");
	});
	$('#fliste').on('submit', function (e) {
		e.preventDefault();

		var $form = $(this);
		var formdata = (window.FormData) ? new FormData($form[0]) : null;
		var data = (formdata !== null) ? formdata : $form.serialize();

		$.ajax({
			url: 'fonction/save.php',
			type:'POST',
			contentType: false, // obligatoire pour de l'upload
			processData: false, // obligatoire pour de l'upload
			data: data,
			beforeSend:function(){
				$('#zonne_liste').html('<img src="img/loaders/loader30.gif" alt="Patianter" width="180" height="180">');
			},
			success: function (response) {
				$('#zonne_liste').html(response);
			}
		});
	});
	$(".edit").click(function(e){
		e.preventDefault();
		var compteur=this.id;
		var code_edit=$("#code_"+compteur).val(); 
		$('.modif'+code_edit).addClass("hidden"); $('#edit'+code_edit).addClass("hidden");
		$('.modifie'+code_edit).removeClass("hidden"); $('#save'+code_edit).removeClass("hidden"); $('#section_'+code_edit).removeClass("hidden");
	});
	$(".save").click(function(e){
		e.preventDefault();
		var compteur=this.id;
		var code_save=$("#code_"+compteur).val(), code_eleve=$("#inscription"+code_save).val(), nom=$("#nom"+code_save).val(), lieu=$("#lieu"+code_save).val(), date=$("#date"+code_save).val(), genre=$("#genre"+code_save).val(), respo=$("#respo"+code_save).val(),tel=$("#tel"+code_save).val(), classe=$("#classe_"+code_save).val(), option=$("#option_"+code_save).val(), section=$("#section_"+code_save).val(), type = "update_eleve";
		$.ajax({
			url: 'fonction/save.php',
			type: 'POST',
			data: {code_eleve:code_eleve,code_save:code_save,nom:nom,lieu:lieu,date:date,genre:genre,respo:respo,tel:tel,section:section,option:option,classe:classe,type:type},
			success:function(data){ 
				$('.modif'+code_save).removeClass("hidden"); $('#edit'+code_save).removeClass("hidden");
				$('.modifie'+code_save).addClass("hidden"); $('#save'+code_save).addClass("hidden");
				$('#zonne_notif').html(data);
			}
		});
	});
	
	// changer classe
	$('.section_').change(function (e) {
		e.preventDefault();
		var compteur=this.id;
		var code_section=$("#code_"+compteur).val(),section_id = $('#section_'+code_section).val(), type="select_section";
		$.ajax({
			url: 'fonction/save.php',
			type: 'POST',
			data: {section_id:section_id,type:type},
			success:function(data){
				$('#option_'+code_section).removeClass("hidden"); $('#section_'+code_section).addClass("hidden");
				$('#option_'+code_section).html(data);
			}
		});
	});
	$('.option_').change(function (e) {
		e.preventDefault();
		var compteur=this.id;
		var code_option=$("#code_"+compteur).val(),option_id = $('#option_'+code_option).val(),section_id = $('#section_'+code_option).val(), type="select_option";
		$.ajax({
			url: 'fonction/save.php',
			type: 'POST',
			data: {option_id:option_id,section_id:section_id,type:type}, 
			success:function(data){
				$('#classe_'+code_option).removeClass("hidden"); $('#option_'+code_option).addClass("hidden");
				$('#classe_'+code_option).html(data);
			}
		});
	});
}






























/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
++++++++++++++++++++++++++++++++++++++++ Configuration +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/
window.stopfonction = true;

function config() {
	$('#fhotel').on('submit', function (e) {
		e.preventDefault();

		var $form = $(this);
		var formdata = (window.FormData) ? new FormData($form[0]) : null;
		var data = (formdata !== null) ? formdata : $form.serialize();

		$.ajax({
			url: 'fonctions/save.php',
			type:'POST',
			contentType: false, // obligatoire pour de l'upload
			processData: false, // obligatoire pour de l'upload
			//dataType: 'json', // selon le retour attendu
			data: data,
			beforeSend:function(){
				$('#hotel_actuel').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patianter" width="180" height="180">');
			},
			success: function (response) {
				$('#hotel_actuel').show();
				$('#hotel_actuel').html(response);
				//$('#result > pre').html(JSON.stringify(response, undefined, 4));
			}
		});
	});
	
	
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
++++++++++++++++++++++++++++++++++++++++  Hebergements +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/
function tarification(){
	$('#ftarif').on('submit', function (e) {
		e.preventDefault();

		var $form = $(this);
		var formdata = (window.FormData) ? new FormData($form[0]) : null;
		var data = (formdata !== null) ? formdata : $form.serialize();

		$.ajax({
			url: 'fonctions/save.php',
			type:'POST',
			contentType: false, // obligatoire pour de l'upload
			processData: false, // obligatoire pour de l'upload
			//dataType: 'json', // selon le retour attendu
			data: data,
			beforeSend:function(){
				$('#list_tarif').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patianter" width="180" height="180">');
			},
			success: function (response) {
				$('#list_tarif').show();
				$('#list_tarif').html(response);
				//$('#result > pre').html(JSON.stringify(response, undefined, 4));
			}
		});
	});
	
	$(".tarification").click(function(e){
		e.preventDefault();
		var compteur=this.id;
		var code_tarif=$("#code_"+compteur).val(), type = "update_tarif";
		$.ajax({
			url: 'fonctions/save.php',
			type: 'POST',
			data: {code_tarif:code_tarif,type:type},
			beforeSend:function(){
				$('#interface_tarif').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="180" height="180">');
			},
			success:function(data){
				$('#interface_tarif').show();
				$('#interface_tarif').html(data);
			}
		});
	});
	
	$('#fmodif_tarif').on('submit', function (e) {
		e.preventDefault();

		var $form = $(this);
		var formdata = (window.FormData) ? new FormData($form[0]) : null;
		var data = (formdata !== null) ? formdata : $form.serialize();

		$.ajax({
			url: 'fonctions/save.php',
			type:'POST',
			contentType: false, // obligatoire pour de l'upload
			processData: false, // obligatoire pour de l'upload
			//dataType: 'json', // selon le retour attendu
			data: data,
			beforeSend:function(){
				$('#list_tarif').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patianter" width="180" height="180">');
			},
			success: function (response) {
				$('#list_tarif').show();
				$('#list_tarif').html(response);
				//$('#result > pre').html(JSON.stringify(response, undefined, 4));
			}
		});
	});
	
	
}


	function save_reservation() {
		var code_commission = $('#code_commission').val();
		var date_arrive = $('#date_arrive').val();
		var code_tarif = $('#code_tarif').val();
		var prix = $('#prix').val();
		var code_chambre = $('#code_chambre').val();
		var date_depart = $('#date_depart').val();
		var nbre_jr = $('#nbre_jr').val();
		var reservation = $('#reservation').val();
		var type = "save_reservat";
		$.ajax({
			url: 'fonctions/save.php',
			type: 'POST',
			data: {code_commission:code_commission,date_arrive:date_arrive,code_chambre:code_chambre,code_tarif:code_tarif,date_depart:date_depart,nbre_jr:nbre_jr,prix:prix,reservation:reservation,type:type},
			cache: false,
			beforeSend:function(){
				$('#liste_reserv').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patianter" width="180" height="180">');
			},
			success:function(data){
				$('#liste_reserv').show();
				$('#liste_reserv').html(data);
			}
		});
		function set_item(item) {
			// change input value
			$('#code_commission').val(item);
			// hide proposition list
			$('#liste_reserv').hide();
		}
	}

	// ---------------------------------------------------------------------------------------------------------------------

	function save_new_client(){
		var nom_complet = $('#nom_complet').val(), piece_id = $('#piece_id').val(), numero_id = $('#numero_id').val(), lieu_naiss = $('#lieu_naiss').val(), date_naiss = $('#date_naiss').val(), nationalite = $('#nationalite').val(), profession = $('#profession').val(), provenance = $('#provenance').val(), telephone = $('#telephone').val(), mail = $('#mail').val(), id_scan = $('#id_scan').val(), photo = $('#photo').val(), type = "save_client";
		$.ajax({
			url: 'fonctions/save.php',
			type: 'POST',
			//contentType: false, // obligatoire pour de l'upload
			//processData: false, // obligatoire pour de l'uploadcache: false,
			data: {nom_complet:nom_complet,piece_id:piece_id,numero_id:numero_id,lieu_naiss:lieu_naiss,date_naiss:date_naiss,nationalite:nationalite,profession:profession,provenance:provenance,telephone:telephone,mail:mail,photo:photo,id_scan:id_scan,type:type},
			cache: false,
			beforeSend:function(){
				$('#nbre_pers').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patianter" width="180" height="180">');
				// $('#nvx_client').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patianter" width="180" height="180">');
			},
			success:function(data){
				$('#nbre_pers').show();
				$('#nbre_pers').html(data);
			}
		});
	}
	function set_item(item) {
		// change input value
		$('#nom_complet').val(item);
		// hide proposition list
		$('#nbre_pers').hide();
	}

	// ---------------------------------------------------------------------------------------------------------------------

	function save_new_checkin(){
		var date_arrive = $('#date_arrive').val(), nbre_jr = $('#nbre_jr').val(), code_chambre = $('#code_chambre').val(), statut_reserv = "confirme", prix_unit = $('#prix_unit').val(), prix_total = $('#prix_total').val(), observation = $('#observation').val(), confirmation_checkout = $('#confirmation_checkout').val(), code_tarif = $('#code_tarif').val(), code_reserv = $('#code_reserv').val(), date_depart = $('#date_depart').val(), clientel = $('#clientel').val(), type = "save_new_checkin";

		$.ajax({
			url: 'fonctions/save.php',
			type: 'POST',
			data: {date_arrive:date_arrive,nbre_jr:nbre_jr,code_chambre:code_chambre,statut_reserv:statut_reserv,prix_unit:prix_unit,prix_total:prix_total,observation:observation,confirmation_checkout:confirmation_checkout,code_tarif:code_tarif,code_reserv:code_reserv,date_depart:date_depart,clientel:clientel,type:type},
			beforeSend:function(){
				$('.alertci').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
				// $('#nvx_client').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patianter" width="180" height="180">');
			},
			success:function(data){
				$('.alertci').show();
				$('.alertci').html(data);
			}
		});
	}
	function set_item(item) {
		// change input value
		$('#date_arrive').val(item);
		// hide proposition list
		$('.alertci').hide();
	}

	// ---------------------------------------------------------------------------------------------------------------------

	function rooms_dispo(){
		var date_arrive = $('#date_arrive').val(), nbre_jr = $('#nbre_jr').val(), type = "rooms_disponible";

		$.ajax({
			url: 'fonctions/save.php',
			type: 'POST',
			data: {date_arrive:date_arrive,nbre_jr:nbre_jr,type:type},
			beforeSend:function(){
				$('#check_chambre').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
			},
			success:function(data){
				$('#check_chambre').show();
				$('#check_chambre').html(data);
			}
		});
	 function set_item(item) {
		// change input value
		$('#date_arrive').val(item);
		// hide proposition list
		$('#check_chambre').hide();
	  }
	}

	// ---------------------------------------------------------------------------------------------------------------------

	function rooms_nuite(){
		var code_tarif = $('#code_tarif').val(), type = "rooms_nuite";

		$.ajax({
			url: 'fonctions/save.php',
			type: 'POST',
			data: {code_tarif:code_tarif,type:type},
			beforeSend:function(){
				$('#price').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
			},
			success:function(data){
				$('#price').show();
				$('#price').html(data);
			}
		});
	 function set_item(item) {
		// change input value
		$('#code_tarif').val(item);
		// hide proposition list
		$('#price').hide();
	  }
	}

	// ---------------------------------------------------------------------------------------------------------------------

	function rooms_price(){
		var code_chambre = $('#code_chambre').val(), type = "rooms_tarif";

		$.ajax({
			url: 'fonctions/save.php',
			type: 'POST',
			data: {code_chambre:code_chambre,type:type},
			beforeSend:function(){
				$('#tarif').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
			},
			success:function(data){
				$('#tarif').show();
				$('#tarif').html(data);
			}
		});
	 function set_item(item) {
		// change input value
		$('#code_chambre').val(item);
		// hide proposition list
		$('#tarif').hide();
	  }
	}

	//----------------------------------------------------------------------------------------------------------------------------

	function checkin_client() {
		var nbre_client = $('#nbre_client').val();
		var code_client1 = $('#code_client1').val();
		var code_client2 = $('#code_client2').val();
		var code_client3 = $('#code_client3').val();
		var code_client4 = $('#code_client4').val();
		var code_client5 = $('#code_client5').val();
		var type = "checkin_client";
		$.ajax({
			url: 'fonctions/save.php',
			type: 'POST',
			data: {nbre_client:nbre_client,code_client1:code_client1,code_client2:code_client2,code_client3:code_client3,code_client4:code_client4,code_client5:code_client5,type:type},
			beforeSend:function(){
				$('#affect_client').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
			},
			success:function(data){
				$('#affect_client').show();
				$('#affect_client').html(data);
			}
		});
		// set_item : this function will be executed when we select an item
		function set_item(item) {
			// change input value
			$('#nbre_client').val(item);
			// hide proposition list
			$('#affect_client').hide();
		}
	}

	// ---------------------------------------------------------------------------------------------------------------------------------

	function check_checkin() {
		var type = "check_checkin";
		$.ajax({
			url: 'fonctions/save.php',
			type: 'POST',
			data: {type:type},
			beforeSend:function(){
				$('#check_client').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
			},
			success:function(data){
				$('#check_client').show();
				$('#check_client').html(data);
			}
		});
	  function set_item(item) {
		// hide proposition list
		$('#check_client').hide();
	  }
	}
	
	//-------------------------------------------------------------------------------------------------------------------------------------
	
	function vuta() {
		$(".loc").click(function(e){
			e.preventDefault();
			var compteur=this.id;
			var code_location=$("#code_"+compteur).val(), type = $("#types").val();
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_location:code_location,type:type},
				beforeSend:function(){
					$('#check_client').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
				},
				success:function(data){
					if(type=="delete_check_reserv"){ check_client(); }else if(type=="delete_check"){ check_checkin();} 
				}
			});
		});
	}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Vente| Paiement ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	function charger_new_panier(){
		var code_menu = $('#code_menu').val();
		var type_pri = $('#type_pri').val();
		var qte_pcs = $('#qte_pcs').val();
		var code_guichet = $('#code_guichet').val();
		var code_fact = $('#code_fact').val();
		var table = $('#table_cmd').val();
		var type = "charger_new_panier";
		console.log(table)
		$("#funga").click();
		$.ajax({
			url: 'fonctions/save.php',
			type: 'POST',
			data: {code_menu:code_menu,type_pri:type_pri,qte_pcs:qte_pcs,code_guichet:code_guichet,code_fact:code_fact,table:table,type:type},
			beforeSend:function(){
				$('#charg_panier').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
			},
			success:function(data){
				$("#funga").click();
				$('#charg_panier').show();
				$('#charg_panier').html(data);
			}
		});
		function set_item(item) {
			// change input value
			$('#code_menu').val(item);
			$('#charg_panier').hide();
		}
	}
	
/* ******************************************************************************************************************************************************************
***************************************************** LES FONCTIONALITE DU MODUL VENDEUR"****************************************************************************
********************************************************************************************************************************************************************* */ 
	function ventes_auclient(){
		$('.fvente').on('submit', function (e) {
			// On empêche le navigateur de soumettre le formulaire
			e.preventDefault();

			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var data = (formdata !== null) ? formdata : $form.serialize();
			console.log("CODE BON=>"+data)
			$.ajax({
				url: 'fonctions/save.php',
				type:'POST',
				contentType: false, // obligatoire pour de l'upload
				processData: false, // obligatoire pour de l'upload
				//dataType: 'json', // selon le retour attendu
				data: data,
				success: function (response) {
					$('#charg_panier').show();
					$('#charg_panier').html(response);
				}
			});
		});
		$(".panier").click(function(e){
			e.preventDefault();
			var compteur=this.id;
			var table=$("#code_"+compteur).val(), code_guichet=$("#code_guichet").val(), code_menu = 0, type_pri = "", code_fact = "changer_le_panier_en_cours", type = "charger_new_panier";
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {table:table,code_guichet:code_guichet,code_menu:code_menu,type_pri:type_pri,code_fact:code_fact,type:type},
				beforeSend:function(){
					$('#charg_panier').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
				},
				success:function(data){
					$('#charg_panier').show();
					$('#charg_panier').html(data); 
				}
			});
		});
		
		// ENREDGISTREMENT D'une commande (dmd de stock)
		$('#fcreatecmd').on('submit', function (e) {
			if( !window.stopfonction ){return false;}	
					window.stopfonction = false;
			// On empêche le navigateur de soumettre le formulaire
			e.preventDefault();

			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var data = (formdata !== null) ? formdata : $form.serialize();
			$.ajax({
				url: 'fonctions/save.php',
				type:'POST',
				contentType: false, // obligatoire pour de l'upload
				processData: false, // obligatoire pour de l'upload
				//dataType: 'json', // selon le retour attendu
				data: data,
				beforeSend:function(){
					$('#bon_cmd').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
				},
				success: function (response) {
					$('#bon_cmd').show();
					$('#bon_cmd').html(response);
				}
			});
		});
		$(".line_cmd").click(function(e){
			e.preventDefault();
			var compteur=this.id;
			var code_cmd=$("#code_"+compteur).val(), type = "delete_row_cmd";
			console.log(code_cmd)
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_cmd:code_cmd,type:type},
				beforeSend:function(){
					$('#bon_cmd').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
				},
				success:function(data){ 
					reload_cmd();
				}
			});
		});
		// actualiser le div de la vente du jour
		function reload_cmd(){
			var code_guichet = $("#code_guichet").val(), type = "cmd_stock", keyword = 0, dispo = 0, qte_cmd = 0;
			$.ajax({
				url: 'Ajax/Vente/vente.php',
				type: 'POST',
				data: {keyword:keyword,dispo:dispo,qte_cmd:qte_cmd,code_guichet:code_guichet,type:type},
				beforeSend:function(){
					$('#vente_du_joour').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
				},
				success:function(data){
					$('#bon_cmd').show();
					$('#bon_cmd').html(data);
				}
			});
		}
		// acffichage du champ de mofification d'une ligne de la cmd
		$(".modif").click(function(e) {
			e.preventDefault();
			var compteur=this.id;
			var code_modif=$("#code_"+compteur).val(), type = "delete_row_cmd";
			$("#affich"+code_modif).addClass("hidden");
			$("#edit"+code_modif).removeClass("hidden");
		});
		// mofification d'une ligne de la cmd
		$(".quantite").blur(function(e){
			e.preventDefault();
			var compteur=this.id;
			var code_cmd=$("#code_"+compteur).val(), qte_cmd = parseInt($("#quantite"+code_cmd).val()), type = "edit_row_cmd";
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_cmd:code_cmd,qte_cmd:qte_cmd,type:type},
				beforeSend:function(){
					$("#affich"+code_cmd).html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="10" height="10">');
				},
				success:function(data){ 
					$("#affich"+code_cmd).removeClass("hidden");
					$("#edit"+code_cmd).addClass("hidden");
					$("#affich"+code_cmd).html(qte_cmd);
				}
			});
		});
		// Annuler toute la cmd entiere
		$("#annuler_cmd").click(function(e){
			e.preventDefault();
			var code_guichet = $("#code_guichet").val(), type = "annuler_toute_cmd";
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_guichet:code_guichet,type:type},
				beforeSend:function(){
					$('#bon_cmd').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
				},
				success: function (response) {
					$('#bon_cmd').show();
					$('#bon_cmd').html(response);
				}
			});
		});
		
		/* VALIDATION DE LA CMD ET SORTIE DE LA March
		mofification d'une ligne de la cmd */
		$(".quantity").blur(function(e){
			e.preventDefault();
			var compteur=this.id;
			var code_cmd=$("#code_"+compteur).val(), qte_cmd = parseInt($("#quantity"+code_cmd).val()), type = "edit_row_cmd_already_sent";
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_cmd:code_cmd,qte_cmd:qte_cmd,type:type},
				beforeSend:function(){
					$("#affich"+code_cmd).html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="10" height="10">');
				},
				success:function(data){ 
					$("#affich"+code_cmd).removeClass("hidden");
					$("#edit"+code_cmd).addClass("hidden");
					$("#affich"+code_cmd).html(qte_cmd);
				}
			});
		});
		// Supprimer une ligne de la cmd deja envoyé avant de la validé
		$(".row_cmd").click(function(e){
			e.preventDefault();
			var compteur=this.id;
			var code_cmd=$("#code_"+compteur).val(), type = "delete_row_cmd_already_sent";
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_cmd:code_cmd,type:type},
				success:function(data){ 
					$("#lin"+code_cmd).addClass("hidden");
				}
			});
		});
		// actualiser le div de la Validation d'une commande
		function reload_cmd_already_sent(){
			var code_bon = $("#code_bon").val(), type = "reload_cmd_already_sent";
			$.ajax({
				url: 'Ajax/Vente/vente.php',
				type: 'POST',
				data: {code_bon:code_bon,type:type},
				beforeSend:function(){
					$('#cmd_valide').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
				},
				success:function(data){
					$(".funga").click();
					$('#cmd_valide').show();
					$('#cmd_valide').html(data);
				}
			});
		}
		// Validation du bon de livraison D'une commande (livraison de stock)
		$('#vcmd').on('submit', function (e) {
			// On empêche le navigateur de soumettre le formulaire
			e.preventDefault();
			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var data = (formdata !== null) ? formdata : $form.serialize();
			$.ajax({
				url: 'fonctions/save.php',
				type:'POST',
				contentType: false, // obligatoire pour de l'upload
				processData: false, // obligatoire pour de l'upload
				//dataType: 'json', // selon le retour attendu
				data: data,
				success: function (response) {
					$('.funga').click();
					$('#valid').addClass("hidden"); $('#btn').addClass("hidden");
					$('.livresucces').removeClass("hidden"); $('.btn2').removeClass("hidden");
				}
			});
		});
			
		/* VALIDATION DE LA CMD ET SORTIE DE LA March
		Validation de la recep d'une commande (recep de stock)*/
		$('#frecep_stock').on('submit', function (e) {
			// On empêche le navigateur de soumettre le formulaire
			e.preventDefault();
			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var data = (formdata !== null) ? formdata : $form.serialize();
			$.ajax({
				url: 'fonctions/save.php',
				type:'POST',
				contentType: false, // obligatoire pour de l'upload
				processData: false, // obligatoire pour de l'upload
				//dataType: 'json', // selon le retour attendu
				data: data,
				success: function (response) {
					$('.funga').click();
					$('#bon_recep').addClass("hidden");
					$('.recepsucces').removeClass("hidden");
				}
			});
		});
		$('#deny_stock').click(function(e) {
			// On empêche le navigateur de soumettre le formulaire
			e.preventDefault();
			var code_bon = $('#code_bon').val(), type = "refuser_le_stock" ,motif = $('#motif').val();
			$.ajax({
				url: 'fonctions/save.php',
				type:'POST',
				data: {code_bon:code_bon,motif:motif,type:type},
				success: function (data) {
					$('#motif_rfu').html(motif);
					$('#bon_recep').addClass("hidden");
					$('.receprr').removeClass("hidden");
				}
			});
		});
	}
	
/* ******************************************************************************************************************************************************************
***************************************************** LES FONCTIONALITE PAYMENT *************************************************************************************
********************************************************************************************************************************************************************* */ 
	function payment_page(){
		$(".Facture").click(function(e) {
			e.preventDefault();
			var compteur=this.id;
			var code_fact=$("#code_"+compteur).val(), type = "apercevoir_une_fact";
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_fact:code_fact,type:type},
				beforeSend:function(){
					$("#zonne_payment").html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="60" height="60">');
				},
				success:function(data){ 
					$("#b-payment").click();
					$("#zonne_payment").html(data);
				}
			});
		});
		// calcul solde
		$("#montant_paye").keyup(function(e) {
			e.preventDefault();
			var montant_paye=$("#montant_paye").val(), deja_payes=$("#deja_payes").val(), solde=$("#solde").val();
			var solde_now = solde - montant_paye;
			
			$("#voir_solde").html("$"+solde_now);
			$("#soldenow").val(solde_now);
		});
		// save payement
		$(".save_payment").click(function(e) {
			if( !window.stopfonction ){return false;}	
			window.stopfonction = false;
			e.preventDefault();
			var code_fact=$("#code_fact").val(), code_paye=$("#code_paye").val(), montant_paye=$("#montant_paye").val(), deja_payes=$("#deja_payes").val(), payeur=$("#payeur").val(), solde=$("#soldenow").val(), guichet=$("#guichet").val(), montant_du=$("#montant_du").val(), type_oper="pay_facture";
			var solde_now = $("#soldenow").val(); var deja_payes_now = parseFloat(deja_payes) + parseFloat(montant_paye); var type="save_invoce_payment";
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_fact:code_fact,code_paye:code_paye,montant_paye:montant_paye,montant_du:montant_du,payeur:payeur,solde:solde,type_oper:type_oper,guichet:guichet,type:type},
				success:function(data){
					$("#ex_solde").html("$"+solde_now); $("#solde").val(solde_now);
					$("#voir_montant_paye").html("$"+montant_paye); $("#voir_montant_paye").removeClass("hidden"); $("#montant_paye").addClass("hidden");
					$("#voir_payeur").html(payeur); $("#voir_payeur").removeClass("hidden"); $("#payeur").addClass("hidden");
					$("#suite_enregistrement").html(data);
					situation_jr();
				}
			});
		});
		// save and print payement
		$(".save_print").click(function(e) {
			if( !window.stopfonction ){return false;}	
			window.stopfonction = false;
			e.preventDefault();
			var code_fact=$("#code_fact").val(), code_paye=$("#code_paye").val(), montant_paye=$("#montant_paye").val(), deja_payes=$("#deja_payes").val(), payeur=$("#payeur").val(), solde=$("#soldenow").val(), guichet=$("#guichet").val(), montant_du=$("#montant_du").val(), type_oper="pay_facture";
			var solde_now = $("#soldenow").val(); var deja_payes_now = parseFloat(deja_payes) + parseFloat(montant_paye); var type="save_invoce_payment";
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_fact:code_fact,code_paye:code_paye,montant_paye:montant_paye,montant_du:montant_du,payeur:payeur,solde:solde,type_oper:type_oper,guichet:guichet,type:type},
				success:function(data){
					$("#ex_solde").html("$"+solde_now); $("#solde").val(solde_now);
					$("#voir_montant_paye").html("$"+montant_paye); $("#voir_montant_paye").removeClass("hidden"); $("#montant_paye").addClass("hidden");
					$("#voir_payeur").html(payeur); $("#voir_payeur").removeClass("hidden"); $("#payeur").addClass("hidden");
					$("#suite_enregistrement").html(data);
					// impression
					$(".head_recu").removeClass("hidden");
					$.print("#body_recu");
					$(".head_recu").addClass("hidden");
					situation_jr();
				}
			});
		});
		// rechercher les fact client
		$("#client").change(function(e) {
			if( !window.stopfonction ){return false;}	
			window.stopfonction = false;
			e.preventDefault();
			var code_client=$("#client").val(), trie=$("#trie").val(), type="search_invoce";
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_client:code_client,trie:trie,type:type},
				success:function(data){
					$("#b-research").click();
					$("#zonne_research").html(data);
				}
			});
		});
		// rechercher les fact par numero
		$("#factur").change(function(e) {
			e.preventDefault();
			var code_fact=$("#factur").val(), type="apercevoir_une_fact";
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_fact:code_fact,type:type},
				success:function(data){
					$("#b-payment").click();
					$("#zonne_payment").html(data);
				}
			});
		});
		// Charger fact from result recherch
		$(".FACTURE").click(function(e) {
			e.preventDefault();
			var compteur=this.id;
			var code_fact=$("#code_"+compteur).val(), type = "apercevoir_une_fact";
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_fact:code_fact,type:type},
				beforeSend:function(){
					$("#zonne_payment").html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="60" height="60">');
				},
				success:function(data){ 
					$("#b-payment").click();
					$("#zonne_payment").html(data);
				}
			});
		});
		// Specifier ce que l'on cherch
		$(".tries").click(function(e) {
			var trie=this.id;
			$("#trie").val(trie);
		});
	}
	function situation_jr(){
		var code_guichet = $("#code_guichet").val(), type = "reload_situation_jr";
		$.ajax({
			url: 'fonctions/save.php',
			type: 'POST',
			data: {code_guichet:code_guichet,type:type},
			beforeSend:function(){
				$('#situation_du_jour').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
			},
			success:function(data){
				$('#situation_du_jour').html(data);
			}
		});
	}
	// OPERATION SUR LA FACTURE ET LE CLIENT
	function opfact(){
		// recharger les fact par numero
		$("#factur").change(function(e) {
			e.preventDefault();
			var code_fact=$("#factur").val(), type="attribuer_une_fact";
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_fact:code_fact,type:type},
				success:function(data){
					$("#b-attrib").click();
					$("#zonne_attrib").html(data);
				}
			});
		});
		// selectioner le client
		$("#code_client").change(function(e) {
			e.preventDefault();
			if( !window.stopfonction ){return false;}	
			window.stopfonction = false;
			var code_client=$("#code_client").val(), type="attribuer_au_client";
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_client:code_client,type:type},
				success:function(data){
					$("#b-attrib").click();
					$("#suite_select").html(data);
					$("#actionfact").removeClass("hidden");
				}
			});
		});
		// enregistrement de l'attrib
		$("#save_attrib").click(function(e) {
			e.preventDefault();
			if( !window.stopfonction ){return false;}	
			window.stopfonction = false;
			var code_client=$("#code_clients").val(), code_fact=$("#code_fact").val(), type_client=$("#type_client").val(), type="save_attribution";
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_client:code_client,code_fact:code_fact,type_client:type_client,type:type},
				success:function(data){
					$("#suite_select").html(data);
				}
			});
		});
	}
	// FACTURATION CHECKOUT
	function fact_checkout(){
		// enregistrement de l'attrib
		$("#ch_normal").click(function(e) {
			var N_tot=$("#N_tot").val(), N_nbrejr=$("#N_nbrejr").val(), prixunit=$("#prixunit").val(), Total=parseFloat($("#N_tot").val()) + parseFloat($("#C_tot").val());
			
			$("#nb_jr").html(N_nbrejr+" jr"); $("#p_u").html("$"+prixunit); $("#p_t").html("$"+N_tot);  $("#t_h").html("$"+N_tot); $("#tot").html("$"+Total); 
			$("#fin_nbrejr").val(N_nbrejr); $("#fin_pu").val(prixunit); $("#fin_pt").val(N_tot);  $("#fin_total").val(Total);
			
			$("#facture_hebergement").removeClass("hidden");
		});
		$("#ch_imprevu").click(function(e) {
			var I_tot=$("#I_tot").val(), I_nbrejr=$("#I_nbrejr").val(), prixunit=$("#prixunit").val(), Total=parseFloat($("#I_tot").val()) + parseFloat($("#C_tot").val());
			
			$("#nb_jr").html(I_nbrejr+" jr"); $("#p_u").html("$"+prixunit); $("#p_t").html("$"+I_tot);  $("#t_h").html("$"+I_tot); $("#tot").html("$"+Total); 
			$("#fin_nbrejr").val(I_nbrejr); $("#fin_pu").val(prixunit); $("#fin_pt").val(I_tot);  $("#fin_total").val(Total);
			
			$("#facture_hebergement").removeClass("hidden"); 
		});
		$("#veiw_client").click(function(e) {
			e.preventDefault();
			$("#espace_client").removeClass("hidden"); $("#veiw_client").removeClass("btn-primary"); $("#veiw_client").addClass("btn-default"); $("#ico0").removeClass("hidden"); $("#ico1").addClass("hidden");
		});
		$("#code_client").change(function() {
			var code_client=$("#code_client").val(), type="attribution_fact_heberg"; 
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_client:code_client,type:type},
				success:function(data){
					$("#suite_attrib").html(data);
					$("#espace_client").addClass("hidden"); $("#veiw_client").removeClass("btn-default"); $("#veiw_client").addClass("btn-primary"); $("#ico1").removeClass("hidden"); $("#ico0").addClass("hidden");
				}
			});
		});
		// enregistrement de la facturation hebergement
		$("#save_factureh").click(function(e) { e.preventDefault();
			if( !window.stopfonction ){return false;}	
			window.stopfonction = false;
			var hebergement=$("#fin_pt").val(), nbre_jr=$("#fin_nbrejr").val(), prix_unit=$("#fin_pu").val(), consommation=$("#fin_consom").val(), montant_total = $("#fin_total").val(), code_client=$("#fin_code_client").val(), type_client=$("#fin_type_client").val(), code_checkin=$("#fin_code_checkin").val(), type="save_fact_hebergement"; 
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {hebergement:hebergement,nbre_jr:nbre_jr,prix_unit:prix_unit,consommation:consommation,montant_total:montant_total,code_client:code_client,type_client:type_client,code_checkin:code_checkin,type:type},
				success:function(data){
					$("#suite_attrib").html(data);
					$("#espace_client").addClass("hidden"); $("#veiw_client").removeClass("btn-default"); $("#veiw_client").addClass("btn-primary"); $("#ico1").removeClass("hidden"); $("#ico0").addClass("hidden");
				}
			});
		});
		// Cloturer facture hebergement
		$("#closer").click(function(e) { e.preventDefault();
			if( !window.stopfonction ){return false;}	
			window.stopfonction = false;
			var hebergement=$("#fin_pt").val(), nbre_jr=$("#fin_nbrejr").val(), prix_unit=$("#fin_pu").val(), consommation=$("#fin_consom").val(), montant_total = $("#fin_total").val(), code_client=$("#fin_code_client").val(), type_client=$("#fin_type_client").val(), code_checkin=$("#fin_code_checkin").val(), type="save_and_checkout"; 
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {hebergement:hebergement,nbre_jr:nbre_jr,prix_unit:prix_unit,consommation:consommation,montant_total:montant_total,code_client:code_client,type_client:type_client,code_checkin:code_checkin,type:type},
				success:function(data){
					$("#suite_attrib").html(data);
					$("#espace_client").addClass("hidden"); $("#veiw_client").removeClass("btn-default"); $("#veiw_client").addClass("btn-primary"); $("#ico1").removeClass("hidden"); $("#ico0").addClass("hidden");
				}
			});
		});
		// Imprimer la facture hebergement
		$("print_fact").click(function(e) { e.preventDefault();
			if( !window.stopfonction ){return false;}	
			window.stopfonction = false;
			$.print("#facture_hebergement");
			window.stopfonction = true;
		});
		
	}
	// FACTURATION GLOBAL
	function fact_global(){
		// selection du client
		$("#code_client").change(function() {
			if( !window.stopfonction ){return false;} window.stopfonction = false;
			var code_client=$("#code_client").val(), type="selection_du_client_facglo"; 
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_client:code_client,type:type},
				success:function(data){
					$("#factures_client").html(data);
				}
			});
		});
		$(".fact_h").click(function() {
			if( !window.stopfonction ){return false;} window.stopfonction = false;
			var compteur=this.id;
			var code_facture=$("#code_"+compteur).val(), total=$("#total").val(), type = "creation_facture_globale";
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_facture:code_facture,total:total,type:type},
				success:function(data){
					$("#zonne_newfact").html(data);
					$("#b-new").click();
				}
			});
		});
		
	}
/*=======================================================================================================================================================================================
========================================================= LES FONCTIONALITE DES GESTIONAIRE DE STOCK ====================================================================================*/ 
	function gestock(){
		// acffichage du champ de mofification d'une ligne d'achat
		$(".achat").click(function(e) {
			e.preventDefault();
			var compteur=this.id;
			var code_achat=$("#code_"+compteur).val(), type = "delete_row_cmd";
			$("#update"+code_achat).addClass("hidden");
			$(".affich"+code_achat).addClass("hidden");
			$(".edit"+code_achat).removeClass("hidden");
			$("#save_update"+code_achat).removeClass("hidden");
		});
		// modification du champ de mofification d'une ligne d'achat
		$(".Sachat").click(function(e) {
			e.preventDefault();
			var compteur=this.id;
			var code_achat=$("#code_"+compteur).val(), qte_achat = $("#qte"+code_achat).val(), prix_achat = $("#prix"+code_achat).val(), prix_total = qte_achat * prix_achat, type = "update_row_achat"; 
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_achat:code_achat,qte_achat:qte_achat,prix_achat:prix_achat,prix_total:prix_total,type:type},
				beforeSend:function(){
					$("#affich"+code_achat).html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="10" height="10">');
				},
				success:function(data){ 
					$("#update"+code_achat).removeClass("hidden"); $(".affich"+code_achat).removeClass("hidden");
					$(".edit"+code_achat).addClass("hidden"); $("#save_update"+code_achat).addClass("hidden");
					$("#pu"+code_achat).html(prix_achat); $("#qty"+code_achat).html(qte_achat); $("#pt"+code_achat).html(prix_total);
					$(".totalite").html("Total : "+data+" FF");
				}
			});
		});
		// Suppression d'une ligne du bon d'achat
		$(".line_achat").click(function(e) {
			e.preventDefault();
			if( !window.stopfonction ){return false;}	
				window.stopfonction = false;
			var compteur=this.id;
			var code_achat=$("#code_"+compteur).val(), type = "delete_row_achat"; 
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_achat:code_achat,type:type},
				success:function(data){ 
					$(".funga").click();
					$("#lin"+code_achat).addClass("hidden"); 
					$(".totalite").html("Total : "+data+" FF");
				}
			});
		});
		
		// Enregistrement D'un etat de besoin (dmd de stock)
		$('#fetatbesoin').on('submit', function (e) {
			if( !window.stopfonction ){return false;}	
					window.stopfonction = false;
			// On empêche le navigateur de soumettre le formulaire
			e.preventDefault();

			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var data = (formdata !== null) ? formdata : $form.serialize();
			$.ajax({
				url: 'fonctions/save.php',
				type:'POST',
				contentType: false, // obligatoire pour de l'upload
				processData: false, // obligatoire pour de l'upload
				//dataType: 'json', // selon le retour attendu
				data: data,
				beforeSend:function(){
					$('#bon_achat').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
				},
				success: function (response) {
					$('#bon_achat').show();
					$('#bon_achat').html(response);
				}
			});
		});
		/* VALIDATION DU BON D'ACHAT
		modification du champ de mofification d'une ligne d'achat */
		$(".Cachat").click(function(e) {
			e.preventDefault();
			var compteur=this.id;
			var code_achat=$("#code_"+compteur).val(), qte_achat = $("#qte"+code_achat).val(), prix_achat = $("#prix"+code_achat).val(), code_bon = $("#code_bon").val(), prix_total = qte_achat * prix_achat, type = "update_row_achat_valid"; 
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_achat:code_achat,code_bon:code_bon,qte_achat:qte_achat,prix_achat:prix_achat,prix_total:prix_total,type:type},
				beforeSend:function(){
					$("#affich"+code_achat).html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="10" height="10">');
				},
				success:function(data){ 
					$("#update"+code_achat).removeClass("hidden"); $(".affich"+code_achat).removeClass("hidden");
					$(".edit"+code_achat).addClass("hidden"); $("#save_update"+code_achat).addClass("hidden");
					$("#pu"+code_achat).html(prix_achat); $("#qty"+code_achat).html(qte_achat); $("#pt"+code_achat).html(prix_total);
					$(".totalite").html("Total : "+data+" FF");
					$("#montant_total").val(data);
				}
			});
		});
		// Suppression d'une ligne du bon d'achat deja envoyé
		$(".line_Cachat").click(function(e) {
			e.preventDefault();
			var compteur=this.id;
			var code_achat=$("#code_"+compteur).val(), code_bon = $("#code_bon").val(), type = "delete_row_achat_confirmed"; 
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_achat:code_achat,code_bon:code_bon,type:type},
				success:function(data){ 
					$("#line_validate"+code_achat).addClass("hidden"); 
					$(".totalite").html("Total : "+data+" FF");
					$("#montant_total").val(data);
				}
			});
		});
		// Approbation D'un etat de besoin (achat stock de stock)
		$('#fApprouver_achat').on('submit', function (e) {
			if( !window.stopfonction ){return false;}	
					window.stopfonction = false;
			// On empêche le navigateur de soumettre le formulaire
			e.preventDefault();

			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var data = (formdata !== null) ? formdata : $form.serialize();
			$.ajax({
				url: 'fonctions/save.php',
				type:'POST',
				contentType: false, // obligatoire pour de l'upload
				processData: false, // obligatoire pour de l'upload
				//dataType: 'json', // selon le retour attendu
				data: data,
				beforeSend:function(){
					$('#bon_achat').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
				},
				success: function (response) {
					$('.funga').click();
					$('#validate_bon_achat').addClass("hidden");
					$('.recepsucces').removeClass("hidden");
				}
			});
		});
	/*MODULE ACHAT RESTO 
	SORTIE DU CASH CAISSE
		Approbation D'un etat de besoin (achat stock de stock)*/
		$('#fsortie_cash_achat_resto').on('submit', function (e) {
			if( !window.stopfonction ){return false;}	
				window.stopfonction = false;
			// On empêche le navigateur de soumettre le formulaire
			e.preventDefault();

			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var data = (formdata !== null) ? formdata : $form.serialize();
			$.ajax({
				url: 'fonctions/save.php',
				type:'POST',
				contentType: false, // obligatoire pour de l'upload
				processData: false, // obligatoire pour de l'upload
				//dataType: 'json', // selon le retour attendu
				data: data,
				beforeSend:function(){
					$('#alert-bon-achat').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
				},
				success: function (response) {
					$('.funga').click();
					$('#alert-bon-achat').html(response);
				}
			});
		});
	
	}
	
	// LES FONCTIONALITE DES ACHATS DE STOCK LA BOISSON" 
	function gestock_bar(){ 
		// acffichage du champ de mofification d'une ligne d'achat
		$(".achat").click(function(e) {
			e.preventDefault();
			var compteur=this.id;
			var code_achat=$("#code_"+compteur).val(), type = "delete_row_cmd_boission";
			
			$("#update"+code_achat).addClass("hidden");
			$(".affich"+code_achat).addClass("hidden");
			$(".edit"+code_achat).removeClass("hidden");
			$("#save_update"+code_achat).removeClass("hidden");
		});
		// modification du champ de mofification d'une ligne d'achat
		$(".barachat").click(function(e){ 
			e.preventDefault();
			var compteur=this.id;
			var code_achat=$("#code_"+compteur).val(), qte_achat = $("#qte"+code_achat).val(), prix_achat = $("#prix"+code_achat).val(), prix_total = qte_achat * prix_achat, type = "update_row_achat_boisson"; 
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_achat:code_achat,qte_achat:qte_achat,prix_achat:prix_achat,prix_total:prix_total,type:type},
				beforeSend:function(){
					console.log()
					$("#affich"+code_achat).html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="10" height="10">');
				},
				success:function(data){ 
					$("#update"+code_achat).removeClass("hidden"); $(".affich"+code_achat).removeClass("hidden");
					$(".edit"+code_achat).addClass("hidden"); $("#save_update"+code_achat).addClass("hidden");
					$("#pu"+code_achat).html(prix_achat); $("#qty"+code_achat).html(qte_achat); $("#pt"+code_achat).html(prix_total);
					$(".totalite").html("Total : "+data+" FF"); 
				}
			});
		});
		//Suppression d'une ligne du bon d'achat
		$(".line_achat").click(function(e) {
			e.preventDefault();
			if( !window.stopfonction ){return false;}	
				window.stopfonction = false;
			var compteur=this.id;
			var code_achat=$("#code_"+compteur).val(), type = "delete_row_achat_boisson"; 
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_achat:code_achat,type:type},
				success:function(data){ 
					$(".funga").click();
					$("#lin"+code_achat).addClass("hidden"); 
					$(".totalite").html("Total : "+data+" FF");
				}
			});
		});
		
		//Enregistrement D'un etat de besoin (dmd de stock)
		$('#Fachatbar').on('submit', function (e) {
			if( !window.stopfonction ){return false;}	
					window.stopfonction = false;
			// On empêche le navigateur de soumettre le formulaire
			e.preventDefault();

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
					$('#bon_achatbar').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
				},
				success: function (response) {
					$('#bon_achatbar').show();
					$('#bon_achatbar').html(response);
				}
			});
		});
		/* VALIDATION DU BON D'ACHAT
		modification du champ de mofification d'une ligne d'achat */
		$(".Cachat").click(function(e) {
			e.preventDefault();
			var compteur=this.id;
			var code_achat=$("#code_"+compteur).val(), qte_achat = $("#qte"+code_achat).val(), prix_achat = $("#prix"+code_achat).val(), code_bon = $("#code_bon").val(), prix_total = qte_achat * prix_achat, type = "update_row_achat_valid_boisson"; 
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_achat:code_achat,code_bon:code_bon,qte_achat:qte_achat,prix_achat:prix_achat,prix_total:prix_total,type:type},
				beforeSend:function(){
					$("#affich"+code_achat).html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="10" height="10">');
				},
				success:function(data){ 
					$("#update"+code_achat).removeClass("hidden"); $(".affich"+code_achat).removeClass("hidden");
					$(".edit"+code_achat).addClass("hidden"); $("#save_update"+code_achat).addClass("hidden");
					$("#pu"+code_achat).html(prix_achat); $("#qty"+code_achat).html(qte_achat); $("#pt"+code_achat).html(prix_total);
					$(".totalite").html("Total : "+data+" FF");
					$("#montant_total").val(data);
				}
			});
		});
		// Suppression d'une ligne du bon d'achat deja envoyé
		$(".line_Cachat").click(function(e) {
			e.preventDefault();
			var compteur=this.id;
			var code_achat=$("#code_"+compteur).val(), code_bon = $("#code_bon").val(), type = "delete_row_achat_confirmed_boisson"; 
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_achat:code_achat,code_bon:code_bon,type:type},
				success:function(data){ 
					$("#line_validate"+code_achat).addClass("hidden"); 
					$(".totalite").html("Total : "+data+" FF");
					$("#montant_total").val(data);
				}
			});
		});
		// Approbation D'un etat de besoin (achat stock de boisson)
		$('#fApprouver_achat_boisson').on('submit', function (e) {
			if( !window.stopfonction ){return false;}	
					window.stopfonction = false;
			// On empêche le navigateur de soumettre le formulaire
			e.preventDefault();

			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var data = (formdata !== null) ? formdata : $form.serialize();
			$.ajax({
				url: 'fonctions/save.php',
				type:'POST',
				contentType: false, // obligatoire pour de l'upload
				processData: false, // obligatoire pour de l'upload
				//dataType: 'json', // selon le retour attendu
				data: data,
				beforeSend:function(){
					$('#bon_achat').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
				},
				success: function (response) {
					$('.funga').click();
					$('#validate_bon_achat').addClass("hidden");
					$('.recepsucces').removeClass("hidden");
				}
			});
		});
		/*MODULE ACHAT RESTO 
		SORTIE DU CASH CAISSE 
		Approbation D'un etat de besoin (achat stock de stock)*/
		$('#fsortie_cash_boisson').on('submit', function (e) {
			if( !window.stopfonction ){return false;}	
			window.stopfonction = false;
			// On empêche le navigateur de soumettre le formulaire
			e.preventDefault();

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
					$('#alert-bon-achat').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
				},
				success: function (response) {
					$('.funga').click();
					$('#alert-bon-achat').html(response);
				}
			});
		});
	
	}
	
	/* ====================================== RECEPTION STOCK ================================================================
	Voir les contenu de bon
	*/
	function recep_bon(){
		$(".bon-achat").click(function(e){
			e.preventDefault();
			var compteur=this.id;
			var code_bon=$("#code_"+compteur).val(), type = "apercevoir_un_bon"; 
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_bon:code_bon,type:type},
				success:function(data){ 
					$("#voir_bon_achat").html(data);
				}
			});
			console.log("CODE BON=>"+code_bon)
		});
	}
	
	
	/* ====================================== GESTION AUTRE SERVICES CONSOMMABLE ================================================================
	view update  acffichage du champ de mofification d'une ligne d'achat */
	function services(){
		$(".cat").click(function(e) {
			e.preventDefault();
			var compteur=this.id;
			var code_cat=$("#code_"+compteur).val();
			$("#update"+code_cat).addClass("hidden");
			$(".affich"+code_cat).addClass("hidden");
			$(".edit"+code_cat).removeClass("hidden");
			$("#save_update"+code_cat).removeClass("hidden");
		});
		$(".ser").click(function(e) {
			e.preventDefault();
			var compteur=this.id;
			var code_serv=$("#code_"+compteur).val();
			$("#Supdate"+code_serv).addClass("hidden");
			$(".Saffich"+code_serv).addClass("hidden");
			$(".edit"+code_serv).removeClass("hidden");
			$("#Ssave_update"+code_serv).removeClass("hidden");
		});
		// enregistrement D'une new categorie sevice
		$('#Fcategserv').on('submit', function (e) {
			if( !window.stopfonction ){return false;}	
			window.stopfonction = false;
			// On empêche le navigateur de soumettre le formulaire
			e.preventDefault();
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
					$('#list_of_category').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
				},
				success: function (response) {
					$('#list_of_category').html(response);
				}
			});
		});
		// modification d'un service
		$(".categ").click(function(e){ 
			e.preventDefault();
			var compteur=this.id; var code_categorie=$("#code_"+compteur).val(), categorie = $("#categories"+code_categorie).val(), expli = $("#explis"+code_categorie).val(), type = "update_line_categories"; 
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_categorie:code_categorie,categorie:categorie,expli:expli,type:type},
				beforeSend:function(){
					console.log()
					$("#affich"+code_categorie).html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="10" height="10">');
				},
				success:function(data){ 
					$("#update"+code_categorie).removeClass("hidden"); $(".affich"+code_categorie).removeClass("hidden");
					$(".edit"+code_categorie).addClass("hidden"); $("#save_update"+code_categorie).addClass("hidden");
					$("#nom"+code_categorie).html(categorie); $("#expli"+code_categorie).html(expli);
				}
			});
		});
		// enregistrement D'un new sevice
		$('#Fnewserv').on('submit', function (e) {
			if( !window.stopfonction ){return false;}	
			window.stopfonction = false;
			// On empêche le navigateur de soumettre le formulaire
			e.preventDefault();
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
					$('#list_of_service').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
				},
				success: function (response) {
					$('#list_of_service').html(response);
				}
			});
		});
		// modification d'une categorie de service
		$(".servi").click(function(e){ 
			e.preventDefault();
			var compteur=this.id; var code_serv=$("#code_"+compteur).val(), service = $("#services"+code_serv).val(), unite = $("#unite"+code_serv).val(), prix_normal = $("#normals"+code_serv).val(), prix_vip = $("#vips"+code_serv).val(), prix_casse = $("#casses"+code_serv).val(), type = "update_line_services"; 
			// ajax
			$.ajax({
				url: 'fonctions/save.php',
				type: 'POST',
				data: {code_serv:code_serv,service:service,unite:unite,prix_normal:prix_normal,prix_vip:prix_vip,prix_casse:prix_casse,type:type},
				beforeSend:function(){
					console.log()
					$("#Saffich"+code_serv).html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="10" height="10">');
				},
				success:function(data){ 
					$("#Supdate"+code_serv).removeClass("hidden"); $(".Saffich"+code_serv).removeClass("hidden");
					$(".edit"+code_serv).addClass("hidden"); $("#Ssave_update"+code_serv).addClass("hidden");
					$("#nserv"+code_serv).html(service+" ["+unite+"]"); $("#normal"+code_serv).html(prix_normal);$("#vip"+code_serv).html(prix_vip); $("#casse"+code_serv).html(prix_casse);
				}
			});
		});
		// Basculler de categorie vers Service et vice-versa
		$("#bascule_service").click(function(e){ 
			e.preventDefault();
			$("#ajout_categorie").addClass("hidden"); $("#ajout_service").removeClass("hidden"); 
		});
		$("#bascule_categorie").click(function(e){ 
			e.preventDefault();
			$("#ajout_service").addClass("hidden"); $("#ajout_categorie").removeClass("hidden"); 
		});
		
	}
	/* ======================================              ================================================================ */
	// actualiser le modal
	function reload_cmd_modal(){
		var code_guichet = $("#code_guichet").val(), type = "reload_cmd_modal", keyword = 0, dispo = 0, qte_cmd = 0;
		$.ajax({
			url: 'fonctions/save.php',
			type: 'POST',
			data: {keyword:keyword,dispo:dispo,qte_cmd:qte_cmd,code_guichet:code_guichet,type:type},
			beforeSend:function(){
				$('#cmd_modal').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
			},
			success:function(data){
				$('#cmd_modal').html(data);
				ventes_auclient();
			}
		});
	}
	// actualiser le div de la vente du jour
	function reload_vente_jr(){
		var code_guichet = $("#code_guichet").val(), type = "reload_vente_jr";
		$.ajax({
			url: 'fonctions/save.php',
			type: 'POST',
			data: {code_guichet:code_guichet,type:type},
			beforeSend:function(){
				$('#vente_du_joour').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
			},
			success:function(data){
				$('#vente_du_joour').show();
				$('#vente_du_joour').html(data);
			}
		});
	}
	
	// actualiser le div de la panier en cours
	function reload_panier_en_cours(){
		var code_guichet = $("#code_guichet").val(), type = "reload_panier_en_cours";
		$.ajax({
			url: 'fonctions/save.php',
			type: 'POST',
			data: {code_guichet:code_guichet,type:type},
			beforeSend:function(){
				$('#panier_en_cours_total').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="34" height="34">');
			},
			success:function(data){
				$('#panier_en_cours_total').show();
				$('#panier_en_cours_total').html(data);
			}
		});
	}
	
	// actualiser COMBOBOX de menu en cas de vente des produits stockables et qui peuvent se deduire
	function reload_menu_in_case(){
		var code_guichet = $("#code_guichet").val(), type = "reload_menu_in_case";
		$.ajax({
			url: 'fonctions/save.php',
			type: 'POST',
			data: {code_guichet:code_guichet,type:type},
			beforeSend:function(){
				$('#code_menu').html('<img src="img/gif-load/ajax-loaders.gif" alt="Patienter" width="16" height="16">');
			},
			success:function(data){
				$('#code_menu').show();
				$('#code_menu').html(data);
			}
		});
	}
	