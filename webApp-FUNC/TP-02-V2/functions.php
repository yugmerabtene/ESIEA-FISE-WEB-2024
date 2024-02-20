<?php
session_start();
include_once 'templates/parts/header.php';

/**
 * Fonction pour le traitement du formulaire de connexion
 */
function handleLoginForm() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'login') {
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

/**
 * Fonction pour le traitement du formulaire d'inscription
 */
function handleRegistrationForm() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'register') {
        // Vérifier le token CSRF
        if (!verifyCsrfToken($_POST['csrf_token'])) {
            die("Token CSRF invalide");
        }

        // Récupérer les données du formulaire de manière sécurisée
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        // Valider les données du formulaire
        if (empty($nom) || empty($prenom) || empty($email) || empty($password)) {
            die("Veuillez remplir tous les champs du formulaire.");
        }

        // Ajouter l'utilisateur
        $result = addUser($nom, $prenom, $email, $password);

        if ($result === true) {
            // Rediriger vers la page de connexion ou afficher un message de succès
            header("Location: index.php?action=login&success=1");
            exit();
        } else {
            // Afficher le message d'erreur
            echo "Erreur lors de l'ajout de l'utilisateur: " . $result;
        }
    }
}

/**
 * Fonction pour déconnecter l'utilisateur
 */
function handleLogout() {
    // Détruire toutes les données de session
    session_unset();
    session_destroy();

    // Rediriger vers la page d'accueil
    header("Location: index.php");
    exit();
}

// ... (ajouter d'autres fonctions de sécurité et de traitement si nécessaire)
?>
