<?php
include 'vars.php';


if (empty($_POST["id"])) {
    http_response_code(400);
	exit("Falta insertar el id del fabricante a eliminar"); 
}


$conex = new PDO("sqlite:" . $nombre_fichero);
$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$idFabricante = $_POST["id"];

try {

    $sentencia = $conex->prepare("DELETE FROM Fabricantes WHERE id = :id");
    $sentencia->bindParam(':id', $idFabricante);
    $resultado = $sentencia->execute();

 
    if ($resultado) {
        http_response_code(200);
        echo "Fabricante Eliminado";
    } else {
        http_response_code(400);
        echo "No se pudo eliminar al Fabricante";
    }

} catch (PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: " . $exc->getMessage();
}

?>