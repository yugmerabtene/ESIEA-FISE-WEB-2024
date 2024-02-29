<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./templates/assets/css/style.css">
    <script src="./templates/assets/js/main.js"></script>
    <title>Gestion d'utilisateur</title>
</head>
<body>
    <header>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?action=register">Inscription</a></li>
            <li><a href="index.php?action=login">Connexion</a></li>
            <?php
                // Afficher le lien du tableau de bord uniquement si l'utilisateur est connecté
                if (isset($_SESSION['user_id'])) {
                    echo '<li><a href="index.php?action=dashboard">Tableau de bord</a></li>';
                    echo '<li><a href="index.php?action=logout">Déconnexion</a></li>';
                }
            ?>
        </ul>
    </nav>
    </header>
