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

<link rel="stylesheet" type="text/css" href="assets/css/estilomenu.css">
<body>
    <?php include 'menu.php'; ?>
</body>




















  <!DOCTYPE html>
<html>
<head>
    <title>Formulario de Venta</title>
    <style>
        
        body {
      background-image: url('assets/images/11.jpg');
      background-size: cover;
        }
        
        
        
        
.form-container {
  background-color: #000000; /* Cambiar a color negro */
  padding: 20px;
  border-radius: 5px;
  color: #ffffff; /* Cambiar a color de texto blanco */
  margin: 20px auto;
  width: 300px;
}


.form-container {
  background-color: #000000; /* Cambiar a color negro */
  padding: 20px;
  border-radius: 10px;
  color: #ffffff; /* Cambiar a color de texto blanco */
  margin: 20px auto;
  width: 300px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); /* Agregar sombra */
  border: 1px solid #dddddd; /* Agregar borde */
}

.form-container {
  background-color: #000000; /* Cambiar a color negro */
  padding: 20px;
  border-radius: 10px;
  color: #ffffff; /* Cambiar a color de texto blanco */
  margin: 20px auto;
  width: 300px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); /* Agregar sombra */
  border: 1px solid #dddddd; /* Agregar borde */
}

.form-container input[type="submit"] {
  background-color: #337ab7; /* Cambiar a color de fondo deseado */
  color: #ffffff; /* Cambiar a color de texto blanco */
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.form-container input[type="submit"]:hover {
  background-color: #23527c; /* Cambiar a color de fondo deseado al pasar el cursor */
}



/* Estilos generales del formulario */
form.needs-validation {
  margin: 20px;
  padding: 20px;
  background-color: #222222; /* Cambiar a color negro metálico */
  color: #ffffff; /* Cambiar a color de texto blanco */
  border: 1px solid #dddddd;
  border-radius: 5px;
}

/* Estilos para los campos del formulario */
.form-control {
  margin-bottom: 10px;
}

label {
  font-weight: bold;
}

input[type="text"],
input[type="number"] {
  padding: 10px;
  border: 1px solid #dddddd;
  border-radius: 5px;
  width: 100%;
  background-color: #333333; /* Cambiar a color negro metálico */
  color: #ffffff; /* Cambiar a color de texto blanco */
}

/* Estilos para los mensajes de retroalimentación */
.invalid-feedback {
  color: red;
  margin-top: 5px;
}

.valid-feedback {
  color: green;
  margin-top: 5px;
}

/* Estilos para el botón de enviar */
.btn-primary {
  padding: 10px 20px;
  background-color: #007bff;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.btn-primary:hover {
  background-color: #0056b3;
}

/* Estilos para los encabezados */
h2 {
  margin-bottom: 20px;
  font-size: 24px;
  font-weight: bold;
  color: #ffffff; /* Cambiar a color de texto blanco */
}

        
        
        
        
        
        
        
        /* Tabla */
.table-container-wrapper {
  background-color: #000000;
  padding: 20px;
  border-radius: 5px;
  margin: 20px auto;
  width: fit-content;
}

.table-container {
  width: 100%;
  border-collapse: collapse;
  background-color: #000000;
  color: #ffffff;
}

.table-container th,
.table-container td {
  padding: 10px;
  text-align: center;
  border: 1px solid #dddddd;
  color: #ffffff;
}

.table-container th {
  background-color: #f5f5f5;
  color: #333333;
}

.table-container td {
  color: #ffffff;
}

.table-container tr:hover {
  background-color: #eaf6ff;
}

.table-container tr:hover td {
  color: #000000;
}

    </style>
</head>
<div class="form-container">
<body>

<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "ulises";
$password = "1234";
$database = "gomper2";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener la lista de clientes desde la tabla "cliente"
$sqlClientes = "SELECT Id_Cliente, Nombre_Cliente FROM cliente";
$resultClientes = $conn->query($sqlClientes);

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $idVenta = $_POST["id_venta"];
    $idProducto = $_POST["id_producto"];
    $idCliente = $_POST["id_cliente"];
    $cantidadProducto = $_POST["cantidad_producto"];
    $costoProducto = $_POST["costo_producto"];
    $fechaVenta = $_POST["fecha_venta"];
    $total = $_POST["total"];

    // Insertar los datos en la tabla "venta"
    $sql = "INSERT INTO venta (Id_Venta, Id_Producto, Id_Cliente, Cantidad_Producto, Costo_Producto, Fecha_Venta, Total)
            VALUES ('$idVenta', '$idProducto', '$idCliente', '$cantidadProducto', '$costoProducto', '$fechaVenta', '$total')";

    if ($conn->query($sql) === TRUE) {
        echo "Los datos de la venta se han guardado correctamente.";
    } else {
        echo "Error al guardar los datos de la venta: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

<h2>Formulario de Venta</h2>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="id_venta">Id Venta:</label>
    <input type="text" name="id_venta" required><br>

    <label for="id_producto">Id Producto:</label>
    <input type="text" name="id_producto" required><br>

    <label for="id_cliente">Cliente:</label>
    <select name="id_cliente" required>
        <?php
        while ($row = $resultClientes->fetch_assoc()) {
            echo "<option value='" . $row["Id_Cliente"] . "'>" . $row["Nombre_Cliente"] . "</option>";
        }
        ?>
    </select><br>

    <label for="cantidad_producto">Cantidad Producto:</label>
    <input type="text" name="cantidad_producto" required><br>

    <label for="costo_producto">Costo Producto:</label>
    <input type="text" name="costo_producto" required><br>

    <label for="fecha_venta">Fecha Venta:</label>
    <input type="date" name="fecha_venta" required><br>

    <label for="total">Total:</label>
    <input type="text" name="total" required><br>

    <input type="submit" value="Guardar">
</form>

</body>
    </div>
</html>




















<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Ventas</title>
    <style>
        
        body {
      background-image: url('assets/images/11.jpg');
      background-size: cover;
        }
        
        
        
        
.form-container {
  background-color: #000000; /* Cambiar a color negro */
  padding: 20px;
  border-radius: 5px;
  color: #ffffff; /* Cambiar a color de texto blanco */
  margin: 20px auto;
  width: 300px;
}


.form-container {
  background-color: #000000; /* Cambiar a color negro */
  padding: 20px;
  border-radius: 10px;
  color: #ffffff; /* Cambiar a color de texto blanco */
  margin: 20px auto;
  width: 300px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); /* Agregar sombra */
  border: 1px solid #dddddd; /* Agregar borde */
}

.form-container {
  background-color: #000000; /* Cambiar a color negro */
  padding: 20px;
  border-radius: 10px;
  color: #ffffff; /* Cambiar a color de texto blanco */
  margin: 20px auto;
  width: 300px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); /* Agregar sombra */
  border: 1px solid #dddddd; /* Agregar borde */
}

.form-container input[type="submit"] {
  background-color: #337ab7; /* Cambiar a color de fondo deseado */
  color: #ffffff; /* Cambiar a color de texto blanco */
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.form-container input[type="submit"]:hover {
  background-color: #23527c; /* Cambiar a color de fondo deseado al pasar el cursor */
}



/* Estilos generales del formulario */
form.needs-validation {
  margin: 20px;
  padding: 20px;
  background-color: #222222; /* Cambiar a color negro metálico */
  color: #ffffff; /* Cambiar a color de texto blanco */
  border: 1px solid #dddddd;
  border-radius: 5px;
}

/* Estilos para los campos del formulario */
.form-control {
  margin-bottom: 10px;
}

label {
  font-weight: bold;
}

input[type="text"],
input[type="number"] {
  padding: 10px;
  border: 1px solid #dddddd;
  border-radius: 5px;
  width: 100%;
  background-color: #333333; /* Cambiar a color negro metálico */
  color: #ffffff; /* Cambiar a color de texto blanco */
}

/* Estilos para los mensajes de retroalimentación */
.invalid-feedback {
  color: red;
  margin-top: 5px;
}

.valid-feedback {
  color: green;
  margin-top: 5px;
}

/* Estilos para el botón de enviar */
.btn-primary {
  padding: 10px 20px;
  background-color: #007bff;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.btn-primary:hover {
  background-color: #0056b3;
}

/* Estilos para los encabezados */
h2 {
  margin-bottom: 20px;
  font-size: 24px;
  font-weight: bold;
  color: #ffffff; /* Cambiar a color de texto blanco */
}

        
        
        
        
        
        
        
        /* Tabla */
.table-container-wrapper {
  background-color: #000000;
  padding: 20px;
  border-radius: 5px;
  margin: 20px auto;
  width: fit-content;
}

.table-container {
  width: 100%;
  border-collapse: collapse;
  background-color: #000000;
  color: #ffffff;
}

.table-container th,
.table-container td {
  padding: 10px;
  text-align: center;
  border: 1px solid #dddddd;
  color: #ffffff;
}

.table-container th {
  background-color: #f5f5f5;
  color: #333333;
}

.table-container td {
  color: #ffffff;
}

.table-container tr:hover {
  background-color: #eaf6ff;
}

.table-container tr:hover td {
  color: #000000;
}

    </style>
</head>
<div class="table-container">
<body>

<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "ulises";
$password = "1234";
$database = "gomper2";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener los datos de la tabla "venta"
$sql = "SELECT v.Id_Venta, v.Id_Producto, c.Nombre_Cliente, v.Cantidad_Producto, v.Costo_Producto, v.Fecha_Venta, v.Total
        FROM venta v
        INNER JOIN cliente c ON v.Id_Cliente = c.Id_Cliente";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Tabla de Ventas</h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Id Venta</th>";
    echo "<th>Id Producto</th>";
    echo "<th>Cliente</th>";
    echo "<th>Cantidad Producto</th>";
    echo "<th>Costo Producto</th>";
    echo "<th>Fecha Venta</th>";
    echo "<th>Total</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["Id_Venta"]."</td>";
        echo "<td>".$row["Id_Producto"]."</td>";
        echo "<td>".$row["Nombre_Cliente"]."</td>";
        echo "<td>".$row["Cantidad_Producto"]."</td>";
        echo "<td>".$row["Costo_Producto"]."</td>";
        echo "<td>".$row["Fecha_Venta"]."</td>";
        echo "<td>".$row["Total"]."</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>

</body>
    </div>
</html>
