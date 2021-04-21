<?php
try{
		$bd=new PDO('mysql:host=localhost;dbname=db_elimu;SET CHARACTER SET utf-8','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$bd->exec('SET CHARACTER SET UTF8');
		}
		catch(Exception $e)
		{
		die('Erreur:'.$e->getMessage());
		}
?>