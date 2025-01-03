<?php
include('../model/Manejo_objeto.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Blog</title>
    <!-- Enlace a Bootstrap CSS local -->
    <link rel="stylesheet" href="../resource/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #1c1c1c; /* Fondo negro */
            color: #f8f9fa; /* Texto en gris claro */
        }
        .card {
            background-color: #343a40; /* Fondo gris oscuro para las tarjetas */
            border: none; /* Sin borde */
            margin-bottom: 20px; /* Margen inferior */
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
    <div>
        hhhhhh
    <?php
    // Menu
       require_once('layouts/menu.php');
    ?>
    </div>
    <div class="container">
        <?php
        try {
            $conexion = new PDO('mysql:host=localhost; dbname=dbblog', 'root', '');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");
            $Manejo_objeto = new Manejo_objeto($conexion);
            $datos = $Manejo_objeto->getContenidoPorFecha();
            if (empty($datos)) {
                echo '<div class="alert alert-warning" role="alert">No hay blog creados.</div>';
            } else {
                foreach ($datos as $blogVer) {
                    echo "<div class='card'>";
                    echo "<div class='card-body'>";
                    echo "<h3 class='card-title'>". htmlspecialchars($blogVer->getTitulo()) ."</h3>";
                    echo "<h4 class='text-success'>". htmlspecialchars($blogVer->getFecha()) ."</h4>";
                    echo "<div class='card-text'>". htmlspecialchars($blogVer->getComentario()) ."</div>";
                    if ($blogVer->getImagen() != "") {
                        echo "<img src='../imagenes/". htmlspecialchars($blogVer->getImagen()) ."' class='img-fluid' width='300px' height='200px'/>";
                    }
                    echo "</div></div>";
                }
            }
        } catch (Exception $e) {
            die('Error: '. $e->getMessage());
        }
        ?>
    </div>

    <footer class="text-center py-3">
        <p class="mb-0">© 2024 Mi Blog. Todos los derechos reservados.</p>
    </footer>

    <script src="../resource/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</body>
</html>
