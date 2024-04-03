<?php
// security.php
namespace Security;

class CSRFToken {
    public static function verify($token) {
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            throw new \Exception("Erreur CSRF token. Les jetons ne correspondent pas.");
        }
    }

    public static function generate() {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
}
