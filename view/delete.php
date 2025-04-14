<?php
require_once 'controllers/AprendicesController.php';

$id = $_GET['id'] ?? null;
AprendicesController::eliminar($id);
