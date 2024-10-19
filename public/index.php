<?php
session_start();
include_once '../controllers/IncidenciaController.php';

$controllerIncidencies = new IncidenciaController();
$action = $_GET['action'] ?? 'incidencies';

if (!isset($_SESSION['usuari']) && $action !== 'login') {
    $action = 'login';
}

switch ($action) {
    case 'login':
        include '../views/login.php';
        break;
    
    case 'incidencies':
        $controllerIncidencies->mostrarIncidencies();
        break;
}
?>
