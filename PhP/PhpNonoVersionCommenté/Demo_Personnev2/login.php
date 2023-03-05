<?php
session_start();
require 'dao.php';

$page = 'login';
$titre = 'Login';
$msgErreur = '';
//var_dump($_GET);
//var_dump($_POST);
//var_dump(empty($_POST));
//var_dump(count($_POST));
if (!empty($_POST)) {   // choix entre lien et soumission formulaire
    //$login = $_POST['login'];
    //$psw = $_POST['mot_de_passe'];
    $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!$token || $token !== $_SESSION['token']) {
        header($_SERVER['SERVER_PROTOCOL'], '405 Method Not Allowed');

        exit;
    } else {
        $login = filter_input(INPUT_POST, 'login', FILTER_VALIDATE_EMAIL);
        //var_dump($login); // booléen FALSE si non mail sinon le mail
        if ($login) { // le saisie n'est pas un mail valide
            // chercher le user dans la base de donnée
            $personne = getUserByMail($login);
            // var_dump($personne);
            // die();
            if ($personne) { // pas le bon user
                $psw = filter_input(INPUT_POST, 'psw_user', FILTER_SANITIZE_SPECIAL_CHARS);
                if ($psw == $personne['mot_de_passe']) {  // pas le bon mot de passe
                    $_SESSION['user'] = $personne['prenom_user'] . ' ' . $personne['nom_user'];
                    header('Location: index.php');
                    exit();
                } else {
                    $msgErreur = ' Mot de passe incorrect';
                }
            } else {
                $msgErreur = ' Login incorrect';
            }
        } else {
            $msgErreur = ' Le login doit être un mail valide';
        }
    }
}

include 'inc/header.php';
$token = md5(uniqid(mt_rand(), true)); // Générateur de token
$_SESSION['token'] = $token;
?>


<section>
    <h3>Identifier vous</h3>
    <br>
    <form method="post" action="login.php">
        <input type="hidden" name="token" value="<?= $token ?>">
        <label>votre login : </label>
        <input type="text" name="login">
        <label>votre mot de passe : </label>
        <input type="password" name="mot_de_passe">
        <br><br>
        <button>envoyer</button><span><?= $msgErreur ?></span>
    </form>
</section>
<?php
include 'inc/footer.php';
?>