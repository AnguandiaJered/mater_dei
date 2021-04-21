<?php
require('phpscript/connection.php');
$db=db_connection();//connection variable
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inscription Eleve</title>
<link href="css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="css/8nov17.css" rel="stylesheet">
<!-- PAGE LEVEL PLUGIN STYLES -->
  <!--   <link href="css/plugins/messenger/messenger.css" rel="stylesheet">
    <link href="css/plugins/messenger/messenger-theme-flat.css" rel="stylesheet">
    <link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="css/plugins/morris/morris.css" rel="stylesheet">
    <link href="css/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="css/plugins/datatables/datatables.css" rel="stylesheet">

 -->
</head>

<body class="_8nov17_body">
<table  width="100%">
<tr class="_8nov17_tr">
<th class="_8nov17_ins_left" align="left">Section</th>
<th class="_8nov17_ins_left" align="left">Option</th>
<th class="_8nov17_ins_left" align="left">Classe</th>
<th class="_8nov17_ins_leftbuton" align="left">Action</th>
</tr>
<tr class="_8nov17_ins_tr">
<td class="_8nov17_ins_left"><?php echo mydropwodwn($db,'tbl__11section','',0,'section','form-control','onchange="return show_option(this);"','section_id','Selectionner Section','section_id');?></td>
<td class="_8nov17_ins_left"><div id="option_id"></div></td>
<td class="_8nov17_ins_left"><div id="classe_id"></div></td>
<td class="_8nov17_ins_leftbuton"><div id="action_id"></div></td>
</tr>
</table>
<br/>
<div id="rpt"></div>
</body>
</html>
<script src="ajax/jquery-1.9.0.min.js"></script> 
<script>
function show_option(sel) {
	var section_id = sel.options[sel.selectedIndex].value;  
	if (section_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/option2.php",
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
function show_classe(sel) {
	var option_id = sel.options[sel.selectedIndex].value;  
	if (option_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/classe.php",
			data: "option_id="+option_id+"",
			cache: false,
			beforeSend: function () { 
				$('#classe_id').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#classe_id").html( html );
			}
		});
	} else {
		$("#classe_id").html( "" );
	}
}
function show_enrollment_btn(sel) {
	var classe_id = sel.options[sel.selectedIndex].value;  
	var section_id= document.getElementById('section_id').value;
	var option_id= document.getElementById('option_ids').value;
	var my_id='<?php echo $_GET['ref_id'];?>';
	var action='<?php echo $_GET['action'];?>';
	if (classe_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/ActionBtn.php",
			data: "classe_id="+classe_id+"&section_id="+section_id+"&option_id="+option_id+"&id="+my_id+"&action="+action+"",
			cache: false,
			beforeSend: function () { 
				$('#action_id').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#action_id").html( html );
			}
		});
	} else {
		$("#action_id").html( "" );
	}
}
function student_list(section,myoption,myclass,design)
{
	 $.ajax({
			type: "POST",
			url: "ajax/student_list.php",
			data: "section="+section+"&option="+myoption+"&classe="+myclass+"&design="+design+"",
			cache: false,
			beforeSend: function () { 
				$('#rpt').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#rpt").html( html );
			}
		});
}

</script>
<!-- DataTables -->
     <!-- /#logout -->
    <!-- Logout Notification jQuery -->
    <!-- <script src="js/plugins/popupoverlay/logout.js"></script> -->
    <!-- HISRC Retina Images -->
   
    <!-- Morris Charts -->
   <!--  <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script> -->
    <!-- Flot Charts -->
   
   <!--  <script src="js/plugins/easypiechart/jquery.easypiechart.min.js"></script> -->
    <!-- DataTables -->
    
    <link href="css/plugins/datatables/datatables.css" rel="stylesheet">
<script src="ajax/jquery-1.9.0.min.js"></script>

    <script src="js/plugins/datatables/jquery.dataTables.js"></script>
    <script src="js/plugins/datatables/datatables-bs3.js"></script>

     <script type="text/javascript">
           //DataTables Initialization for Map Table Example

        </script>

    <!-- THEME SCRIPTS -->
   <!--  <script src="js/flex.js"></script> -->
    <!-- <script src="js/demo/dashboard-demo.js"></script> -->
