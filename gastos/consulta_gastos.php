<?php

function consultaGastos(){
    require_once "conexion.php";


    $selectGts= "select * from gastos";

    try{
        $rsMsj= mysqli_query($conexion, $selectGts);
        mysqli_close($conexion);
        return $rsMsj;

    }catch(Exception){
        die('Algo paso al consultar: '.$e->getMessage());

    }
} 