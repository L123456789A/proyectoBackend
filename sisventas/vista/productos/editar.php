<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/ProductoControlador.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";

$controlador = new ProductoControlador();

if (!isset($_GET['id'])) {
    header("Location: listado.php");
    exit();
}

$id = $_GET['id'];
$producto = $controlador->obtenerProducto($id);

if (!$producto) {
    echo "<div class='alert alert-danger'>Producto no encontrado.</div>";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST['idproducto'] = $id;
    $controlador->actualizarProducto($_POST);
    header("Location: listado.php");
    exit();
}
?>

<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h4>Editar Producto</h4>
    </div>
    <div class="card-body">
      <form method="post">
        <div class="mb-3">
          <label>ID Producto</label>
          <input type="text" class="form-control" value="<?= htmlspecialchars($producto['idproducto']) ?>" disabled>
        </div>
        <div class="mb-3">
          <label>ID Proveedor</label>
          <input type="text" name="idproveedor" class="form-control" value="<?= htmlspecialchars($producto['idproveedor']) ?>" required>
        </div>
        <div class="mb-3">
          <label>Nombre del Producto</label>
          <input type="text" name="nomproducto" class="form-control" value="<?= htmlspecialchars($producto['nomproducto']) ?>" required>
        </div>
        <div class="mb-3">
          <label>Unidad de Medida</label>
          <input type="text" name="unimed" class="form-control" value="<?= htmlspecialchars($producto['unimed']) ?>" required>
        </div>
        <div class="mb-3">
          <label>Stock</label>
          <input type="number" name="stock" class="form-control" value="<?= htmlspecialchars($producto['stock']) ?>" required>
        </div>
        <div class="mb-3">
          <label>Costo Unitario</label>
          <input type="text" name="cosuni" class="form-control" value="<?= htmlspecialchars($producto['cosuni']) ?>" required>
        </div>
        <div class="mb-3">
          <label>Precio Unitario</label>
          <input type="text" name="preuni" class="form-control" value="<?= htmlspecialchars($producto['preuni']) ?>" required>
        </div>
        <div class="mb-3">
          <label>ID Categoría</label>
          <input type="text" name="idcategoria" class="form-control" value="<?= htmlspecialchars($producto['idcategoria']) ?>" required>
        </div>
        <div class="mb-3">
          <label>Estado</label>
          <input type="text" name="estado" class="form-control" value="<?= htmlspecialchars($producto['estado']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="listado.php" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </div>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php";
ob_end_flush();
?>
