<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/ProductoControlador.php";

if (isset($_GET['id'])) {
    $controlador = new ProductoControlador();
    $controlador->eliminarProducto($_GET['id']);
}

header("Location: listado.php");
exit();
