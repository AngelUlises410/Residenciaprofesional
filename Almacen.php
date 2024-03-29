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

<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "ulises";
$password = "1234";
$dbname = "gomper2";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Agregar nuevo registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idAlmacen = $_POST["id_almacen"];
    $idProducto = $_POST["id_producto"];
    $idVenta = $_POST["id_venta"];
    $nombre = $_POST["nombre"];
    $cantidad = $_POST["cantidad"];
    $fechaIngreso = $_POST["fecha_ingreso"];
    $fechaSalida = $_POST["fecha_salida"];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO almacen (Id_Almacen, Id_Producto, Id_Venta, Nombre_Producto, Cantidad_Producto, Fecha_Ingreso, Fecha_Salida) VALUES ('$idAlmacen', '$idProducto', '$idVenta', '$nombre', '$cantidad', '$fechaIngreso', '$fechaSalida')";
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro agregado exitosamente";
    } else {
        echo "Error al agregar el registro: " . $conn->error;
    }
}

// Eliminar registro
if (isset($_GET["eliminar"])) {
    $id = $_GET["eliminar"];

    // Eliminar el registro de la base de datos
    $sql = "DELETE FROM almacen WHERE Id_Almacen = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado exitosamente";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
}

// Actualizar registro
if (isset($_POST["guardar"])) {
    $id = $_POST["id"];
    $idAlmacen = $_POST["id_almacen"];
    $idProducto = $_POST["id_producto"];
    $idVenta = $_POST["id_venta"];
    $nombre = $_POST["nombre"];
    $cantidad = $_POST["cantidad"];
    $fechaIngreso = $_POST["fecha_ingreso"];
    $fechaSalida = $_POST["fecha_salida"];

    // Actualizar los datos en la base de datos
    $sql = "UPDATE almacen SET Id_Almacen = '$idAlmacen', Id_Producto = '$idProducto', Id_Venta = '$idVenta', Nombre_Producto = '$nombre', Cantidad_Producto = '$cantidad', Fecha_Ingreso = '$fechaIngreso', Fecha_Salida = '$fechaSalida' WHERE Id_Almacen = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

// Realizar consulta SELECT para obtener los datos de la tabla
$sql = "SELECT * FROM almacen";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
   
<div class="table-container">
    <title>Tabla de Almacen</title>
    
    <style>
        
        .form-container {
  background-color: #000000;
  padding: 20px;
  border-radius: 10px;
  color: #ffffff;
  margin: 20px auto;
  width: 300px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
  border: 1px solid #dddddd;
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

.form-container input[type="submit"]:hover {
  background-color: #23527c;
}

form.needs-validation {
  margin: 20px;
  padding: 20px;
  background-color: #222222;
  color: #ffffff;
  border: 1px solid #dddddd;
  border-radius: 5px;
}

.form-control {
  margin-bottom: 10px;
}

input[type="text"],
input[type="number"] {
  padding: 10px;
  border: 1px solid #dddddd;
  border-radius: 5px;
  width: 100%;
  background-color: #333333;
  color: #ffffff;
}

.invalid-feedback {
  color: red;
  margin-top: 5px;
}

.valid-feedback {
  color: green;
  margin-top: 5px;
}

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

h2 {
  margin-bottom: 20px;
  font-size: 24px;
  font-weight: bold;
  color: #ffffff;
}

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
  color: #ffffff; /* Cambiar a color de texto blanco */
}

.table-container th {
  background-color: #f5f5f5;
  color: #333333;
}

.table-container tr:hover {
  background-color: #eaf6ff;
  color: #000000;
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
  display: none;
}

.delete-btn {
  background-color: #dc3545;
}
       
        
        
        
        
        
        
    </style>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Escuchar el evento click en el botón de edición
            $('.edit-btn').on('click', function() {
                var row = $(this).closest('tr');
                var id = row.find('.id').text();
                var idAlmacen = row.find('.id-almacen').text();
                var idProducto = row.find('.id-producto').text();
                var idVenta = row.find('.id-venta').text();
                var nombre = row.find('.nombre').text();
                var cantidad = row.find('.cantidad').text();
                var fechaIngreso = row.find('.fecha-ingreso').text();
                var fechaSalida = row.find('.fecha-salida').text();

                // Crear los campos de edición en la misma celda de la tabla
                row.find('.id-almacen').html('<input type="text" value="' + idAlmacen + '">');
                row.find('.id-producto').html('<input type="text" value="' + idProducto + '">');
                row.find('.id-venta').html('<input type="text" value="' + idVenta + '">');
                row.find('.nombre').html('<input type="text" value="' + nombre + '">');
                row.find('.cantidad').html('<input type="text" value="' + cantidad + '">');
                row.find('.fecha-ingreso').html('<input type="text" value="' + fechaIngreso + '">');
                row.find('.fecha-salida').html('<input type="text" value="' + fechaSalida + '">');

                // Cambiar el botón de edición por los botones de guardar y cancelar
                row.find('.edit-btn').hide();
                row.find('.save-btn').show();
                row.find('.cancel-btn').show();
            });

            // Escuchar el evento click en el botón de cancelar
            $('.cancel-btn').on('click', function() {
                var row = $(this).closest('tr');
                var idAlmacen = row.find('input[type="text"]').eq(0).attr('value');
                var idProducto = row.find('input[type="text"]').eq(1).attr('value');
                var idVenta = row.find('input[type="text"]').eq(2).attr('value');
                var nombre = row.find('input[type="text"]').eq(3).attr('value');
                var cantidad = row.find('input[type="text"]').eq(4).attr('value');
                var fechaIngreso = row.find('input[type="text"]').eq(5).attr('value');
                var fechaSalida = row.find('input[type="text"]').eq(6).attr('value');

                // Restaurar los valores originales en la celda de la tabla
                row.find('.id-almacen').html(idAlmacen);
                row.find('.id-producto').html(idProducto);
                row.find('.id-venta').html(idVenta);
                row.find('.nombre').html(nombre);
                row.find('.cantidad').html(cantidad);
                row.find('.fecha-ingreso').html(fechaIngreso);
                row.find('.fecha-salida').html(fechaSalida);

                // Cambiar los botones de guardar y cancelar por el botón de edición
                row.find('.save-btn').hide();
                row.find('.cancel-btn').hide();
                row.find('.edit-btn').show();
            });

            // Escuchar el evento click en el botón de guardar
            $('.save-btn').on('click', function() {
                var row = $(this).closest('tr');
                var id = row.find('.id').text();
                var idAlmacen = row.find('input[type="text"]').eq(0).val();
                var idProducto = row.find('input[type="text"]').eq(1).val();
                var idVenta = row.find('input[type="text"]').eq(2).val();
                var nombre = row.find('input[type="text"]').eq(3).val();
                var cantidad = row.find('input[type="text"]').eq(4).val();
                var fechaIngreso = row.find('input[type="text"]').eq(5).val();
                var fechaSalida = row.find('input[type="text"]').eq(6).val();

                // Realizar la actualización de los datos mediante AJAX
                $.ajax({
                    url: 'Almacen/actualizar.php',
                    method: 'POST',
                    data: {
                        id: id,
                        id_almacen: idAlmacen,
                        id_producto: idProducto,
                        id_venta: idVenta,
                        nombre: nombre,
                        cantidad: cantidad,
                        fecha_ingreso: fechaIngreso,
                        fecha_salida: fechaSalida
                    },
                    success: function(response) {
                        // Actualizar la celda de la tabla con los nuevos datos
                        row.find('.id-almacen').html(idAlmacen);
                        row.find('.id-producto').html(idProducto);
                        row.find('.id-venta').html(idVenta);
                        row.find('.nombre').html(nombre);
                        row.find('.cantidad').html(cantidad);
                        row.find('.fecha-ingreso').html(fechaIngreso);
                        row.find('.fecha-salida').html(fechaSalida);

                        // Cambiar los botones de guardar y cancelar por el botón de edición
                        row.find('.save-btn').hide();
                        row.find('.cancel-btn').hide();
                        row.find('.edit-btn').show();
                    }
                });
            });
        });
    </script>
    </div>
</head>
<body>
   <div class="form-container">
    <h2>Agregar nuevo registro</h2>
    <form method="POST" action="">
        <label>Id_Almacen:</label>
        <input type="text" name="id_almacen" required>
        <br>
        <label>Id_Producto:</label>
        <input type="text" name="id_producto" required>
        <br>
        <label>Id_Venta:</label>
        <input type="text" name="id_venta" required>
        <br>
        <label>Nombre del producto:</label>
        <input type="text" name="nombre" required>
        <br>
        <label>Cantidad del producto:</label>
        <input type="text" name="cantidad" required>
        <br>
        <label>Fecha de ingreso:</label>
        <input type="date" name="fecha_ingreso" required>
        <br>
        <label>Fecha de salida:</label>
        <input type="date" name="fecha_salida" required>
        <br>
        <input type="submit" value="Agregar">
    </form>

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
    </div>
    <div class="table-container">
<h2>Tabla de registros</h2>
<table>
    <tr>
        <th>Id_Almacen</th>
        <th>Id_Producto</th>
        <th>Id_Venta</th>
        <th>Nombre_Producto</th>
        <th>Cantidad_Producto</th>
        <th>Fecha_Ingreso</th>
        <th>Fecha_Salida</th>
        <th>Acciones</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='id-almacen'>" . $row["Id_Almacen"] . "</td>";
            echo "<td class='id-producto'>" . $row["Id_Producto"] . "</td>";
            echo "<td class='id-venta'>" . $row["Id_Venta"] . "</td>";
            echo "<td class='nombre'>" . $row["Nombre_Producto"] . "</td>";
            echo "<td class='cantidad'>" . $row["Cantidad_Producto"] . "</td>";
            echo "<td class='fecha-ingreso'>" . $row["Fecha_Ingreso"] . "</td>";
            echo "<td class='fecha-salida'>" . $row["Fecha_Salida"] . "</td>";
            echo "<td>";
            echo "<button class='edit-btn'>Editar</button>";
            echo "<button class='save-btn' style='display: none;'>Guardar</button>";
            echo "<button class='cancel-btn' style='display: none;'>Cancelar</button>";
            echo "<a href='Almacen/eliminar.php?eliminar=" . $row["Id_Almacen"] . "'>Eliminar</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No hay datos disponibles</td></tr>";
    }
    ?>
</table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
