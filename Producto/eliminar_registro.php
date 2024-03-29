<?php
// Obtener el ID del registro enviado por la solicitud AJAX
$id = $_POST['id'];

// Conectar a la base de datos (reemplaza los valores con los tuyos propios)
$conexion = new mysqli("localhost", "root", "", "gomper");

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
  die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Crear la consulta SQL para eliminar el registro de la tabla
$sql = "DELETE FROM producto WHERE Id_Producto='$id'";

// Ejecutar la consulta SQL
if ($conexion->query($sql) === TRUE) {
  echo "El registro se eliminó correctamente.";
} else {
  echo "Error al eliminar el registro: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
