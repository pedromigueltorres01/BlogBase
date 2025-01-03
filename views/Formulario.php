<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Píldoras</title>
    <link rel="stylesheet" href="../resource/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #1c1c1c; /* Fondo negro */
            color: #f8f9fa; /* Texto en gris claro */
        }
        h2 {
            text-align: center;
            color: #ffffff; /* Título en blanco */
            margin-top: 20px;
        }
        .form-table {
            width: 50%;
            margin: auto;
            background-color: #343a40; /* Fondo gris oscuro */
            border: solid 2px #FF9900; /* Borde naranja */
            padding: 20px;
            border-radius: 5px; /* Bordes redondeados */
        }
        td {
            padding: 10px 0;
            color: #d1d1d1; /* Texto en gris más claro */
        }
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #6c757d; /* Borde gris */
            background-color: #495057; /* Fondo gris más oscuro */
            color: #ffffff; /* Texto blanco */
        }
        input[type="submit"] {
            background-color: #0d6efd; /* Color del botón */
            color: #ffffff; /* Texto blanco */
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3; /* Color del botón al pasar el mouse */
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
    <?php
    // Menu
       require_once('layouts/menu.php');
    ?>
    </div>
    <h2>Nueva entrada</h2>
    <form action="../controller/transacciones.php" method="post" enctype="multipart/form-data" name="form1">
        <table class="form-table">
            <tr>
                <td>Título:
                    <label for="campo_titulo"></label>
                </td>
                <td><input type="text" name="campo_titulo" id="campo_titulo"></td>
            </tr>
            <tr>
                <td>Comentarios:
                    <label for="area_comentarios"></label>
                </td>
                <td><textarea name="area_comentarios" id="area_comentarios" rows="10" cols="50"></textarea></td>
            </tr>
            <input type="hidden" name="MAX_TAM" value="2097152">
            <tr>
                <td colspan="2" align="center">Seleccione una imagen con tamaño inferior a 2 MB</td>
            </tr>
            <tr>
                <td colspan="2" align="left"><input type="file" name="imagen" id="imagen"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btn_enviar" id="btn_enviar" value="Enviar">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <a href="Mostrar_blog.php">Página de visualización del blog</a>
                </td>
            </tr>
        </table>
    </form>
    <p>&nbsp;</p>
    <script src="../resource/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</body>
</html>
