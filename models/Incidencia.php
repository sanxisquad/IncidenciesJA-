<?php
class Incidencia {
    private $conn;
    private $table = 'incidencia';

    public $id_incidencia;
    public $titol;
    public $descripcio;
    public $prioritat;
    public $data_creacio;
    public $estat;
    public $id_usuari;
    public $id_tipo_incidencia;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function crear() {
        $query = "INSERT INTO " . $this->table . " (titol, descripcio, prioritat, estat, data_creacio) VALUES (?, ?, ?, ?, NOW())";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("ssss", $this->titol, $this->descripcio, $this->prioritat, $this->estat);
        return $stmt->execute();
    }

    public function obtenir_totes() {
        $query = "SELECT * FROM " . $this->table;
        $result = $this->conn->query($query);
        return $result;
    }

    public function actualitzar() {
        $query = "UPDATE " . $this->table . " SET descripcio = ?, prioritat = ?, estat = ?, id_tipo_incidencia = ? WHERE id_incidencia = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssiii", $this->descripcio, $this->prioritat, $this->estat, $this->id_tipo_incidencia, $this->id_incidencia);
        return $stmt->execute();
    }

    public function eliminar() {
        $query = "DELETE FROM " . $this->table . " WHERE id_incidencia = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id_incidencia);
        return $stmt->execute();
    }
}
