<?php

include_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire en utilisant htmlspecialchars pour prévenir les attaques XSS
    $username = htmlspecialchars($_POST['username']);

    try {
        $userInfo = findUser($username);
        echo "<p>Informations de l'utilisateur : $userInfo</p>";
    } catch (Exception $e) {
        echo "<p>Erreur : " . $e->getMessage() . "</p>";
    }
}
