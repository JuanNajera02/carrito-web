<?php
// Obtener los valores del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Validar si el nombre de usuario ya existe en la cookie
if (isset($_COOKIE['usuario_' . $usuario])) {
    setcookie('mensaje_exito5', "El nombre de usuario ya existe en la cookie.", time() + 5, "/"); // La cookie expira en 5 segundos
    header("Location: registro.php");
} else {
    // Escapar los datos ingresados por el usuario
    $usuario = htmlspecialchars($usuario);
    $contrasena = htmlspecialchars($contrasena);

    // Crear un nombre de cookie único para el usuario
    $nombreCookie = 'usuario_' . $usuario;

    // Crear una cookie con el nombre de usuario y contraseña
    setcookie($nombreCookie, $contrasena, time() + 3600, "/"); // Expira en 1 hora

    setcookie('mensaje_exito2', 'Se ha registrado exitosamente el usuario.', time() + 5, "/"); // La cookie expira en 5 segundos

    // Redireccionar a la página de inicio
    header("Location: login.php");
    exit();
}
?>
