<?php
include './entites/User.php';

class Dao
{

    private PDO $dbConnect;

    public function __construct()
    {

        try {
            $this->dbConnect = new PDO('mysql:host=localhost;dbname=papeterie;charset=UTF8', 'root', '');
        } catch (PDOException $err) {
            throw new Exception('Erreur de connexion a Mysql');
        }
    }

    public function getUserPooByLogin(string $login)
    {
        $sql = 'SELECT * FROM users WHERE login_user=:login;';

        $user_stat = $this->dbConnect->prepare($sql);
        $user_stat->bindParam('login', $login);
        $user_stat->execute();

        if ($user_stat->rowCount() == 1) {

            $user_stat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'User');
            $user = $user_stat->fetch();
            $user_stat = NULL;
            $dbconnect = NULL;
            //print_r($user);
            //die();
            return $user;
        } else {
            $user_stat = NULL;
            $dbconnect = NULL;
            //return false;
            throw new Exception('Login non trouvé');
        }
    }

    
    /**
     * fonction qui retourne le user en fonction du login
     * @param string $login 
     * @return array
     * @throws Exception
     */
    public function getUserByLogin(string $login)
    {

        //$sql = "SELECT * FROM users WHERE login_user='" . $login . "';";
        //$sql = 'SELECT * FROM users WHERE login_user=\'' . $login . '\';';
        $sql = 'SELECT * FROM users WHERE login_user=:login;';

        //$user_stat = $dbconnect->query($sql);
        $user_stat = $this->dbConnect->prepare($sql);
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

    public function setUserPoo(User $user)
    {

        $sql = 'INSERT INTO users VALUES (NULL, :nom, :prenom, :role, :login, :psw)';
        $user_stat = $this->dbConnect->prepare($sql);
        
        $param = [
            ':nom' => $user->getNom_user(),
            ':prenom' => $user->getPrenom_user(),
            ':role' => $user->getRole_user(),
            ':login' => $user->getLogin_user(),
            ':psw' => $user->getPsw_user()
        ];
        $user_stat->execute($param);
    }

    /**
     * @param string $nom_user le nom entré par l'internaute
     * @param string $prenom_user le prénom entré par l'internaute
     * @param string $login_user le mail entré par l'internaute
     * @param string $psw_user le mot de passe entré par l'internaute
     */
    public function setUser($nom_user, $prenom_user, $login_user, $psw_user)
    {

        $sql = 'INSERT INTO users VALUES (NULL, :nom, :prenom, \'client\', :login, :psw)';
        $user_stat = $this->dbConnect->prepare($sql);
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
    public function getArticlesByCategorie(string $cat)
    {

        //$sql = 'SELECT * FROM `articles` NATURAL JOIN categories WHERE libelle_cat = \''.$cat.'\'';
        $sql = 'SELECT * FROM `articles` NATURAL JOIN categories WHERE libelle_cat = :libelle';

        //$art_stat = $dbconnect->query($sql);
        $art_stat = $this->dbConnect->prepare($sql);
        $art_stat->bindParam('libelle', $cat);
        $art_stat->execute();

        $articles = $art_stat->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }
    /**
     * 
     * @param type $code
     * @return array
     */
    public function getArticleByCode($code)
    {

        $sql = 'SELECT * FROM articles WHERE code_art = ' . $code . ';';

        $art_stat = $this->dbConnect->query($sql);

        $art = $art_stat->fetch(PDO::FETCH_ASSOC);

        return $art;
    }

    /**
     * fonction qui retourne les cat"gories existantes
     * @return array tablean des toutes les catégories
     */
    public function getAllCategorie()
    {

        $sql = 'SELECT * FROM categories ORDER BY libelle_cat';

        $cat_stat = $this->dbConnect->query($sql);

        $categories = $cat_stat->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }
}
