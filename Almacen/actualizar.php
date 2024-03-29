<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gomper";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $cantidad = $_POST["cantidad"];

    // Actualizar los datos en la base de datos
    $sql = "UPDATE almacen SET Nombre_Producto = '$nombre', Cantidad_Producto = '$cantidad' WHERE Id_Almacen = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Datos actualizados exitosamente";
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }
}

$conn->close();
?>
