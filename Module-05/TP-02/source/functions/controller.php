<?php
/** Controller */
include_once 'model.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// REGEX
function validateRegistrationForm($nom, $prenom, $adresse, $email, $password, $confirmPassword) {
    $errors = [];

    // Validation du nom et prénom (autorise uniquement les lettres et les espaces)
    if (!preg_match("/^[a-zA-Z\sàáâãäåèéêëìíîïòóôõöùúûüýÿç']+$/", $nom)) {
        $errors['nom'] = "Le nom n'est pas valide.";
    }

    if (!preg_match("/^[a-zA-Z\sàáâãäåèéêëìíîïòóôõöùúûüýÿç']+$/", $prenom)) {
        $errors['prenom'] = "Le prénom n'est pas valide.";
    }

    // Validation de l'adresse (autorise les lettres, les chiffres, les espaces et les caractères spéciaux courants)
    if (!preg_match("/^[a-zA-Z0-9\sàáâãäåèéêëìíîïòóôõöùúûüýÿç'-.,]+$/", $adresse)) {
        $errors['adresse'] = "L'adresse n'est pas valide.";
    }

    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'adresse email n'est pas valide.";
    }

    // Validation du mot de passe
    if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
        $errors['password'] = "Le mot de passe doit avoir au moins 8 caractères, une majuscule et un chiffre.";
    }

    // Validation de la confirmation du mot de passe
    if ($password !== $confirmPassword) {
        $errors['confirm_password'] = "Les mots de passe ne correspondent pas.";
    }

    return $errors;
}

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

        // Valider le formulaire
        $errors = validateRegistrationForm($nom, $prenom, $adresse, $email, $password, $confirmPassword);

        // Si des erreurs sont présentes, afficher le formulaire avec les erreurs
        if (!empty($errors)) {
            // Ajouter les erreurs au tableau de données pour les afficher dans le formulaire
            $data['errors'] = $errors;
            include_once 'templates/register.php';
        } else {
            // Appeler la fonction pour enregistrer l'utilisateur
            $error = registerUser($nom, $prenom, $adresse, $email, $password, $confirmPassword);

            // Si l'enregistrement est réussi, rediriger vers la page de connexion
            if ($error === true) {
                header("Location: index.php?action=login");
                exit();
            } else {
                // En cas d'erreur, afficher le message d'erreur sur la page d'inscription
                // Ajouter le message d'erreur au tableau de données pour l'afficher dans le formulaire
                $data['error'] = $error;
                include_once 'templates/register.php';
            }
        }
    } else {
        // Afficher le formulaire d'inscription si la requête n'est pas de type POST
        include_once 'templates/register.php';
    }
}

function handleLoginAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifier le jeton CSRF ici avant d'appeler loginUser
        verifyCsrfToken();

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

        // Vérifier le jeton CSRF avant d'appeler updateUserInfo
        verifyCsrfToken();

        updateUserInfo($id, $nom, $prenom, $email, $password);
    }
}

function handleCloseAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_SESSION['user_id'];

        // Vérifier le jeton CSRF avant de fermer le compte
        verifyCsrfToken();

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

function verifyCsrfToken() {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur CSRF token. Les jetons ne correspondent pas. " . json_encode($_POST));
    }
}

function generateCsrfToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

/**
 * Contrôleur principal qui gère les différentes actions
 */
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
?>
