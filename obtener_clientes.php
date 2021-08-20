<?php
include_once "cors.php";
include_once "funciones.php";
$clientes = obtenerClientes();
echo json_encode($clientes);