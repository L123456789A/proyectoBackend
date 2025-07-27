<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/ProveedorControlador.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controlador = new ProveedorControlador();
    $controlador->guardarProveedor($_POST);
    header("Location: listado.php");
    exit;
}

include '../layout/header.php';
include '../layout/navbar.php';
?>

<h4>Registrar Proveedor</h4>
<form method="POST">
    <div class="mb-3">
        <label>ID</label>
        <input type="text" name="idproveedor" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nomproveedor" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>RUC</label>
        <input type="text" name="rucproveedor" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Dirección</label>
        <input type="text" name="dirproveedor" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Teléfono</label>
        <input type="text" name="telproveedor" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="emailproveedor" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>

<?php include '../layout/footer.php'; ?>
