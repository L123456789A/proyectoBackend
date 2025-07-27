<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/includes/db.php";
ob_start();

class Proveedor {
    private $pdo;

    public function __construct() {
        $conexion = new DBConection();
        $this->pdo = $conexion->conectar();
    }

    public function listar() {
        $stmt = $this->pdo->prepare("SELECT * FROM proveedores");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($idproveedor) {
        $stmt = $this->pdo->prepare("SELECT * FROM proveedores WHERE idproveedor = ?");
        $stmt->execute([$idproveedor]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function registrar($data) {
        $stmt = $this->pdo->prepare("INSERT INTO proveedores (idproveedor, nomproveedor, rucproveedor, dirproveedor, telproveedor, emailproveedor) 
                                     VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['idproveedor'],
            $data['nomproveedor'],
            $data['rucproveedor'],
            $data['dirproveedor'],
            $data['telproveedor'],
            $data['emailproveedor']
        ]);
    }

    public function actualizar($data) {
        $stmt = $this->pdo->prepare("UPDATE proveedores SET nomproveedor = ?, rucproveedor = ?, dirproveedor = ?, telproveedor = ?, emailproveedor = ? 
                                     WHERE idproveedor = ?");
        return $stmt->execute([
            $data['nomproveedor'],
            $data['rucproveedor'],
            $data['dirproveedor'],
            $data['telproveedor'],
            $data['emailproveedor'],
            $data['idproveedor']
        ]);
    }

    public function eliminar($idproveedor) {
        $stmt = $this->pdo->prepare("DELETE FROM proveedores WHERE idproveedor = ?");
        return $stmt->execute([$idproveedor]);
    }
}
