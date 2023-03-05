<?php
require 'dao/dao.php';

$psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_SPECIAL_CHARS);
$ident = filter_input(INPUT_POST, 'ident', FILTER_VALIDATE_EMAIL);

if($ident){

    $personne = getUserByLogin($ident);

    if ($personne) {

        if (password_verify($psw,$personne['psw_user'])) {    // simulation de la valeur de mot de passe

            $_SESSION['nom'] = $personne['nom_user'];
            $_SESSION['prenom'] = $personne['prenom_user'];
            $_SESSION['role'] = $personne['role'];

        }
        $erreur = 'Mot de passe incorrect !';
    } else {
        $erreur = 'Login non trouvé';
    }
} else {
    $erreur = 'le login doit être un mail valide';
}
