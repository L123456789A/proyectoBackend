<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/ProveedorControlador.php";
$controlador = new ProveedorControlador();
$proveedores = $controlador->listarProveedores();
include '../layout/header.php';
include '../layout/navbar.php';
?>

<h4>Listado de Proveedores</h4>
<a href="registrar.php" class="btn btn-primary mb-2">Nuevo Proveedor</a>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th><th>Nombre</th><th>RUC</th><th>Dirección</th><th>Teléfono</th><th>Email</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($proveedores as $prov): ?>
            <tr>
                <td><?= $prov['idproveedor'] ?></td>
                <td><?= $prov['nomproveedor'] ?></td>
                <td><?= $prov['rucproveedor'] ?></td>
                <td><?= $prov['dirproveedor'] ?></td>
                <td><?= $prov['telproveedor'] ?></td>
                <td><?= $prov['emailproveedor'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $prov['idproveedor'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="eliminar.php?id=<?= $prov['idproveedor'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include '../layout/footer.php'; ?>
