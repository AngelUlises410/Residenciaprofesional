<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gomper";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$id = $_GET["id"];

// Realizar la eliminación del registro en la base de datos
$sql = "DELETE FROM almacen WHERE Id_Almacen='$id'";

if ($conn->query($sql) === TRUE) {
    // Redireccionar a la página que muestra la tabla después de la eliminación
    header("Location: Almacen.php");
    exit();
} else {
    echo "Error al eliminar el registro: " . $conn->error;
}

$conn->close();
?>
