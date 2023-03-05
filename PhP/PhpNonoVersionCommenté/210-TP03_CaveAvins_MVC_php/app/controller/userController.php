<?php
// test sur l'action qu'on lui demande
switch ($action) {
    case 'login':
        // affichage de la vue login
        $vue = 'user/login';
        $error = '';
        break;
    case 'verif':
        // vérification du formaulaire de login
        include 'modeles/user_modele.php';
        $error = '';
        // appel de la fonction de vérification des données de connexion
        verif_user();
        if (empty($_SESSION)) { // la connexion a échouée, rien en session
           // erreur d'authentification
           $vue = 'user/login';
        } else {
            // on est logger
            //$vue = 'home';
            header('Location: index.php');  // demande de redirection au navigateur
            exit();
        }
        break;
    case 'logout':
        session_destroy();
        header('Location: index.php');
        exit();
        break;

    default:
        # code...
        break;
}