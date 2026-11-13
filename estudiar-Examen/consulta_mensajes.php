<?php
function consultaMensajes(){
    require "conexion.php";

    $selectMsj = "SELECT * FROM mensajes ORDER BY fecha DESC";
    $rsMsj = mysqli_query($conexion, $selectMsj);

    if ($rsMsj === false) {
        die('Algo pasó al realizar la consulta: ' . mysqli_error($conexion));
    }

    mysqli_close($conexion);
    return $rsMsj;
}