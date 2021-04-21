<?php
@session_start();
$errmsg_arr = array();	
$errflag = false;
include('connection.php');
$db=db_connection();
set_time_limit(0);
if(isset($_GET['action'])&&$_GET['action']=='external')
{
	
	        if(!is_dir('../data_buddle'))
						  {
							  mkdir('../back_up_tables');
						  }
			$dir_name='../back_up_tables';
			$rd2 = mt_rand(1000,9999)."_File";  
            $filename = basename($_FILES['file_uploaded']['name']);
            $ext = substr($filename, strrpos($filename, '.') + 1);
			//redirect back when the file is not a sql one starts
			if($ext!='sql')
			{
			$alert = "Erreur fichier, Veuillez selection un fichier sql pour continuer";
 $errmsg_arr[] = '<div class="alert alert-warning">'.$alert.'</div>';
		$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
	header('location:../dashboard.php?class=backup&action='.$_GET['action'].'&view=default&ref_id=default&ref_menu=default');;
	exit();  
		}
			}else
			{
				//check wether the file exists in backup table directory starts
				if(is_file($dir_name.'/'.$filename))
				{
					//redirect to internal execution starts
					header('location:?filename='.$filename.'');
					//redirect to internal execution ends
				}
			    //check wether the file exists in backup table directory starts
				else
				{
					//upload to backup directory starts and redirect  for internal execution
					$newname="".$dir_name."/".str_replace(' ','_',(str_replace("'",'_',$filename)));
				    move_uploaded_file($_FILES['file_uploaded']['tmp_name'],$newname);
					header('location:?filename='.$filename.'');
				//upload to backup directory starts and redirect  for internal execution
					
				}
			}
			
            
	
	
	
}else
{
$filename = '../back_up_tables/'.$_GET['filename'];
// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}

 //save back starts
 $save_back=mysql_query("insert into  tbl__46backup set back_dir='".str_replace('back_up_tables/','',$_GET['filename'])."'") or die("Query Failed".mysql_error());
  //save backup ends
  $alert = "Base des données restaurée avec succès";
 $errmsg_arr[] = '<div class="alert alert-success">'.$alert.'</div>';
		$errflag = true;	
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
	header('location:../dashboard.php?class=backup&action=default&view=default&ref_id=default&ref_menu=default');;
	exit();  
		}
}
?>