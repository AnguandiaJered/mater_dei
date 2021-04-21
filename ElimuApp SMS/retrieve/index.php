<?php 
@session_start();
include('../phpscript/connection.php');
include('../phpscript/classe_lib.php');
$db=db_connection(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::Bienvenu(e) au *** <?php echo system_info(1,$db,'tbl__03configuration');?> *** ::</title>
<link rel="shortcut icon" href="../img/gemicon/fovico.png">
    
	<script src="js/modernizr.custom.63321.js" type="text/javascript"></script>   
    <link href="css/styleResp.css" rel="stylesheet" type="text/css" />
     <link href="css-/stylesheets.css" rel="stylesheet" type="text/css" />
    <!--Css pannel contact-->
    <link href="css/stylesContact.css" rel="stylesheet" type="text/css" />
    <!--End Css pannel contact-->
       <script type="text/javascript">
           function changeCSS(cssFile, cssLinkIndex) {

               var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);

               var newlink = document.createElement("link")
               newlink.setAttribute("rel", "stylesheet");
               newlink.setAttribute("type", "text/css");
               newlink.setAttribute("href", cssFile);

               document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
           }
    </script>
</head>
<body>
<div class="preview-top">
 <div class="sub-preview">
    
  <!--###################Return link starts##################################### -->
  <?php
  if(isset($_GET['read_col']))
	    {
			$extra_link='&read_col='.$_GET['read_col'].'';
     	}else
		{
		    $extra_link='';
		} 
		if(CL==6)
		{
			$go_back_url='../dashboard.php?class=incoming_store&action=default&ref_id=default&ref_menu=default';
		}
		if(CL==7)
		{
			$go_back_url='../dashboard.php?class=outgoing_store&action=default&ref_id=default&ref_menu=default';
		}
		if(CL==21)
		{
			$go_back_url='?class=12&action=retrieving&ref_id=default&ref_menu=default';
		}
		else
		{
			$go_back_url='../dashboard.php?class='.CL.'&action=default&ref_id=default&ref_menu='.$_GET['ref_menu'].$extra_link.'';
		}
  ?>
   <div class="button-top"><a class="button blue" href="../dashboard.php?class=default&action=default&ref_id=default&ref_menu=<?php echo $_GET['ref_menu'].$extra_link; ?>"> Accueil</a></div>
   <?php if(CL!=3):?>
  <div class="button-top"><a class="button blue" href="<?php echo $go_back_url;?>">&laquo; Nouvelle donnée</a></div>
   <?php endif;?>
     <!--###################Return link ends##################################### -->
   <div class="button-top"><a class="button blueTop" onclick="changeCSS('css/styleResp.css', 0);" href="#"></a></div>
     <div class="button-top"><a class="button red" onclick="changeCSS('css/skin_red/styleResp.css', 0);"  href="#"></a></div>
     <div class="button-top"><a class="button green" onclick="changeCSS('css/skin_green/styleResp.css', 0);" href="#"></a></div>
 </div>
</div>
<!--###################################################################################Retrieve starts##################################### -->

	<div id="tablewrapper" >
		<div id="tableheader">
        	<div class="search">
                <select id="columns" onchange="sorter.search('query')"></select>
                <input type="text" id="query" onkeyup="sorter.search('query')" />
            </div>
            <span class="details">
				<div>Affichage données <?php $tbl=new open_gate();
				echo str_replace('00','/',str_replace('__',' ',str_replace('666',"'",substr($tbl->table_name(CL,$db),+7))));  ?> <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></div>
        		<div class="btn-reset"><a class="button blue" href="javascript:sorter.reset()">Reset</a></div>
        	</span>
        </div>
        <section>
       <?php
	   delete_confirm();
	   $header='<br><table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
            <thead>
                <tr>';
	   $header_content='<th><h3 style="text-transform:capitalize;">#_table_header_content</h3></th>';
	   $header_close='<th><h3>Action</h3></th></tr> </thead> <tbody>';
	   $footer='</table>';
	   unset( $_SESSION['READFK']);
	   //etra button starts
	    if(CL==5)
	   {
		   $_SESSION['READFK']='#_readfk1';
		    $delimiter_int='';
		   $delimiter_app='';
		   $extra_btn='&nbsp;<a href="../dashboard.php?class=7&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">List</button></a>&nbsp;<a href="../dashboard.php?class=8&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Group</button></a>
		   ';
		   $action_width=400;
	   }
	   elseif(CL==12)
	   {
		   $_SESSION['READFK']='#_readfk1';
		    $delimiter_int='';
		   $delimiter_app='';
		   $extra_btn='&nbsp;<a href="creer_compte_enseignant.php?id=#_fk&action=default" rel="facebox"><button class="btn btn-success">Compte</button></a>
		   ';
		   $action_width=400;
	   }
	   else if(CL==140)
	   {
		   $_SESSION['READFK']='#_readfk2';
		   $prise_en_compte='&nbsp;<a  href="../dashboard.php?class=39&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Pris en compte</button></a>';
		   $profil_pdf='&nbsp;<a  target="_blank" href="../MPDF57/examples/kindergarten_school.php?id=#_fk"><button class="btn btn-success">Profil Etablissement</button></a>';
		   $table_1='&nbsp;<a href="../dashboard.php?class=23&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Tableau (1)</button></a>';
		   $table_2='&nbsp;<a href="../dashboard.php?class=27&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Tableau (2)</button></a>';
		   $table_3='&nbsp;<a href="../dashboard.php?class=30&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Tableau (3)</button></a>';
		   $table_4='&nbsp;<a href="../dashboard.php?class=32&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Tableau (4)</button></a>';
		    $table_5='&nbsp;<a href="../dashboard.php?class=36&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Tableau (5)</button></a>';
		    
		    $delimiter_int=3;
		    $delimiter_app=1; 
		    $extra_btn=$prise_en_compte.$table_1.$table_2.$table_3.$table_4.$table_5.$profil_pdf; 
			$action_width=800;	
	   }
	   else if(CL==41)
	   {
		   $_SESSION['READFK']='#_readfk2';
		   $prise_en_compte='&nbsp;<a  href="../dashboard.php?class=42&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Pris en compte</button></a>';
		   $profil_pdf='&nbsp;<a  target="_blank" href="../MPDF57/examples/primary_school.php?id=#_fk"><button class="btn btn-success">Profil</button></a>';
		    $multi_grade='&nbsp;<a href="../dashboard.php?class=48&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Nbre de classes multigrades</button></a>';
		   $table_1='&nbsp;<a href="../dashboard.php?class=45&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Tab(1)</button></a>';
		   $table_2='&nbsp;<a href="../dashboard.php?class=47&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Tab(2)</button></a>';
		   $table_3='&nbsp;<a href="../dashboard.php?class=51&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Tab(3)</button></a>';
		   $table_4='&nbsp;<a href="../dashboard.php?class=52&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Tab(4)</button></a>';
		    $table_5='&nbsp;<a href="../dashboard.php?class=53&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Tab(5)</button></a>';
		    $table_6='&nbsp;<a href="../dashboard.php?class=54&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Tab(6)</button></a>';
			 $table_7='&nbsp;<a href="../dashboard.php?class=55&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Tab(7)</button></a>';
			 $table_8='&nbsp;<a href="../dashboard.php?class=57&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Tab(8)</button></a>';
			 $table_9='&nbsp;<a href="../dashboard.php?class=59&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Tab(9)</button></a>';
			 $table_10='&nbsp;<a href="../dashboard.php?class=61&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Tab(10)</button></a>';
			  $table_11='&nbsp;<a href="../dashboard.php?class=63&action=default&ref_id=default&ref_menu=#_fk&read_col='.$_SESSION['READFK'].'"><button class="btn btn-success">Tab(11)</button></a>';
		    
		    $delimiter_int=3;
		    $delimiter_app=1; 
		    $extra_btn=$prise_en_compte.$table_1.$table_2.$multi_grade.$table_3.$table_4.$table_5.$table_6.$table_7.$table_8.$table_9.$table_10.$table_11.$profil_pdf; 
			$action_width=1200;	
	   }
	  else{
	      $delimiter_int='';
		  $delimiter_app='';
		  $extra_btn='';
		  $action_width=400;
		  }
	   if(CL=='defined')
	   {
		   $reference='where 	site_id="'.FK.'"';
	   }
	   switch(CL)
	   {
		  case 7:
		  if($_SESSION['DESIGNATION']=='user'){$reference='where branche_id='.$_SESSION['SUB_STORE'].'';}
		  break;
		  
		  
		   
	   }
				   //etra button ends
	   if(isset($reference)){$ref_query=$reference;}else{$ref_query='';}
	   $retrieve_record=new retrieve_record();
	   $ForeignKeysArray='tbl__01foreign__keys';
	  echo $retrieve_record->show_record($header,$header_content,$header_close,$footer,$db,$tbl->table_name(AC,$db),$extra_btn,$delimiter_int,$delimiter_app,$ForeignKeysArray,$ref_query,'tbl__15configuration','../dashboard.php',$action_width);
	   
		   ?>
    </section>
        <div id="tablefooter">
          <div id="tablenav" >
            	<div>
                    <img src="images/first.png" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
                    <img src="images/previous.png" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
                    <img src="images/next.png" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
                    <img src="images/last.png" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
                </div>
                <div>
                	<select  id="pagedropdown"></select>
				</div>
                <div class="btn-reset"><a class="button blue" href="javascript:sorter.showall()">Voir tout</a>
                </div>
            </div>
			<div id="tablelocation">
            <div>
                  <select onchange="sorter.size(this.value)">
                    <option value="5">5</option>
                        <option value="10" selected="selected">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="txt-page"  >Entries Per Page</span>
                </div>

            	
                <div class="page txt-txt">Page <span id="currentpage"></span> of <span id="totalpages"></span></div>
            </div>
        </div>
    </div>
    

    <!--###################################################################################Retrieve ends##################################### -->
<!--COMMENT STARTS FANCY POPUP-->
<script src="../fancy/jquery.js" type="text/javascript"></script> 
<link href="../fancy/facebox1.2/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="../fancy/facebox1.2/src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox() 
    closeImage   : " fancy/closelabel.png" 
})
</script>

<script type="text/javascript">

$(document).ready(function(){
$("#shadow").fadeOut();

  $("#cancel_hide").click(function(){
        $("#").fadeOut("slow");
        $("#shadow").fadeOut();
    
   });
      });
   </script>


<!--COMMENT ENDS -->

	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript">
	var sorter = new TINY.table.sorter('sorter','table',{
		headclass:'head',
		ascclass:'asc',
		descclass:'desc',
		evenclass:'evenrow',
		oddclass:'oddrow',
		evenselclass:'evenselected',
		oddselclass:'oddselected',
		paginate:true,
		size:10,
		colddid:'columns',
		currentid:'currentpage',
		totalid:'totalpages',
		startingrecid:'startrecord',
		endingrecid:'endrecord',
		totalrecid:'totalrecords',
		hoverid:'selectedrow',
		pageddid:'pagedropdown',
		navid:'tablenav',
		sortcolumn:1,
		sortdir:1,
		columns:[{index:7, format:'%', decimals:1},{index:8, format:'$', decimals:0}],
		init:true
	});
  </script>
 
</body>

<!-- Mirrored from 1.s3.envato.com/files/53734448/indexResp.html by HTTrack Website Copier/3.x [XR&CO'2008], Thu, 05 Dec 2013 17:56:42 GMT -->
</html>
<?php
function delete_confirm()
			{
				if(AC=='delete_confirm')
				{
					echo'<br><div class="alert alert-info">            
                                    <strong>Sys Message!</strong>Etes-vous sure d\'effacer cette donnée ?
									<br><center><a href="../phpscript/executer.php?class='.CL.'&action=delete&ref_id='.ID.'&ref_menu='.FK.'"><button class="btn btn-success">Yes</button></a> &nbsp;
									<a href="?class='.CL.'&action=default&ref_id=default&ref_menu='.FK.'"><button class="btn btn-primary">No</button></a></center>
                                    
    </div>';
				}
				if(isset($_GET['ref'])&&$_GET['ref']=='true')
				{
					echo'<br><div class="alert alert-success">            
                                    <strong>Sys Message!Referecement Ajouté avec succè
								</strong>
                                    
    </div>';
				}
				else if(isset($_GET['ref'])&&$_GET['ref']=='already_existed')
				{
					echo'<br><div class="alert alert-warning">            
                                    <strong>Sys Message!Referecement deja existé
								</strong>
                                    
    </div>';
				}
			}
?>