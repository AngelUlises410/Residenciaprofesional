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
  <title>Mostrar Destrucciones</title>
  <link rel="stylesheet" href="Destruccion/styles.css">
  <style>
      
      body {
        background-image: url('assets/images/11.jpg');
      background-size: cover;
        }
      
      
      .form-container {
      background-color: #000000;
      padding: 20px;
      border-radius: 5px;
      color: #ffffff;
      margin: 20px auto;
      width: 300px;
    }

    .form-container input[type="submit"] {
      background-color: #337ab7;
      color: #ffffff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    /* Resto del CSS... */

    /* Tabla */
    .table-container {
      width: 100%;
      border-collapse: collapse;
      margin: 0 auto; /* Centrar la tabla */
      background-color: #000000;
      color: #ffffff;
    }

    .table-container th,
    .table-container td {
      padding: 10px;
      text-align: center;
      border: 1px solid #dddddd;
      color: #ffffff; /* Cambiar a color de texto blanco */
    }

    .table-container th {
      background-color: #f5f5f5;
      color: #333333;
    }

    .table-container tr:hover {
      background-color: #eaf6ff;
    }

    .table-container tr:hover td {
      color: #000000; /* Cambiar a color de texto negro */
    }
      

  </style>
</head>
<body>
  
  <h2>Destrucciones Registradas</h2>
<div class="table-container-wrapper">
    <div class="table-container">
    
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

  // Realizar la consulta SQL
  $sql = "SELECT * FROM destrucciones";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Imprimir la tabla con los resultados
    echo '<table>';
    echo '<tr>';
    echo '<th>Id_Devolucion</th>';
    echo '<th>Id_Producto</th>';
    echo '</tr>';

    // Recorrer los resultados y generar las filas de la tabla
    while ($row = $result->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . $row['id_devolucion'] . '</td>';
      echo '<td>' . $row['id_producto'] . '</td>';
      echo '</tr>';
    }

    echo '</table>';
  } else {
    echo 'No hay destrucciones registradas.';
  }

  // Cerrar la conexión
  $conn->close();
  ?>
  </div>
  </div>
</body>

</html>


