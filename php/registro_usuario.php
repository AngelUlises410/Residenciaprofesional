<?php

    include 'conexion.php';

    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena_usuario = $_POST['contrasena_usuario'];
    //contraseña incriptada, se usa password_hash, una de las versiones recientes en php.
    $contrasena_usuarioh = password_hash($contrasena_usuario,PASSWORD_DEFAULT);

    $query = "INSERT INTO usuarios (nombre, contrasena) 
                VALUES('$nombre_usuario','$contrasena_usuarioh')";

    //verificar que el nombre completo no se repita en la base de datos
    $verificar_nombre = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre='$nombre_usuario' ");

    if(mysqli_num_rows($verificar_nombre) > 0){
        echo '
            <script>
            alert("Este Usuario ya esta Registrado");
            window.location = "../index.php";
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario Registrado Exitosamente");
                window.location = "../index.php";
            </script>
        ';
    }else{
        echo '
        <script>
            alert("Intetalo De Nuevo Usuario No Registrado");
            window.location = "../index.php";
        </script>
    '; 
    }

    mysqli_close($conexion);
?>