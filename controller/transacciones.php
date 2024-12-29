<?php
include_once('../model/objeto_blog.php');
include_once('../model/Menejo_objeto.php');
try {
	$conexion=new PDO('mysql:host=localhost; dbname=dbblog', 'root', '');
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




		if ($_FILES['imagen']['error']) {
			// code...
			switch ($_FILES['imagen']['error']) {
				case 1: // encaso de que la imagen exceda el tamaño permitido por e servido
					// code...
						echo "La imagen excede el tamaño permitido por el servidor.";
					break;
				case 2:// encaso de que la imagen exceda el tamaño permitido por el formulario
					// code...
						echo "La imagen excede los 2 MB permitido.";
					break;
					case 3:// en caso que el archivo no se suba correctamente
					// code...
						echo "Hubo un fallo al intentar subir la imagen.";
					break;
				
				case 4:// no se subiò la imagen
					// code...
						echo "No se ha enviado imagen.";
					break;
				
				default:
					// code...
					break;
			}
		}else{
			echo "Entrada subida correctamente.<br/>";
			if ((isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error']==UPLOAD_ERR_OK))) {
				// code...
				$destinoRuta="../imagenes/";

				//mueve el archivo del directorio temporal a la ryta destino con el nombre de la imagen
				move_uploaded_file($_FILES['imagen']['tmp_name'], $destinoRuta.$_FILES['imagen']['name']);
				echo "la imagen ".$_FILES['imagen']['name']." se subió correctamente.";
			}else{
				echo "La imagen no se pudo subir.";
			}
		}
		$Manejo_objeto=new Manejo_objeto($conexion);
		$blog=new Objeto_blog();
		$blog->setTitulo(htmlentities(addslashes($_POST['campo_titulo']), ENT_QUOTES));
		$blog->setFecha(Date("Y-m-d H:i:s"));
		$blog->setComentario(htmlentities(addslashes($_POST['area_comentarios']),ENT_QUOTES));
		$blog->setImagen($_FILES['imagen']['name']);
		$Manejo_objeto->setContenido($blog);
		echo '<br> Entrada insertada. <br>';

		} catch (Exception $e) {
	die('Error: '. $e->getMessage(). "en la linea ".$e->getLine());
}
		

?>