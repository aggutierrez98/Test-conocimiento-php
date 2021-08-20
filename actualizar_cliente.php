
<?php
include_once "cors.php";
$cliente = json_decode(file_get_contents("php://input"));
include_once "funciones.php";
$resultado = actualizarCliente($cliente);
echo json_encode($resultado);