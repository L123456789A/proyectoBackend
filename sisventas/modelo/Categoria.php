<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/includes/db.php";
ob_start();

class Categoria {
    private $pdo;

    public function __construct() {
        $conexion = new DBConection();
        $this->pdo = $conexion->conectar();
    }

    public function listar() {
        $stmt = $this->pdo->prepare("SELECT * FROM categorias");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM categorias WHERE idcategoria = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function registrar($data) {
        $stmt = $this->pdo->prepare("INSERT INTO categorias (idcategoria, nomcategoria) VALUES (?, ?)");
        return $stmt->execute([
            $data['idcategoria'],
            $data['nomcategoria']
        ]);
    }

    public function actualizar($data) {
        $stmt = $this->pdo->prepare("UPDATE categorias SET nomcategoria = ? WHERE idcategoria = ?");
        return $stmt->execute([
            $data['nomcategoria'],
            $data['idcategoria']
        ]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM categorias WHERE idcategoria = ?");
        return $stmt->execute([$id]);
    }
}
