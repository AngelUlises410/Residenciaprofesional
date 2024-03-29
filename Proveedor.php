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


<!DOCTYPE html>
<html>
<head>
  <title>Lista de Proveedores</title>
  <link rel="stylesheet" type="text/css" href="assets/css/estilomenu.css">
  <style>
    body {
      background-image: url('assets/images/11.jpg');
      background-size: cover;
    }

  </style>
</head>
<body>
  <?php include 'menu.php'; ?>
 
  <h2>Lista de Proveedores</h2>

  <?php
  // Datos de conexión a la base de datos
  $servername = "localhost";
  $username = "ulises";
  $password = "1234";
  $dbname = "gomper2";

  // Crear la conexión
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar la conexión
  if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
  }

  // Procesar el formulario de registro de proveedores
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registrar"])) {
    $nombreProveedor = $_POST["nombre_proveedor"];
    $producto = $_POST["producto"];
    $cantidad = $_POST["cantidad"];
    $precioCompra = $_POST["precio_compra"];
    $fechaIngreso = $_POST["fecha_ingreso"];

    // Consulta SQL para insertar un nuevo registro en la tabla
    $sqlInsert = "INSERT INTO Proveedores (Nombre_proveedor, Producto, Cantidad, Precio_Compra, Fecha_Ingreso)
                  VALUES ('$nombreProveedor', '$producto', '$cantidad', '$precioCompra', '$fechaIngreso')";
    if ($conn->query($sqlInsert) === TRUE) {
      echo "Registro insertado exitosamente.";
    } else {
      echo "Error al insertar el registro: " . $conn->error;
    }
  }

  // Procesar la eliminación de registros
  if (isset($_POST["eliminar"])) {
    $idProveedor = $_POST["idProveedor"];

    // Consulta SQL para eliminar el registro de la base de datos
    $sqlDelete = "DELETE FROM Proveedores WHERE Id_Proveedor = '$idProveedor'";
    if ($conn->query($sqlDelete) === TRUE) {
      echo "Registro eliminado exitosamente.";
    } else {
      echo "Error al eliminar el registro: " . $conn->error;
    }
  }

  // Consulta SQL para obtener los registros de la tabla
  $sql = "SELECT * FROM Proveedores";
  $result = $conn->query($sql);

  // Verificar si se encontraron registros
  if ($result->num_rows > 0) {
    // Imprimir los datos en una tabla con estilos
    echo "<table class='table-container'>
            <tr>
              <th>ID Proveedor</th>
              <th>Nombre del Proveedor</th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Precio de Compra</th>
              <th>Fecha de Ingreso</th>
              <th>Acciones</th>
            </tr>";

    // Recorrer los registros y mostrarlos en filas de la tabla
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>".$row["Id_Proveedor"]."</td>
              <td>".$row["Nombre_proveedor"]."</td>
              <td>".$row["Producto"]."</td>
              <td>".$row["Cantidad"]."</td>
              <td>".$row["Precio_Compra"]."</td>
              <td>".$row["Fecha_Ingreso"]."</td>
              <td>
                <form method='post' action='".$_SERVER["PHP_SELF"]."'>
                  <input type='hidden' name='idProveedor' value='".$row["Id_Proveedor"]."'>
                  <input type='submit' name='eliminar' value='Eliminar' class='delete-btn'>
                </form>
                <form method='post' action='editar.php'>
                  <input type='hidden' name='idProveedor' value='".$row["Id_Proveedor"]."'>
                  
                </form>
              </td>
            </tr>";
    }

    echo "</table>";
  } else {
    echo "No se encontraron registros.";
  }

  // Cerrar la conexión
  $conn->close();
  ?>

  <h2>Registrar Proveedor</h2>

  <form class="form-container" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <link rel="stylesheet" href="Materia/styles.css">
    <label for="nombre_proveedor">Nombre del Proveedor:</label>
    <input type="text" name="nombre_proveedor" required><br>

    <label for="producto">Producto:</label>
    <input type="text" name="producto" required><br>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" required><br>

    <label for="precio_compra">Precio de Compra:</label>
    <input type="number" name="precio_compra" step="0.01" required><br>

    <label for="fecha_ingreso">Fecha de Ingreso:</label>
    <input type="date" name="fecha_ingreso" required><br>

    <input type="submit" name="registrar" value="Registrar">
  </form>
</body>
</html>



