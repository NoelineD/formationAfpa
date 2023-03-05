<!-- <?php include 'dao/dao'; ?> -->
<main class="container">
            <h2>Mon Panier</h2>
            <table class="table table-bordered">
                <tbody id="ligne">
                    <tr>
                        <th class="text-center w-10">Code Article</th>
                        <th class="text-center w-10">QUANTITE</th>
                        <th class="text-center w-10">Prix Totale</th>
                    </tr>
                    <?php
                    
                        //var_dump($tab_article);
                        //pour chaque article creation du tableau et on demande à l'ordi de retourner le code art prix...
                        //utilisation de l'entité panier et l'action ajout
                        foreach ($panier as $codeArt => $quantite){
                            echo '<tr><td>'.$codeArt.'</td>
                            <td>'.$quantite.'</td><td></td></tr>
                            ';
                   
                            // on ajoute un input hidden pour savoir quel article aller chercher/selectionner donc on reprend article code art pour lier au code art.
                        } ?>
                         </form>
                </tbody>
            </table>
        </main>