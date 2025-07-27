<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/UsuarioControlador.php";

$controlador = new UsuarioControlador();
$usuario = $controlador->obtenerUsuario($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST['idusuario'] = $_GET['id'];
    $controlador->actualizarUsuario($_POST);
    header("Location: listado.php");
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";
?>

<h2>Editar Usuario</h2>
<form method="post">
    <div class="mb-3">
        <label>Nombre de Usuario</label>
        <input type="text" name="nomusuario" class="form-control" value="<?= $usuario['nomusuario'] ?>">
    </div>
    <div class="mb-3">
        <label>Contraseña</label>
        <input type="text" name="password" class="form-control" value="<?= $usuario['password'] ?>">
    </div>
    <div class="mb-3">
        <label>Apellidos</label>
        <input type="text" name="apellidos" class="form-control" value="<?= $usuario['apellidos'] ?>">
    </div>
    <div class="mb-3">
        <label>Nombres</label>
        <input type="text" name="nombres" class="form-control" value="<?= $usuario['nombres'] ?>">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= $usuario['email'] ?>">
    </div>
    <div class="mb-3">
        <label>Estado</label>
        <input type="text" name="estado" class="form-control" value="<?= $usuario['estado'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php"; ?>