<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/CondicionControlador.php";
$controlador = new CondicionControlador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST['idcondicion'] = $_GET['id'];
    $controlador->actualizarCondicion($_POST);
    header("Location: listado.php");
    exit;
}

$condicion = $controlador->obtenerCondicion($_GET['id']);
require_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
?>

<h3>Editar Condición de Venta</h3>
<form method="POST">
    <div class="mb-3">
        <label>Nombre Condición</label>
        <input type="text" name="nomcondicion" class="form-control" value="<?= $condicion['nomcondicion'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

<?php require_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>
