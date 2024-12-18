<?php
// Conexión a la base de datos
include("conexion_bd.php");

// Consulta para obtener los datos de la tabla
$sql = "SELECT id, piso, mesa, fecha, hora, comensales, correo, descripcion FROM reservas";
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tablas.css">
    <title>Reservas</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Piso</th>
                <th>Mesa</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Número de comensales</th>
                <th>Correo electrónico</th>
                <th>Descripción de la orden</th>
                <th>Editar</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Salida de datos de cada fila
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["piso"] . "</td>";
                    echo "<td>" . $row["mesa"] . "</td>";
                    echo "<td>" . date("d/m/Y", strtotime($row["fecha"])) . "</td>";
                    echo "<td>" . date("H:i", strtotime($row["hora"])) . "</td>";
                    echo "<td>" . $row["comensales"] . "</td>";
                    echo "<td>" . $row["correo"] . "</td>";
                    echo "<td>" . nl2br($row["descripcion"]) . "</td>";
                    echo "<td class='actions'><button class='btn delete' onclick='eliminarReserva(" . $row['id'] . ", \"mesa\")'>Eliminar</button></td>";
                    echo "<td class='actions'><a href='editar_reserva.php?id=" . $row['id'] . "' class='btn edit'>Editar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No hay reservas disponibles</td></tr>";
            }
            $conexion->close();
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