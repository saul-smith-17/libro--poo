<?php

$host = 'localhost';
$username = 'root';
$password ='';
$database = 'bd_libreria';

$conexion = mysqli_connect($host,$username,$password,$database);

if(!$conexion){
    die("Error en la coenxaion:" . mysqli_connect_error());
}