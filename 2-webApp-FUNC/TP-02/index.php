<?php  
session_start(); 
include_once 'templates/parts/header.php';
include_once 'requestHandler.php'; // Assurez-vous de l'inclure correctement

// ...
?>
<main>
    <?php
        // Gestion des requêtes
        requestHandler\Controller();
    ?>
</main>
<?php
include_once 'templates/parts/footer.php';
?>
