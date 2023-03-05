<?php
require 'app/dao/dao.php';

class UserModel {

    public function verifUser() : void
    {

        $psw = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if ($mail) {

            $dao = new Dao();
            $user = $dao->getUserByLogin($mail); // leve une Exception si user non trouvé

            if (password_verify($psw, $user['password'])) {    // simulation de la valeur de mot de passe

                $_SESSION['mail'] = $user['email'];
                $_SESSION['role'] = $user['roles'];
            } else {
                throw new Exception('Mot de passe incorrect !');
            }
        } else {
            throw new Exception('le login doit être un mail valide');
        }
    }

}