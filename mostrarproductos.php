<?php
include 'vars.php';

$conex = new PDO("sqlite:" . $nombre_fichero); 

// Obtener datos de la tabla de productos
$stmt_productos = $conex->prepare('SELECT * FROM Productos;');
$stmt_productos->execute();
$productos = $stmt_productos->fetchAll(PDO::FETCH_ASSOC);

// Cerrar la consulta y la conexión
$stmt_productos = null;
$conex = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Productos</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<div class="w3-container">
    <h2>Tabla de Productos</h2>

    <div class="w3-row">
        <div class="w3-col m12">
            <table class="w3-table-all">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>codigo de barras</th>
                        <th>cantidad de stock</th>
                        <th>precio unitario</th>
                        <th>categoria del medicamento</th>
                        <th>fabricante</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= $producto['id'] ?></td>
                        <td><?= $producto['nombre'] ?></td>
                        <td><?= $producto['codigobarras'] ?></td>
                        <td><?= $producto['cantidadstock'] ?></td>
                        <td><?= $producto['preciounitario'] ?></td>
                        <td><?= $producto['categoriamedicamento'] ?></td>
                        <td><?= $producto['fabricante'] ?></td>
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
