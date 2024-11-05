<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>login</title>
</head>
<body>

<div class="login-container">
    <h2 class="login-title">Iniciar sesión</h2>
    <?php
    include("conexion_bd.php");
    include("controlador.php");
    ?>
    
    <form action="" method="POST" class="login-form">
    <div class="input-group">
                <label for="username"> Usuario</label>
                <input type="text" id="user" name="user">
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password">
            </div>
            <input class="btn-login" name="btningresar" type="submit" value="INCIAR SESION"><br>
            <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
    </form>
</div>
    
</body>
</html>