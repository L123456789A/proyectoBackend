<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/ClienteControlador.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controlador = new ClienteControlador();
    $controlador->guardarCliente($_POST);
    header("Location: listado.php");
    exit();
}
?>

<div class="card">
    <div class="card-header">
        <h4>Registrar Cliente</h4>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="mb-3">
                <label>ID Cliente</label>
                <input type="text" name="idcliente" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nomcliente" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>RUC</label>
                <input type="text" name="ruccliente" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Dirección</label>
                <input type="text" name="dircliente" class="form-control">
            </div>
            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="telcliente" class="form-control">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="emailcliente" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="listado.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php
ob_end_flush();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php";
?>