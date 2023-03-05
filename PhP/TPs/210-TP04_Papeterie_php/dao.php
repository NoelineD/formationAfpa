<?php

$dbconnect = new PDO('mysql:host=localhost;dbname=papeterie;charset=UTF8', 'root', '');

/**
 * @param string $login le mail de l'utilisateur
 * @return mixed false si non trouvé, un tableau si trouvé
 */
function getUserByLogin(string $login) {
    
    global $dbconnect;

    //$sql = "SELECT * FROM users WHERE login_user='" . $login . "';";
    $sql = 'SELECT * FROM users WHERE login_user=\'' . $login . '\';';

    $user_stat = $dbconnect->query($sql);

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
