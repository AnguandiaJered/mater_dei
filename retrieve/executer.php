<?php
//copyright Sowebgra, written by Miracle Tshisola//
//INCLUDE STARTS
@session_start();
include('../phpscript/connection.php');
include('../phpscript/classe_lib.php');
$db=db_connection(); 
$errmsg_arr = array();	
$errflag = false;
//COMMON VARIABE STARTS

//COMMON VARIABLE ENDS
//INCLUDE ENDS
switch(CL)
{
case 17:
if(AC=='edit')
{
	$redir=FK;
}
else
{
	$redir=ID;
}
$url='../dashboard.php?class=project_activities&action=default&view=default&ref_id=default&ref_menu=default&project='.$_GET['project'].'';
$activity_id=$_POST['frm_check_id'];
$table_name='tbl_chronogramme';
$primary_key_field='chrono_id';
//variable declaration starts
$a_jour=$_POST['jour'];
$a_mois=$_POST['mois'];
$a_annee=$_POST['annee'];
$b_jour=$_POST['bjour'];
$b_mois=$_POST['bmois'];
$b_annee=$_POST['bannee'];
//variable declaration ends
for($ch=0;$ch< count($_POST['frm_check_id']);$ch++)
{
$debut=$a_annee[$ch].'-'.$a_mois[$ch].'-'.$a_jour[$ch];
$fin=$b_annee[$ch].'-'.$b_mois[$ch].'-'.$b_jour[$ch];
	//check if activity id exists starts
	#$activity_query=mysql_query("select * from tbl__33chronogramme where activite_id='$activity_id[$ch]'") or die("Query Failed".$error());
	#$check_activity=mysql_num_rows($activity_query);
	
		
		#alter here record
		#$alter=mysql_query("update tbl__33chronogramme set du_1='$du_1[$ch]',au_1='$au_1[$ch]',du_2='$du_2[$ch]',au_2='$au_2[$ch]',du_3='$du_3[$ch]',au_3='$au_3[$ch]',du_4='$du_4[$ch]',au_4='$au_4[$ch]',du_5='$du_5[$ch]',au_5='$au_5[$ch]',du_6='$du_6[$ch]',au_6='$au_6[$ch]',du_7='$du_7[$ch]',au_7='$au_7[$ch]',du_8='$du_8[$ch]',au_8='$au_8[$ch]',du_9='$du_9[$ch]',au_9='$au_9[$ch]',du_10='$du_10[$ch]',au_10='$au_10[$ch]',du_11='$du_11[$ch]',au_11='$au_11[$ch]',du_12='$du_12[$ch]',au_12='$au_12[$ch]' where act_id='$activity_id[$ch]'") or die("Query Failed".$error());
		if($_GET['action']=='default')
		{
	/*
	if($b_annee[$ch]>$a_annee[$ch] and $b_mois[$ch]>$a_mois[$ch] )
	{
		//future works
	}*/

	 if($b_annee[$ch]==$a_annee[$ch] and $b_mois[$ch]>$a_mois[$ch])
	{
		$rand_id=rand();
		$insert=mysql_query("insert into tbl__33chronogramme  set debut='$debut',fin='$fin',a_jour='$a_jour[$ch]',a_mois='$a_mois[$ch]',a_annee='$a_annee[$ch]' ,b_jour='$b_jour[$ch]',b_mois='$b_mois[$ch]',b_annee='$b_annee[$ch]',activite_id='$activity_id[$ch]',projet_id='".$_GET['project']."',savior_id='".$rand_id."'") or die("Query Failed".$error());
	chrono_msave($db,'default',$a_mois[$ch],$b_mois[$ch],$rand_id,$activity_id[$ch],$_GET['project'],$a_annee[$ch],$b_annee[$ch]);
	}
	else
	{
	$insert=mysql_query("insert into tbl__33chronogramme  set debut='$debut',fin='$fin',a_jour='$a_jour[$ch]',a_mois='$a_mois[$ch]',a_annee='$a_annee[$ch]' ,b_jour='$b_jour[$ch]',b_mois='$b_mois[$ch]',b_annee='$b_annee[$ch]',activite_id='$activity_id[$ch]',projet_id='".$_GET['project']."'") or die("Query Failed".$error());
		}
	}else
		{
			 if($b_annee[$ch]==$a_annee[$ch] and $b_mois[$ch]>$a_mois[$ch])
	{
			$rand_id=rand();
			$alter=mysql_query("update tbl__33chronogramme set debut='$debut',fin='$fin',a_jour='$a_jour[$ch]',a_mois='$a_mois[$ch]',a_annee='$a_annee[$ch]' ,b_jour='$b_jour[$ch]',b_mois='$b_mois[$ch]',b_annee='$b_annee[$ch]',savior_id='".$rand_id."' where chrono_id='".$activity_id[$ch]."'") or die("Query Failed".$error());
			chrono_msave($db,'default',$a_mois[$ch],$b_mois[$ch],$rand_id,$activity_id[$ch],$_GET['project'],$a_annee[$ch],$b_annee[$ch]);
	}else
	{
			$alter=mysql_query("update tbl__33chronogramme set debut='$debut',fin='$fin',a_jour='$a_jour[$ch]',a_mois='$a_mois[$ch]',a_annee='$a_annee[$ch]' ,b_jour='$b_jour[$ch]',b_mois='$b_mois[$ch]',b_annee='$b_annee[$ch]' where chrono_id='".$activity_id[$ch]."'") or die("Query Failed".$error());
	}
	
			if($_POST['savior_id']>0)
			{
			$delete=mysql_query("delete from tbl__33chronogramme where chrono_id<>'".$activity_id[$ch]."' and savior_id='".$_POST['savior_id']."'") or die("Query Failed".mysql_error());	
			}
		}
		#insert new record
	//check if activity id exists ends
}
    $alert='Configuration faite avec succes';
	$errmsg_arr[] = '<div class="alert alert-success" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$alert.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
	$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:'.$url.'');
		exit();
		}
$fk='result_id';
exit();
break;
case 'baseline':
if(AC=='edit')
{
	$redir=FK;
}
else
{
	$redir=ID;
}
$url='../dashboard.php?class=baseline_pdf&action=default&ref_id='.$redir.'&view=default&ref_menu=default&project='.$_GET['project'].'';
$activity_id=$_POST['frm_check_id'];
$table_name='tbl_chronogramme';
$primary_key_field='chrono_id';
//variable declaration ends
for($ch=0;$ch< count($_POST['frm_check_id']);$ch++)
{
	//check if activity id exists starts
	$activity_query=mysql_query("select * from tbl__37baseline where activite_id='$activity_id[$ch]'") or die("Query Failed".$error());
	$check_activity=mysql_num_rows($activity_query);
	if($check_activity==1)
	{
		
		#alter here record
		$alter=mysql_query("update tbl__37baseline set baseline='".mysql_real_escape_string(strip_tags($_POST['baseline'][$ch]))."' where activite_id='$activity_id[$ch]'") or die("Query Failed".$error());
	}
	else
	{
$insert=mysql_query("insert into tbl__37baseline set baseline='".mysql_real_escape_string(strip_tags($_POST['baseline'][$ch]))."',activite_id='$activity_id[$ch]',projet_id='".$_GET['project']."'") or die("Query Failed".$error());
		#insert new record
	}
	//check if activity id exists ends
}
    $alert='Baseline faite avec succes';
	$errmsg_arr[] = '<div class="alert alert-success" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$alert.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
	$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:'.$url.'');
		exit();
		}
exit();
break;
case 39:
if(AC=='edit')
{
	$redir=FK;
}
else
{
	$redir=ID;
}
$url='../dashboard.php?class=outgoing_fund&action=default&ref_id='.$redir.'&view=default&ref_menu=default&project='.$_GET['project'].'&from='.$_POST['date'].'&to='.$_POST['date'].'';
$activity_id=$_POST['frm_check_id'];
//variable declaration ends
for($ch=0;$ch< count($_POST['frm_check_id']);$ch++)
{
	//check if activity id exists starts
	$activity_query=mysql_query("select * from  tbl__39sortie__des__fonds where sortie_fond_id='$activity_id[$ch]'") or die("Query Failed".$error());
	$check_activity=mysql_num_rows($activity_query);
	/*
	if($check_activity==1)
	{
		
		#alter here record
		$alter=mysql_query("update tbl__39sortie__des__fonds set libelle='".mysql_real_escape_string(strip_tags($_POST['libelle'][$ch]))."',date='".$_POST['date']."',quantite='".$_POST['quantite'][$ch]."',prix__unitaire='".$_POST['pu'][$ch]."',frequence='".$_POST['frequence'][$ch]."' where sortie_fond_id='$activity_id[$ch]'") or die("Query Failed".$error());
	}*/
	
	
$insert=mysql_query("insert into tbl__39sortie__des__fonds set libelle_id='".$_POST['libelle_id'][$ch]."',libelle_tr='".$activity_id[$ch]."', projet_id='".$_GET['project']."',libelle='".mysql_real_escape_string(strip_tags($_POST['libelle'][$ch]))."',date='".$_POST['date']."',quantite='".$_POST['quantite'][$ch]."',prix__unitaire='".$_POST['pu'][$ch]."',frequence='".$_POST['frequence'][$ch]."'") or die("Query Failed".$error());
		#insert new record
$fname=foreign_value('where user_id="'.$_SESSION['USER_ID'].'"','  tbl__02users',6,$db);	
$lname=foreign_value('where user_id="'.$_SESSION['USER_ID'].'"','  tbl__02users',7,$db);
$project_id=foreign_value('where user_id="'.$_SESSION['USER_ID'].'"','  tbl__02users',4,$db);
$chef_de_projet_id=foreign_value('where projet_id="'.$project_id.'" and designation="chef_de_projet"',' tbl__02users',1,$db);
$notification_q=mysql_query("insert into  tbl__44notifications set from_user_id='".$_SESSION['USER_ID']."' ,	to_user_id='admin',type='finance_out',data_id='".get_last_id($db,' tbl__39sortie__des__fonds','sortie_fond_id','where projet_id="'.$project_id.'"')."',notification='Mr le Financier ".$fname." ".$lname." vient de faire une nouvelle sortie de fonds projet ".foreign_value('where projet_id="'.$project_id.'"','   tbl__10nouveau__projet',3,$db)." ',date=NOW()") or die("Query Failed".mysql_error());//admin
$notification_q=mysql_query("insert into  tbl__44notifications set from_user_id='".$_SESSION['USER_ID']."' ,	to_user_id='".$chef_de_projet_id."',type='finance_out',data_id='".get_last_id($db,' tbl__39sortie__des__fonds','sortie_fond_id','where projet_id="'.$project_id.'"')."',notification='Mr le Financier ".$fname." ".$lname." vient de faire une nouvelle sortie de fonds projet ".foreign_value('where projet_id="'.$project_id.'"','   tbl__10nouveau__projet',3,$db)." ',date=NOW()") or die("Query Failed".mysql_error());//chef de projet
	
	//check if activity id exists ends
}
    $alert='Sortie Fond faite avec succes';
	$errmsg_arr[] = '<div class="alert alert-success" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$alert.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
	$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:'.$url.'');
		exit();
		}
exit();
break;
case 'envoyer_le_rapport_activite_sans_photo': 
$all_charactor='mysql_real_escape_string';
if(AC=='default')
{
mysql_query("insert into tbl__36rapport set description_et_realisation='".$all_charactor($_POST['frm_2'])."',resultat_obtenu='".$all_charactor($_POST['frm_3'])."',Indicateur_atteint='".$all_charactor($_POST['frm_4'])."',difficulte_et_solution='".$all_charactor($_POST['frm_5'])."',recommandaction='".$all_charactor($_POST['frm_6'])."',act_id='".ID."',project_id='".$_GET['project']."',chrono_id='".$_GET['range_id']."',valeur__indicateur__atteint='".$_POST['valeur_atteint_value']."'") or die("Query Failed".$error());
$fname=foreign_value('where user_id="'.$_SESSION['USER_ID'].'"','  tbl__02users',6,$db);	
$lname=foreign_value('where user_id="'.$_SESSION['USER_ID'].'"','  tbl__02users',7,$db);
$chef_de_projet_id=foreign_value('where activite_id="'.get_last_id2($db,'tbl__36rapport','rapport_id','act_id','').'"',' tbl__23activite',8,$db);
$notification_q=mysql_query("insert into  tbl__44notifications set from_user_id='".$_SESSION['USER_ID']."' ,	to_user_id='admin',type='report',data_id='".get_last_id($db,'tbl__36rapport','rapport_id','')."',notification='Mr le superviseur ".$fname." ".$lname." vient de vous envoyer le rapport ',date=NOW()") or die("Query Failed".mysql_error());//admin
$notification_q=mysql_query("insert into  tbl__44notifications set from_user_id='".$_SESSION['USER_ID']."' ,	to_user_id='".$chef_de_projet_id."',type='report',data_id='".get_last_id($db,'tbl__36rapport','rapport_id','')."',notification='Mr le superviseur ".$fname." ".$lname." vient de vous envoyer le rapport ',date=NOW()") or die("Query Failed".mysql_error());//chef de projet

$alert='Rapport Envoyer avec succes!!';
$errmsg_arr[] = '<div class="alert alert-success" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$alert.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';	
	$errflag = true;
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../dashboard.php?class=36&action=default&view=default&ref_id=default&ref_menu=default&project='.$_GET['project'].'');
		exit();
		}	
}
else if(AC=='edit')
{
	mysql_query("update tbl__36rapport set description_et_realisation='".$all_charactor($_POST['frm_2'])."',resultat_obtenu='".$all_charactor($_POST['frm_3'])."',Indicateur_atteint='".$all_charactor($_POST['frm_4'])."',difficulte_et_solution='".$all_charactor($_POST['frm_5'])."',recommandaction='".$all_charactor($_POST['frm_6'])."' ,valeur__indicateur__atteint='".$_POST['valeur_atteint_value']."'where act_id='".ID."' and chrono_id='".$_GET['range_id']."'") or die("Query Failed".$error());

$alert='Rapport Envoyer avec succes!!';
	$errmsg_arr[] ='<div class="alert alert-success" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> '.$alert.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>';
	$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../dashboard.php?class=36&action=default&view=default&ref_id=default&ref_menu=default&project='.$_GET['project'].'');
		exit();
		}
exit();}
break;
case 'envoyer_le_rapport_activite_avec_photo' :
$url='../dashboard.php?class=36&action=default&view=default&ref_id=default&ref_menu=default&project='.$_GET['project'].'';
for($k=0; $k < count($_POST['frm_file']); $k++)
{
            $extension=$_FILES['uploaded_file']['type'][$k]; 
			//upload random name/number
            $rd2 = mt_rand(1000,9999)."_File";  
            $filename = basename(str_replace(' ','_',$_FILES['uploaded_file']['name'][$k]));
            $ext = substr($filename, strrpos($filename, '.') + 1);
            $newname="../data_buddle/".$rd2.'_'.str_replace("'","_",$filename);     
           //Attempt to move the uploaded file to it's new place
             move_uploaded_file(str_replace("'","_",$_FILES['uploaded_file']['tmp_name'][$k]),$newname);
			 mysql_query("insert into  tbl__42upload_file set file_path='$newname',act_id='".ID."',project_id='".$_GET['project']."',range_id='".$_GET['range_id']."'") or die("Query Failed".$error());			 
}
$errmsg_arr[] ='<div class="alert alert-success" style="margin-left:25px;margin-right:25px;">            
                                    <strong>Sys Message!</strong> Fichiers(Rapport) Telechargés avec succès
                                    <button type="button" class="close" data-dismiss="alert">×</button>';
		$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:'.$url.'');
		exit();
		}
 exit();
break;
case'voir_les_rapport_envoyes':
$all_charactor='mysql_real_escape_string';
$activite_id=foreign_value('where rapport_id="'.$_GET['rpt_id'].'"',' tbl__36rapport',7,$db);
$intervenant_id=foreign_value('where activite_id="'.$activite_id.'"',' tbl__23activite',6,$db);
$chef_du_projet_id=foreign_value('where activite_id="'.$activite_id.'"',' tbl__23activite',8,$db);
if($_SESSION['DESIGNATION']=='admin')
{
//notificatiion goes here
$notification_q=mysql_query("insert into  tbl__44notifications set from_user_id='".$_SESSION['USER_ID']."' ,	to_user_id='".$intervenant_id."',date='".date('Y-m-d')."',type='report',data_id='".$_GET['rpt_id']."',notification='Mr l\'admin vient de ".$all_charactor($_POST['6'])." le rapport '") or die("Query Failed".mysql_error());//goes to the superviseur
$notification_q=mysql_query("insert into  tbl__44notifications set from_user_id='".$_SESSION['USER_ID']."' ,	to_user_id='".$chef_du_projet_id."',date='".date('Y-m-d')."',type='report',data_id='".$_GET['rpt_id']."',notification='Mr l\'admin vient de ".$all_charactor($_POST['6'])." le rapport '") or die("Query Failed".mysql_error());//goes to chef de projet
$subquery=",validation_admin='".$all_charactor($_POST['6'])."',commentaire_admin='".$all_charactor($_POST['commentaire'])."'";
}else
{
$notification_q=mysql_query("insert into  tbl__44notifications set from_user_id='".$_SESSION['USER_ID']."' ,	to_user_id='".$intervenant_id."',date='".date('Y-m-d')."',type='report',data_id='".$_GET['rpt_id']."',notification='Mr le Chef de projet vient de ".$all_charactor($_POST['6'])." le rapport '") or die("Query Failed".mysql_error());//goes to the superviseur
$notification_q=mysql_query("insert into  tbl__44notifications set from_user_id='".$_SESSION['USER_ID']."' ,	to_user_id='admin',date='".date('Y-m-d')."',type='report',data_id='".$_GET['rpt_id']."',notification='Mr le Chef de projet vient de ".$all_charactor($_POST['6'])." le rapport '") or die("Query Failed".mysql_error());//goes to chef de projet	
//notification goes here
$subquery=",validation_chef_de_projet='".$all_charactor($_POST['6'])."',commentaire_chef_de_projet='".$all_charactor($_POST['commentaire'])."'";
}
$q=mysql_query("update  tbl__36rapport set description_et_realisation='".$all_charactor($_POST['1'])."',resultat_obtenu='".$all_charactor($_POST['2'])."',Indicateur_atteint='".$all_charactor($_POST['3'])."',difficulte_et_solution='".$all_charactor($_POST['4'])."',recommandaction='".$all_charactor($_POST['5'])."'".$subquery." where rapport_id	='".$_GET['rpt_id']."'") or die("Query Failed".mysql_error());

$url='rapport_coordonateur.php?class=voir_les_rapport_envoyes&action=default&view=shown&ref_id='.$_GET['ref_id'].'&ref_menu='.$_GET['ref_menu'].'&rpt_id='.$_GET['rpt_id'].'';
	$errmsg_arr[] = '<div class="alert alert-success">'.$green_msg_success_starts."Rapport  ".$all_charactor($_POST['6'])." avec succès</div>";
		$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:'.$url.'');
		exit();
		}
break;
default:
{
header('location:../dashboard.php?class=default&action=default&view=default&ref_id=default&ref_menu=default');
}
}
//SWITCH  ENDS
?>