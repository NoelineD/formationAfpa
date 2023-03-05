<?php
require 'dao/dao.php';

function verif_user()
{
    global $ident;
    global $erreur;

    $psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_SPECIAL_CHARS);
    $ident = filter_input(INPUT_POST, 'ident', FILTER_VALIDATE_EMAIL);

    if ($ident) {

        $personne = getUserByLogin($ident);

        if ($personne) {

            if (password_verify($psw, $personne['psw_user'])) {    // simulation de la valeur de mot de passe

                $_SESSION['nom'] = $personne['nom_user'];
                $_SESSION['prenom'] = $personne['prenom_user'];
                $_SESSION['role'] = $personne['role_user'];
            }
            $erreur = 'Mot de passe incorrect !';
        } else {
            $erreur = 'Login non trouvé';
        }
    } else {
        $erreur = 'le login doit être un mail valide';
    }
}

function create_user()
{
    // récupération des données du $_POST
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
    $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS);
    $psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_SPECIAL_CHARS);

    // hashage du password
    $psw = password_hash($psw, PASSWORD_DEFAULT);
    // appel de la dao
    setUser($nom, $prenom, $mail, $psw);
}