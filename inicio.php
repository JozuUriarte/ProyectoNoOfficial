<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
    <style>
        body {
            background-image: url('media/fondoreservas.jpg');
            background-size: cover; /* Para que la imagen cubra toda la pantalla */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            height: 100vh; /* Asegura que el fondo cubra la pantalla completa */
            display: flex;
            justify-content: center;
            align-items: center; /* Centra el contenido verticalmente */
            margin: 0; /* Elimina cualquier margen del body */
        }

    </style>
</head>

<body>
    <div class="reservas_ocntainerphp">
        <div class="tile_reservasphp">
            <h1>RESERVAS</h1>
        </div>
        <div class="botones-reservasphp">
            <a href="tablas.php" class="btn-reservas">RESERVAS</a>
            <a href="tablaDos.php" class="btn-reservas">RESERVAS DE SALONES</a>
        </div>
    </div>
</body>
</html>
