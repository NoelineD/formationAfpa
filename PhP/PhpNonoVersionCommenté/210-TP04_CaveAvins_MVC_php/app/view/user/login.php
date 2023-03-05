    <div>
        <h1>Connexion</h1>
        <br>
        <div class="row">
            <div class="col-4 mx-auto">
                <form method="post" action="index.php?entite=user&action=verif">
                    <?php if($error) : ?><!-- si erreur : test d'une variable d'erreur -->
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif ?><!-- fin de si -->

                    <label for="inputEmail">Votre email : * </label>
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="email" required autofocus>
                    <label for="inputPassword">Votre mot de passe : * </label>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>

                    <br>
                    <button class="btn btn-lg btn-primary" type="submit">
                        Valider
                    </button>
                </form>
            </div>
        </div>
    </div>
