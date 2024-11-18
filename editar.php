<?php
require_once('../ejercicio_01/conexion.php');
require_once('../ejercicio_01/clases/libro.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];


$sql = "SELECT * FROM `libro` WHERE id = $id";
$reslutado = mysqli_query($conexion,$sql);
$librodata = mysqli_fetch_assoc( $reslutado);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $titulo =$_REQUEST['titulo'];
    $autor =$_REQUEST['autor'];
    $editorial =$_REQUEST['editorial'];
    $año =$_REQUEST['año'];
    $genero =$_REQUEST['genero'];

    $librito = new libro($conexion,$titulo,$autor,$editorial,$año,$genero);
    $librito->actualizarLibro($id);
    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR LIBRO</title>
</head>
<body>
<form method="POST">
        <input type="hidden" name="id" value="<?php echo $librodata['id']; ?>">
        <input type="text" name="titulo" placeholder="titulo" value="<?php echo $librodata['titulo']; ?>" required><br><br>
        <input type="text" name="autor" placeholder="autor" value="<?php echo $librodata['autor']; ?>" required><br><br>
        <input type="text" name="editorial" placeholder="editorial" value="<?php echo $librodata['editorial']; ?>" required><br><br>
        <input type="number" name="año" placeholder="año" value="<?php echo $librodata['año']; ?>" required><br><br>
        <input type="text" name="genero" placeholder="genero" value="<?php echo $librodata['genero']; ?>" required><br><br>
        <button type="submit">Actualizar</button>
</body>
</html>