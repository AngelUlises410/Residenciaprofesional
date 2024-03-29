<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "ulises";
$password = "1234";
$dbname = "gomper2";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos de la tabla de ventas
$sql = "SELECT * FROM ventas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Ventas</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            text-align: left;
            padding: 8px;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Tabla de Ventas</h2>

    <table>
        <tr>
            <th>ID Venta</th>
            <th>ID Producto</th>
            <th>Nombre Producto</th>
            <th>Costo Producto</th>
            <th>Descuento Producto</th>
            <th>Cantidad Producto</th>
            <th>Fecha de Salida Producto</th>
            <th>Total de Venta</th>
        </tr>
        <?php
        // Mostrar los datos de la tabla de ventas
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID_Venta"] . "</td>";
                echo "<td>" . $row["ID_Producto"] . "</td>";
                echo "<td>" . $row["Nombre_Producto"] . "</td>";
                echo "<td>" . $row["Costo_Producto"] . "</td>";
                echo "<td>" . $row["Descuento_Producto"] . "</td>";
                echo "<td>" . $row["Cantidad_Producto"] . "</td>";
                echo "<td>" . $row["Fecha_Salida_Producto"] . "</td>";
                echo "<td>" . $row["Total_Venta"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No hay registros</td></tr>";
        }
        ?>
    </table>
</body>
</html>
