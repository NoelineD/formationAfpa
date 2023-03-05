<?php

$connect = new PDO('mysql:host=localhost;dbname=demo_personne', 'root', '');

function getUserByMail($mail)
{

    global $connect;

    //$sql = "SELECT * FROM users WHERE mail_user=\'' . $mail . ';";
    //$sql = "SELECT * FROM users WHERE mail_user='$mail';";

    // $pers_stat = $connect->query($sql);  // Exécution de l'ordre SQL
    // Récupération d'un objet Pdo_statement

    $sql = "SELECT * FROM users WHERE mail_user = :mail;";

    $pers_stat = $connect->prepare($sql);
    $pers_stat->bindParam(':mail', $mail, PDO::PARAM_STR);
    $pers_stat->execute();

    if ($pers_stat->rowCount() == 1) { // Test si j'ai 1 enregistrement
        $pers = $pers_stat->fetch(PDO::FETCH_ASSOC); // Récupère un enregistrement
        // retourne un tableau associatif
        $pers_stat = null; // Fermeture du PDO_statement
        $connect = null; // Fermeture de la connexion
        return $pers;
    }
    return false; // Personne non trouvé
}

function getAllUsers()
{
    global $connect;

    $sql = "SELECT * FROM users";

    $pers_stat = $connect->query($sql);
    $pers = $pers_stat->fetchAll(PDO::FETCH_ASSOC);
}

function getAllArticles()
{
    global $connect;
    $sql = 'SELECT * FROM articles';
    $art_stat = $connect->query($sql);
    $articles = $art_stat->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
}
