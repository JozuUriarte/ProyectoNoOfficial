<?php
include("conexion_bd.php");

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y limpiar los datos del formulario
    $salon = $_POST['salon'];
    $paquete = $_POST['paquetes'];
    $fecha = $_POST['fecha2'];
    $hora = $_POST['hora2'];
    $comensales = $_POST['comensales2'];
    $correo = $_POST['correo2'];
    $descripcion = $_POST['descripcion2'];

    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO reservadesalones (salon, paquete, fecha, hora, comensales, correo, descripcion) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssiss", $salon, $paquete, $fecha, $hora, $comensales, $correo, $descripcion);

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
