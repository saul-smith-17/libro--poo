<?php
require_once('../ejercicio_01/conexion.php');
require_once('../ejercicio_01/clases/libro.php');

if(($_SERVER["REQUEST_METHOD"] == "POST")){
    $titulo =$_POST['titulo'];
    $autor =$_POST['autor'];
    $editorial =$_POST['editorial'];
    $año =$_POST['año'];
    $genero =$_POST['genero'];

    $librito = new libro($conexion,$titulo,$autor,$editorial,$año,$genero);
    $librito->registrarLibro();
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGITRAR LIBRO</title>
</head>
<body>
<h1>Registrar Libro</h1>
    <form method="POST">
        <input type="text" name="titulo" placeholder="titulo" required><br><br>
        <input type="text" name="autor" placeholder="autor" required><br><br>
        <input type="text" name="editorial" placeholder="editorial" required><br><br>
        <input type="number" name="año" placeholder="año" required><br><br>
        <input type="text"  name="genero" placeholder="genero" required><br><br>
        <button type="submit">Registrar</button>
        <a href="index.php">volver</a>
    </form>

</body>
</html>