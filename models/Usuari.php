<?php
class Usuari {
    private $conn;
    private $table = 'usuaris';

    public $id_usuari;
    public $nom;
    public $cognoms;
    public $email;
    public $contrasenya;

    public function __construct($db) {
        $this->conn = $db;
    }

    // public function registre() {
    //     $query = "INSERT INTO " . $this->table . " (nom, cognoms, email, contrasenya) VALUES (?, ?, ?, ?)";
    //     $stmt = $this->conn->prepare($query);

    //     if ($stmt) {
    //         $hashedPassword = password_hash($this->contrasenya, PASSWORD_DEFAULT);
    //         $stmt->bind_param("ssss", $this->nom, $this->cognoms, $this->email, $hashedPassword);
    //         return $stmt->execute();
    //     }

    //     return false;
    // }

    public function login() {
        $query = "SELECT id_usuari, nom, cognoms, contrasenya, rol, imatge FROM " . $this->table . " WHERE email = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
    
        if ($stmt) {
            $stmt->bind_param("s", $this->email);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
    
            if ($user && password_verify($this->contrasenya, $user['contrasenya'])) {
                return $user;
            }
        }
    
        return false;
    }
}
