<?php
try {
    $dbconnect = new PDO('mysql:host=localhost;dbname=papeterie;charset=UTF8', 'root', '');
} catch(PDOException $err) {
    throw new Exception('Erreur de connexion a Mysql');
}
/**
 * fonction qui retourne le user en fonction du login
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
        //return false;
        throw new Exception('Login non trouvé');
    }
}

/**
 * @param string $nom_user le nom entré par l'internaute
 * @param string $prenom_user le prénom entré par l'internaute
 * @param string $login_user le mail entré par l'internaute
 * @param string $psw_user le mot de passe entré par l'internaute
 */
function setUser($nom_user, $prenom_user, $login_user, $psw_user){

    global $dbconnect;

    $sql ='INSERT INTO users VALUES (NULL, :nom, :prenom, \'client\', :login, :psw)';
    $user_stat = $dbconnect->prepare($sql);
    $user_stat->bindParam(':nom', $nom_user);
    $user_stat->bindParam(':prenom', $prenom_user);
    $user_stat->bindParam(':login', $login_user);
    $user_stat->bindParam(':psw', $psw_user);
    $user_stat->execute();

}
/**
 * fonction qui retourne les articles d'une catégorie
 * @param string $cat
 * @return array tableau de tous les articles en fonction d'une catégorie
 */
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

function getArticleByCode($code){

    global $dbconnect;

    $sql = 'SELECT * FROM articles WHERE code_art = '.$code.';';

    $art_stat = $dbconnect->query($sql);

    $art = $art_stat->fetch(PDO::FETCH_ASSOC);

    return $art;
}

/**
 * fonction qui retourne les cat"gories existantes
 * @return array tablean des toutes les catégories
 */
function getAllCategorie(){
    global $dbconnect;

    $sql ='SELECT * FROM categories ORDER BY libelle_cat';

    $cat_stat = $dbconnect->query($sql);

    $categories = $cat_stat->fetchAll(PDO::FETCH_ASSOC);

    return $categories;
}

