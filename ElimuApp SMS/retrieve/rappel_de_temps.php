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
<title></title>
    
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
 
<!--###################################################################################Retrieve starts##################################### -->

	<div id="tablewrapper" >

        <section>
        <?php 
$header='<table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
<thead>
<tr>
  	<th valign="top"><p><h3>ACTIVITES</h3></p></th>
	<th  valign="top"><p><h3>PERSONNES ASSOCIEES</h3></p></th>
    <th  valign="top"><p><h3>PERIODE</h3> </p></th>
    <th  valign="top"><p><h3>NOTIFICATION RAPPEL TEMPS</h3></p></th>
  </tr>
  </thead>';
  $footer='</table>';
  echo rappel_de_temps($db,$header,$footer,'');
 
 ?> 
 
      </section>
    </div>
</body>
</html>