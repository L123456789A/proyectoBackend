<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/modelo/Producto.php";

class ProductoControlador
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new Producto();
    }

    public function listarProductos()
    {
        return $this->modelo->listar();
    }

    public function obtenerProducto($id)
    {
        return $this->modelo->obtenerPorId($id);
    }

    public function guardarProducto($datos)
    {
        return $this->modelo->registrar([
            'idproducto'   => $datos['idproducto'],
            'idproveedor'  => $datos['idproveedor'],
            'nomproducto'  => $datos['nomproducto'],
            'unimed'       => $datos['unimed'],
            'stock'        => $datos['stock'],
            'cosuni'       => $datos['cosuni'],
            'preuni'       => $datos['preuni'],
            'idcategoria'  => $datos['idcategoria'],
            'estado'       => $datos['estado']
        ]);
    }

    public function actualizarProducto($datos)
    {
        return $this->modelo->actualizar([
            'idproducto'   => $datos['idproducto'],
            'idproveedor'  => $datos['idproveedor'],
            'nomproducto'  => $datos['nomproducto'],
            'unimed'       => $datos['unimed'],
            'stock'        => $datos['stock'],
            'cosuni'       => $datos['cosuni'],
            'preuni'       => $datos['preuni'],
            'idcategoria'  => $datos['idcategoria'],
            'estado'       => $datos['estado']
        ]);
    }

    public function eliminarProducto($id)
    {
        return $this->modelo->eliminar($id);
    }

    public function consultarStock()
    {
        $producto = new Producto();
        return $producto->obtenerStock();
    }
}
