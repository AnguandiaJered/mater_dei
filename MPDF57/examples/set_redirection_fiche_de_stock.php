<?php
if(isset($_POST['produit_id']) && !isset($_GET['type']))
{
header('location:fiche_de_stock_depot.php?product='.$_POST['produit_id'].'&from='.$_POST['from'].'&to='.$_POST['to'].'');
}
else if(isset($_POST['produit_id']) && isset($_GET['type']) && $_GET['type']==2)
{
header('location:entree_branche.php?product='.$_POST['produit_id'].'&from='.$_POST['from'].'&to='.$_POST['to'].'');
}
else if(isset($_POST['produit_id']) && isset($_GET['type']) && $_GET['type']==3)
{
header('location:fiche_de_stock_branche.php?product='.$_POST['produit_id'].'&from='.$_POST['from'].'&to='.$_POST['to'].'');
}
?>