<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/ProveedorControlador.php";
$controlador = new ProveedorControlador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controlador->actualizarProveedor($_POST);
    header("Location: listado.php");
    exit;
}

$proveedor = $controlador->obtenerProveedor($_GET['id']);
include '../layout/header.php';
include '../layout/navbar.php';
?>

<h4>Editar Proveedor</h4>
<form method="POST">
    <input type="hidden" name="idproveedor" value="<?= $proveedor['idproveedor'] ?>">
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nomproveedor" class="form-control" value="<?= $proveedor['nomproveedor'] ?>" required>
    </div>
    <div class="mb-3">
        <label>RUC</label>
        <input type="text" name="rucproveedor" class="form-control" value="<?= $proveedor['rucproveedor'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Dirección</label>
        <input type="text" name="dirproveedor" class="form-control" value="<?= $proveedor['dirproveedor'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Teléfono</label>
        <input type="text" name="telproveedor" class="form-control" value="<?= $proveedor['telproveedor'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="emailproveedor" class="form-control" value="<?= $proveedor['emailproveedor'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

<?php include '../layout/footer.php'; ?>
