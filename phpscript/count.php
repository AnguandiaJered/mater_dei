<?php
include('connection.php');
$db=db_connection();
$q=mysql_query("select *  from    tbl__29appel__court where  date__creation__fiche between  '2015-08-04' and '2015-08-11'") or die("Query Failed".mysql_error());
while($row=mysql_fetch_array($q))
{
	echo'booba<br>';
}
?>