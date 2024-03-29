<?php
    session_start();

    include 'conexion.php';

    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena_usuario = $_POST['contrasena_usuario'];
    //contraseña incriptada
    //$contrasena_usuarioh = hash('sha512', $contrasena_usuario ); se cambio por password_hash.(ver codigo en pagina: registro_usuario.php

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre='$nombre_usuario'");
    $usuarios = $validar_login->fetch_all(MYSQLI_ASSOC);

    if(mysqli_num_rows($validar_login) > 0){
        foreach ($usuarios as $u) {
              if(password_verify($contrasena_usuario, $u['contrasena'])){
            $_SESSION['usuarios'] = $nombre_usuario;
            header("location: ../menu.php");
        exit;
            }else{
                echo '
        <script>
            alert("Contraseña incorrecta ");
            window.location = "../index.php";
        </script>
    ';
            }
        }
    }else{
         echo '
        <script>
            alert("Usuario no Existe, Verifique los Datos");
            window.location = "../index.php";
        </script>
    ';
    exit;
    }
?>