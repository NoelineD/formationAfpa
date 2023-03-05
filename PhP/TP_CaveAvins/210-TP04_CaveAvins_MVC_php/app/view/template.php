<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cave à vins</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Cave à vins</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?entite=wine&action=list">Lister les vins</a>
                    </li>
                    <?php if($_SESSION['role'] === 'ROLE_CLIENT'): ?> <!-- si l'utilisateur connecté a le rôle CLIENT -->
                    <li class="nav-item">
                        <a class="nav-link" href="<!-- url de affichePanier -->">Voir votre panier</a>
                    </li>
                    <?php endif ?> <!-- fin de si -->
                   <?php if($_SESSION['role'] === 'ROLE_ADMIN'): ?> <!-- si l'utilisateur connecté a le rôle ADMIN -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Gérer les vins
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?entite=wine&action=create">Créer un vin</a>
                            <a class="dropdown-item" href="<!-- url de modification du vin -->">Modifier un vin</a>
                            <a class="dropdown-item" href="<!-- url de suppression du vin -->">Supprimer un vin</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<!-- url de gestion du stock -->">Gérer le stock</a>
                        </div>
                    </li>
                    <?php endif ?>  <!-- fin de si -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?entite=about">A propos</a>
                    </li>
                </ul>
                
                <?php if($_SESSION['role'] === 'ROLE_VISITEUR'): ?> <!-- si aucun utilisateur n'est pas connecté -->
                    <a class="btn btn-secondary" href="index.php?entite=user&action=login">Connexion</a>
                <?php else: ?> <!-- sinon -->
                    <a class="btn btn-secondary" href="index.php?entite=user&action=logout">Déconnexion</a>
                <?php endif; ?> <!-- fin de si -->
            </div>
        </nav>
        <main class="container-fluid">
            <?php include $vue . '.php'; ?>
        </main>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
