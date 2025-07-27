<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/includes/db.php";

class Cliente {
    private $pdo;

    public function __construct() {
        $conexion = new DBConection();
        $this->pdo = $conexion->conectar();
    }

    // Listar todos los clientes
    public function listar() {
        $stmt = $this->pdo->prepare("SELECT * FROM clientes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un cliente por ID
    public function obtenerPorId($idcliente) {
        $stmt = $this->pdo->prepare("SELECT * FROM clientes WHERE idcliente = ?");
        $stmt->execute([$idcliente]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Registrar un nuevo cliente
    public function registrar($data) {
        $stmt = $this->pdo->prepare("INSERT INTO clientes (idcliente, nomcliente, ruccliente, dircliente, telcliente, emailcliente) 
                                     VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['idcliente'],
            $data['nomcliente'],
            $data['ruccliente'],
            $data['dircliente'],
            $data['telcliente'],
            $data['emailcliente']
        ]);
    }

    // Actualizar cliente
    public function actualizar($data) {
        $stmt = $this->pdo->prepare("UPDATE clientes SET nomcliente = ?, ruccliente = ?, dircliente = ?, telcliente = ?, emailcliente = ? 
                                     WHERE idcliente = ?");
        return $stmt->execute([
            $data['nomcliente'],
            $data['ruccliente'],
            $data['dircliente'],
            $data['telcliente'],
            $data['emailcliente'],
            $data['idcliente']
        ]);
    }

    // Eliminar cliente
    public function eliminar($idcliente) {
        $stmt = $this->pdo->prepare("DELETE FROM clientes WHERE idcliente = ?");
        return $stmt->execute([$idcliente]);
    }
}
