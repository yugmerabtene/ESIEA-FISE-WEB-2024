<?php include_once 'templates/parts/header.php'; ?>
<?php include_once 'requestHandler.php'; ?>
    <main>
    <form action="requestHandler.php" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <button type="submit">Rechercher</button>
    </form>      
    </main>
<?php include_once 'templates/parts/footer.php'; ?>

