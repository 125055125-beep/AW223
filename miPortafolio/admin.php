<?php

$mensajes = [
    ['id' => 1, 'nombre' => 'Ana',  'correo' => 'ana@example.com',  'mensaje' => 'Hola, me interesa tu portafolio.'],
    ['id' => 2, 'nombre' => 'José', 'correo' => 'jose@example.com', 'mensaje' => 'Quisiera más información sobre tus proyectos.'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Administración</title>
    <link rel="stylesheet" href="./CSS/estilos.css">
    <link rel="stylesheet" href="./CSS/admin.css">
</head>
<body>

    <header>
        <h1>Zona Administracion</h1>
        <p>Mensajes Recibidos</p>
    </header>

    <nav>
        <!-- Regreso al portafolio -->
        <a href="index.html" class="icono-nav" title="Volver al portafolio" aria-label="Volver al portafolio">
            <svg class="icono" viewBox="0 0 24 24"><path d="M3 11l9-8 9 8"/><path d="M5 10v10h14V10"/><path d="M10 20v-6h4v6"/></svg>
        </a>
    </nav>

    <main>
        <section id="mensajes">
            <div class="tarjeta">
                <h2>Mensajes Recibidos</h2>

                <div class="tabla-contenedor">
                    <table class="tabla-mensajes">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Mensaje</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (empty($mensajes)): ?>
                            <tr><td colspan="5" class="vacio">Aún no hay mensajes.</td></tr>
                        <?php else: ?>
                            <?php foreach ($mensajes as $m): ?>
                            <tr>
                                <td><?= (int)$m['id'] ?></td>
                                <td><?= htmlspecialchars($m['nombre']) ?></td>
                                <td><?= htmlspecialchars($m['correo']) ?></td>
                                <td><?= htmlspecialchars($m['mensaje']) ?></td>
                                <td class="opciones">
                                    <!-- Editar: abre editar.php con el id del mensaje -->
                                    <a href="editar.php?id=<?= (int)$m['id'] ?>" title="Editar mensaje" aria-label="Editar mensaje <?= (int)$m['id'] ?>">
                                        <svg class="icono" viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4z"/></svg>
                                    </a>
                                    <!-- Borrar: borrar.php se creará en la práctica con base de datos -->
                                    <a href="borrar.php?id=<?= (int)$m['id'] ?>" title="Borrar mensaje" aria-label="Borrar mensaje <?= (int)$m['id'] ?>"
                                       onclick="return confirm('¿Seguro que quieres borrar este mensaje?');">
                                        <svg class="icono" viewBox="0 0 24 24"><path d="M3 6h18"/><path d="M8 6V4h8v2"/><path d="M6 6l1 14h10l1-14"/><path d="M10 11v5M14 11v5"/></svg>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>© <?= date('Y') ?> Mi Portafolio</p>
        <p>Práctica de Programación Web</p>
    </footer>

</body>
</html>
