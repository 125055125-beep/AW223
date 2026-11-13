<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen2parcial</title>
    <link  rel= "stylesheet" href="./CSS/estilos.css">

</head>
<body>
    <!-----encabezado------>
    <header>
        <h1>Examen 2do Parcial</h1>
        <p>este es mi examen de segundo parcial</p>
        <button type= "button" id="btn-mensaje">mostrar mensaje</button>
    </header>

    <!-----navegacion----->
    <nav>
        <a href="#inicio">inicio</a>
        <a href="#contactos">contactos</a>
        <a href="#admin">admin</a>
    </nav>

    <!-----contenido------->
    <main>
        <section id="inicio" class="seccion-inicio">
        <div class="seccion-contenido">
            <h2>Hola soy schoenstatt judith</h2>
            <p> este es mi examen de 2 paracial como estudiante de proframacion web</p>

        </div>

        </section>
   
    <!-----seccion de contactos---------->
    <section id="contactos">
        <h2>Contactos</h2>
        <form id="formulario" action="guardar_mensaje.php" method="post">


        <div class="campo">
            <label for="nombre">Nombre:</label>
            <input type="text"
            id="nombre"
            name="txtnombre"
            placeholder="escribe aqui tu nombre" required>
        </div>

        <div class="campo">
            <label for="correo">Correo electrónico:</label>
            <input type="email"
            id="email"
            name="txtemail"
            placeholder="ejemplo@correo.com"required>
        </div>


        <div class="campo">
            <label for="mensaje">Mensaje:</label>
            <input type="mensaje"
            id="mensaje"
            name="txtmensaje"
            placeholder="escribe tu mensaje"required>
        </div>
        <button type="submit">
            enviar mesaje
        </button>

        </form>

    </section>


     </main>
     <!---pie de pagina------>
<footer>
        <p>examen 2 parcial</p>
</footer>

 <script src="./js/AlertsInsert.js"></script>

   
</body>
</html>