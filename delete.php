<?php

include 'conexion.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id === false) {
    echo "<script>alert('ID inválido');</script>";
    echo "<script>window.location.href='index.php';</script>";
    exit;
}

try {
    $sql = "DELETE FROM aprendices WHERE id = :id";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $resultado = $statement->execute();

    if ($resultado) {
        echo "<script>alert('Registro eliminado correctamente');</script>";
    } else {
        echo "<script>alert('Error al eliminar el registro');</script>";
    }

    echo "<script>window.location.href='index.php';</script>";

} catch (PDOException $e) {
    echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    echo "<script>window.location.href='index.php';</script>";
}

