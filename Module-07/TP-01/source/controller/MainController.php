Voici le même code, refactoré pour respecter les principes de sécurité et réorganisé pour déléguer le traitement des actions à la couche de service :

```php
<?php
// index.php

// Charge les classes automatiquement
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

// Crée une instance du contrôleur principal
$controller = new MainController();

// Exécute le contrôleur principal
$controller->handleRequest();
?>
```

```php
<?php
// MainController.php

class MainController {
    protected $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    public function UserController() {
        try {
            // Démarrer la session si elle n'est pas déjà active
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            // Vérifier la protection CSRF pour toutes les actions POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->verifyCsrfToken();
            }

            // Traiter l'action demandée
            $action = $_GET['action'] ?? '';
            switch ($action) {
                case 'register':
                    $this->handleRegisterAction();
                    break;
                case 'login':
                    $this->handleLoginAction();
                    break;
                case 'dashboard':
                    $this->handleDashboardAction();
                    break;
                case 'update':
                    $this->handleUpdateAction();
                    break;
                case 'close':
                    $this->handleCloseAction();
                    break;
                case 'logout':
                    $this->handleLogoutAction();
                    break;
                default:
                    $this->handleHomeAction();
                    break;
            }
        } catch (Exception $e) {
            // Gérer les erreurs
            $error_message = $e->getMessage();
            require_once 'templates/error.php';
        }
    }
}
?>

