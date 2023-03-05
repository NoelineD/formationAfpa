<?php
session_start();

$vue = 'home';  // vue par défaut

if (!empty($_GET)) {    // pas de query string dans requête http get
    // récupération des 2 paramètres entite et action de la query string
    $entite = filter_input(INPUT_GET, 'entite', FILTER_SANITIZE_SPECIAL_CHARS);
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);

    // test sur quelle entite on veut travailler
    switch ($entite) {
        case 'user':
            // appel du sous contrôleur de l'entite user
            include 'controleurs/user_controleur.php';
            break;
        case 'mentions':
            $vue = 'mentions';
            break;
        case 'article':
            // appel du sous controleur de l'entite article
            include 'controleurs/article_controleur.php';
            break;
        case 'panier':
            // appel du sous controleur de l'entite panier
            include 'controleurs/panier_controleur.php';
            break;
        default:
            # code...
            break;
    }
}
// inclusion du template
include 'vues/template.php';
