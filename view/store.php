<?php
require_once 'controllers/AprendicesController.php';

$nombre = $_POST['nombre'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

AprendicesController::guardar($nombre, $fecha_nacimiento);
