<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/modelo/Categoria.php";
ob_start();

class CategoriaControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Categoria();
    }

    public function listarCategorias() {
        return $this->modelo->listar();
    }

    public function guardarCategoria($data) {
        return $this->modelo->registrar($data);
    }

    public function obtenerCategoria($id) {
        return $this->modelo->obtenerPorId($id);
    }

    public function actualizarCategoria($data) {
        return $this->modelo->actualizar($data);
    }

    public function eliminarCategoria($id) {
        return $this->modelo->eliminar($id);
    }
}
