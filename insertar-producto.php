<?php
include 'vars.php';


if (empty($_POST["nombre"])) {
    http_response_code(400);
	exit("Falta insertar el nombre del producto"); 
}

if (empty($_POST["codigobarras"])) {
    http_response_code(400);
	exit("falta insertar el codigo de barras del producto"); 
}
if (empty($_POST["cantidadstock"])) {
    http_response_code(400);
	exit("falta insertar la cantidad de stock del producto");
}
if (empty($_POST["preciounitario"])) {
    http_response_code(400);
	exit("falta insertar el precio unitario del producto"); 
}
if (empty($_POST["categoriamedicamento"])) {
    http_response_code(400);
	exit("falta insertar la categoria del producto"); 
}

if (empty($_POST["fabricante"])) {
    http_response_code(400);
	exit("falta insertar el fabricante del producto"); 
}
//
$conex = new PDO("sqlite:" . $nombre_fichero);
$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$producto = [
    "nombre" => $_POST["nombre"],
    "codigobarras" => $_POST["codigobarras"],
    "cantidadstock" => $_POST["cantidadstock"],
    "preciounitario" => $_POST["preciounitario"],
    "categoriamedicamento" => $_POST["categoriamedicamento"],
    "fabricante" => $_POST["fabricante"]
];
try{
 
        $sentencia = $conex->prepare("INSERT INTO Productos (nombre, codigobarras, cantidadstock, preciounitario, categoriamedicamento, fabricante) VALUES (:nombre, :codigobarras, :cantidadstock, :preciounitario, :categoriamedicamento, :fabricante)");
        $resultado = $sentencia->execute($producto);
    http_response_code(200);
    echo "Producto agregado";

}

catch(PDOException $exc){
    http_response_code(400);
    echo "Lo siento, ocurrió un error:".$exc->getMessage();
}

?>