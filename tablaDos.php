<?php
// Conexión a la base de datos
include("conexion_bd.php");

// Consulta para obtener los datos de la tabla de salones
$sql = "SELECT id, salon, paquete, fecha, hora, comensales, correo, descripcion FROM reservadesalones";
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tablas.css">
    <title>Reservas de Salones y Paquetes</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Salon</th>
                <th>Paquete</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Número de comensales</th>
                <th>Correo electrónico</th>
                <th>Descripción de la orden</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Verificar si hay resultados
            if ($result->num_rows > 0) {
                // Iterar sobre las filas de la base de datos
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["salon"] . "</td>";
                    echo "<td>" . $row["paquete"] . "</td>";
                    echo "<td>" . $row["fecha"] . "</td>";
                    echo "<td>" . $row["hora"] . "</td>";
                    echo "<td>" . $row["comensales"] . "</td>";
                    echo "<td>" . $row["correo"] . "</td>";
                    echo "<td>" . nl2br($row["descripcion"]) . "</td>"; // Para mostrar saltos de línea en la descripción
                    echo "<td class='actions'><button class='btn delete' onclick='eliminarReserva(" . $row['id'] . ", \"salon\")'>Eliminar</button></td>";
                    echo "<td class='actions'> <a href='editar_reserva_salon.php?id=" . $row['id'] . "' class='btn edit'>Editar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No hay reservas de salones disponibles.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <!-- Agregar el script al final de la página -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Asegúrate de tener jQuery -->
    <script>
        // Función para eliminar una reserva con AJAX
        function eliminarReserva(id, tipo) {
            if (confirm('¿Estás seguro de eliminar esta reserva?')) {
                $.ajax({
                    url: 'eliminar_reserva.php', // El archivo PHP que maneja la eliminación
                    type: 'GET',
                    data: { id: id, tipo: tipo }, // Enviar el id y tipo de reserva
                    success: function(response) {
                        alert(response); // Mostrar el mensaje de éxito o error
                        location.reload(); // Recargar la página para reflejar los cambios
                    },
                    error: function() {
                        alert('Hubo un error al eliminar la reserva.');
                    }
                });
            }
        }
    </script>
</body>
</html>
