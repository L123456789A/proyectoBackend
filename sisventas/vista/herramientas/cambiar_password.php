<?php
ob_start();
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/UsuarioControlador.php";

$mensaje = "";
$error = "";

// Validar sesión y obtener ID de usuario desde la sesión
$idusuario = isset($_SESSION["usuario"]["idusuario"]) ? $_SESSION["usuario"]["idusuario"] : null;

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $actual = $_POST["password_actual"];
    $nueva = $_POST["password_nueva"];
    $confirmar = $_POST["password_confirmar"];

    if ($nueva !== $confirmar) {
        $error = "❌ Las nuevas contraseñas no coinciden.";
    } else {
        $controlador = new UsuarioControlador();

        if ($controlador->cambiarPassword($idusuario, $actual, $nueva)) {
            $mensaje = "✅ Contraseña actualizada correctamente.";
        } else {
            $error = "❌ La contraseña actual es incorrecta.";
        }
    }
}
?>

<div class="container mt-5" style="max-width: 600px;">
    <h4 class="mb-4 text-center">🔐 Cambiar Contraseña</h4>

    <?php if ($mensaje): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $mensaje ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php elseif ($error): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $error ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <form method="POST" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="password_actual" class="form-label">Contraseña Actual</label>
            <input type="password" class="form-control" id="password_actual" name="password_actual" required>
            <div class="invalid-feedback">Ingresa tu contraseña actual.</div>
        </div>

        <div class="mb-3">
            <label for="password_nueva" class="form-label">Nueva Contraseña</label>
            <input type="password" class="form-control" id="password_nueva" name="password_nueva" required>
            <div class="invalid-feedback">Ingresa tu nueva contraseña.</div>
        </div>

        <div class="mb-3">
            <label for="password_confirmar" class="form-label">Confirmar Nueva Contraseña</label>
            <input type="password" class="form-control" id="password_confirmar" name="password_confirmar" required>
            <div class="invalid-feedback">Repite la nueva contraseña.</div>
        </div>

        <button type="submit" class="btn btn-primary w-100">Actualizar Contraseña</button>
    </form>
</div>

<script>
// Bootstrap validación visual
(() => {
  'use strict';
  const forms = document.querySelectorAll('.needs-validation');
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
})();
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php"; ?>
