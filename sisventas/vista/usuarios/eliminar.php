<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/UsuarioControlador.php";

if (isset($_GET['id'])) {
    $controlador = new UsuarioControlador();
    $controlador->eliminarUsuario($_GET['id']);
}

header("Location: listado.php");
exit;
