<?php
require 'dao/Dao.php';

class UserModel {

/**
 * 
 * @param type $ident
 * @param type $psw 
 * @throws Exception
 */
public function verif_user($ident, $psw)
{

    if ($ident) {
        $dao = new Dao();
        $personne = $dao->getUserByLogin($ident);

//       if ($personne) {

            if (password_verify($psw, $personne['psw_user'])) {    // simulation de la valeur de mot de passe

                $_SESSION['nom'] = $personne['nom_user'];
                $_SESSION['prenom'] = $personne['prenom_user'];
                $_SESSION['role'] = $personne['role_user'];
            } else {
                //$erreur = 'Mot de passe incorrect !';
                throw new Exception('Mot de passe incorrect !');
            }
        // } else {
        //     //$erreur = 'Login non trouvé';
        //     throw new Exception('Login non trouvé');
        // }
    } else {
        //$erreur = 'le login doit être un mail valide';
        throw new Exception('le login doit être un mail valide');
    }
}

public function create_user()
{
    $dao = new Dao();
    // récupération des données du $_POST
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
    $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS);
    $psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_SPECIAL_CHARS);

    // hashage du password
    $psw = password_hash($psw, PASSWORD_DEFAULT);
    // appel de la dao
    $dao->setUser($nom, $prenom, $mail, $psw);
}

}