<?php
// Conexión a la base de datos
include("conexion_bd.php");

// Comprobar si se ha pasado un id en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener la información de la reserva con el id
    $sql = "SELECT * FROM reservadesalones WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Verificar si la reserva existe
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Reserva no encontrada.");
    }
} else {
    die("ID no proporcionado.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $salon = $_POST['salon'];
    $paquete = $_POST['paquete'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $comensales = $_POST['comensales'];
    $correo = $_POST['correo'];
    $descripcion = $_POST['descripcion'];

    // Actualizar la reserva en la base de datos
    $update_sql = "UPDATE reservadesalones SET salon = ?, paquete = ?, fecha = ?, hora = ?, comensales = ?, correo = ?, descripcion = ? WHERE id = ?";
    $update_stmt = $conexion->prepare($update_sql);
    $update_stmt->bind_param("ssssissi", $salon, $paquete, $fecha, $hora, $comensales, $correo, $descripcion, $id);

    if ($update_stmt->execute()) {
        echo "<script>alert('Reserva de salón actualizada correctamente'); window.location.href = 'tablaDos.php';</script>";
    } else {
        echo "Error al actualizar la reserva.";
    }
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"> <!-- Tu archivo CSS con los estilos generales -->
    <title>Editar Reserva de Salón</title>
</head>
<body>
    <div class="form-containerJ">
        <h1>Editar Reserva de Salón</h1>
        <form id="form-salones" action="" method="POST">
            <label for="salon">Salones disponibles:</label>
            <select id="salon" name="salon" required>
                <option value="">Seleccione aquí</option>
                <option value="Salon privado 1" <?php echo ($row['salon'] == 'Salon privado 1' ? 'selected' : ''); ?>>Salon privado 1</option>
                <option value="Salon privado 2" <?php echo ($row['salon'] == 'Salon privado 2' ? 'selected' : ''); ?>>Salon privado 2</option>
                <option value="Salon privado 3" <?php echo ($row['salon'] == 'Salon privado 3' ? 'selected' : ''); ?>>Salon privado 3</option>
                <option value="Jardin" <?php echo ($row['salon'] == 'Jardin' ? 'selected' : ''); ?>>Jardin</option>
                <option value="Patio de juegos" <?php echo ($row['salon'] == 'Patio de juegos' ? 'selected' : ''); ?>>Patio de juegos</option>
            </select>

            <label for="paquete">Paquete disponible:</label>
            <select id="paquete" name="paquete" required>
                <option value="">Seleccione un paquete de su gusto</option>
                <option value="Paquete Ejecutivo para Eventos Corporativos" <?php echo ($row['paquete'] == 'Paquete Ejecutivo para Eventos Corporativos' ? 'selected' : ''); ?>>Paquete Ejecutivo para Eventos Corporativos</option>
                <option value="Paquete de bodas: Un dia de ensueño" <?php echo ($row['paquete'] == 'Paquete de bodas: Un dia de ensueño' ? 'selected' : ''); ?>>Paquete de Bodas: Un Día de Ensueño</option>
                <option value="Paquete de Cumplaños y Fiestas Sociales" <?php echo ($row['paquete'] == 'Paquete de Cumplaños y Fiestas Sociales' ? 'selected' : ''); ?>>Paquete de Cumpleaños y Fiestas Sociales</option>
                <option value="Nuevo paquete para fiesta de niños" <?php echo ($row['paquete'] == 'Nuevo paquete para fiesta de niños' ? 'selected' : ''); ?>>Nuevo Paquete para fiestas de niños</option>
            </select>

            <label for="fecha">Fecha de la reserva:</label>
            <input type="date" id="fecha" name="fecha" value="<?php echo $row['fecha']; ?>" required>

            <label for="hora">Hora de la reserva:</label>
            <input type="time" id="hora" name="hora" value="<?php echo $row['hora']; ?>" required>

            <label for="comensales">Número de comensales:</label>
            <input type="number" id="comensales" name="comensales" value="<?php echo $row['comensales']; ?>" min="1" max="10" required>

            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" value="<?php echo $row['correo']; ?>" required>

            <label for="descripcion">Descripción de la orden:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required><?php echo $row['descripcion']; ?></textarea>

            <button type="submit" class="btn-submit">Actualizar Reserva</button>
        </form>
    </div>
</body>
</html>
