<main class="container">
    <table class="table table-bordered">
        <tbody id="ligne">
            <tr>
                <th class="text-center w-10">REFERENCE</th>
                <th class="w-60">DESCRIPTION</th>
                <th class="text-center w-10">PRIX<br>UNITAIRE</th>
                <th class="text-center w-10">QUANTITE</th>
                <th class="text-center w-10">PRIX TOTAL</th>
            </tr>
            <?php
            $totalPanier = 0;
            foreach ($articlePanier as $article) {
                $prixTTCArt = $article['prix_ht_art'] * $article['qtt_art'];
                $totalPanier = $totalPanier + $prixTTCArt;
                echo '<tr>
                    <td>'.$article['code_art'].'</td>
                    <td>'.$article['libelle_art'].'</td>
                    <td class="prix">'.$article['prix_ht_art'].'</td>
                    <td>'.$article['qtt_art'].'</td>
                    <td class="prix">'.$prixTTCArt.'</td>
                    </tr>';
            }
            echo '<tr><td colspan="4">Total du panier</td><td class="prix">'.$totalPanier.'</td></tr>';
            ?>
        </tbody>
    </table>
</main>