<?php
namespace requestHandler;

// Démarrer la session (si elle n'est pas déjà active)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Inclure le fichier de fonctions
include_once 'functions.php';

/**
 * Contrôleur principal qui gère les différentes actions
 */
function Controller() {
    // Vérifier si l'utilisateur est connecté pour chaque action sauf 'login' et 'register'
    if (!isset($_SESSION['user_id'])) {
        $action = isset($_POST['action']) ? $_POST['action'] : '';

        // Gérer les requêtes
        switch ($action) {
            case 'register':
                // Vérifier si l'utilisateur est déjà connecté, si oui, rediriger vers le tableau de bord
                if (isset($_SESSION['user_id'])) {
                    header("Location: /dashboard");
                    exit();
                }

                // Inclure la page d'inscription
                include 'templates/register_form.php';

                // Traiter le formulaire d'inscription
                functions\handleRegistrationForm();
                break;

            // ... (autres cas)

            default:
                include 'templates/home.php';
                break;
        }
    }
}

// ... (autres fonctions)
?>


/**
 * Fonction pour le traitement du formulaire de connexion
 */
function handleLoginForm() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifier le token CSRF
        if (!verifyCsrfToken($_POST['csrf_token'])) {
            die("Token CSRF invalide");
        }

        // Récupérer les données du formulaire de manière sécurisée
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        // Valider les données du formulaire
        if (empty($email) || empty($password)) {
            die("Veuillez remplir tous les champs du formulaire.");
        }

        // Authentifier l'utilisateur
        $authenticated = authenticateUser($email, $password);

        if ($authenticated) {
            // Rediriger vers la page du tableau de bord ou afficher un message de succès
            header("Location: index.php?action=dashboard");
            exit();
        } else {
            // Afficher le message d'erreur
            echo "Erreur d'authentification. Veuillez vérifier vos identifiants.";
        }
    }
}

// ... (les autres fonctions restent inchangées)
?>
