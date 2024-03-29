<?php 

    session_start();

    if(isset($_SESSION['usuarios'])){
        header("location: index.php");
    }

?>

<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="assets/images/11.jpg" type="image/x-icon">
</head>
<body>
    <!-- LOGIN -->
    <div class="background"></div>
    <div class="container">
        <div class="item">
            <h2 class="logo"><i class='bx bxs-building'></i>Empresa GOMPER.</h2>
            <div class="text-item">
                <h2>¡Bienvenido! <br><span>
                    Estamos encantados de tenerte de nuevo.
                </span></h2>
                <p>Gracias a ti, estamos creciendo más allá de nuestras expectativas. 
                    Compartamos el éxito cada día.</p>
                
            </div>
        </div>
        <!--formulario de login-->
        <div class="login-section">
            <div class="form-box login">
                <form action="php/login_usuario.php" method="POST">
                    <h2>Iniciar Sesión</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-user'></i></span>
                        <input type="text" name="nombre_usuario" id="nombre_usuario" autocomplete="off" required>
                        <label >Nombre</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="password" name="contrasena_usuario" id="contrasena_usuario" required>
                        <label>Contraseña</label>
                    </div>
                    <div class="remember-password">
                        <label for=""><input type="checkbox">Recuerda</label>
                        <a href="#">Olvidaste tu contraseña</a>
                    </div>
                    <button class="btn">Ingresar</button>
                    <div class="create-account">
                        <p>¿Aún no tienes cuenta?<a href="#" class="register-link"> 
                            Registrarse</a></p>
                    </div>
                </form>
            </div>
            <!--formulario de ingreso de Login-->
            <div class="form-box register">
                <form action="php/registro_usuario.php" method="POST">

                    <h2>Ingreso</h2>

                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-user'></i></span>
                        <input type="text" name="nombre_usuario" id="nombre_usuario" autocomplete="off" required>
                        <label >Nombre</label>
                    </div> 
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="password" name="contrasena_usuario" id="contrasena_usuario" required>
                        <label>Contraseña</label>
                    </div>
                    <div class="remember-password">
                        <label for=""><input type="checkbox">Estoy de acuerdo con
                             los términos y condiciones</label>
                    </div>
                    <button class="btn">Registrarse</button>
                    <div class="create-account">
                        <p>Tienes una cuenta? <a href="#" class="login-link">
                            Iniciar Sesión</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/index.js"></script>
</body>
</html>