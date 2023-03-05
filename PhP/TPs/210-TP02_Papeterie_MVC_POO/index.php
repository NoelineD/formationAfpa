<?php

session_start();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// récupération des 2 paramètres entite et action de la query string
$entite = filter_input(INPUT_GET, 'entite', FILTER_SANITIZE_SPECIAL_CHARS);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);

// test sur quelle entite on veut travailler
try {
    switch ($entite) {
        case 'user':
            // appel du sous contrôleur de l'entite user
            include 'controleurs/UserControleur.php';
            $ctrl = new UserControleur();
            $ctrl->execute($action);
            break;
        case 'mentions':
            include 'controleurs/MainControleur.php';
            $ctrl = new MainControleur();
            $ctrl->execute('mentions');
            break;
        case 'article':
            // appel du sous controleur de l'entite article
            include 'controleurs/ArticleControleur.php';
            $ctrl = new ArticleControleur();
            $ctrl->execute($action);
            break;
        case 'panier':
            // appel du sous controleur de l'entite panier
            include 'controleurs/PanierControleur.php';
            $ctrl = new PanierControleur();
            $ctrl->execute($action);
            break;
        default:
            include 'controleurs/MainControleur.php';
            $ctrl = new MainControleur();
            $ctrl->execute('home');
            break;
    }
} catch (Exception $err) {
    include 'controleurs/MainControleur.php';
    $ctrl = new MainControleur();
    $msgErreur = $err->getMessage();
    $ctrl->creerVue('erreur', ['msgErreur' => $msgErreur]);
}
