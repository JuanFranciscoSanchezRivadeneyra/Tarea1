<?php
include 'vars.php';


if (empty($_POST["nombre"])) {
    http_response_code(400);
	exit("Falta insertar el nombre del fabricante");
}

if (empty($_POST["telefono"])) {
    http_response_code(400);
	exit("falta insertar el telefono del fabricante");
}
if (empty($_POST["direccion"])) {
    http_response_code(400);
	exit("falta insertar la direccion del fabricante"); 
}


$conex = new PDO("sqlite:" . $nombre_fichero);
$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$distribuidor=[
    "nombre"=> $_POST["nombre"],
    "telefono"=> $_POST["telefono"],
    "direccion"=> $_POST["direccion"],

];
try{
    
    $sentencia = $conex->prepare("INSERT INTO Fabricantes (nombre, telefono, direccion) VALUES (:nombre, :telefono, :direccion);");
    $resultado = $sentencia->execute($distribuidor);
    http_response_code(200);
    echo "Fabricante agregado exitosamente";

}catch(PDOException $exc){
    http_response_code(400);
    echo "Lo siento, ocurrió un error:".$exc->getMessage();
}

?>