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
    <title>Tabla de Consulta</title>
    
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
.table-container {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
  background-color: #000000;
  color: #ffffff;
}

.table-container th,
.table-container td {
  padding: 10px;
  text-align: center;
  border: 1px solid #dddddd;
}

.table-container th {
  background-color: #f5f5f5;
  color: #333333;
}

.table-container tr:hover {
  background-color: #eaf6ff;
  color: #000000; /* Cambio de color del texto a negro */
}

.edit-btn,
.save-btn,
.delete-btn {
  background-color: #007bff;
  color: #ffffff;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
}

.save-btn {
  background-color: #28a745;
  display: none; /* Ocultar el botón de guardar inicialmente */
}


.delete-btn {
  background-color: #dc3545;
}
    </style>
</head>
<body>
    <?php include "Producto/tabla_produccion.php"; ?>
</body>
   

</html>



===============================================================================================================================================










<!DOCTYPE html>
<html>
<head>
  <title>Formulario de producto</title>
  </head>
  <div class="form-container">

<body>
  <h1>Formulario de producto</h1>
  
  <?php
  // Procesar el formulario cuando se envíe
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores ingresados en el formulario
    $idProducto = $_POST['idProducto'];
    $nombreProducto = $_POST['nombreProducto'];
    $tipo = $_POST['tipo'];
    $color = $_POST['color'];
    $dimensiones = $_POST['dimensiones'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $fechaInicial = $_POST['fechaInicial'];
    $almacenSucursal = $_POST['almacenSucursal'];
    
    // Conectar a la base de datos (reemplaza los valores con los tuyos propios)
    $conexion = new mysqli("localhost", "ulises", "1234", "gomper2");
    
    // Verificar si la conexión fue exitosa
    if ($conexion->connect_error) {
      die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }
    
    // Crear la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO producto (Id_Producto, Nombre_producto, Tipo, Color, Dimensiones, Precio, Cantidad, Fecha_Inicial, Almacen_Sucursal) VALUES ('$idProducto', '$nombreProducto', '$tipo', '$color', '$dimensiones', $precio, $cantidad, '$fechaInicial', '$almacenSucursal')";
    
    // Ejecutar la consulta SQL
    if ($conexion->query($sql) === TRUE) {
      echo "Los datos se han guardado correctamente.";
    } else {
      echo "Error al guardar los datos: " . $conexion->error;
    }
    
    // Cerrar la conexión a la base de datos
    $conexion->close();
  }
  ?>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="idProducto">Id Producto:</label>
    <input type="text" name="idProducto" id="idProducto" required><br>

    <label for="nombreProducto">Nombre Producto:</label>
    <input type="text" name="nombreProducto" id="nombreProducto" required><br>

    <label for="tipo">Tipo:</label>
    <input type="text" name="tipo" id="tipo" required><br>

    <label for="color">Color:</label>
    <input type="text" name="color" id="color" required><br>

    <label for="dimensiones">Dimensiones:</label>
    <input type="text" name="dimensiones" id="dimensiones" required><br>

    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" id="precio" required><br>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" id="cantidad" required><br>

    <label for="fechaInicial">Fecha Inicial:</label>
    <input type="date" name="fechaInicial" id="fechaInicial" required><br>

    <label for="almacenSucursal">Almacén/Sucursal:</label>
    <input type="text" name="almacenSucursal" id="almacenSucursal" required><br>

    <input type="submit" value="Guardar">
  </form>
</body>
    </div>
</html>
















<!DOCTYPE html>
<html>
<head>
  <title>Tabla de productos</title>
  
  <style>
    table {
      border-collapse: collapse;
    }
    table, th, td {
      border: 1px solid black;
      padding: 5px;
    }
    th {
      background-color: #f2f2f2;
    }
    .edit-input {
      width: 80px;
    }
    .edit-btn, .delete-btn {
      padding: 5px 10px;
      cursor: pointer;
    }
  </style>
</head>
<div class="table-container">
<body>
  <h1>Tabla de productos</h1>

  <?php
  // Conectar a la base de datos (reemplaza los valores con los tuyos propios)
  $conexion = new mysqli("localhost", "ulises", "1234", "gomper2");

  // Verificar si la conexión fue exitosa
  if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
  }

  // Crear la consulta SQL para obtener los datos de la tabla
  $sql = "SELECT * FROM producto";

  // Ejecutar la consulta SQL
  $resultado = $conexion->query($sql);

  // Verificar si se encontraron registros
  if ($resultado->num_rows > 0) {
    // Mostrar los datos en una tabla HTML
    echo "<table>
            <tr>
              <th>Id Producto</th>
              <th>Nombre Producto</th>
              <th>Tipo</th>
              <th>Color</th>
              <th>Dimensiones</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Fecha Inicial</th>
              <th>Almacén/Sucursal</th>
              <th>Acciones</th>
            </tr>";

    // Recorrer los registros y mostrarlos en filas de la tabla
    while ($fila = $resultado->fetch_assoc()) {
      echo "<tr>
              <td class='id'>" . $fila['Id_Producto'] . "</td>
              <td contenteditable='true' class='nombre'>" . $fila['Nombre_producto'] . "</td>
              <td contenteditable='true' class='tipo'>" . $fila['Tipo'] . "</td>
              <td contenteditable='true' class='color'>" . $fila['Color'] . "</td>
              <td contenteditable='true' class='dimensiones'>" . $fila['Dimensiones'] . "</td>
              <td contenteditable='true' class='precio'>" . $fila['Precio'] . "</td>
              <td contenteditable='true' class='cantidad'>" . $fila['Cantidad'] . "</td>
              <td contenteditable='true' class='fecha'>" . $fila['Fecha_Inicial'] . "</td>
              <td contenteditable='true' class='almacen'>" . $fila['Almacen_Sucursal'] . "</td>
              <td>
                <button class='edit-btn' onclick='guardarEdicion(this)'>Guardar</button>
                <button class='delete-btn' onclick='eliminarRegistro(this)'>Eliminar</button>
              </td>
            </tr>";
    }

    echo "</table>";
  } else {
    echo "No se encontraron registros en la tabla.";
  }

  // Cerrar la conexión a la base de datos
  $conexion->close();
  ?>

  <script>
    function guardarEdicion(btn) {
      var row = btn.parentNode.parentNode;
      var id = row.getElementsByClassName('id')[0].innerText;
      var nombre = row.getElementsByClassName('nombre')[0].innerText;
      var tipo = row.getElementsByClassName('tipo')[0].innerText;
      var color = row.getElementsByClassName('color')[0].innerText;
      var dimensiones = row.getElementsByClassName('dimensiones')[0].innerText;
      var precio = row.getElementsByClassName('precio')[0].innerText;
      var cantidad = row.getElementsByClassName('cantidad')[0].innerText;
      var fecha = row.getElementsByClassName('fecha')[0].innerText;
      var almacen = row.getElementsByClassName('almacen')[0].innerText;

      // Enviar los datos al servidor utilizando una solicitud AJAX (puedes usar jQuery u otras librerías si lo prefieres)
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'Producto/guardar_edicion.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          console.log(xhr.responseText); // Mostrar la respuesta del servidor (puede ser útil para depurar)
        }
      };
      xhr.send('id=' + id + '&nombre=' + nombre + '&tipo=' + tipo + '&color=' + color + '&dimensiones=' + dimensiones + '&precio=' + precio + '&cantidad=' + cantidad + '&fecha=' + fecha + '&almacen=' + almacen);
    }

    function eliminarRegistro(btn) {
      var row = btn.parentNode.parentNode;
      var id = row.getElementsByClassName('id')[0].innerText;

      // Enviar el ID del registro al servidor utilizando una solicitud AJAX
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'Producto/eliminar_registro.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          console.log(xhr.responseText); // Mostrar la respuesta del servidor (puede ser útil para depurar)
          row.parentNode.removeChild(row); // Eliminar la fila de la tabla
        }
      };
      xhr.send('id=' + id);
    }
  </script>
    
</body>
</div>
</html>



