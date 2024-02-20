<?php
class User {
    private $redis;

    public function __construct($redis) {
        $this->redis = $redis;
    }

    public function createUser($nom, $prenom, $email, $poste, $salaire) {
        // Générer un identifiant unique pour l'utilisateur
        $userId = uniqid();

        // Échapper les données pour éviter les attaques d'injection
        $nom = $this->redis->quote($nom);
        $prenom = $this->redis->quote($prenom);
        $email = $this->redis->quote($email);
        $poste = $this->redis->quote($poste);

        // Stocker les informations de l'utilisateur dans Redis
        $this->redis->hMSet("user:$userId", [
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'poste' => $poste,
            'salaire' => $salaire
        ]);

        return $userId;
    }

    public function getUser($userId) {
        return $this->redis->hGetAll("user:$userId");
    }

    public function getAllUsers() {
        // Récupérer tous les utilisateurs
        $keys = $this->redis->keys('user:*');
        $users = [];

        foreach ($keys as $key) {
            $users[] = $this->redis->hGetAll($key);
        }

        return $users;
    }

    public function updateUser($userId, $data) {
        // Échapper les données pour éviter les attaques d'injection
        foreach ($data as $key => $value) {
            $data[$key] = $this->redis->quote($value);
        }

        $this->redis->hMSet("user:$userId", $data);
    }

    public function deleteUser($userId) {
        $this->redis->del("user:$userId");
    }
}
?>
