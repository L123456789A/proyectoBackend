<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/VentaControlador.php";

$controlador = new VentaControlador();
$clientes = $controlador->listarClientes();
$ventas = [];
$idcliente = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idcliente = $_POST["idcliente"];
    $ventas = $controlador->ventasPorCliente($idcliente);
}
?>

<div class="container">
    <h4 class="mb-4">Consulta: Ventas por Cliente</h4>

    <form method="POST" class="row g-3 mb-4">
        <div class="col-md-6">
            <label for="idcliente" class="form-label">Seleccione Cliente:</label>
            <select name="idcliente" id="idcliente" class="form-select" required>
                <option value="">-- Seleccione --</option>
                <?php foreach ($clientes as $c): ?>
                    <option value="<?= $c['idcliente'] ?>" <?= $idcliente == $c['idcliente'] ? 'selected' : '' ?>>
                        <?= $c['nomcliente'] ?>
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
                <th>Valor Neto</th>
                <th>IGV</th>
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
                        <td><?= number_format($v['valorneto'], 2) ?></td>
                        <td><?= number_format($v['igv'], 2) ?></td>
                        <td><?= number_format($v['valorneto'] + $v['igv'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7">No se encontraron ventas para este cliente.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php"; ?>
