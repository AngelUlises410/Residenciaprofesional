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
    <title>Tabla de Produccion</title>
     <link rel="stylesheet" href="Produccion/styles.css">
    <style>
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
    </style>
</head>
<body>
    <?php include "Produccion/tabla_materia_prima.php"; ?>
</body>
<body>




<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "ulises";
$password = "1234";
$dbname = "gomper2";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario para agregar un registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["agregar"])) {
    $idMateriaP = $_POST["id_materiaP"];
    $producto = $_POST["producto"];
    $nombre = $_POST["nombre"];
    $cantidad = $_POST["cantidad"];

    // Consulta SQL para insertar los datos en la tabla
    $sqlAgregar = "INSERT INTO Produccion (Id_MateriaP, Producto, Nombre, Cantidad) VALUES ('$idMateriaP', '$producto', '$nombre', '$cantidad')";

    if ($conn->query($sqlAgregar) === TRUE) {
        echo "Registro agregado correctamente.";
    } else {
        echo "Error al agregar el registro: " . $conn->error;
    }
}

// Verificar si se ha enviado el formulario para eliminar un registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar"])) {
    $idProduccion = $_POST["eliminar"];

    // Consulta SQL para eliminar el registro de la tabla
    $sqlEliminar = "DELETE FROM Produccion WHERE Id_Producion = '$idProduccion'";

    if ($conn->query($sqlEliminar) === TRUE) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
}

// Verificar si se ha enviado el formulario para editar un registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["guardar"])) {
    $idProduccion = $_POST["id_produccion"];
    $idMateriaP = $_POST["id_materiaP"];
    $producto = $_POST["producto"];
    $nombre = $_POST["nombre"];
    $cantidad = $_POST["cantidad"];

    // Consulta SQL para actualizar los datos en la tabla
    $sqlEditar = "UPDATE Produccion SET Id_MateriaP = '$idMateriaP', Producto = '$producto', Nombre = '$nombre', Cantidad = '$cantidad' WHERE Id_Producion = '$idProduccion'";

    if ($conn->query($sqlEditar) === TRUE) {
        echo "Registro editado correctamente.";
    } else {
        echo "Error al editar el registro: " . $conn->error;
    }
}
?>

<!-- Agrega aquí tu código HTML y la tabla -->

<h2>Tabla de Producción</h2>

<form class="form-container" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="id_materiaP">Id Materia Prima:</label>
    <input type="text" name="id_materiaP" required>

    <label for="producto">Producto:</label>
    <input type="text" name="producto" required>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" required>

    <input type="submit" name="agregar" value="Agregar">
</form>

<table class="table-container">
    <tr>
        <th>Id Produccion</th>
        <th>Id Materia Prima</th>
        <th>Producto</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Acciones</th>
    </tr>

    <?php
    // Consulta SQL para obtener los datos de la tabla
    $sql = "SELECT * FROM Produccion";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Imprimir los datos en la tabla
        while ($row = $result->fetch_assoc()) {
            echo "<tr id='row-" . $row["Id_Producion"] . "'>";
            echo "<td>" . $row["Id_Producion"] . "</td>";
            echo "<td>" . $row["Id_MateriaP"] . "</td>";
            echo "<td>" . $row["Producto"] . "</td>";
            echo "<td>" . $row["Nombre"] . "</td>";
            echo "<td>" . $row["Cantidad"] . "</td>";
            echo "<td>
                    <form method='post' action='" . $_SERVER["PHP_SELF"] . "' style='display: inline-block;'>
                        <input type='hidden' name='eliminar' value='" . $row["Id_Producion"] . "'>
                        <button class='delete-btn' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\")'>Eliminar</button>
                    </form>
                    <button class='edit-btn' onclick='editRow(" . $row["Id_Producion"] . ")'>Editar</button>
                    <button class='save-btn' onclick='saveRow(" . $row["Id_Producion"] . ")' style='display: none;'>Guardar</button>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No se encontraron datos en la tabla.</td></tr>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</table>

<script>
    function editRow(id) {
        var nombre = document.getElementById("row-" + id).querySelectorAll("td")[3].innerHTML;
        var cantidad = document.getElementById("row-" + id).querySelectorAll("td")[4].innerHTML;

        document.getElementById("row-" + id).querySelectorAll("td")[3].innerHTML = "<input type='text' id='edit-nombre-" + id + "' value='" + nombre + "'>";
        document.getElementById("row-" + id).querySelectorAll("td")[4].innerHTML = "<input type='number' id='edit-cantidad-" + id + "' value='" + cantidad + "'>";

        document.getElementById("row-" + id).classList.add("editing");
        document.getElementById("row-" + id).querySelector(".edit-btn").style.display = "none";
        document.getElementById("row-" + id).querySelector(".save-btn").style.display = "inline-block";
    }

    function saveRow(id) {
        var nombre = document.getElementById("edit-nombre-" + id).value;
        var cantidad = document.getElementById("edit-cantidad-" + id).value;

        // Realizar la solicitud al servidor para guardar los cambios y actualizar la fila
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Si la respuesta es exitosa, actualizar la fila con los nuevos datos
                document.getElementById("row-" + id).querySelectorAll("td")[3].innerHTML = nombre;
                document.getElementById("row-" + id).querySelectorAll("td")[4].innerHTML = cantidad;

                document.getElementById("row-" + id).classList.remove("editing");
                document.getElementById("row-" + id).querySelector(".edit-btn").style.display = "inline-block";
                document.getElementById("row-" + id).querySelector(".save-btn").style.display = "none";
            }
        };
        xhr.send("guardar=true&id_produccion=" + id + "&nombre=" + nombre + "&cantidad=" + cantidad);
    }
</script>



</body>
</html>






