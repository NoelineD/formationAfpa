<?php
include 'app/model/userModel.php';

// test sur l'action qu'on lui demande
switch ($action) {
    case 'login':
        // affichage de la vue login
        $vue = 'user/login';
        $error = '';
        break;
    case 'verif':
        // vérification du formaulaire de login
        $error = '';
        try {
            // appel de la fonction de vérification des données de connexion
            verifUser();    // leve des EXception
            // on est logger
            header('Location: index.php');  // demande de redirection au navigateur
            exit();
        } catch(Exception $err) {
            // erreur d'authentification
            $error = $err->getMessage();
            $vue = 'user/login';
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