<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'Utilisateurs</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Gestion d'Utilisateurs</h1>

    <!-- Afficher la liste des utilisateurs -->
    <ul>
        <?php
            $users = $userController->getAllUsers();
            foreach ($users as $user) {
                echo "<li>{$user['nom']} {$user['prenom']} - {$user['email']} - {$user['poste']} - {$user['salaire']}</li>";
            }
        ?>
    </ul>

    <!-- Formulaire de création d'utilisateur -->
    <form action="create_user.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" required>

        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="poste">Poste:</label>
        <input type="text" name="poste" required>

        <label for="salaire">Salaire:</label>
        <input type="number" name="salaire" required>

        <button type="submit">Créer Utilisateur</button>
    </form>
</body>
</html>
