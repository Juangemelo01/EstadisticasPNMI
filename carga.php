<?php 
include("con.php");
//Empezamos con el experimetno//
//Inicializamos un contador, en este caso sera i//
header('Content-Type: text/html; charset=iso-8859-1');
$Nombre;
$Tipo;
$Ejemplares;
$EjemplaresG;
$EjemplaresP;
$O = utf8_decode ("ó");
$FIN ='<br>&nbsp;</td>';
$i = 1001;
//Creamos variable para el nombre de la URL de la pagina//
$Sitio = "http://pnmi.segob.gob.mx/PNMP_resultadosmi2.php?idr=";
for($i = 818; $i<5000; $i++) {
//Variable que tendra todo el contenido html//
	$html = file_get_contents($Sitio.$i);
	$NomE = '<td valign="top" ><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre de la publicaci'.$O.'n :</strong></td><td > ';
	$TipE = '<td valign="top" ><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo de publicaci'.$O.'n :</strong></td><td > ';
	$EjEG = 'Promedio de circulaci'.$O.'n gratuita :</strong></td><td > ';
	$EjEP = 'Promedio de circulaci'.$O.'n pagada :</strong></td><td > ';
	$EjF =' ejemplares.';
	if (preg_match('#'.$NomE.'(.*)'.$FIN.'#',$html,$matches)) {
		$Nombre = $matches[1];
		 echo $Nombre;
		 echo '<br>';
	}
	if (preg_match('#'.$TipE.'(.*)'.$FIN.'#',$html,$matches)) {
		$Tipo = $matches[1];
		 echo $Tipo;
		 echo '<br>';
	}
	if (preg_match('#'.$EjEG.'(.*)'.$EjF.'#',$html,$matches)) {
		//Quitamos espacios y ","//		
		$EjemplaresG = str_replace(" ","",$matches[1]);
		$EjemplaresG = str_replace(",","",$EjemplaresG);
		 echo $EjemplaresG;
	}else{
		echo $EjemplaresG = 0;
		echo '<br>';	
	}						

	if (preg_match('#'.$EjEP.'(.*)'.$EjF.'#',$html,$matches)) {
		$EjemplaresP = str_replace(" ","",$matches[1]);
		$EjemplaresP = str_replace(",","",$EjemplaresP);
		 echo $EjemplaresP;
		 echo '<br>';
	}else{
		echo $EjemplaresP = 0;
		echo '<br>';
	}	
	$Ejemplares=$EjemplaresP + $EjemplaresG;
echo "Total de Ejemplares:".$Ejemplares;  

	//Ahora vamos a hacer las inserciones//
	$Consulta ="INSERT INTO PNMI (id, Nombre, Tipo, Ejemplares) VALUES ('$i','$Nombre','$Tipo','$Ejemplares')";
	$Res = mysqli_query($con, $Consulta) or die("Error fatal");
	if(!$Res) {
		echo 'Error';	
	}else {
		echo 'Todo Bien';	
	}
}		
?>
