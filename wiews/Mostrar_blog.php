<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
		<?<?php include_once("../model/Menejo_objeto.php");
	try {
	$conexion=new PDO('mysql:host=localhost; dbname=dbblog', 'root','');
	$conexion->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexion->exec("SET CHARACTER SET "."utf8");
	$objeto=new Manejo_objeto($conexion);
	$datos=$objeto->getContenidoPorFecha();
	if (empty($datos)) {
		// code...
		echo "No hay Blog Creados.";
	}else{
		
		foreach($datos as $fila){
			echo "<h1>".$fila->getTitulo()."</h1>";
			echo "<h4>".$fila->getFecha()."</h4>";
			echo "<div style='width:400px'>".$fila->getComentario()."</div>";
			if ($fila->getImagen()!="") {
				// evita que se muestra un error si no hay imagen

				echo "<img src='../imagenes/";
				echo $fila->getImagen()."'width='300px' heigth='200px'/>";
			}
			echo "<hr/>";
		}
	}
}catch(Exception $e){
	die("Error: ".$e->getLine());
}

	 ?>

	 <br/>
	 <a href="Formulario.php">Volver a Insetar Blog</a>

</body>
</html>