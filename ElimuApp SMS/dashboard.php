<?php 
include('phpscript/security_auto_hacking.php'); //avoid unautorized login
include('phpscript/connection.php');//connection page
include('phpscript/classe_lib.php');//class page
$db=db_connection();//connection variable
$accessories= new accessories();
$accessories->unset_session('UPLOAD_FILE');
$accessories->unset_session('UPLOAD_FILE2');
$accessories->unset_session('READFK');
$accessories->unset_session('CHECKBOX');
switch($_SESSION['DESIGNATION'])
		{
			case'admin':
			$fname=foreign_value($ref='where user_id='.$_SESSION['USER_ID'].'',$table='tbl__02utilisateurs',$fld_range=5,$database=$db);
			$lname=foreign_value($ref='where user_id='.$_SESSION['USER_ID'].'',$table='tbl__02utilisateurs',$fld_range=6,$database=$db);
			$photo=student_photo($db,150,150,'img/photoless.jpg','data_buddle','where user_id="'.$_SESSION['USER_ID'].'"','tbl__02utilisateurs',8);
			break;
			case'reception':
			$fname=foreign_value($ref='where user_id='.$_SESSION['USER_ID'].'',$table='tbl__02utilisateurs',$fld_range=5,$database=$db);
			$lname=foreign_value($ref='where user_id='.$_SESSION['USER_ID'].'',$table='tbl__02utilisateurs',$fld_range=6,$database=$db);
			$photo=student_photo($db,150,150,'img/photoless.jpg','data_buddle','where user_id="'.$_SESSION['USER_ID'].'"','tbl__02utilisateurs',8);
			break;
			case'enseignant':
			$id=foreign_value($ref='where user_id='.$_SESSION['USER_ID'].'',$table='tbl__21extra__utilisateur',$fld_range=5,$database=$db);
			$fname=foreign_value($ref='where enseignant_id='.$id.'',$table='tbl__12enseignants',$fld_range=2,$database=$db);
			$lname='';
			$photo=student_photo($db,150,150,'img/photoless.jpg','data_buddle','where user_id="'.$_SESSION['USER_ID'].'"',' tbl__21extra__utilisateur',6);
			break;
			case'directeur':
			$fname=foreign_value($ref='where user_id='.$_SESSION['USER_ID'].'',$table='tbl__02utilisateurs',$fld_range=5,$database=$db);
			$lname=foreign_value($ref='where user_id='.$_SESSION['USER_ID'].'',$table='tbl__02utilisateurs',$fld_range=6,$database=$db);
			$photo=student_photo($db,150,150,'img/photoless.jpg','data_buddle','where user_id="'.$_SESSION['USER_ID'].'"','tbl__02utilisateurs',8);
			break;
			case'financier':
			$fname=foreign_value($ref='where user_id='.$_SESSION['USER_ID'].'',$table='tbl__02utilisateurs',$fld_range=5,$database=$db);
			$lname=foreign_value($ref='where user_id='.$_SESSION['USER_ID'].'',$table='tbl__02utilisateurs',$fld_range=6,$database=$db);
			$photo=student_photo($db,150,150,'img/photoless.jpg','data_buddle','where user_id="'.$_SESSION['USER_ID'].'"','tbl__02utilisateurs',8);
			break;
			case'caissier_sortie':
			$fname=foreign_value($ref='where user_id='.$_SESSION['USER_ID'].'',$table='tbl__02utilisateurs',$fld_range=5,$database=$db);
			$lname=foreign_value($ref='where user_id='.$_SESSION['USER_ID'].'',$table='tbl__02utilisateurs',$fld_range=6,$database=$db);
			$photo=student_photo($db,150,150,'img/photoless.jpg','data_buddle','where user_id="'.$_SESSION['USER_ID'].'"','tbl__02utilisateurs',8);
			break;
			case'caissier_entree':
			$fname=foreign_value($ref='where user_id='.$_SESSION['USER_ID'].'',$table='tbl__02utilisateurs',$fld_range=5,$database=$db);
			$lname=foreign_value($ref='where user_id='.$_SESSION['USER_ID'].'',$table='tbl__02utilisateurs',$fld_range=6,$database=$db);
			$photo=student_photo($db,150,150,'img/photoless.jpg','data_buddle','where user_id="'.$_SESSION['USER_ID'].'"','tbl__02utilisateurs',8);
			break;
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>::Bienvenu(e) au *** <?php echo system_info(1,$db,'tbl__03configuration');?> *** ::</title>

    <!-- PACE LOAD BAR PLUGIN - This creates the subtle load bar effect at the top of the page. -->
    <link href="css/plugins/pace/pace.css" rel="stylesheet">
    <script src="js/plugins/pace/pace.js"></script>

    <!-- GLOBAL STYLES - Include these on every page. -->
    <link href="css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <link href="icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- PAGE LEVEL PLUGIN STYLES -->
    <link href="css/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet">
    <link href="css/plugins/bootstrap-tokenfield/tokenfield-typeahead.css" rel="stylesheet">
    <link href="css/plugins/bootstrap-tokenfield/bootstrap-tokenfield.css" rel="stylesheet">
    <link href="css/plugins/bootstrap-datepicker/datepicker3.css" rel="stylesheet">

    <!-- THEME STYLES - Include these on every page. -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins.css" rel="stylesheet">

    <!-- THEME DEMO STYLES - Use these styles for reference if needed. Otherwise they can be deleted. -->
    <link href="css/demo.css" rel="stylesheet">
    <!--Tab form ends -->
    
  <!--calendar ends -->
  <!--Numeric and dot Valiadation starts -->
  <!--calendar starts -->
    <script type='text/javascript' src='calendar/tcal.js'></script>
    <link href="calendar/tcal.css" rel="stylesheet" type="text/css" />
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
    <!--alert before form submiting -->
  <script>
function show_alert() {
  if(confirm("Etes-vous sure de terminer cette action?\nSi oui alors assurer vous que tous les champs sont deja remplis\nAutrement vous devriez les remplir avant de continuer."))
    document.forms[0].submit();
  else
    return false;
}
</script>
<!--COMMENT STARTS FANCY POPUP-->

<script src="fancy/jquery.js" type="text/javascript"></script> 
<link href="fancy/facebox1.2/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="fancy/facebox1.2/src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox() 
    closeImage   : " fancy/closelabel.png" 
})
</script>

<script type="text/javascript">

$(document).ready(function(){
$("#shadow").fadeOut();

  $("#cancel_hide").click(function(){
        $("#").fadeOut("slow");
        $("#shadow").fadeOut();
    
   });
      });
   </script>


<!--COMMENT ENDS -->
<?php
//sending sms
$Arg="'243977660514','HighKingdom','Heaven is upon you Miracle Catch it up please my Son?'";
							
							
							/*echo '<script>SendSms('.$Arg.')</script>'; */
?>
</head>

<body onLoad="<?php //echo 'SendSms('.$Arg.')';?>">

    <div id="wrapper">

        <!-- begin TOP NAVIGATION -->
        <nav class="navbar-top" role="navigation">

            <!-- begin BRAND HEADING -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".sidebar-collapse">
                    <i class="fa fa-bars"></i> Menu
                </button>
                <div class="navbar-brand">
                <img src="data_buddle/elimu.jpg" class="img-responsive"/>
                   
                </div>
            </div>
            <!-- end BRAND HEADING -->

            <div class="nav-top">

                <!-- begin LEFT SIDE WIDGETS -->
                <ul class="nav navbar-left">
                    <li class="tooltip-sidebar-toggle">
                        <a href="#" id="sidebar-toggle" data-toggle="tooltip" data-placement="right" title="Sidebar Toggle">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                    <!-- You may add more widgets here using <li> -->
                </ul>
                <!-- end LEFT SIDE WIDGETS -->
<iframe src="texteffect/index.html" frameborder="0" height="100"></iframe>
                <!-- begin MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->
                <ul class="nav navbar-right">

                    <!-- begin MESSAGES DROPDOWN -->
                    <li class="dropdown">
                        <a href="#" class="messages-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope"></i>
                            <span class="number">4</span> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-scroll dropdown-messages">

                            <!-- Messages Dropdown Heading -->
                            <li class="dropdown-header">
                                <i class="fa fa-envelope"></i> 4 New Messages
                            </li>

                            <!-- Messages Dropdown Body - This is contained within a SlimScroll fixed height box. You can change the height using the SlimScroll jQuery features. -->
                            <li id="messageScroll">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">
                                            <div class="row">
                                                <div class="col-xs-2">
                                                    <img class="img-circle" src="img/user-profile-1.jpg" alt="">
                                                </div>
                                                <div class="col-xs-10">
                                                    <p>
                                                        <strong>Jane Smith</strong>: Hi again! I wanted to let you know that the order...
                                                    </p>
                                                    <p class="small">
                                                        <i class="fa fa-clock-o"></i> 12 minutes ago
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="row">
                                                <div class="col-xs-2">
                                                    <img class="img-circle" src="img/user-profile-2.jpg" alt="">
                                                </div>
                                                <div class="col-xs-10">
                                                    <p>
                                                        <strong>Roddy Austin</strong>: Thanks for the info, if you need anything from...
                                                    </p>
                                                    <p class="small">
                                                        <i class="fa fa-clock-o"></i> 3:39 PM
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="row">
                                                <div class="col-xs-2">
                                                    <img class="img-circle" src="img/user-profile-3.jpg" alt="">
                                                </div>
                                                <div class="col-xs-10">
                                                    <p>
                                                        <strong>Stacy Gibson</strong>: Hey, what was the purchase order number for the...
                                                    </p>
                                                    <p class="small">
                                                        <i class="fa fa-clock-o"></i> Yesterday at 10:23 AM
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="row">
                                                <div class="col-xs-2">
                                                    <img class="img-circle" src="img/user-profile-4.jpg" alt="">
                                                </div>
                                                <div class="col-xs-10">
                                                    <p>
                                                        <strong>Jeffrey Cortez</strong>: Check out this video I found the other day, it's...
                                                    </p>
                                                    <p class="small">
                                                        <i class="fa fa-clock-o"></i> Tuesday at 12:23 PM
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Messages Dropdown Footer -->
                            <li class="dropdown-footer">
                                <a href="mailbox.html">Read All Messages</a>
                            </li>

                        </ul>
                        <!-- /.dropdown-menu -->
                    </li>
                    <!-- /.dropdown -->
                    <!-- end MESSAGES DROPDOWN -->

                    <!-- begin ALERTS DROPDOWN -->
                    <li class="dropdown">
                        <a href="#" class="alerts-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell"></i> 
                            <span class="number">9</span><i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-scroll dropdown-alerts">

                            <!-- Alerts Dropdown Heading -->
                            <li class="dropdown-header">
                                <i class="fa fa-bell"></i> 9 New Alerts
                            </li>

                            <!-- Alerts Dropdown Body - This is contained within a SlimScroll fixed height box. You can change the height using the SlimScroll jQuery features. -->
                            <li id="alertScroll">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">
                                            <div class="alert-icon green pull-left">
                                                <i class="fa fa-money"></i>
                                            </div>
                                            Order #2931 Received
                                            <span class="small pull-right">
                                                <strong>
                                                    <em>3 minutes ago</em>
                                                </strong>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="alert-icon blue pull-left">
                                                <i class="fa fa-comment"></i>
                                            </div>
                                            New Comments
                                            <span class="badge blue pull-right">15</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="alert-icon orange pull-left">
                                                <i class="fa fa-wrench"></i>
                                            </div>
                                            Crawl Errors Detected
                                            <span class="badge orange pull-right">3</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="alert-icon yellow pull-left">
                                                <i class="fa fa-question-circle"></i>
                                            </div>
                                            Server #2 Not Responding
                                            <span class="small pull-right">
                                                <strong>
                                                    <em>5:25 PM</em>
                                                </strong>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="alert-icon red pull-left">
                                                <i class="fa fa-bolt"></i>
                                            </div>
                                            Server #4 Crashed
                                            <span class="small pull-right">
                                                <strong>
                                                    <em>3:34 PM</em>
                                                </strong>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="alert-icon green pull-left">
                                                <i class="fa fa-plus-circle"></i>
                                            </div>
                                            New Users
                                            <span class="badge green pull-right">5</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="alert-icon orange pull-left">
                                                <i class="fa fa-download"></i>
                                            </div>
                                            Downloads
                                            <span class="badge orange pull-right">16</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="alert-icon purple pull-left">
                                                <i class="fa fa-cloud-upload"></i>
                                            </div>
                                            Server #8 Rebooted
                                            <span class="small pull-right">
                                                <strong>
                                                    <em>12 hours ago</em>
                                                </strong>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="alert-icon red pull-left">
                                                <i class="fa fa-bolt"></i>
                                            </div>
                                            Server #8 Crashed
                                            <span class="small pull-right">
                                                <strong>
                                                    <em>12 hours ago</em>
                                                </strong>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Alerts Dropdown Footer -->
                            <li class="dropdown-footer">
                                <a href="#">View All Alerts</a>
                            </li>

                        </ul>
                        <!-- /.dropdown-menu -->
                    </li>
                    <!-- /.dropdown -->
                    <!-- end ALERTS DROPDOWN -->

                    <!-- begin TASKS DROPDOWN -->
                    <li class="dropdown">
                        <a href="#" class="tasks-link dropdown-toggle" data-toggle=dropdown>
                            <i class="fa fa-tasks"></i> 
                            <span class=number>10</span><i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-scroll dropdown-tasks">

                            <!-- Tasks Dropdown Header -->
                            <li class="dropdown-header">
                                <i class="fa fa-tasks"></i> 10 Pending Tasks
                            </li>

                            <!-- Tasks Dropdown Body - This is contained within a SlimScroll fixed height box. You can change the height using the SlimScroll jQuery features. -->
                            <li id="taskScroll">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">
                                            <p>
                                                Software Update 2.1
                                                <span class="pull-right">
                                                    <strong>60%</strong>
                                                </span>
                                            </p>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <p>
                                                Server #2 Hardware Upgrade
                                                <span class="pull-right">
                                                    <strong>90%</strong>
                                                </span>
                                            </p>
                                            <div class="progress progress-striped">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <p>
                                                Call Ticket #2032
                                                <span class="pull-right">
                                                    <strong>72%</strong>
                                                </span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <p>
                                                Emergency Maintenance
                                                <span class="pull-right">
                                                    <strong>36%</strong>
                                                </span>
                                            </p>
                                            <div class="progress progress-striped">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="36" aria-valuemin="0" aria-valuemax="100" style="width: 36%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <p>
                                                Purchase Order #439
                                                <span class="pull-right">
                                                    <strong>52%</strong>
                                                </span>
                                            </p>
                                            <div class="progress progress-striped">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100" style="width: 52%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <p>
                                                March Content Update
                                                <span class="pull-right">
                                                    <strong>14%</strong>
                                                </span>
                                            </p>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100" style="width: 14%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <p>
                                                Client #42 Data Scrubbing
                                                <span class="pull-right">
                                                    <strong>68%</strong>
                                                </span>
                                            </p>
                                            <div class="progress progress-striped">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <p>
                                                PHP Upgrade Server #6
                                                <span class="pull-right">
                                                    <strong>85%</strong>
                                                </span>
                                            </p>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <p>
                                                Malware Scan
                                                <span class="pull-right">
                                                    <strong>66%</strong>
                                                </span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <p>
                                                New Employee Intake
                                                <span class="pull-right">
                                                    <strong>98%</strong>
                                                </span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100" style="width: 98%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Tasks Dropdown Footer -->
                            <li class="dropdown-footer">
                                <a href="#">View All Tasks</a>
                            </li>

                        </ul>
                        <!-- /.dropdown-menu -->
                    </li>
                    <!-- /.dropdown -->
                    <!-- end TASKS DROPDOWN -->

                    <!-- begin USER ACTIONS DROPDOWN -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                       		<li class="divider"></li>
                            <li>
                                <a href="edit_pwd.php" rel="facebox">
                                    <i class="fa fa-gear"></i> Changer mot de passe
                                </a>
                            </li>
                            <li>
                                <a class="logout_open" href="#logout">
                                    <i class="fa fa-sign-out"></i> Logout
                                    <strong><?php echo $fname.'&nbsp;'.$lname;?></strong>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-menu -->
                    </li>
                    <!-- /.dropdown -->
                    <!-- end USER ACTIONS DROPDOWN -->

                </ul>
                <!-- /.nav -->
                <!-- end MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->

            </div>
            <!-- /.nav-top -->
        </nav>
        <!-- /.navbar-top -->
        <!-- end TOP NAVIGATION -->

        <!-- begin SIDE NAVIGATION -->
        <?php if(CL!=39)
		{?>
        <nav class="navbar-side" role="navigation">
            <div class="navbar-collapse sidebar-collapse collapse">
                <?php
		//class menu generator
		$menu=new menu_generator();
		/*##################################################*/
		/*
		This variable below is an associative array that constructs the menu of the application
		so you may wonder how it works?
		don't worry there's already a function that  has been implemented for you but it's up to you to know how
		to deal with!!
		as you know the associative array has values and look carefully how value is:
		this is idea concept:
		an array value has data separatated with comma, the first value is a string that is the menu
		and the followed value are table indexes; notice: you better add existed table indexes inorder to avoid errors
		there's not guessing or betting!!!
		
		*/
		switch($_SESSION['DESIGNATION'])
		{
		case'admin':
		$menusubmenu_array=array('0'=>'CONFIGURATION,3,40,2,9,10,11,20,19,12,39,14,15,16,23,24,25,26,80','1'=>'LISTE ELEVE,36','2'=>'GESTION DES COTES,18','3'=>'FINANCE,22,33,29,35','4'=>'RAPPORTS,31,32,34'/*, '5' =>'FRAIS BUS','80' */);
		break;
		case'enseignant':
		$menusubmenu_array=array('0'=>'GESTION DES COTES,18,38','1'=>'LISTE ELEVE,36');
		break;
		case'directeur':
		$menusubmenu_array=array('0'=>'LISTE ELEVE,36','1'=>'RAPPORTS,31,32,34');
		break;
		case'reception':
		$menusubmenu_array=array('0'=>'INSCRIPTION ELEVE,17,36','1'=>'RAPPORTS,31,32');
		break;
		case 'financier':
		$menusubmenu_array=array('0'=>'FINANCE,35','1'=>'RAPPORTS,31,32,34');
		break;
		case 'caissier_entree':
		$menusubmenu_array=array('0'=>'INSCRIPTION ELEVE,17,36','1'=>'ENTREE,22,33','2'=>'RAPPORTS,31,32,34');
		break;
		case 'caissier_sortie':
		$menusubmenu_array=array('0'=>'SORTIE,29','1'=>'RAPPORTS,31,32,34');
		break;
		default:
		{
			$menusubmenu_array='';
		}
		}//start array index from 0++ please dont use array variable as letter in order to avoid error crash
		/*
		this variable below  its value can be altered when you're using a different theme, this is all about the tag list open
		
		*/
		
		$menuopen='<ul id="side" class="nav navbar-nav side-nav">
                    <!-- begin SIDE NAV USER PANEL -->
                    <li class="side-user hidden-xs">
                      '.$photo.'
                        <p class="welcome">
                            <i class="fa fa-key"></i> Logged in as
                        </p>
                        <p class="name tooltip-sidebar-logout">
                            '.$fname.'
                            <span class="last-name">'.$lname.'</span> <a style="color: inherit" class="logout_open" href="#logout" data-toggle="tooltip" data-placement="top" title="Fermeture de Session"><i class="fa fa-sign-out"></i></a>
                        </p>
                        <div class="clearfix"></div>
                    </li>
                    <!-- end SIDE NAV USER PANEL -->
                    <!-- begin SIDE NAV SEARCH -->
                    <li class="nav-search">
                        <form role="form">
                            <input type="search" class="form-control" placeholder="Recherche Eleve...">
                            <button class="btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </li>';
		/*this variable below is a dynamic list its value can be altered in case you're using a different theme*/
		$menudyn='
                <li class="panel">
				 <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="##_ID">
                            <i class="fa fa-bar-chart-o"></i> #_menu <i class="fa fa-caret-down"></i>
                        </a>
				<ul class="collapse nav" id="#_ID">#_submenu</ul></li>';
		/* this variable below close the tag of the list*/
		$menuend='</ul>';
		/*this variable below can't be altered*/
		$submenuopen='';
		/*this variable below it's all about the dynamic value for submenu*/
		$submenudyn='<li style="text-transform:capitalize;">
                                <a href="?class=#_url&action=#_action&ref_id=#_id&ref_menu=default">#_tbl</a>
                            </li>';
							
		/*this variable below can't be altered*/
		$submenuend='';
		/* this variable below it's all about the home page link you can alter it by giving a class to the list value in case you're using a different theme*/
		$homeurl='<li>
                        <a class="active" href="?class=default&action=default&ref_id=default&ref_menu=default">
                            <i class="fa fa-dashboard"></i> Accueil
                        </a>
                    </li>';
		/*this is the function that generates the menu of the application*/
		echo $menu->menu_and_submenu($menusubmenu_array,$db,$menuopen,$menudyn,$menuend,$submenuopen,$submenudyn,$submenuend,$homeurl); 
		?>   
        <?php
		?> 
</div>
            <!-- /.navbar-collapse -->
        </nav>
        
        <!-- /.navbar-side -->
        <!-- end SIDE NAVIGATION -->

        <!-- begin MAIN PAGE CONTENT -->
        <?php }?>
     
        
        <div id="page-wrapper"   <?php if(CL==39)
		{?>style="margin-left:-10px;"><?php }?>


            <div class="page-content" >

                <!-- begin PAGE TITLE AREA -->
                <!-- Use this section for each page's title and breadcrumb layout. In this example a date range picker is included within the breadcrumb. -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>Elimu 1.0
                                <small>Powered by Naledi Services</small>
                            </h1>
                           <!-- <ol class="breadcrumb">
                                <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                                <li class="pull-right">
                                    <div id="reportrange" class="btn btn-green btn-square date-picker">
                                        <i class="fa fa-calendar"></i>
                                        <span class="date-range"></span> <i class="fa fa-caret-down"></i>
                                    </div>
                                </li>
                            </ol> -->
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE AREA -->

                <!-- begin DASHBOARD CIRCLE TILES -->
                <div class="row">
                <?php if($_GET['class']!='default')
				{
					include('phpscript/msg.php');//form generator starts
						//1textbox
						//2textarea
						//3 int&dot
						//4 gender
						//5 read fk
						//6 calendar
						//7 dropdown list
						//8 dropdown list group
						//9 list choice yes or no
						$form= new form_generator();
						$temps='';
		if(isset($_GET['read_col']))
	    {
			$extra_link='&read_col='.$_GET['read_col'].'';
     	}else
		{
		    $extra_link='';
		}
		if(FK!='default')
		{
			$add_new_url='?class='.CL.'&action=default&ref_id=default&ref_menu='.FK.'&read_col='.$_GET['read_col'].'';
		}
		else
		{
		   $add_new_url='?class='.CL.'&action=default&ref_id=default&ref_menu=default';
		}
		if(CL==38)
		{
			$resume_financier='&nbsp;<a href="notification_budget.php?class='.CL.'&action=default&ref_id=default&ref_menu=default" rel="facebox" class="btn btn">Resume Financier</a>';
		}else
		{
			$resume_financier='';
		}
		if(CL==2)
		{
			$extra_btn='&nbsp;<a href="retrieve/?class=12&action=retrieving&ref_id=default&ref_menu=default" class="btn btn-primary">Enseignant</a>
										<a href="retrieve/?class=21&action=retrieving&ref_id=default&ref_menu=default" class="btn btn-primary">Affichager Enseignant</a>';
		}
		else
		{
			$extra_btn='';
		}
						$action='phpscript/executer.php?class='.CL.'&action='.AC.'&ref_id='.ID.'&ref_menu='.FK.$extra_link.'';
						$form_header='
						
<div class="col-lg-6">
<div class="row"><div class="col-lg-12">

                                <div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Encodage des données '.str_replace('00','/',str_replace('666',"'",str_replace('__',' ',(substr($form->table_name(CL,$db),+7))))).'</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#basicFormExample"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="basicFormExample" class="panel-collapse collapse in">
                                        <div class="portlet-body">
						<form role="form" method="post" action="'.$action.'" enctype="multipart/form-data" onsubmit=" return show_alert();"> <div class="head">
                                       
                                        <div class="side fr" style="margin-bottom:15px;">
										<a href="'.$add_new_url.'" class="btn btn-primary">Ajouter</a>
										<a href="retrieve/?class='.CL.'&action=retrieving&ref_id=default&ref_menu='.FK.$extra_link.'" class="btn btn-primary">Afficher</a>'.$resume_financier.$extra_btn.'</div>'.$temps
						
						;
						$form_middle='<div class="form-group"><label for="exampleInputEmail1" style="text-transform:capitalize;">#_label</label> #_input</div>';
						if(AC=='edit')
						{
						$btn_value='Editer';
						}else
						{
						$btn_value='Sauvegarder';	
						}
						//submit name takes always name as //executer__btn
						$form_footer='<button type="submit"  name="executer__btn" class="btn btn-default">'.$btn_value.'</button>
                      </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.portlet -->
                            </div>
                            <!-- /.col-lg-12 (nested) -->
							</div>
							</div>';
						$css_class='form-control'; 
						switch(CL)
						{
							//formulaire foreign Keys starts
							case 1:
							$input='1,3,3';
							$table=$form->table_name(CL,$db);
							$dropdown_list='';
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 2:
							$input='1,1,11,1,1,4,17';
							$_SESSION['UPLOAD_FILE']=8;
							$table=$form->table_name(CL,$db);
							$dropdown_list='';
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							//formulaire foreign keys ends
							case 3:
							$input='1,1,1,2,2,1,1,2,3,3,17,3,3,2,3';
							$_SESSION['UPLOAD_FILE']=12;
							$table=$form->table_name(CL,$db);
							$dropdown_list='';
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							//formulaire type de resau starts
							//form for tab starts
							case 4:
							$input='1,3,1,3,3';
							$table=$form->table_name(CL,$db);
							$dropdown_list='';
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							//form for tab ends
							//tab form inputs starts
							case 5:
							$input='3,3,7,1';
							$table=$form->table_name(CL,$db);
							$dropdown_list=array('0'=>'3,6,0,1,0,0,545,empty');
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							//form for tab ends
							//tab form inputs starts
							case 7:
							$input='5,1,1,1,1,1,3,1';
							$table=$form->table_name(CL,$db);
							$dropdown_list='';
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							//form for tab ends
							//formulaire partenaire de mise en oeuvre starts
							case 9:
							$input='1';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							$table=$form->table_name(CL,$db);
							$dropdown_list='';
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 10:
							$_SESSION['UPLOAD_FILE']=10;
							$input='1,7,21,1,1,1,1,2,17';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							$table=$form->table_name(CL,$db);
							$dropdown_list=array('0'=>'2,9,0,1,0,0,0,empty');
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 11:
							$input='1';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							$table=$form->table_name(CL,$db);
							$dropdown_list='';
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 12:
							$input='1,4,7,1,1,1,';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							$table=$form->table_name(CL,$db);
							$dropdown_list=array('0'=>'3,19,0,1,0,0,0,empty');
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 13:
							$input='1,7,<div id="option_id"></div>,<div id="classe_idz"></div>,7,3,3,3,3,3';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							$table=$form->table_name(CL,$db);
							$dropdown_list=array('0'=>'2,11,0,1,0,0,0,show_option','1'=>'5,12,0,1,0,0,0,empty');
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 14:
							$input='7,<div id="compte_id"></div>,1,3';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							$table=$form->table_name(CL,$db);
							$dropdown_list=array('0'=>'1,25,0,1,0,0,0,show_compte');
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 15:
							#$_SESSION['CHECKBOX']=5;
							$input='22,7,<div id="option_id"></div>,20,20,3,3,3,3';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							$table=$form->table_name(CL,$db);
							$dropdown_list=array('0'=>'2,11,0,1,0,0,0,show_option','1'=>'4,12,0,1,0,0,0,empty','2'=>'5,14,0,3,0,0,0,empty');
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 16:
							$input='1';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							$table=$form->table_name(CL,$db);
							$dropdown_list='';
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 17:
							#$input='1,1,21,4,1,1,1,1,2,1,7,7,22,17';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							#$table=$form->table_name(CL,$db);
							#$dropdown_list=array('0'=>'11,11,0,1,0,0,0,empty','1'=>'12,15,0,1,0,0,0,empty');
							if($_SESSION['DESIGNATION']=='reception')
							{
							echo'
							<a class="pull-right btn-show" href="retrieve/?class=17&action=default&ref_id=default&ref_menu=default"><button type="button" class="btn btn-success">Affichage donnees</button></a>
							<iframe src="inscription_eleve.php?class=17&action='.AC.'&ref_id='.ID.'&ref_menu=default" width="100%" height="850px;" frameborder="0"></iframe>';	
							#echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 18:
							#$input='1,1,21,4,1,1,1,1,2,1,7,7,22,17';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							#$table=$form->table_name(CL,$db);
							#$dropdown_list=array('0'=>'11,11,0,1,0,0,0,empty','1'=>'12,15,0,1,0,0,0,empty');
							if($_SESSION['DESIGNATION']=='enseignant')
							{
							echo'
							<iframe src="gestion_des_cotes.php?class=17&action='.AC.'&ref_id='.ID.'&ref_menu=default" width="100%" height="800px;" frameborder="0"></iframe>';	
							#echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 19:
							$input='1';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							$table=$form->table_name(CL,$db);
							$dropdown_list='';
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 20:
							$input='7,1';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							$table=$form->table_name(CL,$db);
							$dropdown_list=array('0'=>'1,11,0,1,0,0,0,empty');
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 22:
							echo'<div id="DisplayContentSecId"></div>';
							#$input='1,1,21,4,1,1,1,1,2,1,7,7,22,17';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							#$table=$form->table_name(CL,$db);
							#$dropdown_list=array('0'=>'11,11,0,1,0,0,0,empty','1'=>'12,15,0,1,0,0,0,empty');
							if($_SESSION['DESIGNATION']=='admin'||$_SESSION['DESIGNATION']=='caissier_entree'||$_SESSION['DESIGNATION']=='reception')
							{
							if(AC=='print_receipt')
							{
								echo'
							<iframe src="MPDF57/examples/print_receipt.php?id='.ID.'" width="100%" height="800px;" frameborder="0"></iframe>';
							}else
							{
							echo'
							<iframe src="finance_recherche_eleve.php?class=22&action='.AC.'&ref_id='.ID.'&ref_menu=default" width="100%" height="2000px;" frameborder="0"></iframe>';
							}
							#echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 23:
							$input='1';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							$table=$form->table_name(CL,$db);
							$dropdown_list='';
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 24:
							$input='1';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							$table=$form->table_name(CL,$db);
							$dropdown_list='';
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 25:
							$input='1';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							$table=$form->table_name(CL,$db);
							$dropdown_list='';
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 26:
							$input='7,1';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							$table=$form->table_name(CL,$db);
							$dropdown_list=array('0'=>'1,25,0,1,0,0,0,empty');
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
                            case 80:
                            echo'<iframe src="carrefour_bus_scolaire.php?class=80&action='.AC.'&ref_id='.ID.'&ref_menu=default" width="100%" height="850px;" frameborder="0"></iframe>';
                            //echo "essai";  
                            /*$input='7,<div id="compte_id"></div>,1,3';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
                            $table=$form->table_name(CL,$db);
                            $dropdown_list=array('0'=>'1,25,0,1,0,0,0,show_compte');
                            if($_SESSION['DESIGNATION']=='admin')
                            {
                            echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
                            }*/
                           
                            
                            break;
							case 29:
							$categorie='<select name="categorie_id" class="form-control" onChange="return show_treasure_bank1(this);">
							<option value="">--Selectionner--</option>
							<option value="1">Caisse</option>
							<option value="2">Banque</option>
							</select>';
							$input='1,3,2,23,'.$categorie.',<div id="treasure_bankId"></div>,7,<div id="compte_id"></div>';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							$table=$form->table_name(CL,$db);
							$dropdown_list=array('0'=>'7,25,0,1,0,0,0,show_compte');
							if($_SESSION['DESIGNATION']=='caissier_sortie')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 31:
							if($_SESSION['DESIGNATION']=='directeur'||$_SESSION['DESIGNATION']=='financier'||$_SESSION['DESIGNATION']=='reception')
							{
							echo '<iframe src="rapport_perception_des_frais.php" width="100%" height="800px;" frameborder="0"></iframe>';
							break;
							}
							case 32:
							if($_SESSION['DESIGNATION']=='directeur'||$_SESSION['DESIGNATION']=='financier'||$_SESSION['DESIGNATION']=='reception'||$_SESSION['DESIGNATION']=='caissier_sortie'||$_SESSION['DESIGNATION']=='caissier_entree')
							{
							echo '<iframe src="rapport_solvabilite.php" width="100%" height="800px;" frameborder="0"></iframe>';
							}
							break;
							case 33:
							$categorie='<select name="categorie_id" class="form-control" onChange="return show_treasure_bank1(this);">
							<option value="">--Selectionner--</option>
							<option value="1">Caisse</option>
							<option value="2">Banque</option>
							</select>';
							$input='1,3,2,23,'.$categorie.',<div id="treasure_bankId"></div>,7,<div id="compte_id"></div>';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							$table=$form->table_name(CL,$db);
							$dropdown_list=array('0'=>'7,25,0,1,0,0,0,show_compte');
							if($_SESSION['DESIGNATION']=='caissier_entree')
							{
							echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 34:
							if($_SESSION['DESIGNATION']=='directeur'||$_SESSION['DESIGNATION']=='financier'||$_SESSION['DESIGNATION']=='caissier_sortie'||$_SESSION['DESIGNATION']=='caissier_entree')
							{
							echo '<iframe src="journal_caisse.php" width="100%" height="800px;" frameborder="0"></iframe>';
							}
							break;
							case 35:
							echo '<iframe src="transfert.php" width="100%" height="800px;" frameborder="0"></iframe>';
							break;
							case 36:
							echo'
							<iframe src="list_eleve.php?class=17&action='.AC.'&ref_id='.ID.'&ref_menu=default" width="100%" height="800px;" frameborder="0"></iframe>';	
							break;
							case 38:
							#$input='1,1,21,4,1,1,1,1,2,1,7,7,22,17';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							#$table=$form->table_name(CL,$db);
							#$dropdown_list=array('0'=>'11,11,0,1,0,0,0,empty','1'=>'12,15,0,1,0,0,0,empty');
							if($_SESSION['DESIGNATION']=='enseignant')
							{
							echo'
							<iframe src="bulletin.php?class=17&action='.AC.'&ref_id='.ID.'&ref_menu=default" width="100%" height="800px;" frameborder="0"></iframe>';	
							#echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 39:
							#$input='1,1,21,4,1,1,1,1,2,1,7,7,22,17';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							#$table=$form->table_name(CL,$db);
							#$dropdown_list=array('0'=>'11,11,0,1,0,0,0,empty','1'=>'12,15,0,1,0,0,0,empty');
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo'
							<iframe src="multiple_encodage.php" width="100%" height="800px;" frameborder="0"></iframe>';	
							#echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							case 40:
							#$input='1,1,21,4,1,1,1,1,2,1,7,7,22,17';#,1,1,4,6,3,1,1,2,17,1,1,1,1,1,1,2';
							#$table=$form->table_name(CL,$db);
							#$dropdown_list=array('0'=>'11,11,0,1,0,0,0,empty','1'=>'12,15,0,1,0,0,0,empty');
							if($_SESSION['DESIGNATION']=='admin')
							{
							echo'
							<iframe src="three/index.php" width="100%" height="1200px;" frameborder="0"></iframe>';	
							#echo $form->dynamic_form_middle($db,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list);
							}
							break;
							default:
							{
								$input='';
							}
						}
				}else
				{?>
                   
<?php 
				}//other features?>
            </div>
            <!-- /.page-content -->

        </div>
        <!-- /#page-wrapper -->
        <!-- end MAIN PAGE CONTENT -->

    </div>
    <!-- /#wrapper -->
<script src="ajax/jquery-1.9.0.min.js"></script> 
<script>
function show_option(sel) {
	var section_id = sel.options[sel.selectedIndex].value;  
	if (section_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/option.php",
			data: "section_id="+section_id+"",
			cache: false,
			beforeSend: function () { 
				$('#option_id').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#option_id").html( html );
			}
		});
	} else {
		$("#option_id").html( "" );
	}
}
function show_classez(sel) {
	var option_id = sel.options[sel.selectedIndex].value;  
	if (option_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/classe.php",
			data: "option_id="+option_id+"",
			cache: false,
			beforeSend: function () { 
				$('#classe_idz').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#classe_idz").html( html );
			}
		});
	} else {
		$("#classe_idz").html( "" );
	}
}
function show_class_name_1(sel) {
	var alphabet = sel.options[sel.selectedIndex].value; 
	var nume_id= document.getElementById('num_id').value; 
	if (alphabet.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/classe_name.php",
			data: "alphabet="+alphabet+"&nume_id="+nume_id+"",
			cache: false,
			beforeSend: function () { 
				$('#nom_classe').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#nom_classe").html( html );
			}
		});
	} else {
		$("#nom_classe").html( "" );
	}
}
function show_compte(sel) {
	var type_de_compte_id = sel.options[sel.selectedIndex].value; 
	if (type_de_compte_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/compte.php",
			data: "type_de_compte_id="+type_de_compte_id+"",
			cache: false,
			beforeSend: function () { 
				$('#compte_id').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#compte_id").html( html );
			}
		});
	} else {
		$("#compte_id").html( "" );
	}
}
function show_treasure_bank1(sel) {
	var choice_id = sel.options[sel.selectedIndex].value;  
	if (choice_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/treasure_bank.php",
			data: "choice_id="+choice_id+"",
			cache: false,
			beforeSend: function () { 
				$('#treasure_bankId').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#treasure_bankId").html( html );
			}
		});
	} else {
		$("#treasure_bankId").html( "" );
	}
}
function SendSms(SendeTel,Source,DisplayContentSec)
{
	/* $.ajax({
			type: "POST",
			url: "http://121.241.242.114:8080/bulksms/bulksms?username=elit-materdei&password=materdei&type=0&dlr=1&destination="+SendeTel+"&source=NALEDI&message="+MsgContent+"",
			data: "",
			cache: false,
			beforeSend: function () { 
				$('#'+DisplayContentSec).html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#"+DisplayContentSec).html( html );
			}
		});*/
		window.open('http://121.241.242.114:8080/bulksms/bulksms?username=elit-materdei&password=materdei&type=0&dlr=1&destination='+SendeTel+'&source='+Source+'&message='+DisplayContentSec+'', '_blank');
}
</script>
    <!-- GLOBAL SCRIPTS -->
    <script src="ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="js/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/popupoverlay/jquery.popupoverlay.js"></script>
    <script src="js/plugins/popupoverlay/defaults.js"></script>
    <!-- Logout Notification Box -->
    <div id="logout">
        <div class="logout-message">
           <?php 
		   echo $photo;?>
            <h3>
                <i class="fa fa-sign-out text-green"></i> Pret pour fermer?
            </h3>
            <p>Selectionner "Fermerture de Session" si vous etes pret<br> pour fermer votre session.</p>
            <ul class="list-inline">
                <li>
                    <a href="logout.php" class="btn btn-green">
                        <strong>Fermerture de Session</strong>
                    </a>
                </li>
                <li>
                    <button class="logout_close btn btn-green">Annuler</button>
                </li>
            </ul>
        </div>
    </div>
    <!-- /#logout -->
    <!-- Logout Notification jQuery -->
    <script src="js/plugins/popupoverlay/logout.js"></script>
    <!-- HISRC Retina Images -->
    <script src="js/plugins/hisrc/hisrc.js"></script>

    <!-- PAGE LEVEL PLUGIN SCRIPTS -->
    <!-- HubSpot Messenger -->
    <script src="js/plugins/messenger/messenger.min.js"></script>
    <script src="js/plugins/messenger/messenger-theme-flat.js"></script>
    <!-- Date Range Picker -->
    <script src="js/plugins/daterangepicker/moment.js"></script>
    <script src="js/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Morris Charts -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>
    <!-- Flot Charts -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <!-- Sparkline Charts -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- Moment.js -->
    <script src="js/plugins/moment/moment.min.js"></script>
    <!-- jQuery Vector Map -->
    <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/plugins/jvectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/demo/map-demo-data.js"></script>
    <!-- Easy Pie Chart -->
    <script src="js/plugins/easypiechart/jquery.easypiechart.min.js"></script>
    <!-- DataTables -->
    <script src="js/plugins/datatables/jquery.dataTables.js"></script>
    <script src="js/plugins/datatables/datatables-bs3.js"></script>

    <!-- THEME SCRIPTS -->
    <script src="js/flex.js"></script>
    <script src="js/demo/dashboard-demo.js"></script>
    <?php
	
	{ 
	?>
    <script src="js/plugins/bootstrap-tokenfield/typeahead.min.js"></script>
    <script src="js/plugins/bootstrap-maxlength/bootstrap-maxlength.js"></script>
    <script src="js/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="js/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <?php 
	}?>
</body>


<!-- Mirrored from themes.startbootstrap.com/flex-admin-v1.2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Aug 2016 09:05:52 GMT -->
</html>
