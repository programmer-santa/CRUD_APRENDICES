<?php
require_once 'controllers/AprendicesController.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha_nacimiento'];

AprendicesController::actualizar($id, $nombre, $fecha);
