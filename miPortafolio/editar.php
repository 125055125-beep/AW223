<?php
$mensajes = [
    1 => ['nombre' => 'Ana',  'email' => 'ana@example.com',  'mensaje' => 'Hola, me interesa tu portafolio.'],
    2 => ['nombre' => 'José', 'email' => 'jose@example.com', 'mensaje' => 'Quisiera más información sobre tus proyectos.'],
];

$id = isset($_GET['id']) ? (int)$_GET['id'] : (int)($_POST['id'] ?? 0);
$actual = $mensajes[$id] ?? null;
$aviso = '';

if ($actual && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $actual['nombre']  = trim($_POST['nombre']  ?? '');
    $actual['email']   = trim($_POST['email']   ?? '');
    $actual['mensaje'] = trim($_POST['mensaje'] ?? '');
    // TODO (práctica con BD): aquí va el UPDATE a la base de datos.
    $aviso = 'Mensaje actualizado correctamente.';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar mensaje</title>
    <link rel="stylesheet" href="./CSS/estilos.css">
    <link rel="stylesheet" href="./CSS/admin.css">
</head>
<body>

    <header>
        <h1>Zona Administracion</h1>
        <p>Formulario para Editar</p>
    </header>

    <nav>
        <!-- Regreso a la zona de admin -->
        <a href="admin.php" class="icono-nav" title="Volver a la zona de administración" aria-label="Volver a la zona de administración">
            <svg class="icono" viewBox="0 0 24 24"><path d="M21 12a9 9 0 11-3-6.7"/><path d="M21 3v6h-6"/></svg>
        </a>
        <!-- Regreso al portafolio -->
        <a href="index.html" class="icono-nav" title="Volver al portafolio" aria-label="Volver al portafolio">
            <svg class="icono" viewBox="0 0 24 24"><path d="M3 11l9-8 9 8"/><path d="M5 10v10h14V10"/><path d="M10 20v-6h4v6"/></svg>
        </a>
    </nav>

    <main>
        <section id="editar">
            <div class="tarjeta">
            <h2>Editar Mensaje</h2>

            <?php if (!$actual): ?>
                <p class="aviso error">No se encontró el mensaje solicitado.</p>
            <?php else: ?>
                <?php if ($aviso): ?><p class="aviso"><?= htmlspecialchars($aviso) ?></p><?php endif; ?>

                <form id="formulario" method="post" action="editar.php?id=<?= $id ?>">
                    <input type="hidden" name="id" value="<?= $id ?>">

                    <div class="campo">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre"
                               value="<?= htmlspecialchars($actual['nombre']) ?>" required>
                    </div>

                    <div class="campo">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" placeholder="ejemplo@correo.com"
                               value="<?= htmlspecialchars($actual['email']) ?>" required>
                    </div>

                    <div class="campo">
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje" required><?= htmlspecialchars($actual['mensaje']) ?></textarea>
                    </div>

                    <button type="submit">Actualizar Mensaje</button>
                </form>
            <?php endif; ?>
            </div>
        </section>
    </main>

    <footer>
        <p>© <?= date('Y') ?> Mi Portafolio</p>
        <p>Práctica de Programación Web</p>
    </footer>

</body>
</html>
