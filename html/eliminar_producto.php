<?php

foreach ($_COOKIE as $nombre => $valor) {
    if (strpos($nombre, 'usuario_') === 0) {
        $nombreUsuario = substr($nombre, 8);
        session_start();

// Obtener el nombre de usuario de la variable de sesión
        $nombreUsuario = $_SESSION['usuario'];

        break;
    }
}

// Verificar si se ha enviado el formulario
if(isset($_POST['eliminar']) && isset($_POST['idProductoEliminar'])){
    // Obtener el ID del producto a eliminar
    $idProductoEliminar = $_POST['idProductoEliminar'];

    // Verificar si la cookie del carrito del usuario existe
    if (isset($_COOKIE['usuario_' . $nombreUsuario . '_carrito'])) {
        // Obtener el array de productos del carrito del usuario
        $productosCarrito = unserialize($_COOKIE['usuario_' . $nombreUsuario . '_carrito']);

        // Buscar el índice del producto a eliminar en el array
        $indiceProducto = array_search($idProductoEliminar, $productosCarrito);

        // Si se encuentra el producto en el array, eliminarlo
        if ($indiceProducto !== false) {
            array_splice($productosCarrito, $indiceProducto, 1);
        }

        // Guardar el array actualizado en la cookie del carrito del usuario
        setcookie('usuario_' . $nombreUsuario . '_carrito', serialize($productosCarrito), time() + 3600, '/');
    }
}

// Redirigir de regreso a la página del carrito
header('Location: carrito.php');
exit();
?>
