<?php
// editar.php - Muestra el formulario con los datos del registro seleccionado
require "conexion.php";
 
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
 
$stmt = $conexion->prepare("SELECT id, nombre, correo, mensaje FROM mensajes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$registro = $stmt->get_result()->fetch_assoc();
 
$error = $_GET['error'] ?? '';
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
        <a href="index.php" class="icono-nav" title="Volver al portafolio" aria-label="Volver al portafolio">
            <svg class="icono" viewBox="0 0 24 24"><path d="M3 11l9-8 9 8"/><path d="M5 10v10h14V10"/><path d="M10 20v-6h4v6"/></svg>
        </a>
    </nav>
 
    <main>
        <section id="editar">
            <div class="tarjeta">
                <h2>Editar Mensaje</h2>
 
                <?php if (!$registro): ?>
                    <p class="aviso error">No se encontró el mensaje solicitado.</p>
                <?php else: ?>
                    <?php if ($error === 'vacio'): ?>
                        <p class="aviso error">Todos los campos son obligatorios.</p>
                    <?php elseif ($error === 'correo'): ?>
                        <p class="aviso error">Escribe un correo válido.</p>
                    <?php endif; ?>
 
                    <form id="formulario" method="post" action="actualizar.php">
                        <input type="hidden" name="id" value="<?= (int)$registro['id'] ?>">
 
                        <div class="campo">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre"
                                   value="<?= htmlspecialchars($registro['nombre']) ?>">
                        </div>
 
                        <div class="campo">
                            <label for="correo">Correo electrónico</label>
                            <input type="email" id="correo" name="correo" placeholder="ejemplo@correo.com"
                                   value="<?= htmlspecialchars($registro['correo']) ?>">
                        </div>
 
                        <div class="campo">
                            <label for="mensaje">Mensaje</label>
                            <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje"><?= htmlspecialchars($registro['mensaje']) ?></textarea>
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
 
    <script>
        // Validación en el navegador: no permite enviar campos vacíos
        const form = document.getElementById("formulario");
        if (form) {
            form.addEventListener("submit", (e) => {
                const nombre = form.nombre.value.trim();
                const correo = form.correo.value.trim();
                const mensaje = form.mensaje.value.trim();
 
                if (nombre === "" || correo === "" || mensaje === "") {
                    e.preventDefault();
                    alert("Todos los campos son obligatorios");
                    return;
                }
                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo)) {
                    e.preventDefault();
                    alert("Escribe un correo válido, por ejemplo: ejemplo@correo.com");
                }
            });
        }
    </script>
 
</body>
</html>
 