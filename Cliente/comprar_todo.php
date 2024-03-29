<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "ulises";
$password = "1234";
$dbname = "gomper2";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los productos seleccionados del carrito
$productos = json_decode($_POST["productos"]);

// Variable para verificar si ocurrieron errores durante la compra
$errores = false;

// Iniciar transacción
$conn->begin_transaction();

try {
    // Recorrer los productos seleccionados
    foreach ($productos as $idProducto) {
        // Obtener la información del producto
        $sql = "SELECT Cantidad_Producto FROM ventas WHERE ID_Producto = '$idProducto' FOR UPDATE";
        $result = $conn->query($sql);
        
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            // Verificar si hay suficiente cantidad del producto para comprar
            $cantidadProducto = $row["Cantidad_Producto"];
            
            if ($cantidadProducto > 0) {
                // Restar la cantidad del producto en la base de datos
                $sql = "UPDATE ventas SET Cantidad_Producto = Cantidad_Producto - 1 WHERE ID_Producto = '$idProducto'";
                $result = $conn->query($sql);
                
                if (!$result) {
                    throw new Exception("Error al actualizar la cantidad del producto: " . $conn->error);
                }
            } else {
                throw new Exception("No hay suficiente cantidad del producto: $idProducto");
            }
        } else {
            throw new Exception("No se encontró el producto: $idProducto");
        }
    }
    
    // Commit de la transacción
    $conn->commit();
    
    // Mensaje de éxito
    echo "Compra realizada con éxito";
} catch (Exception $e) {
    // Rollback de la transacción en caso de error
    $conn->rollback();
    
    // Mensaje de error
    echo "Error en la compra: " . $e->getMessage();
}

// Cerrar la conexión
$conn->close();
?>
