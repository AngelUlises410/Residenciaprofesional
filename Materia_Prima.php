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
    <title>Tabla de Materia Prima</title>
    <link rel="stylesheet" type="text/css" href="assets/css/estilomenu.css">
    
    <style>
        
    
    </style>
</head>
<body>
       <?php include 'menu.php'; ?>
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
if (isset($_POST["agregar"])) {
    $nombre = $_POST["nombre"];
    $cantidad = $_POST["cantidad"];
    $tipoMateria = $_POST["tipo_materia"];

    $sqlAgregar = "INSERT INTO materia_prima (nombre, cantidad, tipo_materia) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sqlAgregar);
    $stmt->bind_param("sis", $nombre, $cantidad, $tipoMateria);

    if ($stmt->execute()) {
        echo "Registro agregado correctamente.";
    } else {
        echo "Error al agregar el registro: " . $stmt->error;
    }

    $stmt->close();
}

// Verificar si se ha enviado el formulario para eliminar un registro
if (isset($_POST["eliminar"])) {
    $idEliminar = $_POST["eliminar"];

    $sqlEliminar = "DELETE FROM materia_prima WHERE id_materiaP = ?";
    $stmt = $conn->prepare($sqlEliminar);
    $stmt->bind_param("i", $idEliminar);

    if ($stmt->execute()) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . $stmt->error;
    }

    $stmt->close();
}

// Verificar si se ha enviado el formulario para editar un registro
if (isset($_POST["editar"])) {
    $idEditar = $_POST["editar"];
    $nombreEditar = $_POST["nombre"];
    $cantidadEditar = $_POST["cantidad"];
    $tipoMateriaEditar = $_POST["tipo_materia"];

    $sqlEditar = "UPDATE materia_prima SET nombre = ?, cantidad = ?, tipo_materia = ? WHERE id_materiaP = ?";
    $stmt = $conn->prepare($sqlEditar);
    $stmt->bind_param("sisi", $nombreEditar, $cantidadEditar, $tipoMateriaEditar, $idEditar);

    if ($stmt->execute()) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . $stmt->error;
    }

    $stmt->close();
}

?>

<h2>Tabla de Materia Prima</h2>

<form class="form-container" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <h2>Formulario Agregar</h2>
    <link rel="stylesheet" href="Materia/styles.css">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br><br>
    
    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" required><br><br>
    
    <label for="tipo_materia">Tipo de Materia:</label>
    <input type="text" name="tipo_materia" required><br><br>
    
    <input type="submit" name="agregar" value="Agregar">
</form>

<br>

<table class="table-container">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Tipo de Materia</th>
        <th>Acciones</th>
    </tr>

    <?php
    // Consulta SQL para obtener los datos de la tabla
    $sql = "SELECT * FROM materia_prima";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Imprimir los datos en la tabla
        while ($row = $result->fetch_assoc()) {
            echo "<tr id='row-" . $row["id_materiaP"] . "'>";
            echo "<td>" . $row["id_materiaP"] . "</td>";
            echo "<td><span id='nombre-" . $row["id_materiaP"] . "'>" . $row["nombre"] . "</span></td>";
            echo "<td><span id='cantidad-" . $row["id_materiaP"] . "'>" . $row["cantidad"] . "</span></td>";
            echo "<td><span id='tipo_materia-" . $row["id_materiaP"] . "'>" . $row["tipo_materia"] . "</span></td>";
            echo "<td>";
            echo "<button class='edit-btn' onclick='editRow(" . $row["id_materiaP"] . ")'>Editar</button>";
            echo "<button class='save-btn' onclick='saveRow(" . $row["id_materiaP"] . ")' style='display: none;'>Guardar</button>";
            echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "' style='display:inline-block;'>";
            echo "<input type='hidden' name='eliminar' value='" . $row["id_materiaP"] . "'>";
            echo "<button class='delete-btn' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\")'>Eliminar</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "No se encontraron datos en la tabla.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>


</table>


<script>
    function editRow(id) {
        var nombre = document.getElementById("nombre-" + id).innerHTML;
        var cantidad = document.getElementById("cantidad-" + id).innerHTML;
        var tipoMateria = document.getElementById("tipo_materia-" + id).innerHTML;

        document.getElementById("nombre-" + id).innerHTML = "<input type='text' id='edit-nombre-" + id + "' value='" + nombre + "'>";
        document.getElementById("cantidad-" + id).innerHTML = "<input type='number' id='edit-cantidad-" + id + "' value='" + cantidad + "'>";
        document.getElementById("tipo_materia-" + id).innerHTML = "<input type='text' id='edit-tipo_materia-" + id + "' value='" + tipoMateria + "'>";

        document.getElementById("row-" + id).classList.add("editing");
        document.getElementById("row-" + id).querySelector(".edit-btn").style.display = "none";
        document.getElementById("row-" + id).querySelector(".save-btn").style.display = "inline-block";
    }


    function saveRow(id) {
        var nombre = document.getElementById("edit-nombre-" + id).value;
        var cantidad = document.getElementById("edit-cantidad-" + id).value;
        var tipoMateria = document.getElementById("edit-tipo_materia-" + id).value;

        // Realizar la solicitud al servidor para guardar los cambios y actualizar la fila
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("nombre-" + id).innerHTML = nombre;
                document.getElementById("cantidad-" + id).innerHTML = cantidad;
                document.getElementById("tipo_materia-" + id).innerHTML = tipoMateria;

                document.getElementById("row-" + id).classList.remove("editing");
                document.getElementById("row-" + id).querySelector(".edit-btn").style.display = "inline-block";
                document.getElementById("row-" + id).querySelector(".save-btn").style.display = "none";
            }
        };
        xhr.send("editar=" + id + "&nombre=" + nombre + "&cantidad=" + cantidad + "&tipo_materia=" + tipoMateria);
    }
</script>
</body>
</html>
