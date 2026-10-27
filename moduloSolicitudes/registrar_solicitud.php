registrar_solicitud.php

<?php
require_once "conexion.php";

// Evita que se abra el archivo directamente sin enviar el formulario
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Envía el formulario desde la página de solicitudes.");
}

$idUsuario   = (int) ($_POST["id_usuario"] ?? 0);
$idEquipo    = (int) ($_POST["id_equipo"] ?? 0);
$observacion = trim($_POST["observacion"] ?? "");

// Validación en el servidor
if ($idUsuario <= 0 || $idEquipo <= 0 || $observacion === "") {
    header("Location: solicitudes.php?estadophp=campos_invalidos");
    exit;
}

// Verifica que el equipo exista y esté disponible antes de registrar
$stmt = $conexion->prepare("SELECT disponibilidad FROM equipos WHERE id = ?");
$stmt->bind_param("i", $idEquipo);
$stmt->execute();
$equipo = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$equipo || $equipo["disponibilidad"] !== "disponible") {
    header("Location: solicitudes.php?estadophp=equipo_no_disponible");
    exit;
}

try {
    // El estado inicial lo asigna el sistema: siempre 'pendiente'
    $stmt = $conexion->prepare(
        "INSERT INTO solicitudes (id_usuario, id_equipo, observacion, estado)
         VALUES (?, ?, ?, 'pendiente')"
    );
    $stmt->bind_param("iis", $idUsuario, $idEquipo, $observacion);
    $stmt->execute();
    $stmt->close();
    $estado = "solicitud_guardada";
} catch (mysqli_sql_exception $e) {
    // 1452 = el usuario no existe (llave foránea)
    $estado = $e->getCode() === 1452 ? "solicitante_invalido" : "error";
}

$conexion->close();

header("Location: solicitudes.php?estadophp=$estado");
exit;