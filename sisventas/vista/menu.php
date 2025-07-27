<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";
?>

<!-- CONTENIDO PRINCIPAL -->
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Bienvenido al Sistema de Control de Ventas</h4>
        <p class="card-text">Desde aquí puedes acceder a todas las funcionalidades del sistema usando el menú superior.</p>
        <hr>
        <ul>
            <li>Gestión de productos, clientes, proveedores y usuarios.</li>
            <li>Registro de ventas.</li>
            <li>Consultas detalladas de ventas y stock.</li>
            <li>Herramientas administrativas como cambiar contraseña.</li>
        </ul>
    </div>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php";
?>
