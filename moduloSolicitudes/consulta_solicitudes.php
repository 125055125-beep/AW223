consulta_solicitudes.php

<?php
require_once "conexion.php";

// Usuarios disponibles para elegir al solicitante
function consultaSolicitantes() {
    global $conexion;

    $sql = "SELECT id, nombre, apellido_paterno, apellido_materno
            FROM usuarios
            ORDER BY apellido_paterno, nombre";

    try {
        return mysqli_query($conexion, $sql);
    } catch (Exception $e) {
        die("Algo pasó al consultar los solicitantes: " . $e->getMessage());
    }
}

// Solo equipos con disponibilidad = 'disponible'
function consultaEquiposDisponibles() {
    global $conexion;

    $sql = "SELECT id, nombre_equipo, ubicacion
            FROM equipos
            WHERE disponibilidad = 'disponible'
            ORDER BY nombre_equipo";

    try {
        return mysqli_query($conexion, $sql);
    } catch (Exception $e) {
        die("Algo pasó al consultar los equipos: " . $e->getMessage());
    }
}

// Solicitudes con el nombre del usuario y del equipo
function consultaSolicitudes() {
    global $conexion;

    $sql = "SELECT s.id,
                   u.nombre, u.apellido_paterno, u.apellido_materno,
                   e.nombre_equipo,
                   s.observacion,
                   s.estado,
                   s.fecha_solicitud
            FROM solicitudes s
            JOIN usuarios u ON u.id = s.id_usuario
            JOIN equipos  e ON e.id = s.id_equipo
            ORDER BY s.fecha_solicitud DESC, s.id DESC";

    try {
        return mysqli_query($conexion, $sql);
    } catch (Exception $e) {
        die("Algo pasó al consultar las solicitudes: " . $e->getMessage());
    }
}