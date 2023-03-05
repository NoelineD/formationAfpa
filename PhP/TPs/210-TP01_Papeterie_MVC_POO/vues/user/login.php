<main class="container">
    <p class="h2">Entrer vos informations de connexion</p>
    <br>
    <form method="post" action="index.php?entite=user&action=verif">
        <label for="id_ident">Votre identifiant : </label>
        <input type="text" id="id_ident" name="ident" value="<?= $ident ?>">
        <br>
        <label for="id_psw">Votre mot de passe : </label>
        <input type="password" id="id_psw" name="psw">
        <br>
        <button>Envoyer</button>
        <?= '<span class="erreur">'.$erreur.'</span>' ?>
    </form>
</main>