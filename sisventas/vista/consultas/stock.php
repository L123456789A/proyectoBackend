<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/ProductoControlador.php";

$controlador = new ProductoControlador();
$productos = $controlador->consultarStock();
?>

<h4 class="mb-4">Consulta: Stock de Productos</h4>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Código</th>
            <th>Producto</th>
            <th>Unidad</th>
            <th>Stock</th>
            <th>Precio Unitario</th>
            <th>Categoría</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $p): ?>
            <tr>
                <td><?= $p['idproducto'] ?></td>
                <td><?= $p['nomproducto'] ?></td>
                <td><?= $p['unimed'] ?></td>
                <td><?= $p['stock'] ?></td>
                <td><?= $p['preuni'] ?></td>
                <td><?= $p['nomcategoria'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php"; ?>

