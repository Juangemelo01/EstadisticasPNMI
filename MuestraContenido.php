<?php 
include("con.php");
//Empezamos con el experimetno//
//Inicializamos un contador, en este caso sera i//
header('Content-Type: text/html; charset=iso-8859-1');
$i = 1001;
//Creamos variable para el nombre de la URL de la pagina//
$Sitio = "http://pnmi.segob.gob.mx/PNMP_resultadosmi2.php?idr=";
//Variable que tendra todo el contenido html//
	$html = file_get_contents($Sitio.$i);
	$NomE = '<td valign="top" ><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre de la publicaci'.utf8_decode ("ó").'n :</strong></td><td >';
	$NomF ='<br>&nbsp;</td>';
	//$NomE = '<html>';
	//$NomF ='</html>';
	 
	//preg_match("#<title>(.*)</title>#", $html, $title);
	//preg_match("#<html>(.*)</html>#s",$html,$matchesx);
	
	$title_out = $title[1];
	echo $title_out;
	
								
								//if (preg_match('#'.$NomE.'([\s\S]*)'.$NomF.'#',$html,$matches)) {
								if (preg_match('#'.$NomE.'(.*)'.$NomF.'#',$html,$matches)) {

								    echo "El cuerpo del documento es: " . $matches[1] . "\n";
							

								}
							
	
?>
