<?php
// Realizar la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gomper";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Verificar la acción a realizar
if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    if ($accion == "obtener") {
        // Obtener los productos de la tabla Producto
        $sql = "SELECT * FROM Producto";
        $result = $conn->query($sql);

        // Generar la tabla de productos
        if ($result->num_rows > 0) {
            echo "<tr>
                    <th>Id_Producto</th>
                    <th>Nombre_producto</th>
                    <th>Tipo</th>
                    <th>Color</th>
                    <th>Dimensiones</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Fecha_Inicial</th>
                    <th>Almacen_Sucursal</th>
                    <th>Acciones</th>
                  </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["Id_Producto"]."</td>";
                echo "<td>".$row["Nombre_producto"]."</td>";
                echo "<td>".$row["Tipo"]."</td>";
                echo "<td>".$row["Color"]."</td>";
                echo "<td>".$row["Dimensiones"]."</td>";
                echo "<td>".$row["Precio"]."</td>";
                echo "<td>".$row["Cantidad"]."</td>";
                echo "<td>".$row["Fecha_Inicial"]."</td>";
                echo "<td>".$row["Almacen_Sucursal"]."</td>";
                echo "<td>
                        <button onclick='editarProducto(".$row["Id_Producto"].")'>Editar</button>
                        <button onclick='eliminarProducto(".$row["Id_Producto"].")'>Eliminar</button>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No se encontraron productos</td></tr>";
        }
    } elseif ($accion == "editar") {
        // Verificar si se han enviado los datos del producto
        if (isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['datos']) && !empty($_POST['datos'])) {
            $idProducto = $_POST['id'];
            $datos = $_POST['datos'];

            // Actualizar los datos del producto en la base de datos
            $sql = "UPDATE Producto SET ".$datos." WHERE Id_Producto = $idProducto";

            if ($conn->query($sql) === TRUE) {
                echo "Datos del producto actualizados correctamente.";
            } else {
                echo "Error al actualizar los datos del producto: " . $conn->error;
            }
        } else {
            echo "No se han proporcionado datos del producto.";
        }
    } elseif ($accion == "eliminar") {
        // Verificar si se ha enviado el ID del producto
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $idProducto = $_POST['id'];

            // Eliminar el producto de la base de datos
            $sql = "DELETE FROM Producto WHERE Id_Producto = $idProducto";

            if ($conn->query($sql) === TRUE) {
                echo "Producto eliminado correctamente.";
            } else {
                echo "Error al eliminar el producto: " . $conn->error;
            }
        } else {
            echo "No se ha proporcionado el ID del producto.";
        }
    }
} else {
    echo "No se ha especificado ninguna acción.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
