<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/controlador/VentaControlador.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/header.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/navbar.php";

$controlador = new VentaControlador();

$clientes = $controlador->obtenerClientes();
$productos = $controlador->obtenerProductos();
$condiciones = $controlador->obtenerCondiciones();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'fechaf' => $_POST['fechaf'],
        'idcliente' => $_POST['idcliente'],
        'idusuario' => $_POST['idusuario'],
        'idcondicion' => $_POST['idcondicion'],
        'valorneto' => $_POST['valorneto'],
        'igv' => $_POST['igv']
    ];

    $detalles = json_decode($_POST['detalles'], true);

    if ($controlador->registrarVenta($data, $detalles)) {
        echo "<script>alert('Venta registrada exitosamente'); location.href='registrar.php';</script>";
    } else {
        echo "<script>alert('Error al registrar venta');</script>";
    }
}
?>

<div class="container">
    <h2>Registrar Venta</h2>
    <form method="POST">
        <div class="row mb-3">
            <div class="col">
                <label>Fecha:</label>
                <input type="date" name="fechaf" class="form-control" required>
            </div>
            <div class="col">
                <label>Cliente:</label>
                <select name="idcliente" class="form-control" required>
                    <?php foreach ($clientes as $c): ?>
                        <option value="<?= $c['idcliente'] ?>"><?= $c['nomcliente'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label>Condición:</label>
                <select name="idcondicion" class="form-control" required>
                    <?php foreach ($condiciones as $con): ?>
                        <option value="<?= $con['idcondicion'] ?>"><?= $con['nomcondicion'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <input type="hidden" name="idusuario" value="U01">

        <h4>Productos</h4>
        <table class="table" id="tablaProductos">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <select id="productoSelect" class="form-control mb-3">
            <option disabled selected>Selecciona producto</option>
            <?php foreach ($productos as $p): ?>
                <option value='<?= json_encode($p) ?>'><?= $p['nomproducto'] ?></option>
            <?php endforeach; ?>
        </select>

        <input type="hidden" name="detalles" id="detallesInput">
        <div class="mb-3">
            <label>Valor Neto:</label>
            <input type="text" name="valorneto" id="valorneto" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label>IGV (18%):</label>
            <input type="text" name="igv" id="igv" class="form-control" readonly>
        </div>

        <button class="btn btn-primary">Registrar</button>
    </form>
</div>

<script>
let productos = [];

document.getElementById('productoSelect').addEventListener('change', function () {
    const prod = JSON.parse(this.value);
    if (productos.find(p => p.idproducto === prod.idproducto)) return;

    productos.push({
        idproducto: prod.idproducto,
        nomproducto: prod.nomproducto,
        cant: 1,
        stock: prod.stock, // ✅ importante para el max del input
        cosuni: parseFloat(prod.cosuni),
        preuni: parseFloat(prod.preuni)
    });

    renderTabla();
});

function renderTabla() {
    let tbody = document.querySelector("#tablaProductos tbody");
    tbody.innerHTML = '';
    let total = 0;

    productos.forEach((p, i) => {
        const subtotal = p.cant * p.preuni;
        total += subtotal;

        tbody.innerHTML += `
            <tr>
                <td>${p.nomproducto}</td>
                <td>${p.stock}</td>
                <td>${p.preuni.toFixed(2)}</td>
                <td>
                    <input type="number" value="${p.cant}" min="1" max="${p.stock}" 
                        onchange="updateCantidad(${i}, this.value)" class="form-control">
                </td>
                <td>${subtotal.toFixed(2)}</td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(${i})">Eliminar</button></td>
            </tr>
        `;
    });

    const igv = total * 0.18;
    const valorneto = total;

    document.getElementById('valorneto').value = valorneto.toFixed(2);
    document.getElementById('igv').value = igv.toFixed(2);
    document.getElementById('detallesInput').value = JSON.stringify(productos);
}

function updateCantidad(index, value) {
    const cantidad = parseInt(value);
    const stock = productos[index].stock;

    if (cantidad >= 1 && cantidad <= stock) {
        productos[index].cant = cantidad;
        renderTabla();
    } else {
        alert("Cantidad fuera de rango");
    }
}

function eliminar(index) {
    productos.splice(index, 1);
    renderTabla();
}
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/sisventas/vista/layout/footer.php"; ?>
