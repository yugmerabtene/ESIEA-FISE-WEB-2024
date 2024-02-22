<?php
require_once 'models/User.php';

class UserController {
    private $userModel;

    public function __construct($redis) {
        $this->userModel = new User($redis);
    }

    public function createUser($nom, $prenom, $email, $poste, $salaire) {
        return $this->userModel->createUser($nom, $prenom, $email, $poste, $salaire);
    }

    public function getUser($userId) {
        return $this->userModel->getUser($userId);
    }

    public function getAllUsers() {
        return $this->userModel->getAllUsers();
    }

    public function updateUser($userId, $data) {
        $this->userModel->updateUser($userId, $data);
    }

    public function deleteUser($userId) {
        $this->userModel->deleteUser($userId);
    }
}
?>
