
<?php
$servidor  = "localhost";
$usuario   = "root";
$password  = "";
$baseDatos = "gastos_bd";

$conexion = new mysqli($servidor, $usuario, $password, $baseDatos);

if ($conexion->connect_error) {
    die("Error de conexion: " . $conexion->connect_error);
}

echo "Conexion Exitosa";