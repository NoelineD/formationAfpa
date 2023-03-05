<div>
        <h1>Détail d'un vin</h1>
        <br>
        <div class="row">
            <div class="col-4 mx-auto">
                <form method="post" action="index.php?entite=wine&action=update" enctype="multipart/form-data">
                    <?php if($error) : ?><!-- si erreur : test d'une variable d'erreur -->
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif ?><!-- fin de si -->
                    <input type="hidden" name="id" value="<?= $vin->getId(); ?>">
                    <input type="hidden" name="image_name" value="<?= $vin->getImage_name(); ?>">
                    <label for="id_region">région : * </label>
                    <input type="text" name="region" id="id_region" value="<?= $vin->getRegion(); ?>" class="form-control" placeholder="la région" required autofocus>
                    <label for="id_cepage">cépage : * </label>
                    <input type="text" name="cepage" id="id_cepage" value="<?= $vin->getCepage(); ?>" class="form-control" placeholder="" required autofocus>
                    <label for="id_millesime">millesime : * </label>
                    <input type="text" name="millesime" id="id_millesime" value="<?= $vin->getMilesime(); ?>" class="form-control" placeholder="Année sur 4 chiffres" required autofocus>
                    <label for="id_robe">robe : * </label>
                    <input type="text" name="robe" id="id_robe" value="<?= $vin->getRobe(); ?>" class="form-control" placeholder="" required autofocus>
                    <label for="id_nom">nom : * </label>
                    <input type="text" name="nom" id="id_nom" value="<?= $vin->getNom(); ?>" class="form-control" placeholder="" required autofocus>
                    <label for="id_file">Image du vin : </label>
                    <input type="file" name="image" id="id_fille" value="<?= $vin->getImage_name(); ?>" class="form-control" placeholder="">
                    <label for="id_prix">prix : * </label>
                    <input type="text" name="prix" id="id_prix" value="<?= $vin->getPrix_ht(); ?>" class="form-control" placeholder="" required autofocus>

                    <br>
                    <button class="btn btn-lg btn-primary" type="submit">
                        Modifier
                    </button>
                </form>
                <a class="btn btn-danger" href="index.php?entite=wine&action=delete&id=<?= $vin->getId(); ?>">Supprimer</a>
            </div>
        </div>
    </div>
