<ul class="menu menu-container">
 <link rel="stylesheet" type="text/css" href="assets/css/estilomenu.css">
  <li><a href="menu.php">Inicio</a></li>
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
  <?php if (!empty($nombreUsuario)) { ?>
    <li><span class="nombre-usuario"><?php echo $nombreUsuario; ?></span></li>
  <?php } ?>
  <li><a href="php/cerrar_sesion.php">Cerrar Sesion</a></li>
</ul>


<style>
body {
            background-image: url('assets/images/11.jpg');
      background-size: cover;
        }
</style>