<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "ulises";
$password = "1234";
$dbname = "gomper2";

// Obtener el ID de la venta enviado por AJAX
$idVenta = $_POST['idVenta'];

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Insertar el ID de la venta en la tabla de carrito
$sql = "INSERT INTO carrito (ID_Venta) VALUES ('$idVenta')";

if ($conn->query($sql) === TRUE) {
    echo "Venta agregada al carrito exitosamente";
} else {
    echo "Error al agregar la venta al carrito: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>

