<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/modelo/Cliente.php";

class ClienteControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Cliente();
    }

    public function listarClientes() {
        return $this->modelo->listar();
    }

    public function obtenerCliente($id) {
        return $this->modelo->obtenerPorId($id);
    }

    public function guardarCliente($datos) {
        // El modelo espera: idcliente, nomcliente, ruccliente, dircliente, telcliente, emailcliente
        return $this->modelo->registrar([
            'idcliente' => $datos['idcliente'],
            'nomcliente' => $datos['nomcliente'],
            'ruccliente' => $datos['ruccliente'],
            'dircliente' => $datos['dircliente'],
            'telcliente' => $datos['telcliente'],
            'emailcliente' => $datos['emailcliente'],
        ]);
    }

    public function actualizarCliente($datos) {
        return $this->modelo->actualizar([
            'idcliente' => $datos['idcliente'],
            'nomcliente' => $datos['nomcliente'],
            'ruccliente' => $datos['ruccliente'],
            'dircliente' => $datos['dircliente'],
            'telcliente' => $datos['telcliente'],
            'emailcliente' => $datos['emailcliente'],
        ]);
    }

    public function eliminarCliente($id) {
        return $this->modelo->eliminar($id);
    }
}
