<?php
// Obtener los datos enviados por la solicitud AJAX
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$color = $_POST['color'];
$dimensiones = $_POST['dimensiones'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$fecha = $_POST['fecha'];
$almacen = $_POST['almacen'];

// Conectar a la base de datos (reemplaza los valores con los tuyos propios)
$conexion = new mysqli("localhost", "root", "", "gomper");

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
  die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Crear la consulta SQL para actualizar los datos en la tabla
$sql = "UPDATE producto SET Nombre_producto='$nombre', Tipo='$tipo', Color='$color', Dimensiones='$dimensiones', Precio='$precio', Cantidad='$cantidad', Fecha_Inicial='$fecha', Almacen_Sucursal='$almacen' WHERE Id_Producto='$id'";

// Ejecutar la consulta SQL
if ($conexion->query($sql) === TRUE) {
  echo "Los datos se actualizaron correctamente.";
} else {
  echo "Error al actualizar los datos: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
