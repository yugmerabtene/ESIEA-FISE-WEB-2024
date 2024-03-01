<!-- register.php -->
<?php include_once 'parts/header.php';

// Génération et stockage du jeton CSRF
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

?>

<main>
    <section>
        <h1>Inscription</h1>
        <form action="index.php?action=register" method="post">
            <?php if (isset($_SESSION['csrf_token'])) : ?>
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <?php endif; ?>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>
            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">S'inscrire</button>
        </form>
    </section>
</main>

<?php include_once 'parts/footer.php'; ?>
