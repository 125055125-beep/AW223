<?php
require_once("conexion.php");

/* aqui se reciben los datos del formulario */
$concepto= $_POST["txtconcepto"];
$monto= $_POST["txtMonto"];
$categoria= $_POST["txtcategoria"];


/* preparamos la sentencia */

$sqlInsert= "INSERT INTO Gastos(concepto, monto, categoria) VALUES(?,?,?)";

/* declaramos el stmt  de la conexion para preparar la sentencia */
$stmt= $conexion->prepare($sqlInsert);

/* pasamos los parametros a la sentencia */
$stmt->bind_param("sss", $concepto,$monto, $categoria);

 /* se ejecuta la sentencia */
if($stmt->execute()) {
    header("Location: index.php?estadophp=exito");
}else{
    header("Location: index.php?estadophp=error");
}

/* $stmt->close();
$conexion->close();
?> */
