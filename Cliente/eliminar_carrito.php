<?php
// Verificar si se ha recibido el ID del carrito a eliminar
if (isset($_POST['carritoId'])) {
    // Obtener el ID del carrito desde la solicitud POST
    $carritoId = $_POST['carritoId'];

    // Realizar las operaciones necesarias para eliminar el elemento del carrito en la base de datos
    // Por ejemplo, podrías utilizar una consulta SQL DELETE para eliminar la fila correspondiente en la tabla de carrito

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "ulisses";
    $password = "1234";
    $dbname = "gomper2";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para eliminar el elemento del carrito
    $sql = "DELETE FROM carrito WHERE ID_Carrito = $carritoId";

    if ($conn->query($sql) === TRUE) {
        echo "Elemento del carrito eliminado exitosamente";
    } else {
        echo "Error al eliminar el elemento del carrito: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
