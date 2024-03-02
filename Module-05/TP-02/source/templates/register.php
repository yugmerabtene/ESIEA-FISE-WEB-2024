<!-- Inscription -->
<main>
    <section>
        <h1>Inscription</h1>
        <form action="index.php?action=register" method="post">
            <?php if (isset($_SESSION['csrf_token'])) : ?>
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <?php else : ?>
                <?php $_SESSION['csrf_token'] = generateCsrfToken(); ?>
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <?php endif; ?>

            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
            <?php if (isset($errors['nom'])) : ?>
                <p class='error-message'><?php echo $errors['nom']; ?></p>
            <?php endif; ?>

            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>
            <?php if (isset($errors['prenom'])) : ?>
                <p class='error-message'><?php echo $errors['prenom']; ?></p>
            <?php endif; ?>

            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse" required>
            <?php if (isset($errors['adresse'])) : ?>
                <p class='error-message'><?php echo $errors['adresse']; ?></p>
            <?php endif; ?>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <?php if (isset($errors['email'])) : ?>
                <p class='error-message'><?php echo $errors['email']; ?></p>
            <?php endif; ?>

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
            <?php if (isset($errors['password'])) : ?>
                <p class='error-message'><?php echo $errors['password']; ?></p>
            <?php endif; ?>

            <label for="confirm_password">Confirmer le mot de passe:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <?php if (isset($errors['confirm_password'])) : ?>
                <p class='error-message'><?php echo $errors['confirm_password']; ?></p>
            <?php endif; ?>

            <button type="submit">S'inscrire</button>
        </form>
    </section>
</main>
