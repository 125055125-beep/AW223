<?php

require "conexion.php";
 
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
 
if ($id > 0) {
    $stmt = $conexion->prepare("DELETE FROM mensajes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
 
header("Location: admin.php?msg=borrado");
exit;