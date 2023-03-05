<?php
include 'modeles/UserModel.php';

class UserControleur {

    public function execute(string $action) {

        // test sur l'action qu'on lui demande
        switch ($action) {
            case 'login':
                // affichage de la vue login
                //$vue = 'user/login';
                $param = ['ident' => '', 'erreur' => ''];
                $this->creerVue('user/login', $param);
                break;
            case 'verif':
                // vérification du formaulaire de login

                $psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_SPECIAL_CHARS);
                $ident = filter_input(INPUT_POST, 'ident', FILTER_VALIDATE_EMAIL);

                // appel de la fonction de vérification des données de connexion
                try {
                    $ctrl = new UserModel();
                    $ctrl->verif_user($ident, $psw);
                    header('Location: index.php');  // demande de redirection au navigateur
                    exit();
                } catch (Exception $e) {
                    $err = $e->getMessage();
                    $param = ['ident' => $ident, 'erreur' => $err];
                    $this->creerVue('user/login', $param);
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
                    $this->creerVue('user/create');
                } else {
                    // appel de la fonction de création du user
                    $ctrl = new UserModel();
                    $ctrl->create_user();
                    // retour sur la page de login
                    $param = ['ident' => '', 'erreur' => ''];
                    $this->creerVue('user/login', $param);
                }
                break;
            default:
                # code...
                break;
        }
    }
    
    public function creerVue($vue, $param = []) {
        
//        $ident = '';
//        $erreur = '';
        extract($param);
        
        include './vues/template.php';
    }

}
