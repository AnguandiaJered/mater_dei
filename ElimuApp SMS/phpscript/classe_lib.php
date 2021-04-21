<?php
include('ps_pagination.php');
###################################CLASS OPEN GATE STARTS#############################################################################
class open_gate
{
//properties starts
public $db,$tbl,$q,$row,$j,$flds,$fld_array,$_explode,$i,$count_rows,$colum_name;
private $z,$tq,$trow,$qc,$rowc;
//properties ends
##############################METHOD FOR GETTING TABLE STARTS#########################################################################
 public function table_name($tbl_name,$database)
{
$this->tq=$database=mysql_query("show tables") or die("Query Failed table".mysql_error());
$this->z=0;
while($this->trow=mysql_fetch_array($this->tq))
{
	$this->z++;
	if($this->z==$tbl_name)
	{
		$this->tbl=$this->trow[0];
	}else
	{
		continue;
	}
}
return $this->tbl;
}
##############################METHOD FOR GETTING TABLE ENDS#########################################################################
##############################METHOD FOR GETTING TABLE COLUMN STARTS################################################################
public  function get_table_column($database,$table,$column_range)
{   $this->j=0;
	$this->qc=$database=mysql_query("show columns from ".$table."") or die("Query Failed for table column".mysql_error());
	while($this->rowc=mysql_fetch_array($this->qc))
	{
		$this->j++;
		if($this->j==$column_range)
		{
			$this->colum_name=$this->rowc[0];
		}else
			{
				continue;
			}
		return $this->colum_name;
	}
}
##############################METHOD FOR GETTING TABLE COLUMN ENDS##################################################################
##############################METHOD FOR HAVING SQL QUERY TABLE STARTS##############################################################
function sql_query($database,$fld_array_set,$table,$gp)
{
//getting table field starts
$this->tbl=$this->table_name($table,$database);
$this->q=$database=mysql_query("show columns from ".$this->tbl."") or die("Query Failed column failed".mysql_query());
$this->j=0;
$this->flds="";
while($this->row=mysql_fetch_array($this->q))
{
	$this->j++;
	
	$this->_explode=explode(',',$this->fld_array=$fld_array_set);
	for($this->i=0;$this->i<count($this->_explode);$this->i++)
	{
		if($this->j==$this->_explode[$this->i])
		{
		if($gp=='p')
		{	
		$this->flds.=$this->row[0]."='".mysql_real_escape_string(strip_tags(stripslashes(str_replace("'",'',$_POST[$this->row[0]]))))."' AND ";
		}else
		{
			$this->flds.=$this->row[0]."='".mysql_real_escape_string(strip_tags(stripslashes(str_replace("'",'',$_GET[$this->row[0]]))))."' AND ";
		}
		}
	}
	
}
return "select * from ".$this->tbl."  where  ".strrev(substr(strrev($this->flds),+5));
//getting table field ends
}
##############################METHOD FOR HAVING SQL QUERY TABLE ENDS  ##############################################################
##############################GETTIN LOGIN URL STARTS  #############################################################################
function set_login($database,$fld_array_set,$table,$success_url,$failure_url,$design_sess,$sub_store,$gp)
{
$this->q=$database=mysql_query("".$this->sql_query($database,$fld_array_set,$table,$gp)."") or die("Query Failed login". mysql_error());
$this->count_rows=mysql_num_rows($this->q);
$this->row=mysql_fetch_array($this->q);
if($this->count_rows==1)
{
	//security starts
	$_SESSION['USER_ID']=$this->row[0];//we assume this is the primary key
	$_SESSION['DESIGNATION']=$this->row[$design_sess];//design field
	$_SESSION['SUB_STORE']=$this->row[$sub_store];
	//login successfully
	header('location:'.$success_url.'');
	
}else
{
header('location:'.$failure_url.'');	//autification failed
}
	
}
##############################GETTIN LOGIN URL ENDS  #############################################################################
}
###################################CLASS OPEN GATE ENDS#############################################################################
###################################CLASS LOGIN FORM GENERATOR STARTS##################################################################
class login_form extends open_gate {
	private $_header,$middle,$footer,$pwd,$placeholder_value;
	function create_login_form($database,$table,$pwd,$header,$middle,$footer,$fld_array)
	{
	$this->_header=$header;$this->middle=$middle;$this->footer=$footer;
	$this->q=$database=mysql_query("show columns from ".$this->table_name($table,$database)." ") or die("Query Failed".mysql_error());
	$this->j=0;	
	$this->flds="";
	while($this->row=mysql_fetch_array($this->q))
	{
    $this->j++;
	
	$this->_explode=explode(',',$this->fld_array=$fld_array);
	for($this->i=0;$this->i<count($this->_explode);$this->i++)
	{
		if($this->j==$this->_explode[$this->i])
		{   if($this->j==$pwd)
		     
			  {
				$this->pwd='password';  
			  }else
			  {
				  $this->pwd='text';
			  }
			  $this->placeholder_value=str_replace('666',"'",str_replace('__','&nbsp;',$this->row[0]));
			$this->flds.=str_replace('#_place_holder',$this->placeholder_value,str_replace('#_input_type',$this->pwd,(str_replace('#_name',$this->row[0],(str_replace('#_label','<span style="text-transform:capitalize">'.$this->row[0].'</span>',$middle))))));
			
		}
	}
		
	}
	$this->_header=$header;
	$this->footer=$footer;
	$this->middle=$this->flds;
	return $this->_header.$this->middle.$this->footer;
	}

}
###################################CLASS LOGIN FORM GENERATOR ENDS##################################################################
###################################CLASS MENU GENERATOR STARTS#####################################################################
class menu_generator extends open_gate
{
private $menusubmenu_array,$_value,$_output,$menuopen,$menudyn,$menuend,$submenuopen,$submenudyn,$submenuend,$homeurl,$tbls,$k,$menu,$outputsubmenu,$submenu,$mytitle;
function menu_and_submenu($menusubmenu_array,$database,$menuopen,$menudyn,$menuend,$submenuopen,$submenudyn,$submenuend,$homeurl)
{  
     $this->menusubmenu_array=$menusubmenu_array;
     $this->menudyn=$menudyn;
	 $this->submenuopen=$submenuopen;
	 $this->submenuend=$submenuend;
     $this->_output='';
     $this->j=-1;
	 $this->outputsubmenu='';;
	
	foreach($this->menusubmenu_array as $this->_value)
	{
		$this->j++;
		$this->_explode=explode(',',$this->menusubmenu_array[$this->j]);
		for($this->i=0;$this->i<count($this->_explode);$this->i++)
		{
			#$this->k++;
			if($this->i==0)
			{
				//get menu name starts
				$this->menu=$this->_explode[$this->i];
				//get menu ends
			
			}
			else
			{
				$this->submenu=str_replace($this->menu.',','',$this->menusubmenu_array[$this->j]);
				$this->outputsubmenu=$this->return_submenu_dy($this->submenu,$submenudyn,$database);
				
			}
			
		}
		
		$this->_output.=str_replace('#_ID',$this->j,str_replace('00','/',str_replace('666',"'",str_replace('__',' ',(str_replace('#_submenu',$this->outputsubmenu,(str_replace('#_menu',$this->menu,$this->menudyn))))))));
		
	}
	$this->menuopen=$menuopen;
	$this->menuend=$menuend;
	$this->homeurl=$homeurl;
	return $this->menuopen.$this->homeurl.$this->_output.$this->menuend;
}
###################################METHOD THAT RETURNS SUBMENU VALUES STARTS#########################################################

function return_submenu_dy($value_a,$value_b,$database)
{ 
    $this->submenu='';
	$this->_explode=explode(',',$value_a);
	for($this->i=0;$this->i<count($this->_explode);$this->i++)
	{   $this->tbl=$this->table_name($this->_explode[$this->i],$database);
		//echo "<h1>".$this->_explode[$this->i]."</h1>";
			if($this->_explode[$this->i]==3)
			{
			 $this->submenu.=str_replace('#_tbl','Information de l\'institution',(str_replace('#_id',2,str_replace('#_action','edit',str_replace('#_url',$this->_explode[$this->i],$value_b)))));
			}
			elseif($this->_explode[$this->i]==80)
			{
			 $this->submenu.=str_replace('#_tbl','Frais Carrefour bus scolaire',(str_replace('#_id',2,str_replace('#_action','edit',str_replace('#_url',$this->_explode[$this->i],$value_b)))));
			}
			else
			{
				$this->submenu.=str_replace('#_tbl',substr($this->tbl,+7),(str_replace('#_id','default',str_replace('#_action','default',str_replace('#_url',$this->_explode[$this->i],$value_b)))));

				//echo str_replace('#_tbl',substr($this->tbl,+7),(str_replace('#_id','default',str_replace('#_action','default',str_replace('#_url',$this->_explode[$this->i],$value_b)))));
			}
		#$this->_explode[$this->i];#str_replace('#_tbl',$this->_explode[$this->i],$value_b);
	}
	return $this->submenu;
	
}
###################################METHOD THAT RETURNS SUBMENU VALUES ENDS#########################################################
}
###################################CLASS MENU GENERATOR STARTS#####################################################################
class form_generator extends open_gate
{
	private $cc,$dynamic_data,$_label,$_value,$_select,$list_header,$list_option,$list_group,$list_footer,$array_data,$_val,$pk,$quer,$dropdownlist_values_array,$dropdown_list_explode,$k,$tbl_dr,$pk_dr,$output_dr,$onchange_dr,$a,$b,$c,$q_dr,$reload_frm,$fk_fld,$row_2,$requet,$lire,$deactivate_search,$dropcss,$tbl_option,$ref_fld,$width,$select_a,$select_b,$extra_option,$checkboxes,$edited_value,$mycheckbox_expl,$required;
	#private $width;
	function dynamic_form_middle($database,$table,$form_header,$form_middle,$form_footer,$input,$css_class,$dropdown_list)
	{   $this->tbl=$table;
		$this->quer=$database=mysql_query("show columns from ".$this->tbl." ") or die("Query Failed for generating field".mysql_error());
		$this->cc=0;
		$this->dynamic_data='';
		
		while($this->row=mysql_fetch_array($this->quer))
		{
			$this->cc++;
			if($this->cc==1)
			{
				$this->pk=$this->row[0];
			}
			$this->_label=$this->row[0];
			if($this->cc==1){continue;} //skipp primary key
			$this->dynamic_data.=str_replace('#_input',$this->input_arranger($input,$this->cc,$this->row[0],$css_class,$this->pk,$database,$table,$dropdown_list,$this->cc),str_replace('00',' /',str_replace('666',"'",str_replace('_id','',str_replace('__',' ',(str_replace('#_label',$this->_label,$form_middle)))))));
			
		}
		return $form_header.$this->dynamic_data.$form_footer;
	}
	function input_arranger($input,$range,$name,$css_class,$pk_fld,$database,$table,$dropdown_list,$range_int)
	{   $this->j=1;
		$this->_explode=explode(',',$input);
		for($this->i=0;$this->i<count($this->_explode);$this->i++)
		{
			$this->j++;
			//if explode=1 that means textbox
			if($this->_explode[$this->i]==1&&$this->j==$range)
			{
				//call function textbox simple starts
				return $this->textbox($name,$css_class,$range,$pk_fld,$database,$table);
			}
			else if($this->_explode[$this->i]==2&&$this->j==$range)
			{
				//call function textarea simple starts
				return $this->textarea($name,$css_class,$range,$pk_fld,$database,$table);
			}
			else if($this->_explode[$this->i]==3&&$this->j==$range)
			{
				//call function textarea simple starts
				return $this->int_dot($name,$css_class,$range,$pk_fld,$database,$table);
			}
			else if($this->_explode[$this->i]==4&&$this->j==$range)
			{
				//call function gender starts
				return $this->gender($name,$css_class,$range,$pk_fld,$database,$table);
			}
			else if($this->_explode[$this->i]==5&&$this->j==$range)
			{
				//call input read
				return $this->textbox_read($name,$css_class,$range,$pk_fld,$database,$table);
			}
			else if($this->_explode[$this->i]==6&&$this->j==$range)
			{
				//call calendar
				return $this->calendar($name,$css_class,$range,$pk_fld,$database,$table);
			}
			else if($this->_explode[$this->i]==9&&$this->j==$range)
			{ 
			//yes or no
				return $this->list_yes_no($name,$css_class,'',$database,$table,'Oui','Non',$pk_fld,'');
			}
			else if($this->_explode[$this->i]==11&&$this->j==$range)
			{ 
			//admin designation
				return $this->login_designation($name,$css_class,$range,$pk_fld,$database,$table);
			}
			elseif($this->_explode[$this->i]==12&&$this->j==$range)
			{
				//call function textbox simple starts
				return $this->user_id($name,$css_class,$range,$pk_fld,$database,$table);
			}
			else if($this->_explode[$this->i]==15&&$this->j==$range)
			{
				return $this->auto_id($name,$css_class,$range,$pk_fld,$database,$table);
			}
			
			else if($this->_explode[$this->i]==16&&$this->j==$range)
			{
				return $this->time_count($name,$css_class,$range,$pk_fld,$database,$table);
			}
			else if($this->_explode[$this->i]==17&&$this->j==$range)
			{
				//call function textbox simple starts
				return $this->input_file($name,$css_class,$range,$pk_fld,$database,$table);
			}
			else if($this->_explode[$this->i]==0&&$this->j==$range)
			{
				//ajax division
				return $this->_explode[$this->i];
			}
			else if($this->_explode[$this->i]==21&&$this->j==$range)
			{
				//call calendar
				return $this->calendar_default($name,$css_class,$range,$pk_fld,$database,$table);
			}
			if($this->_explode[$this->i]==22&&$this->j==$range)
			{
				//call function textbox simple starts
				return $this->classe_name($name,$css_class,$range,$pk_fld,$database,$table);
			}
			else if($this->_explode[$this->i]==23&&$this->j==$range)
			{
				//call calendar
				return $this->readonlycalendar($name,$css_class,$range,$pk_fld,$database,$table);
			}
			else if($this->_explode[$this->i]==7&&$this->j==$range)
			{
				//dropdown list starts
				if(is_array($dropdown_list))
				{   
					//get array values starts target column range
					$this->i=-1;
				    $this->dropdownlist_values_array='';
					foreach($dropdown_list as $this->_val)
					{
						$this->i++;
					$this->dropdownlist_values_array.=$dropdown_list[$this->i].'|';
						
					}
					//get array values ends column range
					 $this->dropdown_list_explode=strrev(substr(strrev($this->dropdownlist_values_array),+1));
					//explode starts
					$this->_explode=explode('|',$this->dropdown_list_explode);
					for($this->k=0;$this->k<count($this->_explode);$this->k++)
					{   //column range caught starts
						if($range_int==(substr(strrev($this->_explode[$this->k]),-1)+1))//revision starts
						{
							#return $this->_explode[$this->k];
							//dropdown arguments finding starts
							#1. table index
							$this->_explode=explode(',',$this->_explode[$this->k]);
							for($this->a=0;$this->a<count($this->_explode);$this->a++)
							{    
								if($this->a==1)
								{
								     //table cought starts
									 $this->tbl_dr=$this->_explode[$this->a];
									 //table caught ends
									 #return $this->dropdownlist($database,$this->tbl_dr,$css_class,$name,1);
								}
								 elseif($this->a==2)
								{
									//primary key starts
									$this->pk_dr=$this->_explode[$this->a];
									
									//primary key ends
								} 
								else if($this->a==3)
								{
									//output starts
									$this->output_dr=$this->_explode[$this->a];
									//output ends
									
								}
								else if($this->a==4)
								{
									//onchange starts
								$this->onchange_dr=$this->_explode[$this->a];
									//onchange ends
									
								}
								else if($this->a==5)
								{  
									//deactivate search
								
									$this->deactivate_search=$this->_explode[$this->a];
								}
									
								else if($this->a==6)
								{
									//getting input width
									$this->width=$this->_explode[$this->a];
								}
								else if ($this->a==7)
								{
									//getting ajax return function
									return $this->dropdownlist($database,$this->tbl_dr,$css_class,$name,$this->pk_dr,$this->output_dr,$this->onchange_dr,$this->deactivate_search,$this->width,$this->_explode[$this->a]);
									
								}
								 
							
							}
							#2.  ref table column pk
							#3   ref table column output
							#4.  active submit onchange
							//dropdown arguments finding ends
						}
						//column range caugth ends
					}
					//explode ends
					
				}
				else
				{
					return'set you variable as an array';
				}
				//dropdown list ends
				
			}
			
			//checkboxes object starts
			else if($this->_explode[$this->i]==20&&$this->j==$range)
			{
				//dropdown list starts
				if(is_array($dropdown_list))
				{   
					//get array values starts target column range
					$this->i=-1;
				    $this->dropdownlist_values_array='';
					foreach($dropdown_list as $this->_val)
					{
						$this->i++;
					$this->dropdownlist_values_array.=$dropdown_list[$this->i].'|';
						
					}
					//get array values ends column range
					 $this->dropdown_list_explode=strrev(substr(strrev($this->dropdownlist_values_array),+1));
					//explode starts
					$this->_explode=explode('|',$this->dropdown_list_explode);
					for($this->k=0;$this->k<count($this->_explode);$this->k++)
					{   //column range caught starts
						if($range_int==(substr(strrev($this->_explode[$this->k]),-1)+1))//revision starts
						{
							#return $this->_explode[$this->k];
							//dropdown arguments finding starts
							#1. table index
							$this->_explode=explode(',',$this->_explode[$this->k]);
							for($this->a=0;$this->a<count($this->_explode);$this->a++)
							{    
								if($this->a==1)
								{
								     //table cought starts
									 $this->tbl_dr=$this->_explode[$this->a];
									 //table caught ends
									 #return $this->dropdownlist($database,$this->tbl_dr,$css_class,$name,1);
								}
								 elseif($this->a==2)
								{
									//primary key starts
									$this->pk_dr=$this->_explode[$this->a];
									
									//primary key ends
								} 
								else if($this->a==3)
								{
									//output starts
									$this->output_dr=$this->_explode[$this->a];
									//output ends
									return $this->input_check_box($name,$css_class,$this->pk_dr,$this->output_dr,$database,$this->tbl_dr);
								}
							}
						}
					}
				}
				
			}
			//checkboxes object ends
		}
		
		
	}
	function numeric_list($ending_number,$input_name,$width,$css,$required_case)
	{
		if($required_case==1)
		{
			$this->required='required';
		}else
		{
			$this->required=false;
		}
		$this->list_header='<select name="'.$input_name.'" style="width:'.$width.';" class="'.$css.'" '.$this->required.'>
		<option value="">--Selectionner--</option>';
		$this->list_option='';
		$this->list_footer='</select>';
		for($this->i=1; $this->i<=$ending_number;$this->i++)
		{
			$this->list_option.='<option value="'.$this->i.'">'.$this->i.'</option>';
		}
		return $this->list_header.$this->list_option.$this->list_footer;
	}
	function input_check_box($name,$css_class,$pkfld,$output,$database,$table)
	{
		$this->checkboxes='';
		$this->pk=$this->get_table_column($database,$this->table_name(CL,$database),1);
		$database=$this->q=mysql_query("select * from ".$this->table_name($table,$database)."") or die("Query Failed for checkbox".mysql_error());
		while($this->row=mysql_fetch_array($this->q))
		{
			if(AC=='edit')
			{
				
			$this->checkboxes.='<div style="float:left; width:200px;><span style="font-size:10px;">'.$this->row[$output].'</span> &nbsp;<input type="checkbox" '.$this->if_true_value_existed_then_check($this->pk,ID,$database,$this->table_name(CL,$database),$name,$this->row[$pkfld]).' name="'.$name.'[]" class="'.$css_class.'" value="'.$this->row[$pkfld].'"/></div>';
			}
			else
			{
				$this->checkboxes.='<div style="float:left; width:200px; "><span style="font-size:10px;">'.$this->row[$output].'</span> &nbsp;<input type="checkbox" name="'.$name.'[]" class="'.$css_class.'" value="'.$this->row[$pkfld].'"/></div>';
			}
		}
		return 	'<div style="width:100%; margin-bottom:10px;">'.$this->checkboxes.'</div><br/>';
		
	}
	
	function if_true_value_existed_then_check($id_fld,$id_value,$db,$table,$column,$loop_value)
	{
		$db=$this->requet=mysql_query("select * from ".$table." where ".$id_fld."='".$id_value."'") or die("Query Failed".mysql_error());
		$this->row_2=mysql_fetch_array($this->requet);
		$this->_explode=explode(',',$this->row_2[$column]);
		
		for($this->j=0; $this->j<count($this->_explode); $this->j++)
		{
			if($loop_value==$this->_explode[$this->j])
			{
				return 'checked';
				break;
			}
			
		}
		
	}
	function textbox_read($name,$css_class,$range,$pkfld,$database,$table)
	{
		if(AC!='edit')
		{   if(isset($_GET['full_name'])){$this->a=$_GET['full_name'];}else{$this->a=FK;}
		      
			$this->_value=FK;
			 
		}else
		{   $this->requet=$database=mysql_query("select * from  ".$table."  where ".$pkfld."='".ID."'") or die("Query Failed".mysql_error());           
		    $this->lire=mysql_fetch_array($this->requet);
			$this->_value=$this->lire[$range-1];
			
		}
		if(FK=='default'&&AC!='edit')
		{
			//temporary link!!! gotta change it to dynamic one
			return'<a href="'.$this->redirect_and_get_parent_value().'"><button class="btn btn-danger" type="button">Selection Donnée Parent</button></a>';
		}
		if(isset($_GET['read_col'])){
			if(CL==12&&$name=='enfant_id')
			{
			return'<input type="hidden" name="'.$name.'" readonly="readonly" value="'.$this->_value.'" class="'.$css_class.'"/>
		    <input type="text" name="" readonly="readonly" value="'.foreign_value('where enfant_id="'.$this->_value.'"','tbl__06enfant',5,$this->db).'" class="'.$css_class.'"/>';
			}else
			{
				return'<input type="hidden" name="'.$name.'" readonly="readonly" value="'.$this->_value.'" class="'.$css_class.'"/>
		    <input type="text" name="" readonly="readonly" value="'.$_GET['read_col'].'" class="'.$css_class.'"/>';
			}
		
		}
		if(isset($_GET['msg_id']) && $name=='fk_message_id'){return'<input type="hidden" name="'.$name.'" readonly="readonly" value="'.$_GET['msg_id'].'" class="'.$css_class.'"/>
		<input type="text" name="" readonly="readonly" value="'.$_GET['msg_id'].'" class="'.$css_class.'"/>';}
		if(isset($_GET['grd_father']) && $name=='grd_father_id'){return'<input type="hidden" name="'.$name.'" readonly="readonly" value="'.$_GET['grd_father'].'" class="'.$css_class.'"/>
		<input type="text" name="" readonly="readonly" value="'.$_GET['grd_father'].'" class="'.$css_class.'"/>';}
		else{return'<input type="text"  readonly="readonly" value="'.$this->a.'" class="'.$css_class.'"/>
		<input type="hidden" name="'.$name.'" readonly="readonly" value="'.$this->_value.'" class="'.$css_class.'"/>
		';}
		
	}
	//method lis choice yes or not starts
	function list_yes_no($name,$css,$width,$database,$table,$yes,$no,$pk_fld,$onchange_funct)
	{    
	
	
	if(AC=='edit')
	      { 
		      $this->pk=$this->get_table_column($database,$table,1);
		      $this->requet=$database=mysql_query("select * from ".$table." where ".$this->pk."='".ID."'") or die("Query Failed".mysql_error());
			  $this->row_2=mysql_fetch_array($this->requet);
			  if($this->row_2[$name]==1)
			  {
				   $this->select_a='selected';
			  }
			  else
			  {
				  $this->select_a='';
			  }
			   if($this->row_2[$name]==0)
			  {
				   $this->select_b='selected';
			  }
			  else
			  {
				  $this->select_b='';
			  }
			 
	       }else
		   {
			   $this->select_a=''; $this->select_b='';
		   }
		$this->list_header='<select onchange="return '.$onchange_funct.'(this);" name="'.$name.'" style="width:'.$width.'" class="'.$css.'"><option value="">--Selectionner--</option>';
		$this->list_option='<option value="1" '.$this->select_a.'>'.$yes.'</option>
		<option value="0" '.$this->select_b.'>'.$no.'</option>';
		$this->list_footer='</select>';
		return $this->list_header.$this->list_option.$this->list_footer;
	}
	//method list choice yes or not ends
	//METHOD FOR GETTING PARENT VALUE STARTS
	function redirect_and_get_parent_value()
	{
		switch(CL)
		{
			case 28:
			return'retrieve/?class=27&action=retrieving&ref_id=default&ref_menu=default';
			break;
			case 35:
			return'retrieve/?class=27&action=retrieving&ref_id=default&ref_menu=default';
			break;
			case 37:
			return'retrieve/?class=23&action=retrieving&ref_id=default&ref_menu=default';
			break;
			case 39:
			return'retrieve/?class=38&action=retrieving&ref_id=default&ref_menu=default';
			break;
			case 50:
			return'?class=default&action=retrieving&ref_id=default&ref_menu=default';
			break;
			default:
			{
			return'../dashboard.php?class=2&action=retrieving&ref_id=default&ref_menu=default';
			}
		}
	}
	//METHOD FOR GETTING PARENT VALUE ENDS
	function classe_name($name,$css_class,$range,$pkfld,$database,$table)
	{
		if(AC!='edit')
		{   
			$this->_value='';
			$class_num='
			<select id="num_id" style="width:100px;">
			<option value="">--Sel Num</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			</select>&nbsp;
			<select id="alphabet_id" style="width:100px;" onchange="return show_class_name_1(this);">
			<option value="">--Sel Lettre</option>
			<option value="none">Aucune</option>
			<option value="a">A</option>
			<option value="b">B</option>
			<option value="c">C</option>
			<option value="d">D</option>
			<option value="e">E</option>
			<option value="f">F</option>
			<option value="g">G</option>
			<option value="h">H</option>
			<option value="i">I</option>
			<option value="j">J</option>
			<option value="k">K</option>
			<option value="l">L</option>
			<option value="o">O</option>
			<option value="p">P</option>
			<option value="q">Q</option>
			<option value="r">R</option>
			<option value="s">S</option>
			<option value="t">T</option>
			<option value="u">U</option>
			<option value="v">V</option>
			<option value="w">W</option>
			<option value="y">Y</option>
			<option value="z">Z</option>
			</select>&nbsp;<div id="nom_classe"></div>';
		}else
		{   $this->q_dr=$database=mysql_query("select * from  ".$table."  where ".$pkfld."='".ID."'") or die("Query Failed".mysql_error());           
		    $this->row=mysql_fetch_array($this->q_dr);
			$this->_value=$this->row[$range-1];
			$class_num=num_classe(AC,$this->_value).'&nbsp;'.classe_alphabet(AC,$this->_value).'<div id="nom_classe"></div>';
			
			
		}
		return $class_num; 
		#return'<input type="text" name="'.$name.'" value="'.$this->_value.'" class="'.$css_class.'"/>';
	}
	function textbox($name,$css_class,$range,$pkfld,$database,$table)
	{
		if(AC!='edit')
		{   
			$this->_value='';
		}else
		{   $this->q_dr=$database=mysql_query("select * from  ".$table."  where ".$pkfld."='".ID."'") or die("Query Failed".mysql_error());           
		    $this->row=mysql_fetch_array($this->q_dr);
			$this->_value=$this->row[$range-1];
			
		}
		return'<input type="text" name="'.$name.'" value="'.$this->_value.'" class="'.$css_class.'"/>';
	}
	function input_file($name,$css_class,$range,$pkfld,$database,$table)
	{
		
		return'<input type="file" name="'.$name.'"  class="'.$css_class.'"/>';
	}
	function void_value($name,$css_class,$range,$pkfld,$database,$table)
	{
		if(AC!='edit')
		{   
			$this->_value=0;
		}else
		{   $this->q_dr=$database=mysql_query("select * from  ".$table."  where ".$pkfld."='".ID."'") or die("Query Failed".mysql_error());           
		    $this->row=mysql_fetch_array($this->q_dr);
			$this->_value=$this->row[$range-1];
			
		}
		return'<input type="text" name="'.$name.'" readonly="readonly" value="'.$this->_value.'" class="'.$css_class.'"/>';
	}
	function user_id($name,$css_class,$range,$pkfld,$database,$table)
	{
		if(AC!='edit')
		{   
			$this->_value=$_SESSION['USER_ID'];
		}else
		{   $this->q_dr=$database=mysql_query("select * from  ".$table."  where ".$pkfld."='".ID."'") or die("Query Failed".mysql_error());           
		    $this->row=mysql_fetch_array($this->q_dr);
			$this->_value=$this->row[$range-1];
			
		}
		return'<input type="hidden" name="'.$name.'" readonly="readonly" value="'.$this->_value.'" class="'.$css_class.'"/>';
	}
	function auto_id($name,$css_class,$range,$pkfld,$database,$table)
	{
		if(AC!='edit')
		{   
			$this->_value='sam'.date('Y').''.rand();
		}else
		{   $this->q_dr=$database=mysql_query("select * from  ".$table."  where ".$pkfld."='".ID."'") or die("Query Failed".mysql_error());           
		    $this->row=mysql_fetch_array($this->q_dr);
			$this->_value=$this->row[$range-1];
			
		}
		return'<input type="text" name="'.$name.'" readonly="readonly" value="'.$this->_value.'" class="'.$css_class.'"/>';
	}
	function time_count($name,$css_class,$range,$pkfld,$database,$table)
	{
		if(AC!='edit')
		{   
			$this->_value='0:0';
		}else
		{   $this->q_dr=$database=mysql_query("select * from  ".$table."  where ".$pkfld."='".ID."'") or die("Query Failed".mysql_error());           
		    $this->row=mysql_fetch_array($this->q_dr);
			$this->_value=$this->row[$range-1];
			
		}
		return'<textarea name="'.$name.'"  id="showtm" readonly="readonly"  class="'.$css_class.'"/>'.$this->_value.'</textarea>';
	}
	function calendar_default($name,$css_class,$range,$pkfld,$database,$table)
	{
		if(AC!='edit')
		{   
			$this->_value='';
		}else
		{   $this->q_dr=$database=mysql_query("select * from  ".$table."  where ".$pkfld."='".ID."'") or die("Query Failed".mysql_error());           
		    $this->row=mysql_fetch_array($this->q_dr);
			$this->_value=$this->row[$range-1];
			
		}
		//exception starts
		if(CL=='received_calls')
		{
			$this->width=286;
		}
		
		else if(CL=='vulnerability')
		{
			$this->width=286;
		}
		else if(CL=='display_1')
		{
			$this->width=286;
		}
		else if(CL=='default')
		{
			$this->width=150;
		}
		else if(CL=='other_statistic')
		{
			$this->width=150;
		}
		else
		{
			$this->width=530;
		}
		//exception ends
		return'<div id="sandbox-container"> <input class="form-control" type="text" name="'.$name.'" value="'.$this->_value.'"/></div>';
										
	}
	function calendar($name,$css_class,$range,$pkfld,$database,$table)
	{
		if(AC!='edit')
		{   
			$this->_value='';
		}else
		{   $this->q_dr=$database=mysql_query("select * from  ".$table."  where ".$pkfld."='".ID."'") or die("Query Failed".mysql_error());           
		    $this->row=mysql_fetch_array($this->q_dr);
			$this->_value=$this->row[$range-1];
			
		}
		//exception starts
	
			$this->width=430;
		
		//exception ends
		return'<input type="text" name="'.$name.'" value="'.$this->_value.'" style="width:'.$this->width.'px;" class="tcal"/>';
	}
	function readonlycalendar($name,$css_class,$range,$pkfld,$database,$table)
	{
		if(AC!='edit')
		{   
			$this->_value=date('Y-m-d');
		}else
		{   $this->q_dr=$database=mysql_query("select * from  ".$table."  where ".$pkfld."='".ID."'") or die("Query Failed".mysql_error());           
		    $this->row=mysql_fetch_array($this->q_dr);
			$this->_value=$this->row[$range-1];
			
		}
		//exception starts
	
			$this->width=430;
		
		//exception ends
		return'<input type="text" name="'.$name.'" value="'.$this->_value.'" readonly class="'.$css_class.'"/>';
	}
	function int_dot($name,$css_class,$range,$pkfld,$database,$table)
	{
		if(AC!='edit')
		{
			$this->_value='';
		}else
		{
			 $this->q_dr=$database=mysql_query("select * from  ".$table."  where ".$pkfld."='".ID."'") or die("Query Failed".mysql_error());           
		    $this->row=mysql_fetch_array($this->q_dr);
			$this->_value=$this->row[$range-1];
		}
		return'<input type="text" name="'.$name.'" value="'.$this->_value.'" class="'.$css_class.'" onKeyPress="return onlyDotsAndNumbers(event)"/>';
	}
	function textarea($name,$css_class,$range,$pkfld,$database,$table)
	{
		if(AC!='edit')
		{
		$this->_value='';	
		}else
		{
			$this->q_dr=$database=mysql_query("select * from  ".$table."  where ".$pkfld."='".ID."'") or die("Query Failed".mysql_error());           
		    $this->row=mysql_fetch_array($this->q_dr);
			$this->_value=$this->row[$range-1];
		}
		return'<textarea type="text" name="'.$name.'" class="'.$css_class.'">'.$this->_value.'</textarea>';
	}

	function dropdownlist($database,$table,$css,$name,$pk,$output,$onchange_submit,$deactivate_search,$width,$onchange_ajax)
	{  
	    $this->tbl=$this->table_name($table,$database);
		if($onchange_submit==1)
		{
			$this->reload_frm='onchange="form.submit();"';
		}
		else
		{
			$this->reload_frm='';
		}
		if($deactivate_search==1)
		{
			$this->dropcss='';
		}else
		{
			$this->dropcss=$css;
		}
		if(CL==78944477)
		{
			$this->extra_option='<option value="all">Tous Les Produits</option>';
		}else
		{
			$this->extra_option='';
		}
		if($onchange_ajax!='')
		{
			$ajax_return='onchange="return '.$onchange_ajax.'(this);"';
		}
		else
		{
			$ajax_return='';	
		}
		//extra option ends
		//config width
		$this->list_header='<select  name="'.$name.'" '.$ajax_return.' class="'.$this->dropcss.'" tabindex="2" style="margin-right:10px;" '.$this->reload_frm.' ><option value="">--Selectionner --</option>'.$this->extra_option;
		$this->list_footer='</select>';
		$this->fk_fld=$this->get_table_column($database,$this->tbl,$pk);
		if(!isset($_GET['read_col'])&&FK!='default'&&$this->onchange_dr!=1)
		{
			
		$this->q_dr=$database=mysql_query("select * from ".$this->tbl." where ".$this->fk_fld."='".FK."'") or die("Query Failed dropdown list".mysql_error());
			//child query
		}else
		{
		$this->q_dr=$database=mysql_query("select * from ".$this->tbl."") or die("Query Failed dropdown list".mysql_error());			    	//parent query
		}
	   
	   $this->list_option='';//void data inclusion
		while($this->row_2=mysql_fetch_array($this->q_dr))
		{
			//data auto select starts
			if(AC!='edit'&&FK!='default'&&$this->onchange_dr==1&&$this->row_2[0]==FK)
			{
				$this->_select='selected';
			}else
			{
				$this->_select='';
			}
			
			if(AC=='edit')
			{
				//get value by id starts
			$this->tbl=$this->table_name(CL,$database);
		    $this->colum_name=$this->get_table_column($database,$this->tbl,1);
			$this->q=$database=mysql_query("select * from ".$this->tbl." where ".$this->colum_name."='".ID."'") or die("Query Failed".mysql_error());
			$this->row=mysql_fetch_array($this->q);
			if($this->row[$name]==$this->row_2[0])
			{
			$this->_select='selected';	
			}else
			{
				$this->_select='';
			}
			//get value by id ends
			}
			//data auto select ends
			$this->list_option.='<option value="'.$this->row_2[0].'" '.$this->_select.'>'.$this->row_2[$output].'</option>';//check out 4 this when it runs
		}
		//exception starts
		return  $this->list_header.$this->list_option.$this->list_footer;
		
		
	}
	
	
	function dropdownlist_grouping($database,$group_table,$option_table,$output_group,$output_option,$css,$ref_fld,$name)
	{
	   $this->list_group='';
	   $this->list_header='<select name="'.$name.'" class="'.$css.'" tabindex="2" style="width:545px;"><option value="">--Selectionner Valeur</option>';
	   $this->list_footer='</select>';
	$this->q=$database=mysql_query("select * from ".$group_table." ") or die("Query Failed".mysql_error());
	while($this->row=mysql_fetch_array($this->q))
	{
		$this->list_group.='<optgroup label="'.$this->row[$output_group].'">'.$this->get_options($database,$option_table,$output_option,$ref_fld,$this->row[0],$name,$this->table_name(CL,$database));
	}
	return  $this->list_header.$this->list_group.$this->list_footer;
     }
	function get_options($database,$option_table,$output_option,$ref_fld,$ref_fld_value,$name,$table)
	{   $this->k=0;
	    $this->list_option=''; 
		$this->quer=$database=mysql_query("select * from ".$option_table." where  ".$ref_fld."='".$ref_fld_value."'") or die("Query Failed".mysql_error());
		$this->count_rows=mysql_num_rows($this->quer);
		while($this->row_2=mysql_fetch_array($this->quer))
		{
			//editing starts
			if(AC=='edit')
			{
			//get value by id starts
		
		    $this->colum_name=$this->get_table_column($database,$table,1);
			$this->requet=$database=mysql_query("select * from ".$table." where ".$this->colum_name."='".ID."'") or die("Query Failed".mysql_error());
			$this->lire=mysql_fetch_array($this->requet);
			if($this->lire[$name]==$this->row_2[0])
			{
			$this->_select='selected';	
			}else
			{
				$this->_select='';
			}
			//get value by id ends
			}
			//editing ends
			
			
			
			$this->k++;
			if($this->k==$this->count_rows)
			{
			$this->list_option.='<option value="'.$this->row_2[0].'" '.$this->_select.'>'.$this->row_2[$output_option].'</option></optgroup>';	
			}else
			{
			$this->list_option.='<option value="'.$this->row_2[0].'" '.$this->_select.'>'.$this->row_2[$output_option].'</option>';
			}
		}
		
		return $this->list_option;
		
	}
	function gender($name,$css_class,$range,$pkfld,$database,$table)
	{
		$this->list_header='<select name="'.$name.'"  class="form-control" tabindex="2"><option value="">--Selectionner Genre</option>';
		$this->array_data=array('Masculin','Feminin');
		$this->list_option='';
		$this->list_footer='</select>';
		$this->i=-1;
		foreach($this->array_data as $this->_val)
		{
		$this->i++;	
		if(AC!='edit')
		{
			$this->_select='';
		}
		else
		{
			$this->q_dr=$database=mysql_query("select * from  ".$table."  where ".$pkfld."='".ID."'") or die("Query Failed".mysql_error());           
		    $this->row=mysql_fetch_array($this->q_dr);
			if($this->_value=$this->row[$range-1]==$this->array_data[$this->i])
			{
				$this->_select='selected';
			}
			else
			{
				$this->_select='';
			}
			
		}
		$this->list_option.='<option value="'.$this->array_data[$this->i].'" '.$this->_select.'>'.$this->array_data[$this->i].'</option>';
		}
		return $this->list_header.$this->list_option.$this->list_footer;
	}
	function login_designation($name,$css_class,$range,$pkfld,$database,$table)
	{
		$this->list_header='<select name="'.$name.'"  class="form-control"><option value="">--Selectionner Designation</option>';
		$this->array_data=array('admin','directeur','reception','financier','caissier_entree','caissier_sortie');
		$this->list_option='';
		$this->list_footer='</select>';
		$this->i=-1;
		foreach($this->array_data as $this->_val)
		{
		$this->i++;	
		if(AC!='edit')
		{
			$this->_select='';
		}
		else
		{
			$this->q_dr=$database=mysql_query("select * from  ".$table."  where ".$pkfld."='".ID."'") or die("Query Failed".mysql_error());           
		    $this->row=mysql_fetch_array($this->q_dr);
			if($this->_value=$this->row[$range-1]==$this->array_data[$this->i])
			{
				$this->_select='selected';
			}
			else
			{
				$this->_select='';
			}
			
		}
		$this->list_option.='<option value="'.$this->array_data[$this->i].'" '.$this->_select.'>'.$this->array_data[$this->i].'</option>';
		}
		return $this->list_header.$this->list_option.$this->list_footer;
	}
}
/*class for affecting the database starts*/
class db_affecting extends open_gate
{
	private $fld,$input_fld,$save,$pk,$edited_fld,$onchange,$upload_field,$array_valuez,$x;
	function sqlactions($table,$action,$url,$database)
	{
		$this->q=$database=mysql_query("show columns from ".$table."") or die("Query Failed".mysql_error());
		$this->i=0;
		$this->fld='';
		$this->input_fld='';
		$this->edited_fld='';
		while($this->row=mysql_fetch_array($this->q))
		{
			$this->i++;
			if($this->i==1)
			{
			$this->pk=$this->row[0];//skipp primary key
			}
			else if(isset($_SESSION['UPLOAD_FILE'])&& $this->i==$_SESSION['UPLOAD_FILE'])
			{
			$this->upload_field=$this->row[0];	
			continue;
			}
			//** updated by GuyL**//
			/*else if(isset($_SESSION['UPLOAD_FILE_update'])&& $this->i==$_SESSION['UPLOAD_FILE_update'])
			{
			$this->upload_field=$this->row[0];	
			continue;
			}*/
			//** END**//

			else
			{
			$this->fld.=$this->row[0].',';
			//check if there is a checkbox starts
			if(is_array($_POST[$this->row[0]]))
			{
				$this->array_valuez='';
				for($this->x=0; $this->x<count($_POST[$this->row[0]]); $this->x++)
				{
					$this->array_valuez.=$_POST[$this->row[0]][$this->x].',';
				}
				$this->array_valuez=strrev($this->array_valuez); $this->array_valuez=substr($this->array_valuez,+1);
				$this->array_valuez=strrev($this->array_valuez);
			$this->input_fld.="'".$this->array_valuez."',";
			$this->edited_fld.=$this->row[0]."='".$this->array_valuez."',";
			}else
			{
			// check if there is a checkbox ends
			$this->input_fld.="'".mysql_real_escape_string(strip_tags(htmlentities(stripslashes($_POST[$this->row[0]]))))."',";
			$this->edited_fld.=$this->row[0]."='".mysql_real_escape_string(strip_tags(htmlentities(stripslashes($_POST[$this->row[0]]))))."',";
			}
			}
			//onchange fieldname starts
			if(isset($_SESSION['ONCHANGE'])&&$this->i==$_SESSION['ONCHANGE'])
			{
				$this->onchange=$this->row[0];
			}
			//on change field name ends
	
		}
		$this->fld=strrev(substr(strrev($this->fld),+1));
		$this->input_fld=strrev(substr(strrev($this->input_fld),+1));
		$this->edited_fld=strrev(substr(strrev($this->edited_fld),+1));
		//redirect back onchange starts
		if(isset($_SESSION['ONCHANGE'])&&!isset($_POST['executer__btn']))
		{
		unset($_SESSION['ONCHANGE']);//disable session onchange
		header('location:../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu='.$_POST[$this->onchange].'');
		}
		//redirect back on change
		switch($action)
		{
		case'default':
		if(isset($_SESSION['UPLOAD_FILE'])and basename($_FILES[$this->upload_field]['name'])!='')
		{   
		
			$extension=$_FILES[$this->upload_field]['type']; 
			$rd2 = mt_rand(1000,9999)."_File";  
            $filename = basename($_FILES[$this->upload_field]['name']);
            $ext = substr($filename, strrpos($filename, '.') + 1);
            $newname="../data_buddle/".$rd2.'_'.$filename;
            if(isset($_SESSION['UPLOAD_FILE2']))
            {
            $img_src='<a href="#_src'.str_replace('../','',$newname).'" target="_blank"><button type="button" class="btn btn-success">Telecharger Fichier</button></a>';	
            }else
            {
			$img_src='<img src="#_src'.str_replace('../','',$newname).'" width="#_width" height="#_height">';
			}
			move_uploaded_file($_FILES[$this->upload_field]['tmp_name'],$newname);
		    $this->q=$database=mysql_query("insert into ".$table." (".$this->fld.','.$this->upload_field.") values (".$this->input_fld.",'".$img_src."')") or die("Query Failed Saving Record".mysql_error());
			
		
			 
		}
		//** updated by GuyL**//
		/*if(isset($_SESSION['UPLOAD_FILE_update'])and basename($_FILES[$this->upload_field]['name'])!='')
		{   
		
			$extension=$_FILES[$this->upload_field]['type']; 
			$rd2 = mt_rand(1000,9999)."_File";  
            $filename = basename($_FILES[$this->upload_field]['name']);
            $ext = substr($filename, strrpos($filename, '.') + 1);
            $newname="../data_buddle/".$rd2.'_'.$filename;
            if(isset($_SESSION['UPLOAD_FILE2']))
            {
            $img_src='<a href="#_src'.str_replace('../','',$newname).'" target="_blank"><button type="button" class="btn btn-success">Telecharger Fichier</button></a>';	
            }else
            {
			$img_src='<img src="#_src'.str_replace('../','',$newname).'" width="#_width" height="#_height">';
			}
			move_uploaded_file($_FILES[$this->upload_field]['tmp_name'],$newname);
		    $this->q=$database=mysql_query("insert into ".$table." (".$this->fld.','.$this->upload_field.") values (".$this->input_fld.",'".$img_src."')") or die("Query Failed Saving Record".mysql_error());
			
		
			 
		}*/
		//** END**//
		else
		{
		$this->q=$database=mysql_query("insert into ".$table." (".$this->fld.") values (".$this->input_fld.")") or die("Query Failed Saving Record".mysql_error());
		}
		return 1;
		break;
		case'edit':
		if(isset($_SESSION['UPLOAD_FILE'])and basename($_FILES[$this->upload_field]['name'])!='')
		{   
		
			$extension=$_FILES[$this->upload_field]['type']; 
			$rd2 = mt_rand(1000,9999)."_File";  
            $filename = basename($_FILES[$this->upload_field]['name']);
            $ext = substr($filename, strrpos($filename, '.') + 1);
            $newname="../data_buddle/".$rd2.'_'.$filename;
			if(isset($_SESSION['UPLOAD_FILE2']))
            {
            $img_src='<a href="#_src'.str_replace('../','',$newname).'" target="_blank"><button type="button" class="btn btn-success">Telecharger Fichier</button></a>';	
            }else
            {
			$img_src='<img src="#_src'.str_replace('../','',$newname).'" width="#_width" height="#_height">';
			}
			move_uploaded_file($_FILES[$this->upload_field]['tmp_name'],$newname);
		    $this->q=$database=mysql_query("update ".$table." set ".$this->edited_fld.",".$this->upload_field."='".$img_src."'  where ".$this->pk." = '".ID."'") or die("Query Failed Saving Record".mysql_error());
			
		
			 
		}
		//**updated bye guyL**/
		/*elseif(isset($_SESSION['UPLOAD_FILE_update'])and basename($_FILES[$this->upload_field]['name'])!='')
		{   
		
			$extension=$_FILES[$this->upload_field]['type']; 
			$rd2 = mt_rand(1000,9999)."_File";  
            $filename = basename($_FILES[$this->upload_field]['name']);
            $ext = substr($filename, strrpos($filename, '.') + 1);
            $newname="../data_buddle/".$rd2.'_'.$filename;
			if(isset($_SESSION['UPLOAD_FILE2']))
            {
            $img_src='<a href="#_src'.str_replace('../','',$newname).'" target="_blank"><button type="button" class="btn btn-success">Telecharger Fichier</button></a>';	
            }else
            {
			$img_src='<img src="#_src'.str_replace('../','',$newname).'" width="#_width" height="#_height">';
			}
			move_uploaded_file($_FILES[$this->upload_field]['tmp_name'],$newname);
		    $this->q=$database=mysql_query("update ".$table." set ".$this->edited_fld.",".$this->upload_field."='".$img_src."'  where ".$this->pk." = '".ID."'") or die("Query Failed Saving Record".mysql_error());
			
		
			 
		}
*/
		//**END UPDATED**/
		else
		{
		$this->q=$database=mysql_query("update ".$table." set ".$this->edited_fld." where ".$this->pk." = '".ID."'") or die("Query Failed Altering Record".mysql_error());
		}
		return 1;
		break;	
		case'delete':
		$this->q=$database=mysql_query("delete from ".$table."  where ".$this->pk." = '".ID."'");# or die("Query Failed Deleting Record".mysql_error());
		if($this->q==true)
		{
		return 1;
		}else
		{
			//it's an index foreign key
			return 0;
		}
		break;	
		default:
		{
			print'unknown error';
		}
		}
	}
}
/* class for affecting the database ends*/
/* class retrieving record starts*/
class retrieve_record extends open_gate
{  
   
	private $header,$header_content,$footer,$data_content,$pk,$array_data,$r,$read_data,$read_fk,$arr_value,$incr,$arrayfkeysexp,$columnfl,$rt_q,$rt_row,$plus_plus,$_vl,$ForeignKeysArray,$count_r,$fk_tbl,$fk,$output_fk,$rd_fk,$rd_q,$rd_row,$action_btn,$action_btn_e,$manipilators,$pager,$ras,$limiter,$big_query,$div_pag;
	private $extra_link,$reader_output_fk;
	
	function show_record($header,$header_content,$header_close,$footer,$database,$table,$extra_btn,$delimiter_int,$delimiter_app,$ForeignKeysArray,$reference,$sys_tbl,$src_btn_page,$action_width)
	{   $this->j=0;
		$this->q=$database=mysql_query("show columns  from ".$table."") or die("Query Failed by showing column list".mysql_error());
		$this->header_content='';
		$this->data_content='';
		$this->array_data='';
		while($this->row=mysql_fetch_array($this->q))
		{
			$this->j++;
			if($this->j==1)
			{
				$this->pk=$this->row[0];
				continue;
			}
			elseif($this->j>$delimiter_int&&$delimiter_app==1)
			{
				
					//skipp columns
					continue;
				
			}else
			{
			$this->header_content.=str_replace('00',' /',str_replace('666',"'",(str_replace('__',' ',(str_replace('_id','',(str_replace('#_table_header_content',$this->row[0],$header_content))))))));	
			}
			$this->array_data.='array,';
		}
		$this->array_data=strrev(substr(strrev($this->array_data),+1));
		$this->big_query="select * from ".$table." ".$reference."";
		$this->pager=new PS_Pagination($database,$this->big_query,system_info(12,db_connection(),$sys_tbl),system_info(13,db_connection(),$sys_tbl));
		$this->ras=$this->pager->paginate();
		if($this->ras==false)
			{
		exit();//the process is stopped because there is nothing found in the table
			}
			else
			{
			}
		
		#$this->q=$database=mysql_query("select * from ".$table." ".$reference."") or die("Query Failed retrieve rcd".mysql_error());
		while($this->row=mysql_fetch_array($this->ras))
		{
		if(isset($_GET['read_col']))
	    {
		$this->extra_link='&read_col='.$_GET['read_col'].'';
     	}else
		{
		    $this->extra_link='';
		} 
			####################BUTTTONSSS################################################
				if(CL==21)
				{
					if($_SESSION['DESIGNATION']!='admin')
					{
						$this->manipilators='';
					}else
					{
						$this->manipilators='<a href="creer_compte_enseignant.php?id='.$this->row['enseignant_id'].'&action=edit" rel="facebox" ><button class="btn btn-success">Ed</button></a>&nbsp;<a href="?class='.CL.'&action=delete_confirm&ref_id='.$this->row[$this->pk].'&ref_menu=default" ><button class="btn btn-danger">Del</button></a>';
					}
				}
				else if(CL==3)
				{
				$this->manipilators='<a href="'.$src_btn_page.'?class='.CL.'&action=edit&ref_id='.$this->row[$this->pk].'&ref_menu='.$_GET['ref_menu'].$this->extra_link.'" ><button class="btn btn-success">Ed</button></a>';	
				}else
				{
					$this->manipilators='<a href="'.$src_btn_page.'?class='.CL.'&action=edit&ref_id='.$this->row[$this->pk].'&ref_menu='.$_GET['ref_menu'].$this->extra_link.'" ><button class="btn btn-success">Ed</button></a>&nbsp;<a href="?class='.CL.'&action=delete_confirm&ref_id='.$this->row[$this->pk].'&ref_menu=default" ><button class="btn btn-danger">Del</button></a>';
				}
					
					
			####################BUTTTONSSS################################################
			//set session existance starts
			if(isset($_SESSION['READFK']))
			{
				$this->read_fk='#_'.str_replace('#_readfk','',$_SESSION['READFK']);
			}else
			{
				$this->read_fk=0;
			}
			//button action sett starts
			if(FK=='pdf')
			{
				$this->action_btn='';
			}else	
			{
				$this->reader_output_fk=str_replace('#_','',$this->read_fk);
				$this->action_btn='<td style="width:'.$action_width.'px;">'.$this->manipilators.str_replace('read_col='.$this->reader_output_fk.'','read_col='.$this->row[$this->reader_output_fk].'',str_replace('#_readfk','',str_replace('#_activite','',str_replace('#_fk',$this->row[$this->pk],(str_replace($this->read_fk,$this->row[$this->reader_output_fk],(str_replace('#_id',$this->row[$this->pk],$extra_btn)))))))).'</td>';
					
				
			}
			//button action sett ends
			
			//set session ends
			//exception starts
		
			$this->data_content.='<tr>'.$this->read_data($this->row[$this->pk],$table,$this->array_data,$database,$this->pk,$delimiter_int,$delimiter_app,$ForeignKeysArray).$this->action_btn.'</tr>';
			
			
		}
	
				$this->div_pag='<div style="text-align:center; background-color:white;" class="pagination">'.$this->pager->renderFullNav().'</div>';
		
		 $this->read_data($this->row[$this->pk],$table,$this->array_data,$database,$this->pk,$delimiter_int,$delimiter_app,$ForeignKeysArray); 
		 return str_replace('#_height',50,str_replace('#_width',50,str_replace('#_srcdata_buddle','../data_buddle',$header.$this->header_content.$header_close.$this->data_content.$footer.$this->div_pag)));
	}
	function read_data($id,$table,$data_array,$database,$pkfld,$delimiter_int,$delimiter_app,$ForeignKeysArray)
	{
	$this->j=0;
	$this->read_data='';
	$this->r=$database=mysql_query("select * from ".$table." where ".$pkfld."='".$id."'") or die("Query Failed reading data".mysql_error());
	$this->row=mysql_fetch_array($this->r);
	$this->_explode=explode(',',$data_array);
	for($this->i=0; $this->i<count($this->_explode);$this->i++)
	{
		$this->j++;
		//read foreign keys table starts
		$this->rt_q=$database=mysql_query("select * from ".$ForeignKeysArray." where foreign__key='".$this->_columnfk($table,$database,$this->j)."'") or die("Query Failed reading fk".mysql_error());
		$this->count_r=mysql_num_rows($this->rt_q);
		$this->rd_fk=mysql_fetch_array($this->rt_q);
		if($this->count_r>=1)
		{
			$this->fk_tbl=$this->rd_fk[2];//table
			$this->output_fk=$this->rd_fk[3];//outputfk
			$this->fk=$this->rd_fk[1];
			$this->read_data.='<td>'.$this->reading_fk_value($database,$this->fk_tbl,$this->fk,$this->row[$this->j],$this->output_fk).'</td>';
		}
		//read foreign keys table ends
		//read normal field starts
		else
		{
			$this->read_data.='<td>'.$this->row[$this->j].'</td>';
		}
		//read normal field ends
		
		
		
	}
	return $this->read_data;
	}
	function _columnfk($table,$database,$range)
	{
	
	//get column name starts
		$this->plus_plus=-1;
		
		$this->rt_q=$database=mysql_query("show columns from ".$table."") or die("Query Failed getting fk".mysql_error());
		
		while($this->rt_row=mysql_fetch_array($this->rt_q))
		{
		$this->plus_plus++;
		
		if($this->plus_plus==$range)
		{
		$this->_vl=$this->rt_row[0];	
		}
		
		
		}
		return $this->_vl;
		//get column name ends
	
	}
	//end columnfk
	function reading_fk_value($database,$table,$fk,$value,$redfld)
	{
	$this->tbl=$this->table_name($table,$database);
	$this->rd_q=$database=mysql_query("select * from ".$this->tbl." where ".$fk."='".$value."'") or die("Query Failed reading fk".mysql_error());
	$this->rd_row=mysql_fetch_array($this->rd_q);
	#return $this->rd_row[$output];
	#return $value;
	$my_value=$value;
	$explode=explode(',',$my_value);
	$output='';
	for($a=0; $a<count($explode); $a++)
	{
		$this->rd_q=$database=mysql_query("select * from ".$this->tbl." where ".$fk."='".$explode[$a]."'") or die("Query Failed reading fk".mysql_error());
	$this->rd_row=mysql_fetch_array($this->rd_q);
	$output.=$this->rd_row[$redfld].',';
	}
	return strrev(substr(strrev($output),1));
	}
}
/*class retrieving record ends*/
class _detail extends open_gate
{
private $det_query,$table_middle,$fk_table,$fk_query,$fk_row,$check_fk;
function reading_row($database,$table,$reference,$output)
{
	$this->q=$database=mysql_query("select * from ".$this->table_name($table,$database)." ".$reference."") or die("Query Failed".mysql_error());
	$this->row=mysql_fetch_array($this->q);
	return $this->row[$output];
	
}
function reading_detail($database,$table,$table_header,$table_footer,$reference,$fk_table)
{
$this->j=0;
$this->table_middle='';
$this->det_query=$database=mysql_query("show columns from ".$this->table_name($table,$database)."") or die("Query Failed".mysql_error());
while($this->row=mysql_fetch_array($this->det_query))
{
	$this->j++;
	if($this->j==1)
	{
		continue;
	}else
	{
		$this->fk_query=$database=mysql_query("select * from ".$fk_table." where foreign__key='".$this->row[0]."'") or die("Query Failed".mysql_error());
		$this->check_fk=mysql_num_rows($this->fk_query);
		$this->fk_row=mysql_fetch_array($this->fk_query);
		if($this->check_fk>=1)
		{    $this->fk_table=$this->table_name($this->fk_row[2],$database);
			//read foreign keys
			$this->table_middle.='<tr><td style="text-transform:capitalize">'.str_replace('00','/',str_replace('666',"'",str_replace('_id',' ',str_replace('__',' ',$this->row[0])))).'</td> <td>'.foreign_value(" where ".$this->fk_row[1]."='".$this->reading_row($database,$table,$reference,$this->row[0])."'",$this->fk_table,($this->fk_row[3]+1),$database).'</td></tr>';
			
		}else
		{
			//read normal field
			if($this->row[0]=='tranche__age__appelant'||$this->row[0]=='tranche__age__auteur'||$this->row[0]=='tranche__age__enfant')
			{
					$this->table_middle.='<tr><td style="text-transform:capitalize">'.str_replace('666',"'",str_replace('_id',' ',str_replace('__',' ',$this->row[0]))).'</td> <td>'.foreign_value('where tranche__d666__age_id='.$this->reading_row($database,$table,$reference,$this->row[0]).' ','tbl__13tranche__d666__age',2,$database).'</td></tr>';
			}else
			{
					$this->table_middle.='<tr><td style="text-transform:capitalize">'.str_replace('666',"'",str_replace('_id',' ',str_replace('__',' ',$this->row[0]))).'</td> <td>'.$this->reading_row($database,$table,$reference,$this->row[0]).'</td></tr>';
			}
		
			
		}
		
	}
}
return $table_header.$this->table_middle.$table_footer;
}

}
##############################################################CUSTOMIZED TAB FOR STARTS###############################################
class customized_tab_form extends form_generator
{
	private $hcontent,$fcontent,$q_tab_h,$row_tab_h,$q_tab_f,$row_tab_f,$fld_list,$from,$to,$aa,$input,$qq,$rr,$jj,$inpname,$inputs,$qqq,$rrr,$pk_field,$max_q,$max_r,$submit_btn,$table__field_id,$foreign__table__index,$primary__key,$output__range__field__array__index,$onchange,$dr_query,$dr_row,$drop_tbl,$label,$group_tbl,$width,$ajax_func;

function get_tab_header($header,$hheader,$hcontent,$hfooter,$footer,$database,$table,$tab_table,$fields_table,$fheader,$fcontent,$ffooter,$input,$css,$submit_btn,$drop_tbl,$group_tbl)
	{   $this->hcontent='';
	$this->fcontent='';
	$this->j=0;
	$this->i;
		$this->tbl=$this->table_name($tab_table,$database);
		$this->q_tab_h=$database=mysql_query("select * from ".$this->tbl." where table__index='".$table."'") or die ("Query Failed tab header".mysql_error());
		while($this->row_tab_h=mysql_fetch_array($this->q_tab_h))
		{
			$this->j++;
			$this->hcontent.=str_replace('#_title',$this->row_tab_h[1],str_replace('#_step',$this->j,$hcontent));
		}
	 return $header.$hheader.$this->hcontent.$hfooter.$this->get_tab_form($fheader,$fcontent,$ffooter,$database,$table,$tab_table,$fields_table,$input,$css,$submit_btn,$drop_tbl,$group_tbl).$footer;#$header.$this->content.$footer;
	}
	function get_tab_form($fheader,$fcontent,$ffooter,$database,$table,$tab_table,$fields_table,$input,$css,$submit_btn,$drop_tbl,$group_tbl)
	{
		$this->tbl=$this->table_name($tab_table,$database);
		$this->q_tab_f=$database=mysql_query("select * from ".$this->tbl." where table__index='".$table."'") or die ("Query Failed tab header".mysql_error());
		while($this->row_tab_f=mysql_fetch_array($this->q_tab_f))
		{
			$this->i++;
			$this->fld_list=$this->row_tab_f[3];
			$this->from=$this->row_tab_f[4];
			$this->to=$this->row_tab_f[5];
			$this->fcontent.=str_replace('#_input',$this->getting_input_name($database,$table,$fields_table,$this->from,$this->to,$input,$css,$submit_btn,$drop_tbl,$group_tbl),str_replace('#_title',$this->row_tab_f[1],str_replace('#_step',$this->i,$fcontent)));
		}
		return $fheader.$this->fcontent.$ffooter;
	}
	
	function getting_input_name($database,$table,$fields_table,$from,$to,$input,$css,$submit_btn,$drop_tbl,$group_tbl)
	{
	$this->jj=0;
	$this->inputs='';
	$this->tbl=$this->table_name($table,$database);
	$this->qq=$database=mysql_query("show columns from ".$this->tbl."") or die("Query Failed, columns".mysql_error());	 
	while($this->rr=mysql_fetch_array($this->qq))
	{
		$this->jj++;
		if($this->jj==1)
		{
			$this->pk_field=$this->rr[0];
		continue;//skipp primary key	
		}
		if($this->jj>=$from && $this->jj<=$to)
		{
		//find field index starts
		$this->tbl=$this->table_name($fields_table,$database);
		$this->max_q=$database=mysql_query("select * from ".$this->tbl." where table__index='".$table."'") or die("Query Failed".mysql_error());
		$this->max_r=mysql_num_rows($this->max_q)+1;
		$this->qqq=$database=mysql_query("select * from ".$this->tbl." where table__index='".$table."' and fld__range__regard__interface__form='".$this->jj."'") or die("Query Failed".mysql_error());
		$this->rrr=mysql_fetch_array($this->qqq);
		/*
		if($this->jj==$this->max_r)
		{  
		//get button start
			#$this->inputs.=$submit_btn;
			//get button starts
		}*/
		//label starts
		$this->label= str_replace('sous_','',str_replace('666',"'",str_replace('_id','',str_replace('00','/',str_replace('__',' ',$this->rr[0])))));
		//label ends
		if($this->rrr[3]==1)
		{  
		///simple text box starts
		   if($this->jj==$this->max_r)
		   {
			   $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->textbox($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input)).$submit_btn;
		    }else
			{
				$this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->textbox($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input));
			}
			///simple text box ends
			
		}		
		elseif($this->rrr[3]==2)
		{   //simple textarea starts
		    if($this->jj==$this->max_r)
		   {
			$this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->textarea($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input)).$submit_btn;
		   }else
		   {
			   $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->textarea($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input));
		   }
		   //simple textarea ends
		}
		elseif($this->rrr[3]==3)
		{  
		   //int_and decimal number starts
			if($this->jj==$this->max_r)
		   {
			$this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->int_dot($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input)).$submit_btn;
		   }else
		   {
			   $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->int_dot($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input));
		   }
		    //int_and decimal number ends
		}
		elseif($this->rrr[3]==4)
		{   //simple gender starts
			 if($this->jj==$this->max_r)
		   {
			$this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->gender($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input)).$submit_btn;
		   }else
		   {
			   $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->gender($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input));
		   }
		   //simple gender starts
		}
		elseif($this->rrr[3]==5)
		{  //textbox reader starts
			 if($this->jj==$this->max_r)
		   {
			   $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->textbox_read($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input)).$submit_btn;
		   }else
		   {
			   $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->textbox_read($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input));
		   }
		    //textbox reader starts
		}
		elseif($this->rrr[3]==6)
		{   
		//calendar starts
		   if($this->jj==$this->max_r)
		   {
			$this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->calendar($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input)).$submit_btn;
		   }else
		   {
			   $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->calendar($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input));
		   }
		   //calendar ends
		}
		
		elseif($this->rrr[3]==7)
		{
			//dropdown list starts
			
			$this->drop_tbl=$this->table_name($drop_tbl,$database);
			
			$this->colum_name=foreign_value("where table__field_id='".$this->rrr[0]."'",$this->table_name($fields_table,$database),3,$database);
			
			$this->width=foreign_value("where table__field_id='".$this->rrr[0]."'",$this->drop_tbl,8,$database);
			$this->ajax_func=foreign_value("where table__field_id='".$this->rrr[0]."'",$this->drop_tbl,9,$database);
			$this->dr_query=$database=mysql_query("select * from ".$this->drop_tbl." where  	table__field_id='".$this->rrr[0]."' ") or die("Query Failed".mysql_error());
			$this->dr_row=mysql_fetch_array($this->dr_query);
			if($this->jj==$this->colum_name)
			{
				 if($this->jj==$this->max_r)
		         {
					 
				$this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->dropdownlist($database,$this->dr_row[2],$css,$this->rr[0],$this->dr_row[3],$this->dr_row[4],$this->dr_row[5],$this->dr_row[6],$this->width,$this->ajax_func),$input)).$submit_btn;
					
				 }else
				 {   
				 
					 $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->dropdownlist($database,$this->dr_row[2],$css,$this->rr[0],$this->dr_row[3],$this->dr_row[4],$this->dr_row[5],$this->dr_row[6],$this->width,$this->ajax_func),$input));
					 
				 }
			}
			
			//dropdown list ends dropdownlist_grouping($database,$group_table,$option_table,$output_group,$output_option,$css)
			#$this->dropdownlist(
			
			
		}
		elseif($this->rrr[3]==8)
		{   
			//group starts
			$this->group_tbl=$this->table_name($group_tbl,$database);
			$this->colum_name=foreign_value("where table__field_id='".$this->rrr[0]."'",$this->table_name($fields_table,$database),3,$database);
			$this->dr_query=$database=mysql_query("select * from ".$this->group_tbl." where  	table__field_id='".$this->rrr[0]."' ") or die("Query Failed".mysql_error());
			$this->dr_row=mysql_fetch_array($this->dr_query);
			if($this->jj==$this->colum_name)
			{
				 if($this->jj==$this->max_r)
		         {
				$this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->dropdownlist_grouping($database,$this->dr_row[2],$this->dr_row[3],$this->dr_row[4],$this->dr_row[5],$css,$this->dr_row[6],$this->rr[0]),$input)).$submit_btn;
				 }else
				 {
					 
					  $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->dropdownlist_grouping($database,$this->dr_row[2],$this->dr_row[3],$this->dr_row[4],$this->dr_row[5],$css,$this->dr_row[6],$this->rr[0]),$input));
					 
					
				 }
			}
		}
		else if($this->rrr[3]==9)
		{
			 if($this->jj==$this->max_r)
		   {
			   $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->list_yes_no($this->rr[0],$css,'',$database,$this->table_name($table,$database),'Oui','Non',0,$this->rrr[4]),$input)).$submit_btn;
		   }
		   else
		   {
			   $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->list_yes_no($this->rr[0],$css,'',$database,$this->table_name($table,$database),'Oui','Non',0,$this->rrr[4]),$input)); 
		   }

			
		}
		else if($this->rrr[3]==10)
		{  
		///simple void value starts
		   if($this->jj==$this->max_r)
		   {
			   $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->void_value($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input)).$submit_btn;
		    }else
			{
				$this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->void_value($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input));
			}
			///simple text box ends
			
		}	
		
		else if($this->rrr[3]==12)
		{  
		///simple user_id starts
		   if($this->jj==$this->max_r)
		   {
			   $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->user_id($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input)).$submit_btn;
		    }else
			{
				$this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->user_id($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input));
			}
			///simple text box ends
			
		}	
		else if($this->rrr[3]==15)
		{  
		///simple user_id starts
		   if($this->jj==$this->max_r)
		   {
			   $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->auto_id($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input)).$submit_btn;
		    }else
			{
				$this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->auto_id($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input));
			}
			///simple text box ends
			
		}	
		
		else if($this->rrr[3]==16)
		{  
		///simple user_id starts
		   if($this->jj==$this->max_r)
		   {
			   $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->time_count($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input)).$submit_btn;
		    }else
			{
				$this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->time_count($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input));
			}
			///simple text box ends
			
		}
		else if($this->rrr[3]==17)
		{  
		///simple user_id starts
		   if($this->jj==$this->max_r)
		   {
			   $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->input_file($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input)).$submit_btn;
			   $_SESSION['UPLOAD_FILE']=$this->jj;
			   //** updated by GuyL**//
			   //$_SESSION['UPLOAD_FILE_update']=$this->jj;
			   //** END**//
		    }else
			{
				$this->inputs.=str_replace('#_label',$this->label,str_replace('#_input',$this->input_file($this->rr[0],$css,$this->jj,$this->pk_field,$database,$this->table_name($table,$database)),$input));
				$_SESSION['UPLOAD_FILE']=$this->jj;
				//** updated by GuyL**//
				//$_SESSION['UPLOAD_FILE_update']=$this->jj;
				//** END**//

			}
			///simple text box ends
			
		}
		//upload file starts
		#return $this->input_file($name,$css_class,$range,$pk_fld,$database,$table);
		//upload file ends
		elseif($this->rrr[3]==19)
		{   
		//ajax Division
		    $this->drop_tbl=$this->table_name($drop_tbl,$database);
			
			$this->colum_name=foreign_value("where table__field_id='".$this->rrr[0]."'",$this->table_name($fields_table,$database),3,$database);
			
			$this->width=foreign_value("where table__field_id='".$this->rrr[0]."'",$this->drop_tbl,8,$database);
			$this->ajax_func=foreign_value("where table__field_id='".$this->rrr[0]."'",$this->drop_tbl,9,$database);
		   if($this->jj==$this->max_r)
		   {
			$this->inputs.=str_replace('#_label',$this->label,str_replace('#_input','<div id="'.$this->rrr[4].'"></div>',$input)).$submit_btn;
		   }else
		   {
			   $this->inputs.=str_replace('#_label',$this->label,str_replace('#_input','<div id="'.$this->rrr[4].'"></div>',$input));
		   }
		   //ajax division
		}	
		
		else
		{
		//comments
		}
		
		}
		
		
	
	}
	#$this->submit_btn=$submit_btn;
	return $this->inputs; #str_replace('_id','',str_replace('00','/',str_replace('666',"'",str_replace('__',' ',$this->inputs))));
}
	
}
##############################################################CUSTOMIZED TAB FOR ENDS#################################################
//class true or false starts
class true_or_false
{
	public function yes_or_not($value)
	{
		if($value==1)
		{
			return 'Oui';
		}
		else
		{
			return 'Non';
		}

	}

}
//class true or false ends

// class accessories starts
class accessories extends open_gate
{ 
private $content;
	function unset_session($session)
	{
		if(isset($_SESSION[$session]))
		{
			unset($_SESSION[$session]);
		}
	}
	function print_get_or_post($property,$type)
{
//if type==1 then we deal with input post
if($type==1)
{
	if(isset($_POST[$property]))
	{
		return $_POST[$property];
	}
	else
	{
		return false;
	}
}
//else if type==2 then we deal with gest
else
{
	if(isset($_GET[$property]))
	{
		return $_GET[$property];
	}
	else
	{
		return false;
	}
}
}
function read_explode_queu($_explode_value,$table,$ref_column,$int_delimiter_fld,$db)
{
	$this->content='';
	$this->_explode=explode(',',$_explode_value);
	for($this->i=0; $this->i<count($this->_explode); $this->i++)
	{
		$this->content.=foreign_value('where '.$ref_column.'="'.$this->_explode[$this->i].'" ',$table,$int_delimiter_fld,$db).',';
	}
	return strrev(substr(strrev($this->content),+1));
}
}

// class accessories ends
?>
