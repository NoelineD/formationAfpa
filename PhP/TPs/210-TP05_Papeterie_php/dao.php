<?php

$dbconnect = new PDO('mysql:host=localhost;dbname=papeterie;charset=UTF8', 'root', '');

/**
 * @param string $login le mail de l'utilisateur
 * @return mixed false si non trouvé, un tableau si trouvé
 */
function getUserByLogin(string $login) {
    
    global $dbconnect;

    //$sql = "SELECT * FROM users WHERE login_user='" . $login . "';";
    //$sql = 'SELECT * FROM users WHERE login_user=\'' . $login . '\';';
    $sql = 'SELECT * FROM users WHERE login_user=:login;';

    //$user_stat = $dbconnect->query($sql);
    $user_stat = $dbconnect->prepare($sql);
    $user_stat->bindParam('login', $login);
    $user_stat->execute();

    if ($user_stat->rowCount() == 1) {
        
        $user = $user_stat->fetch(PDO::FETCH_ASSOC);
        $user_stat = NULL;
        $dbconnect = NULL;
        return $user;
    } else {
        $user_stat = NULL;
        $dbconnect = NULL;
        return false;
    }
}

function getArticlesByCategorie(string $cat){

    global $dbconnect;

    //$sql = 'SELECT * FROM `articles` NATURAL JOIN categories WHERE libelle_cat = \''.$cat.'\'';
    $sql = 'SELECT * FROM `articles` NATURAL JOIN categories WHERE libelle_cat = :libelle';

    //$art_stat = $dbconnect->query($sql);
    $art_stat = $dbconnect->prepare($sql);
    $art_stat->bindParam('libelle', $cat);
    $art_stat->execute();

    $articles = $art_stat->fetchAll(PDO::FETCH_ASSOC);

    return $articles;
}

function getAllCategorie(){
    global $dbconnect;

    $sql ='SELECT * FROM categories ORDER BY libelle_cat';

    $cat_stat = $dbconnect->query($sql);

    $categories = $cat_stat->fetchAll(PDO::FETCH_ASSOC);

    return $categories;
}