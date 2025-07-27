<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/CategoriaControlador.php";
ob_start();

$controlador = new CategoriaControlador();
$controlador->eliminarCategoria($_GET['id']);
header("Location: listado.php");
exit;
