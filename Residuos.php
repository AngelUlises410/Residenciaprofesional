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
  <title>Formulario de Residuos Terminados</title>
  <style>
        
        
        
        
        
        
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
  <h2>Formulario de Residuos Terminados</h2>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="id_rq">Id_RQ:</label>
    <input type="text" name="id_rq" id="id_rq" required><br>

    <label for="materia_p">MateriaP:</label>
    <input type="text" name="materia_p" id="materia_p" required><br>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required><br>

    <label for="materia">Materia:</label>
    <input type="text" name="materia" id="materia" required><br>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" id="cantidad" required><br>

    <input type="submit" name="submit" value="Guardar">
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "ulises";
    $password = "1234";
    $dbname = "gomper2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    $id_rq = $_POST['id_rq'];
    $materia_p = $_POST['materia_p'];
    $nombre = $_POST['nombre'];
    $materia = $_POST['materia'];
    $cantidad = $_POST['cantidad'];

    $sql = "INSERT INTO residuos_terminados (Id_RQ, MateriaP, Nombre, Materia, Cantidad)
            VALUES ('$id_rq', '$materia_p', '$nombre', '$materia', '$cantidad')";

    if ($conn->query($sql) === TRUE) {
      echo "Los datos se han guardado correctamente.";
    } else {
      echo "Error al guardar los datos: " . $conn->error;
    }

    $conn->close();
  }
  ?>
</body>
    </div>
</html>























<!DOCTYPE html>
<html>
<head>
  <title>Formulario de Residuos Terminados</title>
  <style>
    table {
      border-collapse: collapse;
    }

    table, th, td {
      border: 1px solid black;
      padding: 5px;
    }
  </style>
</head>
<body>
  <div class="table-container-wrapper">
    <div class="table-container">
      <?php
      $servername = "localhost";
      $username = "ulises";
      $password = "1234";
      $dbname = "gomper2";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM residuos_terminados";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Id_RQ</th><th>MateriaP</th><th>Nombre</th><th>Materia</th><th>Cantidad</th><th>Acciones</th></tr>";

        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['Id_RQ'] . "</td>";
          echo "<td>" . $row['MateriaP'] . "</td>";
          echo "<td>" . $row['Nombre'] . "</td>";
          echo "<td>" . $row['Materia'] . "</td>";
          echo "<td>" . $row['Cantidad'] . "</td>";
          echo "<td><button class='eliminar-btn' data-id='" . $row['Id_RQ'] . "'>Eliminar</button></td>";
          echo "</tr>";
        }

        echo "</table>";
      } else {
        echo "No se encontraron registros.";
      }

      $conn->close();
      ?>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var eliminarBtns = document.querySelectorAll('.eliminar-btn');

      eliminarBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
          var idRQ = this.dataset.id;
          var confirmar = confirm('¿Estás seguro de que deseas eliminar este registro?');

          if (confirmar) {
            // Realizar la eliminación del registro en la base de datos utilizando AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'Residuos/eliminar_residuo.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                  // Eliminar la fila de la tabla si la eliminación en la base de datos fue exitosa
                  var fila = btn.parentNode.parentNode;
                  fila.parentNode.removeChild(fila);
                } else {
                  // Manejar el error en caso de que ocurra un problema durante la eliminación
                  console.error('Error al eliminar el registro: ' + xhr.responseText);
                }
              }
            };
            xhr.send('id_rq=' + idRQ);
          }
        });
      });
    });
  </script>
</body>
</html>


