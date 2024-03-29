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
  <title>Mostrar Devoluciones</title>
  
  <style>
    body {
      background-image: url('assets/images/11.jpg');
      background-size: cover;
    }
    
  </style>
</head>

<body>
  <h2>Devoluciones Registradas</h2>

  <?php
    // Establecer la conexión a la base de datos (modifica los valores según tu configuración)
    $servername = "localhost";
    $username = "ulises";
    $password = "1234";
    $dbname = "gomper2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
      die("Error de conexión: " . $conn->connect_error);
    }

    // Verificar si se ha enviado una solicitud para eliminar un registro
    if (isset($_GET['eliminar']) && !empty($_GET['eliminar'])) {
      $id_eliminar = $_GET['eliminar'];

      // Ejecutar la consulta SQL para eliminar el registro
      $sql_eliminar = "DELETE FROM devoluciones WHERE id_devolucion = '$id_eliminar'";

      if ($conn->query($sql_eliminar) === TRUE) {
        echo "Registro eliminado exitosamente.";
      } else {
        echo "Error al eliminar el registro: " . $conn->error;
      }
    }

    // Realizar la consulta SQL
    $sql = "SELECT * FROM devoluciones";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Imprimir la tabla con los resultados
      echo '<table class="table-container">';
      echo '<tr>';
      echo '<th>Id_Producto</th>';
      echo '<th>Id_Devolucion</th>';
      echo '<th>Id_Cliente</th>';
      echo '<th>Id_Venta</th>';
      echo '<th>Fecha_Devolucion</th>';
      echo '<th>Acciones</th>';
      echo '</tr>';

      // Recorrer los resultados y generar las filas de la tabla
      while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id_producto'] . '</td>';
        echo '<td>' . $row['id_devolucion'] . '</td>';
        echo '<td>' . $row['id_cliente'] . '</td>';
        echo '<td>' . $row['id_venta'] . '</td>';
        echo '<td>' . $row['fecha_devolucion'] . '</td>';
        echo '<td><a href="?eliminar=' . $row['id_devolucion'] . '">Eliminar</a></td>';
        echo '</tr>';
      }

      echo '</table>';
    } else {
      echo 'No hay devoluciones registradas.';
    }

    // Cerrar la conexión
    $conn->close();
  ?>

  
</body>
</html>








<!DOCTYPE html>
<html>
<head>
 
  <title>Formulario de Destrucción</title>
  <link rel="stylesheet" href="DetalleP/styles.css">
</head>
<body>
  <h2>Formulario de Destrucción</h2>
<div class="form-container">
  <?php
  // Verificar si se han enviado los datos del formulario
  if (isset($_POST['id_devolucion']) && isset($_POST['id_producto'])) {
    $id_devolucion = $_POST['id_devolucion'];
    $id_producto = $_POST['id_producto'];

    // Aquí puedes realizar las acciones necesarias con los datos recibidos, como insertar en la base de datos o realizar otras operaciones.

    // Ejemplo: Insertar los datos en la tabla "destrucciones" en la base de datos
    $servername = "localhost";
    $username = "ulises";
    $password = "1234";
    $dbname = "gomper2";

    // Establecer la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
      die("Error de conexión: " . $conn->connect_error);
    }

    // Insertar los datos en la tabla
    $sql = "INSERT INTO destrucciones (id_devolucion, id_producto)
            VALUES ('$id_devolucion', '$id_producto')";

    if ($conn->query($sql) === TRUE) {
      echo "Datos agregados exitosamente.";
    } else {
      echo "Error al agregar los datos: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
  }
  ?>

  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="id_devolucion">Id_Devolucion:</label>
    <input type="text" name="id_devolucion" id="id_devolucion" required><br><br>

    <label for="id_producto">Id_Producto:</label>
    <input type="text" name="id_producto" id="id_producto" required><br><br>

    <input type="submit" value="Agregar">
  </form>




