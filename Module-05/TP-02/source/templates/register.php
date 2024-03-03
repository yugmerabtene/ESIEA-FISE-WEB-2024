<main>
    <section>
        <h1>Inscription</h1>
            <form action="index.php?action=register" method="post">
            <?php if (isset($_SESSION['csrf_token'])) : ?>

            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <?php else : ?>
                <?php $_SESSION['csrf_token'] = functions/generateCsrfToken(); ?>
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
            <label for="confirm_password">Confirmer le mot de passe:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <?php
            // Afficher les messages d'erreur s'il y en a
            if (isset($error) && $error === 'email_exists') {
                echo "<p class='error-message'>Cet email est déjà enregistré. Choisissez un autre email.</p>";
            } elseif (isset($error) && $error === 'password_mismatch') {
                echo "<p class='error-message'>Les mots de passe ne correspondent pas.</p>";
            } elseif (isset($error) && $error === "Erreur lors de l'enregistrement de l'utilisateur") {
                echo "<p class='error-message'>Erreur lors de l'enregistrement de l'utilisateur. Veuillez réessayer.</p>";
            }
            ?>
            <button type="submit">S'inscrire</button>
        </form>
    </section>
</main>