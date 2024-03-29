<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi página web</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: #34a0a4;
      color: white;
    }

    header {
      width: 100%;
      height: 90px;
      background-color: #0b132b;
      position: fixed;
      top: 0;
      left: 0;
    }

    .interior {
      max-width: 100%;
      padding: 0 10px;
      margin: auto;
    }

    .navegacion {
      float: right;
      display: flex;
      align-items: center;
      min-height: 90px;
      z-index: 1000;
    }

    .navegacion ul {
      list-style: none;
      padding: 0 10px;
    }

    .navegacion ul li {
      display: inline-block;
      position: relative;
      transition: .3s linear;
    }

    .navegacion ul li:hover {
      transform: scale(1.1);
    }

    .navegacion ul li a {
      color: #ffffff;
      text-align: center;
      text-transform: uppercase;
      font-size: 14px;
      font-weight: bold;
      padding: 12px 20px;
      transition: .3s linear;
    }

    .navegacion ul li a:hover {
      color: #00c9bd;
      transform: scale(1.1);
    }

    .navegacion ul li:hover .hijos {
      display: block;
    }

    .navegacion .submenu .hijos {
      display: none;
      background: #0b132b;
      position: absolute;
      width: 100%;
    }

    .navegacion .submenu .hijos li {
      display: block;
      overflow: hidden;
      border-bottom: none;
    }

    .navegacion .submenu .hijos li a {
      display: block;
    }

    .contenido-dinamico {
      margin-top: 90px;
      padding: 20px;
    }
  </style>
 
</head>
<body>
  <header>
    <div class="interior">
      <nav class="navegacion">
        <ul>
          <li><a href="bienvenida.php">Inicio</a></li>
          <li><a href="Materia_Prima.php">Materia Prima</a></li>
          <li><a href="Produccion.php">Produccion</a></li>
          <li><a href="Producto.php">Producto</a></li>
          <li><a href="Almacen.php">Almacen</a></li>
          <li><a href="Venta.php">Venta</a></li>
          <li><a href="Cliente.php">Cliente</a></li>
          <li><a href="Devolucion.php">Devolucion</a></li>
          <li><a href="DetalleP.php">Detalle de Producto</a></li>
          <li><a href="Destruccion.php">Destruccion</a></li>
          <li><a href="Proveedor.php">Proveedor</a></li>
          <li><a href="ProcesosQ.php">Procesos Quimicos</a></li>
          <li><a href="Residuos.php">Residuos Terminados</a></li>
          <a type="submit" class="btn btn-danger" href="php/cerrar_sesion.php">Cerrar Sesion</a>
        </ul>
      </nav>
    </div>
  </header>

  <div class="contenido-dinamico" id="contenido">
    <!-- Contenido inicial de la página -->
  </div>
</body>
</html>

