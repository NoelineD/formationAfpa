<?php

switch ($action) {
    case 'login':
        $vue = 'login';
        $ident = '';
        $erreur = '';
        break;
    case 'verif':
        //include 'user_modele.php';
        if (empty($_SESSION)) {
           // erreur d'authentification
           $erreur = 'Mot de passe incorrect !';
           $vue = 'login';
        } else {
            // on est logger
            $vue = 'home';
        }
        
        break;
    default:
        # code...
        break;
}