<?php 
namespace functions;

use functions;

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

?>