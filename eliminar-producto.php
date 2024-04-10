<?php
include 'vars.php';


if (empty($_POST["id"])) {
    http_response_code(400);
	exit("Falta insertar el id del producto a eliminar");
}


$conex = new PDO("sqlite:" . $nombre_fichero);
$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$id_producto = $_POST["id"];

try {
    
    $sentencia = $conex->prepare("DELETE FROM Productos WHERE id = :id");
    $sentencia->bindParam(':id', $id_producto);
    $resultado = $sentencia->execute();

   
    if ($resultado) {
        http_response_code(200);
        echo "Producto eliminado";
    } else {
        http_response_code(400);
        echo "No se pudo eliminar el producto";
    }

} 

catch (PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: " . $exc->getMessage();
}

?>