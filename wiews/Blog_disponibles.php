<?php
include('../model/Manejo_objeto.php');
try {
	$conexion=new PDO('mysql:host=localhos; dbname=dbblog', root,'');
	$conexion=setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$Manejo_objeto=new Manejo_objeto($conexion);
	$datos=$Manejo_objeto->getContenidoPorFecha();
	if(empty($datos)){
		echo 'No hay blog Creados';
	}else{
		foreach($datos as $blogVer){
echo "<h3>". $blogVer->getTitulo()."</h3";
echo "<h4>". $blogVer->getFecha(). "</h4";
echo "<div style='width:400px'>";
echo $blogVer->getComentario();
echo "</div>";
if ($blogVer->getImagen()!=""){

	echo"<img src='../imagenes";
	echo $blogVer->getImagen()."'width='300px' heigth='200px'/>";
}
echo"<br>";
		}
	}
	
} catch (Exception $e) {
	die('Error: '. $e->getMessage());
}
?>