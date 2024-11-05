<?php

if (!empty($_POST["btningresar"])) {
    if (empty($_POST["user"]) && empty($_POST["password"])) {
        echo '<div class="alarma-danger">LOS CAMPOS ESTAN VACIOS</div>';
    } else {
        $usuario = $_POST["user"];
        $clave = $_POST["password"];
        
        // Ejecuta la consulta SQL
        $sql = $conexion->query("SELECT * FROM usuario WHERE usuario='$usuario' AND password='$clave'");
        
        if ($datos = $sql->fetch_object()) {
            header("Location: inicio.php"); // Redirige al usuario a inicio.php
            exit; // Detiene la ejecución después de redirigir
        } else {
            echo '<div class="alarma-danger">ACCESO DENEGADO</div>';
        }
    }
}

?>
