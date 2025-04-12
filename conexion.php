<?php

$server = "localhost";
$database = "aprendices";
$usuario = "root";
$contrasenia = "";

try {
    $conexion = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $usuario, $contrasenia);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    die("Error de conexion". $e->getMessage());
    }

?>
