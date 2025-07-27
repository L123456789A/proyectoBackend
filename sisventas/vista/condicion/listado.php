<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT']."/sisventas/controlador/CondicionControlador.php";

$controlador = new CondicionControlador();
$condiciones = $controlador->listarCondiciones();
?>

<a href="registrar.php" class="btn btn-success mb-3">Nueva Condición</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($condiciones as $c): ?>
        <tr>
            <td><?= $c['idcondicion'] ?></td>
            <td><?= $c['nomcondicion'] ?></td>
            <td>
                <a href="editar.php?id=<?= $c['idcondicion'] ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="eliminar.php?id=<?= $c['idcondicion'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar condición?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once $_SERVER['DOCUMENT_ROOT']."/sisventas/vista/layout/footer.php"; ?>
