<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Blog</title>
    <!-- Enlace a Bootstrap CSS local -->
    <link rel="stylesheet" href="resource/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #1c1c1c; /* Fondo negro */
            color: #f8f9fa; /* Texto en gris claro */
        }
        .card {
            background-color: #343a40; /* Fondo gris oscuro para las tarjetas */
            border: none; /* Sin borde */
        }
        .card-title {
            color: #ffffff; /* Títulos en blanco */
        }
        .card-text, .lead {
            color: #d1d1d1; /* Texto en gris más claro */
        }
        footer {
            background-color: #212529; /* Fondo del pie de página */
            color: #ffffff; /* Texto blanco en el pie de página */
        }
        a {
            color: #0d6efd; /* Color del enlace */
        }
        a:hover {
            color: #0056b3; /* Color del enlace al pasar el mouse */
        }
    </style>
</head>
<body>
    <?php 
    include("../model/Manejo_objeto.php");
    try {
        $conexion = new PDO('mysql:host=localhost; dbname=dbblog', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec("SET CHARACTER SET utf8");
        $objeto = new Manejo_objeto($conexion);
        $datos = $objeto->getContenidoPorFecha();
        if (empty($datos)) {
            echo "<div class='container'><p>No hay Blog Creados.</p></div>";
        } else {
            echo "<div class='container'>";
            foreach ($datos as $fila) {
                echo "<div class='card mb-4'>
                    <div class='card-body'>
                        <h1 class='card-title mt-4'>".$fila->getTitulo()."</h1>
                        <h4 class='text-success'>".$fila->getFecha()."</h4>
                        <div class='lead'>".$fila->getComentario()."</div>";
                if ($fila->getImagen() != "") {
                    echo "<img class='img-fluid' src='imagenes/".$fila->getImagen()."' width='300px' height='200px'/>";
                }
                echo "</div></div>";
            }
            echo "</div>";
        }
    } catch (Exception $e) {
        die("Error: ".$e->getLine());
    }
    ?>
    <footer class="text-center py-3">
        <p class="mb-0">© 2024 Mi Blog. Todos los derechos reservados.</p>
    </footer>

    <br/>
    <div class="container text-center">
        <a href="views/Formulario.php" class="btn btn-primary">Volver a Insertar Blog</a>
    </div>

    <script src="resource/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</body>
</html>
