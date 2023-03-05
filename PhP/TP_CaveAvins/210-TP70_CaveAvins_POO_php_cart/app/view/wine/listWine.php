<div>
    <h1>Liste des vins<span class="h3"> (Nombre de vins au panier : <?= $nbrWine ?>)</span></h1>
    <div class="card-columns">
        <!-- boucle sur les vins récupérés de la base -->
        <?php foreach ($wines as $wine) : ?>
            <div class="card bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header"><?= $wine->getRegion(); ?></div>
                <div class="row no-gutters">
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $wine->getNom(); ?></h5>
                            <p class="card-text"><?= $wine->getRobe(); ?> année <?= $wine->getMilesime(); ?></p>
                            <p class="card-text">cépage : <?= $wine->getCepage(); ?></p>
                            <p class="card-text">prix ht : <?= $wine->getPrix_ht(); ?></p>
                            <p class="card-text">Rentré le : <?php
                                                $date = new DateTime($wine->getUpdate_at());
                                                echo $date->format('d-m-Y') ?></p>
                        </div>
                    </div>
                    <div class="col-4">
                        <img class="card-img mt-4" src="vins/<?= $wine->getImage_name(); ?>" alt="image du vin">
                    </div>
                </div>
                <?php if ($_SESSION['role'] === 'ROLE_CLIENT') : ?>
                    <!-- si l'utilisateur est connecté -->
                    <a class="btn btn-secondary" href="index.php?entite=wine&action=addtocart&id=<?= $wine->getId(); ?>">Ajouter au panier</a>
                <?php endif ?>
                <!-- fin de si -->
                <?php if ($_SESSION['role'] === 'ROLE_ADMIN') : ?>
                    <!-- si l'utilisateur connecté est de rôle ADMIN -->
                    <a class="btn btn-secondary" href="index.php?entite=wine&action=see&id=<?= $wine->getId(); ?>">Voir</a>
                <?php endif ?>
                <!-- fin de si -->
            </div>
        <?php endforeach ?>
        <!-- fin de boucle -->
    </div>
</div>