<main class="container">
    <h2>Liste des articles de la catégorie <?= $choix ?></h2>
    <form method="get" action="<?= $_SERVER['PHP_SELF'] ?>">
        <input type="hidden" name="entite" value="article">
        <input type="hidden" name="action" value="list">
        <label>Choix de la catégorie </label>
        <select name="choix_cat">
            <?php
            foreach ($categories as $cat) {
                echo '<option value="' . $cat['libelle_cat'] . '">' . $cat['libelle_cat'] . '</option>';
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
            foreach ($articles as $article) {
                echo '<tr>
                        <td class="text-center">' . $article['code_art'] . '</td>
                        <td>' . $article['libelle_art'] . '</td>
                        <td class="prix text-center">' . $article['prix_ht_art'] . '</td>
                        <td class="text-center">
                            <form method=post action="index.php?entite=panier&action=ajout">
                                <input type="hidden" value="'.$choix.'" name="categorie">
                                <input type="hidden" value="' . $article['code_art'] . '" name="code_art">
                                <input type="number" value="1" min="1" name="quantite">
                                <button>Ajouter</button>
                            </form>
                        </td>
                        <td class="text-center"></td>
                    </tr>';
            }
            ?>
        </tbody>
    </table>
</main>