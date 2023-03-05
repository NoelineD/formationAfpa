<main class="container">
    <p class="h2">Entrer vos informations</p>
    <br>
    <form method="post" action="index.php?entite=user&action=create">
        <label for="id_nom">Votre nom : </label>
        <input type="text" id="id_nom" name="nom">
        <br>
        <label for="id_prenom">Votre prénom : </label>
        <input type="text" id="id_prenom" name="prenom">
        <br>
        <label for="id_mail">Votre mail : </label>
        <input type="text" id="id_mail" name="mail">
        <br>
        <label for="id_psw">Votre mot de passe : </label>
        <input type="password" id="id_psw" name="psw">
        <br>
        <button>Envoyer</button>
    </form>
</main>