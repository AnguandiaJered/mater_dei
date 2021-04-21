<?php
session_start();
include('connection.php');
$db=db_connection();
$errmsg_arr = array();	
$errflag = false;
if(CL=='change_pwd')
{
$current_pwd=$_POST['current_pwd'];
$new_pwd=$_POST['new_pwd'];
$confirm_pwd=$_POST['confirm_pwd'];
$real_pwd=foreign_value('where user_id='.$_SESSION['USER_ID'].'','tbl__02users',3,$db);
if($current_pwd==$real_pwd)
{
	if($new_pwd==$confirm_pwd)
	{
		$update=$db=mysql_query("update  tbl__02users set password='$new_pwd' where user_id='".$_SESSION['USER_ID']."'") or die("Query Failed".mysql_error());
		//change password
		$errmsg_arr[] = '<div class="alert alert-success">            
                                    <strong>Sys Message!</strong> Mot de passe changé avec succès!
                                    <button type="button" class="close" data-dismiss="alert">×</button></div>';
		$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../index.php');
		}
	}else
	{
		$errmsg_arr[] = '<div class="alert alert-warning">            
                                    <strong>Sys Message!</strong> les valeurs des mot de passes ne correspondent pas essayer encore.
                                    <button type="button" class="close" data-dismiss="alert">×</button></div>';
		$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu=default');
		}
		//passwords dont match
	}
}
else
{
	//wrong current password
	$errmsg_arr[] = '<div class="alert alert-warning">            
                                    <strong>Sys Message!</strong> mot de passe courant invalide essayer encore.
                                    <button type="button" class="close" data-dismiss="alert">×</button></div>';
		$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu=default');
		}
}
}else
{
$extension=$_FILES['uploaded_file']['type']; 
			//upload random name/number
            $rd2 = mt_rand(1000,9999)."_File";  
            $filename = basename($_FILES['uploaded_file']['name']);
            $ext = substr($filename, strrpos($filename, '.') + 1);
            $newname="../data_buddle/".$rd2.'_'.$filename;
			if(CL!='attach'&&CL!='weekly_report'&&CL!='map_proposal')
			{
			if($extension =='image/jpeg'| $extension =='image/png' | $extension =='image/gif')
			{  
			  switch(CL)
			  { 
			  case'set_photo': 
			  //checking starts
			 
				$ch_q=$db=mysql_query("select * from  tbl__02users where user_id='".$_SESSION['USER_ID']."' ") or die("Query 	Failed".mysql_error());
				$ch_u=mysql_num_rows($ch_q);
					//update starts
					$src='<img src="#_srcdata_buddle/'.str_replace('../data_buddle/','',$newname).'" width="#_width" height="#_height">';
					$q=$db=mysql_query("update tbl__02users set  photo='".$src."' where user_id='".$_SESSION['USER_ID']."'") or die('Query Failed1'.mysql_error());
				
       //Attempt to move the uploaded file to it's new place
        move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname);
		$errmsg_arr[] = '<div class="alert alert-success">            
                                    <strong>Sys Message!</strong> Photo téléchargée avec succès!
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
		$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../dashboard.php?class=default&action=default&ref_id=default&ref_menu=default');
		}

			break;
			case'site_logo': 
			  //checking starts
			 
				$ch_q=$db=mysql_query("select * from  tbl__23log__site where site_id='".FK."' ") or die("Query 	Failed".mysql_error());
				$ch_u=mysql_num_rows($ch_q);
				if($ch_u<1)
				{
					//save starts
					$q=$db=mysql_query("insert into tbl__23log__site set site_id='".FK."', logo='$newname'") or die('Query Failed0'.mysql_error());
				}
				else
				{
					//update starts
					$q=$db=mysql_query("update tbl__23log__site set site_id='".FK."', logo='$newname' where site_id='".FK."'") or die('Query Failed1'.mysql_error());
				}
       //Attempt to move the uploaded file to it's new place
        move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname);
		$errmsg_arr[] = '<div class="alert alert-success">            
                                    <strong>Sys Message!</strong> Logo Site Téléchargée avec succès!
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
		$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../dashboard.php?class=default&action=default&ref_id=default&ref_menu=default');
		}
		case'negoce_photo': 
			  //checking starts
			 
				$ch_q=$db=mysql_query("select * from  tbl__57negoce__photo where site_id='".FK."' ") or die("Query 	Failed".mysql_error());
				$ch_u=mysql_num_rows($ch_q);
				if($ch_u<1)
				{
					//save starts
					$q=$db=mysql_query("insert into tbl__57negoce__photo set site_id='".FK."', photo='$newname'") or die('Query Failed0'.mysql_error());
				}
				else
				{
					//update starts
					$q=$db=mysql_query("update tbl__57negoce__photo set site_id='".FK."', photo='$newname' where site_id='".FK."'") or die('Query Failed1'.mysql_error());
				}
       //Attempt to move the uploaded file to it's new place
        move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname);
		$errmsg_arr[] = '<div class="alert alert-success">            
                                    <strong>Sys Message!</strong> Photo Negoce Téléchargée avec succès!
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
		$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../dashboard.php?class=default&action=default&ref_id=default&ref_menu=default');
		}

			break;
			case'logo':
			if($_SESSION['DESIGNATION']=='admin')
			  { 
			  //checking starts
				$ch_q=$db=mysql_query("select * from  tbl__44logo ") or die("Query 	Failed".mysql_error());
				$ch_u=mysql_num_rows($ch_q);
				if($ch_u<1)
				{
					//save starts
					$q=$db=mysql_query("insert into tbl__44logo set  logo='$newname'") or die('Query Failed0'.mysql_error());
					
				}
				else
				{
					//update starts
					$q=$db=mysql_query("update tbl__44logo set  logo='$newname'") or die('Query Failed1'.mysql_error());
				}
       //Attempt to move the uploaded file to it's new place
        move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname);
		$errmsg_arr[] = '<div class="alert alert-success">            
                                    <strong>Sys Message!</strong> Logo Téléchargée avec succès!
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
		$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../dashboard.php?class=default&action=default&ref_id=default&ref_menu=default');
		}
			break;
			
			
			  }else
			  {
				  //hacker
				  echo'burn in hell fucked hacker';
			  }
			  case'logo_partner':
			if($_SESSION['DESIGNATION']=='admin')
			  { 
			  //checking starts
				$ch_q=$db=mysql_query("select * from   tbl__45logo__partner ") or die("Query 	Failed".mysql_error());
				$ch_u=mysql_num_rows($ch_q);
				if($ch_u<1)
				{
					//save starts
					$q=$db=mysql_query("insert into  tbl__45logo__partner set  logo='$newname'") or die('Query Failed0'.mysql_error());
					
				}
				else
				{
					//update starts
					$q=$db=mysql_query("update  tbl__45logo__partner set  logo='$newname'") or die('Query Failed1'.mysql_error());
				}
       //Attempt to move the uploaded file to it's new place
        move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname);
		$errmsg_arr[] = '<div class="alert alert-success">            
                                    <strong>Sys Message!</strong> Logo Partenaire Téléchargée avec succès!
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
		$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../dashboard.php?class=default&action=default&ref_id=default&ref_menu=default');
		}
			break;
			
			
			  }else
			  {
				  //hacker
				  echo'burn in hell fucked hacker';
			  }
			  
			  
			  default:
			  {
				  exit();
			  }
			
			  }
			  
			 }
			}//end condition class
			else
			 {
				switch(CL)
				{
					case'weekly_report':
					$q=$db=mysql_query("insert into  tbl__47rapport__hebdomadaire set  rapport__url='$newname', titre='".$_POST['title']."', date='".$_POST['date']."'") or die('Query Failed1'.mysql_error());
				
       //Attempt to move the uploaded file to it's new place
        move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname);
		$errmsg_arr[] = '<div class="alert alert-success">            
                                    <strong>Sys Message!</strong> Rapport Hebdomadaire Téléchargé avec succès!
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
		$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../dashboard.php?class=default&action=default&ref_id=default&ref_menu=default');
		}
					break;
					case'map_proposal':
					$q=$db=mysql_query("insert into  tbl__48__proposer__carthographie set  url='$newname', titre='".$_POST['title']."', date='".$_POST['date']."'") or die('Query Failed1'.mysql_error());
				
       //Attempt to move the uploaded file to it's new place
        move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname);
		$errmsg_arr[] = '<div class="alert alert-success">            
                                    <strong>Sys Message!</strong>Carthographie Téléchargé avec succès!
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
		$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../dashboard.php?class=default&action=default&ref_id=default&ref_menu=default');
		}
					break;
					case'attach':
					$q=$db=mysql_query("insert into  tbl__51attach set  attache='$newname', message_id='".$_GET['ref_menu']."'") or die('Query Failed1'.mysql_error());
				
       //Attempt to move the uploaded file to it's new place
        move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname);
		$errmsg_arr[] = '<div class="alert alert-success">            
                                    <strong>Sys Message!</strong>Attache Téléchargé avec succès!
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
		$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../dashboard.php?class=50&action=default&ref_id=default&ref_menu=default');
		}
					
					break;
					default:
					{
						$errmsg_arr[] = '<div class="alert alert-warning">            
                                    <strong>Sys Message!</strong> Photo Format Invalide Télécharger (Jpg,Png,et Gif)
                                    <button type="button" class="close" data-dismiss="alert">×</button></div>';
		$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu=default');
		}
					}
				}
				 
			 }
}
?>