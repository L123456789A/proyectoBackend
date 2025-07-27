<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/CategoriaControlador.php";
ob_start();

$controlador = new CategoriaControlador();
$categoria = $controlador->obtenerCategoria($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controlador->actualizarCategoria($_POST);
    header("Location: listado.php");
    exit;
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";
?>

<div class="card">
    <div class="card-header">Editar Categoría</div>
    <div class="card-body">
        <form method="POST">
            <input type="hidden" name="idcategoria" value="<?= $categoria['idcategoria'] ?>">
            <div class="mb-3">
                <label>Nombre Categoría</label>
                <input type="text" name="nomcategoria" class="form-control" value="<?= $categoria['nomcategoria'] ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="listado.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php"; ?>
