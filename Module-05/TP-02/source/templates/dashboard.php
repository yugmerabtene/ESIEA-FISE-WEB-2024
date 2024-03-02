<?php
include_once './functions/model.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include_once 'templates/parts/header.php';
?>

<main>
    <section>
        <h1>Tableau de bord</h1>       
    </section>
</main>

<?php
include_once 'templates/parts/footer.php';
?>
