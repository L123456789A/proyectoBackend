<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/ClienteControlador.php";

if (isset($_GET['id'])) {
    $controlador = new ClienteControlador();
    $controlador->eliminarCliente($_GET['id']);
}

header("Location: listado.php");
exit();
ob_end_flush();