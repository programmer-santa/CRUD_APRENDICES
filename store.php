<?php

include 'conexion.php';

$nombre = trim($_POST['nombre']);
$fecha_nacimiento = trim($_POST['fecha_nacimiento']);

if (empty($nombre) || empty($fecha_nacimiento)) {
    echo "<script>alert('Todos los campos son obligatorios');</script>";
    echo "<script>window.location.href='index.php';</script>";
    exit;
}

try {
    $sql = "INSERT INTO aprendices (nombre, fecha_nacimiento) VALUES (:nombre, :fecha)";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':nombre', $nombre);
    $statement->bindParam(':fecha', $fecha_nacimiento);
    $resultado = $statement->execute();

    if ($resultado) {
        echo "<script>alert('Registro creado correctamente');</script>";
    } else {
        echo "<script>alert('Error al crear el registro');</script>";
    }

    echo "<script>window.location.href='index.php';</script>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
