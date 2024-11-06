<?php
// Conexión a la base de datos
include("conexion_bd.php");

// Comprobar si se ha pasado un id en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener la información de la reserva con el id
    $sql = "SELECT * FROM reservas WHERE id = ?";
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
    $piso = $_POST['piso'];
    $mesa = $_POST['mesa'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $comensales = $_POST['comensales'];
    $correo = $_POST['correo'];
    $descripcion = $_POST['descripcion'];

    // Actualizar la reserva en la base de datos
    $update_sql = "UPDATE reservas SET piso = ?, mesa = ?, fecha = ?, hora = ?, comensales = ?, correo = ?, descripcion = ? WHERE id = ?";
    $update_stmt = $conexion->prepare($update_sql);
    $update_stmt->bind_param("ssssissi", $piso, $mesa, $fecha, $hora, $comensales, $correo, $descripcion, $id);

    if ($update_stmt->execute()) {
        echo "<script>alert('Reserva actualizada correctamente'); window.location.href = 'tablas.php';</script>";
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
    <link rel="stylesheet" href="css/style.css">
    <title>Editar Reserva</title>
</head>
<body>
    <div class="form-containerJ">
    <h1>Editar Reserva</h1>
    <form action="" method="POST">
        <!-- Pisos disponibles -->
        <label for="piso">Pisos disponibles:</label>
        <select id="piso" name="piso" required>
            <option value="">Pisos</option>
            <option value="piso1" <?php echo ($row['piso'] == 'piso1' ? 'selected' : ''); ?>>Piso 1</option>
            <option value="piso2" <?php echo ($row['piso'] == 'piso2' ? 'selected' : ''); ?>>Piso 2</option>
            <option value="piso3" <?php echo ($row['piso'] == 'piso3' ? 'selected' : ''); ?>>Piso 3</option>
            <option value="piso4" <?php echo ($row['piso'] == 'piso4' ? 'selected' : ''); ?>>Piso 4</option>
        </select><br>

        <!-- Mesa disponible -->
        <label for="mesa1">Mesa disponible:</label>
        <select id="mesa1" name="mesa" required>
            <option value="">Seleccione una mesa</option>
            <option value="mesa1" <?php echo ($row['mesa'] == 'mesa1' ? 'selected' : ''); ?>>Mesa 1</option>
            <option value="mesa2" <?php echo ($row['mesa'] == 'mesa2' ? 'selected' : ''); ?>>Mesa 2</option>
            <option value="mesa3" <?php echo ($row['mesa'] == 'mesa3' ? 'selected' : ''); ?>>Mesa 3</option>
            <option value="mesa4" <?php echo ($row['mesa'] == 'mesa4' ? 'selected' : ''); ?>>Mesa 4</option>
            <option value="mesa5" <?php echo ($row['mesa'] == 'mesa5' ? 'selected' : ''); ?>>Mesa 5</option>
            <option value="mesa6" <?php echo ($row['mesa'] == 'mesa6' ? 'selected' : ''); ?>>Mesa 6</option>
            <option value="mesa7" <?php echo ($row['mesa'] == 'mesa7' ? 'selected' : ''); ?>>Mesa 7</option>
            <option value="mesa8" <?php echo ($row['mesa'] == 'mesa8' ? 'selected' : ''); ?>>Mesa 8</option>
            <option value="mesa9" <?php echo ($row['mesa'] == 'mesa9' ? 'selected' : ''); ?>>Mesa 9</option>
            <option value="mesa10" <?php echo ($row['mesa'] == 'mesa10' ? 'selected' : ''); ?>>Mesa 10</option>
            <option value="mesa11" <?php echo ($row['mesa'] == 'mesa11' ? 'selected' : ''); ?>>Mesa 11</option>
            <option value="mesa12" <?php echo ($row['mesa'] == 'mesa12' ? 'selected' : ''); ?>>Mesa 12</option>
        </select><br>

        <!-- Fecha de la reserva -->
        <label for="fecha1">Fecha de la reserva:</label>
        <input type="date" id="fecha1" name="fecha" value="<?php echo $row['fecha']; ?>" required><br>

        <!-- Hora de la reserva -->
        <label for="hora1">Hora de la reserva:</label>
        <input type="time" id="hora1" name="hora" value="<?php echo $row['hora']; ?>" required><br>

        <!-- Número de comensales -->
        <label for="comensales1">Número de comensales:</label>
        <input type="number" id="comensales1" name="comensales" value="<?php echo $row['comensales']; ?>" min="1" max="10" required><br>

        <!-- Correo electrónico -->
        <label for="correo1">Correo electrónico:</label>
        <input type="email" id="correo1" name="correo" value="<?php echo $row['correo']; ?>" required><br>

        <!-- Descripción de la orden -->
        <label for="descripcion1">Descripción de la orden:</label>
        <textarea id="descripcion1" name="descripcion" rows="4" placeholder="Escribe aquí tu orden..." required><?php echo $row['descripcion']; ?></textarea><br>

        <!-- Botón de envío -->
        <button type="submit">Actualizar Reserva</button>
    </form>
    </div>
</body>
</html>
