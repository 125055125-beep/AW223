<?php
session_start();
require "conexion.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario  = trim($_POST["usuario"] ?? "");
    $password = $_POST["password"] ?? "";

    $stmt = $conexion->prepare("SELECT id, password FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($id, $hash);

    if ($stmt->fetch() && password_verify($password, $hash)) {
        session_regenerate_id(true);       // evita fijación de sesión
        $_SESSION["usuario_id"] = $id;     // IMPORTANTE: marca de "sesión iniciada"
        $_SESSION["usuario"]    = $usuario;
        header("Location: consulta_mensajes.php");
        exit;
    }
    // Mismo mensaje si falla el usuario o la contraseña
    $error = "Credenciales incorrectas";
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Login</title></head>
<body>
    <h1>Iniciar sesión</h1>
    <?php if ($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post">
        <input type="text" name="usuario" placeholder="Usuario" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>