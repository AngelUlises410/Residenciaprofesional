<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Producción</title>
    <link rel="stylesheet" type="text/css" href="Producto/styles.css">
    <script src="script.js"></script>
</head>
<body>
    <h2>Tabla de Producción</h2>

    <!-- Copia aquí el código HTML y PHP relacionado con la tabla -->

    <table class="table-container">
        <tr>
            <th>Id Produccion</th>
            <th>Id Materia Prima</th>
            <th>Producto</th>
            <th>Nombre</th>
            <th>Cantidad</th>
        </tr>

        <?php
        // Código PHP para obtener y mostrar los datos de la tabla de producción

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
        $sql = "SELECT * FROM Produccion";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Imprimir los datos en la tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Id_Producion"] . "</td>";
                echo "<td>" . $row["Id_MateriaP"] . "</td>";
                echo "<td>" . $row["Producto"] . "</td>";
                echo "<td>" . $row["Nombre"] . "</td>";
                echo "<td>" . $row["Cantidad"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No se encontraron datos en la tabla.</td></tr>";
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
        ?>
    </table>
</body>
</html>
