<?php
include 'vars.php';

// Crear conexión a la base de datos SQLite
$conex = new PDO("sqlite:" . $nombre_fichero); 

// Obtener datos de la tabla de ventas
$stmt_ventas = $conex->prepare('SELECT * FROM Ventas;');
$stmt_ventas->execute();
$ventas = $stmt_ventas->fetchAll(PDO::FETCH_ASSOC);

// Cerrar la consulta y la conexión
$stmt_ventas = null;
$conex = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Ventas</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<div class="w3-container">
    <h2>Tabla de Ventas</h2>

    <div class="w3-row">
        <div class="w3-col m12">
            <table class="w3-table-all">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Cantidad</th>
                        <th>Fabricante</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ventas as $venta): ?>
                    <tr>
                        <td><?= $venta['id'] ?></td>
                        <td><?= $venta['nombre'] ?></td>
                        <td><?= $venta['categoria'] ?></td>
                        <td><?= $venta['cantidad'] ?></td>
                        <td><?= $venta['fabricante'] ?></td>
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
