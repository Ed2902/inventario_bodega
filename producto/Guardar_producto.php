<?php
include_once "../login/verificar_sesion.php";
require_once("./producto.php");
require_once("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $referencia = $_POST['referencia'];
    $marca = $_POST['marca'];
    $descripcion = $_POST['descripcion'];
    $alto = $_POST['alto'];
    $ancho = $_POST['ancho'];
    $profundo = $_POST['profundo'];
    $tipo = $_POST['tipo'];
    $cliente = $_POST['cliente'];
    $id_usuarioFK = $_POST['id_usuarioFK'];

    // Crear una instancia de la clase Producto
    $producto = new Producto($id_producto, $nombre, $referencia, $marca, $descripcion, $alto, $ancho, $profundo, $tipo, $cliente, $id_usuarioFK);

    // Guardar el producto en la base de datos
    if ($producto->guardar()) {
        // Redirigir o mostrar un mensaje de éxito
        header("Location: index.html");
        exit;
    } else {
        // Mostrar un mensaje de error
        echo "dar click nuevamente para guardar el producto.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
