<?php
session_start();

$vue = 'home';

if (!empty($_GET)) {
    $entite = filter_input(INPUT_GET, 'entite', FILTER_SANITIZE_SPECIAL_CHARS);
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);

    switch ($entite) {
        case 'user':
            include 'controleurs/user_controleur.php';
            break;
        case 'mentions':
            $vue = 'mentions';
            break;
        default:
            # code...
            break;
    }
}

include 'vues/template.php';
