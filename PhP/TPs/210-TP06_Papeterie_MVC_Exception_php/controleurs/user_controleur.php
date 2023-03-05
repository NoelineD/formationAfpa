<?php
// test sur l'action qu'on lui demande
switch ($action) {
    case 'login':
        // affichage de la vue login
        $vue = 'user/login';
        $ident = '';
        $erreur = '';
        break;
    case 'verif':
        // vérification du formaulaire de login
        include 'modeles/user_modele.php';
        $ident = '';
//        $erreur = '';
        // appel de la fonction de vérification des données de connexion
        try{
            verif_user();
            header('Location: index.php');  // demande de redirection au navigateur
            exit();
        } catch(Exception $e) {
            $erreur = $e->getMessage();
            $vue = 'user/login';
        }

        // if (empty($_SESSION)) { // la connexion a échouée, rien en session
        //    // erreur d'authentification
        //    $vue = 'user/login';
        // } else {
        //     // on est logger
        //     //$vue = 'home';
        //     header('Location: index.php');  // demande de redirection au navigateur
        //     exit();
        // }
        break;
    case 'logout':
        session_destroy();
        header('Location: index.php');
        exit();
        break;
    case 'create':
        // tet de la méthode http : get -> affichage du formaulaire, post -> traitement des informations
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $vue = 'user/create';
        } else {
            include 'modeles/user_modele.php';
            // appel de la fonction de création du user
            create_user();
            // retour sur la page de login
            $vue = 'user/login';
            $ident = '';
            $erreur = '';
        }
       
        break;
    default:
        # code...
        break;
}