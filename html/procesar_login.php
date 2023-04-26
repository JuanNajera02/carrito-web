<?php
// Obtener los valores del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$usuario2 = 'usuario_' . $usuario;

// Validar si las cookies existen con los datos de nombre de usuario y contraseña
if (isset($_COOKIE[$usuario2]) && $_COOKIE[$usuario2] == $contrasena) {
    // Aquí puedes realizar la lógica de verificación adicional, como verificar en una base de datos si el usuario y contraseña son válidos
    // Si la verificación es exitosa, puedes permitir el acceso y redirigir al usuario a la página de inicio de sesión exitosa
    // por ejemplo:

    // Almacenar el nombre de usuario en una variable de sesión
    session_start();
    $_SESSION['usuario'] = $usuario;

    // Redireccionar a la página de inicio de sesión exitosa
    header("Location: inicio.php");
    exit();
} else {
    header("Location: inicio.php");
    // Si las cookies no existen o los datos de usuario y contraseña no coinciden, redirigir al usuario a la página de inicio de sesión con un mensaje de error

    setcookie('mensaje_exito3', 'Credenciales Incorrectas.', time() + 5, "/"); 
}
?>
