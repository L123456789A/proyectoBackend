<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/ProductoControlador.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";

$controlador = new ProductoControlador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controlador->guardarProducto($_POST);
    header("Location: listado.php");
    exit();
}
?>

<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h4>Registrar Producto</h4>
    </div>
    <div class="card-body">
      <form method="post">
        <div class="mb-3">
          <label>ID Producto</label>
          <input type="text" name="idproducto" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>ID Proveedor</label>
          <input type="text" name="idproveedor" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Nombre del Producto</label>
          <input type="text" name="nomproducto" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Unidad de Medida</label>
          <input type="text" name="unimed" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Stock</label>
          <input type="number" name="stock" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Costo Unitario</label>
          <input type="text" name="cosuni" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Precio Unitario</label>
          <input type="text" name="preuni" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>ID Categoría</label>
          <input type="text" name="idcategoria" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Estado</label>
          <input type="text" name="estado" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="listado.php" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </div>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php";
ob_end_flush();
?>
