<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gomper";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de la tabla
$sql = "SELECT * FROM materia_prima";
$result = $conn->query($sql);

?>

<h2>Tabla de Materia Prima</h2>

<table class="table-container">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Tipo de Materia</th>
        <!-- Resto de las columnas -->
    </tr>

    <?php
    if ($result->num_rows > 0) {
        // Imprimir los datos en la tabla
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_materiaP"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["cantidad"] . "</td>";
            echo "<td>" . $row["tipo_materia"] . "</td>";
            // Resto de las columnas
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No se encontraron datos en la tabla.</td></tr>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>

</table>
