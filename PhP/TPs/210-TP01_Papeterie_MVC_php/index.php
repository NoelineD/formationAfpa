<?php
session_start();

$vue = 'home';

if (!empty($_GET)) {
    $entite = $_GET['entite'];
    $action = $_GET['action'];

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
