<?php
$_project_id=$_POST['projet_id'];
header('location:../dashboard.php?class='.$_GET['class'].'&action=default&view=default&ref_id=default&ref_menu=default&project='.$_project_id.'');
?>