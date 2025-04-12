<?php

include 'conexion.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nombre = trim($_POST['nombre']);
$fecha_nacimiento = trim($_POST['fecha_nacimiento']);

if ($id === false || empty($nombre) || empty($fecha_nacimiento)) {
    echo "<script>alert('Datos inválidos');</script>";
    echo "<script>window.location.href='index.php';</script>";
    exit;
}

try {
    $sql = "UPDATE aprendices SET nombre = :nombre, fecha_nacimiento = :fecha WHERE id = :id";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':nombre', $nombre);
    $statement->bindParam(':fecha', $fecha_nacimiento);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $resultado = $statement->execute();

    if ($resultado) {
        echo "<script>alert('Registro actualizado correctamente');</script>";
    } else {
        echo "<script>alert('Error al actualizar el registro');</script>";
    }

    echo "<script>window.location.href='index.php';</script>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
