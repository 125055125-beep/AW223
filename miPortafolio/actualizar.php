<?php
// actualizar.php - Recibe el formulario de editar.php y actualiza la BD
require "conexion.php";
 
$home = "index.php";
 
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: admin.php");
    exit;
}
 
$id      = (int)($_POST['id'] ?? 0);
$nombre  = trim($_POST['nombre'] ?? '');
$correo  = trim($_POST['correo'] ?? '');
$mensaje = trim($_POST['mensaje'] ?? '');
 
// Validación en el servidor: no se permiten vacíos
if ($id <= 0 || $nombre === '' || $correo === '' || $mensaje === '') {
    header("Location: index.php?id=$id&error=vacio");
    exit;
}
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.php?id=$id&error=correo");
    exit;
}
 
$stmt = $conexion->prepare("UPDATE mensajes SET nombre = ?, correo = ?, mensaje = ? WHERE id = ?");
$stmt->bind_param("sssi", $nombre, $correo, $mensaje, $id);
$stmt->execute();
 
// Redirige al home; allá se muestra el alert de confirmación
header("Location: " . $home . "?msg=actualizado");
exit;
 