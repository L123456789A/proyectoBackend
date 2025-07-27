<?php
require_once $_SERVER['DOCUMENT_ROOT']."/sisventas/modelo/Condicion.php";

class CondicionControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Condicion();
    }

    public function listarCondiciones() {
        return $this->modelo->listar();
    }

    public function obtenerCondicion($id) {
        return $this->modelo->obtener($id);
    }

    public function guardarCondicion($data) {
        return $this->modelo->registrar($data);
    }

    public function actualizarCondicion($data) {
        return $this->modelo->actualizar($data);
    }

    public function eliminarCondicion($id) {
        return $this->modelo->eliminar($id);
    }
}
