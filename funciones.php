<?php

function eliminarCliente($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM clientes WHERE id = ?");
    return $sentencia->execute([$id]);
}

function actualizarCliente($cliente)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE clientes SET dni = ?, nombre = ?, apellido = ?, sexo = ?, telefono = ? WHERE id = ?");
    return $sentencia->execute([$cliente->dni, $cliente->nombre, $cliente->apellido, $cliente->sexo, $cliente->telefono, $cliente->id]);
}

function obtenerClientes()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT id, dni, nombre, apellido, sexo, telefono FROM clientes");
    return $sentencia->fetchAll();
}

function obtenerVariableDelEntorno($key)
{
    if (defined("_ENV_CACHE")) {
        $vars = _ENV_CACHE;
    } else {
        $file = "env.php";
        if (!file_exists($file)) {
            throw new Exception("El archivo de las variables de entorno ($file) no existe. Favor de crearlo");
        }
        $vars = parse_ini_file($file);
        define("_ENV_CACHE", $vars);
    }
    if (isset($vars[$key])) {
        return $vars[$key];
    } else {
        throw new Exception("La clave especificada (" . $key . ") no existe en el archivo de las variables de entorno");
    }
}
function obtenerConexion()
{
    $password = obtenerVariableDelEntorno("MYSQL_PASSWORD");
    $user = obtenerVariableDelEntorno("MYSQL_USER");
    $dbName = obtenerVariableDelEntorno("MYSQL_DATABASE_NAME");
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
