<?php
session_start();
include_once '../config/database.php';
include_once '../models/Usuari.php';

class UsuariController {
    private $conn;
    private $usuari;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
        $this->usuari = new Usuari($this->conn);
    }

    public function registre() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->usuari->nom = $_POST['nom'];
            $this->usuari->cognoms = $_POST['cognoms'];
            $this->usuari->email = $_POST['email'];
            $this->usuari->contrasenya = $_POST['contrasenya'];

            if ($this->usuari->registre()) {
                header('Location: ../views/login.php');
                exit();
            } else {
                echo "Error al registrar.";
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->usuari->email = $_POST['email'];
            $this->usuari->contrasenya = $_POST['contrasenya'];
            $user = $this->usuari->login();
    
            if ($user) {
                $_SESSION['usuari'] = [
                    'id' => $user['id_usuari'],
                    'nom' => $user['nom'],
                    'cognoms' => $user['cognoms'],
                    'rol' => $user['rol'],
                    'imatge' => $user['imatge'],
                    'email' => $user['email']
                ];
                header('Location: ../public/index.php');
                exit();
            } else {
                echo "Credenciales incorrectas.";
            }
        }
    }
    
    

    public function logout() {
        session_destroy();
        header('Location: ../views/login.php');
        exit();
    }
}

if (isset($_GET['action'])) {
    $controller = new UsuariController();
    
    switch ($_GET['action']) {
        case 'registre':
            $controller->registre();
            break;
        case 'login':
            $controller->login();
            break;
        case 'logout':
            $controller->logout();
            break;
        default:
            echo "Acció no vàlida.";
            break;
    }
} else {
    echo "No s'ha especificat cap acció.";
}
