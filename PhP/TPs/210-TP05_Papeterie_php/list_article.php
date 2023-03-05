<?php
    session_start();
    require 'dao.php';
    $page = 'article';
    $choix = 'papeterie';

    if (!empty($_GET)) {
        $choix = $_GET['choix_cat'];
    }
?>
<!DOCTYPE html>
<!--
 * @author Didier Bonneau
 * @copyright (c) Afpa, DWWM
 * @version 1.0 du 01/04/2020
 * Fichier qui liste les articles TP_Papeterie
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
            <h2>Liste des articles de la catégorie <?= $choix ?></h2>
            <form method="get" action="list_article.php">
                <label>Choix de la catégorie </label>
                <select name="choix_cat">
                    <?php
                    $tab_categorie = getAllCategorie();
                    foreach($tab_categorie as $cat){
                        echo '<option value="'.$cat['libelle_cat'].'">'.$cat['libelle_cat'].'</option>';
                    }
                    ?>
                 </select>
                <button>Valider</button>
            </form>
            <br><br>
            <table class="table table-bordered">
                <tbody id="ligne">
                    <tr>
                        <th class="text-center w-10">REFERENCE</th>
                        <th class="w-60">DESCRIPTION</th>
                        <th class="text-center w-10">PRIX<br>UNITAIRE</th>
                        <th class="text-center w-10">QUANTITE</th>
                        <th class="text-center w-10">AJOUTER<br>AU PANIER</th>
                    </tr>
                    <?php
                        $tab_article = getArticlesByCategorie($choix);
                        //var_dump($tab_article);
                        foreach($tab_article as $article){
                    
                            echo '<tr>
                                <td class="text-center">'.$article['code_art'].'</td>
                                <td>'.$article['libelle_art'].'</td>
                                <td class="prix text-center">'.$article['prix_ht_art'].'</td>
                                <td class="text-center"><input type="number" value="0" min="0" /></td>
                                <td class="text-center"></td>
                            </tr>';
                        } ?>
                </tbody>
            </table>
        </main>

    </div>
    <?php
    include '_pied.php';
    ?>
</body>

</html>