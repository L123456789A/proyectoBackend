<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/modelo/Venta.php";

class VentaControlador
{
    private $venta;

    public function __construct()
    {
        $this->venta = new Venta();
    }

    public function registrarVenta($data, $detalles)
    {
        return $this->venta->registrarVenta($data, $detalles);
    }

    public function obtenerClientes()
    {
        return $this->venta->obtenerClientes();
    }

    public function obtenerProductos()
    {
        return $this->venta->obtenerProductos();
    }

    public function obtenerCondiciones()
    {
        return $this->venta->obtenerCondiciones();
    }

    public function ventasDelDia()
    {
        return $this->venta->ventasPorDia();
    }

    public function ventasPorFechas($fechaini, $fechafin)
    {
        $venta = new Venta();
        return $venta->ventasPorFechas($fechaini, $fechafin);
    }

    public function ventasPorCliente($idcliente)
    {
        $venta = new Venta();
        return $venta->ventasPorCliente($idcliente);
    }

    public function listarClientes()
    {
        $venta = new Venta();
        return $venta->obtenerClientes();
    }

    public function ventasPorProducto($idproducto)
    {
        return $this->venta->ventasPorProducto($idproducto);
    }

    public function listarProductos()
    {
        return $this->venta->listarProductos();
    }

    public function rankingVentas()
    {
        return $this->venta->rankingVentas();
    }
}
