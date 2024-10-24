<?php
include_once '../config/database.php';
include_once '../models/Incidencia.php';
include_once '../models/Usuari.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class DashboardController {
    private $conn;
    private $incidencia;
    private $usuari;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
        $this->incidencia = new Incidencia($this->conn);
        $this->usuari = new Usuari($this->conn);
    }

    public function totalIncidencies() {
        $query = "SELECT count(id_incidencia) FROM incidencia where id_usuari = ".$_SESSION['usuari']['id'];
        return $this->conn->query($query);
    }

    public function incidenciesPendents() {
        $query = "SELECT count(id_incidencia) FROM incidencia where id_usuari = ".$_SESSION['usuari']['id']." and estat = 'pendent'";
        return $this->conn->query($query);
    }

    public function incidenciesEnProces() {
        $query = "SELECT count(id_incidencia) FROM incidencia where id_usuari = ".$_SESSION['usuari']['id']." and estat = 'enproces'";
        return $this->conn->query($query);
    }

    public function incidenciesResoltes() {
        $query = "SELECT count(id_incidencia) FROM incidencia where id_usuari = ".$_SESSION['usuari']['id']." and estat = 'resolta'";
        return $this->conn->query($query);
    }

    public function incideciesAltes() {
        $query = "SELECT count(id_incidencia) FROM incidencia where id_usuari = ".$_SESSION['usuari']['id']." and prioritat = 'alta'";
        return $this->conn->query($query);
    }

    public function incideciesModerades() {
        $query = "SELECT count(id_incidencia) FROM incidencia where id_usuari = ".$_SESSION['usuari']['id']." and prioritat = 'mitjana'";
        return $this->conn->query($query);
    }

    public function incideciesBaixes() {
        $query = "SELECT count(id_incidencia) FROM incidencia where id_usuari = ".$_SESSION['usuari']['id']." and prioritat = 'baixa'";
        return $this->conn->query($query);
    }
}