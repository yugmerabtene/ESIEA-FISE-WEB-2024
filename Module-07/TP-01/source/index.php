<?php

// service.php
namespace Service;

class Database {
    private static $pdo;

    public static function connect() {
        try {
            self::$pdo = new \PDO('mysql:host=localhost;dbname=esiea_web', 'root', '');
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return self::$pdo;
        } catch (\Exception $e) {
            throw new \Exception('Erreur lors de la connexion à la base de données : ' . $e->getMessage());
        }
    }

    public static function getPDO() {
        if (!self::$pdo) {
            self::connect();
        }
        return self::$pdo;
    }
}

// model.php
namespace Model;

use Service\Database;
use Security\CSRFToken;

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getPDO();
    }

    public function register($nom, $prenom, $adresse, $email, $password, $confirmPassword) {
        CSRFToken::verify($_POST['csrf_token']);

        // ... reste du code pour l'inscription ...
    }

    public function login($email, $password) {
        CSRFToken::verify($_POST['csrf_token']);

        // ... reste du code pour la connexion ...
    }

    public function updateInfo($id, $nom, $prenom, $adresse, $email, $password, $confirmPassword) {
        CSRFToken::verify($_POST['csrf_token']);

        // ... reste du code pour la mise à jour des informations ...
    }

    public function closeAccount($id) {
        // ... reste du code pour la fermeture de compte ...
    }
}

// controller.php
namespace Controller;

use Model\User;

class Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function handleRequest() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            switch ($action) {
                case 'register':
                    $this->handleRegisterAction();
                    break;
                case 'login':
                    $this->handleLoginAction();
                    break;
                case 'dashboard':
                    include_once 'templates/dashboard.php';
                    break;
                case 'update':
                    $this->handleUpdateAction();
                    break;
                case 'close':
                    $this->handleCloseAction();
                    break;
                case 'logout':
                    $this->handleLogoutAction();
                    break;
                default:
                    include_once 'templates/home.php';
                    break;
            }
        } else {
            include_once 'templates/home.php';
        }
    }

    private function handleRegisterAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // ... appel de la méthode register du modèle User ...
        } else {
            include_once 'templates/register.php';
        }
    }

    private function handleLoginAction() {
        // ... similaire à handleRegisterAction() ...
    }

    private function handleUpdateAction() {
        // ... similaire à handleRegisterAction() ...
    }

    private function handleCloseAction() {
        // ... similaire à handleRegisterAction() ...
    }

    private function handleLogoutAction() {
        // ... similaire à handleRegisterAction() ...
    }
}

$controller = new Controller();
$controller->handleRequest();
?>
