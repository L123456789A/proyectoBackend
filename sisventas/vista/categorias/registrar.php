<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/CategoriaControlador.php";
ob_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controlador = new CategoriaControlador();
    $controlador->guardarCategoria($_POST);
    header("Location: listado.php");
    exit;
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";
?>

<div class="card">
    <div class="card-header">Registrar Categoría</div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3">
                <label>ID Categoría</label>
                <input type="text" name="idcategoria" class="form-control" required maxlength="2">
            </div>
            <div class="mb-3">
                <label>Nombre Categoría</label>
                <input type="text" name="nomcategoria" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="listado.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php"; ?>
