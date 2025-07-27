<?php
// modelo/Condicion.php
require_once $_SERVER['DOCUMENT_ROOT']."/sisventas/includes/db.php";

class Condicion {
    private $pdo;

    public function __construct() {
        $conexion = new DBConection();
        $this->pdo = $conexion->conectar();
    }

    public function listar() {
        $stmt = $this->pdo->prepare("SELECT * FROM condicionventa");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtener($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM condicionventa WHERE idcondicion = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function registrar($data) {
        $stmt = $this->pdo->prepare("INSERT INTO condicionventa (idcondicion, nomcondicion) VALUES (?, ?)");
        return $stmt->execute([$data['idcondicion'], $data['nomcondicion']]);
    }

    public function actualizar($data) {
        $stmt = $this->pdo->prepare("UPDATE condicionventa SET nomcondicion = ? WHERE idcondicion = ?");
        return $stmt->execute([$data['nomcondicion'], $data['idcondicion']]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM condicionventa WHERE idcondicion = ?");
        return $stmt->execute([$id]);
    }
}