<?php 
if(isset($_GET['class']))

{
	#parci nous definissons les constantes de notre applicalication
	define('CL',$_GET['class']);// ce constante represente les tables donc apartir d'ici on se refere  a cette classe pour affecte nos tables
	define('AC',$_GET['action']); // represente l'action du formulaire en savoir save,edit and delete
	define('ID',$_GET['ref_id']);// representation de nos clés primaire
	define('FK',$_GET['ref_menu']);// representation de nos clés etrangere
	
	}
	
	$SQL='mysql_query';// mot cle pour affecter la database
	$READ='mysql_fetch_array';//pour puise les donnees les tables
	$COUNT_R='mysql_num_rows';// pour conter les nombres ligne dela table
	$CON='mysql_connect';//pour la connection au serveur
	$DB='mysql_select_db';//pour selectioner la base dedonnee
	$ALLCH='mysql_real_escape_string';//pour admettre tout les carracteres dans la base
	$VOID_HTML='strip_tags';//pour  ecrase les code html
	$BREAK_HTML='htmlentities';//pour aneantir les code html
	$SLASH='stripslashes';//pour pour ecrase le slash
	$ERR='mysql_error';// pour gere les erreurs en php.
	
	#Ici nous passons sur partie de fonction de MENU et declarationde certaines variables de la fonction menu
	#Dans cette partie nous allons appele toutes les tables  en sachant que la opremiere table occupe la pace 0(zero)
	$table_list=array('tbl_01site','tbl_02enfant','tbl_03militaire','tbl_04femme','tbl_05membres','tbl_06utilisateurs','tbl_07maison','tbl_08utilisateurs');
	$foreigner_key_list=array('membre_id','user_id');
	$class_list=array('site','kids','soldiers','women','member','user','home');
	$sys_action=array('add_record'=>'default','alter_record'=>'edit','erase_record'=>'delete');
	function table_list($class,$table_array,$cl_list)
	{
		switch($class)
					{//debut switch
				    case $cl_list[0]:
					$tbl=$table_array[0];
					break;
					case $cl_list[1]:
					$tbl=$table_array[1];
					break;
					case $cl_list[2]:
					$tbl=$table_array[2];
					break;
					case $cl_list[3]:
					$tbl=$table_array[3];
					break;
					case $cl_list[4]:
					$tbl=$table_array[4];
					break;
					case $cl_list[5]:
					$tbl=$table_array[5];
					break;
					case $cl_list[6]:
					$tbl=$table_array[6];
					break;
					default:
					
					{
						echo'Option absente';
					}
	
					}
					return $tbl;
	}
	function menu($query,$er,$read,$table_array,$cl_list)
	
	
	{
		echo' <ul class="navigation">';
		$q=$query('show tables')or die('Echec de comande'.$er());
		// ceci est pour les index.
		#parci nous regroupons  les options del'pplication selon la logique de l'aplication(MENU DE L'APPLICATION)
		$group=array('option_1'=>'Site','option_2'=>'Enfants','option_3'=>'Militaires','option_4'=>'Femmes','option_5'=>'Parametres');//est arry associative
		# la condition dit(boucle) veut dire  pour chaque groupe comme valeur.
					foreach ($group as $group_value)
					{
						//session starts for security
						if($group_value==$group['option_1'] and $_SESSION['URL']!='Administrateur')
						 {
							 continue;
						 }
						//session ends for security
					
						 echo'<li class="openable" style="text-transform:uppercase;">
                        <a href="#">'.$group_value.'</a>';
						echo'<ul>';
						foreach($table_array as $table_value)
						{
							#*********************************************************url setting starts***************************************
			if($table_value==$table_array[0])
			{
				
				$class_value=$cl_list[0];	
			}
			elseif($table_value==$table_array[1])
			{
				
				$class_value=$cl_list[1];	
			}
			
			elseif($table_value==$table_array[2])
			{
				
				$class_value=$cl_list[2];	
			}
			elseif($table_value==$table_array[3])
			{
				
				$class_value=$cl_list[3];	
			}
			elseif($table_value==$table_array[4])
			{
				
				$class_value=$cl_list[4];	
			}
			elseif($table_value==$table_array[5])
			{
				
				$class_value=$cl_list[5];	
			}
			elseif($table_value==$table_array[6])
			{
				
				$class_value=$cl_list[6];	
			}
			else
			{
				
				$class_value='default';
			}
							
							
							#********************************************************url setting ends *****************************************
						$under_score=str_replace('00',' ',$table_value);//ici on rempace 00 par l'espace
						$space=str_replace('__',' ',$under_score);
						$avaler=substr($space,+6);// alever 6 caracteres  au cote droit (tbl__)
						
						 if($group_value==$group['option_1'] and $_SESSION['URL']=='Administrateur')
						 {
							 # a ce point nous retreivons les tables dans le sens arbitraire,soit attribution de tabes 
							 if($table_value==$table_array[0])
							 {
								
								echo'<li style="text-transform:capitalize;">
                                <a href="?class='.$class_value.'&action=default&ref_id=default&ref_menu=default">'.$avaler.'</a>
                            </li>';
							 }
							 else
							 {
								 continue;
							 }
						 }
						 
						  else if($group_value==$group['option_2'] and $_SESSION['URL']=='Administrateur')
						 {
							 # a ce point nous retreivons les tables dans le sens arbitraire,soit attribution de tabes 
							 if($table_value==$table_array[1])
							 {
								
								echo'<li style="text-transform:capitalize;">
                                <a href="?class='.$class_value.'&action=default&ref_id=default&ref_menu=default">'.$avaler.'</a>
                            </li>';
							 }
							 
							 else
							 {
								 continue;
							 }
						 }
						 
						  else if($group_value==$group['option_3'] and $_SESSION['URL']=='Administrateur')
						 {
							 # a ce point nous retreivons les tables dans le sens arbitraire,soit attribution de tabes 
							 if($table_value==$table_array[2])
							 {
								
								echo'<li style="text-transform:capitalize;">
                                <a href="?class='.$class_value.'&action=default&ref_id=default&ref_menu=default">'.$avaler.'</a>
                            </li>';
							 }
							 
							 else
							 {
								 continue;
							 }
						 }
						 else if($group_value==$group['option_4'] and $_SESSION['URL']=='Administrateur')
						 {
							 # a ce point nous retreivons les tables dans le sens arbitraire,soit attribution de tabes 
							 if($table_value==$table_array[3])
							 {
								
								echo'<li style="text-transform:capitalize;">
                                <a href="?class='.$class_value.'&action=default&ref_id=default&ref_menu=default">'.$avaler.'</a>
                            </li>';
							 }
							 
							 else
							 {
								 continue;
							 }
						 }
						  else if($group_value==$group['option_5'] and $_SESSION['URL']=='Administrateur')
						 {
							 # a ce point nous retreivons les tables dans le sens arbitraire,soit attribution de tabes 
							 if($table_value==$table_array[4]||$table_value==$table_array[5]||$table_value==$table_array[6])
							 {
								
								echo'<li style="text-transform:capitalize;">
                                <a href="?class='.$class_value.'&action=default&ref_id=default&ref_menu=default">'.$avaler.'</a>
                            </li>';
							 }
							 
							 else
							 {
								 continue;
							 }
						 }
						 
						}
						echo'</ul>
                    </li> ';
					}
			
		echo' </ul>';
	} 
	
	function table_config ($class,$query,$read,$error,$allchar,$voidhtml,$slash,$count_row,$arrayerr,$array_flag,$ac,$pkey,$fk,$table_array,$table_list_function,$command)
	{  if(isset($_POST['executer_labor']))
	  {
		  #ref_id=production
		  #ref_menu=service_id
		  $status_ch_q=$query("select * from ".$table_list_function." where commande_id='".FK."'") or die("Query Failed".$error());
		  $checher_status=$count_row($status_ch_q);
		  if($checher_status==1)
		  {
			  $add_status=$query("update ".$table_list_function." set status='".$_POST['executer_labor']."' where commande_id='".FK."'") or die("Query Failed".$error());
		  }
		  else
		  {
			$add_status=$query("insert into ".$table_list_function." set commande_id='".FK."',status='".$_POST['executer_labor']."'") or die("Query Failed".$error());
		  }
     	header('location:../retrieve/?class=executer&action=retrieving_2&ref_id='.ID.'&ref_menu=default');
			exit();
		}
	
		//ordering starts
		if(isset($_POST['executer_cmd']))
		{
			$limit=count($_POST['service_id']);
			$category=$_POST['category'];
			$qte=$_POST['qte'];
			$detail_sale_price=$_POST['detail_sale_price'];
			$whole_sale_price=$_POST['whole_sale_price'];
			$numero_facture=rand();
			$service_id=$_POST['service_id'];
			$payement=$_POST['pay'];
			$bank=$_POST['bank'];
			$date=$_POST['date'];
			$date_de_livraison=$_POST['delivering_date'];
			for($j=0; $j<$limit; $j++)
			{
				//checking cash growing starts
			if($category=='detail'||$category=='proformat_detail')
			{
				#detail
				$total_amount=($qte[$j] * $detail_sale_price[$j] );
				$price=$detail_sale_price[$j];
			}
			else
			{
				#whole sale
				$total_amount=($qte[$j] * $whole_sale_price[$j]);
				$price=$whole_sale_price[$j];
			}
			//checking cash growing starts
			// query starts
			$requete=$query("insert into tbl_12commande set service_id='$service_id[$j]',montant='$total_amount',prix='$price',qte='$qte[$j]',client_id='".FK."',categorie='$category',payement='$payement',banque_id='$bank',date='$date',livraison='$date_de_livraison', 	 	numero__facture='$numero_facture'") or die("Query Failed".$error());
			// query ends
			}
header('location:../MPDF57/examples/rapport.php?class='.$class.'&action=default&ref_id='.$numero_facture.'&ref_menu=default&cmd=teller');
		}
		//ordering ends
		else
		{
		#*********************************************************url setting starts***************************************
		$tbl=$table_list_function;
		$q=$query("show columns from ".$tbl."") or die('commande echoué'.$error());
		$tbl_field="";
		$fieldvalue="";
		$comparison_query='';
		$edit_query='';
		$pk=0;
		while($col=$read($q))
		{
			$pk+=1;
			$tbl_field.=$col[0].',';
			if($pk==1)
			{
				$primary_key=$col[0];
				continue;
			}
			 if(!isset($_POST[$primary_key]) and AC!=$command['erase_record'])
			 {
				 $fieldvalue.="'".$allchar($voidhtml($slash($_POST[$col[0]])))."',";
				 $comparison_query.="$col[0] = '".$_POST[''.$col[0].'']."' and ";
				 $edit_query.="$col[0] = '".$_POST[''.$col[0].'']."',";
							
			 }
		}
		//code for table field starts
		$inverse=strrev($tbl_field);
		$void_comma=substr($inverse,+1);
		$inverse_2=strrev($void_comma);
		//code for table field starts
		//code for table field values starts
		$inv=strrev($fieldvalue);
		$void=substr($inv,+1);
		$inv_2=strrev($void);
		//code for table field values ends
		
		//code for table field values starts
		 $i=str_replace($primary_key.',','',$comparison_query);
		$in=strrev($i);
		$void_3=substr($in,+4);
		$inv_3=strrev($void_3);
		//code for table field values ends
		//edit for table field values starts
		$edit_1=strrev($edit_query);
		$edit_2=substr($edit_1,+1);
		$edit_3=strrev($edit_2);
		//edit for table field values ends
		//execution query starts
		#redirect me back starts
		if(isset($_SESSION['REDIR']) and ! isset($_POST['executer']))
		{
		    header('location:../dashboard.php?class='.$class.'&action='.AC.'&ref_id='.ID.'&ref_menu='.$_POST[$_SESSION['REDIR']].'');
			exit();
		}
		#redirect me back ends
		#execution starts
		if(AC==$command['erase_record'] ||isset($_POST['executer']))
		{
			
		   switch($ac)
				{
					case $command['add_record']:
					 $checker_q=$query("select * from ".$tbl." where ".$inv_3."") or die("Query Failed".$error());
			         $checker=$count_row($checker_q);
			         if($checker==1)
			           {
				$class_alert='alert alert-danger';
				$msg='Cette information existe deja dans la base';
			            } else
						{
				   $class_alert='alert alert-success';
				   $msg='Enregistrement à reussi';
							//incoming tbl starts
							if($tbl==$table_array[8])
							{
								$in_q=$query("select * from ".$tbl." where article_id='".FK."' and quantite__totale>0") or die("Query Failed".$error());
								$checker_in=$count_row($in_q);
								if($checker_in==1)
								{
								$row_in=$read($in_q);
								$article_in_id=$row_in[$primary_key];
								$qte_in=$row_in['quantite__totale'];
								$qte_total_in=($qte_in + $_POST['quantite']);
								$cmd=$query("insert into ".$tbl." (".$inverse_2.") values(NULL,'".FK."','".$_POST['depot_id']."','".$_POST['quantite']."','".$_POST['fournisseur']."','".$_POST['date']."','".$qte_in."','".$qte_total_in."')") or die("commande echouer".$error());
								
								$unpower_qte_q=$query("update ".$tbl."  set quantite__totale=0 where ".$primary_key."='".$article_in_id."' ") or die("Query Failed".$error());	
								
								}
								else
								{
								$cmd=$query("insert into ".$tbl." (".$inverse_2.") values(NULL,'".FK."','".$_POST['depot_id']."','".$_POST['quantite']."','".$_POST['fournisseur']."','".$_POST['date']."','".$_POST['quantite__initiale']."','".$_POST['quantite']."')") or die("commande echouer".$error());
								}
						
							}
							//incoming tbl ends
							//outgoing tbl starts
							elseif($tbl==$table_array[9])
							{
								$out_q=$query("select * from ".$tbl." where  entree_id='".FK."' and production_id='". $_POST['production_id']."' and quantite__totale>0") or die("Query Failed".$error());
								$checker_in=$count_row($out_q);
								if($checker_in==1)
								{
								$row_in=$read($out_q);
								$article_in_id=$row_in[$primary_key];
								$qte_in=$row_in['quantite__totale'];
								$qte_total_in=($qte_in + $_POST['quantite']);
								$cmd=$query("insert into ".$tbl." (".$inverse_2.") values(NULL,'".FK."','".$_POST['production_id']."','".$_POST['quantite']."','".$_POST['date']."','".$qte_in."','".$qte_total_in."')") or die("commande echouer".$error());
								
								$unpower_qte_q=$query("update ".$tbl."  set quantite__totale=0 where ".$primary_key."='".$article_in_id."' ") or die("Query Failed".$error());
								$unpower_tbl_entree_q=$query("update  tbl_09entree  set quantite__totale=(quantite__totale - ".$_POST['quantite'].") where entree_id='".FK."' ") or die("Query Failed".$error());		
								
								}
								else
								{
								$cmd=$query("insert into ".$tbl." (".$inverse_2.") values(NULL,'".FK."','".$_POST['production_id']."','".$_POST['quantite']."','".$_POST['date']."','".$_POST['quantite__initiale']."','".$_POST['quantite']."')") or die("commande echouer".$error());
								$unpower_tbl_entree_q=$query("update  tbl_09entree  set quantite__totale=(quantite__totale - ".$_POST['quantite'].") where entree_id='".FK."' ") or die("Query Failed".$error());	
								}
							
							}
							//outgoing tbl ends
							//others tbl starts
							else
							{
			       
		           $cmd=$query("insert into ".$tbl." (".$inverse_2.") values(NULL,".$inv_2.")") or die("commande echouer".$error());
							}
							//others tbl ends
						}
					break;
					case $command['alter_record']:
				   $class_alert='alert alert-success';
				   $msg='Modification à reussi';
				   //editing sortie starts
				   if($tbl==$table_array[9])
							{
								if($_POST['quantite__totale']==0)
								{
									echo'skip this';
								}
								else
								{
									$add=$query("select * from tbl_10sortie where sortie_id='".ID."'") or die("Query Failed".$error());
									$add_row=$read($add);
									$add_qte=$add_row['quantite'];
									$add_entre_id=$add_row['entree_id'];
									//step one starts
									$add_entre_cmd=$query("update tbl_09entree set quantite__totale=(quantite__totale + $add_qte) where entree_id='".$add_entre_id."'") or die ("Query Failed".$error());
									//step one ends
									//step two starts
									 $cmd=$query("update ".$tbl." set ".$edit_3." where ".$primary_key."=".ID."") or die("commande echouer".$error());
									//step two ends
									//step three starts
									$cmd=$query("update ".$tbl." set quantite__totale=(quantite__initiale + ".$_POST['quantite'].") where ".$primary_key."=".ID."") or die("commande echouer".$error());
									//step three ends
									//step four starts
									$unpower_tbl_entree_q=$query("update  tbl_09entree  set quantite__totale=(quantite__totale - ".$_POST['quantite'].") where entree_id='".$add_entre_id."' ") or die("Query Failed".$error());
									//step four ends
								}
								
							}
							else
							{
				   //editing sortie ends
		           $cmd=$query("update ".$tbl." set ".$edit_3." where ".$primary_key."=".ID."") or die("commande echouer".$error());
				   if($tbl==$table_array[8])
							{
								if($_POST['quantite__totale']==0)
								{
								}
								else
								{
								$cmd=$query("update ".$tbl." set quantite__totale=(quantite__initiale + ".$_POST['quantite'].") where ".$primary_key."=".ID."") or die("commande echouer".$error());
								}
							}
							}
					
					break;
					case $command['erase_record']:
					$class_alert='alert alert-success';
				   $msg='Suppression à reussi';
				   if(FK=='erase_ordering')
				   {
					
		           $cmd=$query("delete from ".$tbl."  where numero__facture=".ID."") or die("commande echouer".$error());
				   }
				   else
				   {
					   $cmd=$query("delete from ".$tbl."  where ".$primary_key."=".ID."") or die("commande echouer".$error());
				   }
					break;
					default:
					{
						print'Desole un problem est survenu suite a la mauvaise utilisation de l\'application';
						exit();
					}
				}
				
		
			
		}
		
		#execution ends
		//message starts
		#action de messageri

$arrayerr[]='<div class="'.$class_alert.'">            
                                    <strong>Sys Message!</strong> '.$msg.'
                                    <button type="button" class="close" data-dismiss="alert">×</button>
    </div>';
	
	$array_flag=true;
	if($array_flag)
	{
		$_SESSION['ERRMSG_ARR']=$arrayerr;
		session_write_close();
		header('location:../dashboard.php?class='.$class.'&action=default&ref_id=default&ref_menu=default');
	}#action de messageri fin
		//message ends
		//execution query ends
		//echo $inverse_2;
		///echo'<hr>
		///valeur de champs
		}//<br>'.$inv_2;
	}
function read_fkfld($query,$read,$error,$sk,$s_tbl,$id,$fld_range)
{
	$j=0;
		//pk find start
		$q_1=$query("show columns from ".$s_tbl."") or die("Commande echouer izi".$error());
		while($column=$read($q_1))
		{
			$j+=1;
			
			 if($j==$fld_range)
			{
				$outpout=$column[0];
			}
			else
			{
				continue;
			}
		}
	
	$k_q=$query(" select * from ".$s_tbl." where ".$sk."='".$id."'")or die ("commande echouer".$error());
	$print=$read($k_q);
	$foreign_k_value=$print[$outpout];
	return $foreign_k_value;
}
function read_fkfld_two_tbl($query,$read,$error,$s_tbl,$s_tbl_2,$fld_1,$fld_1_value,$fld_2_range,$outpout_range)
{
$q=$query("select * from ".$s_tbl."   where ".$fld_1."='".$fld_1_value."'") or die("Query Failed".$error());
$row=$read($q);
//find fld 2 starts
$j=0;
$q_1=$query("show columns from ".$s_tbl."") or die("Commande echouer izi".$error());
		while($column=$read($q_1))
		{
			$j+=1;
			
			 if($j==$fld_2_range)
			{
				$fld_2=$column[0];
			}
			else
			{
				continue;
			}
		}
		$i=0;
$q_3=$query("show columns from ".$s_tbl_2."") or die("Commande echouer izi".$error());
		while($column_2=$read($q_3))
		{
			$i+=1;
			
			 if($i==$outpout_range)
			{
				$outpout=$column_2[0];
			}
			else
			{
				continue;
			}
		}
		
		$fld_2_value=$row[$fld_2];
$q_4=$query("select * from ".$s_tbl_2."   where ".$fld_2."='".$fld_2_value."'") or die("Query Failed".$error());
$row_2=$read($q_4);		
$foreign_k_value=$row_2[$outpout];
return $foreign_k_value;	
}
function retrieve_record($table,$query,$read,$error,$class,$fk,$fk_tbl,$cl_list)
{ 
$header='<table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
            <thead>
                <tr>';
				$header_data='';
				$data='';
				$j=0;
		$q=$query("show columns from ".$table."") or die ("commande echouer".$error());
		while($row=$read($q))
		{$j+=1;
			if($j!=1){
					$col=$row[0];
					$label=$col;
					$clean=str_replace('66',"'",$label);
					$clean_1=str_replace('_id',' ',$clean);
					$clean_2=str_replace('__',' ',$clean_1);
			$header_data.='<th><h3 style="text-transform:capitalize;">'.$clean_2.'</h3></th>';
			
			}
		}
		
$action='<th><h3>Action</h3></th></tr> </thead> <tbody>';
 echo $header.$header_data.$action;
$action_data='<td></td>'; 
$data_q=$query("select * from ". $table." ") or die("Query Failed".$error()); 
while($print=$read($data_q))
{
echo'<tr>'; 
$i=0;
$q=$query("show columns from ". $table." ")or die("Query Failed".$error());
while($row=$read($q))
{
	$i+=1;
	$column=$row[0];
	if($i!=1){
		if($column==$fk[0])
		{
			$foreign_k_value=read_fkfld($query=$query,$read=$read,$error=$error,$sk=$fk[0],$s_tbl=$fk_tbl[4],$id=$print[$column],$fld_range=2);
			echo'<td>'.$foreign_k_value.'</td>';
		}
		else
		{
	
				echo'<td>'.$print[$column].'</td>';
		}
	}
	
	else
	{
		$pk=$print[$column];
	}
}
if(CL=='customer')
{
	$buy_button='<a href="../dashboard.php?class=ordering&action=default&ref_id=ordering&ref_menu='.$pk.'" ><button class="btn btn-success">Commander</button></a>';
	$edit_button='<a href="../dashboard.php?class='.$class.'&action=edit&ref_id='.$pk.'&ref_menu=default" ><button class="btn btn-success">Editer</button></a> &nbsp;';
}
elseif(CL=='ordering')
{
	$buy_button='<a href="../MPDF57/examples/rapport.php?class='.$class.'&action=default&ref_id='.$print['numero__facture'].'&ref_menu=default&cmd=teller" ><button class="btn btn-success">Imprimer</button></a>
	&nbsp;<a href="?class='.$class.'&action=delete_confirm&ref_id='.$print['numero__facture'].'&ref_menu=erase_ordering" ><button class="btn btn-success">Supprimer commande</button></a>';
	$edit_button='';
}
else
{
	$buy_button='';
	$edit_button='<a href="../dashboard.php?class='.$class.'&action=edit&ref_id='.$pk.'&ref_menu=default" ><button class="btn btn-success">Editer</button></a> &nbsp;';
}
echo '<td>'.$edit_button.'<a href="?class='.$class.'&action=delete_confirm&ref_id='.$pk.'&ref_menu=default" ><button class="btn btn-danger">Effacer</button></a> &nbsp;'.$buy_button.' </td></tr>'; 
}	
			
		
		
		#$action='<th><h3>Action</h3></th></tr> </thead> <tbody>';
		echo $end_tbl='</tbody></table>';
		#$full_table=$top_header=$header.$header_data.$action.$data.$action_data.$end_tbl;
		#return $full_table;
		
	}
	
	
										  
	function fk_field($name,$fk_table,$query,$read,$error,$fld_range,$action,$ref_id,$tbl,$unik,$row_count,$other_q,$fk_table_2,$onsubmit)
	{
		
		$j=0;
		//pk find start
		$q_1=$query("show columns from ".$fk_table."") or die("Commande echouer izi".$error());
		while($column=$read($q_1))
		{
			$j+=1;
			if($j==1)
			{
				$pk=$column[0];
			}
			else if($j==$fld_range)
			{
				$outpout=$column[0];
			}
			else
			{
				continue;
			}
			if($onsubmit==1)
			{
				$submit='onchange="form.submit();"';
				
			}
			else
			{
				$submit='';
			}
		}
		//pk find start
		$pre='<select name="'.$name.'" class="validate[required]" '.$submit.' >
		<option value="">--sectionner element--</option>"';
		$nothing='';
		$fk_fld=fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tbl,$fld_range=1);
		$q=$query("select * from ".$tbl." where ".$fk_fld."='".$ref_id."'") or die("Commande echouer".$error());
		$print=$read($q);
		$pkvalue=$print[$pk];
		$q_2=$query("select * from ".$fk_table."") or die("Commande echouer".$error());
		while($row=$read($q_2))
		{
			if($unik==1 &&$action=='default')
			{
				$checker=unik_data($query=$query,$read=$read,$error=$error,$table=$fk_table_2,$count_row=$row_count,$reference=$other_q.'='.$row[$pk]);
				 if($checker=='disabled')
				 {
					 continue;
				 }
					
					
				
			}
			if($ref_id!='default' and $row[$pk]==$pkvalue)
		   {
			$select='selected';
		
		    }
			
			else if($onsubmit==1 and $row[$pk]==$_GET['ref_menu'] and $ref_id='default')
			{
				$select='selected';
			}
			
		 else
		   {
			 //duplication code for editing method starts
			 if($unik==1 &&$action=='edit')
			{
				$checker=unik_data($query=$query,$read=$read,$error=$error,$table=$fk_table_2,$count_row=$row_count,$reference=$other_q.'='.$pkvalue);
				 if($checker=='disabled')
				 {
					 continue;
				 }
					
					
				
			}
			
			 //duplication code for editing method ends
			$select='';
		   }
			
			$nothing.='<option value="'.$row[$pk].'"'.$select.'>'.$row[$outpout].'</option>';
		}
		$laste='</select>';
		$input=$pre.$nothing.$laste;
		return $input;
	}
	function else_form($column,$tbl,$action,$query,$read,$error,$ref_id)
	{ $fk_fld=fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tbl,$fld_range=1);
		$q=$query("select * from ".$tbl." where ".$fk_fld."='".$ref_id."'") or die("Commande echouer".$error());
		$print=$read($q);
		$value=$print[$column];
		if($ref_id=='default')
		{
			$value_tag='';
		}
		 else
		 {
			 
			 $value_tag='value="'.$value.'"';
		 }
		 $css_class='validate[required]';
						$onkey_press='';
						$input='<input type="text" name="'.$column.'"  '.$value_tag.'class="'.$css_class.'" '.$onkey_press.'/>';
						return $input;
	}
	function calendar_fld($column,$tbl,$action,$query,$read,$error,$ref_id)
	{ $fk_fld=fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tbl,$fld_range=1);
		$q=$query("select * from ".$tbl." where ".$fk_fld."='".$ref_id."'") or die("Commande echouer".$error());
		$print=$read($q);
		$value=$print[$column];
		if($ref_id=='default')
		{
			$value_tag='';
		}
		 else
		 {
			 
			 $value_tag='value="'.$value.'"';
		 }
		 $css_class='tcal';
						$onkey_press='';
						$input='<input type="text" id="validate[required]" name="'.$column.'"  '.$value_tag.'class="'.$css_class.'" '.$onkey_press.'/>';
						return $input;
	}
	function readonly_fld($column,$tbl,$action,$query,$read,$error,$ref_id,$ref_menu,$feeding_data,$s_table,$fldrange,$ref_fld,$null)
	{ 
	$fk_fld=fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tbl,$fld_range=1);
		$q=$query("select * from ".$tbl." where ".$fk_fld."='".$ref_id."'") or die("Commande echouer".$error());
		$print=$read($q);
		$value=$print[$column];
		
		if($ref_id=='default'&& $feeding_data!=1 && $null!=1)
		{
			$value_tag='';
		}
		
		//total qte starts
	else if($ref_id=='default'&&$feeding_data==1 && FK!='default')
		{
		$j=0;
		$q_1=$query("show columns  from  ".$s_table."") or die("Commande echouer".$error());
		while($lire=$read($q_1))
		{
			$j+=1;

		   if($j==$fldrange)
			{
				$step_2=$lire[0];
			}
			else if($j==$ref_fld)
			{
			$step_1=$lire[0];
			}
			else
			{
				continue;
			}
			
		}
		 
			
			$q_2=$query("select * from ".$s_table." where ".$step_1."=".FK." and ".$step_2." > 0") or die("commande echouer".$error());
			$row=$read($q_2);
			$value=$row[$step_2];
			$value_tag='value="'.$value.'"';
			
		}
	//total qte ends
	else if($ref_id=='default' && $null==1 )
	{
		$value_tag='value="NULL"';
	}
		 else
		 {
			 
			 $value_tag='value="'.$value.'"';
		 }
		 
		 $css_class='';
						$onkey_press='';
						$input='<input type="text" id="validate[required]" readonly="readonly" name="'.$column.'"  '.$value_tag.'class="'.$css_class.'" '.$onkey_press.'/>';
						return $input;
	}
	function pwd_fld($column,$tbl,$action,$query,$read,$error,$ref_id)
	{ $fk_fld=fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tbl,$fld_range=1);
		$q=$query("select * from ".$tbl." where ".$fk_fld."='".$ref_id."'") or die("Commande echouer".$error());
		$print=$read($q);
		$value=$print[$column];
		if($ref_id=='default')
		{
			$value_tag='';
		}
		 else
		 {
			 
			 $value_tag='value="'.$value.'"';
		 }
		 $css_class='validate[required]';
						$onkey_press='';
						$input='<input type="text" id="input-password"readonly name="'.$column.'"  '.$value_tag.'class="'.$css_class.'" '.$onkey_press.'/><li class="form-row">
				 
				<a href="#" class="link-password" id="generate">Generer Mot de passe</a> <a href="#" class="link-password" id="confirm">Utiliser Mot de pass</a>
                <div id="random"></div>';
						return $input;
	}
	function int_dot_field($column,$tbl,$action,$query,$read,$error,$ref_id)
	{
		$fk_fld=fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tbl,$fld_range=1);
		$q=$query("select * from ".$tbl." where ".$fk_fld."='".$ref_id."'") or die("Commande echouer".$error());
		$print=$read($q);
		$value=$print[$column];
		
		$css_class='validate[required]';
		$onkey_press='onKeyPress="return onlyDotsAndNumbers(event)"';
		if($ref_id=='default')
		{
			$value_tag='';
		}
		 else
		 {
			 
			 $value_tag='value="'.$value.'"';
		 }
		$input='<input type="text" name="'.$column.'" '.$value_tag.' class="'.$css_class.'" '.$onkey_press.'/>';
		return $input;
		}	
	function textarea_field($column,$tbl,$action,$query,$read,$error,$ref_id)
	{
		$fk_fld=fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tbl,$fld_range=1);
		$q=$query("select * from ".$tbl." where ".$fk_fld."='".$ref_id."'") or die("Commande echouer".$error());
		$print=$read($q);
		$value=$print[$column];
		
		$css_class='validate[required]';
		$onkey_press='';
		if($ref_id=='default')
		{
			$value_tag='';
		}
		 else
		 {
			 
			 $value_tag=$value;
		 }
		$input='<textarea type="text" name="'.$column.'"  class="'.$css_class.'" '.$onkey_press.'/>'.$value_tag.'</textarea>';
		return $input;
		}
	function year_month_and_greatnum_field($column,$tbl,$action,$query,$read,$error,$ref_id,$begin,$restrict,$month)
	{   $mois=array('Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre');
		$fk_fld=fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tbl,$fld_range=1);
		$q=$query("select * from ".$tbl." where ".$fk_fld."='".$ref_id."'") or die("Commande echouer".$error());
		$print=$read($q);
		$value=$print[$column];
		
		$css_class='validate[required]';
		$onkey_press='';
		if($ref_id=='default')
		{
			$value_tag='';
		}
		 else
		 {
			 
			 $value_tag=$value;
		 }
		 if($month==1)
		 {
			 $startup=1;
			 $endup=12;
		 }
		 else
		 {
			 $startup=$begin;
			 $endup=$restrict;
		 }
	$option='';
	$pre_input='<select class="'.$css_class.'" name="'.$column.'">
  <option value="">-- selectionner --</option>';
	for($n=$startup; $n <=$endup; $n++)
	{
		if($action=='edit' and $n==$value)
		{
			$select='selected';
		}
		else
		{
			$select='';
		}
		
		
		if($month==1)
		{   
			$output=$mois[$n-1];
			
			if($action=='default' and $n==date('m'))
			{
				$select='selected';
			}
		}
		else
		{
			$output=$n;
			if($action=='default' and $n==date('Y'))
			{
				$select='selected';
			}
		}
		$option.='<option value="'.$n.'"'.$select.'>'.$output.'</option>';
	}
$suf_input='</select>';
	$input=$pre_input.$option.$suf_input;
		return $input;
		}
	function gender_field($column,$tbl,$action,$query,$read,$error,$ref_id)
	{   $gender=array('Homme','Femme','Autre');
		$fk_fld=fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tbl,$fld_range=1);
		$q=$query("select * from ".$tbl." where ".$fk_fld."='".$ref_id."'") or die("Commande echouer".$error());
		$print=$read($q);
		$value=$print[$column];
		
		$css_class='validate[required]';
		$onkey_press='';
		if($ref_id=='default')
		{
			$value_tag='';
		}
		 else
		 {
			 
			 $value_tag=$value;
		 }
	if($value==$gender[0])
	{
		$a='selected';
		$b='';
		$c='';
	}
	elseif($value==$gender[1])
	{
		$a='';
		$b='selected';
		$c='';
	}
	elseif($value==$gender[2])
	{
		$a='';
		$b='';
		$c='selected';
	}
	else
	{
		$a='';
		$b='';
		$c='';
	}
		 $input='
	<select class="'.$css_class.'" '.$onkey_press.'" name="'.$column.'">
  <option value="">-- selectionner genre--</option>
  <option value="'.$gender[0].'"'.$a.'>'.$gender[0].'</option>
  <option value="'.$gender[1].'"'.$b.'>'.$gender[1].'</option>
  <option value="'.$gender[2].'"'.$c.'>'.$gender[2].'</option>
</select>';
	
		return $input;
		}

		function previleged_field($column,$tbl,$action,$query,$read,$error,$ref_id)
	    {   
		$gender=array('Administrateur','Enfants','Militaires','Femmes');
		$fk_fld=fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tbl,$fld_range=1);
		$q=$query("select * from ".$tbl." where ".$fk_fld."='".$ref_id."'") or die("Commande echouer".$error());
		$print=$read($q);
		$value=$print[$column];
		
		$css_class='validate[required]';
		$onkey_press='';
		if($ref_id=='default')
		{
			$value_tag='';
		}
		 else
		 {
			 
			 $value_tag=$value;
		 }
	if($value==$gender[0])
	{
		$a='selected';
		$b='';
		$c='';
		$d='';
	}
	elseif($value==$gender[1])
	{
		$a='';
		$b='selected';
		$c='';
		$d='';
	}
	elseif($value==$gender[2])
	{
		$a='';
		$b='';
		$c='selected';
		$d='';
	}
	elseif($value==$gender[3])
	{
		$a='';
		$b='';
		$c='';
		$d='selected';
	}
	else
	{
		$a='';
		$b='';
		$c='';
		$d='';
	}
		 $input='
	<select class="'.$css_class.'" '.$onkey_press.'" name="'.$column.'">
  <option value="">-- selectionner designation--</option>
  <option value="'.$gender[0].'"'.$a.'>'.$gender[0].'</option>
  <option value="'.$gender[1].'"'.$b.'>'.$gender[1].'</option>
  <option value="'.$gender[2].'"'.$c.'>'.$gender[2].'</option>
   <option value="'.$gender[3].'"'.$d.'>'.$gender[3].'</option>
</select>';
	
		return $input;
		}		
	function fk_query($query,$read,$error,$tablelist,$fld_range)
	{
		$j=0;
		$q=$query("show columns from ".$tablelist."") or die ("commande echouer".$error());
		while($row=$read($q))
		{
			$j+=1;
			if($j==$fld_range)
			{
			$fk_fld=$row[0];	
			}
			else
			{
				continue;
			}
			return $fk_fld;
			}
	}
	function form_legend($class,$cl_list)
	{
		switch($class)
		{
			case $cl_list[0]:
			$legend='site';
			break;
			case $cl_list[1]:
			$legend='enfants';
			break;
			case $cl_list[2]:
			$legend='militaires';
			break;
			case $cl_list[3]:
			$legend='femmes';
			break;
			case $cl_list[3]:
			$legend='membres';
			break;
			case $cl_list[3]:
			$legend='utilisateurs';
			break;
			case $cl_list[3]:
			$legend='maison';
			break;
			default:
			{
				$legend='';
			}
			}
			return $legend;
	}
	function pdf_rpt_redirect($class,$cl_list)
	{
		switch($class)
		{
			case $cl_list[0]:
			$url_action='default';
			break;
			
			default:
			{
				$url_action='default';
			}
			}
			return $url_action;
	}
function unik_data($query,$read,$error,$table,$count_row,$reference)
{
	$q=$query("select * from ".$table." ".$reference."") or die ("commande echouer".$error());
	$checker=$count_row($q);
	if($checker==1)
	{
		$disabling='disabled';
	}
	else
	{
		$disabling='';
	}
	return $disabling;
}
function pdf_reporting_form()
{
	$form='<div class="content">
                 <form id="validate" method="post" action="MPDF57/examples/rapport.php?class='.CL.'&action=retrieving&ref_id=default&ref_menu=default" enctype="multipart/form-data">
                <div class="block">
                                    <div class="head">
                                        <h2>Exporter donnée par date filtre</h2>
                                        <div class="side fr">
                                        </div>
                                    </div>
                                    <div class="content np">
									<div class="controls-row">
                                            <div class="span3" style="text-transform:capitalize;">Du:</div>
                                            <div class="span9"><input type="text" name="from"  class="tcal"/>
                                            </div>
                                        </div>
										<div class="controls-row">
                                            <div class="span3" style="text-transform:capitalize;">Au:</div>
                                            <div class="span9"><input type="text" name="to"  class="tcal"/>
                                            </div>
                                        </div>
										<div class="footer">
                                        <div class="side fr">
                                            <button class="btn btn-primary" name="pdf">Exporter donnée en PDF</button>
                                        </div>
                                    </div>                                    
                                </div>
                                </form>
                                </div>';
								return $form;
}

function pdf_reporting_salary_form($fk_table,$query,$read,$error,$action,$ref_id,$row_count)
{
	$form='<div class="content">
                 <form id="validate" method="post" action="MPDF57/examples/rapport.php?class='.CL.'&action=retrieving&ref_id=default&ref_menu=default" enctype="multipart/form-data">
                <div class="block">
                                    <div class="head">
                                        <h2>Journal Salaire Par Membre</h2>
                                        <div class="side fr">
                                        </div>
                                    </div>
                                    <div class="content np">
									<div class="controls-row">
                                            <div class="span3" style="text-transform:capitalize;">Menbre:</div>
                                            <div class="span9">'.fk_field($name='membre_id',$fk_table='tbl_07membres',$query=$query,$read=$read,$error=$error,$fld_range=2,$action=$action,$ref_id=$ref_id,$tbl='tbl_07membres',$unik=0,$row_count=$row_count,$fk_table_2=NULL,$other_q=NULL,$onsubmit=NULL).'
                                            </div>
                                        </div>
										<div class="controls-row">
                                            <div class="span3" style="text-transform:capitalize;">Annee:</div>
                                            <div class="span9">'.year_month_and_greatnum_field($column='year',$tbl='tbl_07membres',$action=$action,$query=$query,$read=$read,$error=$error,$ref_id,$begin=2015,$restrict=3000,$month=0).'
                                            </div>
                                        </div>
										<div class="controls-row">
                                            <div class="span3" style="text-transform:capitalize;">Mois:</div>
                                            <div class="span9">'.year_month_and_greatnum_field($column='month',$tbl='tbl_07membres',$action=$action,$query=$query,$read=$read,$error=$error,$ref_id,$begin=NULL,$restrict=NULL,$month=1).'
                                            </div>
                                        </div>
										<div class="footer">
                                        <div class="side fr">
                                            <button class="btn btn-primary" name="pdf_salary">Exporter donnée en PDF</button>
                                        </div>
                                    </div>                                    
                                </div>
                                </form>
                                </div>';
								return $form;
}
function form($query,$read,$error,$tablelist,$action,$class,$fk_tbl,$cl_list,$act,$id,$count_data,$foreign_key)
		{ 
		echo'<div class="content">
                 <form id="validate" method="post" action="phpscript/executer.php?class='.CL.'&action='.AC.'&ref_id='.ID.'&ref_menu='.FK.'" enctype="multipart/form-data">
                <div class="block">
                                    <div class="head">
                                        <h2>Encodage des données '.form_legend($class=$class,$cl_list=$cl_list).'</h2>
                                        <div class="side fr">
										<a href="?class='.$class.'&action=default&ref_id=default&ref_menu=default" class="btn btn-primary">Ajouter donnée</a>
										<a href="retrieve/?class='.$class.'&action=retrieving&ref_id=default&ref_menu=default" class="btn btn-primary">Affichage des données</a>
										<a href="MPDF57/examples/rapport.php?class='.$class.'&action=retrieving&ref_id='. pdf_rpt_redirect($class,$cl_list).'&ref_menu=default" class="btn btn-primary">Exporter Données en PDF</a>
                                        
                                        </div>
                                    </div>
                                    <div class="content np">';  
                                   #dynamic form field starts  
                                    
		$a=0; 
		$show_columns_query=$query("show columns from ".$tablelist."") or die("Commande echouer".$error());
				while($read_columns=$read($show_columns_query))
				{
					$col=$read_columns[0];
					
						$label=$col;
					
					$a+=1;
					if($a==1)
					
					{
						continue;
					}
					$clean=str_replace('66',"'",$label);
					$clean_1=str_replace('_id',' ',$clean);
					$clean_2=str_replace('__',' ',$clean_1);
					switch($class)
					{
						case $cl_list[0]:
						$disabling='';
						if($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=4)){
						
						$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=6)){
						
						$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=7)){
						
						$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=8)){
						
						$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						}
						
					
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=14)){
						
						$input=calendar_fld($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id);
						}
						
						else
						{
						$input=else_form($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id);
						}
						break;
						case $cl_list[1]:
						$disabling='';
						if($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=5)){
						
						$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=7)){
						
						$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=9)){
						
						$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=10)){
						
						$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=11)){
						
						$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=12)){
						
						$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=13)){
						
						$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=14)){
						
						$input=calendar_fld($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id);			}
						
						else
						{
						$input=else_form($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id);
						}
						break;
						case $cl_list[2]:
						$disabling='';
						if($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=5)){
						
						$input=textarea_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id);	
					
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=6)){
						
						$input=calendar_fld($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id);
						}
						
						else
						{
						$input=else_form($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id);
						}
						break;
						case $cl_list[3]:
						$disabling='';
						if($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=5)){
						
						$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=7)){
						
						$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=9)){
						
						$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=10)){
						
						$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=11)){
						
						$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						
						
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=12)){
						
						$input=calendar_fld($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id);			}
						
						else
						{
						$input=else_form($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id);
						}
						break;
						case $cl_list[5]:
						$disabling='';
						if($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=2)){
						
							$input=fk_field($name=$col,$fk_table=$fk_tbl[4],$query=$query,$read=$read,$error=$error,$fld_range=2,$action=$act,$ref_id=$id,$tbl=$tablelist,$unik=1,$row_count=$count_data,$other_q="where ".$foreign_key[0]."",$fk_table_2=$fk_tbl[5],$onsubmit=NULL);
					
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=3)){
						
						$input=previleged_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id);
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=5)){
						
						$input=pwd_fld($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id);
						}
						
						
						else
						{
						$input=else_form($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id);
						}
						break;
						case $cl_list[6]:
						$disabling=unik_data($query=$query,$read=$read,$error=$error,$table=$tablelist,$count_row=$count_data,$reference='');
						if($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=3))
						{
							$input=int_dot_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id
						);
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=5)){
						
						$input=textarea_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id);	
					
						}
						elseif($col==fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tablelist,$fld_range=6)){
						
						$input=textarea_field($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id);	
					
						}
						
						
				else
				{
						
						$input=else_form($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id);
				}
						break;
						
						default:
						{
						$input=else_form($column=$col,$tbl=$tablelist,$action=$act,$query=$query,$read=$read,$error=$error,$ref_id=$id);
						$disabling='';
							}
					
						}
					                                  
                                     echo'<div class="controls-row">
                                            <div class="span3" style="text-transform:capitalize;">'.$clean_2.':</div>
                                            <div class="span9">'.$input.'
                                                <span class="help-inline">Tapper '.$clean_2.'</span>
                                            </div>
                                        </div>';
                   #  
                                                #dynamic form field end
												}
                                    
                                    echo'<div class="footer">
                                        <div class="side fr">
                                            <button class="btn btn-primary" name="executer"';
											 if($action!='edit')
											 {
												 print $disabling;
											 }
											 echo'>';
											if($action=='edit')
											{
												echo'Editer';}
											else
											{
												echo'Sauvegarder';}
												
												
											echo'</button>
                                        </div>
                                    </div>                                    
                                </div>
                                </form>
                                </div>';
			
			}
			function delete_confirm()
			{
				if(AC=='delete_confirm')
				{
					echo'<div class="alert alert-info">            
                                    <strong>Sys Message!</strong> Etes-vous sure de supprimer cette donnée ?
									<br><center><a href="../phpscript/executer.php?class='.CL.'&action=delete&ref_id='.ID.'&ref_menu='.FK.'"><button class="btn btn-success">Oui</button></a> &nbsp;
									<a href="?class='.CL.'&action=retrieving&ref_id=default&ref_menu=default"><button class="btn btn-primary">Non</button></a></center>
                                    
    </div>';
				}
			}

function pdf_report($query,$count_row,$read,$error,$exception,$tbl_header,$table,$rpt_legend,$fk,$fk_tbl,$ref_date,$ref_from,$ref_to,$cl_list)
{
$a=0;
$b='';
$q=$query("show columns from ".$tbl_header."") or die('commande echoué'.$error());
$q_2=$query("select * from ".$tbl_header."") or die('commande echoué'.$error());
$row_2=$read($q_2);
while($row=$read($q))
{
	$a+=1;
	if($a==1||$a==3)
	{
		continue;
	}
	elseif($a==2)
	{
		$title_value=$row_2[$row[0]];
	}
	
 
 $b.=$row_2[$row[0]].'<br>';
 
}
$title='<h1 style="text-transform:capitalize">'.$title_value.'</h1>';
if(isset($_GET['from']))
{
	$var_date='Du '.$_GET['from'].' Au '.$_GET['to'].'';
}
else if(isset($_GET['member_id']))
{
	$var_date='Mois '.$_GET['month'].' Annee '.$_GET['year'].'';
}
else
{
$var_date='Date:'.date('d-M-Y');
}
$header = '
<h1 style="text-transform:capitalize">Etat de sortie '.$rpt_legend.' '.$var_date.'</h1>
<table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
<thead>
<tr class="headerrow">';
$header_data='';
$td="";
				$data='';
				$j=0;
		$q=$query("show columns from ".$table."") or die ("commande echouer".$error());
		while($row=$read($q))
		{$j+=1;
			if($j!=1){
					$col=$row[0];
					$label=$col;
					$clean=str_replace('66',"'",$label);
					$clean_1=str_replace('_id',' ',$clean);
					$clean_2=str_replace('__',' ',$clean_1);
			$header_data.='<th style="text-transform:capitalize;">'.$clean_2.'</th>';
			}
		}

	$before='</tr></thead>
<tbody><tr>';

$full_data="";
if(isset($_GET['from']))
{   $second_row='';
	$data_q=$query("select * from ". $table." where date between '".$_GET['from']."' and '".$_GET['to']."' ") or die("Query Failed".$error());
}
else if(isset($_GET['cmd']))
{   $second_row='';
	$data_q=$query("select * from ". $table." where numero__facture='".ID."' ") or die("Query Failed".$error());
	$total_q=$query("select sum(montant) from ".$table." where numero__facture='".ID."'") or die("Query Failed".$error());
	while($r=$read($total_q))
	{
		$total=$r['sum(montant)'];
	}
	$second_row='<tr><th colspan="11">Total cash: '.$total.'</th></tr>';
}
elseif(isset($_GET['member_id']))
{   
	$data_q=$query("select * from ". $table." where annee='".$_GET['year']."' and  mois='".$_GET['month']."' and membre_id='".$_GET['member_id']."' ") or die("Query Failed".$error());
	$number_of_day=$count_row($data_q);
	$daily_weigeith=read_fkfld($query=$query,$read=$read,$error=$error,$sk='membre_id',$s_tbl='tbl_07membres',$id=$_GET['member_id'],$fld_range=7);
	$second_row='<tr><th colspan="4">Salaire: Jours present('.$number_of_day.')x Salaire Journalier('.$daily_weigeith.')='.($number_of_day*$daily_weigeith).'</th></tr>';
}
else
{
$second_row='';
$data_q=$query("select * from ". $table." ") or die("Query Failed".$error());
}
while($print=$read($data_q))
{
	$n=0;
$q_3=$query("show columns from ". $table." ")or die("Query Failed".$error());
while($row_3=$read($q_3))
{ 
	$n+=1;
	$column=$row_3[0];
	if($n==2)
	{
		$tr='<tr>';
	}
	else
	{
		$tr='';
	}
	if($n>1)
	{
		if($column==$fk[0])
		{
			$foreign_k_value=read_fkfld($query=$query,$read=$read,$error=$error,$sk=$fk[0],$s_tbl=$fk_tbl[4],$id=$print[$column],$fld_range=2);
			$lecture=$foreign_k_value;
		}
		
		else
		{
			$lecture=$print[$column];
   
		}
		 $full_data.=$tr.'<td>'.$lecture.'</td>';
	}
	
}
}

$footer='</tr>'.$second_row.'</tbody></table>
<p>&nbsp;</p>
';
$pdf=$title.$b.$header.$header_data.$before.$full_data.$footer;
return $pdf;
}
function fk_field_two_tbl($name,$fk_table,$query,$read,$error,$fld_range,$action,$ref_id,$tbl,$tbl_2,$fld_range_2,$onsubmit,$output_fld)
	{
		
		$j=0;
		//pk find start
		$q_1=$query("show columns from ".$fk_table."") or die("Commande echouer izi".$error());
		while($column=$read($q_1))
		{
			$j+=1;
			if($j==1)
			{
				$pk=$column[0];
			}
			else if($j==$fld_range)
			{
				$outpout=$column[0];
			}
			else if($j==$fld_range_2)
			{
				$max_fld=$column[0];
			}
			else
			{
				continue;
			}
		}
		if($onsubmit==1 && AC!='edit')
		{
			$submit='onchange="form.submit();"';
		}
		else if(AC=='edit')
		{
			$submit='onfocus="form.submit();"';
		}
		else
		{
			$submit='';
		}
		$other_q="where ".$max_fld." >0";
		//pk find start
		$pre='<select name="'.$name.'" class="validate[required]" '.$submit.'>
		<option value="">--sectionner element--</option>"';
		$nothing='';
		$fk_fld=fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tbl,$fld_range=1);
		$q=$query("select * from ".$tbl." where ".$fk_fld."='".$ref_id."'") or die("Commande echouer".$error());
		$print=$read($q);
		$pkvalue=$print[$pk];
		$q_2=$query("select * from ".$fk_table." ".$other_q."") or die("Commande echouer".$error());
		while($row=$read($q_2))
		{
		
			if($ref_id!='default' and $row[$pk]==$pkvalue)
		   {
			$select='selected';
		
		    }
			elseif($ref_id=='default' and $row[$pk]==FK)
			{
				$select='selected';
			}
			
		 else
		   {
			 
			$select='';
		   }
		   $q_3=$query("select * from  ".$tbl_2." where ".$outpout."='".$row[$outpout]."'") or die("Commande echouer".$error());
			$lire=$read($q_3);
			$outpout_2=$lire[$output_fld];
			$nothing.='<option value="'.$row[$pk].'"'.$select.'>'.$outpout_2.'</option>';
		}
		$laste='</select>';
		$input=$pre.$nothing.$laste;
		return $input;
	}
	
	function choose_from_list($name,$fk_table,$query,$read,$error,$action,$ref_id,$tbl,$intfld_range)
	    {   
		$j=0;
		//pk find start
		$q_1=$query("show columns from ".$fk_table."") or die("Commande echouer izi".$error());
		while($column=$read($q_1))
		{
			$j+=1;
			if($j==1)
			{
				$pk=$column[0];
			}
			if($j==$intfld_range)
			{
				$max_qte=$column[0];
			}
			else
			{
				continue;
			}
		}
		$pre='<select name="'.$name.'" class="validate[required]">
		<option value="">--sectionner valeur--</option>"';
		$nothing='';
		$fk_fld=fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tbl,$fld_range=1);
		$qte=fk_query($query=$query,$read=$read,$error=$error,$tablelist=$tbl,$fld_range=4);
		$q=$query("select * from ".$tbl." where ".$fk_fld."='".$ref_id."'") or die("Commande echouer".$error());
		$print=$read($q);
		#$pkvalue=$print[$pk];
		$q_2=$query("select * from ".$fk_table." where ".$pk."='".FK."' ") or die("Commande echouer".$error());
		$row=$read($q_2);
		$loop_for_ref_value=$row[$max_qte];
		for($k=1; $k<=$loop_for_ref_value;$k++)
		{
		
			if($ref_id!='default' and $k==$print[$qte])
		   {
			$select='selected';
		
		    }
			
		 else
		   {
			 
			$select='';
		   }
		   
			$nothing.='<option value="'.$k.'"'.$select.'>'.$k.'</option>';
		}
		$laste='</select>';
		$input=$pre.$nothing.$laste;
		return $input;
		}		
	?>
    
