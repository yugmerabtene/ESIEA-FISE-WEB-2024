<?php
<<<<<<< Updated upstream
=======

/** Controller */
include_once 'service.php';
include_once 'security.php';
>>>>>>> Stashed changes
include_once 'model.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
<<<<<<< Updated upstream
function handleRegisterAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifier le jeton CSRF
        verifyCsrfToken();

        // Récupérer les données du formulaire
        $nom = sanitizeInput($_POST['nom']);
        $prenom = sanitizeInput($_POST['prenom']);
        $adresse = sanitizeInput($_POST['adresse']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        // Appeler la fonction pour enregistrer l'utilisateur
        $error = registerUser($nom, $prenom, $adresse, $email, $password, $confirmPassword);

        // Si l'enregistrement est réussi, rediriger vers la page de connexion
        if ($error === true) {
            header("Location: index.php?action=login");
            exit();
        } else {
            // En cas d'erreur, afficher le message d'erreur sur la page d'inscription
            include_once 'templates/register.php';
        }
    } else {
        // Afficher le formulaire d'inscription si la requête n'est pas de type POST
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


=======
>>>>>>> Stashed changes

/**
 * Contrôleur principal qui gère les différentes actions
 */
class Controller() {
    // Démarrer la session (si elle n'est pas déjà active)
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Routes
    if (isset($_GET['action'])) {
        $action = $_GET['action'];        
        // Protection CSRF pour toutes les actions POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            \functions\verifyCsrfToken();
        }

        switch ($action) {
            case 'register':
                \functions\handleRegisterAction();
                break;
            case 'login':
                \functions\handleLoginAction();
                break;
            case 'dashboard':
                include_once 'templates/dashboard.php';
                break;
            case 'update':
                \functions\handleUpdateAction();
                break;
            case 'close':
                \functions\handleCloseAction();
                break;
            case 'logout':
                \functions\handleLogoutAction();
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
?>
