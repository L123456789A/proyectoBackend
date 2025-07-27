<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/UsuarioControlador.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controlador = new UsuarioControlador();
    $controlador->guardarUsuario($_POST);
    header("Location: listado.php");
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";
?>

<h2>Registrar Usuario</h2>
<form method="post">
    <div class="mb-3">
        <label>ID Usuario</label>
        <input type="text" name="idusuario" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Nombre de Usuario</label>
        <input type="text" name="nomusuario" class="form-control">
    </div>
    <div class="mb-3">
        <label>Contraseña</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
        <label>Apellidos</label>
        <input type="text" name="apellidos" class="form-control">
    </div>
    <div class="mb-3">
        <label>Nombres</label>
        <input type="text" name="nombres" class="form-control">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label>Estado</label>
        <input type="text" name="estado" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php"; ?>