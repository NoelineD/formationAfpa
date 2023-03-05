<?php
session_start();
if (!isset($_SESSION['role'])){
    $_SESSION['role'] = 'ROLE_VISITEUR';
}

$entite = filter_input(INPUT_GET, 'entite', FILTER_SANITIZE_SPECIAL_CHARS);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);

// test sur quelle entite on veut travailler
switch ($entite) {
    case 'user':
        // appel du sous contrôleur de l'entite user
        include 'app/controller/userController.php';
        break;
    case 'about':
        $vue = 'about';
        break;
    case 'wine':
        // appel du sous controleur de l'entite article
        include 'app/controller/wineController.php';
        break;
    case 'caddy':
        // appel du sous controleur de l'entite panier
        include 'app/controller/caddyController.php';
        break;
    default:
        $vue = 'home';
        break;
}

// inclusion du template
include 'app/view/template.php';
