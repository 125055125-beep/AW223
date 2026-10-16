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
<!-----principal----->
    <main>
        <section id="mensajes">
            <div class="tarjeta">
                <h2>Mensajes Recibidos</h2>

                <div class="tabla-contenedor">
                    <table class="tabla-mensajes">

                      <table class="tabla-mensajes">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Mensaje</th>
                            <th>Fecha</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          require "consulta_mensajes.php";
                          $rsMensaje = consultaMensajes();

                          while ($arrMensajes = mysqli_fetch_array($rsMensaje)) {
                              echo "<tr>
                          <td>" . $arrMensajes['nombre'] . "</td>
                          <td>" . $arrMensajes['correo'] . "</td>
                          <td>" . $arrMensajes['mensaje'] . "</td>
                          <td>" . $arrMensajes['timeStaps'] . "</td>
                          <td>
                          <a href='editar.php?id=" . $arrMensajes['id'] . "' title='Editar'>✎</a>
                          <a href='borrar.php?id=" . $arrMensajes['id'] . "' title='Borrar'>⌫</a>
                        </td>
                    </tr>";
                    }?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <footer>
        <p>© <?= date('Y') ?> Mi Portafolio</p>
        <p>Práctica de Programación Web</p>
    </footer>

</body>
</html>
