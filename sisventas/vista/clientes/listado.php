<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/ClienteControlador.php";

$controlador = new ClienteControlador();
$clientes = $controlador->listarClientes();
?>

<div class="card">
    <div class="card-header">
        <h4>Listado de Clientes</h4>
        <a href="registrar.php" class="btn btn-primary btn-sm float-end">Nuevo Cliente</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>RUC</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?= $cliente["idcliente"] ?></td>
                        <td><?= $cliente["nomcliente"] ?></td>
                        <td><?= $cliente["ruccliente"] ?></td>
                        <td><?= $cliente["dircliente"] ?></td>
                        <td><?= $cliente["telcliente"] ?></td>
                        <td><?= $cliente["emailcliente"] ?></td>
                        <td>
                            <a href="editar.php?id=<?= $cliente['idcliente'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar.php?id=<?= $cliente['idcliente'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este cliente?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php
ob_end_flush();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php";
?>
