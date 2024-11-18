<?php
require_once('/xampp/htdocs/php/CRUD/ejercicio_01/conexion.php');

class libro{
    public $titulo,$autor,$editorial,$año,$genero;
    private $conexion;

    public function __construct( $conexion,$titulo = null,$autor = null,$editorial = null,$año = null,$genero = null)
    {
        $this->conexion = $conexion;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editorial = $editorial;
        $this->año = $año;
        $this->genero = $genero;
    }

    public function registrarLibro(){
        $sql = "INSERT INTO `libro`(`titulo`, `autor`, `editorial`, `año`, `genero`) VALUES ('$this->titulo','$this->autor','$this->editorial','$this->año','$this->genero')";
        if(mysqli_query($this->conexion,$sql)){
            echo "el libro se registro correctamente";
        }else{
            echo"Error en el registro : ". mysqli_error($this->conexion);
        }
    }
    public function mostrarLibro($conexion){
        $sql = "SELECT * FROM `libro` ";
        $resultado = mysqli_query($conexion,$sql);
        if(mysqli_num_rows($resultado)>0 ){
            while($fila = mysqli_fetch_row($resultado)){
                echo " ID : " . $fila['id'];
                echo "- NOMBRE : ". $fila['titulo'] ;
                echo "- AUTOR : " .$fila['autor'] ;
                echo "EDITORIAL : ". $fila['editorial'];
                echo "AÑO DE LANZAIENTO : ". $fila['año'] ;
                echo "GENERO : " .$fila['genero'];
            }
        }else{
            echo " 0  registros";
        }
    }

    public function actualizarLibro($id){
        $sql ="UPDATE `libro` SET `titulo`='$this->titulo',`autor`='$this->autor',`editorial`='$this->editorial',`año`='$this->año',`genero`='$this->genero' WHERE id = $id";
        if(mysqli_query($this->conexion,$sql)){
            echo " Libro actualizado correctamene";
        }else{
            echo "error en la actualizacion : ". mysqli_error($this->conexion);
        }
    }

    public function eliminarLibro($id){
        $sql = "DELETE FROM `libro` WHERE id = $id";
        if(mysqli_query($this->conexion,$sql)){
            echo "libro eliminado correctamete";
        }else{
            echo "error en le eliminacion : " . mysqli_error($this->conexion);
        }
    }
}