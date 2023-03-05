<?php

require 'dao/Dao.php';

class UserModel {

    /**
     * 
     * @param string $ident
     * @param string $psw 
     * @throws Exception
     */
    public function verif_user(string $ident, string $psw) {

        if ($ident) {
            $dao = new Dao();
            $personne = $dao->getUserPooByLogin($ident); // récupération sous forme d'un objet User
            //$personne = $dao->getUserByLogin($ident); // récupération sous forme d'un tableau associatif

            if (password_verify($psw, $personne->getPsw_user())) {  // vérification du mot de passe
//                $_SESSION['nom'] = $personne['nom_user'];
//                $_SESSION['prenom'] = $personne['prenom_user'];
//                $_SESSION['role'] = $personne['role_user'];
                $_SESSION['nom'] = $personne->getNom_user();
                $_SESSION['prenom'] = $personne->getPrenom_user();
                $_SESSION['role'] = $personne->getRole_user();
            } else {
                throw new Exception('Mot de passe incorrect !');
            }
        } else {
            throw new Exception('le login doit être un mail valide');
        }
    }

    public function create_user() {
        $dao = new Dao();
        // récupération des données du $_POST
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS);
        $psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_SPECIAL_CHARS);

        $user = new User($nom, $prenom, $mail, $psw);
        
        // hashage du password
//        $psw = password_hash($psw, PASSWORD_DEFAULT);
        // appel de la dao
//        $dao->setUser($nom, $prenom, $mail, $psw);
        $dao->setUserPoo($user);
    }

}
