<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/VentaControlador.php";

$controlador = new VentaControlador();
$productos = $controlador->listarProductos();
$ventas = [];
$idproducto = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idproducto = $_POST["idproducto"];
    $ventas = $controlador->ventasPorProducto($idproducto);
}
?>

<div class="container">
    <h4 class="mb-4">Consulta: Ventas por Producto</h4>

    <form method="POST" class="row g-3 mb-4">
        <div class="col-md-6">
            <label for="idproducto" class="form-label">Seleccione Producto:</label>
            <select name="idproducto" id="idproducto" class="form-select" required>
                <option value="">-- Seleccione --</option>
                <?php foreach ($productos as $p): ?>
                    <option value="<?= $p['idproducto'] ?>" <?= $idproducto == $p['idproducto'] ? 'selected' : '' ?>>
                        <?= $p['nomproducto'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Buscar</button>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Condición</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($ventas) > 0): ?>
                <?php foreach ($ventas as $i => $v): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= $v['fechaf'] ?></td>
                        <td><?= $v['nomcliente'] ?></td>
                        <td><?= $v['nomcondicion'] ?></td>
                        <td><?= $v['nomproducto'] ?></td>
                        <td><?= $v['cant'] ?></td>
                        <td><?= number_format($v['preuni'], 2) ?></td>
                        <td><?= number_format($v['cant'] * $v['preuni'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="8">No se encontraron ventas para este producto.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php"; ?>
