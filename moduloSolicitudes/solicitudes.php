solicitudes.php

<?php
require_once "consulta_solicitudes.php";

$rsSolicitantes = consultaSolicitantes();
$rsEquipos      = consultaEquiposDisponibles();
$rsSolicitudes  = consultaSolicitudes();

// Etiquetas legibles para los estados guardados en la base
$etiquetasEstado = [
    "pendiente"  => "Pendiente",
    "en_proceso" => "En proceso",
    "resuelta"   => "Resuelta",
    "cancelada"  => "Cancelada",
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte - Solicitudes</title>
    <link rel="stylesheet" href="CSS/soporte.css">
</head>
<body>

    <!-- Encabezado -->
    <header>
        <h1>Soporte técnico universitario</h1>
        <p>Bienvenido · Registro y consulta de solicitudes</p>
    </header>

    <!-- Navegación -->
    <nav>
        <a href="usuarios.php">Usuarios y equipos</a>
        <a href="solicitudes.php" class="activa">Solicitudes</a>
    </nav>

    <main>

        <!-- ============ REGISTRAR SOLICITUD ============ -->
        <section class="seccion-admin">
            <h2>
                Nueva solicitud
                <span class="etiqueta-vista">Admin</span>
            </h2>

            <form method="POST" action="registrar_solicitud.php"
                  class="formulario" onsubmit="return validarSolicitud(this);" novalidate>

                <div class="fila-campos">
                    <div class="campo">
                        <label for="id_usuario">Solicitante</label>
                        <select id="id_usuario" name="id_usuario">
                            <option value="">Seleccione un usuario</option>
                            <?php while ($s = mysqli_fetch_assoc($rsSolicitantes)):
                                $nombre = trim($s['nombre'] . ' ' . $s['apellido_paterno'] . ' ' . ($s['apellido_materno'] ?? ''));
                            ?>
                                <option value="<?= (int) $s['id'] ?>"><?= htmlspecialchars($nombre) ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="id_equipo">Equipo <span class="ayuda">(solo disponibles)</span></label>
                        <select id="id_equipo" name="id_equipo">
                            <option value="">Seleccione un equipo</option>
                            <?php while ($eq = mysqli_fetch_assoc($rsEquipos)): ?>
                                <option value="<?= (int) $eq['id'] ?>">
                                    <?= htmlspecialchars($eq['nombre_equipo']) ?>
                                    <?= $eq['ubicacion'] ? ' · ' . htmlspecialchars($eq['ubicacion']) : '' ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>

                <div class="campo">
                    <label for="observacion">Descripción del problema</label>
                    <textarea id="observacion" name="observacion" rows="4"
                              placeholder="Describe qué le pasa al equipo"></textarea>
                </div>

                <p class="ayuda">La solicitud se registra con estado <strong>Pendiente</strong>.</p>

                <button type="submit">Registrar solicitud</button>
            </form>
        </section>

        <!-- ============ LISTA DE SOLICITUDES ============ -->
        <section class="seccion-admin">
            <h2>
                Solicitudes registradas
                <span class="etiqueta-vista">Admin</span>
            </h2>

            <div class="tabla-contenedor">
                <table class="tabla-mensajes">
                    <thead>
                        <tr>
                            <th class="col-id">ID</th>
                            <th>Solicitante</th>
                            <th>Equipo</th>
                            <th>Problema</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($rsSolicitudes) === 0): ?>
                            <tr class="fila-vacia">
                                <td colspan="6">Todavía no hay solicitudes registradas.</td>
                            </tr>
                        <?php endif; ?>

                        <?php while ($sol = mysqli_fetch_assoc($rsSolicitudes)):
                            $nombreSolicitante = trim($sol['nombre'] . ' ' . $sol['apellido_paterno'] . ' ' . ($sol['apellido_materno'] ?? ''));
                            $estado = $sol['estado'];
                        ?>
                            <tr>
                                <td class="col-id"><?= (int) $sol['id'] ?></td>
                                <td><?= htmlspecialchars($nombreSolicitante) ?></td>
                                <td><?= htmlspecialchars($sol['nombre_equipo']) ?></td>
                                <td><?= htmlspecialchars($sol['observacion']) ?></td>
                                <td>
                                    <span class="badge est-<?= htmlspecialchars($estado) ?>">
                                        <?= htmlspecialchars($etiquetasEstado[$estado] ?? $estado) ?>
                                    </span>
                                </td>
                                <td><?= date('d/m/Y H:i', strtotime($sol['fecha_solicitud'])) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </section>

    </main>

    <!-- Pie de página -->
    <footer>
        <p>© 2026 Sistema de soporte técnico universitario</p>
        <p>Práctica No. 8 · Integrante 2</p>
    </footer>

    <script src="JS/validaciones_solicitudes.js"></script>
    <script src="JS/AlertInsert.js"></script>
</body>
</html>