<?php
require_once("conexion.php");

/* aqui se reciben los datos del formulario */
$nombre= $_POST["txtnombre"];
$correo= $_POST["txtcorreo"];
$mensaje= $_POST["txtmensaje"];


/* preparamos la sentencia */

$sqlInsert= "INSERT INTO mensajes(nombre, correo, mensaje) VALUES(?,?,?)";

/* declaramos el stmt  de la conexion para preparar la sentencia */
$stmt= $conexion->prepare($sqlInsert);

/* pasamos los parametros a la sentencia */
$stmt->bind_param("sss", $nombre,$correo, $mensaje);

 /* se ejecuta la sentencia */
if($stmt->execute()) {
    header("Location: index.php?estadophp=exito");
}else{
    header("Location: index.php?estadophp=error");
}

/* $stmt->close();
$conexion->close();
?> */

