<?php
include_once 'model.php';

function controller() {
    // Démarrer la session (si elle n'est pas déjà active)
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Routes
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        // Protection CSRF pour toutes les actions POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            verifyCsrfToken();
        }

        switch ($action) {
            case 'register':
                handleRegisterAction();
                break;
            case 'login':
                handleLoginAction();
                break;
            case 'dashboard':
                include_once 'templates/dashboard.php';
                break;
            case 'update':
                handleUpdateAction();
                break;
            case 'close':
                handleCloseAction();
                break;
            case 'logout':
                handleLogoutAction();
                break;
            default:
                include_once 'templates/home.php';
                break;
        }
    } else {
        include_once 'templates/home.php';
    }
}

function verifyCsrfToken() {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur CSRF token.");
    }
}

function handleRegisterAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = sanitizeInput($_POST['nom']);
        $prenom = sanitizeInput($_POST['prenom']);
        $adresse = sanitizeInput($_POST['adresse']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        registerUser($nom, $prenom, $adresse, $email, $password);
    } else {
        include_once 'templates/register.php';
    }
}

function handleLoginAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        loginUser($email, $password);
    } else {
        include_once 'templates/login.php';
    }
}

function handleUpdateAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_SESSION['user_id'];
        $nom = sanitizeInput($_POST['nom']);
        $prenom = sanitizeInput($_POST['prenom']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        updateUserInfo($id, $nom, $prenom, $email, $password);
    }
}

function handleCloseAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_SESSION['user_id'];
        closeAccount($id);

        // Détruire la session
        session_destroy();

        // Rediriger vers la page d'accueil
        header("Location: index.php");
        exit();
    }
}

function handleLogoutAction() {
    // Détruire la session
    session_destroy();

    // Rediriger vers la page d'accueil
    header("Location: index.php");
    exit();
}

function sanitizeInput($input) {
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}
?>
