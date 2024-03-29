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
  <title>Formulario de Devolución</title>
  <link rel="stylesheet" type="text/css" href="assets/css/estilomenu.css">
  <style>
    
      body {
      background-image: url('assets/images/11.jpg');
      background-size: cover;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .edit-btn, .save-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            display: inline-block;
        }

        .save-btn {
            background-color: #337ab7;
        }

        .delete-btn {
            background-color: #d9534f;
            
        }
    
    </style>
</head>
<body>
 <?php include 'menu.php'; ?>
 <div class="form-container">
  <h2>Formulario de Devolución</h2>
  <link rel="stylesheet" href="Devolucion/styles.css">

  <?php
  // Verificar si se ha enviado el formulario
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_producto = $_POST["id_producto"];
    $id_devolucion = $_POST["id_devolucion"];
    $id_cliente = $_POST["id_cliente"];
    $id_venta = $_POST["id_venta"];
    $fecha_devolucion = $_POST["fecha_devolucion"];

    // Validar los datos (puedes agregar más validaciones según tus necesidades)
    if (empty($id_producto) || empty($id_devolucion) || empty($id_cliente) || empty($id_venta) || empty($fecha_devolucion)) {
      echo "Por favor, completa todos los campos del formulario.";
    } else {
      // Conexión a la base de datos (modifica los valores de acuerdo a tu configuración)
      $servername = "localhost";
      $username = "ulises";
      $password = "1234";
      $dbname = "gomper2";

      $conn = new mysqli($servername, $username, $password, $dbname);

      // Verificar la conexión
      if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
      }

      // Insertar los datos en la tabla
      $sql = "INSERT INTO devoluciones (id_producto, id_devolucion, id_cliente, id_venta, fecha_devolucion)
              VALUES ('$id_producto', '$id_devolucion', '$id_cliente', '$id_venta', '$fecha_devolucion')";

      if ($conn->query($sql) === TRUE) {
        echo "La devolución se ha registrado correctamente.";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      // Cerrar la conexión
      $conn->close();
    }
  }
  ?>

  <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
   
    <label for="id_producto">Id_Producto:</label>
    <input type="text" name="id_producto" required><br><br>

    <label for="id_devolucion">Id_Devolucion:</label>
    <input type="text" name="id_devolucion" required><br><br>

    <label for="id_cliente">Id_Cliente:</label>
    <input type="text" name="id_cliente" required><br><br>

    <label for="id_venta">Id_Venta:</label>
    <input type="text" name="id_venta" required><br><br>

    <label for="fecha_devolucion">Fecha_Devolucion:</label>
    <input type="date" name="fecha_devolucion" required><br><br>

    <input type="submit" value="Enviar">
  </form>
</html>
