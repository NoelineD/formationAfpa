<?php
require 'vendor/autoload.php';

use Dwwm\App\controller\AppController;
use Dwwm\App\controller\UserController;
use Dwwm\App\controller\WineController;

session_start();

// spl_autoload_register(function ($className) {
//     //var_dump(__NAMESPACE__);
//     //var_dump($className); die();
//     require_once $className . '.php';
// });


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
            //include 'app/controller/UserController.php';
            $controller = new UserController();
            $controller->execute($action);
            break;
        case 'about':
            //include 'app/controller/AppController.php';
            $controller = new AppController();
            $controller->execute('about');
            break;
        case 'wine':
            // appel du sous controleur de l'entite article
            //include 'app/controller/WineController.php';
            $controller = new WineController();
            $controller->execute($action);
            break;
        case 'caddy':
            // appel du sous controleur de l'entite panier
            //include 'app/controller/caddyController.php';
            break;
        default:
            //include 'app/controller/AppController.php';
            $controller = new AppController();
            $controller->execute('home');
            break;
    }
} catch(Exception $except) {
    //include 'app/controller/AppController.php';
    $controller = new AppController();
    $controller->execute('error');

}

