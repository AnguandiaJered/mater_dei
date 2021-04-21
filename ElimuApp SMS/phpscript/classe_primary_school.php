<?php
include('classe_lib.php');
// class table for kindergarten school starts

class primary_school_table extends form_generator 
{
	private $trow,$thead,$tfooter,$forme,$total_1,$total_2,$total_3,$total_4,$total_5,$total_6,$total_7,$total_8,$total_footer,$myq,$myrow,$trow_2,$mult,$k,$local,$td,$my_array,$myqq,$myroww,$last_year,$age_31_dec,$g,$f,$g_plus_f;
	function table_one($db,$id)
	{
	$this->thead='<table  width="100%">
	<tr bgcolor="#E2E9FE">
	<th width="50%" align="left"><h3>L\'établissement a-t-il pris en compte ?</h3></th>
	<th align="left"><h3>Enseignés par l\'établissement</h3></th>
	<th align="left"><h3>Forme</h3></th>
	</tr>';
	$this->tfooter='</table>';
	return $this->thead. $this->read_table_one($db,$id).$this->tfooter;

	}

	function read_table_one($db,$id)
	{
	$this->trow='';
    $this->q=mysql_query("select * from tbl__38pris__en__compte") or die("Query Failed".mysql_query());
	while($this->row=mysql_fetch_array($this->q))
	{
	
	$this->forme=foreign_value('where identitification__primaire_id="'.$id.'" and pris__en__compte_id="'.$this->row[0].'"','tbl__42prise__en__compte__des__themes__transverseaux',5,$db);
	$this->trow.='<tr bgcolor="#FFF"><td>'.$this->row[1].'</td><td>'.$this->yes_or_not(foreign_value('where identitification__primaire_id="'.$id.'" and pris__en__compte_id="'.$this->row[0].'"','tbl__42prise__en__compte__des__themes__transverseaux',4,$db)).'</td>
	<td>'.foreign_value('where forme__prise__en__compte_id="'.$this->forme.'" ','tbl__22forme__prise__en__compte',2,$db).'</td><tr>';
	}
	return $this->trow;
	}
	function yes_or_not($value)
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
	function table_two($db,$id)
	{
	$this->thead='<table width="100%" >
  <tr bgcolor="#E2E9FE">
    <td><strong>&nbsp;Année d\'études</strong></td>
    <td><strong>Nombre de classes autorisées</strong></td>
    <td><strong>Nombre de classes organisées</strong></td>
  </tr>';
	$this->trow='';
	$this->total_1=0; $this->total_2=0; 
    $this->q=mysql_query("select * from tbl__46annee__d666etude__primaire") or die("Query Failed".mysql_query());
	while($this->row=mysql_fetch_array($this->q))
	{
		$this->total_1+=+$this->read_table_two($db,$this->row[0],$id,1);
		$this->total_2+=+$this->read_table_two($db,$this->row[0],$id,2);
	$this->trow.='<tr bgcolor="#FFF">
	<td>'.$this->row[1].'</td>
	'.$this->read_table_two($db,$this->row[0],$id,0).'';
	}
	$this->tfooter='
	<tr bgcolor="#FFF">
	<td><strong>Total</strong></td>
	<td>'.$this->total_1.'</td>
	<td>'.$this->total_2.'</td>
	</tr>
	</table>';
	return $this->thead.$this->trow.$this->tfooter;

	}
	
	function read_table_two($db,$anne_id,$school_id,$total)
	{
$this->g=foreign_value('where identitification__primaire_id="'.$school_id.'" and annee__d666etude__primaire_id="'.$anne_id.'"','tbl__47nombre__de__classes__autorisees__classes__organisees',4,$db);
$this->f=foreign_value('where identitification__primaire_id="'.$school_id.'" and annee__d666etude__primaire_id="'.$anne_id.'"','tbl__47nombre__de__classes__autorisees__classes__organisees',5,$db);
if($total<1)
{
	return'<td>'.$this->g.'</td><td>'.$this->f.'</td>';//read the entire row
}
else if($total==1)
{
	return $this->g;//nombre de classe autorisee
}
else if($total==2)
{
	return $this->f;//nombre de classe organisee

}
else
{
	return false;//nothing found
}
	
	}
	function table_three($db,$id)
	{
	$this->thead='<table width="100%">
  <tr bgcolor="#E2E9FE">
    <td width="14%"><strong>N° Ordre Personnel</strong></td>
    <td width="13%"><strong>Nom</strong></td>
    <td width="12%"><strong>Post-Nom</strong></td>
    <td width="15%"><strong>N° Matricule (SECOPE)</strong></td>
    <td width="5%"><strong>Classe d\'affectation</strong></td>
    <td width="5%"><strong>Sexe</strong></td>
    <td width="13%"><strong>Année de naissance</strong></td>
    <td width="4%"><strong>Année d\'engagement</strong></td>
    <td width="6%"><strong>Qualification</strong></td>
    <td width="6%"><strong>Payé ou non payé</strong></td>
    <td width="6%"><strong>Formation continue</strong></td>
  </tr>';
	$this->tfooter='</table>';
	return $this->thead.$this->read_table_three($db,$id).$this->tfooter;

	}
	function read_table_three($db,$id)
	{
	$this->j=0;
	$this->trow='';
    $this->q=mysql_query("select * from tbl__27information__relative__au__personnel__enseignant__pre__pr where identitification__pre__primaire_id='".$id."'") or die("Query Failed".mysql_query());
	while($this->row=mysql_fetch_array($this->q))
	{
	$this->j++;
	
	$this->trow.='<tr bgcolor="#fff">
    <td>'.$this->j.'</td>
    <td>'.$this->row[5].'</td>
    <td>'.$this->row[6].'</td>
    <td>'.$this->row[7].'</td>
    <td>'.foreign_value('where annee__d666etude__maternelle_id="'.$this->row[8].'"','tbl__31annee__d666etude__maternelle',2,$db).'</td>
    <td>'.$this->row[9].'</td>
    <td>'.$this->row[10].'</td>
    <td>'.$this->row[11].'</td>
    <td>'.foreign_value('where qualification_id="'.$this->row[2].'" ','tbl__24qualification',2,$db).'</td>
    <td>'.foreign_value('where type__de__paiement_id="'.$this->row[3].'" ','tbl__25type__de__paiement',2,$db).'</td>
    <td>'.foreign_value('where formation__continue_id="'.$this->row[4].'" ','tbl__26formation__continue',2,$db).'</td>
  </tr>';
	}
	return $this->trow;
	}
	function table_four($db,$id)
	{
	$this->thead='<table width="100%">
  <tr bgcolor="#E2E9FE">
    <td width="14%"><strong>N° Ordre Personnel</strong></td>
    <td width="13%"><strong>Nom</strong></td>
    <td width="12%"><strong>Post-Nom</strong></td>
    <td width="15%"><strong>N° Matricule (SECOPE)</strong></td>
    <td width="5%"><strong>Fonction</strong></td>
    <td width="5%"><strong>Sexe</strong></td>
    <td width="13%"><strong>Année de naissance</strong></td>
    <td width="4%"><strong>Année d\'engagement</strong></td>
    <td width="6%"><strong>Payé ou non payé</strong></td>
	<td width="6%"><strong>Titre scolaire ou academique le plus élevé</strong></td>
    <td width="6%"><strong>Formation continue</strong></td>
  </tr>';
	$this->tfooter='</table>';
	return $this->thead.$this->read_table_four($db,$id).$this->tfooter;

	}
	function read_table_four($db,$id)
	{
	$this->j=0;
	$this->trow='';
    $this->q=mysql_query("select * from tbl__30informations__relatives__au__personnel__administratif__et where identitification__pre__primaire_id='".$id."'") or die("Query Failed".mysql_query());
	while($this->row=mysql_fetch_array($this->q))
	{
	$this->j++;
	
	$this->trow.='<tr bgcolor="#fff">
    <td>'.$this->j.'</td>
    <td>'.$this->row[6].'</td>
    <td>'.$this->row[7].'</td>
    <td>'.$this->row[8].'</td>
    <td>'.foreign_value('where fonction_id="'.$this->row[2].'"','tbl__28fonction',2,$db).'</td>
    <td>'.$this->row[9].'</td>
    <td>'.$this->row[10].'</td>
    <td>'.$this->row[11].'</td>
	 <td>'.foreign_value('where type__de__paiement_id="'.$this->row[3].'" ','tbl__25type__de__paiement',2,$db).'</td>
    <td>'.foreign_value('where titre__scolaire__ou__academique__le__plus__eleve_id="'.$this->row[4].'" ','tbl__29titre__scolaire__ou__academique__le__plus__eleve',2,$db).'</td>
    <td>'.foreign_value('where formation__continue_id="'.$this->row[5].'" ','tbl__26formation__continue',2,$db).'</td>
  </tr>';
	}
	return $this->trow;
	}
	function table_five($db,$id)
	{
	$this->thead='<table width="100%">
  <tr bgcolor="#E2E9FE">
   <td><strong>Type de Manuels</strong></td>
   '.$this->generate_kindergarten_class_header($db,$id).'
   <td><strong>Total</strong></td>
  </tr>';
	$this->tfooter='</table>';
	return $this->thead.$this->read_table_five($db,$id).$this->tfooter;

	}
	function read_table_five($db,$id)
	{
	
	$this->trow='';
    $this->myq=mysql_query("select * from tbl__40type__de__manuels") or die("Query Failed".mysql_query());
	while($this->myrow=mysql_fetch_array($this->myq))
	{
	
	$this->trow.='<tr bgcolor="#fff">
    <td>'.$this->myrow[1].'</td>
	'.$this->generate_kindergarten_class_data($db,$id,$this->myrow[0]).'
	</tr>';
	}
	return $this->trow;
	}
	
	function generate_kindergarten_class_header($db,$id)
	{
	$this->trow='';
    $this->q=mysql_query("select * from tbl__31annee__d666etude__maternelle") or die("Query Failed".mysql_query());
	while($this->row=mysql_fetch_array($this->q))
	{
	$this->trow.='<td><strong>'.$this->row[1].'</strong></td>';
	}
	return $this->trow;
	}
	function generate_kindergarten_class_data($db,$school_id,$manuel_id)
	{
	$this->total_1=0;
	$this->trow_2='';
    $this->q=mysql_query("select * from tbl__31annee__d666etude__maternelle") or die("Query Failed".mysql_query());
	while($this->row=mysql_fetch_array($this->q))
	{
	$this->total_1+=+foreign_value('where annee__d666etude__maternelle_id="'.$this->row[0].'" and identitification__pre__primaire_id="'.$school_id.'" and type__de__manuels_id="'.$manuel_id.'" ','tbl__32nombre__de__manuels__en__bon__etat',5,$db);
	$this->trow_2.='<td>'.foreign_value('where annee__d666etude__maternelle_id="'.$this->row[0].'" and identitification__pre__primaire_id="'.$school_id.'" and type__de__manuels_id="'.$manuel_id.'" ','tbl__32nombre__de__manuels__en__bon__etat',5,$db).'</td>';
	}
	$this->total_footer='<td>'.$this->total_1.'</td>';
	return $this->trow_2.$this->total_footer;
	}
	function table_six($db,$id)
	{
	$this->thead='<table width="100%">
  <tr bgcolor="#E2E9FE">
    <td width="20%" rowspan="3"><strong>Type des locaux</strong></td>
    <td colspan="'.($this->generate_kindergarten_wall_nature($db,$id,1)*2).'"><strong>Caractéristique (Nature) des murs</strong></td>
    <td width="7%" rowspan="3"><strong>Total</strong></td>
    <td rowspan="3"><strong>Dont détruits ou occupés</strong></td>
  </tr>0
   <tr bgcolor="#E6FFF2">
   '.$this->generate_kindergarten_wall_nature($db,$id,2).'
  </tr>
   <tr bgcolor="#FCFFD9">
      '.$this->generate_kindergarten_wall_nature($db,$id,3).'
  </tr>';
	$this->tfooter='</table>';
	return $this->thead.$this->type_locaux($db,$id).$this->tfooter;

	}
	function generate_kindergarten_wall_nature($db,$id,$count)
	{
	$this->j=0;
	$this->trow='';
	$this->trow_2='';
    $db=$this->q=mysql_query("select * from  tbl__33caracteristique__nature__des__murs") or die("Query Failed".mysql_query());
	while($this->row=mysql_fetch_array($this->q))
	{
	$this->j++;
	$this->trow.='<td colspan="2"><strong>'.$this->row[1].'</strong></td>';
	}
	if($count==1)
	{
	return $this->j;//get the weight of the data
	}
	else if($count==2)
	{
	return $this->trow;//reading rows
	}
	else if($count==3)
	{  
		$this->mult=($this->j*2);
		$this->k=0;
		for($this->i=1;$this->i<=$this->mult;$this->i++)
		{
			$this->k++;
			if(($this->k%2)==1)
			{
			$this->trow_2.='<td>Bon état</td>';
			}
			else
			{
		      $this->trow_2.='<td>Mauvais état</td>';
				
			}
		}
		return $this->trow_2;
	}
	}
	function type_locaux($db,$id)
	{
	$this->local='';
	$db=$this->q=mysql_query("select * from  tbl__35type__des__locaux__maternelle") or die("Query Failed".mysql_query());
	while($this->row=mysql_fetch_array($this->q))
	{
	$this->local.='<tr bgcolor="#FFF">
    <td>'.$this->row[1].'</td>
	'.$this->read_table_six($db,$this->row[0],$id).'
	</tr>';
	}
	return $this->local;
	}
	
	function read_table_six($db,$local_id,$school_id)
	{
	$this->td='';
	$this->total_1=0;
	$this->total_2=0;
	$this->total_4=0;
	$this->total_5=0;
	$this->my_array=explode(',',$this->get_tbl_ids($db,'tbl__34etat__des__murs'));
	$db=$this->myq=mysql_query("select * from  tbl__33caracteristique__nature__des__murs") or die("Query Failed".mysql_query());
	while($this->myrow=mysql_fetch_array($this->myq))
	{
	$this->total_1+=+foreign_value('where caracteristique__nature__des__murs_id="'.$this->myrow[0].'" and identitification__pre__primaire_id="'.$school_id.'" and etat_id='.$this->my_array[0].' and type__des__locaux__maternelle_id="'.$local_id.'" ','tbl__36nombre__de__locaux__selon__leurs__caracteristique__et__et',6,$db);
	$this->total_2+=+foreign_value('where caracteristique__nature__des__murs_id="'.$this->myrow[0].'" and identitification__pre__primaire_id="'.$school_id.'" and etat_id='.$this->my_array[1].' and type__des__locaux__maternelle_id="'.$local_id.'" ','tbl__36nombre__de__locaux__selon__leurs__caracteristique__et__et',6,$db);
	$this->total_4+=+foreign_value('where caracteristique__nature__des__murs_id="'.$this->myrow[0].'" and identitification__pre__primaire_id="'.$school_id.'" and etat_id='.$this->my_array[0].' and type__des__locaux__maternelle_id="'.$local_id.'" ','tbl__36nombre__de__locaux__selon__leurs__caracteristique__et__et',7,$db);
	$this->total_5+=+foreign_value('where caracteristique__nature__des__murs_id="'.$this->myrow[0].'" and identitification__pre__primaire_id="'.$school_id.'" and etat_id='.$this->my_array[1].' and type__des__locaux__maternelle_id="'.$local_id.'" ','tbl__36nombre__de__locaux__selon__leurs__caracteristique__et__et',7,$db);
	$this->td.='
	<td>
	
'.foreign_value('where caracteristique__nature__des__murs_id="'.$this->myrow[0].'" and identitification__pre__primaire_id="'.$school_id.'" and etat_id='.$this->my_array[0].' and type__des__locaux__maternelle_id="'.$local_id.'" ','tbl__36nombre__de__locaux__selon__leurs__caracteristique__et__et',6,$db).'
	</td>
	
	<td>
'.foreign_value('where caracteristique__nature__des__murs_id="'.$this->myrow[0].'" and identitification__pre__primaire_id="'.$school_id.'" and etat_id='.$this->my_array[1].' and type__des__locaux__maternelle_id="'.$local_id.'" ','tbl__36nombre__de__locaux__selon__leurs__caracteristique__et__et',6,$db).'
	</td>';
	}
	return $this->td.'
	<td><strong>'.$this->total_3=($this->total_1+$this->total_2).'</strong></td>
	<td><strong>'.$this->total_6=($this->total_4+$this->total_5).'</strong></td>';
	}
	function get_tbl_ids($db,$tbl)
	{
		$this->trow_2='';
		$db=$this->myqq=mysql_query("select * from  ".$tbl."") or die("Query Failed".mysql_query());
	while($this->myroww=mysql_fetch_array($this->myqq))
	{
		$this->trow_2.=$this->myroww[0].',';
	}
return strrev(substr(strrev($this->trow_2),+1));
}

function nouveau_entrant($past_year,$past_year_id,$db,$school_id)
{
	$this->last_year=(substr($past_year,0,4)-1);
	$this->thead='<table width="100%" >
  <tr bgcolor="#E2E9FE">
    <td><strong>&nbsp;Année naissance</strong></td>
    <td><strong>Age au 31/12/'.$this->last_year.'</strong></td>
    <td><strong>G</strong></td>
    <td><strong>F</strong></td>
    <td><strong>G+F</strong></td>
  </tr>';
	
	$this->trow='';
	$this->j=-1;
	$this->total_1=0;
	$this->total_2=0;
	$this->total_3=0;
	$db=$this->q=mysql_query("select * from tbl__43annee__de__naissance where annee__scolaire_id='".$past_year_id."'") or die("Query Failed for nouveau annee naissance primaire".mysql_query());
	while($this->row=mysql_fetch_array($this->q))
	{
		$this->j++;
		$this->total_1+=+$this->read_nouveau_entrant($db,$this->j,$this->row[0],$school_id,1);
		$this->total_2+=+$this->read_nouveau_entrant($db,$this->j,$this->row[0],$school_id,2);
		$this->total_3+=+$this->read_nouveau_entrant($db,$this->j,$this->row[0],$school_id,3);
		$this->trow.='<tr bgcolor="#FFF">
		<td>'.$this->row[2].'</td>
		'.$this->read_nouveau_entrant($db,$this->j,$this->row[0],$school_id,0).'
		</tr>
		';
	}
	$this->tfooter='
	<tr bgcolor="#FFF">
	<td colspan="2"><strong>Total</strong></td>
	<td>'.$this->total_1.'</td>
	<td>'.$this->total_2.'</td>
	<td>'.$this->total_3.'</td>
	</tr>
	</table>';
	return $this->thead.$this->trow.$this->tfooter;
		
}
function read_nouveau_entrant($db,$index,$anne_naiss_id,$school_id,$total)
{
	$this->my_array=explode(',',$this->get_tbl_ids($db,'tbl__44age__au__31dec__annee__passee'));
	$this->age_31_dec='<td>'.foreign_value(' where age__au__31DEC__annee__passee_id="'.$this->my_array[$index].'"','tbl__44age__au__31dec__annee__passee',2,$db).'</td>';
	$this->g=foreign_value(' where identitification__primaire_id="'.$school_id.'" and annee__de__naissance_id="'.$anne_naiss_id.'" and age__au__31DEC__annee__passee_id="'.$this->my_array[$index].'"','tbl__45nouveaux__entrants__en__1ere__annee__par__age__et__sexe',6,$db);
	$this->f=foreign_value(' where identitification__primaire_id="'.$school_id.'" and annee__de__naissance_id="'.$anne_naiss_id.'" and age__au__31DEC__annee__passee_id="'.$this->my_array[$index].'"','tbl__45nouveaux__entrants__en__1ere__annee__par__age__et__sexe',7,$db);
	$this->g_plus_f=($this->g + $this->f);
	if($total<1)
	{
	return $this->age_31_dec.'<td>'.$this->g.'</td><td>'.$this->f.'</td><td>'.$this->g_plus_f.'</td>';//return the whole row
	}
	else if($total==1)
	{
		return $this->g;//return value for garcon
	}
	else if($total==2)
	{
		return $this->f;//return value for fille
	}
	else if($total==3)
	{
		return $this->g_plus_f;//return value for garcon+fille
	}
	else
	{
		return false;//nothing found
	}
}

function effectif_eleve($db,$school_id)
{
	$this->thead='<table width="100%" >
  <tr bgcolor="#E2E9FE">
   <td  rowspan="2">&nbsp;</td>
   '.$this->get_primary_class($db,0,0,$school_id,0).'
    <td colspan="3">Total</td>
  </tr>
  <tr bgcolor="#C7FEDE">
  '.$this->get_primary_class($db,1,0,$school_id,0).'
  <td>G</td><td>F</td><td>G+F</td>
  </tr>';
  $this->tfooter='</table>';
  return $this->thead.$this->get_agement_primary($db,$school_id).$this->tfooter;
}
function get_primary_class($db,$count,$age_id,$school_id,$total)
{   $this->total_1=0;
	$this->total_2=0;
	$this->total_3=0;
	$this->trow='';
	$db=$this->myq=mysql_query("select * from tbl__46annee__d666etude__primaire") or die("Query Failed".mysql_error());
	while($this->myrow=mysql_fetch_array($this->myq))
	{
		if($count<1)
			{
		        $this->trow.='<td colspan="3">'.$this->myrow[1].'</d>';
				 
			}else if($count==1)
			{
				 $this->trow.='<td>G</td><td>F</td><td>G+F</td>';
			}
			else if($count==2)
			{   $this->g=foreign_value(' where identitification__primaire_id="'.$school_id.'" and annee__d666etude__primaire_id="'.$this->myrow[0].'" and age__ecole__primaire_id="'.$age_id.'"','tbl__51effectifs__des__eleves__inscrits__par__sexe__et__annnee',6,$db);
			 $this->f=foreign_value(' where identitification__primaire_id="'.$school_id.'" and annee__d666etude__primaire_id="'.$this->myrow[0].'" and age__ecole__primaire_id="'.$age_id.'"','tbl__51effectifs__des__eleves__inscrits__par__sexe__et__annnee',7,$db);        $this->total_1+=+$this->g;
			 $this->total_2+=+$this->f;
			 $this->total_3=($this->total_1+$this->total_2);
			 $this->trow.='<td>'.$this->g.'</td><td>'.$this->f.'</td><td>'.($this->g+$this->f).'</td>';
			}
	}
	if($count==2)
	{
	$this->total_footer='<td>'.$this->total_1.'</td><td>'.$this->total_2.'</td><td>'.$this->total_3.'</td>';
	}else
	{
		$this->total_footer='';
	}
	return $this->trow.$this->total_footer;
	
}
function get_agement_primary($db,$school_id)
{
	$db=$this->q=mysql_query("select * from tbl__49age__ecole__primaire") or die("Query Failed".mysql_error());
	$this->trow_2='';
	while($this->row=mysql_fetch_array($this->q))
	{
		$this->trow_2.='<tr bgcolor="#FFF"><td>'.$this->row[1].'</td>
		'.$this->get_primary_class($db,2,$this->row[0],$school_id,0).'</tr>';
	}
	$this->total_footer='
	<tr bgcolor="#FFF">
	<td><strong>Total</strong></td>
	<tr>';
	return $this->trow_2.$this->total_footer;
}
}
// class table for kindergarten school ends
?>
