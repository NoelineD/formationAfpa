<?php
session_start();
//var_dump($_SESSION);

$page = 'liste_article';
$titre = 'Liste article';
require 'dao.php';

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
        $tab_article = getAllArticles();
        //var_dump($tab_article);

        foreach ($tab_article as $article) {
            echo '<tr>
            <td>' . $article['code_art'] . '</td>
            <td>' . $article['libelle_art'] . '</td>
            <td>
            <form action="ajout_panier.php">
            <input type="hidden" name="art" value="'.$article['code_art'].'">
            <input type="number" name="qtt" min="1" value="1">
            <button>Ajouter</button>
            </form>
            <td></tr>';
            
        }

        ?>
    </table>
    <br>
    <a href="liste_articles.php">Voir les articles</a>
    <a href="aff_panier.php">Voir le panier</a>
</section>
<?php
include 'inc/footer.php';
?>