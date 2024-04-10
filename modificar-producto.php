<?php
include 'vars.php';


if (empty($_POST["id"])) {
    http_response_code(400);
	exit("Falta insertar el id a cambiar"); 
}

if (empty($_POST["nombre"])) {
    http_response_code(400);
	exit("Falta insertar el nuevo nombre del producto"); 
}

if (empty($_POST["codigobarras"])) {
    http_response_code(400);
	exit("falta insertar el nuevo codigo de barras del producto");
}
if (empty($_POST["cantidadstock"])) {
    http_response_code(400);
	exit("falta insertar la nueva cantidad de stock del producto"); 
}
if (empty($_POST["preciounitario"])) {
    http_response_code(400);
	exit("falta insertar el nuevo precio unitario del producto"); 
}
if (empty($_POST["categoriamedicamento"])) {
    http_response_code(400);
	exit("falta insertar la nueva categoria del producto"); 
}

if (empty($_POST["fabricante"])) {
    http_response_code(400);
	exit("falta insertar el nuevo fabricante del producto");
}

$conex = new PDO("sqlite:" . $nombre_fichero);
$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$producto=[
    "id"=> $_POST["id"],
    "nombre" => $_POST["nombre"],
    "codigobarras" => $_POST["codigobarras"],
    "cantidadstock" => $_POST["cantidadstock"],
    "preciounitario" => $_POST["preciounitario"],
    "categoriamedicamento" => $_POST["categoriamedicamento"],
    "fabricante" => $_POST["fabricante"]
];
try{
    # preparando la consulta
    $sentencia = $conex->prepare("UPDATE Productos SET nombre=:nombre, codigobarras=:codigobarras, cantidadstock=:cantidadstock, preciounitario=:preciounitario, categoriamedicamento=:categoriamedicamento, fabricante=:fabricante WHERE id=:id;");
    $resultado = $sentencia->execute($producto);
    http_response_code(200);
    echo "Producto actualizado";

}catch(PDOException $exc){
    http_response_code(400);
    echo "Lo siento, ocurrió un error:".$exc->getMessage();
}

?>