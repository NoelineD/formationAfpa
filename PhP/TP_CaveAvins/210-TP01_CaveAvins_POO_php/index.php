<?php
session_start();
if (!isset($_SESSION['role'])){
    $_SESSION['role'] = 'ROLE_VISITEUR';
}

$entite = filter_input(INPUT_GET, 'entite', FILTER_SANITIZE_SPECIAL_CHARS);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);

try {
    // test sur quelle entite on veut travailler
    switch ($entite) {
        case 'user':
            // appel du sous contrôleur de l'entite user
            include 'app/controller/UserControllerPoo.php';
            $controller = new UserController();
            $controller->execute($action);
            break;
        case 'about':
            include 'app/controller/AppControllerPoo.php';
            $controller = new AppController();
            $controller->createView('about', []);
            break;
        case 'wine':
            // appel du sous controleur de l'entite article
            include 'app/controller/WineControllerPoo.php';
            $controller = new WineController();
            $controller->execute($action);
            break;
        case 'caddy':
            // appel du sous controleur de l'entite panier
            include 'app/controller/caddyController.php';
            break;
        default:
            include 'app/controller/AppControllerPoo.php';
            $controller = new AppController();
            $controller->createView('home', []);
            break;
    }
} catch(Exception $except) {
    include 'app/controller/AppControllerPoo.php';
    $controller = new AppController();
    $controller->createView('error', ['erreur' => $except->getMessage()]);

}

