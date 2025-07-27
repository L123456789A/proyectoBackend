<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/UsuarioControlador.php";

$controlador = new UsuarioControlador();
$usuarios = $controlador->listarUsuarios();
?>
<h4>Listado de Usuarios</h4>
<a href="registrar.php" class="btn btn-success mb-3">Nuevo Usuario</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Apellidos</th>
            <th>Nombres</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $u): ?>
        <tr>
            <td><?= $u['idusuario'] ?></td>
            <td><?= $u['nomusuario'] ?></td>
            <td><?= $u['apellidos'] ?></td>
            <td><?= $u['nombres'] ?></td>
            <td><?= $u['email'] ?></td>
            <td><?= $u['estado'] ?></td>
            <td>
                <a href="editar.php?id=<?= $u['idusuario'] ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="eliminar.php?id=<?= $u['idusuario'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar usuario?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php"; ?>