<?php
    
    $host ="localhost";
    $user ="ulises";
    $password ="1234";
    $database ="gomper2";

    $conexion = new mysqli($host, $user, $password, $database);

    
    if ($conexion->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
    }
    return $conexion;
    
?>