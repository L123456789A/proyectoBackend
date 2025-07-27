<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/includes/db.php";

class Usuario
{
    private $pdo;

        public function __construct() {
        $conexion = new DBConection();
        $this->pdo = $conexion->conectar();
    }

    public function listarUsuarios()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerUsuario($idusuario)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE idusuario = ?");
        $stmt->execute([$idusuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarUsuario($data)
    {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET nomusuario = :nomusuario, password = :password, apellidos = :apellidos, nombres = :nombres, email = :email, estado = :estado WHERE idusuario = :idusuario");
        return $stmt->execute([
            ":nomusuario" => $data["nomusuario"],
            ":password"   => $data["password"],
            ":apellidos"  => $data["apellidos"],
            ":nombres"    => $data["nombres"],
            ":email"      => $data["email"],
            ":estado"     => $data["estado"],
            ":idusuario"  => $data["idusuario"]
        ]);
    }

    public function eliminarUsuario($idusuario)
    {
        $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE idusuario = ?");
        return $stmt->execute([$idusuario]);
    }

    public function guardarUsuario($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (idusuario, nomusuario, password, apellidos, nombres, email, estado) VALUES (:idusuario, :nomusuario, :password, :apellidos, :nombres, :email, :estado)");
        return $stmt->execute([
            ":idusuario"  => $data["idusuario"],
            ":nomusuario" => $data["nomusuario"],
            ":password"   => password_hash($data["password"], PASSWORD_DEFAULT),
            ":apellidos"  => $data["apellidos"],
            ":nombres"    => $data["nombres"],
            ":email"      => $data["email"],
            ":estado"     => $data["estado"]
        ]);
    }
    public function cambiarPassword($idusuario, $nuevaPassword)
    {
        $sql = "UPDATE usuarios SET password = :password WHERE idusuario = :idusuario";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'password' => password_hash($nuevaPassword, PASSWORD_DEFAULT),
            'idusuario' => $idusuario
        ]);
    }
}