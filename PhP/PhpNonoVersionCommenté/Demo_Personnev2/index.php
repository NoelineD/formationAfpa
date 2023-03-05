<?php
session_start();
//var_dump($_SESSION);
if(!isset($_SESSION['panier'])){
$_SESSION['panier']= array();
}
// var_dump($_SESSION);
$page = 'home';
$titre = 'Home';

include 'inc/header.php';
?>
<section>
    <h3>Bienvenu sur notre site</h3>
    <br>
    <?php
    if (!isset($_SESSION['user'])) { // si vide pas connecté
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
<?php
include 'inc/footer.php';
?>