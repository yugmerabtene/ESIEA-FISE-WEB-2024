<?php
/** Controller */
include_once 'model.php';
include_once 'security.php';
include_once 'service.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/**
 * Contrôleur principal qui gère les différentes actions
 */
function controller() {
    // Démarrer la session (si elle n'est pas déjà active)
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Routes
    if (isset($_GET['action'])) {
        $action = $_GET['action'];        
        // Protection CSRF pour toutes les actions POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            verifyCsrfToken();
        }

        switch ($action) {
            case 'register':
                handleRegisterAction();
                break;
            case 'login':
                handleLoginAction();
                break;
            case 'dashboard':
                include_once 'templates/dashboard.php';
                break;
            // case 'update':
            //     handleUpdateAction();
            //     break;
            // case 'close':
            //     handleCloseAction();
            //     break;
            case 'logout':
                handleLogoutAction();
                break;
            default:
                include_once 'templates/home.php';
                break;
        }
    } else {
        include_once 'templates/home.php';
    }
}


?>
