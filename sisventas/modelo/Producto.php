<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/includes/db.php";

class Producto {
    private $pdo;

    public function __construct() {
        $conexion = new DBConection();
        $this->pdo = $conexion->conectar();
    }

    // Listar todos los productos
    public function listar() {
        $stmt = $this->pdo->prepare("SELECT * FROM productos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener producto por ID
    public function obtenerPorId($idproducto) {
        $stmt = $this->pdo->prepare("SELECT * FROM productos WHERE idproducto = ?");
        $stmt->execute([$idproducto]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Registrar nuevo producto
    public function registrar($data) {
        $stmt = $this->pdo->prepare("INSERT INTO productos 
            (idproducto, idproveedor, nomproducto, unimed, stock, cosuni, preuni, idcategoria, estado) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['idproducto'],
            $data['idproveedor'],
            $data['nomproducto'],
            $data['unimed'],
            $data['stock'],
            $data['cosuni'],
            $data['preuni'],
            $data['idcategoria'],
            $data['estado']
        ]);
    }

    // Actualizar producto existente
    public function actualizar($data) {
        $stmt = $this->pdo->prepare("UPDATE productos SET 
            idproveedor = ?, 
            nomproducto = ?, 
            unimed = ?, 
            stock = ?, 
            cosuni = ?, 
            preuni = ?, 
            idcategoria = ?, 
            estado = ?
            WHERE idproducto = ?");
        return $stmt->execute([
            $data['idproveedor'],
            $data['nomproducto'],
            $data['unimed'],
            $data['stock'],
            $data['cosuni'],
            $data['preuni'],
            $data['idcategoria'],
            $data['estado'],
            $data['idproducto']
        ]);
    }

    // Eliminar producto por ID
    public function eliminar($idproducto) {
        $stmt = $this->pdo->prepare("DELETE FROM productos WHERE idproducto = ?");
        return $stmt->execute([$idproducto]);
    }

    public function obtenerStock() {
        $stmt = $this->pdo->prepare("
            SELECT p.idproducto, p.nomproducto, p.unimed, p.stock, p.preuni, c.nomcategoria
            FROM productos p
            INNER JOIN categorias c ON p.idcategoria = c.idcategoria
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
