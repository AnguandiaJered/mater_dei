<?php
include('classe_lib.php');
// class table for kindergarten school starts

class kindergarten_table extends form_generator 
{
	private $trow,$thead,$tfooter,$forme,$total_1,$total_2,$total_3,$total_4,$total_5,$total_6,$total_7,$total_8,$total_footer,$myq,$myrow,$trow_2,$mult,$k,$local,$td,$my_array,$myqq,$myroww,$explode_valuez;
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
	
	$this->forme=foreign_value('where identitification__pre__primaire_id="'.$id.'" and pris__en__compte_id="'.$this->row[0].'"','tbl__39prise__en__compte__des__themes__transverseaux',5,$db);
	$this->trow.='<tr bgcolor="#FFF"><td>'.$this->row[1].'</td><td>'.$this->yes_or_not(foreign_value('where identitification__pre__primaire_id="'.$id.'" and pris__en__compte_id="'.$this->row[0].'"','tbl__39prise__en__compte__des__themes__transverseaux',4,$db)).'</td>
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
    <td width="16%" rowspan="2"><strong>&nbsp;Année d\'études</strong></td>
    <td width="17%" rowspan="2"><strong>Nombre de classes autorisées</strong></td>
    <td width="28%" rowspan="2"><strong>Nombre de classes organisées</strong></td>
    <td colspan="3"><strong>Sexe</strong></td>
    <td colspan="3"><strong>Dont enfants vivant avec handicap</strong></td>
  </tr>
  <tr bgcolor="#E2E9FE">
    <td width="5%"><strong>G</strong></td>
    <td width="5%"><strong>F</strong></td>
    <td width="6%"><strong>G + F</strong></td>
    <td width="5%"><strong>G</strong></td>
    <td width="6%"><strong>F</strong></td>
    <td width="12%"><strong>G + F</strong></td>
  </tr>';
	$this->tfooter='</table>';
	return $this->thead.$this->read_table_two($db,$id).$this->tfooter;

	}
	function read_table_two($db,$id)
	{
	$this->total_1=0;
	$this->total_2=0;
	$this->total_3=0;
	$this->total_4=0;
	$this->total_5=0;
	$this->total_6=0;
	$this->total_7=0;
	$this->total_8=0;
	$this->trow='';
    $this->q=mysql_query("select * from tbl__23tableau__i__pre__primaire where identitification__pre__primaire_id='".$id."'") or die("Query Failed".mysql_query());
	while($this->row=mysql_fetch_array($this->q))
	{
	$this->total_1+=+$this->row[3];
	$this->total_2+=+$this->row[4];
	$this->total_3+=+$this->row[5];
	$this->total_4+=+$this->row[6];
	$this->total_5+=+($this->row[5]+$this->row[6]);
	$this->total_6+=+$this->row[7];
	$this->total_7+=+$this->row[8];
	$this->total_8+=+($this->row[7]+$this->row[8]);
	$this->trow.='
	<tr bgcolor="#FFF">
    <td>'.foreign_value('where annee__d666etude__maternelle_id="'.$this->row[2].'"','tbl__31annee__d666etude__maternelle',2,$db).'</td>
    <td>'.$this->row[3].'</td>
    <td>'.$this->row[4].'</td>
    <td>'.$this->row[5].'</td>
    <td>'.$this->row[6].'</td>
    <td>'.($this->row[5]+$this->row[6]).'</td>
    <td>'.$this->row[7].'</td>
    <td>'.$this->row[8].'</td>
    <td>'.($this->row[7]+$this->row[8]).'</td>
  </tr>';
	}
	$this->total_footer='<tr bgcolor="#FFF">
    <td>Total</td>
    <td>'.$this->total_1.'</td>
    <td>'.$this->total_2.'</td>
    <td>'.$this->total_3.'</td>
    <td>'.$this->total_4.'</td>
    <td>'.$this->total_5.'</td>
    <td>'.$this->total_6.'</td>
    <td>'.$this->total_7.'</td>
    <td>'.$this->total_8.'</td>
  </tr>';
	return $this->trow.$this->total_footer;
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
	$this->explode_valuez=new accessories();
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
    <td>'.$this->explode_valuez->read_explode_queu($this->row[8],'tbl__31annee__d666etude__maternelle','annee__d666etude__maternelle_id',2,$db).'</td>
    <td>'.$this->row[9].'</td>
    <td>'.$this->row[10].'</td>
    <td>'.$this->row[11].'</td>
    <td>'.foreign_value('where qualification_id="'.$this->row[2].'" ','tbl__24qualification',2,$db).'</td>
    <td>'.foreign_value('where type__de__paiement_id="'.$this->row[3].'" ','tbl__25type__de__paiement',2,$db).'</td>
    <td>'.$this->explode_valuez->read_explode_queu($this->row[4],'tbl__26formation__continue','formation__continue_id',2,$db).'</td>
	
  </tr>';
  #foreign_value('where formation__continue_id="'.$this->row[4].'" ','tbl__26formation__continue',2,$db)
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
}
// class table for kindergarten school ends
?>
