<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/ProductoControlador.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";

$controlador = new ProductoControlador();
$productos = $controlador->listarProductos();
?>

<div class="container mt-4">
  <h4>Listado de Productos</h4>
  <a href="registrar.php" class="btn btn-success mb-3">Nuevo Producto</a>
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover bg-white">
      <thead class="table-primary">
        <tr>
          <th>ID</th>
          <th>Proveedor</th>
          <th>Nombre</th>
          <th>Unidad</th>
          <th>Stock</th>
          <th>Costo Unit.</th>
          <th>Precio Unit.</th>
          <th>Categoría</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($productos as $producto): ?>
        <tr>
          <td><?= htmlspecialchars($producto['idproducto']) ?></td>
          <td><?= htmlspecialchars($producto['idproveedor']) ?></td>
          <td><?= htmlspecialchars($producto['nomproducto']) ?></td>
          <td><?= htmlspecialchars($producto['unimed']) ?></td>
          <td><?= htmlspecialchars($producto['stock']) ?></td>
          <td><?= htmlspecialchars($producto['cosuni']) ?></td>
          <td><?= htmlspecialchars($producto['preuni']) ?></td>
          <td><?= htmlspecialchars($producto['idcategoria']) ?></td>
          <td><?= htmlspecialchars($producto['estado']) ?></td>
          <td>
            <a href="editar.php?id=<?= urlencode($producto['idproducto']) ?>" class="btn btn-sm btn-primary">Editar</a>
            <a href="eliminar.php?id=<?= urlencode($producto['idproducto']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar este producto?');">Eliminar</a>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($productos)): ?>
        <tr>
          <td colspan="10" class="text-center">No hay productos registrados.</td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php"; ?>
