<?php
include 'vars.php';

// Crear conexión a la base de datos SQLite
$conex = new PDO("sqlite:" . $nombre_fichero); 

// Obtener datos de la tabla de fabricantes
$stmt_fabricantes = $conex->prepare('SELECT * FROM Fabricantes;');
$stmt_fabricantes->execute();
$fabricantes = $stmt_fabricantes->fetchAll(PDO::FETCH_ASSOC);

// Cerrar la consulta y la conexión
$stmt_fabricantes = null;
$conex = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Fabricantes</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<div class="w3-container">
    <h2>Tabla de Fabricantes</h2>

    <div class="w3-row">
        <div class="w3-col m12">
            <table class="w3-table-all">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fabricantes as $fabricante): ?>
                    <tr>
                        <td><?= $fabricante['id'] ?></td>
                        <td><?= $fabricante['nombre'] ?></td>
                        <td><?= $fabricante['telefono'] ?></td>
                        <td><?= $fabricante['direccion'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="button" onclick="window.location.href='http://localhost/FarmaciaSanchez/index.html'" class="w3-button w3-blue w3-block" style="margin-top: 10px;">Volver al Índice</button>
        </div>
    </div>
</div>

</body>
</html>
