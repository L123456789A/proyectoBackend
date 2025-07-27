<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/modelo/Usuario.php";

class UsuarioControlador
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new Usuario();
    }

    public function listarUsuarios()
    {
        return $this->modelo->listarUsuarios();
    }

    public function obtenerUsuario($id)
    {
        return $this->modelo->obtenerUsuario($id);
    }

    public function registrarUsuario($data)
    {
        return $this->modelo->guardarUsuario($data);
    }

    public function actualizarUsuario($data)
    {
        return $this->modelo->actualizarUsuario($data);
    }

    public function eliminarUsuario($id)
    {
        return $this->modelo->eliminarUsuario($id);
    }

    public function cambiarPassword($idusuario, $nuevaPassword)
    {
        return $this->modelo->cambiarPassword($idusuario, $nuevaPassword);
    }
}
