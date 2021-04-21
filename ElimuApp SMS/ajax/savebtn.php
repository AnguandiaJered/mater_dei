<?php
require('../phpscript/connection.php');
$db=db_connection();//connection variable
$case=$_REQUEST['case'];
$email=$_REQUEST['email'];
$pwd=$_REQUEST['pwd'];
$cpwd=$_REQUEST['cpwd'];
$pwdstr=strlen($pwd);
switch($case)
{
	case 1:
	case 4:
	if($email=='')
	{
		echo'<font color="#FDA39D"> Ajouter E-mail Adress</font>';
	}
	else
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{ 
  		echo'<font color="#FDA39D"> Format Invalid Email</font>';
		} 
		else
		{
			if(foreign_value('where compte__d666utilisateur="'.$email.'"','tbl__21extra__utilisateur',2,$db)!='')
			{
				echo'<font color="#FDA39D"> Ce compte d\'utilisateur existe deja !</font>';
			}
		}
	}
	break;
	case 5:
	if($pwd=='')
	{
		echo'<font color="#FDA39D"> Ajouter Mot de Passe</font>';
	}
	else
	{
		
		if($pwdstr<6)
		{
			echo'<font color="#FDA39D">La longeur du mot de passe vaut plus de 5 characteurs</font>';
		}
		else
		{
			if( !preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $pwd) ) 
			{ 
   			echo'<font color="#FDA39D">Le mot de passe doit etre melanger de nombre et lettre</font>';
				}
		}
	}
	break;
	case 6:
	if($cpwd=='')
	{
		echo'<font color="#FDA39D"> Ajouter Mot de Passe Confirme</font>';
	}
	else
	{
		if($pwdstr>6)
		{
			if($pwd!=$cpwd)
			{
				echo'<font color="#FDA39D"> Passwords dont match</font>';
			}
		}
	}
	break;
	case 0:
	/*if($organization!=''){$one=1;}else{$one=0;}
	if($country!=''){$two=1;}else{$two=0;}
	if($city!=''){$three=1;}else{$three=0;}*/
	if($email=='')
	{
		$four=0;
	}
	else
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{ 
  		$four=0;
		} 
		else
		{
			if(foreign_value('where compte__d666utilisateur="'.$email.'"','tbl__21extra__utilisateur',2,$db)!=''&& $_REQUEST['action']!='edit')
			{
				$four=0;
			}else
			{
				$four=1;
			}
		}
	}
	if($pwd=='')
	{
		$five=0;
	}
	else
	{
		
		if($pwdstr<6)
		{
			$five=0;
		}
		else
		{
			if( !preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $pwd) ) 
			{ 
   			$five=0;
			}
			else
			{
				$five=1;
			}
		}
	}
	if($cpwd=='')
	{
		$six=0;
	}
	else
	{
		if($pwdstr>6)
		{
			if($pwd!=$cpwd)
			{
				$six=0;
			}
			else
			{
				$six=1;
			}
		}
	}
	if($four==1&&$five==1&&$six==1)
	{
		if($_REQUEST['action']=='default')
		{
			echo'<button type="submit">Sauvegarder</button>';
		}else
		{
			echo'<button type="submit">Editer</button>';
		}
	
	}
	break;
}
?>
