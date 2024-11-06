<?php
include("conexion_bd.php");

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y limpiar los datos del formulario
    $piso = $_POST['piso'];
    $mesa = $_POST['mesa'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $comensales = $_POST['comensales'];
    $correo = $_POST['correo'];
    $descripcion = $_POST['descripcion'];

    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO reservas (piso, mesa, fecha, hora, comensales, correo, descripcion) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssiss", $piso, $mesa, $fecha, $hora, $comensales, $correo, $descripcion);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "success";  // Devuelve 'success' si la inserción fue exitosa
    } else {
        echo "error";    // Devuelve 'error' si hubo un problema con la inserción
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conexion->close();
}
?>
