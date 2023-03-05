<?php

switch ($action) {
    case 'login':
        $vue = 'login';
        $ident = '';
        $erreur = '';
        break;
    case 'verif':
        include 'modeles/user_modele.php';
        if (empty($_SESSION)) {
           // erreur d'authentification
           $vue = 'login';
        } else {
            // on est logger
            //$vue = 'home';
            header('Location: index.php');
            exit();
        }
        break;
    default:
        # code...
        break;
}