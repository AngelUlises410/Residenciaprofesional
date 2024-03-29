<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gomper";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos de la tabla carrito
$sql = "SELECT carrito.ID_Carrito, ventas.ID_Venta, ventas.ID_Producto, ventas.Nombre_Producto, ventas.Costo_Producto, ventas.Descuento_Producto, ventas.Cantidad_Producto
        FROM carrito
        INNER JOIN ventas ON carrito.ID_Venta = ventas.ID_Venta";
$result = $conn->query($sql);
?>
<link rel="stylesheet" type="text/css" href="assets/css/estilomenu.css">

<body>
       <?php include 'menu.php'; ?>
   </body>


<!DOCTYPE html>
<html>
<head>
    <title>Botón con imagen en la esquina superior derecha</title>
    <style>
        .button-container {
            position: fixed;
            top: 2cm;
            right: 2cm;
        }
        .button-container img {
            width: 1cm;
            height: 1cm;
        }
    </style>
</head>
<body>
    <div class="button-container">
        <a href="Cliente.php">
            <img src="assets/images/03.png" alt="Texto alternativo de la imagen">
        </a>
    </div>
</body>
</html>







<div class="table-container">
<h2>Tabla de Carrito</h2>
<style>
    /* Estilos para la tabla */
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

        .table-container {
            margin-top: 20px;
        }

        .table-container table {
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

        .table-container tr:hover {
            background-color: #ffffff;
            color: #000000;
        }

        .table-container tr:hover td {
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
<table>
    <tr>
        <th>ID Carrito</th>
        <th>ID Venta</th>
        <th>ID Producto</th>
        <th>Nombre Producto</th>
        <th>Costo Producto</th>
        <th>Descuento Producto</th>
        <th>Cantidad Producto</th>
        <th>Acciones</th>
    </tr>
    <?php
    // Mostrar los datos de la tabla carrito
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID_Carrito"] . "</td>";
        echo "<td>" . $row["ID_Venta"] . "</td>";
        echo "<td>" . $row["ID_Producto"] . "</td>";
        echo "<td>" . $row["Nombre_Producto"] . "</td>";
        echo "<td>" . $row["Costo_Producto"] . "</td>";
        echo "<td>" . $row["Descuento_Producto"] . "</td>";
        echo "<td>" . $row["Cantidad_Producto"] . "</td>";
        echo "<td><button onclick='eliminarCarrito(" . $row["ID_Carrito"] . ")'>Eliminar</button></td>";
        echo "</tr>";
    }
    ?>
</table>

<button onclick='comprarTodo()'>Comprar Todo</button>

<script>
    function eliminarCarrito(carritoId) {
        // Crear una instancia de XMLHttpRequest
        var xmlhttp = new XMLHttpRequest();
        
        // Definir la función de respuesta
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Mostrar una alerta con el mensaje de respuesta
                alert(this.responseText);
                
                // Recargar la página para actualizar la tabla
                location.reload();
            }
        };
        
        // Definir la solicitud POST al archivo "eliminar_carrito.php"
        xmlhttp.open("POST", "Cliente/eliminar_carrito.php", true);
        
        // Establecer el encabezado para indicar que se envía información codificada
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        // Obtener los datos que se enviarán para eliminar el elemento del carrito
        var carritoData = "carritoId=" + carritoId;
        
        // Enviar la solicitud con los datos
        xmlhttp.send(carritoData);
    }
    
    function comprarTodo() {
        // Obtener los datos de la tabla
        var table = document.getElementsByTagName("table")[0];
        var rows = table.getElementsByTagName("tr");
        
        // Crear una lista para almacenar los IDs de los productos
        var productos = [];
        
        // Recorrer las filas de la tabla (excepto la primera que contiene los encabezados)
        for (var i = 1; i < rows.length; i++) {
            var row = rows[i];
            
            // Obtener el ID del producto de la última columna
            var idProducto = row.cells[2].innerHTML;
            
            // Agregar el ID del producto a la lista
            productos.push(idProducto);
        }
        
        // Enviar la lista de productos a través de una solicitud AJAX
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Mostrar una alerta con el mensaje de respuesta
                alert(this.responseText);
                
                // Recargar la página para actualizar la tabla
                location.reload();
            }
        };
        
        xmlhttp.open("POST", "Cliente/comprar_todo.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("productos=" + JSON.stringify(productos));
    }
</script>
</div>








