<?php
    $page = 'prod_papeterie';
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
            <h2>Liste des produits de la catégorie papeterie</h2>
            <table class="table table-bordered">
                <tbody id="ligne">
                    <tr>
                        <th class="text-center w-10">REFERENCE</th>
                        <th class="w-60">DESCRIPTION</th>
                        <th class="text-center w-10">PRIX<br>UNITAIRE</th>
                        <th class="text-center w-10">QUANTITE</th>
                        <th class="text-center w-10">AJOUTER<br>AU PANIER</th>
                    </tr>
                    <tr>
                        <td class="text-center">0019</td>
                        <td>Classeur à anneaux</td>
                        <td class="prix text-center">3.50</td>
                        <td class="text-center"><input type="number" value="0" min="0" /></td>
                        <td class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-center">0010</td>
                        <td>Sous chemises</td>
                        <td class="prix text-center">1.45</td>
                        <td class="text-center"><input type="number" value="0" min="0" /></td>
                        <td class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-center">0003</td>
                        <td>Couvertures transparentes pour dossiers</td>
                        <td class="prix text-center">4.50</td>
                        <td class="text-center"><input type="number" value="0" min="0" /></td>
                        <td class="text-center"></td>
                    </tr>
                </tbody>
            </table>
        </main>

    </div>
    <?php
    include '_pied.php';
    ?>
</body>

</html>