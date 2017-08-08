<?php
//Conexion//
	$host ="HOST";
	$usuario = "USUARIO";
	$clave = "CLAVE";
	$DB = "BASEDATOS";
	
	$con = mysqli_connect($host,$usuario,$clave,$DB);
	if(!$con) {
		echo "Error en la conexion";
		exit;	
	} else{
		//echo "Todo Bien<br>";		
	}
?>