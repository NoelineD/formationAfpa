<?php
namespace Dwwm\App\model;

use Dwwm\App\dao\Dao;
use Exception;

class UserModel {

    public function verifUser() : void
    {

        $psw = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if ($mail) {

            $dao = new Dao();
            $user = $dao->getUserByLogin($mail); // leve une Exception si user non trouvé

            if (password_verify($psw, $user->getPassword())) {    // simulation de la valeur de mot de passe

                $_SESSION['mail'] = $user->getEmail();
                $_SESSION['role'] = $user->getRole();
                $_SESSION['idUser'] = $user->getId();
            } else {
                throw new Exception('Mot de passe incorrect !');
            }
        } else {
            throw new Exception('le login doit être un mail valide');
        }
    }

}