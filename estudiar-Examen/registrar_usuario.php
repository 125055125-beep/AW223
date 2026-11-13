<?php
require_once "conexion.php";

 /* evita que el ARCHIVO SE ABRA SIN ENVIAR EL FORMULARIO */

 if($_SERVER["REQUUEST_METHOD"] !== "POST"){
   die("envia el fomulario desde la pagina de usuarios");
 }

 $nombre = trim($_POST["nombre"]?? "");
 $paterno=trim($_POST["paterno"]?? "");
 $materno=trim($_POST["materno"]?? "");

 $materno= $materno === ""? null: $materno;
 $correo= trim($_POST["correo"]??"");
 $clave=$_POST["contraseña"]??"";
 $idRol=(int)($_POST["id_rol"]?? 0);


 /* validaciones en el servidor */
 if($nombre === "" || $paterno == "" || $correo === "" || strlen($clave) <6 || $idRol <=0){
    header("Location: usuarios.php?estadophp=campos_invalidos");
    exit;
 }

 if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
    header("Location: usuarios.php?estadophp=correo_invaido");
    exit;
 }

/*  contraseña cifrada */
$hash= password_hash($clave, PASSWORD_DEFAULT);

try{
    $stmt= $conexion->prepare(
        "INSERT INTO usuarios(nombre,apellido_paterno,apellido_materno, correo,contraseña, id_rol)
        VALUES(?,?,?,?,?,?)"
    );
    $stmt->bind_param("sssss", $nombre, $paterno, $materno, $correo, $hash, $idRol);
    $stmt->execute();
    $stmt->close();
    $estado= "usuario_guaradado";
}catch(mysqli_sql_exception $e){
    /* 1062= correo repetido (UNIQUE). 1452= el rol no existe (llave foranea) */
    if($e->getCode() === 1062){
        $estado= "correo_duplicado";
    }elseif($e->getCode() === 1452){
        $estado= "rol_invalido";
    }else{
        $estado= "error";
    }
}

$conexion->close();
header("Location: usuarios.php?estadophp=$estado");
exit;