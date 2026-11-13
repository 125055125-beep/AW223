<?php

require_once "conexion.php";

/* solo aceptar datos enviados por el formulario */
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

/* recibir datos del formulario */
$nombre  = $_POST["txtnombre"];
$correo  = $_POST["txtemail"];
$mensaje = $_POST["txtmensaje"];

/* preparar la sentencia */
$sqlInsert = "INSERT INTO mensajes(nombre,email,mensaje) VALUES(?,?,?)";

/* stmt de la conexion para la sentencia */
$stmt = $conexion->prepare($sqlInsert);

/* parametros para la sentencia */
$stmt->bind_param("sss", $nombre, $correo, $mensaje);

/* ejecutar la sentencia */
if ($stmt->execute()) {
    header("Location: index.php?estadophp=exito");
} else {
    header("Location: index.php?estadophp=error");
}
exit();