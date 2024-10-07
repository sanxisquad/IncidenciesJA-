<?php
include_once '../controllers/IncidenciaController.php';

$controller = new IncidenciaController();
$incidencies = $controller->obtenir_totes();
$tipus_incidencia = $controller->obtenir_tipus_incidencia();
$usuaris = $controller->obtenir_usuaris();
?>