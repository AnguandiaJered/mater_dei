<?php
require('phpscript/connection.php');
$db=db_connection();//connection variable
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FRAIS TRANSPORT BUS</title>
<link href="css/style.css" rel="stylesheet">
<link href="css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="css/8nov17.css" rel="stylesheet">
<link href="css/plugins/datatables/datatables.css" rel="stylesheet">

    
</head>

<body class="_8nov17_body">

<div class="row">

<center id="succ_msg" style="display: none;">
         <div class="alert alert-success" style="margin-left:15px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> Donnée enregistrées avec succès!
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div></center>

    <center id="succ_msg2" style="display: none;">
         <div class="alert alert-error" style="margin-left:15px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> Une erreur est survenue!
                                    <button type="button" class="close close2" data-dismiss="alert">×</button>
    </div></center>

<div class="col-sm-6">
	<div class="portlet portlet-default">
    <div class="portlet-heading">
        <div class="portlet-title">
            <h4>Encodage des données frais transport</h4>
        </div>
        <div class="portlet-widgets">
            <a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample">
            <i class="fa fa-chevron-down"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div id="basicFormExample" class="panel-collapse collapse in">
        <div class="portlet-body">
			<div > 


			<div class="head">
            <button class="btn btn-primary">Modifier</button>
               <!-- <div class="form-group">
               <label for="exampleInputEmail1" style="text-transform:capitalize;">type de compte</label> 
               <select id="type__de__compte_id" name="type__de__compte_id"  class="form-control" tabindex="2" style="margin-right:10px;">

                   <option value="">-Selectionner -</option>
                   <option value="3">Charge</option>
                   <option value="4">Produit</option>
               </select>

               </div> -->
               <!-- <div class="form-group">

               <label for="exampleInputEmail1" style="text-transform:capitalize;">compte</label> 
               <div id="compte_id"></div>
               </div> -->
               <div class="form-group">
               <label for="exampleInputEmail1" style="text-transform:capitalize;">nom du frais</label> 
               <input type="text" id="nom__du__frais" name="nom__du__frais" value="" class="form-control">

               </div>
               <div class="form-group">
               <label for="exampleInputEmail1" style="text-transform:capitalize;" >montant</label>
                <input type="text" id="montant"   name="montant" value="" class="form-control" >
                </div>
                <button type="submit" id="executer__btn" name="executer__btn" class="btn btn-default">Sauvegarder</button>
                <div id="id_result"></div>
                      
                </div>

            </div>
                             </div>
                         </div>
                                <!-- /.portlet -->
                     </div>
                            <!-- /.col-lg-12 (nested) -->
</div>
<!--
LISTE FRAIS TRANSPPORT-->
<div class="col-sm-6">
	<div class="portlet portlet-default">
    <div class="portlet-heading">
        <div class="portlet-title">
            <h4>Liste des carrefours et leur prix</h4>
        </div>
        <div class="portlet-widgets">
            <a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample">
            <i class="fa fa-chevron-down"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div id="basicFormExample" class="panel-collapse collapse in">
        <div class="portlet-body">

        <table class="table table-striped table-bordered table-hover table-green dataTable" id="tbl_carrefour">
 <thead>
<tr>
	<th>No</th>
	<th>Carrefour</th>
  <th>Prix</th>
	<th>Action</th>

</tr>
</thead>
<tbody>
	<?php 
  $num = 0;
    $tab = mysql_query("select * from tbl__80frais__transport");
    while ($result = mysql_fetch_array($tab)) {
      $num++;
      $nom__du__frais = $result["nom__du__frais"];
      $montant = $result["montant"];
      echo "<tr>
        <td>$num</td>
        <td>$nom__du__frais</td>
        <td>$montant</td>
        <td> 
        <button class=' btn btn-info btn-block' data-toggle='modal' data-target='#mdl$num'>Affecter</button>
<div class='modal fade' id='mdl$num' tabindex='-1' role='dialog'>
          <div class='modal-dialog'>
            <div class='modal-content bg_contentMod'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                <h4 class='modal-title' id='myModalLabel'>Enregister un artiste</h4>
              </div>
              <div class='modal-body'>
              $num
</div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
                
              </div>
            </div>
          </div>
        </div>

        </td>
      </tr>";
    }
  ?>
	</table>

        </div>
    </div>
    </div>
    </div>
</div>            

<script src="ajax/jquery-1.9.0.min.js"></script>
<script src="js/plugins/datatables/jquery.dataTables.js"></script>
<script src="js/plugins/datatables/datatables-bs3.js"></script>
<script href="js/plugins/bootstrap/css/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
  
    $("#montant").click(function(){
        console.log("bree")

    })
    var tb = $("#tbl_carrefour").dataTable({
                "bFilter": false,
                 "bPaginate": false,
                 "bInfo":false,
                 "bStateSave": true
                
               } );
    //tb.fnSort( [ [0,'desc']] );
    $("#executer__btn").click(function(){
        //console.log("bree")
        //var  type__de__compte_id = $("#type__de__compte_id").val();
        var  nom__du__frais = $("#nom__du__frais").val();
        var  montant = $("#montant").val();
        //console.log(type__de__compte_id)
        
        if($.trim(nom__du__frais).length == 0 || $.trim(montant).length == 0 ||  montant < 0 ){
          $("#succ_msg2").css("display","block");
          $("#succ_msg").css("display","none");
          console.log(nom__du__frais)
        console.log(montant)
        }
        else {
          $.ajax({
          url:"post_carrefour_bus_scolaire.php",
          type : "POST",
          data : {
            //type__de__compte_id : type__de__compte_id,
            nom__du__frais : nom__du__frais,
            montant : montant
          },
          success : function(data){
            //$("#id_result").html(data);
            $("#succ_msg").css("display","block");
            $("#succ_msg2").css("display","none");

          }
        });

        } 
        
    });
    $(".close").click(function(){
            $("#succ_msg").css("display","none");
            $("#succ_msg2").css("display","none");

    })


    
    


});
</script>
</body>
</html>
