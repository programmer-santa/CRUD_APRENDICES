class AprendicesController {

public static function eliminar($id) {
    include 'conexion.php';
    $id = filter_var($id, FILTER_VALIDATE_INT);

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

        $mensaje = $resultado ? 'Registro eliminado correctamente' : 'Error al eliminar el registro';
        echo "<script>alert('$mensaje');</script>";
        echo "<script>window.location.href='index.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
}

public static function guardar($nombre, $fecha_nacimiento) {
    include 'conexion.php';
    $nombre = trim($nombre);
    $fecha_nacimiento = trim($fecha_nacimiento);

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

        $mensaje = $resultado ? 'Registro creado correctamente' : 'Error al crear el registro';
        echo "<script>alert('$mensaje');</script>";
        echo "<script>window.location.href='index.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

public static function actualizar($id, $nombre, $fecha_nacimiento) {
    include 'conexion.php';
    $id = filter_var($id, FILTER_VALIDATE_INT);
    $nombre = trim($nombre);
    $fecha_nacimiento = trim($fecha_nacimiento);

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

        $mensaje = $resultado ? 'Registro actualizado correctamente' : 'Error al actualizar el registro';
        echo "<script>alert('$mensaje');</script>";
        echo "<script>window.location.href='index.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
}
