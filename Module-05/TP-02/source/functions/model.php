<?php
$pdo = new PDO('mysql:host=localhost;dbname=siea_web', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function registerUser($nom, $prenom, $adresse, $email, $password, $confirmPassword) {
    global $pdo;
    // Vérifier le jeton CSRF
    verifyCsrfToken();
    try {
        // Vérifier si l'email existe déjà (Prévention d'injection SQL)
        $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        $existingUser = $stmt->fetch();

        if ($existingUser) {
            // L'email existe déjà, renvoyer une erreur
            return "email_exists";
        } elseif ($password !== $confirmPassword) {
            // Les mots de passe ne correspondent pas, renvoyer une erreur
            return "password_mismatch";
        } else {
            // Enregistrement réussi
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, adresse, email, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$nom, $prenom, $adresse, $email, $hashedPassword]);
            return true;
        }
    } catch (PDOException $e) {
        return "Erreur lors de l'enregistrement de l'utilisateur : " . $e->getMessage();
    }
}

function loginUser($email, $password) {
    global $pdo;

    try {
        // Récupérer les informations de l'utilisateur (Requête préparée pour prévenir l'injection SQL)
        $stmt = $pdo->prepare("SELECT id, password FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Connexion réussie, stocker l'ID de l'utilisateur en session
            $_SESSION['user_id'] = $user['id'];

            // Rediriger vers la page de profil après la connexion réussie
            header("Location: index.php?action=profil");
            exit();
        } else {
            // Échec de connexion, afficher un message d'erreur
            echo "Email ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la connexion de l'utilisateur : " . $e->getMessage();
    }
}

function updateUserInfo($id, $nom, $prenom, $email, $password) {
    global $pdo;

    try {
        // Mettre à jour les informations de l'utilisateur (Requête préparée pour prévenir l'injection SQL)
        $stmt = $pdo->prepare("UPDATE utilisateurs SET nom = ?, prenom = ?, email = ?, password = ? WHERE id = ?");
        $stmt->execute([$nom, $prenom, $email, $password, $id]);

        // Rediriger vers la page de profil après la mise à jour réussie
        header("Location: index.php?action=dashboard");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour des informations de l'utilisateur : " . $e->getMessage();
    }
}

function closeAccount($id) {
    global $pdo;

    try {
        // Supprimer le compte de l'utilisateur (Requête préparée pour prévenir l'injection SQL)
        $stmt = $pdo->prepare("DELETE FROM utilisateurs WHERE id = ?");
        $stmt->execute([$id]);

        // Déconnecter l'utilisateur et rediriger vers la page d'accueil
        session_destroy();
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la fermeture du compte de l'utilisateur : " . $e->getMessage();
    }
}


// Fonction de test PHPUnit pour tester le modèle
function testModel() {
    // Insérez ici vos tests PHPUnit pour les fonctions du modèle
    // Assurez-vous de tester différents scénarios (ex. : insertion, mise à jour, suppression, etc.)
}
?>
