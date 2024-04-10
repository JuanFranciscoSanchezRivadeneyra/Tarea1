<?php
include 'vars.php';


if (empty($_POST["nombre"])) {
    http_response_code(400);
	exit("Falta insertar el nombre");
}

if (empty($_POST["categoria"])) {
    http_response_code(400);
	exit("falta insertar la categoria"); 
}
if (empty($_POST["cantidad"])) {
    http_response_code(400);
	exit("falta insertar la cantidad"); 
}
if (empty($_POST["fabricante"])) {
    http_response_code(400);
	exit("falta insertar el total de la venta"); 
}
//
$conex = new PDO("sqlite:" . $nombre_fichero);
$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$venta=[
    "nombre"=> $_POST["nombre"],
    "categoria"=> $_POST["categoria"],
    "cantidad"=> $_POST["cantidad"],
    "fabricante"=> $_POST["fabricante"]
];
try{
    
    $sentencia = $conex->prepare("INSERT INTO Ventas (nombre, categoria, cantidad, fabricante) VALUES (:nombre, :categoria, :cantidad, :fabricante);");
    $resultado = $sentencia->execute($venta);
    http_response_code(200);
    echo "Venta agregada con exito";

}catch(PDOException $exc){
    http_response_code(400);
    echo "Lo siento, ocurrió un error:".$exc->getMessage();
}

?>