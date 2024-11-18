<?php
require_once('../ejercicio_01/conexion.php');
require_once('../ejercicio_01/clases/libro.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTOR DE LIBROS</title>
</head>


<body>
    <h1>LIBROS</h1>
    <br>
    <a href="crear.php"> registrar nuevo libro</a>
    <hr>
    <?php
    $sql = "SELECT * FROM `libro` ";
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "ID : " . $fila['id'] . "<br>";
            echo "TITULO : " . $fila['titulo'] . "<br>";
            echo "AUTOR : " . $fila['autor'] . "<br>";
            echo "EDITORIAL : " . $fila['editorial'] . "<br>";
            echo "AÑO DE LANZAIENTO : " . $fila['año'] . "<br>";
            echo "GENERO : " . $fila['genero'] . "<br>";
            echo "<a href='editar.php?id=" . $fila['id'] . "'>editar</a>  ";
            echo "<a href='eliminar.php?id=" . $fila['id'] . "'onclick=\"return confirm('¿Estás seguro de eliminar este libro?')\">Eliminar</a><br>";
        }
    } else {
        echo "0 registros";
    }
    ?>
</body>
</html>