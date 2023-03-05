<?php

$connect = new PDO('mysql:host=localhost;dbname=demo_personne','root','');

function getUserByMail($mail) {

    global $connect;

    // crétaion de l'ordre SQL sous forme de chaine
    //$sql = 'SELECT * FROM users WHERE mail_user=\''.$mail.'\';';
    //$sql = "SELECT * FROM users WHERE mail_user='$mail';";
    $sql = 'SELECT * FROM users WHERE mail_user=:mail;';
    
    //$pers_stat = $connect->query($sql); // exécution de l'ordre SQL
                                        // récuparation d'un objet PDO_Statement

    $pers_stat = $connect->prepare($sql);
    $pers_stat->bindParam('mail', $mail, PDO::PARAM_STR);
    $pers_stat->execute();

    if ($pers_stat->rowCount() == 1) { // test si j'ai 1 enregistrement
        $pers = $pers_stat->fetch(PDO::FETCH_ASSOC); // récupère un enregistrement
                                                    // retourne un tableau associatif
        $pers_stat = null;  // fermeture du PDO_Statement
        $connect = null;    // fermeture de la connexion
        return $pers;
    }
    return false;   // personne non trouvé
}

function getAllUsers(){
    global $connect;

    $sql = "SELECT * FROM users;";

    $pers_stat = $connect->query($sql);

    $pers = $pers_stat->fetchAll(PDO::FETCH_ASSOC);

    var_dump($pers);
    die();
}

function getAllArticles(){

    global $connect;

    $sql = 'SELECT * FROM articles';

    $art_stat = $connect->query($sql);

    $articles = $art_stat->fetchAll(PDO::FETCH_ASSOC);

    return $articles;
}