<?php 
@session_start();
$errmsg_arr = array();	
$errflag = false;
include('connection.php');
include('classe_lib.php');
$db=db_connection();
$tbl= new login_form();
$affect_db=new db_affecting();

switch(AC)
{
	case'default':
	//class 29 starts
	if(CL==29):
if(isset($_POST['caisse__ou__banque_id']))
{
$categorieid=$_POST['categorie_id'];
$accountid=$_POST['caisse__ou__banque_id'];
$incoming=(sum_rowsone($db,'tbl__33entree','montant','where categorie_id="'.$categorieid.'" and caisse__ou__banque_id="'.$accountid.'"')+sum_rowsone($db,'tbl__27payer__les__frais','montant','where treasure_bank="'.$categorieid.'" and  treasure_bank_id ="'.$accountid.'"'));
$outcoming=sum_rowsone($db,'tbl__29sortie','montant','where categorie_id="'.$categorieid.'" and caisse__ou__banque_id="'.$accountid.'"');
$available_solde=($incoming-$outcoming);
$montant=$_POST['montant'];
if($montant  > $available_solde)
{
	//redirect back
	$url='../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu='.FK.''.$extra_link.'';
		$msg='Le solde disponible ('.$available_solde.') est inferieur au montant('.$montant.') exigé';
		$css='warning';
	$arrayerr[]='<div class="alert alert-'.$css.'" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$msg.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>';
									$array_flag=true;
	if($array_flag)
	{
		$_SESSION['ERRMSG_ARR']=$arrayerr;
		session_write_close();
		//if(CL==21){$url='../dashboard.php?class=2&action=default&ref_id=default&ref_menu='.FK.$extra_link.'';}else{$url=$url;}
		header('location:'.$url.'');
	}
	
  exit();
  }
}
else
{
	
	//redirect back
	$url='../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu='.FK.''.$extra_link.'';
		$msg='Veuillez selectionner la banque ou la caisse';
		$css='warning';
	$arrayerr[]='<div class="alert alert-'.$css.'" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$msg.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>';
									$array_flag=true;
	if($array_flag)
	{
		$_SESSION['ERRMSG_ARR']=$arrayerr;
		session_write_close();
		//if(CL==21){$url='../dashboard.php?class=2&action=default&ref_id=default&ref_menu='.FK.$extra_link.'';}else{$url=$url;}
		header('location:'.$url.'');
	}
	
exit();
}
	endif;
	//class 29 ends
	if(CL==2)
	{
	$db=$username_q=mysql_query("select * from  tbl__02utilisateurs where compte__d666utilisateur='".$_POST['compte__d666utilisateur']."' and mot__de__passe='".$_POST['mot__de__passe']."'") or die("Query Failed".mysql_error());
	$checker=mysql_num_rows($username_q);
	if($checker==1)
	{
		$url='../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu='.FK.''.$extra_link.'';
		$msg='Eviter la duplication de données! le system ne peut jamais avoir deux comptes identique changer soit le mot de pass ou le compte d\'utilisateur.';
		$css='warning';
	$arrayerr[]='<div class="alert alert-'.$css.'" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$msg.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
	
	$array_flag=true;
	if($array_flag)
	{
		$_SESSION['ERRMSG_ARR']=$arrayerr;
		session_write_close();
		header('location:'.$url.'');
	}	
	exit();
	}
	
	}
	$writing=$affect_db->sqlactions($tbl->table_name(CL,$db),AC,'',$db);
	
	
	if($writing==1)
	{    if(isset($_GET['read_col']))
	    {
			$extra_link='&read_col='.$_GET['read_col'].'';
     	}else
		{
		    $extra_link='';
		}
		//data saved successfully
		$url='../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu='.FK.''.$extra_link.'';
		$msg='Donnée enregistrées avec succès!';
		$css='success';
	}
	break;
	case'edit':
	//class 29 starts
	if(CL==29):
if(isset($_POST['caisse__ou__banque_id']))
{
$categorieid=$_POST['categorie_id'];
$accountid=$_POST['caisse__ou__banque_id'];
$incoming=(sum_rowsone($db,'tbl__33entree','montant','where categorie_id="'.$categorieid.'" and caisse__ou__banque_id="'.$accountid.'"')+sum_rowsone($db,'tbl__27payer__les__frais','montant','where treasure_bank="'.$categorieid.'" and  treasure_bank_id ="'.$accountid.'"'));
$sortie=sum_rowsone($db,'tbl__29sortie','montant','where categorie_id="'.$categorieid.'" and caisse__ou__banque_id="'.$accountid.'"');
$sortie_courante=foreign_value('where sortie_id="'.ID.'"','tbl__29sortie','montant',$db);
$outcoming=($sortie-$sortie_courante);
$available_solde=($incoming-$outcoming);
$montant=$_POST['montant'];
if($montant  > $available_solde)
{
	//redirect back
	$url='../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu='.FK.''.$extra_link.'';
		$msg='Le solde disponible ('.$available_solde.') est inferieur au montant('.$montant.') exigé';
		$css='warning';
	$arrayerr[]='<div class="alert alert-'.$css.'" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$msg.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>';
									$array_flag=true;
	if($array_flag)
	{
		$_SESSION['ERRMSG_ARR']=$arrayerr;
		session_write_close();
		//if(CL==21){$url='../dashboard.php?class=2&action=default&ref_id=default&ref_menu='.FK.$extra_link.'';}else{$url=$url;}
		header('location:'.$url.'');
	}

exit();
}
}else
{
	
	//redirect back
	$url='../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu='.FK.''.$extra_link.'';
		$msg='Veuillez selectionner la banque ou la caisse';
		$css='warning';
	$arrayerr[]='<div class="alert alert-'.$css.'" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$msg.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>';
									$array_flag=true;
	if($array_flag)
	{
		$_SESSION['ERRMSG_ARR']=$arrayerr;
		session_write_close();
		//if(CL==21){$url='../dashboard.php?class=2&action=default&ref_id=default&ref_menu='.FK.$extra_link.'';}else{$url=$url;}
		header('location:'.$url.'');
	}
	
exit();
}
	endif;
	
	//class 29 ends
	if(CL==2)
	{
	$db=$username_q=mysql_query("select * from  tbl__02utilisateurs where compte__d666utilisateur='".$_POST['compte__d666utilisateur']."' and mot__de__passe='".$_POST['mot__de__passe']."'") or die("Query Failed".mysql_error());
	$checker=mysql_num_rows($username_q);
	$read=mysql_fetch_array($username_q);
	$user_id=$read[0];
	if($checker==1 && ID!=$user_id)
	{
		$url='../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu='.FK.''.$extra_link.'';
		$msg='Eviter la duplication de données! le system ne peut jamais avoir deux comptes identique changer soit le mot de pass ou le compte d\'utilisateur.';
		$css='warning';
	$arrayerr[]='<div class="alert alert-'.$css.'" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$msg.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
	
	$array_flag=true;
	if($array_flag)
	{
		$_SESSION['ERRMSG_ARR']=$arrayerr;
		session_write_close();
		header('location:'.$url.'');
	}	
	exit();
	}
	
	}
	$writing=$affect_db->sqlactions($tbl->table_name(CL,$db),AC,'',$db);
	if($writing==1)
	{
		if(isset($_GET['read_col']))
	    {
			$extra_link='&read_col='.$_GET['read_col'].'';
     	}else
		{
		    $extra_link='';
		}
		//data saved successfully
		$url='../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu='.FK.$extra_link.'';
		$msg='Données editées avec succès!';
		$css='success';
	}
	break;
	case'delete':
	$writing=$affect_db->sqlactions($tbl->table_name(CL,$db),AC,'',$db);
	if($writing==1)
	{
		if(isset($_GET['read_col']))
	    {
			$extra_link='&read_col='.$_GET['read_col'].'';
     	}else
		{
		    $extra_link='';
		}
		//data saved successfully
		$url='../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu='.FK.$extra_link.'';
		$msg='Données effacées avec succès!';
		$css='success';
	}else if($writing==0)
	{
		$url='../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu=default';
		$msg='Commande echouée car la donnée a une cle etrangère dans une autre table';
		$css='danger';
	}
	break;
	default:
	{
		print'Error';
	}
}
$arrayerr[]='<div class="alert alert-'.$css.'" style="margin-left:15px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$msg.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
	
	$array_flag=true;
	if($array_flag)
	{
		$_SESSION['ERRMSG_ARR']=$arrayerr;
		session_write_close();
		if(CL==21){$url='../dashboard.php?class=2&action=default&ref_id=default&ref_menu='.FK.$extra_link.'';}else{$url=$url;}
		header('location:'.$url.'');
	}


?>