<?php
    session_start();
    $page = 'accueil';
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
            <p class="h2">Bienvenue sur le site de la Papeterie du centre</p>
        </main>

    </div>
    <?php
        include '_pied.php';
    ?>
</body>

</html>