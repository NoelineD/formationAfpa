<?php
session_start();
//var_dump($_SESSION);
$page= 'panier';
$panier= $_SESSION['panier'];

include 'inc/header.php';
?>
<section>
    <h3>Liste des articles</h3>
    <br>
    <table>
        <tr>
            <th>code article</th>
            <th>libellé</th>
        </tr>
        <?php
//panier est le tableau de code article
        foreach ($panier as $article) {
            echo '<tr><td>' .$article['codeArt'].'</td><td>'.$article['quantite']. '<td></tr>';
        }
        ?>
    </table>
    <br>
 <a href="liste_article.php">Voir les articles</a>
    <br> -->
    -->
</section>
<?php
include 'inc/footer.php';
?>
?>