<?php
    session_start();
    if(!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }
    var_dump($_SESSION); 
    
    $page = 'home';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body>
    <?php
        include 'inc/entete.php';
    ?>
    <section>
        <h3>Bienvenu dur notre site</h3>
        <br>
        <?php
        if (!isset($_SESSION['user'])) { // si clé user inexistante pas connecté
            echo '<a href="login.php">Se connecter</a>';
        } else {
            echo '<a href="logoff.php">Se déconnecter</a>';
        }
        ?>
        <br>
        <a href="liste_article.php">Voir les articles</a>
        <br>
        <a href="aff_panier.php">Voir le panier</a>
    </section>
</body>

</html>