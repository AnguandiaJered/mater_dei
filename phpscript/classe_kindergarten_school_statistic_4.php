<?php
include_once('classe_lib.php');
// class table for kindergarten school starts

class kindergarten_statistic_4 extends form_generator 
{
	public $table_header,$table_content,$table_footer,$content,$myq,$myrow,$ench,$privee,$total,$total_sr,$table_total,$total_enc,$qq,$rrow,$content_header,$total_privee,$grand_total_g,$grand_total_f,$total_looping,$content_2,$_explode,$i,$count_class,$loop_ids,$req,$read,$total_g,$total_f;
	function table_one_4($conn,$division_id)
	{
	$this->table_header='
<table width="100%">
  <tr bgcolor="#E2E9FE">
    <td rowspan="3">Sous - Division</td>
    <td colspan="'.(($this->get_sub_regime($conn,1,0)+1)*2).'">EFFECTIFS SCOLAIRES</td>
  </tr>
  <tr bgcolor="#BFFFCB">
	'.$this->get_sub_regime_header($conn,1).'
	<td colspan="2">Total</td>
  </tr>
   <tr bgcolor="#BFFFCB">
	'.$this->get_sub_regime_header($conn,2).'
	<td>GF</td>
	<td>F</td>
  </tr>';
  $this->table_footer='</table>';
  $conn=$this->myq=mysql_query("select * from tbl__08sous__division where division_id='".$division_id."' ") or die("Query Failed".mysql_error());
$this->table_content='';
$this->grand_total_g=0; $this->grand_total_f=0;
  while($this->myrow=mysql_fetch_array($this->myq))
  {
	  $this->grand_total_g+=+$this->get_sub_regime($conn,'totalg',$this->myrow[0]);
	  $this->grand_total_f+=+$this->get_sub_regime($conn,'totalf',$this->myrow[0]);
	  $this->table_content.='<tr>
	<td>'.$this->myrow[2].'</td>'.$this->get_sub_regime($conn,2,$this->myrow[0]).'
	</tr>';  
  }
  $this->table_total='
  <tr>
  <td><strong>Total</strong></td>
  '.$this->total_sub_regime($conn,$division_id).'
  <td>'.$this->grand_total_g.'</td>
  <td>'.$this->grand_total_f.'</td>
  
  </tr>';
  return $this->table_header.$this->table_content.$this->table_total.$this->table_footer;
		
	
}
	function get_sub_regime($conn,$type,$sous_division_id)
	{
		$this->content='';
		$this->j=0;
		$this->total_g=0; $this->total_f=0;
		$conn=$this->q=mysql_query("select * from tbl__64sous__regime__de__gestion  ") or die("Query Failed".mysql_error());
		while($this->row=mysql_fetch_array($this->q))
		{
			$this->j++;
			if($type==2||$type=='totalg'||$type=='totalf')
			{
			$this->loop_ids=$this->get_tbl_ids($conn,'tbl__14identification__de__l666etablissement__pre__primaire','where sous__regime__de__gestion_id="'.$this->row[0].'" and sous__division_id="'.$sous_division_id.'"');
			$this->total_g+=+($this->get_classe_number($conn,$this->loop_ids,'tbl__27information__relative__au__personnel__enseignant__pre__pr',5,'identitification__pre__primaire_id','sexe','Masculin')+$this->get_classe_number($conn,$this->loop_ids,'tbl__27information__relative__au__personnel__enseignant__pre__pr',6,'identitification__pre__primaire_id','sexe','Feminin'));
			$this->total_f+=+$this->get_classe_number($conn,$this->loop_ids,'tbl__27information__relative__au__personnel__enseignant__pre__pr',6,'identitification__pre__primaire_id','sexe','Feminin');
			//content section starts here
			$this->content.='<td>'.($this->get_classe_number($conn,$this->loop_ids,'tbl__27information__relative__au__personnel__enseignant__pre__pr',5,'identitification__pre__primaire_id','sexe','Masculin')+$this->get_classe_number($conn,$this->loop_ids,'tbl__27information__relative__au__personnel__enseignant__pre__pr',6,'identitification__pre__primaire_id','sexe','Feminin')).'</td>
			<td>'.$this->get_classe_number($conn,$this->loop_ids,'tbl__27information__relative__au__personnel__enseignant__pre__pr',6,'identitification__pre__primaire_id','sexe','Feminin').'</td>';	
			}else
			{
			$this->content.='<td>'.$this->row[2].'</td>';
			}
		}
		if($type==1)
		{
		return $this->j;
		}
		else if($type==2)
		{
			return $this->content.'<td>'.($this->total_g).'</td><td>'.($this->total_f).'</td>';
		}
		else if($type=='totalg')
		{
			return($this->total_g);
		}
		else if($type=='totalf')
		{
			return($this->total_f);
		}
		else
		{
		return $this->content;
		}
	}
	
	function get_sub_regime_header($conn,$type)
	{
		$this->content_header='';
		
		$conn=$this->qq=mysql_query("select * from tbl__64sous__regime__de__gestion  ") or die("Query Failed".mysql_error());
		while($this->rrow=mysql_fetch_array($this->qq))
		{
		if($type==1)
		{
		$this->content_header.='<td colspan="2">'.$this->rrow[2].'</td>';
		}else if($type==2)
		{
			$this->content_header.='<td>GF</td><td>F</td>';
		}
			
		}
		
		return $this->content_header;
		
	}
	
	function total_sub_regime($conn,$division_id)
	{
		$this->content_header='';
		
		$conn=$this->qq=mysql_query("select * from tbl__64sous__regime__de__gestion ") or die("Query Failed".mysql_error());
		while($this->rrow=mysql_fetch_array($this->qq))
		{
			
		$this->content_header.='
		<td>'.($this->generate_total_loop($conn,$this->rrow[0],$division_id,1)+$this->generate_total_loop($conn,$this->rrow[0],$division_id,2)).'</td>
		 <td>'.$this->generate_total_loop($conn,$this->rrow[0],$division_id,2).'</td>';
			
		}
		
		return $this->content_header;
		
	}
	function generate_total_loop($conn,$sub_regime_id,$division_id,$type)
	{
		$this->total_looping=0;
		
		$conn=$this->q=mysql_query("select * from tbl__08sous__division where division_id='".$division_id."' ") or die("Query Failed".mysql_error());
		while($this->row=mysql_fetch_array($this->q))
		{
		$this->loop_ids=$this->get_tbl_ids($conn,'tbl__14identification__de__l666etablissement__pre__primaire','where sous__regime__de__gestion_id="'.$sub_regime_id.'" and sous__division_id="'.$this->row[0].'"');	
		if($type==1)
		{
		$this->total_looping+=+$this->get_classe_number($conn,$this->loop_ids,'tbl__27information__relative__au__personnel__enseignant__pre__pr',5,'identitification__pre__primaire_id','sexe','Masculin');//garcons
		}else if($type==2)
		{
			$this->total_looping+=+$this->get_classe_number($conn,$this->loop_ids,'tbl__27information__relative__au__personnel__enseignant__pre__pr',6,'identitification__pre__primaire_id','sexe','Feminin');//filles
		}
			
		}
		
		return $this->total_looping;
		
	}
	
	function get_tbl_ids($db,$tbl,$ref)
	{
		$this->content_2='';
		$this->j=0;
		$db=$this->req=mysql_query("select * from  ".$tbl." ".$ref."") or die("Query Failed".mysql_query());
	while($this->read=mysql_fetch_array($this->req))
	{
		$this->j++;
		$this->content_2.=$this->read[0].',';
	}
	if($this->j>=1)
	{
return strrev(substr(strrev($this->content_2),+1));
	}
	else
	{
		return 0;
	}
}
function get_classe_number($conn,$explode_id,$tbl,$range,$id_fld,$sex_fld,$sex_value)
{
	$this->_explode=explode(',',$explode_id);
	$this->count_class=0;
	for($this->i=0; $this->i<count($this->_explode); $this->i++)
	{
		$this->count_class+=+somme_value_j('where '.$id_fld.'="'.$this->_explode[$this->i].'" and '.$sex_fld.'="'.$sex_value.'"',$tbl,$range,$conn);
	}
	return $this->count_class;
}
}
// class table for kindergarten school ends

?>

