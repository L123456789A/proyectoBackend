<?php
require_once $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/CondicionControlador.php";
$controlador = new CondicionControlador();

if (isset($_GET['id'])) {
    $controlador->eliminarCondicion($_GET['id']);
}

header("Location: listado.php");
exit;
