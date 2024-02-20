<?php

// Vérifier si la session est déjà active
if (session_status() == PHP_SESSION_NONE) {
    // Démarrer la session
    session_start();
}
/**
 * Fonction pour le traitement du formulaire d'inscription
 */
function handleRegistrationForm() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
 * Fonction pour générer un token CSRF
 */
function generateCsrfToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

/**
 * Fonction pour vérifier le token CSRF
 */
function verifyCsrfToken($token) {
    return !empty($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Fonction pour ajouter un utilisateur à la base de données
 */
function addUser($nom, $prenom, $email, $password) {
    try {
        $conn = DatabaseConnection();

        // Vérifier si l'utilisateur existe déjà
        if (userExists($email)) {
            throw new Exception("L'utilisateur avec cet email existe déjà.");
        }

        // Hasher le mot de passe avec salage
        $hashedPassword = hashPassword($password);

        // Utiliser un prepared statement pour ajouter l'utilisateur
        $stmt = $conn->prepare("INSERT INTO utilisateur (nom, prenom, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email, $hashedPassword]);

        // Fermer la connexion
        $conn = null;

        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
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
