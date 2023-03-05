<?php
    session_start();
    //var_dump($_SESSION);

    $page = 'liste';
    require 'dao.php';
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
        <h3>Liste des articles</h3>
        <br>
        <table>
            <tr><th>code article</th><th>Libellé</th><th>Quantité</th></tr>

            <?php
                $tab_article = getAllArticles();
                //var_dump($tab_article);
                foreach($tab_article as $article){
                    echo '<tr>
                    <td>'.$article['code_art'].'</td>
                    <td>'.$article['libelle_art'].'</td>
                    <td>
                        <form action="ajout_panier.php">
                        <input type="hidden" name="art" value="'.$article['code_art'].'">
                        <input type="number" name="qtt" min="1" value="1">
                        <button>Ajouter</button>
                        </form>
                    </td>
                    </tr>';
                }
            ?>
        </table>
    </section>
</body>

</html>