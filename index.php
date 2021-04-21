<?php
@session_start();
include('phpscript/connection.php');
include('phpscript/classe_lib.php');
$db=db_connection();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>::Bienvenu(e) au *** <?php echo system_info(1,$db,'tbl__03configuration');?> *** ::</title>

    <!-- GLOBAL STYLES -->
    <link href="css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <link href="icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- PAGE LEVEL PLUGIN STYLES -->

    <!-- THEME STYLES -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins.css" rel="stylesheet">

    <!-- THEME DEMO STYLES -->
    <link href="css/demo.css" rel="stylesheet">

</head>
<?php
include('phpscript/msg.php');
					   $form=new login_form();
					   $header='<body class="login">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-banner text-center">
                    <h1><i class="fa fa-gears"></i> '.system_info(6,$db,'tbl__03configuration').'</h1>
                </div>
                <div class="portlet portlet-green">
                    <div class="portlet-heading login-heading">
                        <div class="portlet-title">
                            <h4><strong>Ouverture de Session!</strong>
                            </h4>
                        </div>
                        <div class="portlet-widgets">
                            <button class="btn btn-white btn-xs">Demarrer</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                        <form accept-charset="UTF-8" role="form" action="phpscript/open_gate.php" method="post" enctype="multipart/form-data">
                            <fieldset>';
					  $middle='<div class="form-group"><input type="#_input_type" class="form-control"  name="#_name"  placeholder="#_place_holder" /></div>';
					 $footer='<button  type="submit"  class="btn btn-lg btn-green btn-block">Aller</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>';
					  echo  $form->create_login_form($db,2,3,$header,$middle,$footer,'2,3');
					
					   ?>
   <!-- GLOBAL SCRIPTS -->
    <script src="ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/popupoverlay/jquery.popupoverlay.js"></script>
    <script src="js/plugins/popupoverlay/defaults.js"></script>
    <!-- Logout Notification Box -->

</body>
</html>
