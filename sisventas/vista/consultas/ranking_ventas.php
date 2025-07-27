<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/VentaControlador.php";

$controlador = new VentaControlador();
$ranking = $controlador->rankingVentas();
?>

<div class="container">
    <h4 class="mb-4">Consulta: Ranking de Productos Más Vendidos</h4>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Total Vendido (Unidades)</th>
                <th>Total Recaudado (S/.)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($ranking) > 0): ?>
                <?php foreach ($ranking as $i => $r): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= $r['nomproducto'] ?></td>
                        <td><?= $r['total_vendido'] ?></td>
                        <td><?= number_format($r['total_recaudado'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4">No hay datos de ventas registrados.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php"; ?>
