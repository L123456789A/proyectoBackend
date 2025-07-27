<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/CondicionControlador.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controlador = new CondicionControlador();
    $controlador->guardarCondicion($_POST);
    header("Location: listado.php");
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
?>

<h3>Registrar Condición de Venta</h3>
<form method="POST">
    <div class="mb-3">
        <label>ID Condición</label>
        <input type="text" name="idcondicion" class="form-control" required maxlength="2">
    </div>
    <div class="mb-3">
        <label>Nombre Condición</label>
        <input type="text" name="nomcondicion" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

<?php require_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>
