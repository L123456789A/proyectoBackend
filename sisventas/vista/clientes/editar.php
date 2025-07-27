<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/ClienteControlador.php";

$controlador = new ClienteControlador();
$cliente = $controlador->obtenerCliente($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = $_POST;
    $datos['idcliente'] = $_GET['id'];
    $controlador->actualizarCliente($datos);
    header("Location: listado.php");
    exit();
}
?>

<div class="card">
    <div class="card-header">
        <h4>Editar Cliente</h4>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nomcliente" class="form-control" value="<?= $cliente['nomcliente'] ?>" required>
            </div>
            <div class="mb-3">
                <label>RUC</label>
                <input type="text" name="ruccliente" class="form-control" value="<?= $cliente['ruccliente'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Dirección</label>
                <input type="text" name="dircliente" class="form-control" value="<?= $cliente['dircliente'] ?>">
            </div>
            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="telcliente" class="form-control" value="<?= $cliente['telcliente'] ?>">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="emailcliente" class="form-control" value="<?= $cliente['emailcliente'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="listado.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php
ob_end_flush();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php";
?>
