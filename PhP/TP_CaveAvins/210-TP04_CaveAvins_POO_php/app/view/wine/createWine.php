    <div>
        <h1>Ajout d'un nouveau vin</h1>
        <br>
        <div class="row">
            <div class="col-4 mx-auto">
                <form method="post" action="index.php?entite=wine&action=create" enctype="multipart/form-data">
                    <?php if($error) : ?><!-- si erreur : test d'une variable d'erreur -->
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif ?><!-- fin de si -->

                    <label for="id_region">région : * </label>
                    <input type="text" name="region" id="id_region" class="form-control" placeholder="la région" required autofocus>
                    <label for="id_cepage">cépage : * </label>
                    <input type="text" name="cepage" id="id_cepage" class="form-control" placeholder="" required autofocus>
                    <label for="id_millesime">millesime : * </label>
                    <input type="text" name="millesime" id="id_millesime" class="form-control" placeholder="Année sur 4 chiffres" required autofocus>
                    <label for="id_robe">robe : * </label>
                    <input type="text" name="robe" id="id_robe" class="form-control" placeholder="" required autofocus>
                    <label for="id_nom">nom : * </label>
                    <input type="text" name="nom" id="id_nom" class="form-control" placeholder="" required autofocus>
                    <label for="id_file">Image du vin : * </label>
                    <input type="file" name="image" id="id_fille" class="form-control" placeholder="" required>
                    <label for="id_prix">prix : * </label>
                    <input type="text" name="prix" id="id_prix" class="form-control" placeholder="" required autofocus>

                    <br>
                    <button class="btn btn-lg btn-primary" type="submit">
                        Valider
                    </button>
                </form>
            </div>
        </div>
    </div>
