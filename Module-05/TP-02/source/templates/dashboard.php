<?php
include_once './functions/model.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Récupérer les informations de l'utilisateur connecté
$userInfo = getUserInfo($_SESSION['user_id']);

// Récupérer la liste de tous les utilisateurs
$allUsers = getAllUsers();

include_once 'templates/parts/header.php';
?>

<main>
    <section>
        <h1>Tableau de bord</h1>

        <!-- Afficher les informations de l'utilisateur connecté -->
        <h2>Vos informations</h2>
        <form action="index.php?action=update" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="<?php echo $userInfo['nom']; ?>" required>
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $userInfo['prenom']; ?>" required>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $userInfo['email']; ?>" disabled>
            <button type="submit">Mettre à jour</button>
        </form>

        <!-- Afficher la liste de tous les utilisateurs -->
        <h2>Liste des utilisateurs</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allUsers as $user) : ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['nom']; ?></td>
                        <td><?php echo $user['prenom']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>

<?php
include_once 'templates/parts/footer.php';
?>
