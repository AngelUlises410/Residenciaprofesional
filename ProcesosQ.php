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
       <?php include 'menu.php';
        ?>
   </body>
   
  
 




<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Procesos Químicos</title>
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
    <h2>Formulario de Procesos Químicos</h2>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" required><br><br>

        <label for="quimicos_utilizar">Químicos a utilizar:</label>
        <input type="text" name="quimicos_utilizar" id="quimicos_utilizar" required><br><br>

        <input type="submit" value="Guardar">
    </form>
</body>
    </div>
</html>


<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "ulises";
    $password = "1234";
    $dbname = "gomper2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $quimicos_utilizar = $_POST['quimicos_utilizar'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO procesos_quimicos (nombre, cantidad, quimicos_utilizar)
            VALUES ('$nombre', '$cantidad', '$quimicos_utilizar')";

    if ($conn->query($sql) === TRUE) {
        echo "Los datos se han guardado correctamente en la base de datos.";
    } else {
        echo "Error al guardar los datos en la base de datos: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>














<div class="table-container-wrapper">
    <div class="table-container">



<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Procesos Químicos</title>
</head>
<div class="table-container-wrapper">
    <div class="table-container">
<body>
    <h2>Tabla de Procesos Químicos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Químicos a utilizar</th>
            <th>Acciones</th>
        </tr>
        <?php
        // Obtener los datos de la tabla desde la base de datos
        $servername = "localhost";
        $username = "ulises";
        $password = "1234";
        $dbname = "gomper2";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM procesos_quimicos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["cantidad"] . "</td>";
                echo "<td>" . $row["quimicos_utilizar"] . "</td>";
                echo "<td>";
                echo "<button onclick='borrarProceso(" . $row["id"] . ")'>Borrar</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No se encontraron registros</td></tr>";
        }

        $conn->close();
        ?>
    </table>

    <script>
        function borrarProceso(id) {
            if (confirm("¿Estás seguro de que quieres eliminar este proceso?")) {
                // Realizar la petición AJAX para eliminar el proceso
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Recargar la página después de eliminar el proceso
                        location.reload();
                    }
                };
                xhttp.open("POST", "ProcesosQ/eliminar_proceso.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("id=" + id);
            }
        }
    </script>
</body>
    </div>
    </div>
</html>
