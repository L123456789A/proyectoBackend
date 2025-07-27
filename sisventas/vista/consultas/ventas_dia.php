<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/VentaControlador.php";

$controlador = new VentaControlador();
$ventas = $controlador->ventasDelDia(); 

?>

<div class="container">
    <h4 class="mb-4">Consulta: Ventas del Día</h4>

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
                <tr><td colspan="7">No hay ventas registradas hoy.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php"; ?>
