<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/CategoriaControlador.php";
ob_start();

$controlador = new CategoriaControlador();
$categorias = $controlador->listarCategorias();
?>

<div class="card">
    <div class="card-header">
        <h4>Listado de Categorías</h4>
        <a href="registrar.php" class="btn btn-primary btn-sm float-end">Nueva Categoría</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre de Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $c): ?>
                    <tr>
                        <td><?= $c["idcategoria"] ?></td>
                        <td><?= $c["nomcategoria"] ?></td>
                        <td>
                            <a href="editar.php?id=<?= $c['idcategoria'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar.php?id=<?= $c['idcategoria'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta categoría?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php"; ?>
