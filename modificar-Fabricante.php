<?php
include 'vars.php';


if (empty($_POST["id"])) {
    http_response_code(400);
	exit("Falta insertar el id del fabricante a cambiar");
}

if (empty($_POST["nombre"])) {
    http_response_code(400);
	exit("Falta insertar el nuevo nombre del fabricante");
}

if (empty($_POST["telefono"])) {
    http_response_code(400);
	exit("falta insertar el nuevo telefono del fabricante");
}
if (empty($_POST["direccion"])) {
    http_response_code(400);
	exit("falta insertar la nueva direccion del fabricante");
}


$conex = new PDO("sqlite:" . $nombre_fichero);
$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$distribuidor=[
    "id" => $_POST["id"],
    "nombre"=> $_POST["nombre"],
    "telefono"=> $_POST["telefono"],
    "direccion"=> $_POST["direccion"],

];
try{
    # preparando la consulta
    $sentencia = $conex->prepare("UPDATE Fabricantes SET nombre=:nombre, telefono=:telefono, direccion=:direccion  WHERE id=:id;");
    $resultado = $sentencia->execute($distribuidor);
    http_response_code(200);
    echo "datos actualizados del fabricante";

}catch(PDOException $exc){
    http_response_code(400);
    echo "Lo siento, ocurrió un error:".$exc->getMessage();
}

?>