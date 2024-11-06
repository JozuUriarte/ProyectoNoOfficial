<?php
// Conexión a la base de datos
include("conexion_bd.php");

if (isset($_GET['id']) && isset($_GET['tipo'])) {
    $id = $_GET['id'];
    $tipo = $_GET['tipo'];

    if ($tipo == 'salon') {
        // Eliminar reserva de salón
        $sql = "DELETE FROM reservadesalones WHERE id = ?";
    } else if ($tipo == 'mesa') {
        // Eliminar reserva de mesa (si también usas este tipo)
        $sql = "DELETE FROM reservas WHERE id = ?";
    }

    // Preparar la consulta
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("i", $id); // Asegúrate de que el tipo sea entero (i)
        
        if ($stmt->execute()) {
            echo "Reserva eliminada con éxito.";
        } else {
            echo "Hubo un problema al eliminar la reserva.";
        }
    } else {
        echo "Error en la consulta.";
    }

    $conexion->close();
} else {
    echo "Parámetros inválidos.";
}
?>
