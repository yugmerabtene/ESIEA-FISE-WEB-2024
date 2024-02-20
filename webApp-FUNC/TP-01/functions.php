<?php
// CHANGER CETTE PARTIE RAJOUTER UNE REDIRECTION VERS UNE PAGE ERROR.PHP
function findUser($username)
{
    // Simulation de la base de données des utilisateurs
    $registeredUsers = [
        'baudelaire' => ['metier' => 'Poete'],
        'spinoza' => ['metier' => 'Philosophe'],
        'zappa' => ['metier' => 'Guitariste'],
    ];

    try {
        if (!isset($registeredUsers[$username])) {
            throw new Exception("UserNotFound");
        }

        // Vérifier si 'info' existe avant d'accéder à la propriété
        if (!isset($registeredUsers[$username]['metier'])) {
            throw new Exception("InfoNotFound");
        }

        return $registeredUsers[$username]['metier'];
    } catch (Exception $e) {
        throw $e; // Redéclencher l'exception pour qu'elle soit gérée par le code appelant
    }
}
