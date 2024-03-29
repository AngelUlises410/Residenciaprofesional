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
    <title>Formulario de Cliente</title>
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
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $idCliente = $_POST["id_cliente"];
    $nombreCliente = $_POST["nombre_cliente"];
    $apellidoCliente = $_POST["apellido_cliente"];
    $telefono = $_POST["telefono"];
    $correoElectronico = $_POST["correo_electronico"];
    $direccion = $_POST["direccion"];
    $celular = $_POST["celular"];
    $cp = $_POST["cp"];
    $rfc = $_POST["rfc"];
    

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

    // Insertar los datos en la tabla cliente
    $sql = "INSERT INTO cliente (Id_Cliente, Nombre_Cliente, Apellido_Cliente, Telefono, Correo_Electronico, Direccion, Celular, C_P, RFC)
            VALUES ('$idCliente', '$nombreCliente', '$apellidoCliente', '$telefono', '$correoElectronico', '$direccion', '$celular', '$cp', '$rfc')";

    if ($conn->query($sql) === TRUE) {
        echo "Los datos del cliente se han guardado correctamente.";
    } else {
        echo "Error al guardar los datos del cliente: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>

<h2>Formulario de Cliente</h2>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="id_cliente">Id Cliente:</label>
    <input type="text" name="id_cliente" required><br>

    <label for="nombre_cliente">Nombre:</label>
    <input type="text" name="nombre_cliente" required><br>

    <label for="apellido_cliente">Apellido:</label>
    <input type="text" name="apellido_cliente" required><br>

    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" required><br>

    <label for="correo_electronico">Correo Electrónico:</label>
    <input type="email" name="correo_electronico" required><br>

    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion" required><br>

    <label for="celular">Celular:</label>
    <input type="text" name="celular" required><br>

    <label for="cp">Código Postal:</label>
    <input type="text" name="cp" required><br>

    <label for="rfc">RFC:</label>
    <input type="text" name="rfc" required><br>

    <input type="submit" value="Guardar">
</form>

</body>
    </div>
</html>
















<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Clientes</title>
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

// Obtener los datos de la tabla cliente
$sql = "SELECT Id_Cliente, Nombre_Cliente, Apellido_Cliente, Telefono, Correo_Electronico, Direccion, Celular, C_P, RFC FROM cliente";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Tabla de Clientes</h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Id Cliente</th>";
    echo "<th>Nombre</th>";
    echo "<th>Apellido</th>";
    echo "<th>Teléfono</th>";
    echo "<th>Correo Electrónico</th>";
    echo "<th>Dirección</th>";
    echo "<th>Celular</th>";
    echo "<th>Código Postal</th>";
    echo "<th>RFC</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["Id_Cliente"]."</td>";
        echo "<td>".$row["Nombre_Cliente"]."</td>";
        echo "<td>".$row["Apellido_Cliente"]."</td>";
        echo "<td>".$row["Telefono"]."</td>";
        echo "<td>".$row["Correo_Electronico"]."</td>";
        echo "<td>".$row["Direccion"]."</td>";
        echo "<td>".$row["Celular"]."</td>";
        echo "<td>".$row["C_P"]."</td>";
        echo "<td>".$row["RFC"]."</td>";
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
