<?php
include 'modeles/UserModel.php';
        
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
        
        $psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_SPECIAL_CHARS);
        $ident = filter_input(INPUT_POST, 'ident', FILTER_VALIDATE_EMAIL);

        // appel de la fonction de vérification des données de connexion
        try{
            $ctrl = new UserModel();
            $ctrl->verif_user($ident, $psw);
            header('Location: index.php');  // demande de redirection au navigateur
            exit();
        } catch(Exception $e) {
            $erreur = $e->getMessage();
            $vue = 'user/login';
        }
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
            // appel de la fonction de création du user
            $ctrl = new UserModel();
            $ctrl->create_user();
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