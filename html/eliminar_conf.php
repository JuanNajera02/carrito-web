<?php
ob_start(); // Habilitar el almacenamiento en búfer de salida

foreach ($_COOKIE as $nombre => $valor) {
    if (strpos($nombre, 'usuario_') === 0) {
        $nombreUsuario = substr($nombre, 8);
        session_start();

        // Obtener el nombre de usuario de la variable de sesión
        $nombreUsuario = $_SESSION['usuario'];

        break;
    }
}

// Establecer el valor de expiración en una fecha anterior para eliminar las cookies
$expiracion = time() - 3600; // Restar una hora al tiempo actual

// Establecer las cookies con un valor vacío y una fecha de expiración pasada
setcookie('color_fondo_' . $nombreUsuario, '', $expiracion, '/');
setcookie('color_letra_' . $nombreUsuario, '', $expiracion, '/');
setcookie('color_fondo_header_' . $nombreUsuario, '', $expiracion, '/');
setcookie('color_fondo_footer_' . $nombreUsuario, '', $expiracion, '/');
setcookie('tamano_letra_' . $nombreUsuario, '', $expiracion, '/');

ob_end_flush(); // Enviar el contenido almacenado en búfer
header("Location: configuracion.php"); // Redirigir a la página de configuración
exit(); // Salir del script para asegurarse de que no se envíe más contenido después de la redirección

?>
