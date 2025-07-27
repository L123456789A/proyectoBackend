<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/sisventas/vista/menu.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <!-- Archivos -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="archivosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Archivos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/productos/listado.php">Productos</a></li>
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/clientes/listado.php">Clientes</a></li>
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/proveedores/listado.php">Proveedores</a></li>
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/categorias/listado.php">Categorías</a></li>
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/usuarios/listado.php">Usuarios</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/logout.php">Terminar</a></li>
          </ul>
        </li>

        <!-- Procesos -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="procesosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Procesos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/ventas/registrar.php">Registrar Ventas</a></li>
          </ul>
        </li>

        <!-- Consultas -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="consultasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Consultas
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/consultas/stock.php">Stock de Productos</a></li>
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/consultas/ventas_dia.php">Ventas por Día</a></li>
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/consultas/ventas_fecha.php">Ventas por Fecha</a></li>
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/consultas/ventas_cliente.php">Ventas por Cliente</a></li>
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/consultas/ventas_producto.php">Ventas por Producto</a></li>
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/consultas/ranking_ventas.php">Ranking de Ventas</a></li>
          </ul>
        </li>

        <!-- Herramientas -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="herramientasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Herramientas
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="http://localhost/sisventas/vista/herramientas/cambiar_password.php">Cambiar Contraseña</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>