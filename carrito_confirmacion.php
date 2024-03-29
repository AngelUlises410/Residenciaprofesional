<?php
//iniciar sesión para acceder a la pagina Principal
session_start();
if(!isset($_SESSION['usuarios'])){
        echo '
            <script>
            alert("Por favor debes iniciar seción");
            window.location = "index.php";
            </script>
        ';
        session_destroy();
        die();
}
?>
<?php
include 'encabezado.php';
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gomper";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del carrito
$sql = "SELECT * FROM carrito";
$result = $conn->query($sql);
?>
<?php
//iniciar sesión para acceder a la pagina Principal
session_start();
if(!isset($_SESSION['usuarios'])){
        echo '
            <script>
            alert("Por favor debes iniciar seción");
            window.location = "index.php";
            </script>
        ';
        session_destroy();
        die();
}
?>


<h2>Confirmación del Carrito</h2>

<table>
    <tr>
        <th>ID Producto</th>
        <th>Nombre Producto</th>
        <th>Costo Producto</th>
        <th>Descuento Producto</th>
        <th>Cantidad Producto</th>
    </tr>
    <?php
    // Mostrar los datos del carrito
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ID_Producto"] . "</td>";
            echo "<td>" . $row["Nombre_Producto"] . "</td>";
            echo "<td>" . $row["Costo_Producto"] . "</td>";
            echo "<td>" . $row["Descuento_Producto"] . "</td>";
            echo "<td>" . $row["Cantidad_Producto"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No hay productos en el carrito</td></tr>";
    }
    ?>
</table>
