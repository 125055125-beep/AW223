<?php
$servidor  = "localhost";
$usuario   = "root";
$password  = "";
$baseDatos = "practica";

$conexion = new mysqli($servidor, $usuario, $password, $baseDatos);

if ($conexion->connect_error) {
    die("error de conexion: " . $conexion->connect_error);
}