<?php

namespace RequestHandler;

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
    // Vérifier si l'utilisateur est connecté pour chaque action sauf 'dashboard' et 'logout'
    if (!isset($_SESSION['user_id'])) {
        // Traiter les formulaires de connexion et d'inscription
        handleLoginForm();
        handleRegistrationForm();

        // Vérifier les actions nécessitant une connexion
        $action = isset($_POST['action']) ? $_POST['action'] : '';

        switch ($action) {
            case 'dashboard':
                // Rediriger vers le tableau de bord si l'utilisateur est connecté
                Functions\redirectIfNotLoggedIn();

                // Inclure la page du tableau de bord
                include 'templates/dashboard/user_info.php';
                break;

            case 'logout':
                // Traiter la déconnexion
                handleLogout();
                break;

            // ... (ajouter d'autres cas si nécessaire)

            default:
                // Afficher la page d'accueil par défaut
                include 'templates/home.php';
                break;
        }
    } else {
        // L'utilisateur est déjà connecté, rediriger vers le tableau de bord
        header("Location: index.php?action=dashboard");
        exit();
    }
}

// ... (autres fonctions)

/**
 * Fonction pour rediriger l'utilisateur vers le tableau de bord s'il n'est pas connecté
 */
function redirectIfNotLoggedIn() {
    if (!isset($_SESSION['user_id'])) {
        // L'utilisateur n'est pas connecté, rediriger vers la page d'accueil
        header("Location: index.php");
        exit();
    }
}

// ... (ajouter d'autres fonctions de sécurité et de traitement si nécessaire)

?>
