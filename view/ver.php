<?php

include 'conexion.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id === false) {
    echo "ID inválido.";
    exit;
}

try {
    $sql = "SELECT * FROM aprendices WHERE id = :id";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $nombre = $row['nombre'];
        $fecha_nacimiento = $row['fecha_nacimiento'];

        echo $nombre . "<br>";
        echo $fecha_nacimiento;
    } else {
        echo "Aprendiz no encontrado.";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
