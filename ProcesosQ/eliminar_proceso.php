<?php
// Verificar si se ha enviado una solicitud de borrado
if (isset($_POST['id'])) {
    // Obtener el ID del proceso a eliminar
    $id_borrar = $_POST['id'];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gomper";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    // Borrar el registro de la tabla SQL
    $sql_borrar = "DELETE FROM procesos_quimicos WHERE id = '$id_borrar'";
    if ($conn->query($sql_borrar) === TRUE) {
        echo "El proceso se ha eliminado correctamente de la base de datos.";
    } else {
        echo "Error al eliminar el proceso: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
