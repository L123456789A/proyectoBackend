<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/ProveedorControlador.php";
$controlador = new ProveedorControlador();
$controlador->eliminarProveedor($_GET['id']);
header("Location: listado.php");
exit;
