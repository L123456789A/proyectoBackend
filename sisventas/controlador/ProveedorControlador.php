<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/modelo/Proveedor.php";
ob_start();

class ProveedorControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Proveedor();
    }

    public function listarProveedores() {
        return $this->modelo->listar();
    }

    public function obtenerProveedor($id) {
        return $this->modelo->obtenerPorId($id);
    }

    public function guardarProveedor($data) {
        return $this->modelo->registrar($data);
    }

    public function actualizarProveedor($data) {
        return $this->modelo->actualizar($data);
    }

    public function eliminarProveedor($id) {
        return $this->modelo->eliminar($id);
    }
}
