<?php 
//connection definition starts
define ('servername','127.0.0.1');
define('DB','db_elimu');
define('username','root');
define('pwd','');
define('VOID_T','strip_tags');
define('ALL_CHAR','mysql_real_escape_string');
if(isset($_GET['class']))
{
define('CL',$_GET['class']);
define('AC',$_GET['action']);
define('ID',$_GET['ref_id']);
define('FK',$_GET['ref_menu']);
}

//connection definition ends
?>