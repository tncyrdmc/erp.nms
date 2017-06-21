#!/usr/bin/php
<?php

echo "Leyendo datos...";
	
	//$base="/var/www";
	//$project="/erp.multinivel";
	$base="/home/content/57/11569157/html"; 
	$project="/test";
	$db_config=$base.$project."/application/config/database.php";

echo "\n>OK\nCargando base de datos...";
		
	$linea="";
	$file = fopen($db_config, "r");
	while(!feof($file)){
		$linea.=fgets($file)."\n";
	}
	fclose($file);
			
	$val="<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');";
	$texto=str_replace($val, "<?php ", $linea);
		  
	$fp2 = fopen($base.$project."/bk/db_access.php", "w"); 
	fputs($fp2, $texto);
	fclose($fp2);
		
	include($base.$project."/bk/db_access.php");
echo "\n>OK\nCreando dump...";
	exec($base.$project."/bk/bk_daily.sh ".$db['default']['hostname']." ".$db['default']['username']." ".$db['default']['password']." ".$db['default']['database']);
echo "\n>OK\n\n!Dump creado con exito!\n";
