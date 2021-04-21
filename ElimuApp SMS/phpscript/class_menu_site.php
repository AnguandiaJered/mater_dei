<?php
class menu_site
{
var $db,$q,$qq,$qqq,$row,$roww,$rowww,$chek,$g_info_link,$mine_link,$cooperative_link,$count_mine,$count_coop,$military_link,$count_military,$cohab_link,$count_cohab,$taxe_link,$count_taxe,$negoce_link,$count_negoce,$count_condition,$condition_link,$count_impact,$impact_link;
function province($database,$tbl,$reference,$css,$pheader,$pcontent,$pfooter)
{

	$pcontent='';
	
	$this->q=$database=mysql_query("select * from ".$tbl." ".$reference."") or die("Query Failed [province]".mysql_error());
	
	while($this->row=mysql_fetch_array($this->q))
	{
		$pcontent.='<li class="'.$css.'"><a href="#"><span class="icon-briefcase"></span>'.$this->row[1].'</a><ul>'.$this->territoire($database,'tbl__04territoire',' where province_id="'.$this->row[0].'"',' ').'</ul></li>';
	}

	return $pheader.$pcontent.$pfooter;
}

private function territoire($db,$tbl,$reference,$tcontent)
{   $tcontent='';
	$this->qq=$db=mysql_query("select * from ".$tbl." ".$reference."") or die("Query failed [territoire]".mysql_error());
	while($this->roww=mysql_fetch_array($this->qq))
	{
		$tcontent.='<li style="text-transform:capitalize;">
                                <a href="#">&rArr; '.$this->roww[2].'</a></li>'.$this->site($db,'tbl__05site',' where territoire_id="'.$this->roww[0].'"','');
	}
	return $tcontent;
}
private function site($db,$tbl,$reference,$scontent)
{   $scontent='';
	$this->qqq=$db=mysql_query("select * from ".$tbl." ".$reference." ") or die("Query Failed".mysql_error());
	while($this->rowww=mysql_fetch_array($this->qqq))
	{   
	    $this->mine_link='?class=12&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'';
		$this->cooperative_link='?class=13&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'';
		$this->count_coop=count_rows('where site_id="'.$this->rowww[0].'"','tbl__13cooperative');
		$this->count_mine=count_rows('where site_id="'.$this->rowww[0].'"','tbl__12minerais__exploites');
		$this->chek=count_rows('where site_id="'.$this->rowww[0].'"','tbl__10information__generale__site');
		if($this->chek<1)
		{
			$this->g_info_link='?class=10&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'';
			
		}else
		{
			$this->g_info_link='retrieve/?class=10&action=retrieving&ref_id=default&ref_menu='.$this->rowww[0].'';
	
		}
		$this->count_military=count_rows('where site_id="'.$this->rowww[0].'"','tbl__15presence__militaire');
		if($this->count_military<1)
		{
			$this->military_link='?class=15&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'';
		}
		else
		{
			$this->military_link='retrieve/?class=15&action=retrieving&ref_id=default&ref_menu='.$this->rowww[0].'';
		}
		$this->count_cohab=count_rows('where site_id="'.$this->rowww[0].'"','tbl__16cohabitation__detenteur__du__titre__munier');
		if($this->count_cohab<1)
		{
			$this->cohab_link='?class=16&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'';
		}
		else
		{
			$this->cohab_link='retrieve/?class=16&action=retrieving&ref_id=default&ref_menu='.$this->rowww[0].'';
		}
		$this->count_taxe=count_rows('where site_id="'.$this->rowww[0].'"','tbl__17perception__des__taxes__extraction');
		$this->taxe_link='?class=17&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'';
		$this->count_negoce=count_rows('where site_id="'.$this->rowww[0].'"','tbl__18negoce');
		$this->negoce_link='?class=18&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'';
		
		$this->count_condition=count_rows('where site_id="'.$this->rowww[0].'"','tbl__21condition__de__travail__de__mineur__dans__le__site');
		if($this->count_condition<1)
		{
			$this->condition_link='?class=21&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'';
		}
		else
		{
			$this->condition_link='retrieve/?class=21&action=retrieving&ref_id=default&ref_menu='.$this->rowww[0].'';
		}
		
		$this->count_impact=count_rows('where site_id="'.$this->rowww[0].'"','tbl__22impact__sur__l666environnement');
		if($this->count_condition<1)
		{
			$this->impact_link='?class=22&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'';
		}
		else
		{
			$this->impact_link='retrieve/?class=22&action=retrieving&ref_id=default&ref_menu='.$this->rowww[0].'';
		}
		
		$scontent.='<li style="text-align:left; text-transform:uppercase;">
                                <a href="site_profile.php?id='.$this->rowww[0].'&phase=1"><strong> Site '.$this->rowww[4].'</strong></a></li>
								<li style="text-align:left">
                                <a href="?class=site_logo&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'">&raquo; Logo Site</a></li>
								<li style="text-align:left">
                                <a href="'.$this->g_info_link.'">&raquo; Information Générale</a></li>
								<li style="text-align:left">
                                <a href="'.$this->mine_link.'">&raquo; Minerais Exploitée ('.$this->count_mine.')</a></li>
								<li style="text-align:left"><a href="'.$this->cooperative_link.'">&raquo; Noms Coopératives ('.$this->count_coop.')</a></li>
								<li style="text-align:left"><a href="'.$this->military_link.'">&raquo; Présence Militaire </a></li>
								<li style="text-align:left"><a href="'.$this->cohab_link.'">&raquo; Cohabitation Detenteur</a></li>
								<li style="text-align:left"><a href="'.$this->taxe_link.'">&raquo; Perception Des Taxes Extraction ('.$this->count_taxe.')</a></li>
								<li style="text-align:left"><a href="'.$this->negoce_link.'">&raquo; Negoce ('.$this->count_negoce.')</a></li>
								<li style="text-align:left"><a href="?class=36&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'">&raquo; Itineraire D\'evacuation Des Minerais Extraction ('.count_rows('where site_id="'.$this->rowww[0].'"',' tbl__52itineraire__extraction').')</a></li>
								
								<li style="text-align:left"><a href="?class=37&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'">&raquo; Itineraire D\'evacuation Des Minerais Negoce ('.count_rows('where site_id="'.$this->rowww[0].'"',' tbl__53tineraire__negoce').')</a></li>
								<li style="text-align:left"><a href="?class=19&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'">&raquo; Travaux exercés par les enfants ('.count_rows('where site_id="'.$this->rowww[0].'"',' tbl__19type__des__travaux__exerces__par__les__enfants').')</a></li>
								<li style="text-align:left"><a href="?class=20&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'">&raquo; Travail Des Enfants ('.count_rows('where site_id="'.$this->rowww[0].'"',' tbl__20travail__enfant').')</a></li>
								<li style="text-align:left"><a href="'.$this->condition_link.'">&raquo; Condition de Travail </a></li>
								<li style="text-align:left"><a href="'.$this->impact_link.'">&raquo; Impact Sur L’environnement</a></li>
								<li style="text-align:left"><a href="?class=40&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'">&raquo; Incident '.count_rows('where site_id="'.$this->rowww[0].'"',' tbl__56incident').')</a></li>
								<li style="text-align:left"><a href="?class=negoce_photo&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'">&raquo; Photo Negoce '.count_rows('where site_id="'.$this->rowww[0].'"','tbl__57negoce__photo').')</a></li>
								<li style="text-align:left"><a href="?class=43&action=default&ref_id=default&ref_menu='.$this->rowww[0].'&read_col='.$this->rowww[4].'">&raquo; Centre Negoce / Point de Vente ('.count_rows('where site_id="'.$this->rowww[0].'"',' tbl__59cn__pv__linked__to__site').')</a></li>';
	}
	return $scontent;
}
}
?>