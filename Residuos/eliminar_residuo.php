<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gomper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Error de conexión a la base de datos: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $idRQ = $_POST["id_rq"];

  $sql = "DELETE FROM residuos_terminados WHERE Id_RQ = $idRQ";

  if ($conn->query($sql) === TRUE) {
    echo "Registro eliminado correctamente.";
  } else {
    echo "Error al eliminar el registro: " . $conn->error;
  }
}

$conn->close();
?>
