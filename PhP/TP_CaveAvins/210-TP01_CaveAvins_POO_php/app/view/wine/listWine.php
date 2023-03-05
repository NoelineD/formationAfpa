<div>
    <h1>Liste des vins</h1>
    <div class="card-columns">
        <!-- boucle sur les vins récupérés de la base -->
        <?php foreach ($wines as $wine) : ?>
            <div class="card bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header"><?= $wine['region'] ?></div>
                <div class="row no-gutters">
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $wine['nom'] ?></h5>
                            <p class="card-text"><?= $wine['robe'] ?> année <?= $wine['milesime'] ?></p>
                            <p class="card-text">cépage : <?= $wine['cepage'] ?></p>
                            <p class="card-text">prix ht : <?= $wine['prix_ht'] ?></p>
                        </div>
                    </div>
                    <div class="col-4">
                        <img class="card-img mt-4" src="vins/<?= $wine['image_name'] ?>" alt="image du vin">
                    </div>
                </div>
                <?php if ($_SESSION['role'] === 'ROLE_CLIENT') : ?>
                    <!-- si l'utilisateur est connecté -->
                    <form method="post" action="<!-- url ajout vin -->">
                        <input type="hidden" name="idVin" value="<!-- mettre id du vin -->">
                        <button type="submit" class="btn btn-secondary">Ajouter au panier</button>
                    </form>
                <?php endif ?>
                <!-- fin de si -->
                <?php if ($_SESSION['role'] === 'ROLE_ADMIN') : ?>
                    <!-- si l'utilisateur connecté est de rôle ADMIN -->
                    <a class="btn btn-secondary" href="<!-- url modif vin + id du vin -->">Modifier</a>
                <?php endif ?>
                <!-- fin de si -->
            </div>
        <?php endforeach ?>
        <!-- fin de boucle -->
    </div>
</div>