<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "ulises";
$password = "1234";
$dbname = "gomper2";


// Obtener los datos enviados por AJAX
$idVenta = $_POST["idVenta"];
// Puedes obtener más datos aquí si los enviaste desde JavaScript

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Insertar los datos en la tabla 'carrito'
$sql = "INSERT INTO carrito (ID_Venta) VALUES ('$idVenta')";
// Puedes agregar más campos y datos aquí si los enviaste desde JavaScript

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados correctamente.";
} else {
    echo "Error al insertar los datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
