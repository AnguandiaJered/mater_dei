<?php
include('classe_lib.php');
// class table for kindergarten school starts

class kindergarten_statistic extends form_generator 
{
	public $table_header,$table_content,$table_footer,$content,$myq,$myrow,$ench,$privee,$total,$total_sr,$table_total,$total_enc,$qq,$rrow,$content_header,$total_privee,$grand_total,$total_looping;
	function table_one($conn,$division_id)
	{
	$this->table_header='
<table width="100%">
  <tr bgcolor="#E2E9FE">
    <td rowspan="2">Sous - Division</td>
    <td colspan="'.($this->get_sub_regime($conn,1,0)+1).'">NOMBRE D\'ECOLE</td>
  </tr>
  <tr bgcolor="#BFFFCB">
	'.$this->get_sub_regime_header($conn).'
	<td>Total</td>
  </tr>';
  $this->table_footer='</table>';
  $conn=$this->myq=mysql_query("select * from tbl__08sous__division where division_id='".$division_id."' ") or die("Query Failed".mysql_error());
$this->table_content='';
$this->grand_total=0;
  while($this->myrow=mysql_fetch_array($this->myq))
  {
	  $this->grand_total+=+$this->get_sub_regime($conn,'total',$this->myrow[0]);
	  $this->table_content.='<tr>
	<td>'.$this->myrow[2].'</td>'.$this->get_sub_regime($conn,2,$this->myrow[0]).'
	</tr>';  
  }
  $this->table_total='
  <tr>
  <td><strong>Total</strong></td>
  '.$this->total_sub_regime($conn,$division_id).'
  <td>'.$this->grand_total.'</td>
  
  </tr>';
  return $this->table_header.$this->table_content.$this->table_total.$this->table_footer;
		
	
}
	function get_sub_regime($conn,$type,$sous_division_id)
	{
		$this->content='';
		$this->j=0;
		$this->total_sr=0;
		$conn=$this->q=mysql_query("select * from tbl__64sous__regime__de__gestion  ") or die("Query Failed".mysql_error());
		while($this->row=mysql_fetch_array($this->q))
		{
			$this->j++;
			if($type==2||$type=='total')
			{
			$this->total_sr+=+count_rows('where sous__regime__de__gestion_id="'.$this->row[0].'" and sous__division_id="'.$sous_division_id.'"','tbl__14identification__de__l666etablissement__pre__primaire');
			$this->content.='<td>'.count_rows('where sous__regime__de__gestion_id="'.$this->row[0].'" and sous__division_id="'.$sous_division_id.'"','tbl__14identification__de__l666etablissement__pre__primaire').'</td>';	
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
			return $this->content.'<td>'.($this->total_sr).'</td>';
		}
		else if($type=='total')
		{
			return($this->total_sr);
		}
		else
		{
		return $this->content;
		}
	}
	
	function get_sub_regime_header($conn)
	{
		$this->content_header='';
		
		$conn=$this->qq=mysql_query("select * from tbl__64sous__regime__de__gestion  ") or die("Query Failed".mysql_error());
		while($this->rrow=mysql_fetch_array($this->qq))
		{
			
		$this->content_header.='<td>'.$this->rrow[2].'</td>';
			
		}
		
		return $this->content_header;
		
	}
	
	function total_sub_regime($conn,$division_id)
	{
		$this->content_header='';
		
		$conn=$this->qq=mysql_query("select * from tbl__64sous__regime__de__gestion   ") or die("Query Failed".mysql_error());
		while($this->rrow=mysql_fetch_array($this->qq))
		{
			
		$this->content_header.='<td>'.$this->generate_total_loop($conn,$this->rrow[0],$division_id).'</td>';
			
		}
		
		return $this->content_header;
		
	}
	function generate_total_loop($conn,$sub_regime_id,$division_id)
	{
		$this->total_looping=0;
		
		$conn=$this->q=mysql_query("select * from tbl__08sous__division where division_id='".$division_id."' ") or die("Query Failed".mysql_error());
		while($this->row=mysql_fetch_array($this->q))
		{
			
		$this->total_looping+=+count_rows('where sous__regime__de__gestion_id="'.$sub_regime_id.'" and sous__division_id="'.$this->row[0].'"','tbl__14identification__de__l666etablissement__pre__primaire');
			
		}
		
		return $this->total_looping;
		
	}
}
// class table for kindergarten school ends
?>
