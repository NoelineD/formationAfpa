<?php
require_once 'app/controller/Controller.php';
include 'app/model/UserModel.php';

class UserController extends Controller {

    public function login(){

        $paramView = ['error' => ''];
        $this->createView('user/login', $paramView);
    }

    public function verif(){
        // vérification du formaulaire de login
        try {
            // appel de la fonction de vérification des données de connexion
            $model = new UserModel();
            $model->verifUser();    // leve des EXception
            // on est logger
            header('Location: index.php');  // demande de redirection au navigateur
            exit();
        } catch(Exception $err) {
            // erreur d'authentification
            $paramView = ['error' => $err->getMessage()];
            $this->createView('user/login', $paramView);
            }
    }

    public function logout(){
        session_destroy();
        header('Location: index.php');
        exit();
    }

}