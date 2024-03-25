<?php
include_once 'security.php';
include_once 'service.php';

function dbConnect(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=esiea_web', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }catch(Exception $e){
        throw new Exception('Erreur lors de la connexion à la base de données : ' . $e->getMessage());
    }
}   

function registerUser($nom, $prenom, $adresse, $email, $password, $confirmPassword) {
    $pdo = dbConnect();
    //role 0 = admin, 1 = modérateur, 2 = utilisateur
    $defaultRole = 2; 
    // Vérifier le jeton CSRF
    functions\verifyCsrfToken();
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
            $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, adresse, email, password, role) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nom, $prenom, $adresse, $email, $hashedPassword, $defaultRole]);
            return true;
        }
    } catch (Exception $e) {
        throw new Exception("Erreur lors de l'enregistrement de l'utilisateur : " . $e->getMessage());
    }
}

function loginUser($email, $password) {
    $pdo = dbConnect();

    try {
        // Récupérer les informations de l'utilisateur (Requête préparée pour prévenir l'injection SQL)
        $stmt = $pdo->prepare("SELECT id, email, password FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Connexion réussie, stocker l'ID de l'utilisateur en session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            return true;
        } else {
            // Échec de connexion, afficher un message d'erreur
            return "wrong_email_password";
        }
    } catch (Exception $e) {
        throw new Exception("Erreur lors de la connexion de l'utilisateur : " . $e->getMessage());
    }
}

function getUserInfos($id) {
    $pdo = dbConnect();

    try {
        // Récupérer les informations de l'utilisateur par son ID (Requête préparée pour prévenir l'injection SQL)
        $stmt = $pdo->prepare("SELECT id, nom, prenom, adresse, email FROM utilisateurs WHERE id = ?");
        $stmt->execute([$id]);
        $userInfo = $stmt->fetch();

        return $userInfo;
    } catch (Exception $e) {
        throw new Exception("Erreur lors de la récupération des informations de l'utilisateur : " . $e->getMessage());
    }
}

function updateUserInfo($id, $nom, $prenom, $adresse, $email, $password, $confirmPassword){
    $pdo = dbConnect();

    functions\verifyCsrfToken();

    try {

        if($email === $_SESSION['email']){
            if ($password !== $confirmPassword) {
                return "password_mismatch";

            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
                $stmt = $pdo->prepare("UPDATE utilisateurs SET nom = ?, prenom = ?, adresse = ?, email = ?, password = ? WHERE id = ?");
                $stmt->execute([$nom, $prenom, $adresse, $email, $hashedPassword, $id]);
                return true;
            }
        } else {
            $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = ?");
            $stmt->execute([$email]);
            $existingUser = $stmt->fetch();

            if ($existingUser) {
                return "email_exists";

            } elseif ($password !== $confirmPassword) {
                return "password_mismatch";

            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
                $stmt = $pdo->prepare("UPDATE utilisateurs SET nom = ?, prenom = ?, adresse = ?, email = ?, password = ? WHERE id = ?");
                $stmt->execute([$nom, $prenom, $adresse, $email, $hashedPassword, $id]);
                $_SESSION['email'] = $email;
                
                return true;
            }
        }

    } catch (Exception $e) {
        throw new Exception("Erreur lors de la modification des informations de l'utilisateur : " . $e->getMessage());
    }
}


function closeAccount($id) {
    $pdo = dbConnect(); 

    try {
        // Supprimer le compte de l'utilisateur (Requête préparée pour prévenir l'injection SQL)
        $stmt = $pdo->prepare("DELETE FROM utilisateurs WHERE id = ?");
        $stmt->execute([$id]);

        // Déconnecter l'utilisateur et rediriger vers la page d'accueil
        session_destroy();
        header("Location: index.php");
        exit();
    } catch (Exception $e) {
        throw new Exception("Erreur lors de la fermeture du compte de l'utilisateur : " . $e->getMessage());
    }
}
?>