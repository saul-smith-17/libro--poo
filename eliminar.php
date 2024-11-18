<?php
require_once('../ejercicio_01/conexion.php');
require_once('../ejercicio_01/clases/libro.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $librito = new libro($conexion);
    $librito->eliminarLibro($id);

    header("Location: index.php"); // Redirige al índice después de eliminar
}
?>