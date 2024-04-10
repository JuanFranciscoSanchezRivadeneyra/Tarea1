<?php
include 'vars.php';


if (empty($_POST["id"])) {
    http_response_code(400);
	exit("Falta insertar el id a cambiar"); 
}

if (empty($_POST["nombre"])) {
    http_response_code(400);
	exit("Falta insertar el nuevo nombre"); 
}
if (empty($_POST["categoria"])) {
    http_response_code(400);
	exit("falta insertar la nueva categoria"); 
}
if (empty($_POST["cantidad"])) {
    http_response_code(400);
	exit("falta insertar la nueva cantidad"); 
}
if (empty($_POST["fabricante"])) {
    http_response_code(400);
	exit("falta insertar el nuevo fabricante de la venta"); 
}

$conex = new PDO("sqlite:" . $nombre_fichero);
$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$venta=[
    "id" => $_POST["id"],
    "nombre"=> $_POST["nombre"],
    "categoria"=> $_POST["categoria"],
    "cantidad"=> $_POST["cantidad"],
    "fabricante"=> $_POST["fabricante"]
];
try{
    # preparando la consulta
    $sentencia = $conex->prepare("UPDATE Ventas set nombre=:nombre, categoria=:categoria, cantidad=:cantidad, fabricante=:fabricante where id=:id;");
    $resultado = $sentencia->execute($venta);
    http_response_code(200);
    echo "Venta Modificada con exito";

}catch(PDOException $exc){
    http_response_code(400);
    echo "Lo siento, ocurrió un error:".$exc->getMessage();
}

?>