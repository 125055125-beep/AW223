<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Gastos Personales</title>
    <link rel="stylesheet" href="./CSS/estilos.css">

    
</head>
<body>
     <!-----encabezado---->
     <header>
        <h1>Control de gastos personales</h1>


     </header>




    <!-- Seccion formulario -->
        <section id="Registar nuevo gasto">
            <h2>Registrar nuevo gasto</h2>

            <div>
                <div class="campo">
                    <label for="concepto">concepto</label>
                    <input type="text" 
                    id="concepto" 
                    name="txtconcepto" 
                    placeholder="Escribir concepto">
            </div>


            <div>
                <div class="campo">
                    <label for="monto">monto</label>
                    <input type="text" 
                    id="monto" 
                    name="txtmonto" 
                    placeholder="Escribir monto">
            </div>

            <div>
                <div class="campo">
                    <label for="Categoria">Categoria</label>
                    <input type="text" 
                    id="Categoria" 
                    name="txtcategoria" 
                    placeholder="categoria">
            </div>

            

             <button type="submit">
                    Registrar gasto
                </button>

         <!-----Listado------>
         <section id="listado de gastos">
        
            <div class="tarjeta">
                <h2>Listado de gastos</h2>

                <div class="tabla-contenedor">
                    <table class="Listado de gastos">

                      <table class="tabla-Gastos">
                    <thead>
                        <tr>
                            <th>Concepto</th>

                            <th>Categoria</th>

                            <th>Monto</th>

                            <th>Fecha</th>

                            <th>Estado</th>

                            <th>Accion</th>

                        </tr>
                    </thead>
                    <tbody>

                    
                   



    
</body>
</html>