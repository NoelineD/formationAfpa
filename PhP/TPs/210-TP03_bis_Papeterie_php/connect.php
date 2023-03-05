<?php

    $page = 'connect';
    $erreur = '';
    $ident = '';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ //si méthode POST : soumission du formulaire
        $psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_SPECIAL_CHARS);
        $ident = filter_input(INPUT_POST, 'ident', FILTER_SANITIZE_SPECIAL_CHARS);

        if ($psw == 'psw') {    // simulation de la valeur de mot de passe
            session_start();
            $_SESSION['login'] = $ident;    // création de la variable de session login
            header('Location: index.php'); // redirection vers la page index.php
            exit(); // obligatoire pour arrêter le script
        }
        $erreur = 'Mot de passe incorrect !';
    }
?>
<!DOCTYPE html>
<!--
 * @author Didier Bonneau
 * @copyright (c) Afpa, DWWM
 * @version 1.0 du 01/04/2020
 * Fichier principal de l'application TP_Papeterie
 -->
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        210_00_TP_Papeterie DWWM
    </title>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <script src="dist/js/jquery-3.4.1.js"></script>
    <script src="dist/js/bootstrap.js"></script>
    <link href="css/papeterie.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class='wrap'>
        <?php
            include '_entete.php';
            include '_nav.php';
        ?>
        <main class="container">
            <p class="h2">Entrer vos informations de connexion</p>
            <br>
            <form method="post" action="connect.php">
                <label for="id_ident">Votre identifiant : </label>
                <input type="text" id="id_ident" name="ident" value="<?= $ident ?>">
                <br>
                <label for="id_psw">Votre mot de passe : </label>
                <input type="password" id="id_psw" name="psw">
                <br>
                <button>Envoyer</button>
                <?= '<span class="erreur">'.$erreur.'</span>' ?>
            </form>
        </main>

    </div>
    <?php
        include '_pied.php';
    ?>
</body>

</html>