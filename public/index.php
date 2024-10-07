<?php
session_start();

if (!isset($_SESSION['usuari'])) {
    header('Location: ../views/login.php');
    exit;
} else {
    header('Location: ../views/incidenciesview.php');
    exit;
}
?>